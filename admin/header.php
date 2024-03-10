<?php
session_start();
//inspeccionar variables
//var_dump($_SERVER["PHP_SELF"])
$url = basename($_SERVER["PHP_SELF"]);
//var_dump($url);
$url = explode(".", $url);
//var_dump($url[0]);

// Comprobar si el usuario está conectado
if ($_SESSION['admin'] == 1) {
} else {
    $error = "No eres administrador";
    header("Location: ../index.php");
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Tu Inmueble S.A || Admin</title>
    <meta name="description" content="Página principal de cineapp">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Tu Inmueble S.A || Admin">
    <meta property="og:type" content="Pagina Principal de Tu Inmueble S.A || Admin">
    <meta property="og:url" content="http:www.TuInmuebleAdmin.com">
    <meta property="og:image" content="../img/logoC.jpg">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">

    <!--Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/<?php echo $url[0] . ".css" ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <meta name="theme-color" content="#fafafa">
</head>


<body class="sb-nav-fixed">
    <header>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Tu Inmueble S.A</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../index.php">Volver a la pagina</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>