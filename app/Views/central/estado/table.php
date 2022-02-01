


<!--Inicio Tabla carrera realizadas -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <a title="Import Excel" href="/carreras/allRaceMadeImportExcel" class="btn btn-success" >
                        <i class="fas fa-file-excel"></i>&nbsp;Import Excel
                    </a>

                </div>
            </div>
            <br>
            <table class="table table-hover table-sm" style="width:100%" id="tablaCarrerasState" name="tablaCarrerasState">
                <thead>
                <th>ID</th>
                <th>UNIDAD </th>
                <th>CARRERA</th>
                <th>TIPO</th>
                <th>TELEFONO <i class="fas fa-building"></i>&nbsp;<i class="fas fa-phone-alt"></i></th>
                <th>TELEFONO</th>
                <th>HORA INICIO&nbsp;<i class="far fa-clock"></i></th>
                <th>HORA FIN&nbsp;<i class="far fa-clock"></i></th>
                <th>DESTINO <i class="fas fa-map-marked"></i></th>
                <th>ORIGEN&nbsp;<i class="fas fa-map-marked"></i></th>
                <th>DESCRIPCION</th>


                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
