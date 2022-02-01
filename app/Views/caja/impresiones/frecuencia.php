<?= $this->extend('plantilla/layoutPrint') ?>

<?= $this->section('titulo') ?>
<?php echo $title; ?>
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
<h1 style="text-align: center"><?php echo $title; ?></h1>
<hr>
<?php

$mensaje = "<h4>Fecha : " . $vehicle[0]['dia'] . "/" . $vehicle[0]['mesId'] . "/20" . $vehicle[0]['anio'] . "</h4>";
print_r($mensaje);

?>
<?php
$mensaje = "<h4>Nombre : " . $vehicle[0]['nombre'] . "\t" . $vehicle[0]['apellido'] . "\t"."Cedula : " .$vehicle[0]['cedula'] . "\t"."Telefono : " .$vehicle[0]['telefono'] . "</h4>";
print_r($mensaje);

?>
<?php
$mensaje = "<h4>Placa : " . $vehicle[0]['placa'] . "\t"."Unidad : " .$vehicle[0]['unidad'] . "\t"."Color : " .$vehicle[0]['color'] . "</h4>";
print_r($mensaje);

?>
<?php
$mensaje = "<h4>Correo : " . $vehicle[0]['correo'] ."</h4>";
print_r($mensaje);

?>
<hr>
<table style="width:95%;">
    <thead>
    <th>ID</th>
    <th>DETALLES</th>
    <th>PRECIO UNITARIO</th>
    <th>PRECIO TOTAL</th>
    </thead>
</table>
<table style="width:90%;text-align: left">
    <tbody>
    <td>1</td>
    <td>Pago mes  <?php print_r($mes) ?></td>
    <td>$<?php echo($vehicle[0]['valor']); ?></td>
    <td>$<?php echo($vehicle[0]['valor']); ?></td>
    </tbody>

</table>
<table style="width:90%">
    <tbody>
    <td></td>
    <td><h4 style="text-align:right"><strong>TOTAL A PAGAR :</strong></h4></td>
    <td></td>
    <td>$<?php echo($vehicle[0]['valor']); ?></td>
    </tbody>

</table>
<?= $this->endSection() ?>