<?php
if (empty($whereami)) {
        $whereami = "";
}
?>

<!-- Footer / Bootstrap Examples First-->
<div class="container footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">© 2023 MexiSpotlight</p>

        <a href="/"
            class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"><img
                src="<?php echo $whereami ?>./images/MexiSpotlightLogo.png" alt="" style="height: 6vh;"></a>


        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="<?php echo $whereami ?>./index.php"
                    class="nav-link px-2 text-body-secondary">Inicio</a></li>
            <li class="nav-item"><a href="<?php echo $whereami ?>./spots.php"
                    class="nav-link px-2 text-body-secondary">Spots</a>
            </li>
            <li class="nav-item"><a href="<?php echo $whereami ?>./contacto.php"
                    class="nav-link px-2 text-body-secondary">Contáctenos</a>
            </li>
        </ul>
    </footer>
</div>

</body>

</html>