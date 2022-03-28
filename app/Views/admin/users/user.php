<script>
    let titleModalUser = document.getElementById("tituloModal");
    let edit = false;

    //Cargar datos para la tabla
    let tablaUsers = $('#tablaUsers').DataTable({
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
        let Url = "<?php echo base_url('users/state') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function (res) {
                let cont = 1;
                let temp = "";

                res['users'].forEach(user => {

                    let edad = calcularEdad(user.fechanacimiento);
                    let deleteUser = buttonDelet(user.id_user, "deleteUsers");
                    let edtitUser = "<a class='btn btn-outline-primary ' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalUser'  onclick='update(" +
                        user.id_user +
                        ")'><i class='fas fa-user-edit'></i></a>";
                    temp = tablaUsers.row.add([cont,
                        `<img class="rounded-circle" width='100' src="<?=base_url()?>/image/` +
                        user.foto + `">`, user.nombre, user.apellido, user.correo, user
                            .cedula, user.telefono, user.licencia, edad + " años", user.rol,
                        "<div class='btn-group'>" + edtitUser + deleteUser + "</div> "
                    ]);
                    cont++;

                });
                tablaUsers.draw(true);
            }
        });
    }

    function tituloUser() {
        titleModalUser.innerHTML = "<h5> Registrar Usuario</h5>";
        Roles(0);
    }

    $("#btnUser").click(function (e) {
        e.preventDefault();


        let Url = edit === false ? '<?php echo base_url('users/create') ?>' :
            '<?php echo base_url('users/update_data') ?>';
        let forUser = new FormData(document.getElementById("forUser"));


        $.ajax({
            type: "post",
            url: Url,
            data: forUser,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (res) {

                if (res.success) {
                    edit = false;
                    limpiarForm();
                    toastr["success"](res.success, "Usuario");
                    loadUsers();

                } else {
                    clearErrors();
                    $.each(res.error, function (prefix, val) {
                        $('#forUser').find('span.' + prefix + '_error').text(val);
                    });

                }


            }
        });


    })

    function update(id) {

        let Url = "<?php echo base_url('users/update') ?>";
        titleModalUser.innerHTML = "<h5>Actualizar Usuario</h5>";

        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'id_user': id
            },
            success: function (res) {
                ///console.log(res)

                $('#id_user').val(res.user[0].id_user);
                $('#nombre').val(res.user[0].nombre);
                $('#apellido').val(res.user[0].apellido);
                $('#cedula').val(res.user[0].cedula);
                $('#telefono').val(res.user[0].telefono);
                $('#fechanacimiento').val(res.user[0].fechanacimiento);
                $('#genero').val(res.user[0].genero);
                $('#licencia').val(res.user[0].licencia);
                $('#foto').val(res.user[0].foto);
                $('#direccion').val(res.user[0].direccion);
                $('#correo').val(res.user[0].correo);
                Roles(res.user[0].id_rol);
                edit = true;
            }
        });

    }


    //Limpiar Formulario Usuario
    function limpiarForm() {
        clearErrors();
        $('#forUser').trigger('reset');
        $('#modalUser').modal('hide');

    }

    function clearErrors() {
        $('#forUser').find('span.nombre_error').text("");
        $('#forUser').find('span.apellido_error').text("");
        $('#forUser').find('span.cedula_error').text("");
        $('#forUser').find('span.telefono_error').text("");
        $('#forUser').find('span.fechanacimiento_error').text("");
        $('#forUser').find('span.genero_error').text("");
        $('#forUser').find('span.direccion_error').text("");
        $('#forUser').find('span.correo_error').text("");
        $('#forUser').find('span.password_error').text("");
        $('#forUser').find('span.cpassword_error').text("");
        $('#forUser').find('span.imagen_error').text("");
        $('#forUser').find('span.roles_error').text("");
        $('#forUser').find('span.licencia_error').text("");
    }

    //Eliminar usuario
    function deleteUsers(id) {

        let Url = "<?php echo base_url('users/delete') ?>";
        Swal.fire({
            title: 'Esta seguro?',
            text: "No podra reverti esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar Usuario!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    'type': "post",
                    url: Url,
                    data: {
                        'id_user': id,
                        'estado': 0
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log(res)
                        if (res.success) {
                            edit = false;
                            loadUsers();
                            toastr["error"](res.success, "Usuario");
                        }
                        if (res.alert) {
                            edit = false;
                            toastr["warning"](res.alert, "Usuario no eliminado");
                        }
                    }
                });
            }
        });
    }


    window.onload = loadUsers;
</script>