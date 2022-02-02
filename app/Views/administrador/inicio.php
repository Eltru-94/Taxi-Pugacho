<script>



    function totalUsers() {
        let Url = "<?php echo base_url('users/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.users.length + '&nbsp; <i class="fas fa-users"></i><h2><h5>Total Usuarios</h5>';
                var a = document.getElementById("car_users");
                a.innerHTML = mensaje;

            }
        });
    }

    function totalCars() {
        let Url = "<?php echo base_url('vehiculo/fetch') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1,
                'estadoVehiculo': 1
            },
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.length + '&nbsp; <i class="fas fa-car"></i><h2><h5>Total Unidades</h5>';
                var a = document.getElementById("car_cars");
                a.innerHTML = mensaje;
            }
        });
    }

    function totalIngresos() {
        let Url = "<?php echo base_url('frecuencia/total') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res[0].Total + '&nbsp; <i class="fas fa-dollar-sign"></i><h2><h5>Total ingresos</h5>';
                var a = document.getElementById("car_ingresos");
                a.innerHTML = mensaje;
            }
        });
    }


    function totalGraficos() {
        let Url = "<?php echo base_url('reports/graphicFrequency') ?>";
        var ctx = document.getElementById('myAreaChart').getContext('2d');

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {
                let total = [];
                let labels = [];
                res[0].forEach(tot => {

                    total.push(tot.TOTAL);
                    labels.push(tot.mes);
                });
                total.push(0);
                new Chart(ctx, {
                    type: 'bar',// Tipo de gráfica
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Frecuencia',
                            data: total,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        title: {
                            display: true,
                            text: "Frecuencia",
                        }
                    }
                });
            }
        });


    }

    function Cargarfunciones() {
        totalUsers();
        totalCars();
        totalIngresos();
        totalGraficos();

    }


    window.onload = Cargarfunciones;
</script>
