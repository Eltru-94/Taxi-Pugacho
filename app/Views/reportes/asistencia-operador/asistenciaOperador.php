<script>

    let tablaReportAssistanceOperadores = $('#tableReportAssistanceOperadores').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Reporte asistencia operadores",
            "zeroRecords": "No se encontraron asistencia de operadores",
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

    function loadAsistenciaOperadores() {
        let Url = "<?php echo base_url('operadores/select') ?>";
        tablaReportAssistanceOperadores.row().clear();
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {
                let contador=1;

                res['operadores'].forEach(ope => {
                    let horario=colorSechendulle(ope.horario);
                    let estado=colorOperadorStates(ope.estado)

                    tablaReportAssistanceOperadores.row.add([contador,ope.nombre,ope.apellido,horario,ope.fecha,ope.tiempoinicio,ope.tiempofin,estado]);
                    contador++;
                })

                tablaReportAssistanceOperadores.draw(true);
            }

        })
    }


    window.onload = loadAsistenciaOperadores;
</script>