<!-- Modal -->
<div class="modal fade" id="modalVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Registrar Datos del Vehiculo</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="activacion('true')"></button>
            </div>
            
            <div class="modal-body">
                <form name="forCedula" id="forCedula">

                    <div class="form-group row">
                        <div class="col-sm-2 mb-2 mb-sm-0"></div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label class="small mb-1">Buscar usuario por cedula : </label>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" class="form-control" id="cedula" name="cedula"
                                placeholder="Ingrese la cedula : ">
                            <span class="text-danger error-text cedula_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <a type="button" class="btn btn-primary mb-2" onclick="buscarCedula()">Buscar
                                Usuario</a>
                        </div>
                    </div>

                </form>
                <div name="user" id="user"></div>
                <form name="forVehiculo" id="forVehiculo" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_user" id="id_user">
                    <input type="hidden" class="form-control" name="id_vehiculo" id="id_vehiculo">
                   
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Imagen Frontal : </label>
                            <input type="file" class="form-control" name="imagen1" id="imagen1" disabled>
                            <span class="text-danger error-text imagen1_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Imagen lateral izquierda : </label>
                            <input type="file" class="form-control" name="imagen2" id="imagen2" disabled>
                            <span class="text-danger error-text imagen2_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Imagen lateral derecha : </label>
                            <input type="file" class="form-control" name="imagen3" id="imagen3" disabled>
                            <span class="text-danger error-text imagen3_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa"
                                placeholder="Ingrese la placa : " disabled>
                            <span class="text-danger error-text placa_error"></span>
                        </div>


                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca"
                                placeholder="Ingrese la marca: " disabled>
                            <span class="text-danger error-text marca_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" disabled>
                            <span class="text-danger error-text modelo_error"></span>
                        </div>


                        
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">N.- Unidad</label>
                            <input type="number" class="form-control" id="unidad" name="unidad"
                                   placeholder="Ing el numero de la unidad: " disabled>
                            <span class="text-danger error-text unidad_error"></span>
                        </div>


                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Color</label>
                            <select name="color" id="color" class="form-control" disabled>

                            </select>
                            <span class="text-danger error-text color_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <div>
                                <label class="small mb-1">Año de Fabricacion</label>
                                <select name="fechafabricacion" id="fechafabricacion" class="form-control" disabled>

                                </select>
                                <span class="text-danger error-text fechafabricacion_error"></span>
                            </div>

                        </div>



                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="activacion('true')"
                            data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" id="btnVehiculo" name="btnVehiculo" class="btn btn-outline-primary"
                            value="Guardar" disabled>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>