<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<?=$this->include('/profile/vehicleDisable/tableVehicleDisable') ?>

<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/profile/vehicleDisable/vehicleDisable') ?>
<?= $this->endSection()?>
