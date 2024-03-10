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
                            <h2>Catálogo Propiedades || Cliente
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
                                    <th scope="col" style="display: none;">ID</th>
                                    <th scope="col">Nombre Propiedad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Disponibilidad</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="datosTablaPropiedades">
                                <?php
                                $data = mysqli_query($conn, "SELECT * FROM propiedades WHERE usuario = " . $_SESSION['id']);
                                while ($propiedad = mysqli_fetch_assoc($data)) {
                                ?>
                                    <tr>
                                        <td style="display: none;"><?php echo $propiedad['id']; ?></td>
                                        <td><?php echo $propiedad['nom_inm']; ?></td>
                                        <td>$<?php echo $propiedad['precio']; ?></td>
                                        <td><?php echo $propiedad['disponibilidad']; ?></td>
                                        <td><?php echo $propiedad['categoria']; ?></td>
                                        <td>
                                            <a href='#' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                                            <a href='#' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
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