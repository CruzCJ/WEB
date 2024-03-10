<body class="sb-nav-fixed">

    <header>
        <?php
        include "config.php";
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
                <form id="frmPropiedad" class="w-40 m-auto" action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <a href="listPropiedad.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
                        </div>

                        <div class="me-auto p-2 bd-highlight ">
                            <h2>Catálogo de Propiedades
                        </div>

                    </div>
                    <select id="usuario" class="form-control" name="usuario" required>
                        <?php
                        $user_reg = mysqli_query($conn, "SELECT * FROM usuario");
                        foreach ($user_reg as $user) { ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['nombre']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nom_inm" id="nom_inm" placeholder="Nombre Propiedad">
                        <label for="nom_inm">Nombre Propiedad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                        <label for="direccion">Dirección</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio">
                        <label for="precio">Precio $</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="cuartos" id="cuartos" placeholder="Cuartos">
                        <label for="cuartos">Cuartos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="banios" id="banios" placeholder="Baños">
                        <label for="banios">Baños</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="cochera" id="cochera" placeholder="Cochera disponible">
                        <label for="cochera">Cochera disponible</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select id="provincia" class="form-control" name="provincia" required>
                                <option value="San José">San José</option>
                                <option value="Alajuela">Alajuela</option>
                                <option value="Cartago">Cartago</option>
                                <option value="Heredia">Heredia</option>
                                <option value="Guanacaste">Guanacaste</option>
                                <option value="Puntarenas">Puntarenas</option>
                                <option value="Limón">Limón</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <label for="imagen">Imagen de la Propiedad</label>
                        <input type="file" class="form-control" name="imagen[]" id="imagen" placeholder="imagen" multiple>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria" required>
                                <option value="Venta">Venta</option>
                                <option value="Alquiler">Alquiler</option>
                            </select>
                        </div>
                    </div>
                    <br>
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