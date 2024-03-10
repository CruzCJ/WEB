<?php
include "admin/config.php";
error_reporting(0);
session_start();
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Registro || Tu inmueble S.A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/registro.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form id="frmUsuario" class="" action="" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="img/logoC.jpg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Registrarse</h1>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Password">
                <label for="cedula">Cedula</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Password">
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="apellidoUNO" name="apellidoUNO" placeholder="Password">
                <label for="apellidoUNO">Primer Apellido</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="apellidoDOS" name="apellidoDOS" placeholder="Password">
                <label for="apellidoDOS">Segundo Apellido</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="numTel" name="numTel" placeholder="Password">
                <label for="numTel">Numero de telefono</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="numWha" name="numWha" placeholder="Password">
                <label for="numWha">Numero de WhatsApp</label>
            </div>
            <div class="form-floating mb-1">
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="Password">
                <label for="fechaNacimiento">Fecha nacimiento</label>
            </div>
            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="email" name="email" placeholder="Password">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" name="password" id="password" placeholder="Clave">
                <div class="box-eye">
                    <button type="button" onclick="mostrarContraseña('password','mostrarpass')">
                        <i id="mostrarpass" class="fa-solid fa-eye changePassword"></i>
                    </button>
                </div>
                <label for="password">Clave</label>
            </div>
            <div class="form-floating mb-1">
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen">
                <label for="imagen">Foto de perfil</label>
            </div>
            <br>
            <div class="mb-3">
                <button id="guardar" type="button" class="btn btn-primary">Guardar</button>
                <button id="cancelar" type="reset" class="btn btn-outline-dark">Cancelar</button>
            </div>
            <div class="checkbox mb-3">
                <a href="login.php">Regresar al inicio de sesion</a>
            </div>
        </form>
    </main>



</body>
<footer>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="admin/js/nuevoUsuario.js"></script>
</footer>

</html>