<?= $this->extend('plantilla/loginLayout') ?>

<?= $this->section('contenido') ?>
<br>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">

        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>

    </div>
    <div class="modal-body">

        <form name="formLogin" id="formLogin">
            <div class="form-group row">
                <div class="col-sm-12 col-mb-12 col-mb-sm-0">
                    <label class="small mb-1">Correo</label>
                    <input type="text" class="form-control" name="correo" id="correo"
                           placeholder="Ingrese el correo">
                    <span class="text-danger error-text correo_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-mb-12  col-mb-sm-0">
                    <label class="small mb-1">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenia" id="contrasenia"
                           placeholder="Ingrese la contraseña">
                    <span class="text-danger error-text contrasenia_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-mb-12  col-mb-sm-0">

                    <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-dark btn-lg btn-block"
                           value="Iniciar sessión">
                </div>
            </div>



        </form>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->include('/auth/auth') ?>

<?= $this->endSection() ?>
