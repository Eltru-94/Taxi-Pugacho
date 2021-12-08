<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>


<div class="jumbotron text-center">

    <h2>Datos Personales </h2>
    <img class="img-fluid img-thumbnail" width="15%" height="15%"
        src="<?php echo base_url('/image/'.$vehiculoUser[0]['foto']); ?>" alt="">
    <br>
    <br>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Nombre : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['nombre']; ?>" readonly>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Apellido : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['apellido']; ?>" readonly>
        </div>
    </div>
    <br>

    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Cedula : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['cedula']; ?>" readonly>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Telefono : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['telefono']; ?>" readonly>
        </div>
    </div>
    <br>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Licencia : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['licencia']; ?>" readonly>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Fecha nacimiento :
            </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['fechanacimiento']; ?>" readonly>
        </div>
    </div>
    <br>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Placa : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['placa']; ?>" readonly>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Modelo : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['modelo']; ?>" readonly>
        </div>
    </div>

    <br>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Año: </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['fechafabricacion']; ?>" readonly>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label form-control-sm"><strong>Marca : </strong></label>
        <div class="col-sm-4">
            <input class="form-control form-control-sm" type="text"
                placeholder="<?php echo $vehiculoUser[0]['marca']; ?>" readonly>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <h3>Frontal</h3>
            <img class="img-fluid img-thumbnail"
                src="<?php echo base_url('/vehiculos/'.$vehiculoUser[0]['imagen1']); ?>" alt="">
        </div>

        <div class="col-sm-4">
            <h3>Lateral</h3>
            <img class="img-fluid img-thumbnail"
                src="<?php echo base_url('/vehiculos/'.$vehiculoUser[0]['imagen2']); ?>" alt="">
        </div>

        <div class="col-sm-4">
            <h3>Trasera</h3>
            <img class="img-fluid img-thumbnail"
                src="<?php echo base_url('/vehiculos/'.$vehiculoUser[0]['imagen3']); ?>" alt="">
        </div>
    </div>

</div>


<br>
<br>
<div class="text-right">
    <button type="button" onclick="window.print();" class="btn btn-primary btn-sm">Imprimir</button>
</div>


<?= $this->endSection()?>

<?= $this->section('scripts')?>


<script>
function imprimir() {
    alert('Hola drioffffff');
}
</script>
<?= $this->endSection()?>