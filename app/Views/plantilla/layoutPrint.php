<!DOCTYPE html>
<html lang="en">
<title> <?= $this->renderSection('titulo')?></title>
<head>
    <?=$this->include('plantilla/header') ?>
</head>

<body>

<?= $this->renderSection('contenido')?>

<?=$this->include('js/metodos')?>
<?= $this->renderSection('scripts')?>

<?=$this->include('plantilla/links')?>
</body>

</html>


<script>

</script>
