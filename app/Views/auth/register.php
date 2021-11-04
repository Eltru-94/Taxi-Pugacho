<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:55px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Sing up</h4>
                <form action="<?= base_url('auth/save')?>" method="post">
                    <?= csrf_field(); ?>

                    <?php if(!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('fail'); ?>
                    </div>
                    <?php endif ?>

                    <?php if(!empty(session()->getFlashdata('success'))): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="">Nombre : </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Enter nombre"
                            value="<?= set_value('nombre');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'nombre'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido : </label>
                        <input type="text" class="form-control" name="apellido" placeholder="Enter apellido"
                            value="<?= set_value('apellido');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'apellido'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Cedula : </label>
                        <input type="text" class="form-control" name="cedula" placeholder="Enter cedula"
                            value="<?= set_value('cedula');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'cedula'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Telefono : </label>
                        <input type="text" class="form-control" name="telefono" placeholder="Enter Telefono"
                            value="<?= set_value('telefono');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'telefono'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo" placeholder="Enter correo"
                            value="<?= set_value('correo');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'correo'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'password'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for=""> Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confrim password">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'cpassword'): ''?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sing up</button>
                    </div>
                    <br>
                    <a href="<?= site_url('auth')?>">I already have account</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>