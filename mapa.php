<head>
    <?php
    include "header.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>

<body>

    <div class="cargando">
        <img src="img/cargando.gif" alt="">
    </div>
    <!--Contenedor principal-->
    <div id="contenedor">
        <!--Cabecera-->
        <!--Fin Cabecera-->

        <!--Elemento Principal-->
        <div class="container-form mx-auto">
            <h1 class="text-center">Nuestras sedes</h1>
            <!--Elemento Contenido-->
            <div id="contenido">
                <fieldset>
                    <select class="form-control mb-3" id="provincia">
                        <option value="Costa Rica">Seleccione una provincia</option>
                        <option value="San Jose">San José</option>
                        <option value="Cartago">Cartago</option>
                        <option value="Hojancha, CR">Guanacaste</option>
                    </select>
                </fieldset>
                <br>
                <h2 style="text-align: center;">Mapa</h2>
                <div style="text-align: center;">
                    <fieldset id="contenedorMapa" class="container" style="width: 700px; margin: 0 auto;">
                        <div id="mapaProvincia" class="container" style="width: 700px; height: 400px;"></div>
                    </fieldset>
                </div>
                <br>
                <div id="San Jose-info" style="display: none;">
                    <h2>Información sobre la sede de la empresa en San José</h2>
                    <p>Tu inmueble S.A</p>
                    <p>Horario: 7:00 a 17:00</p>
                    <p>Dirección: San Jose, a un costado del Hotel Talamanca</p>
                    <p>Numero de la empresa: <a href="tel:+50680752367">+506 80752367</a></p>
                </div>
                <div id="Cartago-info" style="display: none;">
                    <h2>Información sobre la sede de la empresa en Cartago</h2>
                    <p>Tu inmueble S.A</p>
                    <p>Horario: 7:00 a 17:00</p>
                    <p>Dirección: Cartago centro, a un costado del Hotel Savegre</p>
                    <p>Numero de la empresa: <a href="tel:+50680752367">+506 80752367</a></p>
                </div>
                <div id="Hojancha, CR-info" style="display: none;">
                    <h2>Información sobre la sede de la empresa en Guanacaste</h2>
                    <p>Tu inmueble S.A</p>
                    <p>Horario: 7:00 a 17:00</p>
                    <p>Dirección: Hojancha centro, a un costado del parque central</p>
                    <p>Numero de la empresa: <a href="tel:+50680752367">+506 80752367</a></p>
                </div>
            </div>
            <!--Fin elemento Contenido-->
        </div>
        <!--Fin Elemento Principal-->
    </div>
    <!--Fin Contendor principal-->
    <script>
        const provincias = document.querySelectorAll('div[id$="-info"]');
        const provinciaSelect = document.querySelector('#provincia');

        function mostrarInfoProvincia() {
            const selectedProvincia = provinciaSelect.value;
            provincias.forEach((provincia) => {
                if (provincia.id === `${selectedProvincia}-info`) {
                    provincia.style.display = 'block';
                } else {
                    provincia.style.display = 'none';
                }
            });
        }

        provinciaSelect.addEventListener('change', mostrarInfoProvincia);

        // Mostrar la información de la provincia seleccionada al cargar la página
        mostrarInfoProvincia();
    </script>
</body>

<footer></footer>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="js/mapa.js"></script>



<?php include "footer.php" ?>