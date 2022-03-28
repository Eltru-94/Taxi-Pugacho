<script>

    let tablaFrecuencia = $('#tablaFrecuencia').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Vehículos",
            "zeroRecords": "No se encontraron vehículos",
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


    function Buscar() {

        tablaFrecuencia.row().clear();
        let Url = "<?php echo base_url('frecuencia/getVehicleUser')?>";
        ClearErrorIdentification();
        $.ajax({
            type: "post",
            url: Url,
            data: {
                'cedula': $('#cedula').val()
            },
            dataType: "json",
            success: function (res) {
                let contador = 1;
                if (res.success) {

                    res['vehicle'].forEach(vehiculo => {
                        let unidad = colorUnidad(0, vehiculo.unidad);
                        let frecuencia = colorFrecuencia(vehiculo.pago);
                        let button = colorButtonFrequency(vehiculo.pago, vehiculo.id_vehiculo);
                        tablaFrecuencia.row.add([contador, vehiculo.nombre, vehiculo.apellido, vehiculo.cedula, vehiculo.placa, unidad, frecuencia, button])
                        contador++;
                    });

                } else {
                    $.each(res.error, function (prefix, val) {
                        $('#fromFrecuencia').find('span.' + prefix + '_error').text(val);
                    });
                }
                tablaFrecuencia.draw(true);
            }
        });
    }

    $('#fromFrecuencia').on('submit', function (e) {
        e.preventDefault();
        Buscar();
    })

    function ClearErrorIdentification() {
        $('#fromFrecuencia').find('span.cedula_error').text("");
    }


    function payBill(id_vehiculo) {
        selectVehicleUser(id_vehiculo);
    }

    function scheduleEdit(aux) {

        let schedule = document.getElementById("id_servicio");
        let mensaje = "";
        for (var i = 0; i < scheduleTaxis.length; i++) {
            if ((i + 1) == aux) {
                mensaje += "<option value='" + (i + 1) + "' selected>" + scheduleTaxis[i] + "</option>";
            } else {
                mensaje += "<option value='" + (i + 1) + "'>" + scheduleTaxis[i] + "</option>";
            }
        }
        schedule.innerHTML = mensaje;
    }

    function selectVehicleUser(id_vehiculo) {

        let Url = "<?php echo base_url('frecuencia/selectIdVehicle/')?>/" + id_vehiculo;
        $('#valor').prop( "disabled", false );
        $.ajax({
            type: "get",
            url: Url,
            dataType: "json",
            success: function (res) {

                $("#name").val(res.vehicle[0].nombre + " " + res.vehicle[0].apellido);
                $("#txtcedula").val(res.vehicle[0].cedula);
                $("#telefono").val(res.vehicle[0].telefono);
                $("#unidad").val("N.-" + res.vehicle[0].unidad);
                $("#placa").val(res.vehicle[0].placa);
                $("#id_vehiculo").val(id_vehiculo);
                $("#valor").val("30");
                scheduleEdit(0);
            }

        })
    }

$("#forVehicleState").on("submit",function (e){
    e.preventDefault();
    tablaFrecuencia.row().clear();
    let Url = "<?php echo base_url('frecuencia/storeVehicleEnable')?>";
    $.ajax({
        type: "post",
        url: Url,
        dataType: "json",
        data: $("#forVehicleState").serialize(),
        success: function (res) {
            console.log(res)
           $('#modalPayFrequency').modal('hide');
           toastr["success"](res.success);
           Buscar();
        }

    })

});
</script>
