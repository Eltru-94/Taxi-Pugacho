<?php

namespace App\Models;

use CodeIgniter\Model;

class Funcionalidades extends Model
{
    protected $table='funcionalidades';
    protected $primarykey ='id_funcionalidad';
    protected $allowedFields=['funcionalidad','descripcion','estado'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
       
    }


    public function getFuncionalidades() {
        
        $query = $this->db->query('select * from funcionalidades where estado =?',[1]);
        $array = json_decode(json_encode($query->getResult()),true);

        $datos=[
            'title'=>"Funcionalidades",
            'funcionalidades'=>$array
        ];

        return $datos;

    }

   
  
  



}