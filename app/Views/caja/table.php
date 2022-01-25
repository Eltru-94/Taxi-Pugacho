
<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div class="input-group">
                <form class="form-inline my-2 my-lg-0">
                    <input type="search" id="txt_Buscar" onkeyup="Buscar()" class="form-control mr-sm-2"
                           placeholder="Buscar">
                </form>

            </div>


            <br>
            <table class="table table-hover table-sm" style="width:100%" id="tablaCarreras" name="tablaCarreras">
                <thead>
                <tr>
                    <th>N.- </th>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Unidad</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Rol </th>
                    <th>usuario</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>