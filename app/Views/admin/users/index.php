<?= $this->extend('./plantilla/layout')?>

<?= $this->section('titulo')?>
Users
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>
<?=$this->include('/admin/users/formulario') ?>
<hr>
<?=$this->include('/admin/users/tabla') ?>



<script>
$(document).ready(function() {

    $(document).on('click', '.btnCrearUser', function() {
        alert("si entramoss");
    });

});
</script>
<?= $this->endSection()?>