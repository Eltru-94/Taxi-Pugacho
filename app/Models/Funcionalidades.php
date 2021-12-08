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

        
        return $array;

    }

    public function getRolFuncionalidad() {
        
        $query = $this->db->query('select * from funcionalidades where estado =?',[1]);
        $array = json_decode(json_encode($query->getResult()),true);

        $datos=[
            'title'=>"Funcionalidades",
            'funcionalidades'=>$array
        ];

        return $datos;

    }


    public function getFunctionRol($id_rol){
        $query = $this->db->query('SELECT * FROM rolfuncionalidad INNER JOIN roles ON (rolfuncionalidad.id_rol = roles.id_rol)
          INNER JOIN funcionalidades ON (rolfuncionalidad.id_funcionalidad = funcionalidades.id_funcionalidad)      
          WHERE rolfuncionalidad.id_rol=? AND rolfuncionalidad.estado=1',[$id_rol]); 
        $array = json_decode(json_encode($query->getResult()),true);



        return $array;
    }


   
  
  



}