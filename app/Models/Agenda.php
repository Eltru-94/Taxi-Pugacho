<?php

namespace App\Models;

use CodeIgniter\Model;

class Agenda extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'agenda';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nombre','telefono','direccion','id_user','estado'];


    public function getAllAgendaUser($id_user){
        $query=$this->db->query('SELECT *FROM  agenda WHERE agenda.id_user=? AND agenda.estado=1',[$id_user]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }


}
