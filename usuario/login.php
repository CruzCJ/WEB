<?php
include "config.php";
session_start();
error_reporting(0);


if (isset($_SESSION["nombre"])) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $usuario = $_POST['cedula'];
    $contraseña = $_POST['password'];
    $sql = "SELECT * FROM usuario WHERE cedula='$usuario' AND password='$contraseña'";
    $result = mysqli_query($conn, $sql);

    // Si la información es correcta, establecer la sesión y redirigir al usuario
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['admin'] = $row['admin'];
    } else {
        $error = "Nombre de usuario o contraseña incorrectos";
        echo $error;
    }
}
?>

<head>
    <meta charset="utf-8">
    <title>Tu Inmueble S.A || Cliente</title>
    <meta name="description" content="Ver catalogo de Propiedades">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Tu Inmueble S.A">
    <meta property="og:type" content="Propiedades Disponibles">
    <meta property="og:url" content="">
    <meta property="og:image" content="https://autosyusados.com/wp-content/uploads/2019/06/Autos-usados-_logo_sin-fondo.png">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="css/login.css">



    <!-- <meta name="theme-color" content="#fafafa">  -->

    <title>
        Registro
    </title>
</head>

<body>
    <main>
        <div class="container-login">
            <div class="wrap-login">
                <form action="" method="POST" class="login-form validate-form" id="formLogin" autocomplete="off">
                    <p class="login-form-title" style="font-size:2rem; font-weight: 800;">Iniciar sesión || Admin</p>
                    <br>
                    <div class="wrap-input100">
                        <input class="input100" type="type" id="usuario" placeholder="Usuario" name="username" value="<?php echo $us; ?>" required>
                        <span class="focus-efecto"></span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" id="password" type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
                        <span class="focus-efecto"></span>
                    </div>
                    <div class="box-eye">
                        <button type="button" onclick="mostrarContraseña('password','eyepassword')">
                            <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
                        </button>
                    </div>
                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button type="submit" name="submit" class="login-form-btn">Ingresar</button </div>

                        </div>
                </form>
            </div>
        </div>
    </main>

</body>


<footer></footer>

<script src="../js/main.js"></script>
<script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>


</html>