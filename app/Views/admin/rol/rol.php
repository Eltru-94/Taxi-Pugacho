<script>
//Declaracion de variables
let a = document.getElementById("tituloModal");
let titulo = document.getElementById("tituloAsignarRol");
let edit = false;


let tablaRoles = $('#tablaRoles').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ Roles",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registro de roles del _START_ al _END_ de un total de _TOTAL_",
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


//Cambio de titulo modal
function tituloRol() {
    a.innerHTML = "<h5> Registrar Rol</h5>";
}
//Cargar lista Roles
function loadRoles() {
    tablaRoles.row().clear();
    let Url = "<?php echo base_url('roles/fetch') ?>";
    $.ajax({
        'type': 'get',
        url: Url,
        dataType: 'json',
        success: function(res) {
            let cont = 1;
            var temp = "";
            res['roles'].forEach(roles => {
                temp = tablaRoles.row.add([cont, roles.rol, roles.descripcion,
                    "<div class='btn-group'><a class='btn btn-outline-primary' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalRol'  onclick='update(" +
                    roles.id_rol +
                    ")'><i class='fas fa-pencil-alt'></i></a><a class='btn btn-outline-success' title='Asignar Modulos' data-bs-toggle='modal' data-bs-target='#modalFuncionalidades'  onclick='AsignarRol(" +
                    roles.id_rol + ")'> <i class='fas fa-edit'></i></a></div> "
                ]);
                cont++;
            });
            tablaRoles.draw(true);
        }
    });
}
//Update lista Roles
function update(id) {
    let Url = "<?php echo base_url('roles/update') ?>";
    a.innerHTML = "<h5>Actualizar Rol</h5>";
    $.ajax({
        method: 'post',
        url: Url,
        data: {
            'id_rol': id
        },
        success: function(res) {
            const data = JSON.parse(res);
            $('#id_rol').val(data[0].id_rol);
            $('#rol').val(data[0].rol);
            $('#descripcion').val(data[0].descripcion);
            $('#tituloVentana');
            titulo.innerHTML = data[0].rol;
            edit = true;
        }
    });
}
//Limpiar los campos del formulario
function limpiarForm() {
    $('#forRol').trigger('reset');
    $('#forRol').find('span.rol_error').text("");
    $('#forRol').find('span.descripcion_error').text("");
}

function limpiarFormAsignar() {

    $('#forAsignarRol').find('span.radio_error').text("");
}

//Crear y Editar 
$("#btnRol").click(function(e) {
    e.preventDefault();
    const roles = {
        id_rol: $('#id_rol').val(),
        rol: $('#rol').val(),
        descripcion: $('#descripcion').val()
    };
    let Url = edit === false ? '<?php echo base_url('roles/save') ?>' :
        '<?php echo base_url('roles/updateRol') ?>';
    $.ajax({
        'type': "post",
        url: Url,
        data: roles,
        dataType: 'json',
        success: function(res) {
            clearField();
            if (res.success) {
                edit = false;
                loadRoles();
                $('#modalRol').modal('hide');
                $('#forRol')[0].reset();
                toastr["success"](res.success);
                limpiarForm();

            } else {

                $.each(res.error, function(prefix, val) {
                    $('#forRol').find('span.' + prefix + '_error').text(val);
                });
            }


        }
    })
});

$("#asignar").click(function(e) {
    e.preventDefault();

    let Url = "<?php echo base_url('asigarRolFuncionalidad') ?>";
    var funcio = [];

    $('#forAsignarRol input[type=checkbox]').each(function() {
        if (this.checked) {
            funcio.push($(this).val());
        }
    });

    $.ajax({
        'type': "post",
        url: Url,
        data: {
            id_temp: $('#id_temp').val(),
            funcionalidades: funcio
        },
        dataType: 'json',
        success: function(res) {

            if (res.success) {
                $('#modalFuncionalidades').modal('hide');

                toastr["success"](res.success, "Funcionalidad");

            } else {

                $.each(res.error, function(prefix, val) {
                    $('#forAsignarRol').find('span.' + prefix + '_error').text(val);

                });
            }
        }
    });


});

function deleteRol(id) {
    let Url = "<?php echo base_url('roles/deleteRol') ?>";
    Swal.fire({
        title: 'Esta seguro?',
        text: "No podra reverti esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar Rol!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                'type': "post",
                url: Url,
                data: {
                    'id_rol': id
                },
                dataType: 'json',
                success: function(res) {
                    if ($.isEmptyObject(res.error)) {
                        edit = false;
                        loadRoles();
                        toastr["error"](res.msg, "Rol");
                    }
                }
            });
        }
    });
}

function AsignarRol(id) {
    //alert(id);
    var titulo = document.getElementById("tituloAsignarRol");
    update(id);
    $('#id_temp').val(id);
    funcionalidades(id);
}

function funcionalidades(id_rol) {

    var a = document.getElementById("radio");

    let Url = "<?php echo base_url('rolfunc') ?>";
    var radio = "";
    $.ajax({
        'type': 'post',
        url: Url,
        data: {
            "id_rol": id_rol
        },
        dataType: 'json',
        success: function(res) {

            res.forEach(fun => {
                if (fun.estado == 1) {
                    radio += `<input type="checkbox" checked name="funcionalidades" value="${fun.id_funcionalidad}" id="${fun.id_funcionalidad}"><label
                                    > &nbsp;&nbsp;${fun.funcionalidad}</label><br> `;
                } else {
                    radio += `<input type="checkbox" name="funcionalidades" value="${fun.id_funcionalidad}" id="${fun.id_funcionalidad}"><label
                                    > &nbsp;&nbsp;${fun.funcionalidad}</label><br> `;
                }

            });
            a.innerHTML = radio;
           
        }
    });
}
function  clearField(){
    $('#forRol').find('span.rol_error').text("");
    $('#forRol').find('span.descripcion_error').text("");
}
window.onload = loadRoles;
</script>