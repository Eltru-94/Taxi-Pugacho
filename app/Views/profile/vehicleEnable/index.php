<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<?=$this->include('/profile/vehicleEnable/tablaVehicleEnable') ?>

<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/profile/vehicleEnable/vehicleEnable') ?>
<?= $this->endSection()?>

