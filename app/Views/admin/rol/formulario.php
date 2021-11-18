<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="tituloRol()" data-bs-toggle="modal" data-bs-target="#modalRol">
    <i class="far fa-save"></i>
    Registrar Rol
</button>

<!-- Modal -->
<div class="modal fade" id="modalRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Modal title</h5>
                <button type="button" onclick="limpiarForm()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="forRol" id="forRol">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Rol</label>
                                <input class="form-control py-4" id="id_rol" name="id_rol" type="hidden" />
                                <input class="form-control py-4" id="rol" name="rol" type="text" />
                                <span class="text-danger error-text rol_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Descripción</label>
                                <textarea class="form-control py-4" name="descripcion" id="descripcion"
                                    rows="5"></textarea>
                                <span class="text-danger error-text descripcion_error"></span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="limpiarForm()"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnRol" name="btnRol" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>