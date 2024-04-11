function isValidEmail(email) {
  let regex = /\S+@\S+\.\S+/;
  return regex.test(email.value.toLowerCase());
}

function mostrarMensaje(tipo, mensaje) {
  // Elimina mensajes anteriores
  $("#form-alert #mensaje").remove();

  // Crea el elemento de notificación dentro del formulario
  let mensajeElement = $("<div>")
    .attr("id", "mensaje")
    .addClass("alert alert-dismissible fade show")
    .appendTo($("#form-alert"));

  // Agrega clases según el tipo de mensaje
  if (tipo === "success") {
    mensajeElement.addClass("alert-success");
  } else if (tipo === "warning") {
    mensajeElement.addClass("alert-warning");
  } else if (tipo === "danger") {
    mensajeElement.addClass("alert-danger");
  }

  // Agrega el contenido del mensaje
  mensajeElement.html(`
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            ${mensaje}
        `);
}

function suscribirse() {
  // Obtén los datos del formulario
  let nombre = document.getElementById("nombre_news");
  let email = document.getElementById("correo_news");

  if (!isValidEmail(email)) {
    mostrarMensaje("danger", "Ingrese un correo válido");
    return;
  } else {
    var formData = $("#suscripcionForm").serialize();

    // Realiza la petición AJAX
    $.ajax({
      type: "POST",
      url: "newsletterManager.php",
      data: formData,
      success: function (response) {
        if (response === "exito") {
          mostrarMensaje("success", "¡Suscripción exitosa!");
          newsletter_notification(nombre.value, email.value);
        } else if (response === "existente") {
          mostrarMensaje("warning", "Este correo ya está suscrito.");
        } else {
          mostrarMensaje(
            "danger",
            "Error al procesar la suscripción. Por favor, inténtalo de nuevo."
          );
        }
      },
    });
  }
}
