<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<?=$this->include('/profile/users/formularioEditUser') ?>

<?= $this->endSection()?>

<?= $this->section('scripts')?>
<?=$this->include('/profile/users/edit') ?>
<?= $this->endSection()?>

