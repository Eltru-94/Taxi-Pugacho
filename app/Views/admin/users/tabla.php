



<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
           <div class="row">
               <div class="col-md-12">
                   <div><button type="button" title="Resgistrar Usuario" class="btn btn-outline-primary my-2 my-sm-0" onclick="tituloUser()" data-bs-toggle="modal"
                                data-bs-target="#modalUser">
                           <i class="fas fa-plus-square"></i>
                       </button>
                   </div>
                   <br>
                   <div class="table-responsive-md">

                   </div>
               </div>
           </div>
            <table class="table table-sm table-hover text-center" id="tablaUsers" style="width:100%" name="tablaUsers">
                <thead>
                <th>ID</th>
                <th>FOTO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CORREO</th>
                <th>CEDULA</th>
                <th>TÉLEFONO</th>
                <th>LICENCIA</th>
                <th>EDAD</th>
                <th>ROL</th>
                <th>ACCIÓN</th>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>