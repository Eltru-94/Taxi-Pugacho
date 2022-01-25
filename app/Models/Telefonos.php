<?php

namespace App\Models;

use CodeIgniter\Model;

class Telefonos extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'telefonos';
    protected $primaryKey           = 'id_telefono';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nombre','telefono','estado'];

    public function getTelefonos() {

        $query = $this->db->query('select * from telefonos where estado =?',[1]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;

    }


}
