<!--Inicio Tabla lista Users -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>

    <div class="card-body">



        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <a type="button" href="/reports/usersExcel" title="Import Excel"
                            class="btn btn-success" >
                        <i class="fas fa-file-excel"></i>&nbsp;Import Excel
                    </a>

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
