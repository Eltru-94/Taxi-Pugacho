<script>
    let tablaVehicleDisable = $('#tablaVehicleDisable').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Unidades no activadas",
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
    function loadVehicleDisable() {

        tablaVehicleDisable.row().clear();
        let Url = "<?php echo base_url('profile/vehicleDisable') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                let contador = 1;

                res[0].forEach(vehicle => {

                    let colorUnidad = `<span class="badge badge-pill bg-primary">` + vehicle.unidad + `</span> <span><i class="fas fa-car"></i></span><span class="badge badge-pill bg-danger">&nbsp;No pagada</span>`;
                    tablaVehicleDisable.row.add([contador, colorUnidad,vehicle.marca, vehicle.placa]);
                    contador++;
                });

                tablaVehicleDisable.draw(true);

            }
        });
    }

    window.onload = loadVehicleDisable();
</script>