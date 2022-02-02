<script>

    let tablaVehiculoEnable = $('#tablaVehiculoEnable').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Unidades Activas",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registro de usuarios del _START_ al _END_ de un total de _TOTAL_",
            "infoEmpty": "Mostrando registro del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado un todal de _MAX_ re)",
            "sSearch": "Buscar : ",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        },
    });


    function loadVehicleEnable() {

        tablaVehiculoEnable.row().clear();
        let Url = "<?php echo base_url('profile/vehicleEnable') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                let contador = 1;

                res[0].forEach(vehicle => {
                    let horario=colorSechendulle(vehicle.horario);
                    let fecha = vehicle.dia + "/" + vehicle.mesId + "/" + vehicle.anio;
                    let colorUnidad = `<span class="badge badge-pill bg-primary">` + vehicle.unidad + `</span> <span><i class="fas fa-car"></i></span><span class="badge badge-pill bg-warning">&nbsp;Activada</span>`;
                    tablaVehiculoEnable.row.add([contador, colorUnidad,horario, vehicle.placa, fecha]);
                    contador++;
                });

                tablaVehiculoEnable.draw(true);

            }
        });
    }

    window.onload = loadVehicleEnable();
</script>
