

<script>
    function totalUsers(){
        let Url = "<?php echo base_url('users/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function(res) {
                let mensaje='<h2>'+res.users.length+'&nbsp; <i class="fas fa-users"></i><h2><h5>Total Usuarios</h5>';
                var a = document.getElementById("car_users");
                a.innerHTML=mensaje;

            }
        });
    }
    function totalCars(){
        let Url = "<?php echo base_url('vehiculo/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1,
                'estadoVehiculo':1
            },
            dataType: 'json',
            success: function(res) {
                let mensaje='<h2>'+res.length+'&nbsp; <i class="fas fa-car"></i><h2><h5>Total Unidades</h5>';
                var a = document.getElementById("car_cars");
                a.innerHTML=mensaje;
            }
        });
    }

    function totalIngresos(){
        let Url = "<?php echo base_url('frecuencia/total') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let mensaje='<h2>'+res[0].Total+'&nbsp; <i class="fas fa-dollar-sign"></i><h2><h5>Total ingresos</h5>';
                var a = document.getElementById("car_ingresos");
                a.innerHTML=mensaje;
            }
        });
    }

    function  Cargarfunciones(){
        totalUsers();
        totalCars();
        totalIngresos();

    }


    window.onload=Cargarfunciones;
</script>
