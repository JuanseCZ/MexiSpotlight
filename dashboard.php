<?php
require './conexion/config.php';


$title = "Dashboard";


include './TEMPLATE/head.php';

if (empty($_SESSION["id"])) {
  header("location: login.php");
}
?>
a {
text-decoration: none;
color: inherit;
}

.list-group-item:hover {
background-color: #198754;
color: white;
}
body {
font-family: Arial, sans-serif;
text-align: center;
margin-top: 100px;
}
h1 {
font-size: 24px;
margin-bottom: 20px;
}
img {
max-width: 100%;
height: auto;
margin-bottom: 20px;
}

<?php
include './TEMPLATE/nav.php';
?>
<br>

<div class="container mt-4">
  <?php
  echo '<h1>Bienvenido, ' . $_SESSION["nombre"] . '!</h1> ';
  ?>
  <h1>Page Under Construction</h1>
  <img
    src="https://images.vexels.com/media/users/3/139424/isolated/preview/03b21f695cbbec990528d0ba9378f7c0-corregir-la-configuracion-de-herramientas-de-reparacion.png"
    alt="Under Construction">

  <?php
  include './TEMPLATE/footer.php';
  ?>