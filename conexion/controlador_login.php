<?php

session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = $conn->query("select * from usuarios where Usuario = '$usuario' and Contraseña = '$password'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["id"] = $datos->id;
            $_SESSION["nombre"] = $datos->Nombre;
            $_SESSION["admin"] = $datos->IsAdmin;
            header("location: ./dashboard.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }

    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }

}

?>