//determinar si la pagina se cargo mediante btn modificar 
if (sessionStorage.getItem("id") != null) {
  var id = parseInt(sessionStorage.getItem("id"));
  sessionStorage.clear();
  getPropiedad(id);
} else {
  var id = -1;
}


//evento borrar
document.querySelector("#guardar").onclick = () => {
  //alert("guardar");
  //serializar los datos del formulario
  const datos = $("#frmPropiedad").serialize();
  //adjuntar imagenes a la peticion ajax
  const formData = new FormData();
  const files = $("#imagen")[0].files; // obtener los archivos de imagen seleccionados por el usuario

  for (let i = 0; i < files.length; i++) {
    formData.append('imagen[]', files[i]); // agregar cada archivo al objeto FormData
  }

  //determinar la accion guardar|modificar
  if (id > -1) {
    tipoPeticion = "post";
    urlPeticion = `https://jcruz.site/api/src/public/updPropiedad?${datos}&id=${id}`
  } else {
    tipoPeticion = "post";
    urlPeticion = `https://jcruz.site/api/src/public/insPropiedad?${datos}`
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
      if (res == "Propiedad insertada correctamente") {
        mensaje('Propiedad creada correctamente', 'success');
        console.log(res);
      } else if (res == "Propiedad modificada correctamente") {
        console.log(res);
        mensaje('Propiedad Modificada correctamente', 'success');
      } else {
        mensaje('[Error] No se pudo crear la Propiedad', 'error');
        console.log(res);
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

function getPropiedad(id) {
  $.ajax({
    type: "get",
    url: `https://jcruz.site/api/src/public/listPropiedad/${id}`,
    dataType: "JSON",
    beforeSend: function () {
      //document.querySelector(".cargando").style.visibility="visible";
    },
    success: function (res) {
      console.log(res);
      document.querySelector("#nom_inm").value = res.nom_inm;
      document.querySelector("#direccion").value = res.direccion;
      document.querySelector("#ciudad").value = res.ciudad;
      document.querySelector("#precio").value = res.precio;
      document.querySelector("#cuartos").value = res.cuartos;
      document.querySelector("#banios").value = res.banios;
      document.querySelector("#cochera").value = res.cochera;
      document.querySelector("#provincia").value = res.provincia;
      document.querySelector("#categoria").value = res.categoria;
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
