<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadActiva extends Model
{

    protected $table                = 'unidadesactivas';
    protected $primaryKey           = 'id_unitActiva';
    protected $allowedFields        = ['id_vehiculo','horario','estado','carrera'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectUnit($id_vehiculo,$estado){

        $query = $this->db->query('SELECT * FROM unidadesactivas WHERE unidadesactivas.estado = ?  AND unidadesactivas.id_vehiculo=?',[$estado,$id_vehiculo]);
        $array = json_decode(json_encode($query->getResult()),true);

        return $array;
    }

    public function selectUnitEnable($estado,$estadoVehiculo){
        $query= $this->db->query("SELECT vehiculo.unidad, users.telefono, users.apellido, users.nombre, unidadesactivas.horario,unidadesactivas.id_unitActiva, unidadesactivas.created_at
        FROM
          unidadesactivas
          INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
          INNER JOIN users ON (vehiculo.id_user = users.id_user)
        WHERE unidadesactivas.estado = ? AND vehiculo.estado=? ",[$estado,$estadoVehiculo]);
        $array = json_decode(json_encode($query->getResult()),true);

        return $array;
    }

    public function deletUnitEnable($estado,$carrera,$id_unitActiva){

        $query = $this->db->query('update unidadesactivas set estado=?, carrera=? where unidadesactivas.id_unitActiva=?',[$estado,$carrera,$id_unitActiva]);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function selectUnitEnableId($id_unitActiva){

        $query=$this->db->query('SELECT * FROM unidadesactivas WHERE unidadesactivas.id_unitActiva=?',[$id_unitActiva]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;

    }


    public function updateUnitEnable($horario,$id_unitActiva){

        $query = $this->db->query('update unidadesactivas set horario=? where unidadesactivas.id_unitActiva=?',[$horario,$id_unitActiva]);

        if($query){
            return true;
        }else{
            return false;
        }
    }





}
