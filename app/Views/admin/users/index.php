<?= $this->extend('./plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>
//Main User
<?= $this->section('contenido')?>

<h1 class="mt-4">Usuarios</h1>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="index.html">Sidenav Light</a></li>
    <li class="breadcrumb-item"><a href="index.html">Sidenav Light</a></li>
</ol>
<?=$this->include('/admin/users/formulario') ?>
<br>
<br>
<?=$this->include('/admin/users/tabla') ?>


<?= $this->endSection()?>
/*Scripts Usuario*/
<?= $this->section('scripts')?>
<?=$this->include('/admin/users/user') ?>
<?= $this->endSection()?>