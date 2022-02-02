<?= $this->extend('plantilla/layout') ?>

<?= $this->section('titulo') ?>
<?php echo $title; ?>
<?= $this->endSection() ?>



<?= $this->section('contenido') ?>
    <br>

    <div class="card">

        <div class="card-header py-3 centro">
            <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <div id="map" class="text-center" style="height: 500px; width: 100%">
            </div>


            </div>
        </div>


    </div>


<?= $this->endSection() ?>



<?= $this->section('scripts') ?>
<?= $this->include('/geolocalizacion/geolocalizacion') ?>
<?= $this->endSection() ?>