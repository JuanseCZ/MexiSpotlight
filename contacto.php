<?php
require_once "./conexion/config.php";

$title = "Contáctanos";


if (empty($whereami)) {
    $whereami = "";
}
include $whereami.'./TEMPLATE/head.php';
?>
.wrapper {
width: 600px;
margin: 0 auto;
}
<?php
if ($title == "Contacto") {
        echo '.footer {';
        echo '  position: fixed;';
        echo '  left: 0;';
        echo '  bottom: 0;';
        echo '  min-width: 100%;';  
        echo '}';
}
include $whereami.'./TEMPLATE/nav.php';
?>

<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="./js/mail_api.js"></script>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Contáctanos</h2>
                <p>Nos encantaría recibir tu retro</p>

                <form>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="fname" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Asunto <small class="text-muted">(si quieres publicar tu <b>Spot</b> escribe <i>"Quiero
                                    mi
                                    Spot"</i>)</small></label>
                        <input type="text" id="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Texto</label>
                        <textarea type="text" id="body" class="form-control" required></textarea>
                    </div>
                    <br>
                    <button type="button" value="Send" onclick="enviar_contacto()" class="btn btn-dark">
                        Enviar
                    </button>
                    <a href="./index.php" class="btn btn-light ml-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include './TEMPLATE/footer.php';
?>