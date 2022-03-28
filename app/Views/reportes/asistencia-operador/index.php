<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
    <br>
<?=$this->include('/reportes/asistencia-operador/tabla') ?>
<?= $this->endSection()?>

<?= $this->section('scripts')?>


<?=$this->include('/reportes/asistencia-operador/asistenciaOperador') ?>
<?= $this->endSection()?>