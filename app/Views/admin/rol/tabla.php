<div class="col-md-12">
    <h4>Roles</h4>
    <form class="d-flex">
        <input class="form-control me-sm-2" id="buscar" name="buscar" type="text" placeholder="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Roles</th>
            <th>Descripcion</th>
            <th>Acción</th>
        </thead>

        <?php foreach($roles as $rol) { ?>
        <tr>
            <td><?= $rol['id_rol']?></td>
            <td><?= $rol['rol']?></td>
            <td><?= $rol['descripcion']?></td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#ModalRol">
                    Actualizar
                </button>
            </td>


        </tr>
        <?php }?>

    </table>
</div>