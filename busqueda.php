<?php
include "header.php";
include "bd.php";
include "admin/config.php";
?>


<main>
    <a href="index.php" class="color">Regresar</a></p>

    <section>
        <div class="box-buscar-propiedades pos-centrada">
            <div class="box-interior">
                <p>Filtro de propiedades</p>
                <form action="" method="post">
                    <select name="provincia" id="provincia">
                        <option value="">Provincias</option>
                        <option value="San José">San José</option>
                        <option value="Alajuela">Alajuela</option>
                        <option value="Cartago">Cartago</option>
                        <option value="Heredia">Heredia</option>
                        <option value="Guanacaste">Guanacaste</option>
                        <option value="Puntarenas">Puntarenas</option>
                        <option value="Limón">Limón</option>
                    </select>
                    </select>
                    <select name="categoria" id="categoria">
                        <option value="">Categoria</option>
                        <option value="Venta">Venta</option>
                        <option value="Alquiler">Alquiler</option>
                    </select>
                    <br>
                    <br>
                    <div style="margin-bottom: 23px !important;"><input style="font-size: 15px; text-align: center;" type="number" name="cuartos" id="cuartos" placeholder="Cuartos"></div>
                    <div style="margin-bottom: 23px !important;"><input style="font-size: 15px; text-align: center;" type="text" name="nom_inm" id="nom_inm" placeholder="Nombre"></div>
                    <input class="text" type="number" name="precio_minimo" id="precio_minimo" placeholder="Precio Minimo $">
                    <input class="text" type="number" name="precio_maximo" id="precio_maximo" placeholder="Precio Maximo $">
                    <br>
                    <br>
                    <!-- <input type="range" class="form-range" id="precio" name="precio" min="0" max="1000000" step="100" value="500000"> -->
                    <input type="submit" value="Filtrar" name="buscar"></input>
                </form>
            </div>
        </div>
    </section>



    <section class="text-center">
        <div class="align-items-center">
            <?php
            $sql = "SELECT * FROM propiedades WHERE 1=1";

            if (!empty($_POST['provincia'])) {
                $sql .= " AND provincia='$_POST[provincia]'";
            }

            if (!empty($_POST['cuartos'])) {
                $sql .= " AND cuartos='$_POST[cuartos]'";
            } else {
            }

            if (!empty($_POST['categoria'])) {
                $sql .= " AND categoria='$_POST[categoria]'";
            }


            if (!empty($_POST['nom_inm'])) {
                $busqueda = "%{$_POST['nom_inm']}%";
                $sql .= " AND nom_inm LIKE '$busqueda'";
            }

            if (!empty($_POST['precio_minimo']) && !empty($_POST['precio_maximo'])) {
                $precio_minimo = $_POST['precio_minimo'];
                $precio_maximo = $_POST['precio_maximo'];
                $sql .= " AND precio >= $precio_minimo AND precio <= $precio_maximo";
            }
            ?>

            <div class="row justify-content-evenly align-items-center">
                <?php
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($result as $key => $propiedad) {
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
                } else {
                    echo "<h2>No hay resultados para la búsqueda</h2>";
                }

                ?>
            </div>
        </div>
    </section>



</main>


<?php include "footer.php"; ?>