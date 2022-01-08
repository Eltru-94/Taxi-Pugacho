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
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //Cargar datos para la tabla
    let tablaVehiculo = $('#tablaVehiculodelet').DataTable({
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
    function loadVehiculo() {

        tablaVehiculo.row().clear();
        let Url = "<?php echo base_url('vehiculo/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1,
                'estadoVehiculo':0
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
                        "<div class='btn-group'></i></a> <a class='btn btn-outline-primary' title='Eliminar'   onclick='enableVehiculo(" +
                        user.id_vehiculo +
                        ")'> <i class='fas fa-user-lock'></i></a></div> "
                    ]);
                    cont++;

                });
                tablaVehiculo.draw(true);
            }
        });


    }
    function enableVehiculo(id){

        let Url = `<?php echo base_url()?>/vehiculo/enable`;
        Swal.fire({
            title: 'Esta seguro?',
            text: "No podra reverti esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Activar el vehiculo!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({

                    'type': "post",
                    url: Url,
                    data: {
                        'estado': 1,
                        'id_vehiculo':id
                    },
                    dataType: 'json',
                    success: function(res) {

                        if (res.success) {

                            toastr["info"](res.success);
                            loadVehiculo();

                        }
                    }
                });

            }
        });
    }

    window.onload = loadVehiculo;
</script>
