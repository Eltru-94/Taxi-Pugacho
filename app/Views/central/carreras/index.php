<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>
    <h2 class="text-center"><?php echo $title;?></h2>
<?=$this->include('./central/navegacion') ?>
<?=$this->include('./central/carreras/formulario') ?>
<?=$this->include('./central/carreras/table') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('./central/carreras/carreras') ?>

<?= $this->endSection()?>