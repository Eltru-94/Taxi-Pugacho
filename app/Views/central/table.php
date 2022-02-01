

<!--Inicio Tabla lista central -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="carreraCreate"  name="carreraCreate" title="Activar Unidad" class="btn btn-outline-primary my-2 my-sm-0"  data-bs-toggle="modal"
                            data-bs-target="#modalCarrerasAsignar" onclick="Telefonos(0)">
                        <i class="fas fa-plus-square"></i>
                    </button>

                </div>
            </div>
            <br>
            <table class="table table-hover table-sm"  id="tablaCarreras" name="tablaCarreras">
                <thead>
                <th>ID</th>
                <th>ORIGEN</th>
                <th>TELEFONO <i class="fas fa-building"></i>&nbsp;<i class="fas fa-phone-alt"></i></th>
                <th>CLIENTE <i class="fas fa-phone-alt"></i></th>
                <th>ESTADO</th>
                <th>ACCION</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>