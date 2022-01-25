<script>
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

    function  colorUnidad(id,unidad){
        var auto=`<span class="badge badge-pill bg-primary">`+unidad+`</span> <span><i class="fas fa-car"></i></span>`;

        return auto;

    }
    function  colorServicio(id,unidad){
        var servicio=`<span class="badge badge-pill bg-info">`+unidad+`</span>`;

        return servicio;

    }

    function  colorQualify(id){
        var mensaje="";
        switch (id){
            case ('3'):
                mensaje=`<span class="badge badge-pill bg-danger">Perdida</span>`;
                break;
            case ('2'):
                mensaje=`<span class="badge badge-pill bg-success">Realizada</span>`;
                break;
            case ('1'):
                mensaje=`<span class="badge badge-pill bg-warning">Cancelada</span>`
                break;
        }
        return mensaje;

    }


</script>