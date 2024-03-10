<?php
include "header.php";
include "bd.php";
include "admin/config.php";
$txtBuscar = $_GET["p"];

//inspeccionar variables
//var_dump($_SERVER["PHP_SELF"])
$url = basename($_SERVER["PHP_SELF"]);
//var_dump($url);
$url = explode(".", $url);
//var_dump($url[0]);
//var_dump($txtBuscar);

setcookie("ultimaVista", $txtBuscar, time() + 86400 * 30);


$txtBuscar = urldecode($txtBuscar); // Decodificar la cadena de búsqueda
$propiedades = mysqli_query($conn, "SELECT * FROM propiedades");
$encontrado = false;
foreach ($propiedades as $key => $propiedad) {
    if (strcasecmp($txtBuscar, $propiedad["nom_inm"]) == 0) {
        $datos = $propiedad;
        $encontrado = true;
        break;
    }
}
?>

<main>
    <?php if ($encontrado) {
    ?>
        <!-- <div>
            <section>
                <div id="carouselExample" class="carousel slide mx-auto" style="max-width: 600px;">
                    <div class="carousel-inner">
                        <?php
                        $idBuscar = $datos['id'];
                        $query = "SELECT i.nombre FROM propiedades p JOIN imagenes i ON p.id = i.id_propiedad WHERE p.id = '$idBuscar'";
                        $resultado = mysqli_query($conn, $query);
                        $active = true;
                        echo $idBuscar;
                        // Recorremos todas las filas de resultados con un bucle while
                        while ($img = mysqli_fetch_assoc($resultado)) {
                            $class = $active ? 'active' : '';
                            echo "<div class='carousel-item $class '><img src='imgPropiedades/upload/" . $img['nombre'] . "' class='d-block w-100 carousel-image' alt='Imagen propiedades'></div>";
                            $active = false;
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div id="imagenSeleccionada" class="text-center"></div>
            </section>
        </div> -->




        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="text-center mb-5">
                                <div id="carouselExample" class="carousel slide mx-auto" style="max-width: 600px;">
                                    <div class="carousel-inner">
                                        <?php
                                        $idBuscar = $datos['id'];
                                        $query = "SELECT i.nombre FROM propiedades p JOIN imagenes i ON p.id = i.id_propiedad WHERE p.id = '$idBuscar'";
                                        $resultado = mysqli_query($conn, $query);
                                        $active = true;
                                        echo $idBuscar;
                                        // Recorremos todas las filas de resultados con un bucle while
                                        while ($img = mysqli_fetch_assoc($resultado)) {
                                            $class = $active ? 'active' : '';
                                            echo "<div class='carousel-item $class'><img src='imgPropiedades/upload/" . $img['nombre'] . "' class='d-block w-100 carousel-image' alt='Imagen propiedades'></div>";
                                            $active = false;
                                        }
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th colspan="2">Detalles de la propiedad</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><strong>Nombre:</strong> </td>
                                                <td style="text-align:center;"><strong>Direccion:</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $datos['nom_inm']; ?></td>
                                                <td style="text-align:center;"><?php echo $datos['direccion']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><strong>Precio:</strong> </td>
                                                <td style="text-align:center;"><strong>Provincia:</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;">$<?php echo $datos['precio']; ?></td>
                                                <td style="text-align:center;"><?php echo $datos['provincia']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><strong>Baños:</strong> </td>
                                                <td style="text-align:center;"><strong>Ciudad:</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $datos['banios']; ?></td>
                                                <td style="text-align:center;"><?php echo $datos['ciudad']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"> <strong>Garaje:</strong></td>
                                                <td style="text-align:center;"><strong>Categoria:</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $datos['cochera']; ?></td>
                                                <td style="text-align:center;"><?php echo $datos['categoria']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><strong>Cuartos:</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $datos['cuartos']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 text-center">
                                    <?php if (isset($_SESSION["nombre"])) :
                                        $query = "SELECT * FROM propiedades WHERE nom_inm = '$txtBuscar'";
                                        $resultado = mysqli_query($conn, $query);
                                        $propiedad = mysqli_fetch_assoc($resultado);

                                        $id_vendedor = $propiedad['usuario']; // ID del vendedor de la propiedad

                                        // Consultar la información del vendedor
                                        $query = "SELECT * FROM usuario WHERE id = $id_vendedor";
                                        $resultado = mysqli_query($conn, $query);
                                        $vendedor = mysqli_fetch_assoc($resultado);
                                    ?>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Contacto</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><i class="material-icons" style="vertical-align: middle;">call</i></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><a href="tel:<?php echo $vendedor['numTel']; ?>"><?php echo $vendedor['numTel']; ?></a></td>
                                            <tr>
                                                <td style="text-align:center;"><i class="material-icons" style="vertical-align: middle;">perm_phone_msg</i></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><a href="https://wa.me/<?php echo $vendedor['numWha']; ?>" target="_blank"><img src="img/WhatsAppButtonGreenLarge.svg" alt=""></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><i class="material-icons" style="vertical-align: middle;">mail</i></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;"><a href="mailto:<?php echo $vendedor['email']; ?>"><?php echo $vendedor['email']; ?></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;">
                                                    <i class="material-icons" style="vertical-align: middle;">qr_code</i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center;">
                                                    <?php
                                                    require 'phpqrcode/qrlib.php';
                                                    $dir = 'temp/';
                                                    if (!file_exists($dir)) {
                                                        mkdir($dir);
                                                    }
                                                    $filename = $dir . 'test.png';
                                                    $tamaño = 4;
                                                    $level = 'L';
                                                    $framSize = 3;
                                                    $contenido = "http://localhost/ProyectoProgralllV4/infopropiedades.php?p=" . $txtBuscar;
                                                    QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
                                                    echo '<img src="' . $dir . basename($filename) . '">';
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
        </section>
    <?php else : ?>
        <table class="table table-borderless">
        <tr>
            <td style="text-align:center;">
                <i class="material-icons" style="vertical-align: middle;">qr_code</i>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;">
                <?php
                                        require 'phpqrcode/qrlib.php';
                                        $dir = 'temp/';
                                        if (!file_exists($dir)) {
                                            mkdir($dir);
                                        }
                                        $filename = $dir . 'test.png';
                                        $tamaño = 4;
                                        $level = 'L';
                                        $framSize = 3;
                                        $contenido = "http://localhost/ProyectoProgralllV4/infopropiedades.php?p=" . $txtBuscar;
                                        QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
                                        echo '<img src="' . $dir . basename($filename) . '">';
                ?>
            </td>
        </tr>
        </table>
        <section class="page-contacto">
            <div class="container">
                <h2 class="titulo-seccion">Contacto</h2>
                <div class="contenedor-contacto">
                    <p>Para ver esta información, <a href="login.php">iniciar sesión</a></p>
                </div>
            </div>
        </section>
    <?php endif; ?>
    </section>

<?php } else {
        echo "<h2>No hay resulatdos para la busqueda: $txtBuscar</h2>";
    } ?>
<h2></h2>

</main>
<?php include "footer.php" ?>