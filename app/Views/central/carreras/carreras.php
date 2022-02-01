<script>

    let tablaCarrerasEnable = $('#tablaCarrerasEnable').DataTable({
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
        tablaCarrerasEnable.row().clear();
        let Url = "<?php echo base_url('carreras/allActivadas') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {
                let cont = 1;
                let auto = "";

                res['carrera'].forEach(carrera => {

                    switch (carrera.horario) {
                        case ('3'):
                            auto = '<span class="badge badge-pill bg-primary">' + carrera.unidad + '</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('2'):
                            auto = '<span class="badge badge-pill bg-secondary">' + carrera.unidad + '</span> <span><i class="fas fa-car"></i></span>'
                            break;
                        case ('1'):
                            auto = '<span class="badge badge-pill bg-success">' + carrera.unidad + '</span> <span><i class="fas fa-car"></i></span>'
                            break;
                    }

                    tablaCarrerasEnable.row.add([cont, auto, carrera.telefono_cliente, carrera.dateInicio, carrera.servicio,
                        carrera.direccion_origen, carrera.direccion_destino, carrera.descripcion,
                        `<a class='btn btn-outline-success' title="Calificar Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreraState" onclick="qualifyRace(` + carrera.id_unitActiva + `,` + carrera.id_carrera + `)"> <i class='fas fa-check-circle'></i></a>&nbsp;<a class='btn btn-outline-primary' title="Editar destino Carrera" data-bs-toggle="modal"
                        data-bs-target="#modalCarreras" onclick="editRace(` + carrera.id_carrera + `)"> <i class='fas fa-edit'></i></a>`]);
                    cont++;
                });
                tablaCarrerasEnable.draw(true);
            }
        });
    }

    function qualifyRace(id_unitActiva, id_carrera) {
        $("#id_carrera").val(id_carrera);
        $("#id_unitActiva").val(id_unitActiva);

    }


    function editRace(id_carrera) {

        let Url = "<?php echo base_url('carreras/selectId') ?>";
        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'id_carrera': id_carrera,
            },
            dataType: 'json',
            success: function (res) {

                $('#direccion_origen').val(res[0].direccion_origen);
                $('#direccion_destino').val(res[0].direccion_destino);
                $('#telefono_cliente').val(res[0].telefono_cliente);
                $('#descripcion').val(res[0].descripcion);
                $('#id_carreraUpdate').val(res[0].id_carrera)
                tipoCarrera(res[0].id_servicio);

            }
        });
    }

    function estadoCarrera(qualify) {

        let Url = "<?php echo base_url('carreras/qualify') ?>";
        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'qualify': qualify,
                'id_carrera': $('#id_carrera').val(),
                'id_unitActiva': $("#id_unitActiva").val()
            },
            success: function (res) {

                if (res.success) {
                    toastr["success"](res.success);
                    $('#modalCarreraState').modal('hide');
                    $('#forEstadoCarrera').trigger('reset');
                    loadCarrerasEnable();
                }
            }
        });

    }

    function tipoCarrera(aux) {

        let Url = "<?php echo base_url('carreras/tipocarrera') ?>";
        let tipocarrera = document.getElementById("id_servicio");
        let mensaje = "";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                res.forEach(ser => {
                    if (aux == ser.id_servicio) {
                        mensaje += "<option  selected value='" + ser.id_servicio + "'>" + ser.servicio +
                            "</option>";
                    } else {
                        mensaje += "<option value='" + ser.id_servicio + "'>" + ser.servicio + "</option>";
                    }

                });
                tipocarrera.innerHTML = mensaje;
            }
        });
    }

    $("#forCarreras").on('submit', function (e) {
        e.preventDefault();

        let Url = "<?php echo base_url('carreras/update')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: $("#forCarreras").serialize(),
            dataType: "json",
            success: function (res) {

                if (res.success) {
                    $('#modalCarreras').modal('hide');
                    toastr["success"](res.success);
                    loadCarrerasEnable();

                } else {
                    $.each(res.error, function (prefix, val) {
                        $('#forCarreras').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });

    });

    function clearLableError() {
        $('#forCarreras').find('span.direccion_origen_error').text("");
        $('#forCarreras').find('span.direccion_destino_error').text("");
        $('#forCarreras').find('span.telefono_cliente_error').text("");

    }


    window.onload = loadCarrerasEnable();
</script>
