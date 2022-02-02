<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <div class="col-auto">
                <form id="fromFrecuencia">
                    <input type="search" id="cedula" onkeyup="Buscar()" class="form-control-sm"
                           placeholder="Ingrese la cedula">

                    <input type="submit" class="btn btn-outline-primary" value="Buscar">
                    <br>
                    <span class="text-danger error-text cedula_error"></span>
                </form>

            </div>


            <br>
            <table class="table table-hover table-sm" id="tablaFrecuencia" name="tablaFrecuencia">
                <thead>
                <tr>
                    <th>N.-</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CEDULA</th>
                    <th>PLACA</th>
                    <th>UNIDAD</th>
                    <th>FRECUENCIA</th>
                    <th>ACCIÓN</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>