<button class="btn btn-primary" data-toggle="modal" data-target="#ModalPersona">
    Registrar Persona
</button>
<div class="modal" id="ModalPersona" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="tituloVentana">Registrar Persona</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forPersona">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Nombre</label>
                                <input class="form-control py-4" id="nombre" name="nombre" type="text"
                                    placeholder="Ingrese el nombre" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Apellido</label>
                                <input class="form-control py-4" id="apellido" name="apellido" type="text"
                                    placeholder="Ingrese el apellido" />
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">cedula</label>
                                <input class="form-control py-4" id="cedula" name="cedula" type="text"
                                    placeholder="Ingrese la cedula" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">telefono</label>
                                <input class="form-control py-4" id="telefono" name="telefono"  type="text"
                                    placeholder="Ingrese telefono" />
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">cedula</label>
                                <input class="form-control py-4" id="cedula" name="cedula" type="text"
                                    placeholder="Ingrese el correo" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Password</label>
                                <input class="form-control py-4" id="password" type="text"
                                    placeholder="Ingrese la cedula" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Confirm Password</label>
                                <input class="form-control py-4" id="cpassword" type="text"
                                    placeholder="Ingrese telefono" />
                            </div>
                        </div>

                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Cerrar
                </button>
                <button class="btn btn-primary btnCrearUser" id="btbCreaPersona" name="btbCreaPersona" type="button">
                    Aceptar
                </button>

            </div>
        </div>
    </div>

</div>