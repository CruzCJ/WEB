<?php
include "config.php";
include "header.php";
?>



<div id="layoutSidenav">
    <?php
    include "menu.php";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="d-flex bd-highlight mb-3">
                    <div class="me-auto p-2 bd-highlight">
                        <br>
                        <h2>Catálogo de Usuarios
                    </div>
                    <div class="p-2 bd-highlight">
                        <br>
                        <a href="nuevoUsuario.php" class="btn btn-secondary"><i class="fas fa-plus"></i> Nuevo</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Email</th>
                                <th scope="col">Clave</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Segundo Apellido</th>
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">Numero celular</th>
                                <th scope="col">Numero WhatsApp</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="datosTabla">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </main>


        </body>

        </html>

        <?php
        include "footer.php";
        ?>