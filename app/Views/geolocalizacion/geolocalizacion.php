<script>
    var map = L.map('map').setView([0.35171, -78.12233], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
        foo: 'bar',
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    map.locate({setView: true, maxZoom:10 });
    //var littleton = L.marker([0.35171, -78.12233]).bindPopup('This is Littleton, CO.');
    //littleton.addTo(map);
    function locationVehicleEnable() {
        let Url = "<?php echo base_url('geolocalizacion/vehicleEnable')?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: "json",
            success: function (res) {
                res['location'].forEach(vehicleEnable => {
                    let mesnaje="<strong>Chofer : </strong>"+vehicleEnable.nombre+" "+vehicleEnable.apellido+"<br><strong>Unidad:</strong> "+vehicleEnable.unidad;
                    let littleton = L.marker([vehicleEnable.logitud, vehicleEnable.latitud]).bindPopup(mesnaje).openPopup();
                    littleton.addTo(map);
                })

            }
        });
    }

    window.onload = locationVehicleEnable;
</script>