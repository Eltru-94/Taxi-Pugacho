<?= $this->extend('./plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>


<?=$this->include('/admin/rol/formulario') ?>

<?=$this->include('/admin/rol/tabla')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('/admin/rol/rol') ?>
<?= $this->endSection()?>