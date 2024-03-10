<?php
include "header.php";
include "admin/config.php";
?>

<main>

    <section class="text-end">
        <button type="button" class="btn-negro" id="liveToastBtn">¿Por qué elegirnos?</button>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="favicon.ico" class="rounded me-2" alt="...">
                    <strong class="me-auto">¿Por que elegirnos?</strong>

                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Porque su empresa y su proyecto son importantes para nosotros. Porque nos implicamos al cien por
                    cien en cada proyecto. Porque somos flexibles, nos adaptamos a las necesidades de su empresa.
                    Porque trabajamos en equipo con nuestros clientes.
                </div>
            </div>
        </div>
    </section>


    <?php if (isset($_COOKIE["ultimaVista"])) { ?>
        <section>
            <div class="text-center">
                <div class="row justify-content-evenly align-items-center">
                    <h2 class="col-sm-12 mb-3  text-center">Aún te interesa</h2>
                    <?php
                    $propiedades = mysqli_query($conn, "SELECT * FROM propiedades");
                    foreach ($propiedades as $key => $propiedad) {
                        if (strcasecmp($propiedad["nom_inm"], $_COOKIE["ultimaVista"]) == 0) {
                            echo "
                    <div class='card col-md-6 col-lg-4' style='width: 27rem;'>
                    <div class='badge bg-danger text-white position-absolute' style='top: 26.0rem; right: 20.8rem'>$propiedad[categoria]</div>
                    <br>
                    <img src='imgPropiedades/upload/$propiedad[id]_0.jpg' class='card-img-custom' alt='Banner pelicula patito'>
                    <div class='card-body'>
                    <span class=''><h4>$propiedad[nom_inm]</h4></span>
                    <span class=''>$$propiedad[precio]</span>
                    <br>
                    <a href='infopropiedades.php?p=$propiedad[nom_inm]' class='btn btn-negro' >Mas información</a>
                    </div>
                </div>";
                        }
                    }
                    ?>
        </section>
    <?php } ?>
    </div>
    </div>

    <section>
        <main class="text-center">
            <div class="row justify-content-evenly align-items-center">
                <h2 class="col-sm-12 mb-3  text-center">Propiedades</h2>

                <?php
                $propiedades = mysqli_query($conn, "SELECT * FROM propiedades ORDER BY id DESC LIMIT 10");
                foreach ($propiedades as $key => $propiedad) {
                    echo "
                    
                    <div class='card col-md-6 col-lg-4' style='width: 27rem;'>
                    <div class='badge bg-danger text-white position-absolute' style='top: 26.0rem; right: 20.8rem'>$propiedad[categoria]</div>
                    <br>
                    <img src='imgPropiedades/upload/$propiedad[id]_0.jpg' class='card-img-custom' alt='Banner pelicula patito'>
                    <div class='card-body'>
                    <span class=''><h4>$propiedad[nom_inm]</h4></span>
                    <span class=''>$$propiedad[precio]</span>
                    <br>
                    <a href='infopropiedades.php?p=$propiedad[nom_inm]' class='btn btn-negro' >Mas información</a>
                    </div>
                </div>";
                }
                ?>


            </div>

        </main>
    </section>

    <section>
        <div class="testimonial-section">

            <h2 class="text-center">Testimonios</h2>
            <?php
            // Consulta para obtener los testimonios de la base de datos
            $query = "SELECT * FROM testimonios ORDER BY fecha DESC";
            $result = mysqli_query($conn, $query);

            // Iteración sobre los testimonios
            while ($row = mysqli_fetch_assoc($result)) {
                $nombre = $row['nombre'];
                $email = $row['email'];
                $comentario = $row['comentario'];
                $fecha = $row['fecha'];

                // Impresión del testimonio
                echo '<div class="testimonial-card">';
                echo '<div class="info-testimonial">';
                echo '<img src="img/comillas.svg">';
                echo '<p>', '<strong>' . $comentario . '</strong>', '</p>';
                echo '</div>';
                echo '<div class="profile">';
                echo '<h4>' . $nombre . '</h4>';
                echo '<p>' . $email . '</p>';
                echo '<p>' . $fecha . '</p>';
                echo '</div>';
                echo '</div>';
            }
            // Liberar recursos
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>

    </section>

</main>

<?php include "footer.php" ?>