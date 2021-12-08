<?php

namespace App\Models;

use CodeIgniter\Model;


class RolfuncionalidadModel extends Model
{
   
    protected $table                = 'rolfuncionalidad';
    protected $primarykey           = 'id_rolfuncional';
    protected $allowedFields        = ['id_rol','id_funcionalidad','estado'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
       
    }

    public function getRolFuncionalidades($id_rol,$id_funcionalidad){

        $query = $this->db->query('select * from  rolfuncionalidad WHERE  rolfuncionalidad.id_rol =? AND rolfuncionalidad.id_funcionalidad=?',[$id_rol,$id_funcionalidad]);
        $array = json_decode(json_encode($query->getResult()),true);

        

        return $array;
    }

    public function getFuncionalidadesRol($id_rol){

        $query = $this->db->query('select * from  rolfuncionalidad WHERE  rolfuncionalidad.id_rol =?',[$id_rol]);
        $array = json_decode(json_encode($query->getResult()),true);

        

        return $array;
    }

    public function __update($id_rolfuncional,$id_funcionalidad,$estado){
        
        $query = $this->db->query('update rolfuncionalidad set id_funcionalidad=?,estado=? where id_rolfuncional=?',[$id_funcionalidad,$estado,$id_rolfuncional]);
        if($query){
            return true;
        }else{
            return false;
        }
    }


}