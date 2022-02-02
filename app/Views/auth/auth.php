<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $("#formLogin").on('submit', function (e) {
        e.preventDefault();
        let Url = "<?php echo base_url('auth/check')?>";
        $.ajax({
            'type': 'post',
            url: Url,
            dataType: "json",
            data: $('#formLogin').serialize(),
            success: function (res) {
                console.log(res);
                ClearErrorFields();
                if (res.fail) {

                    toastr["error"](res.fail);
                }
                if (res.success) {
                    location.href ="/administrador";
                } else {
                    $.each(res.error, function (prefix, val) {
                        $('#formLogin').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });


    });

    function ClearErrorFields() {
        $('#formLogin').find('span.correo_error').text("");
        $('#formLogin').find('span.contrasenia_error').text("");
    }

</script>
