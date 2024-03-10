//cargar mapa de costa rica
let mapa = null;
cargarMapa([9.7489, -83.7534], 8);
function cargarMapa(coords, zoom) {
  //reiniciar el contenedor del mapa
  document.querySelector("#contenedorMapa").innerHTML = `<div id='mapaProvincia' style='width: 700px; height: 400px'></div>`;
  //generar el view mapa
  mapa = L.map('mapaProvincia').setView(coords, zoom);
  //generar mapa
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicnNlcXVlaXJhIiwiYSI6ImNraDByOWZrdjB6ejYyd3BncjM5a2s5ZWgifQ.BKZKvJugnbvE3Pi8PeP4Jw'
  }).addTo(mapa);
}

document.querySelector("#provincia").onchange = () => {
  let prov = document.querySelector("#provincia").value;
  let url = `https://api.openweathermap.org/data/2.5/weather?q=${prov},CR&lang=es&units=metric&appid=5db604a191948ce24beb4f4a13299bcc`;
  $.ajax({
    type: "get",
    url: url,
    dataType: "JSON",
    beforeSend: function () {
      document.querySelector(".cargando").style.visibility = "visible";
    },
    success: function (res) {
      const selectProvincia = document.querySelector('#provincia');
      const provincia = selectProvincia.value;

      // Verificar si la opción seleccionada es "Costa Rica"
      if (provincia === 'Costa Rica') {
        // Llamar a la función cargarMapa con las coordenadas y el nivel de zoom para todo el país
        cargarMapa([9.7489, -83.7534], 8);
      } else {
        // Obtener las coordenadas y el nivel de zoom correspondientes a la provincia seleccionada
        let coords, zoom;
        switch (provincia) {
          case 'San Jose':
            coords = [res.coord.lat, res.coord.lon];
            zoom = 12;
            break;
          case 'Cartago':
            coords = [res.coord.lat, res.coord.lon];
            zoom = 12;
            break;
          case 'Hojancha, CR':
            coords = [res.coord.lat, res.coord.lon];
            zoom = 12;
            break;
          default:
            coords = [9.934739, -84.087502];
            zoom = 8;
        }

        // Llamar a la función cargarMapa con las coordenadas y el nivel de zoom correspondientes
        cargarMapa(coords, zoom);
        var marker = L.marker(coords).addTo(mapa);
      }
    },
    error: function (xhr) {
      alert("Error al procesar la petición");
      console.log(xhr.statusText + xhr.responseText);
    },
    complete: function () {
      document.querySelector(".cargando").style.visibility = "hidden";
    }
  })
};
