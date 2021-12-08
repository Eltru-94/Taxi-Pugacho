<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>

<h2 class="text-center"><?php echo $title ?></h2>


<?php $a= session('funcionalidades');?>
<?= $this->endSection()?>