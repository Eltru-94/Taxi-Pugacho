<script>

    let tablaCarreras = $('#tablaCarreras').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Carreras pendientes",
            "zeroRecords": "No se encontraron carreras pendientes",
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


    function loadUnitEnable() {
        tablaCarreras.row().clear();
        let Url = "<?php echo base_url('carreras/allenable') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                    console.log(res);
               var contador=1;

                res['carrera'].forEach(carrera => {
                    let mensaje="";
                    $('#id_carrera').val(carrera.id_carrera);
                    if(carrera.carrera==1){
                        mensaje=`<span class="badge badge-pill bg-info">Esperando </span>&nbsp;<i class='fas fa-taxi'>`;
                    }

                    tablaCarreras.row.add([contador,carrera.direccion_origen,carrera.nombre+" : &nbsp;"+carrera.telefono, carrera.telefono_cliente,mensaje,"<div><a class='btn btn-outline-danger' title='Eliminar'  onclick='deletCarrera(" +
                    carrera.id_carrera +
                    ")'> <i class='fas fa-trash'></i></a>&nbsp;<a class='btn btn-outline-primary' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalCarreras'  onclick='carreraDestino(" +
                    carrera.id_carrera+
                    ")'> <i class='fas fa-taxi'></i></a></div>"]);
                    contador++;
                });
                tablaCarreras.draw(true);

            }
        });
    }
 // Create a new race

    $("#forCarrerasAsignar").on('submit',function (e) {
        e.preventDefault();

        let Url="<?php echo base_url('carreras/storeOrigen')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: $("#forCarrerasAsignar").serialize(),
            dataType: "json",
            success:function(res){
                clearForm();
                if(res.success){
                    $('#modalCarrerasAsignar').modal('hide');

                    toastr["success"](res.success);
                    loadUnitEnable();
                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forCarrerasAsignar').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });

    });
//Asignar destino
    $("#forCarreras").on('submit',function (e) {
        e.preventDefault();

        let Url="<?php echo base_url('carreras/updateDestino')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: $("#forCarreras").serialize(),
            dataType: "json",
            success:function(res){
                clearFieldAsignar();
                if(res.success){
                    $('#modalCarreras').modal('hide');
                    toastr["success"](res.success);
                    loadUnitEnable();
                }else{
                    $.each(res.error, function(prefix, val) {
                        $('#forCarreras').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });



    });



//Delet race created
    function deletCarrera(id){
        let Url = `<?php echo base_url()?>/carreras/delet/`+id;
        Swal.fire({
            title: 'Esta seguro?',
            text: "No podra reverti esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar la carrera!'
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



// select cell phone of office
    function Telefonos() {

        let Url = "<?php echo base_url('telefonos/getAll') ?>";
        let telefono = document.getElementById("id_telefono");
        let mensaje = "";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                res.forEach(telefono => {
                        mensaje += "<option value='" + telefono.id_telefono + "'>" + telefono.nombre + "</option>";

                });
                telefono.innerHTML = mensaje;
            }
        });
    }

    // select type carrer from make
    function tipoCarrera() {

        let Url = "<?php echo base_url('carreras/tipocarrera') ?>";
        let tipocarrera = document.getElementById("id_servicio");
        let mensaje = " ";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                res.forEach(ser => {
                        mensaje += "<option value='" + ser.id_servicio + "'>" +ser.servicio + "</option>";
                });
                tipocarrera.innerHTML = mensaje;
            }
        });
    }
//Select unit enable show in the field of name:unidadCarrera
    function vehiculosActivos() {

        let Url = "<?php echo base_url('enableUnit/selectAllUnitEnable') ?>";
        let numeroUnidad = document.getElementById("id_unitActiva");
        let mensaje = "";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {


                if(res.length!=0){
                    res.forEach(datos => {

                        mensaje += "<option   value='" + datos.id_unitActiva + "'>" + datos.unidad +
                            "</option>";
                    });

                }else{
                    mensaje += "<option  value=''>No existen unidades</option>";
                }
                numeroUnidad.innerHTML = mensaje;

            }
        });
    }

    function  editRace(id_carrera){

        let Url = "<?php echo base_url('carreras/selectId') ?>";
        $.ajax({
            method: 'post',
            url: Url,
            data: {
                'id_carrera':id_carrera,
            },
            dataType: 'json',
            success: function(res) {
                $('#direccion_origen').val(res[0].direccion_origen);
            }
        });
    }

//Update race destination and source
    function carreraDestino(id){

       $('#id_carrera').val(id);
       editRace(id);
       vehiculosActivos();
       tipoCarrera();
    }

    function clearForm(){
        clearFields();
        clearLabelErrror();
    }
//Clear fields from race
    function clearFields(){

       $('#direccion_origen').val("");
       $('#telefono_cliente').val("");


    }


    function clearFieldAsignar(){

        $('#direccion_destino').val("");
        $('#descripcion').val("");

    }
    //Clear the labels error from race
    function clearLabelErrror(){

        $('#forCarrerasAsignar').find('span.direccion_origen_error').text("");
        $('#forCarrerasAsignar').find('span.telefono_cliente_error').text("");
        $('#forCarreras').find('span.direccion_destino_error').text("");
        $('#forCarreras').find('span.id_unitActiva_error').text("");

    }

    window.onload=loadUnitEnable();
</script>
