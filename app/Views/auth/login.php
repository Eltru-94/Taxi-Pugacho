<?= $this->extend('plantilla/loginLayout') ?>

<?= $this->section('contenido') ?>
<br>
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

                            <form name="formLogin" id="formLogin">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-12 mb-sm-0">
                                        <label class="small mb-1">Correo</label>
                                        <input type="text" class="form-control" name="correo" id="correo">
                                        <span class="text-danger error-text correo_error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-12 mb-sm-0">
                                        <label class="small mb-1">Contraseña</label>
                                        <input type="password" class="form-control" name="contrasenia" id="contrasenia">
                                        <span class="text-danger error-text contrasenia_error"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">


                                    <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-dark"
                                           value="Iniciar sessión">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->include('/auth/auth') ?>

<?= $this->endSection() ?>
