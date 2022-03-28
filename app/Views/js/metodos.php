<script>

    let arraycolor = ["AZUL", "VERDE", "ROJO", "AMARILLO", "BLANCO", "NEGRO", "PLOMO"];
    let scheduleTaxis = ["Velada", "Mañana", "Tarde"];
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

    function colorUnidad(id, unidad) {
        var auto = `<span class="badge badge-pill bg-primary">` + unidad + `</span> <span><i class="fas fa-car"></i></span>`;

        return auto;

    }

    function colorServicio(id, unidad) {
        var servicio = `<span class="badge badge-pill bg-info">` + unidad + `</span>`;

        return servicio;

    }

    function colorQualify(id) {
        var mensaje = "";
        switch (id) {
            case ('3'):
                mensaje = `<span class="badge badge-pill bg-danger">Perdida</span>`;
                break;
            case ('2'):
                mensaje = `<span class="badge badge-pill bg-success">Realizada</span>`;
                break;
            case ('1'):
                mensaje = `<span class="badge badge-pill bg-warning">Cancelada</span>`
                break;
        }
        return mensaje;

    }

    function colorFrecuencia(valor) {
        let mensaje = "";


        if (valor == 0) {
            mensaje = `<span class="badge badge-pill bg-danger">Pagar</span>`;
        } else {
            mensaje = `<span class="badge badge-pill bg-success">Cancelada</span>`;
        }
        return mensaje;
    }

    function colorUsersStates(valor) {
        let mensaje = "";
        switch (valor) {
            case ('1'):
                mensaje = `<span class="badge badge-pill bg-success">Activo</span>`;
                break;
            case ('0'):
                mensaje = `<span class="badge badge-pill bg-danger">Inactiva</span>`;
                break;
        }

        return mensaje;
    }

    function colorOperadorStates(valor) {
        let mensaje = "";
        switch (valor) {
            case ('1'):
                mensaje = `<span class="badge badge-pill bg-success">Activo</span>`;
                break;
            case ('0'):
                mensaje = `<span class="badge badge-pill bg-success">Reportado</span>`;
                break;
        }
        return mensaje;
    }



    function colorButtonFrequency(pago, id_vehiculo) {
        let mensaje = "";
        if (pago == 0) {
            mensaje = "<a class='btn btn-outline-secondary' title='Pagar Frecuencia' data-bs-toggle='modal' data-bs-target='#modalPayFrequency'  onclick='payBill(" +
                id_vehiculo +
                ")'> <i class='fas fa-money-bill'></i></a>";
        } else {
            mensaje = `<a class='btn btn-outline-danger' title='Imprimir Factura'  href='<?php echo base_url()?>/frecuencia/printFactura/` + id_vehiculo + `'> <i class='fas fa-file-pdf'></i></a>`;
        }
        return mensaje;
    }

    function reporteColor(id) {
        var reporte = "";
        switch (id) {
            case '1':
                reporte = ' <span class="badge badge-pill bg-success">Reportado</span>';
                break;
            case '2':
                reporte = ' <span class="badge badge-pill bg-danger">No reportado</span>';
                break;
            default:
                reporte = ' <span class="badge badge-pill bg-info">Sin Verificar</span>';
                break;
        }
        return reporte;
    }


    function reporteButtonColor(repor, id_unitActiva) {

        let reporte = `<a class='btn btn-outline-success' title="Actualizar" data-bs-toggle="modal"
                        data-bs-target="#modalUnidadReport" onclick="carreraReporte(` + id_unitActiva + `)"> <i class='fas fa-check'></i></a>`;
        switch (repor) {
            case ('1'):
                reporte = `<a class='btn btn-outline-success' title="Actualizar" data-bs-toggle="modal"
                        data-bs-target="#modalUnidadReport" onclick="carreraReporte(` + id_unitActiva + `)"> <i class='fas fa-check'></i></a>`;
                break;
            case ('2'):
                reporte = `<a class='btn btn-outline-danger' title="Actualizar" data-bs-toggle="modal"
                        data-bs-target="#modalUnidadReport" onclick="carreraReporte(` + id_unitActiva + `)"> <i class='fas fa-check'></i></a>`;
                break;
            case ('0'):
                reporte = `<a class='btn btn-outline-warning' title="Actualizar" data-bs-toggle="modal"
                        data-bs-target="#modalUnidadReport" onclick="carreraReporte(` + id_unitActiva + `)"> <i class='fas fa-clipboard-check'></i></a>`;
                break;
        }
        return reporte;
    }


    $("#forEnableUnidadReporte").on('submit', function (e) {
        e.preventDefault();

        let Url = "<?php echo base_url('enableUnit/reporte')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: {
                'reporte': $('#reporte').val(),
                'descripcion': $('#descripcionReporte').val(),
                'id_unitActiva': $('#idUnitEnableCarrera').val(),
            },
            dataType: "json",
            success: function (res) {
                console.log(res);
                if (res.success) {
                    $('#modalUnidadReport').modal('hide');
                    toastr["success"](res.success);
                    loadUnitEnable();
                } else {
                    $.each(res.error, function (prefix, val) {
                        $('#forEnableUnidadReporte').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });


    function colorSechendulle(id) {
        let mensaje = ""
        switch (id) {
            case ('3'):
                mensaje = ' <span class="badge badge-pill bg-primary">Tarde</span>'

                break;
            case ('2'):
                mensaje = ' <span class="badge badge-pill bg-secondary">Mañana</span>'

                break;
            case ('1'):
                mensaje = ' <span class="badge badge-pill bg-success">Velada</span>'

                break;
        }

        return mensaje;
    }

    function Roles(aux) {

        let Url = "<?php echo base_url('roles/fetch') ?>";
        let rol = document.getElementById("roles");
        let mensaje = " <option  value=''>Escoga el rol...</option>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                res['roles'].forEach(roles => {
                    if (aux == roles.id_rol) {
                        mensaje += "<option  selected value='" + roles.id_rol + "'>" + roles.rol +
                            "</option>";
                    } else {
                        mensaje += "<option value='" + roles.id_rol + "'>" + roles.rol + "</option>";
                    }

                });
                rol.innerHTML = mensaje;
            }
        });
    }

    function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        return edad;
    }

    function buttonDelet(id, method) {

        let mensaje = `<a class='btn btn-outline-danger' title='Eliminar'  onclick='` + method + `(` +
            id +
            `)'> <i class='fas fa-trash'></i></a>`;
        return mensaje;
    }

</script>