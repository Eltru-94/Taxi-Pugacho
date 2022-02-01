<script>

    let tablaVehicleReport = $('#tablaVehiculoEnableNotReport').DataTable({
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



    function loadUnitEnable() {

        tablaVehicleReport.row().clear();
        let Url = "<?php echo base_url('enableUnit/selectReport') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let cont = 1;
                let horario="";
                let auto="";
                let reporte="";
                let reporteCarrera="";
                console.log(res)
                res['reporte'].forEach(unitEnable => {
                        reporte=reporteColor(unitEnable.reporte)
                    reporteCarrera = reporteButtonColor(unitEnable.reporte, unitEnable.id_unitActiva);
                    switch (unitEnable.horario){
                        case ('3'):
                            horario= ' <span class="badge badge-pill bg-primary">Tarde</span>'
                            auto='<span class="badge badge-pill bg-primary">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('2'):
                            horario= ' <span class="badge badge-pill bg-secondary">Mañana</span>'
                            auto='<span class="badge badge-pill bg-secondary">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('1'):
                            horario= ' <span class="badge badge-pill bg-success">Velada</span>'
                            auto='<span class="badge badge-pill bg-success">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                    }

                    tablaVehicleReport.row.add([cont,horario,auto+'&nbsp <span class="badge badge-pill bg-warning">Activa</span>',
                        reporte,unitEnable.created_at,reporteCarrera]);
                    cont++;

                });
                tablaVehicleReport.draw(true);
            }
        });
    }

    function carreraReporte(id) {
        $('#idUnitEnableCarrera').val(id);
    }
    window.onload=loadUnitEnable();
</script>
