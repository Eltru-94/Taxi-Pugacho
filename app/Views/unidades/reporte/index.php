<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<?=$this->include('/unidades/reporte/table') ?>
<?=$this->include('/unidades/reporte/formulario') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/unidades/reporte/reporte') ?>
<?= $this->endSection()?>
