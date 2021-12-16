<script>
    let scheduleTaxis=["Velada","Mañana","Tarde"];
    let tablaVehiculoEnable = $('#tablaVehiculoEnable').DataTable({
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
    function schedule(aux) {
        loadUnitEnable();
        let schedule = document.getElementById("horario");
        let mensaje = " <option selected value='-1'>Escoga el rol...</option>";

        for (var i=0;i<scheduleTaxis.length;i++){

            mensaje += "<option value='" +(i+1)+ "'>" + scheduleTaxis[i] + "</option>";
        }
        schedule.innerHTML = mensaje;
    }

    function scheduleEdit(aux) {
        loadUnitEnable();
        let schedule = document.getElementById("horario_");
        let mensaje = "";

        for (var i=0;i<scheduleTaxis.length;i++){

            if((i+1)==aux){
                mensaje += "<option value='" +(i+1)+ "' selected>" + scheduleTaxis[i] + "</option>";
            }else{
                mensaje += "<option value='" +(i+1)+ "'>" + scheduleTaxis[i] + "</option>";
            }

        }
        schedule.innerHTML = mensaje;
    }

    $("#forEnableUnidad").on('submit',function (e) {
        e.preventDefault();
        let unidad=$('#unidad').val();
        let horario=$('#horario').val();
        let Url="<?php echo base_url('enableUnit')?>";
        $.ajax({
            'type':'post',
            url:Url,
            data:{
                'unidad':unidad,
                'horario':horario
            },
            dataType: "json",
            success:function (res){
                ClearErrorEnableUnit();
                if(res.success){

                    $('#forEnableUnidadEdit').trigger('reset');
                    $('#modalUnidadesEnableEdit').modal('hide');
                    toastr["success"](res.success);
                    loadUnitEnable();
                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forEnableUnidad').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });

    $("#forEnableUnidadEdit").on('submit',function (e) {
        e.preventDefault();
        let id_unitActiva=$('#idUnitEnable').val();
        let horario=$('#horario_').val();
        let Url="<?php echo base_url('enableUnit/update')?>";
        $.ajax({
            'type':'post',
            url:Url,
            data:{
                'id_unitEnable':id_unitActiva,
                'horario':horario
            },
            dataType: "json",
            success:function (res){

                if(res.success){
                    $('#forEnableUnidadEdit').trigger('reset');
                    $('#modalUnidadesEnableEdit').modal('hide');
                    toastr["success"](res.success);
                    loadUnitEnable();
                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forEnableUnidad').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });

    function loadUnitEnable() {

        tablaVehiculoEnable.row().clear();
        let Url = "<?php echo base_url('enableUnit/all') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function(res) {
                let cont = 1;

                res.forEach(unitEnable => {

                    temp = tablaVehiculoEnable.row.add([cont,unitEnable.nombre+"  "+unitEnable.apellido,
                        unitEnable.horaTrabajo,' <span class="badge bg-success">N.- '+unitEnable.unidad+' Activada</span>',
                        unitEnable.created_at,`<a class='btn btn-outline-danger' onclick="deletUnitEnable(`+unitEnable.id_unitActiva+`)"> <i class='fas fa-trash'></i></a> <a class='btn btn-outline-primary' data-bs-toggle="modal"
                        data-bs-target="#modalUnidadesEnableEdit" onclick="editUnitEnable(`+unitEnable.id_unitActiva+`)"> <i class='fas fa-user'></i></a>`]);
                    cont++;

                });
                tablaVehiculoEnable.draw(true);
            }
        });
    }

function  ClearErrorEnableUnit()
{
    $('#forEnableUnidad').find('span.unidad_error').text("");
    $('#forEnableUnidad').find('span.horario_error').text("");
}

function ClearFieldsEnableUnit(){
    $('#forEnableUnidad').trigger('reset');
    ClearErrorEnableUnit();
}
function deletUnitEnable(id){

    let Url = `<?php echo base_url()?>/enableUnit/delet/`+id;
    Swal.fire({
        title: 'Esta seguro?',
        text: "No podra reverti esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar Unidad Activada!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({

                'type': "get",
                url: Url,
                dataType: 'json',
                success: function(res) {

                    if (res.success) {

                        toastr["success"](res.success);
                        loadUnitEnable();

                    }
                }
            });

        }
    });
}

function editUnitEnable(id){
    let Url = `<?php echo base_url()?>/enableUnit/select/`+id;
    $.ajax({
        method: 'get',
        url: Url,
        success: function(res) {
            const data = JSON.parse(res);
            $('#idUnitEnable').val(data[0].id_unitActiva)
            scheduleEdit(data[0].horario);
        }
    });

}
function detailUnitEnable(id){
    alert('Detail '+id);
}

window.onload=schedule(0);

</script>
