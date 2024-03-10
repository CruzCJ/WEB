//determinar si la pagina se cargo mediante btn modificar 
if (sessionStorage.getItem("id") != null) {
  var id = parseInt(sessionStorage.getItem("id"));
  sessionStorage.clear();
  getUsuario(id);
} else {
  var id = -1;
}


//evento borrar
document.querySelector("#guardar").onclick = () => {
  //alert("guardar");
  //serializar los datos del formulario
  const datos = $("#frmUsuario").serialize();
  //adjuntar imagenes a la peticion ajax
  const formData = new FormData();
  formData.append('imagen', $("#imagen")[0].files[0]);

  //determinar la accion guardar|modificar
  if (id > -1) {
    tipoPeticion = "post";
    urlPeticion = `https://jcruz.site/api/src/public/updUsuario?${datos}&id=${id}`
  } else {
    tipoPeticion = "post";
    urlPeticion = `https://jcruz.site/api/src/public/insUsuario?${datos}`
  }
  $.ajax({
    type: tipoPeticion,
    url: urlPeticion,
    processData: false,
    contentType: false,
    data: formData,
    beforeSend: function () {
      //document.querySelector(".cargando").style.visibility = "visible";
    },
    success: function (res) {
      //instrucciones success
      console.log(res);
      if (res == "Insertando") {
        mensaje('Usuario creado correctamente', 'success');
      } else if (res == "Modificando Usuario") {
        mensaje('Usuario Modificado correctamente', 'success');
      } else {
        mensaje('[Error] No se pudo crear el usuario', 'error');
      }
    },
    error: function (xhr) {
      alert("Error al procesar la petición");
      console.log(xhr.statusText + xhr.responseText);
    },
    complete: function () {
      document.querySelector(".cargando").style.visibility = "hidden";
    }
  });

}

function mensaje(texto, tipo) {
  Swal.fire(
    'Mensaje',
    texto,
    tipo
  );
}

function getUsuario(id) {
  $.ajax({
    type: "get",
    url: `https://jcruz.site/api/src/public/listUsuarios/${id}`,
    dataType: "JSON",
    beforeSend: function () {
      //document.querySelector(".cargando").style.visibility="visible";
    },
    success: function (res) {
      console.log(res);
      document.querySelector("#cedula").value = res.cedula;
      document.querySelector("#email").value = res.email;
      document.querySelector("#password").value = res.password;
      document.querySelector("#nombre").value = res.nombre;
      document.querySelector("#apellidoUNO").value = res.apellidoUNO;
      document.querySelector("#apellidoDOS").value = res.apellidoDOS;
      document.querySelector("#fechaNacimiento").value = res.fechaNacimiento;
      document.querySelector("#numTel").value = res.numTel;
      document.querySelector("#numWha").value = res.numWha;
    },
    error: function (xhr) {
      alert("Error al procesar la petición");
      console.log(xhr.statusText + xhr.responseText);
    },
    complete: function () {
      //document.querySelector(".cargando").style.visibility="hidden";
    }
  });
}
