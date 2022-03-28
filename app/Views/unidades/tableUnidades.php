


<!--Inicio Tabla lista Unidades activadas -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <div class="row">
                <div class="col-md-12">
                    <button type="button" name="btnDeleteFrequency"  onclick="deleteFrequency()" id="btnDeleteFrequency" title="Desactivar Frecuencia" class="btn btn-outline-danger my-2 my-sm-0">
                        <i class="fas fa-plus-square"></i>
                    </button>

                </div>
            </div>

            <br>
            <table class="table table-hover table-sm" style="width:100%" id="tablaVehiculoEnable" name="tablaVehiculoEnable">
                <thead>
                <th>ID</th>
                <th>HORARIO</th>
                <th>UNIDAD</th>
                <th>REPORTE</th>
                <th>CREADO</th>
                <th>ACCION</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>