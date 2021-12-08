<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<h2 class="text-center"><?php echo $title;?></h2>

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-12 col-sm-12">

            <div id="map" class="text-center" style="height: 500px; width: 100%">

            </div>
        </div>
    </div>

    <?= $this->endSection()?>



    <?= $this->section('scripts')?>
    <?=$this->include('/geolocalizacion/geolocalizacion') ?>
    <?= $this->endSection()?>