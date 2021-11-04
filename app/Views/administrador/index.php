<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
Admin juab
<?= $this->endSection()?>
<?= $this->section('informacion')?>
<?= $persona[0]['nombre'].' '.$persona[0]['apellido']?>
<?= $this->endSection()?>
<?= $this->section('contenido')?>

<h1>Administrativo</h1>

<?= $this->endSection()?>