function AbrirModalRestablecer(){
    $("#modal_restablecer_contra").modal({backdrop: 'static', keyboard:false});
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('shown.bs.modal', function(){
        $("#email").focus();
    });
}

function mensaje(texto, tipo) {
    Swal.fire(
      'Mensaje',
      texto,
      tipo
    );
  }

  