<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>




<?=$this->include('/central/formulario') ?>
<?=$this->include('/central/table') ?>

<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('/central/central') ?>

<?= $this->endSection()?>