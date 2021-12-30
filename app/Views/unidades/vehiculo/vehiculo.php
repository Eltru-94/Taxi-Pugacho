<script>
var a = document.getElementById("tituloModal");
let edit = false;
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

//Cargar datos para la tabla
let tablaVehiculo = $('#tablaVehiculo').DataTable({
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

function year(anio) {
    let rol = document.getElementById("fechafabricacion");
    var myDate = new Date();
    var year = myDate.getFullYear();
    let mensaje = " <option  value=''>Seleccionar año</option>";
    for (var i = 2000; i < year + 1; i++) {
        if (anio == i) {
            mensaje += '<option selected value="' + i + '">' + i + '</option>';
        } else {
            mensaje += '<option value="' + i + '">' + i + '</option>';
        }

    }
    rol.innerHTML = mensaje;
}

function buscarCedula() {

    let ced = $('#cedula').val();
    let rol = document.getElementById("user");
    let Url = "<?php echo base_url('users/searchID') ?>";

    $.ajax({
        'type': 'post',
        url: Url,
        dataType: 'json',
        data: {
            'cedula': ced
        },
        success: function(res) {

            if (res.success) {


                $('#id_user').val(res.success[0].id_user);
                activacion(false);
                rol.innerHTML = "<h4 class='text-center'>" + res.success[0].nombre + " " + res.success[0]
                    .apellido + "</h4>";


            } else {

                $.each(res.error, function(prefix, val) {
                    $('#forCedula').find('span.' + prefix + '_error').text(val);
                });



            }


        }
    });



}

$("#forVehiculo").on('submit', function(e) {
    e.preventDefault();

    $('#forCedula').trigger('reset');
    let Url = '<?php echo base_url('vehiculo/create') ?>';
    var fd = new FormData(document.getElementById("forVehiculo"));
    $.ajax({
        type: "post",
        url: Url,
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(res) {


            if(res.success){
                $('#forVehiculo').trigger('reset');
                $('#modalVehiculo').modal('hide');
                toastr["success"](res.success);
                activacion(true);
                loadVehiculo();
            }else{
                $.each(res.error, function(prefix, val) {
                    $('#forVehiculo').find('span.' + prefix + '_error').text(val);
                });
            }


        }
    });
});



function loadVehiculo() {

    tablaVehiculo.row().clear();
    let Url = "<?php echo base_url('vehiculo/fetch') ?>";
    $.ajax({
        'type': 'post',
        url: Url,
        data: {
            'estado': 1
        },
        dataType: 'json',
        success: function(res) {
            let cont = 1;
            res.forEach(user => {


                temp = tablaVehiculo.row.add([cont,
                    `<img class="rounded float-start" width='100' src="<?=base_url()?>/vehiculos/` +
                    user.imagen1 + `">`,
                    `<img class="rounded float-start" width='100' src="<?=base_url()?>/vehiculos/` +
                    user.imagen2 + `">`,
                    `<img class="rounded float-start" width='100' src="<?=base_url()?>/vehiculos/` +
                    user.imagen1 + `">`, user.placa, user
                    .fechafabricacion, user.marca,

                    '<span class="badge badge-pill badge-success">'+user.unidad+'</span> <span><i class="fas fa-car"></i></span>', `<a title="Detalles" href="<?=base_url()?>/vehiculo/details/` +
                    user.id_vehiculo + `">` +
                    user.nombre + ' ' + user.apellido + `</a>`,
                    "<div class='btn-group'><a class='btn btn-outline-primary' title='Actulizar' data-bs-toggle='modal' data-bs-target='#modalVehiculo'  onclick='update(" +
                    user.id_user +
                    ")'><i class='fas fa-car'></i></a> <a class='btn btn-outline-danger' title='Eliminar'   onclick='deleteUsers(" +
                    user.id_user +
                    ")'> <i class='fas fa-trash'></i></a></div> "
                ]);
                cont++;

            });
            tablaVehiculo.draw(true);
        }
    });
}

function activacion(valor) {
    let aux = true;
    let rol = document.getElementById("user");
    if (!valor) {

        $('#btnVehiculo').prop("disabled", valor);
        $('#placa').prop("disabled", valor);
        $('#modelo').prop("disabled", valor);
        $('#marca').prop("disabled", valor);
        $('#fechafabricacion').prop("disabled", valor);
        $('#id_user').prop("disabled", valor);
        $('#imagen1').prop("disabled", valor);
        $('#imagen2').attr("disabled", valor);
        $('#imagen3').attr("disabled", valor);
        $('#unidad').attr("disabled", valor);
        $('#Kilometraje').attr("disabled", valor);
    }
    if (valor) {
        $('#cedula').val("");
        rol.innerHTML = "";
        $('#btnVehiculo').prop("disabled", aux);
        $('#placa').prop("disabled", aux);
        $('#modelo').prop("disabled", aux);
        $('#marca').prop("disabled", aux);
        $('#fechafabricacion').prop("disabled", aux);
        $('#id_user').prop("disabled", aux);
        $('#imagen1').prop("disabled", aux);
        $('#imagen2').attr("disabled", aux);
        $('#imagen3').attr("disabled", aux);
        $('#forCedula').find('span.cedula_error').text("");
        $('#unidad').attr("disabled", valor);
        $('#Kilometraje').attr("disabled", valor);
        $('#forVehiculo').trigger('reset');
    }

}


function update(id) {

    let Url = "<?php echo base_url('vehiculo/vehiculouser') ?>";
    let id_vehiculo = id;
    $.ajax({
        'type': 'post',
        url: Url,
        data: {
            'estado': 1,
            'id_vehiculo': id_vehiculo
        },
        dataType: 'json',
        success: function(res) {

            year(res[0].fechafabricacion);
            $('#cedula').val(res[0].cedula);
            $('#marca').val(res[0].marca);
            $('#modelo').val(res[0].modelo);
            $('#placa').val(res[0].placa);
            $('#fechafabricacion').val(res[0].fechafabricacion);
            $('#unidad').val(res[0].unidad);
            $('#Kilometraje').val(res[0].kilometraje);

            activacion(false);
        }
    });


}

window.onload = loadVehiculo;
</script>