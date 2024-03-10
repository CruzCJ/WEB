<?php
include "header.php";
?>
<section>
<div class="container-form mx-auto">
    <div class="row">
      <div class="">
        <div class="well well-sm">
          <form class="form-horizontal" method="POST" action="contactEnvio.php" id="form">
            <fieldset>
              <h2 class="header titulo text-center">Contactenos</h2>
              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <div class="">
                  <input id="nombre" name="nombre" type="text" placeholder="Nombre completo" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                <div class="">
                  <input id="email" name="email" type="text" placeholder="Dirección de Correo" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <div class="">
                  <textarea class="form-control" id="Mensaje_del_Usuario" name="Mensaje_del_Usuario" placeholder="Realizar consulta / Evaluar sitio" rows="7"></textarea>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary btn-lg" name="enviar">Enviar Mensaje</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  const form = document.querySelector("#form");
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    fetch(event.target.action, {
        method: 'POST',
        body: new FormData(event.target)
      })
      .then(() => {
        Swal.fire({
          icon: 'success',
          title: '¡Gracias por tu mensaje!',
          text: 'Nos pondremos en contacto contigo pronto.'
        }).then(() => {
          form.reset();
        });
      });
  });
</script>

<?php include "footer.php" ?>