<div class="col-md-4">
    <h4>Personas</h4>
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Cedula</th>
            <th>Telefono</th>
        </thead>
        <tbody>
            <?php foreach($personas as $per) { ?>
            <tr>
                <td><?= $per['id_per']?></td>
                <td><?= $per['nombre']?></td>
                <td><?= $per['apellido']?></td>
                <td><?= $per['correo']?></td>
                <td><?= $per['cedula']?></td>
                <td><?= $per['telefono']?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>