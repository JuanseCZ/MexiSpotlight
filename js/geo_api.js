var name = document.getElementById("name").value;
var lat = document.getElementById("lat").value;
var lon = document.getElementById("lon").value;

var map = L.map("map").setView([lat, lon], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocalización no soportada en este navegador.");
  }
}

L.marker([lat, lon]).addTo(map).bindPopup(name).openPopup();
