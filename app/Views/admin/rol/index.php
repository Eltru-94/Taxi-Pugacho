<?= $this->extend('./plantilla/layout')?>

<?= $this->section('titulo')?>
Roles
<?= $this->endSection()?>



<?= $this->section('contenido')?>
<br>

<?=$this->include('/admin/rol/formulario') ?>
<br>
<br>
<?=$this->include('/admin/rol/tabla')?>




<script>
$(document).ready(function() {

    $('#btnCrearRol').on('click', function() {
        let rol=$("#rol").val();
        let descripcion=$('#descripcion').val();
       
    });

});
</script>
<?= $this->endSection()?>