

<!--Inicio Tabla lista vehiculos -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" title="Registrar Vehiculo" class="btn btn-outline-primary my-2 my-sm-0" onclick="year()" data-bs-toggle="modal"
                                 data-bs-target="#modalVehiculo">
                            <i class="fas fa-plus-square"></i>
                        </button>

                </div>
            </div>
<br>
            <table class="table table-hover text-center" id="tablaVehiculo" name="tablaVehiculo">
                <thead>
                <th>ID</th>
                <th>IMAGEN 1</th>
                <th>IMAGEN 2</th>
                <th>IMAGEN 3</th>
                <th>PLACA</th>
                <th>AÑO</th>
                <th>MARCA</th>
                <th>COLOR</th>
                <th>MODELO</th>
                <th>UNIDAD</th>
                <th>ESTADO</th>
                <th>PROPIETARIO</th>
                <th>ACCION</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>