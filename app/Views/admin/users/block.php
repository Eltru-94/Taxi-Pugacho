<?= $this->extend('./plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>
//Main User
<?= $this->section('contenido')?>

<h1 class="mt-4">Usuarios bloqueados</h1>



<?=$this->include('/admin/users/tablaBlock') ?>


<?= $this->endSection()?>
/*Scripts Usuario*/
<?= $this->section('scripts')?>
<?=$this->include('/admin/users/userblock') ?>
<?= $this->endSection()?>