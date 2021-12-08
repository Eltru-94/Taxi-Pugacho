<script>
var a = document.getElementById("tituloModal");
let edit = false;
//Cargar datos para la tabla
let tablaUsers = $('#tablaUsersBlock').DataTable({
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

function loadUsers() {
    tablaUsers.row().clear();
    let Url = "<?php echo base_url('users/fetch') ?>";
    $.ajax({
        'type': 'post',
        url: Url,
        data:{
            'estado':0
        },
        dataType: 'json',
        success: function(res) {
            let cont = 1;
            var temp = "";
            res['users'].forEach(user => {
                let edad = calcularEdad(user.fechanacimiento);
                temp = tablaUsers.row.add([cont, `<img class="rounded-circle" width='100' src="<?=base_url()?>/image/` +
                    user.foto + `">`, user.nombre, user.apellido, user.correo, user
                    .cedula, user.telefono, user.licencia, edad + " años", user.rol,
                    "<div> <a class='btn btn-outline-primary'   onclick='activarUsers(" +
                    user.id_user +
                    ")'> <i class='fas fa-toggle-off'></i></a></div> "
                ]);
                cont++;
            });
            tablaUsers.draw(true);
        }
    });
}




//Calcular edad
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


//Eliminar usuario 
function activarUsers(id) {

    let Url = "<?php echo base_url('users/deleteUser') ?>";
    Swal.fire({
        title: 'Esta seguro?',
        text: "No podra reverti esto!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Activar Usuario!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                'type': "post",
                url: Url,
                data: {
                    'id_user': id,
                    'estado':1
                },
                dataType: 'json',
                success: function(res) {
                    if ($.isEmptyObject(res.error)) {
                        edit = false;
                        loadUsers();
                        toastr["success"](res.msg,"Usuario");
                    }
                }
            });
        }
    });
}


window.onload = loadUsers;
</script>