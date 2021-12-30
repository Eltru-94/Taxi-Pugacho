<?= $this->extend('./plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>
//Main User
<?= $this->section('contenido')?>
<br>
<h2 class="text-center">Usuarios bloqueados</h2>



<?=$this->include('/admin/users/tablaBlock') ?>


<?= $this->endSection()?>
/*Scripts Usuario*/
<?= $this->section('scripts')?>
<?=$this->include('/admin/users/userblock') ?>
<?= $this->endSection()?>