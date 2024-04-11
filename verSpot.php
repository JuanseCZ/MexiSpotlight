<?php

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

    require_once "./conexion/config.php";

    $sql = "SELECT * FROM negocios WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("i", $param_id);

        $param_id = trim($_GET["id"]);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $id = $row["id"];
                $nombre = $row["Nombre"];
                $imagen = $row["Imagen"];
                $descripcion = $row["Descripcion"];

                $lon = $row["CoordenadaY"];
                $lat = $row["CoordenadaX"];
                $estrellas = $row["PuntosPromedio"];
                $numeroVotos = $row["NumeroVotos"];
            } else {



                header("location: error.php");
                exit();
            }
        } else {
            echo "Ups! Algo salió mal. Intenta más tarde.";
        }
    }

    $stmt->close();

    $conn->close();
} else {

    header("location: error.php");
    exit();
}

$title = $row["Nombre"];

include './TEMPLATE/head.php';
?>
.wrapper {
width: 800px;
margin: 0 auto;
}


<?php
include './TEMPLATE/nav.php';
?>

<input type="hidden" id="name" value="<?= $nombre ?>">
<input type="hidden" id="lat" value="<?= $lat ?>">
<input type="hidden" id="lon" value="<?= $lon ?>">


<div class="wrapper">
    <div class="container-fluid">
        <div class="form-group">
            <?php
            echo '<p><img style="max-width: 100%" src="./images/' . $row['Imagen'] . '"/></p>';
            ?>
        </div>
        <?php
        if (empty($_SESSION["id"])) {
            ?>
        <div class="form-group">
            <p>
            <h1>
                <?php

                    echo $row["Nombre"]; ?>
            </h1>
            </p>
        </div>
        <?php
        } else {
            ?>
        <div class="form-group d-flex justify-content-between">

            <h1>
                <?= $row["Nombre"]; ?>
            </h1>
            <!-- Button trigger modal -->
            <button type="button"
                class="btn btn-dark align-items-middle align-items-center justify-content-center my-auto"
                data-toggle="modal" data-target="#exampleModalCenter">
                Votar
            </button>
            <!-- Vertically centered modal -->
            <div class="modal-dialog modal-dialog-centered">
                ...
            </div>

            <!-- Vertically centered scrollable modal -->
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                ...
            </div>
            <?php
        }
        ?>
            <div class="form-group">
                <p>
                    <?php
                    $counter = $row['PuntosPromedio'];
                    for ($i = 0; $i < 5; $i++) {
                        global $counter;
                        if ($counter >= 1) {
                            echo '<img src="./SVG/star-fill.svg" alt="star" >';
                            $counter--;
                        } else if ($counter >= 0.5) {
                            echo '<img src="./SVG/star-half.svg" alt="star" >';
                            $counter--;
                        } else {
                            echo '<img src="./SVG/star.svg" alt="star">';
                        }
                    }
                    echo ' (' . $row['NumeroVotos'] . ')'; ?>
                </p>
            </div>
            <div class="form-group">
                <p>
                    <?php echo $row["Descripcion"]; ?>
                </p>
            </div>

            <div class="form-group" id="map" style="height: 250px; width:100%">
            </div>



        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script type="text/javascript" src="./js/geo_api.js"></script>

    <?php
    include './TEMPLATE/footer.php';
    ?>