<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>
    <h2 class="text-center"><?php echo $title;?></h2>


<?=$this->include('/central/navegacion') ?>
<?=$this->include('/central/formulario') ?>
<?=$this->include('/central/table') ?>

<?= $this->endSection()?>

<?= $this->section('scripts')?>

<?=$this->include('/central/central') ?>

<?= $this->endSection()?>