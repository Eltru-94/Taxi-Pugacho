<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>

<?=$this->include('/caja/table') ?>

<?=$this->include('/caja/formulario') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('/caja/cobroFrecuencia') ?>

<?= $this->endSection()?>