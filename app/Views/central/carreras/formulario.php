<!-- Modal -->
<div class="modal fade" id="modalCarreraState" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title text-center" id="tituloModal">Calificación Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>

            <div class="modal-body ">
                <form name="forEstadoCarrera" id="forEstadoCarrera">

                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_carrera" name="id_carrera">
                        <input type="hidden" class="form-control" id="id_unitActiva" name="id_unitActiva">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button type="button" onclick="estadoCarrera(1)" class="btn btn-warning">Cancelada</button>
                            <button type="button" onclick="estadoCarrera(2)" class="btn btn-success">Realizada</button>
                            <button type="button" onclick="estadoCarrera(3)" class="btn btn-danger">Perdida</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalCarreras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="tituloModal">Editar Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearLableError()"></button>
            </div>

            <div class="modal-body">
                <form name="forCarreras" id="forCarreras">
                    <div class="form-group row">

                        <div class="col-sm-12 mb-112 mb-sm-0">
                            <label class="small mb-1">Dirección Origen:  </label>
                            <input type="hidden" class="form-control" id="id_carreraUpdate" name="id_carreraUpdate">
                            <input type="text" class="form-control" id="direccion_origen" name="direccion_origen"
                                   placeholder="Ingrese el origen : ">
                            <span class="text-danger error-text direccion_origen_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Dirección Destino : </label>
                            <input type="text" class="form-control" id="direccion_destino" name="direccion_destino"
                                   placeholder="Ingrese el destino : ">
                            <span class="text-danger error-text direccion_destino_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Telefono persona:  </label>
                            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente"
                                   placeholder="Ingrese el telefono : ">
                            <span class="text-danger error-text telefono_cliente_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Tipo Carrera : </label>
                            <select name="id_servicio" id="id_servicio" class="form-control">

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
                        <button type="button" class="btn btn-outline-secondary" onclick="clearLableError()"
                                data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

