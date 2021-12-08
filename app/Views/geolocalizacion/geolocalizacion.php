<script>
var map = L.map('map').setView([0.35171, -78.12233], 10);


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
    foo: 'bar',
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

map.locate({setView: true, maxZoom: 16});

var littleton = L.marker([0.35171, -78.12233]).bindPopup('This is Littleton, CO.');
littleton.addTo(map);
map.on('locationerror', errorLocalizacion);
map.on('locationfound', buscarLocalizacion).bindPopup('This is Littleton, CO.');


function buscarLocalizacion(e) {
    var littleton= L.marker(e.latlng).addTo(map);
    littleton.bindPopup('This is Littleton, CO.');
}

function errorLocalizacion(e) {
   alert("No es posible encontrar su ubicación. Es posible que tenga que activar la geolocalización.");
}

</script>