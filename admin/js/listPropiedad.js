cargarTabla();
//evento borrar
document.querySelector("#datosTablaPropiedades").addEventListener('click', (e) => {
  if (e.target.classList.contains('btn-warning') ||
    e.target.classList.contains('fa-pencil-alt')
  ) {
    //alert("modificar");
    sessionStorage.setItem("id", e.target.closest("tr").childNodes[1].innerHTML);
    location.href = "nuevaPropiedad.php";

  } else if (e.target.classList.contains('btn-danger') ||
    e.target.classList.contains('fa-trash-alt')
  ) {
    //alert("eliminar");
    Swal.fire({
      title: 'Esta seguro que desea eliminar esta propiedad?',
      text: "La información no se podra recuperar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si',
    }).then((result) => {
      if (result.isConfirmed) {
        let id = e.target.closest("tr").childNodes[1].innerHTML;
        console.log(id);
        $.ajax({
          type: "delete",
          url: `https://jcruz.site/api/src/public/delPropiedad/${id}`,
          beforeSend: function () {
            //document.querySelector(".cargando").style.visibility="visible";
          },
          success: function (res) {
            //instrucciones success
            Swal.fire(
              'Mensaje',
              'Propiedad eliminada correctamente',
              'success'
            )
            //cargarTabla();
            e.target.closest("tr").remove();
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
    })
  }

})


function cargarTabla() {
  $.ajax({
    type: "get",
    url: "https://jcruz.site/api/src/public/listPropiedad",
    dataType: "JSON",
    beforeSend: function () {
      //document.querySelector(".cargando").style.visibility="visible";
    },
    success: function (res) {
      //instrucciones success
      //console.log(res);

      let filas = "";
      res.forEach(usr => {
        document.querySelector("#datosTablaPropiedades").innerHTML = "";
        filas += `<tr>
                    <td>${usr.id}</td>
                    <td>${usr.nom_inm}</td>
                    <td>${usr.direccion}</td>
                    <td>${usr.ciudad}</td>
                    <td>${usr.provincia}</td>
                    <td>${usr.precio}</td>
                    <td>${usr.cuartos}</td>
                    <td>${usr.banios}</td>
                    <td>${usr.cochera}</td>
                    <td>${usr.categoria}</td>
                    <td>${usr.usuario}</td>
                    <td>
                        <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>`

      });
      document.querySelector("#datosTablaPropiedades").innerHTML = filas;

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
