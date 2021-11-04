<?= $this->extend('plantilla/layout')?>

<?= $this->section('titulo')?>
Admin
<?= $this->endSection()?>

<?= $this->section('contenido')?>



<div class="container">
    <div class="row" style="margin-top:40px">
        <div class="col-md-4">
            <h4>Administrador</h4>
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>LOggedUser</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $title?></td>
                        <td><?= $id?></td>
                        <td><a href="<?=site_url('auth/logout') ?>">logout</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection()?>