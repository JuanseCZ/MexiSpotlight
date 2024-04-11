function enviar_contacto() {
  let fname = document.getElementById("fname");
  let email = document.getElementById("email");
  let subject = document.getElementById("subject");
  let body = document.getElementById("body");

  let full_body = `
  <html>
      <head>
          <style>
              body {
                  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                  line-height: 1.6;
                  background-color: #f4f4f4;
                  color: #333;
              }
              h1 {
                  color: #007bff;
              }
              h4 {
                  color: #555;
              }
              p {
                  font-size: 16px;
              }
          </style>
      </head>
      <body>
          <h1>Nuevo mensaje de ${fname.value}</h1>
          <h4>Correo electrónico: ${email.value}</h4>
          <p>${body.value}</p>
      </body>
  </html>
`;

  Email.send({
    SecureToken: "91a3c1cc-9eb3-4b65-8919-9eac9dbd2ae7",
    To: "mexispotlight@gmail.com", //Este correo puede ser cambiado para ser enviado a otro correo y hacer pruebas
    From: "mexispotlight@gmail.com",
    Subject: `${subject.value} - ${fname.value}`,
    Body: full_body,
  }).then((message) => alert(message));
}
function newsletter_notification(nombre, email) {
  subject =
    "¡Bienvenido a MexiSpotlight! 🌟 Descubre los mejores Spots locales.";

  let body = `
    <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                }
                h1 {
                    color: #3498db;
                }
                p {
                    color: #333;
                }
            </style>
        </head>
        <body>
            <h1>${nombre}</h1>
  
            <p>  
                Bienvenido a la comunidad MexiSpotlight, donde la magia de los Spots locales cobra vida. Nos emociona tenerte como parte de nuestra familia dedicada a explorar y apoyar los encantadores rincones de nuestra ciudad.<br><br>
  
                ¿Qué son los Spots? Son esos lugares especiales, únicos y llenos de autenticidad que dan vida a nuestra comunidad. Ya sean acogedores cafés, tiendas con encanto, o restaurantes que te hacen sentir como en casa, cada Spot tiene una historia que contar.<br><br>
  
                ¿Qué puedes esperar de nuestro newsletter?<br>
                - Descubre nuevos Spots locales para explorar.<br>
                - Recibe reseñas honestas y recomendaciones de la comunidad.<br>
                - Participa en eventos y promociones exclusivas.<br><br>
  
                Estamos encantados de que te hayas unido a nosotros en esta emocionante aventura. En MexiSpotlight, celebramos la diversidad y la singularidad de cada Spot, y estamos seguros de que encontrarás joyas ocultas que te encantarán.<br><br>
  
                ¡Gracias por ser parte de MexiSpotlight! 🎉<br><br>
  
                Explora. Descubre. Comparte.<br><br>
  
                Equipo MexiSpotlight
            </p>
        </body>
    </html>
`;
  Email.send({
    SecureToken: "91a3c1cc-9eb3-4b65-8919-9eac9dbd2ae7",
    To: email, //Este correo puede ser cambiado para ser enviado a otro correo y hacer pruebas
    From: "mexispotlight@gmail.com",
    Subject: subject,
    Body: body,
  }).then((message) => alert(message));
}
