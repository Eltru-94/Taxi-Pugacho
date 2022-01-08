<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
    <h2 class="text-center"><?php echo $title ?></h2>

<?=$this->include('plantilla/cards') ?>

<?= $this->endSection()?>

/*Scripts Inicio*/
<?= $this->section('scripts')?>
<?=$this->include('administrador/inicio') ?>
<?= $this->endSection()?>
