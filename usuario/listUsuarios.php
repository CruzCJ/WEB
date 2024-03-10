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
                            <h2>Catálogo de Usuarios
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none;">Id</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Segundo Apellido</th>
                                    <th scope="col">Fecha Nacimiento</th>
                                    <th scope="col">Numero celular</th>
                                    <th scope="col">Numero WhatsApp</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody id="datosTabla">
                                <?php
                                $data = mysqli_query($conn, "SELECT * FROM usuario WHERE id = " . $_SESSION['id']);
                                while ($user = mysqli_fetch_assoc($data)) {
                                ?>
                                    <tr>
                                        <td style="display: none;"><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['cedula']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['password']; ?></td>
                                        <td><?php echo $user['nombre']; ?></td>
                                        <td><?php echo $user['apellidoUNO']; ?></td>
                                        <td><?php echo $user['apellidoDOS']; ?></td>
                                        <td><?php echo $user['fechaNacimiento']; ?></td>
                                        <td><?php echo $user['numTel']; ?></td>
                                        <td><?php echo $user['numWha']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <h3 class="me-auto p-2 bd-highlight">Foto de perfil</h3>
                    <div>
                        <img class="img-thumbnail cusImg" src="../imgClientes/upload/<?php echo $_SESSION["id"] ?>.jpg">
                    </div>
                </div>
            </main>
</body>

</html>

<?php
include "footer.php";
?>