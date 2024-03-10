<?php

include "admin/config.php";
session_start();
error_reporting(0);


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
    $_SESSION['id'] = $row['id'];
    $_SESSION['cedula'] = $row['cedula'];
    $_SESSION['email'] = $row['email'];
    header("Location: index.php");
  } else {
    $error = "Nombre de usuario o contraseña incorrectos";
  }
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Iniciar sesión || Tu inmueble S.A</title>
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
  <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
  <form id="" class="" action="" method="POST" enctype="multipart/form-data">
      <img class="mb-4" src="img/logoC.jpg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Iniciar sesión || Tu inmueble S.A</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Cedula" name="cedula" value="<?php echo $username; ?>">
        <label for="floatingInput">Cedula</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control form-control-password" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>">
        <label for="floatingPassword">Contraseña</label>
        <button type="button" onclick="mostrarContraseña('floatingPassword','eyepassword')">
          <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
        </button>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Ingresar</button>
      <div class="checkbox mb-3">
        <div class="mt-5 olvidaste-contraseña">
          <p>¿No tienes una cuenta?</p>
          <a href="registro.php">Registrarse</a>
          <p>¿Olvidaste tu contraseña?</p>
          <a href="#" onclick="AbrirModalRestablecer()">Restablecer Contraseña </a><br>
          <a href="index.php">Regresar a la pagina principal</a>
        </div>
      </div>
    </form>


    
    <div class="modal fade" id="modal_restablecer_contra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Restablecer contraseña</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="restPass.php" method="post" id="formC">
              <div>
                <label for="email"><b>Ingrese el email registrado para enviarle la contraseña restablecida</b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    const form = document.querySelector("#formC");
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        fetch(event.target.action, {
                method: 'POST',
                body: new FormData(event.target)
            })
            .then(() => {
                Swal.fire({
                    icon: 'success',
                    title: '¡Gracias por tu mensaje!',
                    text: 'Se ha enviado una nueva contraseña a su correo electrónico.'
                }).then(() => {
                    form.reset();
                });
            });
    });
</script>


  <footer>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="js/usuario.js"></script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </footer>
</body>

</html>