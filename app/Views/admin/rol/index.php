<?= $this->extend('./plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>
<h3 class="text-center">Roles</h3>
<hr>
<?=$this->include('/admin/rol/formulario') ?>
<br>
<br>
<?=$this->include('/admin/rol/tabla')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<script>
//Declaracion de variables
var a = document.getElementById("tituloModal");
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
                    "<div class='btn-group'><a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalRol'  onclick='update(" +
                    roles.id_rol +
                    ")'><i class='fas fa-pencil-alt'></i></a> <a class='btn btn-danger'   onclick='deleteRol(" +
                    roles.id_rol + ")'> <i class='fas fa-trash'></i></a></div> "
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
            if ($.isEmptyObject(res.error)) {
                edit = false;
                loadRoles();
                if (res.code == 1) {
                    $('#modalRol').modal('hide');
                    $('#forRol')[0].reset();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    limpiarForm();
                }
                console.log(res);
            } else {
                $.each(res.error, function(prefix, val) {
                    $('#forRol').find('span.' + prefix + '_error').text(val);
                });

                console.log(res);
            }
        }
    })
})

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
                        Swal.fire(
                            'Eliminado!',
                            'Rol eliminado con exito.!!',
                            'success'
                        )
                    }
                }
            });
        }
    });
}

window.onload = loadRoles;
</script>
<?= $this->endSection()?>