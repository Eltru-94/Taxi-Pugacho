<?= $this->extend('./plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>

<br>


<?=$this->include('/admin/users/tablaUsersBlock') ?>


<?= $this->endSection()?>
/*Scripts Usuario*/
<?= $this->section('scripts')?>
<?=$this->include('/admin/users/usersBlock') ?>
<?= $this->endSection()?>
