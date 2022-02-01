

<!--Formulario profile edit user -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">

        <form name="forUserEdit" id="forUserEdit" enctype="multipart/form-data">



            <div class="form-group row">

                <div class="col-sm-4 mb-4 mb-sm-0">
                    <label class="small mb-1">Nombre : </label>
                    <input type="hidden" class="form-control" id="id_user" value="<?php echo session('loggedUser'); ?>" name="id_user"
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

                    <label class="small mb-1">Cédula : </label>
                    <input type="text" class="form-control" id="cedula" name="cedula"
                           placeholder="Ingrese la cédula : ">
                    <span class="text-danger error-text cedula_error"></span>


                </div>
            </div>
            <div class="form-group row">

                <div class="col-sm-4 mb-4 mb-sm-0">
                    <label class="small mb-1">Teléfono : </label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                           placeholder="Ingrese el teléfono : ">
                    <span class="text-danger error-text telefono_error"></span>
                </div>


                <div class="col-sm-4 mb-4 mb-sm-0">
                    <label class="small mb-1">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento"  value="2000-01-01" name="fechanacimiento">
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

                <div class="col-sm-6 mb-6 mb-sm-0">

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
                    <span class="text-danger error-text licencia_error"></span>
                </div>
                <div class="col-sm-6 mb-6 mb-sm-0">
                    <label class="small mb-1">Selecione el rol</label>
                    <select name="roles" id="roles" class="form-control">

                    </select>
                    <span class="text-danger error-text roles_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-12 mb-sm-0">
                    <label class="small mb-1">Subir foto : </label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                    <span class="text-danger error-text imagen_error"></span>

                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-6 mb-sm-0">
                    <div>
                        <label class="small mb-1">Dirección : </label>
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
                <input type="submit" id="btnUser" name="btnUser" class="btn btn-outline-primary" value="Guardar">
            </div>
        </form>
    </div>
</div>

