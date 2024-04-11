<!-- Podrías ayudarme a documentar este codigo por favor? -->



<?php
// Obtenemos la ruta del directorio actual
require './conexion/config.php';
include './TEMPLATE/head.php';
?>

.car-img {
width: 100%;
}

<?php
include './TEMPLATE/nav.php';
?>


<!-- Creamos un carrusel d -->
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
            aria-current="true"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="./images/landing.png" class="d-block h-100 car-img" alt="">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>¿Quieres publicar tu Spot?</h1>
                    <p class="opacity-75">Accede a la página de contacto y cuéntanos acerca de tu lugar.</p>
                    <p><a class="btn btn-lg btn-light" href="./contacto.php">CONTACTO</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item active">
            <img src="./images/landing.png" class="d-block h-100 car-img" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Encuentra los mejores <b>Spots</b></h1>
                    <p>Contamos con una gran variedad de experiencias</p>
                    <p><a class="btn btn-lg btn-light" href="./categorias/spots.php">EXPLORAR</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/landing.png" class="d-block h-100 car-img" alt="">
            <div class="container">
                <div class="carousel-caption text-end">
                    <h1>¿Ya tienes tu cuenta?</h1>
                    <p>Regístrate ahora para empezar a descubrir nuevas aventuras</p>
                    <p><a class="btn btn-lg btn-light" href="./nosotros.php">REGISTRO</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Últimos artículos / 4 cards horizontales -->
<div class="container">

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h1>Spots en tendencia</h1>
            <br>

            <div class="row row-cols-1 row-cols-sm-3">

                <?php
                $sql = "SELECT * FROM negocios ORDER BY PuntosPromedio DESC LIMIT 6";
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
                                        <small class="card-text">
                                            <?= $row['Descripcion'] ?>
                                        </small>
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
<!-- Agrega jQuery a tu proyecto, puedes obtenerlo desde https://jquery.com/ -->
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="./js/mail_api.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="./js/newsletter_ajax.js"></script>
<script></script>

<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Suscríbete a nuestro Newsletter</h5>
                <form id="suscripcionForm" action="newsletterManager.php" method="post">
                    <div class="form-group">
                        <label for="nombre_news">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_news" name="nombre_news" required>
                    </div>
                    <div class="form-group">
                        <label for="correo_news">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo_news" name="correo_news" required>
                    </div>
                    <br>
                    <button type="button" class="btn btn-dark" onclick="suscribirse()">Suscribirse</button>
                </form>
                <br>
                <div id="form-alert"></div>
            </div>
        </div>
    </div>
</div>



<?php
include './TEMPLATE/footer.php';
?>