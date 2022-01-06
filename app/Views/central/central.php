<script>

    let tablaVehiculoEnable = $('#tablaCarreras').DataTable({
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
        tipoCarrera(0);
        tablaVehiculoEnable.row().clear();
        let Url = "<?php echo base_url('carreras/all') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function(res) {
                let cont = 1;
                let horario="";

                let auto="";
                res.forEach(unitEnable => {
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
                    temp = tablaVehiculoEnable.row.add([cont,unitEnable.placa,
                        horario,auto+'&nbsp;<span class="badge badge-pill bg-warning">Activa</span>',`<a class='btn btn-outline-primary' title="Crear Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreras" onclick="createCarrera(`+unitEnable.id_unitActiva +`)"> <i class='fas fa-taxi'></i></a>`]);
                    cont++;

                });
                tablaVehiculoEnable.draw(true);
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

        let Url="<?php echo base_url('carreras/store')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: 'action_type=view&'+$("#forCarreras").serialize(),
            dataType: "json",
            success:function(res){
                ClearErrorCarrera();
                if(res.success){
                    $('#modalCarreras').modal('hide');
                    toastr["success"](res.success);
                    loadUnitEnable();
                console.log(res);
                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forCarreras').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });

    });

    function createCarrera(id){
        $('#id_unitActiva').val(id);
    }

    function  ClearErrorCarrera()
    {
        $('#forCarreras').find('span.origen_error').text("");
        $('#forCarreras').find('span.destino_error').text("");
        $('#forCarreras').find('span.telefono_error').text("");
        $('#forCarreras').find('span.carrera_error').text("");
    }

    function CloseCarrera(){
        $('#forCarreras').trigger('reset');
        ClearErrorCarrera();
    }

    window.onload=loadUnitEnable();
</script>
