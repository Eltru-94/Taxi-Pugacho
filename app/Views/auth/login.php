<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">

    <link rel="shortcut icon" href="<?= base_url('/image/icono.jpg')?>">
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Iniciar Session</h3>
                            </div>
                            <div class="card-body">

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
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Ingrese">
                                        <span
                                            class="text-danger"><?= isset($validation) ? display_error($validation,'password'): ''?></span>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Sing in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>