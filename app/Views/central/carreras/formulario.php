<!-- Modal -->
<div class="modal fade" id="modalCarreraState" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title text-center" id="tituloModal">Carrera</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>

            <div class="modal-body ">
                <form name="forEstadoCarrera" id="forEstadoCarrera">

                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="idcarrera" name="idcarrera">
                        <input type="hidden" class="form-control" id="idUnidadActiva" name="idUnidadActiva">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button type="button" onclick="estadoCarrera(1)" class="btn btn-outline-warning">Cancelada</button>
                            <button type="button" onclick="estadoCarrera(2)" class="btn btn-outline-success">Realizada</button>
                            <button type="button" onclick="estadoCarrera(3)" class="btn btn-outline-danger">Perdida</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
