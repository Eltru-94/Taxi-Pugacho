<?= $this->extend('./plantilla/layout')?>

<?= $this->section('titulo')?>
<?php echo $title ?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>



<?=$this->include('/admin/funcionalidad/tabla')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<script>
let tablaRoles = $('#tablaFuncionalidades').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ Funcionalidades",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registro de roles del _START_ al _END_ de un total de _TOTAL_",
        "infoEmpty": "Mostrando registro del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado un todal de _MAX_ re)",
        "sSearch": "Buscar : ",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        }
    },
});


function loadFuncionalidades() {
    tablaRoles.row().clear();
    let Url = "<?php echo base_url('funcionalidad/fetch') ?>";
    $.ajax({
        'type': 'get',
        url: Url,
        dataType: 'json',
        success: function(res) {
            let cont = 1;
            var temp = "";
            res.forEach(fun => {
                temp = tablaRoles.row.add([cont, fun.funcionalidad, fun.descripcion
                ]);
                cont++;
            });
            tablaRoles.draw(true);
        }
    });
}
window.onload =loadFuncionalidades;
</script>
<?= $this->endSection()?>