<!--Inicio Tabla lista frequency -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>

    <div class="card-body">



        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <a type="button" href="/reports/frequencyExcel" id="importExcelFrequency" name="importExcelFrequency" title="Import Excel"
                            class="btn btn-success my-2 my-sm-0" >
                        <i class="fas fa-file-excel"></i>&nbsp;Import Excel
                    </a>

                </div>
            </div>
            <br>
            <table class="table table-hover table-sm" id="tableReportFrequency" name="tableReportFrequency">
                <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CEDULA</th>
                <th>CORREO</th>
                <th>PLACA</th>
                <th>UNIDAD</th>
                <th>VALOR</th>
                <th>FECHA DE PAGO</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

