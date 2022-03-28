<script>

    const colorFondo = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(125, 9, 255, 0.2)',
        'rgba(54, 22, 25, 0.2)',
        'rgba(15, 6, 123, 0.2)',
        'rgba(235, 72, 200, 0.2)',
        'rgba(203, 21, 25, 0.2)',
        'rgba(185, 15, 164, 0.2)'
    ];
    const colorBoder = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(125, 9, 255, 1)',
        'rgba(54, 22, 25, 1)',
        'rgba(15, 6, 123, 1)',
        'rgba(235, 72, 200, 1)',
        'rgba(203, 21, 25, 1)',
        'rgba(185, 15, 164, 1)'
    ];

    function totalUsers() {
        let Url = "<?php echo base_url('users/state') ?>";
        $.ajax({
            'type': 'post',
            url: Url,
            data: {
                'estado': 1
            },
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.users.length + '&nbsp; <i class="fas fa-users"></i><h2><h5>Total Usuarios</h5>';
                let a = document.getElementById("car_users");
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
                let a = document.getElementById("car_cars");
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
                let a = document.getElementById("car_ingresos");
                a.innerHTML = mensaje;
            }
        });
    }

    function totalRaceDayMake() {
        let Url = "<?php echo base_url('carreras/total_race_day') ?>";
        $.ajax({
            'type': 'post',
            data: {
                'qualify': 2,
            },
            url: Url,
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.Total_race_day + '&nbsp; <i class="fas fa-taxi"></i><h2><h5>Total Carreras Realizadas</h5>';
                let a = document.getElementById("race_make");
                a.innerHTML = mensaje;
            }
        });
    }

    function totalRaceCancelled() {
        let Url = "<?php echo base_url('carreras/total_race_day') ?>";
        $.ajax({
            'type': 'post',
            data: {
                'qualify': 1,
            },
            url: Url,
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.Total_race_day + '&nbsp; <i class="fas fa-taxi"></i><h2><h5>Total Carreras Canceladas</h5>';
                let a = document.getElementById("race_day_cancelled");
                a.innerHTML = mensaje;
            }
        });
    }

    function totalRaceLost() {
        let Url = "<?php echo base_url('carreras/total_race_day') ?>";
        $.ajax({
            'type': 'post',
            data: {
                'qualify': 3,
            },
            url: Url,
            dataType: 'json',
            success: function (res) {
                let mensaje = '<h2>' + res.Total_race_day + '&nbsp; <i class="fas fa-taxi"></i><h2><h5>Total Carreras Canceladas</h5>';
                let a = document.getElementById("race_day_lost");
                a.innerHTML = mensaje;
            }
        });
    }


    $("#formAsistencia").on('submit', function (e) {

        e.preventDefault();
        let Url = "<?php echo base_url('operadores/create')?>";
        $.ajax({
            type: 'post',
            url: Url,
            data: $("#formAsistencia").serialize(),
            dataType: "json",
            success: function (res) {

                if (res.success) {
                    $('#modalAsistencia').modal('hide');
                    toastr["success"](res.success);
                    Cargarfunciones();

                } else {
                    $.each(res.error, function (prefix, val) {
                        $('#formAsistencia').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });

    });


    function totalGraficos() {
        let Url = "<?php echo base_url('reports/graphicFrequency') ?>";
        let ctx = document.getElementById('myAreaChart').getContext('2d');

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
                            backgroundColor: colorFondo,
                            borderColor: colorBoder,
                            borderWidth: 2
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

        qualifyAssistanceColores();
        totalGraficos();
        totalUsers();
        totalCars();
        totalIngresos();
        totalRaceDayMake();
        totalRaceCancelled();
        totalRaceLost();
        schedule();

    }

    function schedule() {

        $('#operador').val("<?php echo session('name');?>");
        let schedule = document.getElementById("horario");
        let mensaje = " <option selected value='-1'>Escoga el horario...</option>";

        for (let i = 0; i < scheduleTaxis.length; i++) {
            mensaje += "<option value='" + (i + 1) + "'>" + scheduleTaxis[i] + "</option>";
        }

        schedule.innerHTML = mensaje;
    }


    function qualifyAssistanceColores() {


        let id_user = $('#id_user').val();
        let Url = "<?php echo base_url('operadores/selectForId') . '/'?>" + id_user;
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {

                if (res.estado == 0) {
                    $("#crearAsistencia").attr("hidden", false);
                    $("#finalizarAsistencia").attr("hidden", true);
                }

                if (res.estado == 1) {
                    $("#crearAsistencia").attr("hidden", true);
                    $("#finalizarAsistencia").attr("hidden", false);
                }


            }
        });


    }

    function finalizacionTurno() {
        let Url = `<?php echo base_url()?>/operadores/update`;
        Swal.fire({
            title: 'Esta seguro?',
            text: "No podra reverti esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Finzalizar turno!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    'type': "post",
                    url: Url,
                    data: {
                        'id_user': $('#id_user').val(),
                        'estado': 0
                    },
                    dataType: 'json',
                    success: function (res) {
                        if (res.success) {
                            toastr["success"](res.success);
                            Cargarfunciones();
                        }
                    }
                });
            }
        });
    }


    window.onload = Cargarfunciones;
</script>
