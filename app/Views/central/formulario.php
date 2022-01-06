<!-- Modal -->
<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="tituloModal">Asignar Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="CloseCarrera()"></button>
            </div>

            <div class="modal-body">
                <form name="forCarreras" id="forCarreras">
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Dirección Origen:  </label>
                            <input type="hidden" class="form-control" id="id_unitActiva" name="id_unitActiva">
                            <input type="text" class="form-control" id="origen" name="origen"
                                   placeholder="Ingrese el origen : ">
                            <span class="text-danger error-text origen_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Dirección Destino : </label>
                            <input type="text" class="form-control" id="destino" name="destino"
                                   placeholder="Ingrese el destino : ">
                            <span class="text-danger error-text destino_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Telefono persona:  </label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                   placeholder="Ingrese el telefono : ">
                            <span class="text-danger error-text telefono_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Tipo Carrera : </label>
                            <select name="carrera" id="carrera" class="form-control">

                            </select>
                            <span class="text-danger error-text carrera_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-12 mb-6 mb-sm-0">
                            <label class="small mb-1">descripcion</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="4" cols="50"> </textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="CloseCarrera()"
                                data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

