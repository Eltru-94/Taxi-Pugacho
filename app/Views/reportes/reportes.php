<script>

    let tablaReportAssistance = $('#tableReportAssistance').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Reporte asistencia",
            "zeroRecords": "No se encontraron carreras pendientes",
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

    let tablaReportUsers = $('#tableReportUsers').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Reporte asistencia",
            "zeroRecords": "No se encontraron carreras pendientes",
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

    let tablaReportFrequency = $('#tableReportFrequency').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Reporte frecuencia",
            "zeroRecords": "No se encontraron carreras pendientes",
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


    function loadReportAssistance() {
        tablaReportAssistance.row().clear();
        let Url = "<?php echo base_url('reports/getAssistance') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                let contador = 1;

                res[0].forEach(assistance => {
                    let colorReport = reporteColor(assistance.reporte);
                    let colorUnidad = `<span class="badge badge-pill bg-primary">` + assistance.unidad + `</span> <span><i class="fas fa-car"></i></span>`;
                    tablaReportAssistance.row.add([contador, assistance.nombre + " " + assistance.apellido, colorUnidad, colorReport, assistance.descripcion, assistance.created_at]);
                    contador++;
                });

                tablaReportAssistance.draw(true);

            }
        });
    }

    function loadReportUsers() {

        tablaReportUsers.row().clear();

        let Url = "<?php echo base_url('reports/getUsers') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                let contador = 1;
                console.log(res)
                res[0].forEach(users => {
                    let state = colorUsersStates(users.estado);
                    tablaReportUsers.row.add([contador, users.nombre, users.apellido, users.cedula, users.correo, users.direccion, users.rol, users.telefono, users.licencia, users.fechanacimiento, state]);
                    contador++;
                });
                tablaReportUsers.draw(true);
            }
        });
    }


    function loadReportFrequency() {

        tablaReportFrequency.row().clear();

        let Url = "<?php echo base_url('reports/getFrequency') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                let contador = 1;

                res[0].forEach(users => {
                    let unidad = colorUnidad(0, users.unidad);
                    let fecha = users.dia + "/" + users.mesId + "/20" + users.anio;
                    tablaReportFrequency.row.add([contador, users.nombre, users.apellido, users.cedula, users.correo, users.placa, unidad, `<i class="fas fa-dollar-sign"></i>` + users.valor, fecha]);
                    contador++;
                });
                tablaReportFrequency.draw(true);
            }
        });
    }

    function report() {
        loadReportAssistance();
        loadReportUsers();
        loadReportFrequency();
    }

    window.onload = report();
</script>
