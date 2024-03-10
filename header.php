<?php
ob_start();
session_start();
include "admin/config.php";
//inspeccionar variables
//var_dump($_SERVER["PHP_SELF"])
$url = basename($_SERVER["PHP_SELF"]);
//var_dump($url);
$url = explode(".", $url);
//var_dump($url[0]);

// Comprobar si el usuario está conectado
if (isset($_SESSION["nombre"])) {
    $nombre_User = $_SESSION['nombre'];
} else {
    $nombre_User = "Iniciar sesión";
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Tu Inmueble S.A</title>
    <meta name="description" content="Ver catalogo de Propiedades">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Tu Inmueble S.A">
    <meta property="og:type" content="Propiedades Disponibles">
    <meta property="og:url" content="">
    <meta property="og:image" content="img/logoC.jpg">
    <link rel="manifest" href="site.webmanifest">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="apple-touch-icon" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/<?php echo $url[0] . ".css" ?>">
    <link rel="stylesheet" href="css/header.css">

    <!-- <meta name="theme-color" content="#fafafa">  -->
</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg bg-secundario">
            <div class="container-fluid">
                <a class="img-thumbnail" href="index.php">
                    <img src="img/logoC.jpg" alt="Logo inm" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" style="color: white;" href="index.php">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" style="color: white;" href="propiedades.php">Inmueble</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" style="color: white;" href="contactenos.php">Contactenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" style="color: white;" href="mapa.php">Mapa</a>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION["nombre"])) :
                        if ($_SESSION['admin'] == 1) { ?>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle dropsCustom" type="button" style="color: white;" data-bs-toggle="dropdown" aria-expanded="false">
                                    <a>Bienvenido/a <?php echo $_SESSION["nombre"]; ?> </a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="admin/index.php">Administrar Propiedades</a></li>
                                    <li><a class="dropdown-item" href="admin/listUsuarios.php">Administrar usuarios</a></li>
                                    <li><a class="dropdown-item" href="reporte.php">Reporte Propiedades</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                            </div>
                            <div style="margin-right: 80px;">
                                <img style="right: 26px" class="img-thumbnail" src="imgClientes/upload/<?php echo $_SESSION["id"] ?>.jpg" width="45px">
                            </div>
                        <?php
                        } else {
                        ?><div class="dropdown">
                                <button class="btn dropdown-toggle dropsCustom" type="button" style="color: white;" data-bs-toggle="dropdown" aria-expanded="false">
                                    <a>Bienvenido/a <?php echo $_SESSION["nombre"]; ?> </a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="usuario/listPropiedad.php">Administrar Propiedades</a></li>
                                    <li><a class="dropdown-item" href="usuario/listUsuarios.php">Actualizar datos</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                            </div>
                            <div style="margin-right: 80px;">
                                <img style="right: 26px" class="img-thumbnail" src="imgClientes/upload/<?php echo $_SESSION["id"] ?>.jpg" width="45px">
                            </div>
                        <?php
                        }
                        ?>
                    <?php else : ?>
                        <li class="nav-item headCus">
                            <a class="nav-link" aria-current="page" style="color: white;" href="login.php">Iniciar sesión</a>
                        </li>
                    <?php endif; ?>
                    <form action="busqueda.php" class="d-flex" role="search">
                        <button class="btn btn-light" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>