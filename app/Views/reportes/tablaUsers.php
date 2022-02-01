<!--Inicio Tabla lista Users -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>

    <div class="card-body">



        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="carreraCreate" name="carreraCreate" title="Activar Unidad"
                            class="btn btn-outline-primary my-2 my-sm-0" data-bs-toggle="modal"
                            data-bs-target="#modalCarrerasAsignar">
                        <i class="fas fa-plus-square"></i>
                    </button>

                </div>
            </div>
            <br>
            <table class="table table-hover table-sm" id="tableReportUsers" name="tableReportUsers">
                <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CEDULA</th>
                <th>CORREO</th>
                <th>DIRECCION</th>
                <th>ROL</th>
                <th>TELEFONO</th>
                <th>LICENCIA</th>
                <th>FECHA</th>
                <th>ESTADO</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
