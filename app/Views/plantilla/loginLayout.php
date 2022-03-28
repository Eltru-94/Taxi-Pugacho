<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('plantilla/header') ?>

</head>

<body class="bg-warning">


<div class="container">
    <div class="row login-page">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <?= $this->renderSection('contenido')?>
        </div>

    </div>

</div>

<?= $this->renderSection('scripts') ?>

<?= $this->include('plantilla/links') ?>
</body>

</html>


<script>

</script>
