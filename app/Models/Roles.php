<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    protected $table='roles';
    protected $primarykey ='id_rol';
    protected $allowedFields=['rol','descripcion','estado'];

    public function listaRoles()
    {
        $datos=$this->db->table($table);
        $datos->where('estado', 1);
        return $datos->get()->getResultArray();
    }
}