

<!--Inicio Tabla lista central -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <a title="Import Excel" href="/reports/assistanceExcel" class="btn btn-success" >
                        <i class="fas fa-file-excel"></i>&nbsp;Import Excel
                    </a>

                </div>
            </div>
            <br>
            <table class="table table-hover table-sm"  id="tableReportAssistance" name="tableReportAssistance">
                <thead>
                <th>ID</th>
                <th>PROPIETARIO</th>
                <th>UNIDAD <i class="fas fa-car"></i></th>
                <th>REPORTE</th>
                <th>DESCRIPCION</th>
                <th>FECHA</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>