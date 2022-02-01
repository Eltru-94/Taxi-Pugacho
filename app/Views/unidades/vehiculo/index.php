<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>

<?=$this->include('/unidades/vehiculo/formulario') ?>

<?=$this->include('/unidades/vehiculo/tabla') ?>


<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/unidades/vehiculo/vehiculo') ?>
<?= $this->endSection()?>