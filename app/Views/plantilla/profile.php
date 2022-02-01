<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="student-profile py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="<?= base_url() . "/image/" . $user[0]['foto'] ?>"
                                     style="width: 100%" alt="student dp">
                                <h3><?php echo $user[0]['nombre'] . ' ' . $user[0]['apellido']; ?></h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Información General</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Rol</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['rol']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Cedula</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['cedula']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Licencia</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['licencia']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Telefono</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['telefono']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Direccion</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['direccion']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Correo</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['correo']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Fecha nacimiento</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['fechanacimiento']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Genero</th>
                                        <td width="2%">:</td>
                                        <td><?php echo $user[0]['genero']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="height: 26px"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




