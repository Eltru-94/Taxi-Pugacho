<!DOCTYPE html>
<html lang="en">

<head>
    <?=$this->include('plantilla/header') ?>

</head>

<body class="bg-warning">



<div id="layoutSidenav">



    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <?= $this->renderSection('contenido')?>

            </div>
        </main>

    </div>

</div>

<?= $this->renderSection('scripts')?>

<?=$this->include('plantilla/links')?>
</body>

</html>


<script>

</script>
