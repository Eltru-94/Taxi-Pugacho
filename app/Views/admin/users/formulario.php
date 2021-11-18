
<!-- Button trigger modal -->

<button type="button" class="btn btn-outline-primary my-2 my-sm-0" onclick="tituloUser()" data-bs-toggle="modal"
    data-bs-target="#modalUser">
    Registrar Usuario
</button>

<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">User</h5>
                <button type="button" onclick="limpiarForm()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="forUser" id="forUser" enctype="multipart/form-data">



                    <div class="form-group row">

                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Nombre : </label>
                            <input type="text" class="form-control" id="id_user" hidden name="id_user"
                                placeholder="Nombre : ">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre : ">
                            <span class="text-danger error-text nombre_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Apellido : </label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellido : ">
                            <span class="text-danger error-text apellido_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">

                            <label class="small mb-1">Cedula : </label>
                            <input type="text" class="form-control" id="cedula" name="cedula"
                                placeholder="Ingrese la cedula : ">
                            <span class="text-danger error-text cedula_error"></span>


                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Telefono : </label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Ingrese el telefono : ">
                            <span class="text-danger error-text telefono_error"></span>
                        </div>


                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento">
                            <span class="text-danger error-text fechanacimiento_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <div>
                                <label class="small mb-1">Genero</label>
                                <select name="genero" id="genero" class="form-control">
                                    <option value="">--Selecione el genero--</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                                <span class="text-danger error-text genero_error"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4 mb-4 mb-sm-0">

                            <label class="small mb-1">Licencia</label>
                            <select name="licencia" id="licencia" class="form-control">
                                <option value="">--Seleccione el tipo de licencia--</option>
                                <option value="Tipo C">Tipo C</option>
                                <option value="Tipo D">Tipo D</option>
                                <option value="Tipo E">Tipo E</option>
                                <option value="Tipo G">Tipo G</option>
                                <option value="Tipo C1">Tipo C1</option>
                                <option value="Tipo D1">Tipo D1</option>
                                <option value="Tipo E1">Tipo E1</option>
                            </select>
                            <span class="text-danger error-text tipolicencia_error"></span>
                        </div>
                        <div class="col-sm-8 mb-8 mb-sm-0">

                            <label class="small mb-1">Subir foto : </label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <span id="mensajeFoto" name="mensajeFoto" class="text-danger error-text foto_error"></span>
                            <div id="grupo_foto" class="text-danger error-text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <div>
                                <label class="small mb-1">Direccion : </label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Ingrese la dirección : ">
                                <span class="text-danger error-text direccion_error"></span>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <div>
                                <label class="small mb-1">Correo : </label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="Ingrese el correo : ">
                                <span class="text-danger error-text correo_error"></span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <div>
                                <label class="small mb-1">Password : </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Ingrese Password : ">
                                <span class="text-danger error-text password_error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <div>
                                <label class="small mb-1">Confirm Password : </label>
                                <input type="password" class="form-control " id="cpassword" name="cpassword"
                                    placeholder="Ingrese Confirm password : ">
                                <span class="text-danger error-text cpassword_error"></span>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="limpiarForm()"
                            data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" id="btnUser" name="btnUser" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>