<?php
if (empty($whereami)) {
    $whereami = "";
}
?>
/* Formatting search box */
.search-box {
width: 300px;
position: relative;
display: inline-block;
font-size: 14px;
}

.search-box input[type="text"] {
height: 32px;
padding: 5px 10px;
border: 1px solid #CCCCCC;
font-size: 14px;
}

.result {
position: absolute;
z-index: 999;
top: 100%;
left: 0;
}

.search-box input[type="text"],
.result {
width: 100%;
box-sizing: border-box;
}

/* Formatting result items */
.result li {
margin: 0;
padding: 7px 10px;
border: 1px solid #CCCCCC;
border-top: none;
cursor: pointer;
background-color: #fff;
color: #212529;
}

.result li:hover {
background-color: #212529;
color: #fff;
}
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?php echo $whereami ?>./js/search_manager.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $whereami ?>./index.php"><img
                    src="<?php echo "$whereami" ?>./images/MexiSpotlightLogo.png" alt="logo-mexi-spotlight"
                    style="height: 6vh;"><b> MexiSpotlight</b></a>

        </div>
        </div>
    </nav>

    <!-- Navbar / Bootstrap / Examples Navbars Expand at lg-->
    <nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $whereami ?>./index.php"><img
                    src="<?php echo "$whereami" ?>./images/MexiSpotlightLogo.png" alt="logo-mexi-spotlight"
                    style="height: 6vh;"><b> MexiSpotlight</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $whereami ?>./index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $whereami ?>./spots.php">Spots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $whereami ?>./contacto.php">Contáctenos</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        // Verificar si la variable de sesión está establecida y es true
                        if (!empty($_SESSION["id"])) {
                            // Mostrar el botón o cualquier otro elemento aquí
                            echo '<a class="nav-link" href="' . $whereami . './dashboard.php">Dashboard</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex search-box" role="search">
                            <input class="form-control me-2 mt-1" type="text" placeholder="Buscar Spot..."
                                aria-label="Buscar Spot...">
                            <div class="result"></div>
                        </div>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item mt-1">
                        <?php
                        // Verificar si la variable de sesión está establecida y es true
                        if (!empty($_SESSION["id"])) {
                            // Mostrar el botón o cualquier otro elemento aquí
                            ?>
                            <a class="navbar-brand"><b>
                                    <?= $_SESSION["nombre"] ?>
                                </b></a>
                            <?php
                        } else {
                            echo '<a class="nav-link" href="' . $whereami . './login.php">Login/Registro</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        // Verificar si la variable de sesión está establecida y es true
                        if (!empty($_SESSION["id"])) {
                            // Mostrar el botón o cualquier otro elemento aquí
                            echo '<a class="btn btn-danger" href="' . $whereami . './conexion/controlador_logout.php">Cerrar sesión</a>';
                        }
                        ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>