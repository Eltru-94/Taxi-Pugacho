<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>


<?=$this->include('./central/carreras/formulario') ?>
<?=$this->include('./central/carreras/table') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('./central/carreras/carreras') ?>

<?= $this->endSection()?>