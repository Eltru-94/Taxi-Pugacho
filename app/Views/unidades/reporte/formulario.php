<div class="modal fade" id="modalUnidadReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Reporte Unidad</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>

            <div class="modal-body">
                <form name="forEnableUnidadReporte" id="forEnableUnidadReporte">
                    <div class="form-group row">

                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <input type="hidden" class="form-control" name="idUnitEnableCarrera" id="idUnitEnableCarrera">
                            <label class="small mb-1">Asistencia </label>
                            <select name="reporte" id="reporte" class="form-control form-control-user">
                                <option value="1" >Reportado</option>
                                <option value="2" >No Reportado</option>
                            </select>
                            <span class="text-danger error-text reporte_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <div class="form-group">
                                <label class="small mb-1" name="lblDescripcion" id="lblDescripcion" >Descripción</label>
                                <textarea class="form-control py-4" name="descripcionReporte" id="descripcionReporte"
                                          rows="5" ></textarea>
                                <span class="text-danger error-text descripcion_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="ClearFieldsEnableUnit()"
                                data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit"  class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>