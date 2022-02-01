<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>

<?=$this->include('/unidades/tableUnidades') ?>
<?=$this->include('/unidades/formulario') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('unidades/unidades')?>

<?= $this->endSection()?>