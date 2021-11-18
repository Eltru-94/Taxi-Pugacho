<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    protected $table='roles';
    protected $primarykey ='id_rol';
    protected $allowedFields=['rol','descripcion','estado'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
       
    }


    public function getRoles() {
        
        $query = $this->db->query('select * from roles where estado =?',[1]);
        $array = json_decode(json_encode($query->getResult()),true);

        $datos=[
            'title'=>"Roles",
            'roles'=>$array
        ];

        return $datos;

    }

    public function getIdRol($id_rol) {
        
        $query = $this->db->query('select * from roles where id_rol =?',[$id_rol]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;

    }

    public function updateRol($id_rol,$rol,$descripcion){
        
        $query = $this->db->query('update roles set rol=?, descripcion=? where id_rol=?',[$rol,$descripcion,$id_rol]);
        
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function deleteRol($estado,$id_rol){
        
        $query = $this->db->query('update roles set estado=? where id_rol=?',[$estado,$id_rol]);
        
        if($query){
            return true;
        }else{
            return false;
        }
    }



}