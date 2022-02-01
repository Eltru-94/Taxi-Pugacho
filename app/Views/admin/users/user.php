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
        let Url = "<?php echo base_url('users/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function (res) {
                let cont = 1;
                var temp = "";
                res['users'].forEach(user => {

                    let edad = calcularEdad(user.fechanacimiento);
                    temp = tablaUsers.row.add([cont,
                        `<img class="rounded-circle" width='100' src="<?=base_url()?>/image/` +
                        user.foto + `">`, user.nombre, user.apellido, user.correo, user
                            .cedula, user.telefono, user.licencia, edad + " años", user.rol,
                        "<div class='btn-group'><a class='btn btn-outline-primary ' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalUser'  onclick='update(" +
                        user.id_user +
                        ")'><i class='fas fa-user-edit'></i></a> <a class='btn btn-outline-danger' title='Eliminar'  onclick='deleteUsers(" +
                        user.id_user +
                        ")'> <i class='fas fa-trash'></i></a></div> "
                    ]);
                    cont++;

                });
                tablaUsers.draw(true);
            }
        });
    }

    function tituloUser() {
        a.innerHTML = "<h5> Registrar Usuario</h5>";
        Roles(0);
    }

    $("#btnUser").click(function (e) {
        e.preventDefault();


        let Url = edit === false ? '<?php echo base_url('users/save') ?>' :
            '<?php echo base_url('users/updateUser') ?>';
        var fd = new FormData(document.getElementById("forUser"));


        $.ajax({
            type: "post",
            url: Url,
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (res) {

                if (res.success) {
                    edit = false;
                    limpiarForm();

                    toastr["success"](res.success);
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
        a.innerHTML = "<h5>Actualizar Usuario</h5>";

        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'id_user': id
            },
            success: function (res) {
                const data = JSON.parse(res);
                $('#id_user').val(data[0].id_user);
                $('#nombre').val(data[0].nombre);
                $('#apellido').val(data[0].apellido);
                $('#cedula').val(data[0].cedula);
                $('#telefono').val(data[0].telefono);
                $('#fechanacimiento').val(data[0].fechanacimiento);
                $('#genero').val(data[0].genero);
                $('#licencia').val(data[0].licencia);
                $('#foto').val(data[0].foto);
                $('#direccion').val(data[0].direccion);
                $('#correo').val(data[0].correo);
                Roles(data[0].id_rol);
                edit = true;
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

        let Url = "<?php echo base_url('users/deleteUser') ?>";
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
                        if ($.isEmptyObject(res.error)) {
                            edit = false;
                            loadUsers();
                            toastr["error"](res.msg, "Usuario");
                        }
                    }
                });
            }
        });
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

    window.onload = loadUsers;
</script>