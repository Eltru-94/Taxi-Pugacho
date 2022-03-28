<?php

namespace App\Models;

use CodeIgniter\Model;

class Carreras extends Model
{

    protected $table = 'carreras';
    protected $primaryKey = 'id';
    protected $allowedFields = ['direccion_origen', 'qualify', 'id_telefono', 'direccion_destino', 'telefono_cliente', 'id_servicio', 'id_unitActiva', 'estado',
        'carrera', 'dateInicio', 'dateFin', 'descripcion'];

    public function __construct()
    {
        parent::__construct();

    }


    public function selectUnitCarrera($carrera, $horario, $estado)
    {

        $query = $this->db->query("SELECT * FROM
          unidadesactivas
          INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
          INNER JOIN users ON (vehiculo.id_user = users.id_user)
        WHERE unidadesactivas.carrera = ? AND unidadesactivas.horario= ? AND vehiculo.estado=?", [$carrera, $horario, $estado]);
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;

    }

    public function getServicios($estado)
    {
        $query = $this->db->query('select * from servicios where estado =?', [$estado]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function getCarrerasActivadas()
    {
        $query = $this->db->query('SELECT  
          carreras.direccion_origen,
          carreras.telefono_cliente,
          carreras.id_carrera,
          carreras.carrera,
          carreras.descripcion,
          vehiculo.unidad,
          unidadesactivas.id_unitActiva,
          carreras.dateInicio,
            unidadesactivas.horario,
        carreras.direccion_destino,
        servicios.servicio,
  servicios.id_servicio
        FROM
              unidadesactivas
              INNER JOIN carreras ON (unidadesactivas.id_unitActiva = carreras.id_unitActiva)
              INNER JOIN servicios ON (carreras.id_servicio = servicios.id_servicio)
              INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
            WHERE
            carreras.carrera = 2 ');
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function updateCarrera($id_carrera, $carrera, $estado, $dateFin)
    {
        $query = $this->db->query('update carreras set carrera=?, estado=?, dateFin=? where id_carrera=?', [$carrera, $estado, $dateFin, $id_carrera]);
        if ($query) {
            return true;
        } else {
            return false;
        }

    }


    public function selectIdCarrera($id_carrera)
    {
        $query = $this->db->query('select * from carreras where id_carrera =?', [$id_carrera]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }


    public function allCarrerasOrigen()
    {
        $query = $this->db->query('SELECT telefonos.telefono, carreras.carrera,carreras.id_carrera,telefonos.nombre,telefonos.id_telefono,carreras.direccion_origen,carreras.telefono_cliente FROM
        carreras
          INNER JOIN telefonos ON (carreras.id_telefono = telefonos.id_telefono)
          WHERE
          carreras.carrera=1 AND carreras.estado=1');
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function delet($id_carrera)
    {

        $query = $this->db->query('update carreras set estado=0 where carreras.id_carrera=?', [$id_carrera]);

        if ($query) {
            return true;
        } else {
            return false;
        }

    }

    public function updateDestino($data, $id_carrera)
    {

        $builder = $this->db->table('carreras');
        $builder->where('id_carrera', $id_carrera);
        $builder->update($data);

    }

    public function getRaceMade()
    {
        $query = $this->db->query('SELECT 
                  telefonos.telefono,
                  carreras.direccion_origen,
                  carreras.telefono_cliente,
                  telefonos.nombre,
                  carreras.id_carrera,
                  carreras.carrera,
                  carreras.descripcion,
                  carreras.dateInicio,
                  carreras.direccion_destino,
                  servicios.servicio,
                  servicios.id_servicio,
                  carreras.qualify,
                  carreras.dateFin,
                  unidadesactivas.horario,
                  vehiculo.unidad
                FROM
                  carreras
                  INNER JOIN telefonos ON (carreras.id_telefono = telefonos.id_telefono)
                  INNER JOIN servicios ON (carreras.id_servicio = servicios.id_servicio)
                  INNER JOIN unidadesactivas ON (carreras.id_unitActiva = unidadesactivas.id_unitActiva)
                  INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
                WHERE
                  carreras.carrera = 3');
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function total_race_day($dia,$mes,$qualify)
    {
        $builder = $this->db->table('carreras');
        $builder->select('COUNT(carreras.qualify) AS TOTAL');
        $builder->where('carreras.qualify', $qualify);
        $builder->where('DAY(carreras.created_at) ', $dia);
        $builder->where('MONTH(carreras.created_at) ', $mes);
        $query = $builder->get();
        return $query->getResultArray();
    }


}
