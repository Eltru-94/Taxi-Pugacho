<!-- Modal pay frequency -->
<div class="modal fade" id="modalPayFrequency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header  text-center">
                <h5 class="text-center" id="tituloModal">Pago de <?php echo $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>

            <div class="modal-body">
                <form name="forVehicleState" id="forVehicleState">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Usuario : </label>
                            <input type="hidden"  class="form-control" id="id_vehiculo" name="id_vehiculo">
                            <input type="text" disabled class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Telefono : </label>
                            <input type="text" disabled class="form-control" id="telefono" name="telefono">

                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Cedula : </label>
                            <input type="text" disabled class="form-control" id="txtcedula" name="txtcedula">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Valor : </label>
                            <input type="text" disabled class="form-control" id="valor" name="valor"
                                   placeholder="$ &nbsp;30">
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Placa : </label>
                            <input type="text" disabled class="form-control" id="placa" name="placa">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Unidad : </label>
                            <input type="text" disabled class="form-control" id="unidad" name="unidad">
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Tipo Carrera : </label>
                            <select name="id_servicio" id="id_servicio" class="form-control">

                            </select>

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick=""
                                data-bs-dismiss="modal">Cerrar
                        </button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Pagar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



