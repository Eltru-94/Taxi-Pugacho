<?php

namespace App\Models;

use CodeIgniter\Model;

class Vehiculo extends Model
{

    protected $table                = 'vehiculo';
    protected $primaryKey           = 'id_vehiculo';
    protected $allowedFields        = ['placa','fechafabricacion','marca','modelo','imagen1','imagen2','imagen3','id_user','estado','unidad','color'];



    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();  
    }

    public function getVehiculo($estado,$estadoVehiculo){
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE users.estado =? AND vehiculo.estado=?',[$estado,$estadoVehiculo]);
        $array = json_decode(json_encode($query->getResult()),true);
        
        return $array;
    }

    public function getVehiculoUSer($estado,$id_vehiculo){
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE vehiculo.estado =? AND vehiculo.id_vehiculo=?',[$estado,$id_vehiculo]);
        $array = json_decode(json_encode($query->getResult()),true);
        
        return $array;
    }

    public  function getUnidad($unidad,$estado){
        $query=$this->db->query('SELECT * FROM vehiculo WHERE vehiculo.unidad=? AND vehiculo.estado=?',[$unidad,$estado]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public function deletVehiculo($estado,$id_vehiculo){

        $query = $this->db->query('update vehiculo set estado=? where id_vehiculo=?',[$estado,$id_vehiculo]);

        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function updateVehiculo($id_vehiculo,$placa,$marca,$modelo,$fechafabricacion,$unidad,$color){


        $query = $this->db->query('update vehiculo set placa=?, marca=?, modelo=?,fechafabricacion=?,unidad=?,color=? where id_vehiculo=?',[$placa,$marca,$modelo,$fechafabricacion,$unidad,$color,$id_vehiculo]);



        if($query){
            return true;
        }else{
            return false;
        }
    }
    
}
