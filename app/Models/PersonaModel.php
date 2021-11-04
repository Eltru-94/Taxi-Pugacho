<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    protected $table='tblpersona';
    protected $primarykey ='id_per';
    protected $allowedFields=['nombre','apellido','cedula','correo','telefono','clave'];
}