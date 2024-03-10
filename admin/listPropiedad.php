<?php
include "config.php";
?>

<body class="sb-nav-fixed">

    <header>
        <?php
        include "header.php";
        ?>
    </header>


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
                            <h2>Catálogo Propiedades
                        </div>
                        <div class="p-2 bd-highlight">
                            <br>
                            <a href="nuevaPropiedad.php" class="btn btn-secondary"><i class="fas fa-plus"></i> Nuevo</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre Propiedad</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Provincia</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cuartos</th>
                                    <th scope="col">Baños</th>
                                    <th scope="col">Cochera disponible</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Vendedor</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="datosTablaPropiedades">

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>


            <?php
            include "footer.php";
            ?>

        </div>
    </div>

    </html>