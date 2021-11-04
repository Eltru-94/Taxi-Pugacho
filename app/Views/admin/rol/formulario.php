<button class="btn btn-primary" data-toggle="modal" data-target="#ModalRol">
    Registrar Rol
</button>
<div class="modal" id="ModalRol" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="tituloVentana">Registrar Rol</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forPersona">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Rol</label>
                                <input class="form-control py-4" id="rol" name="rol" type="text" />
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Descripción</label>
                                <textarea class="form-control py-4" name="descripcion" id="descripcion"  rows="5"></textarea>
                            </div>
                        </div>

                    </div>


                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Cerrar
                </button>
                <button class="btn btn-primary" id="btnCrearRol" name="btnCrearRol" type="button">
                    Aceptar
                </button>

            </div>
        </div>
    </div>

</div>