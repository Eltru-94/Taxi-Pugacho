<?= $this->extend('plantilla/layout') ?>

<?= $this->section('titulo') ?>
<?php echo $title; ?>
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
    <br>
<?= $this->include('/reportes/tablaFrequency') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>


<?=$this->include('/reportes/reportes') ?>
<?= $this->endSection() ?>