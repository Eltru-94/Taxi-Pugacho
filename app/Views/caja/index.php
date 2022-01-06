<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>
    <h2 class="text-center"><?php echo $title;?></h2>
    <form>
        <div class="row">
        <div class="col-sm-12 my-12">

            <div class="input-group">

                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Buscar por nombre o cedula">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> &nbsp; Buscar</button>
                </div>
            </div>
        </div>

    </form>
</div>
<br>
<div class="row" >

    <div class="col-sm-12">
    <div class="card">
        <div class="card-header"> <h5 class="display-7">Juan Perez</h5></div>
        <div class="card-body">

            <div class="col-md-12">
                <div class="table">
                    <table class="table" style="width:100%" id="tablaCarreras" name="tablaCarreras">
                        <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th>FRECUENCIA</th>
                        <th>ESTADO</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<?= $this->endSection()?>

<?= $this->section('scripts')?>



<?= $this->endSection()?>