<!DOCTYPE html>
<html lang="en">

<head>
    <?=$this->include('plantilla/header') ?>
</head>

<body class="sb-nav-fixed">

    
<?=$this->include('plantilla/navegacion')?>
    <div id="layoutSidenav">

        <?= $this->include('plantilla/menu')?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">

                    <?= $this->renderSection('contenido')?>

                </div>
            </main>
            <?=$this->include('plantilla/footer')?>
        </div>

    </div>
    <?= $this->renderSection('scripts')?>
    <?=$this->include('plantilla/links')?>
</body>

</html>