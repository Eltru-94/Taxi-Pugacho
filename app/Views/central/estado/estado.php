<script>

    let tablaStateCarrera = $('#tablaCarrerasState').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Carreras",
            "zeroRecords": "No se encontraron carreras realizadas",
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

    function loadUnitEnable() {


        tablaStateCarrera.row().clear();
        let Url = "<?php echo base_url('carreras/allRaceMade') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let cont=1;

                console.log(res)
                res['carreras'].forEach(carreras => {
                    let unidad= colorUnidad(carreras.qualify,carreras.unidad);
                    let servicio=colorServicio(carreras.id_servicio,carreras.servicio);
                    let qualify=colorQualify(carreras.qualify)
                    tablaStateCarrera.row.add([cont,unidad,qualify,servicio,carreras.nombre+':'+carreras.telefono,carreras.telefono_cliente,carreras.dateInicio,carreras.dateFin,carreras.direccion_origen,carreras.direccion_destino,carreras.descripcion]);
                    cont++;
                });
                tablaStateCarrera.draw(true);
            }
        });
    }







    window.onload=loadUnitEnable();
</script>