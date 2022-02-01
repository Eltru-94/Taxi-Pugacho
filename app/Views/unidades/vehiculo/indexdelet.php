<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>


<?=$this->include('/unidades/vehiculo/tabledelet') ?>


<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/unidades/vehiculo/vehiculodelet') ?>
<?= $this->endSection()?>
