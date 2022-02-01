<script>


    function update() {

        let Url = "<?php echo base_url('users/update') ?>";


        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'id_user': $('#id_user').val()
            },
            success: function(res) {
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

            }
        });

    }
    function Roles(aux) {

        let Url = "<?php echo base_url('roles/fetch') ?>";
        let rol = document.getElementById("roles");
        let mensaje = "";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                res['roles'].forEach(roles => {
                    if (aux == roles.id_rol) {
                        mensaje += "<option  selected value='" + roles.id_rol + "'>" + roles.rol +
                            "</option>";
                    }

                });
                rol.innerHTML = mensaje;
            }
        });
    }


    $("#btnUser").click(function(e) {
        e.preventDefault();


        let Url = '<?php echo base_url('users/updateUser') ?>';
        var fd = new FormData(document.getElementById("forUserEdit"));


        $.ajax({
            type: "post",
            url: Url,
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(res) {

                if (res.success) {


                    toastr["success"](res.success);
                    window.location.href="/administrador";


                } else {

                    $.each(res.error, function(prefix, val) {
                        $('#forUser').find('span.' + prefix + '_error').text(val);
                    });

                }


            }
        });



    })

    window.onload=update;
</script>