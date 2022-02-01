<?= $this->extend('./plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>
//Main User
<?= $this->section('contenido')?>

<br>
<?=$this->include('/admin/users/formulario') ?>

<?=$this->include('/admin/users/tabla') ?>


<?= $this->endSection()?>
/*Scripts Usuario*/
<?= $this->section('scripts')?>
<?=$this->include('/admin/users/user') ?>
<?= $this->endSection()?>