<?php
require './conexion/config.php';
// Obtiene los datos del formulario
$nombre = $_POST['nombre_news'];
$correo = $_POST['correo_news'];


// Verifica si el correo ya existe en la tabla
$sql = "SELECT * FROM newsletter WHERE Correo = '$correo'";
if ($resultado = $conn->query($sql)) {

    if ($resultado->num_rows > 0) {
        // El correo ya está suscrito
        echo "existente";
    } else {
        // Agrega el nuevo suscriptor a la tabla
        $insercion = "INSERT INTO newsletter (Nombre, Correo) VALUES ('$nombre', '$correo')";
        if ($conn->query($insercion)) {
            echo "exito";
        } else {
            echo "error";
        }
    }
}

$conn->close();



?>