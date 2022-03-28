<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="crearAsistencia" title="Inicio de turno" type="button" class="btn btn-primary" hidde data-bs-toggle="modal" data-bs-target="#modalAsistencia"><i class="fas fa-calendar-check"></i> &nbsp; Iniciar Turno</button>
                    <button id="finalizarAsistencia" name="finalizarAsistencia" title="Finalizacion de turno" type="button"  onclick="finalizacionTurno()" class="btn btn-success" hidden ><i class="fas fa-file"></i> &nbsp;Finalizar Turno</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Asistencia -->
<div class="modal fade" id="modalAsistencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="tituloModal">Registro de Asistencia
                    del <?php echo $title . "<span><br>" . session('nombre') . "</span>"; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form name="formAsistencia" id="formAsistencia">
                    <div class="form-group row">


                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <input type="hidden" value="<?php echo session('loggedUser'); ?>" class="form-control"
                                   id="id_user" name="id_user">
                            <label class="small mb-1">Seleccione el Horario </label>
                            <select name="horario" id="horario" class="form-control form-control-user">
                            </select>
                            <span class="text-danger error-text horario_error"></span>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cerrar
                        </button>
                        <input type="submit" class="btn btn-outline-primary"
                               value="Guardar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
