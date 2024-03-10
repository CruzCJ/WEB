<footer class="row">
    <div class="col-lg-3 col-md-12">
        <img src="img/logoC.jpg" alt="" width="100">
    </div>
    <div class="col-lg-3 col-md-4">
        <h3>Programación</h3>
        <p><a href="propiedades.php">Lista de propiedades</a></p>
    </div>
    <div class="col-lg-3 col-md-4">
        <h3>Acerca de Nosotros</h3>
        <p><a href="acerca.html">Quienes Somos</a></p>
    </div>
    <div class="col-lg-3 col-md-4">
        <h3>Contáctenos</h3>
        <p><a href="contactenos.php">Contáctenos</a></p>
        <?php if (isset($_SESSION["nombre"])) : ?>
            <p><a href="testimonio.php">Testimonios</a></p>
    </div>
<?php else : ?>
<?php endif; ?>
</footer>

<style>
    footer a {
        text-decoration: none;
    }
</style>

<!-- Add your site or application content here -->


<!-- <img src="" alt="">-->

<script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/97cef9f55a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
<script src="js/inmueble.js"></script>


<?php
ob_end_flush();
?>


</body>

</html>