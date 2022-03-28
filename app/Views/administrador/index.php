<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<br>
<!--Rol Administrativo -->
<?php  if( session()->get('id_rol')==1){?>

    <?=$this->include('plantilla/cards') ?>
    <?=$this->include('plantilla/grafica') ?>
<?php }?>
<!--Rol operador -->
<?php  if( session()->get('id_rol')==2){?>
    <?=$this->include('plantilla/operador') ?>
    <?=$this->include('plantilla/cards') ?>
    <?=$this->include('plantilla/grafica') ?>

<?php }?>
<!--Rol Chofer -->
<?php  if( session()->get('id_rol')==3){?>
    <?=$this->include('plantilla/profile') ?>
<?php }?>

<?= $this->endSection()?>

/*Scripts Inicio*/
<?= $this->section('scripts')?>
<?=$this->include('administrador/inicio') ?>
<?= $this->endSection()?>
