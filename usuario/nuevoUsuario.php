<body class="sb-nav-fixed">

    <header>
        <?php
        include "header.php";
        ?>
    </header>

    <div class="cargando">
        <img src="img/cargando.gif" alt="">
    </div>

    <div id="layoutSidenav">
        <?php
        include "menu.php";
        ?>


        <div id="layoutSidenav_content">
            <main class="container mt-5 mb-5">
                <!-- Para enviar archivos es obligatorio el method="POST" y el enctype="multipart/form-data"-->
                <form id="frmUsuario" class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <a href="listUsuarios.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
                        </div>
                        <div class="me-auto p-2 bd-highlight ">
                            <h2>Catálogo Usuario || Cliente
                        </div>
                    </div>
                    <div class="">
                        <label for="cedula">Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula" value="<?php echo $_SESSION['cedula'] ?>" readonly>
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="apellidoUNO" id="apellidoUNO" placeholder="Primer Apellido">
                        <label for="apellidoUNO">Primer Apellido</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="apellidoDOS" id="apellidoDOS" placeholder="Segundo Apellido">
                        <label for="apellidoDOS">Segundo Apellido</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="numTel" id="numTel" placeholder="Numero de telefono">
                        <label for="numTel">Numero de telefono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="numWha" id="numWha" placeholder="Numero de WhatsApp">
                        <label for="numWha">Numero de WhatsApp</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="date" placeholder="Fecha nacimiento" id="fechaNacimiento" name="fechaNacimiento">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Clave">
                        <label for="password">Clave</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen">
                        <label for="imagen">Imagen</label>
                    </div>

                    <div class="mb-3">
                        <button id="guardar" type="button" class="btn btn-outline-dark">Guardar</button>
                        <button id="cancelar" type="reset" class="btn btn-outline-dark">Cancelar</button>
                    </div>
                </form>

            </main>


            <?php
            include "footer.php";
            ?>
        </div>
    </div>
</body>

</html>