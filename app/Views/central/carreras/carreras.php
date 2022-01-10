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
                    a=unitEnable.id_unitActiva;
                    b=unitEnable.id_carrera;
                    temp = tablaVehiculoEnable.row.add([cont,unitEnable.direccion_origen,unitEnable.direccion_destino,
                        unitEnable.telefono_persona,unitEnable.dateInicio,horario,auto,unitEnable.descripcion,`<a class='btn btn-outline-primary' title="Crear Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreraState" onclick="createCarrera(`+a+`,`+b+`)"> <i class='fas fa-car'></i></a> <a class='btn btn-outline-primary' title="Crear Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreras" onclick="updateCarrera(`+unitEnable.id_carrera +`)"> <i class='fas fa-edit'></i></a>`]);
                    cont++;

                });
                tablaVehiculoEnable.draw(true);


            }
        });
    }

function  updateCarrera(id){
    let Url = "<?php echo base_url('carreras/selectId') ?>";
    $.ajax({
        method: 'post',
        url: Url,
        data: {

            'id_carrera':id,

        },
        dataType: 'json',
        success: function(res) {

           $('#origen').val(res[0].direccion_origen);
            $('#destino').val(res[0].direccion_destino);
            $('#telefono').val(res[0].telefono_persona);
            $('#descripcion').val(res[0].descripcion);
            $('#id_carrera').val(res[0].id_carrera)
            tipoCarrera(res[0].id_servicio);

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


                $('#modalCarreraState').modal('hide');
                $('#forEstadoCarrera').trigger('reset');
                    loadCarrerasEnable();


            }
        });



    }

    function tipoCarrera(aux) {

        let Url = "<?php echo base_url('carreras/tipocarrera') ?>";
        let tipocarrera = document.getElementById("carrera");
        let mensaje = " <option  value=''>Escoga el tipo de carrera...</option>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                res.forEach(ser => {
                    if (aux == ser.id_servicio) {
                        mensaje += "<option  selected value='" + ser.id_servicio + "'>" + ser.servicio +
                            "</option>";
                    } else {
                        mensaje += "<option value='" + ser.id_servicio + "'>" +ser.servicio + "</option>";
                    }

                });
                tipocarrera.innerHTML = mensaje;
            }
        });
    }

    $("#forCarreras").on('submit',function (e) {
        e.preventDefault();

        let Url="<?php echo base_url('carreras/dateUpdate')?>";

        $.ajax({
            type: 'post',
            url: Url,
            data: 'action_type=view&'+$("#forCarreras").serialize(),
            dataType: "json",
            success:function(res){
                //ClearErrorCarrera();
                console.log(res);
                if(res.success){
                    $('#modalCarreras').modal('hide');
                    toastr["success"](res.success);
                    loadCarrerasEnable();

                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forCarreras').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });

    });

    window.onload=loadCarrerasEnable();
</script>
