<?php
require './conexion/config.php';
$title = "Catálogo";

include './TEMPLATE/head.php';
include './TEMPLATE/nav.php';
?>


<!-- Contenido de la pagina -->
<div class="container">
    <br>
    <h1>Todos nuestros <b>Spots</b></h1>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

                <?php
                $sql = "SELECT * FROM negocios ORDER BY PuntosPromedio DESC";
                if ($resultado = $conn->query($sql)) {
                    if ($resultado->num_rows > 0) {
                        // Este while se encarga de imprimir los productos
                        while ($row = $resultado->fetch_array()) {
                            ?>
                            <div class="col pb-3">
                                <div class="card h-100" href="./verProducto.php?id=<?= $row['id'] ?>">
                                    <img src="./images/<?= $row['Imagen'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">
                                            <?= $row['Nombre'] ?>
                                        </h5>
                                        <p class="card-text">
                                            <?= $row['Descripcion'] ?>
                                        </p>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <p class="card-text">
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
                                            echo ' ';
                                            echo '(' . $row['NumeroVotos'] . ')'; ?>
                                        </p>

                                        <a class="btn btn-dark" href="./verSpot.php?id=<?= $row['id'] ?>">Ver</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="alert alert-danger"><em>Pronto agregaremos nuevos productos.</em></div>';
                    }
                } else {
                    echo "Ups! Algo salió mal. Intenta más tarde.";
                }
                $conn->close();
                ?>

            </div>
        </div>
    </div>
</div>



<?php
include './TEMPLATE/footer.php';
?>