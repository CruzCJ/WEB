<?php
include "admin/config.php";
include "header.php";
?>

<div>
    <section>
        <div class="container-form mx-auto">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="POST" id="form">
                            <fieldset>
                                <h2 class="header titulo text-center">Testimonios</h2>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="">
                                        <input id="nombre" name="nombre" type="text" placeholder="Nombre completo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="">
                                        <input id="email" name="email" type="text" placeholder="Dirección de Correo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                    <div class="">
                                        <textarea class="form-control" id="comentario" name="comentario" placeholder="Testimonios" rows="7"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg" name="enviar">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const form = document.querySelector("#form");
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
                        text: 'Testimonio enviado.'
                    }).then(() => {
                        form.reset();
                    });
                });
        });
    </script>
    <?php

    // Validación de los datos
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    } else {
        $nombre = '';
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = '';
    }

    if (isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];
    } else {
        $comentario = '';
    }


    if ($nombre == '' || $email == '' || $comentario == '') {
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'La dirección de correo electrónico no es válida.';
    } else {
        // Inserción del testimonio en la tabla
        $query = "INSERT INTO testimonios (nombre, comentario, email, fecha) VALUES ('$nombre', '$comentario', '$email', NOW())";
        if (!mysqli_query($conn, $query)) {
            echo "Error de inserción: " . mysqli_error($conn);
        }
    }
    ?>
</div>




<?php
include "footer.php";
?>