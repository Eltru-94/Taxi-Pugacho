<?php

namespace App\Models;

use CodeIgniter\Model;

class Carreras extends Model
{

    protected $table                = 'carreras';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['direccion_origen','direccion_destino','telefono_persona','id_servicio','id_unitActiva','estado',
        'carrera','dateInicio','dateFin','descripcion'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectUnitCarrera($carrera,$horario){

        $query= $this->db->query("SELECT * FROM
          unidadesactivas
          INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
          INNER JOIN users ON (vehiculo.id_user = users.id_user)
        WHERE unidadesactivas.carrera = ? AND unidadesactivas.horario= ?",[$carrera,$horario]);
        $array = json_decode(json_encode($query->getResult()),true);

        return $array;

    }

    public function getServicios($estado){
        $query = $this->db->query('select * from servicios where estado =?',[$estado]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public function getCarrerasEnables($estado){
        $query = $this->db->query('SELECT id_carrera,  carreras.descripcion,carreras.direccion_origen, carreras.dateInicio, carreras.dateFin,carreras.carrera,  carreras.direccion_destino, servicios.servicio, carreras.telefono_persona, vehiculo.unidad, vehiculo.placa,unidadesactivas.horario,
       servicios.id_servicio,unidadesactivas.id_unitActiva
            
FROM
              unidadesactivas
              INNER JOIN carreras ON (unidadesactivas.id_unitActiva = carreras.id_unitActiva)
              INNER JOIN servicios ON (carreras.id_servicio = servicios.id_servicio)
              INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
            WHERE
            carreras.estado = ?',[$estado]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public  function  updateCarrera($id_carrera,$carrera,$estado,$dateFin){
        $query = $this->db->query('update carreras set carrera=?, estado=?, dateFin=? where id_carrera=?',[$carrera,$estado,$dateFin,$id_carrera]);
        if($query){
            return true;
        }else{
            return false;
        }

    }





}
