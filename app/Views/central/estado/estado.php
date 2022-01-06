<script>

    let tablaStateCarrera = $('#tablaCarrerasState').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Carreras",
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
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "2000",
        "timeOut": "2000",
        "extendedTimeOut": "2000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function loadUnitEnable() {

        tablaStateCarrera.row().clear();
        let Url = "<?php echo base_url('carreras/alldisable') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let cont = 1;
                let horario="";
                let carrera="";

                let auto="";
                res.forEach(unitEnable => {

                    switch (unitEnable.id_servicio){
                        case ('3'):

                            horario= ' <span class="badge badge-pill bg-primary">'+unitEnable.servicio+'</span>'
                            auto='<span class="badge badge-pill bg-primary">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('2'):
                            horario= ' <span class="badge badge-pill bg-secondary">'+unitEnable.servicio+'</span>'
                            auto='<span class="badge badge-pill bg-secondary">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('1'):
                            horario= ' <span class="badge badge-pill bg-success">'+unitEnable.servicio+'</span>'
                            auto='<span class="badge badge-pill bg-success">'+unitEnable.unidad+'</span> <span><i class="fas fa-car"></i></span>'
                            break;
                    }
                    switch (unitEnable.carrera){
                        case ('3'):
                            carrera= ' <span class="badge badge-pill bg-danger">Perdida</span>'

                            break;
                        case ('2'):
                            carrera= ' <span class="badge badge-pill bg-success">Realizada</span>'
                            break;
                        case ('1'):
                            carrera= ' <span class="badge badge-pill bg-warning">Cancelada</span>'
                            break;
                    }
                    temp = tablaStateCarrera.row.add([cont,unitEnable.direccion_origen,
                        unitEnable.direccion_destino,unitEnable.dateInicio,unitEnable.dateFin,carrera,horario, auto]);
                    cont++;

                });
                tablaStateCarrera.draw(true);
            }
        });
    }







    window.onload=loadUnitEnable();
</script>