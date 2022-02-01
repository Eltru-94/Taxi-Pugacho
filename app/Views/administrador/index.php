<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>
<br>
<?php  if( session()->get('id_rol')!=3){?>
<?=$this->include('plantilla/cards') ?>
<?php }else{?>
<?=$this->include('plantilla/profile') ?>
<?php }?>
<?= $this->endSection()?>

/*Scripts Inicio*/
<?= $this->section('scripts')?>
<?=$this->include('administrador/inicio') ?>
<?= $this->endSection()?>
