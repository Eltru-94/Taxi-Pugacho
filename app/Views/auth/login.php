<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:55px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Sing in</h4>
                <form action="<?= base_url('auth/check') ?>" method="post">
                    <?php  csrf_field() ?>
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
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="correo" placeholder="Ingrese"
                            value="<?= set_value('correo');?>">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'correo'): ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Passwoord</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingrese">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation,'password'): ''?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sing in</button>
                    </div>
                    <br>
                    <a href="<?= site_url('auth/register'); ?>">No tiene una cuenta, crear nueva cuenta</a>
                </form>
            </div>
        </div>
    </div>

</body>




</html>