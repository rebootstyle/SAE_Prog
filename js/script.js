
function toggle_box() {
  var carte = document.getElementById("carte");
  var garph1 = document.getElementById("Graph1");
  var garph2 = document.getElementById("Graph2");
  var garph3 = document.getElementById("Graph3");
  if (carte.open) {
    carte.open = false
  } else {
    carte.open = true

  }
  if (garph1.open) {
    garph1.open = false
  } else {
    garph1.open = true

  }
  if (garph2.open) {
    garph2.open = false
  } else {
    garph2.open = true

  }
  if (garph3.open) {
    garph3.open = false
  } else {
    garph3.open = true

  }
}


var map = L.map('map').setView([49.133333, 6.166667], 8);
var OpenStreetMap_Mapnik = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
var marker = L.marker([49.133333, 6.166667]).addTo(map);
var marker2 = L.marker([48.734239,7.0557352]).addTo(map);
var marker3 = L.marker([49.3579272,6.1675872]).addTo(map);
OpenStreetMap_Mapnik.addTo(map);
function recuperdonneeaffciher(nbr){
  marker.bindPopup("<b>Metz</b><br>Le nombre d'objets perdus est de " + nbr[0]+".").openPopup();
  marker2.bindPopup("<b>Sarrebourg</b><br>Le nombre d'objets perdus est de " + nbr[1]+".").openPopup();
  marker3.bindPopup("<b>Thionville</b><br>Le nombre d'objets perdus est de " + nbr[2]+".").openPopup();
}

