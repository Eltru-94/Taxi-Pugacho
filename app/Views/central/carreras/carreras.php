<script>

    let tablaVehiculoEnable = $('#tablaCarrerasEnable').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Usuarios",
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

    function loadCarrerasEnable() {
        tablaVehiculoEnable.row().clear();
        let Url = "<?php echo base_url('carreras/allenable') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                console.log(res);
                let cont = 1;
                let horario="";
                let a="";
                let b="";

                let auto="";
                res.forEach(unitEnable => {
                    switch (unitEnable.id_servicio){
                        case ('3'):
                            horario= ' <span class="badge badge-pill bg-primary"'>+unitEnable.servicio+'</span>'
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
                    a=unitEnable.id_unitActiva;
                    b=unitEnable.id_carrera;
                    temp = tablaVehiculoEnable.row.add([cont,unitEnable.direccion_origen,unitEnable.direccion_destino,
                        unitEnable.telefono_persona,unitEnable.dateInicio,horario,auto,`<a class='btn btn-outline-primary' title="Crear Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreraState" onclick="createCarrera(`+a+`,`+b+`)"> <i class='fas fa-car'></i></a>`]);
                    cont++;

                });
                tablaVehiculoEnable.draw(true);


            }
        });
    }

    function createCarrera(idUnidadActiva,idCarrera){

        $("#idcarrera").val(idCarrera);
        $("#idUnidadActiva").val(idUnidadActiva);

    }
    function  estadoCarrera(id){

        let idcarrera=$("#idcarrera").val();
        let carrera=id;
        let idUnidadActiva=$("#idUnidadActiva").val();
        let Url = "<?php echo base_url('carreras/updatecarrera') ?>";
        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'carrera': carrera,
                'id_carrera':idcarrera,
                'id_unitActiva':idUnidadActiva
            },
            success: function(res) {
                console.log(res);

                    $('#modalCarreraState').modal('hide');
                    loadCarrerasEnable();


            }
        });



    }

    window.onload=loadCarrerasEnable();
</script>
