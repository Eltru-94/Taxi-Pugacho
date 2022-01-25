<!-- Modal -->
<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="tituloModal">Asignar unidad a la Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearForm()"></button>
            </div>

            <div class="modal-body">
                <form name="forCarreras" id="forCarreras">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Dirección Origen:  </label>

                            <input type="text" class="form-control" id="direccion_origen" name="direccion_origen"
                                   placeholder="Ingrese el origen : ">
                            <span class="text-danger error-text direccion_origen_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Dirección Destino : </label>
                            <input type="hidden" id="id_carrera" name="id_carrera">
                            <input type="text" class="form-control" id="direccion_destino" name="direccion_destino"
                                   placeholder="Ingrese el destino : ">
                            <span class="text-danger error-text direccion_destino_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Numero Unidad:  </label>
                            <select name="id_unitActiva" id="id_unitActiva" class="form-control">

                            </select>
                            <span class="text-danger error-text id_unitActiva_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Tipo Carrera : </label>
                            <select name="id_servicio" id="id_servicio" class="form-control">

                            </select>
                            <span class="text-danger error-text id_servicio_error"></span>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="clearForm()"
                                data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!-- Modal Create Carrera -->
<div class="modal fade" id="modalCarrerasAsignar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="tituloModal">Asignar Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearForm()"></button>
            </div>

            <div class="modal-body">
                <form name="forCarrerasAsignar" id="forCarrerasAsignar">
                    <div class="form-group row">

                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Dirección Origen:  </label>

                            <input type="text" class="form-control" id="direccion_origen" name="direccion_origen"
                                   placeholder="Ingrese el origen : ">
                            <span class="text-danger error-text direccion_origen_error"></span>
                        </div>


                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Telefono Offcina</label>
                            <select name="id_telefono" id="id_telefono" class="form-control">

                            </select>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Telefono Cliente :  </label>
                            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente"
                                   placeholder="Ingrese el telefono : ">
                            <span class="text-danger error-text telefono_cliente_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="clearForm()"
                                data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


