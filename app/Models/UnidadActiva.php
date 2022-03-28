<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadActiva extends Model
{

    protected $table = 'unidadesactivas';
    protected $primaryKey = 'id_unitActiva';
    protected $allowedFields = ['id_vehiculo', 'horario', 'id_operador', 'valor', 'estado', 'carrera', 'reporte', 'dia', 'mesname', 'mesId', 'anio', 'latitud', 'logitud'];


    public function __construct()
    {
        parent::__construct();
        //$db = \Config\Database::connect();
    }

    public function selectUnit($id_vehiculo, $estado)
    {

        $query = $this->db->query('SELECT * FROM unidadesactivas WHERE unidadesactivas.estado = ?  AND unidadesactivas.id_vehiculo=?', [$estado, $id_vehiculo]);
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;
    }

    public function selectUnitEnable($estado, $estadoVehiculo)
    {
        $query = $this->db->query("SELECT vehiculo.unidad, users.telefono,vehiculo.id_vehiculo, users.apellido, users.nombre,unidadesactivas.reporte, unidadesactivas.horario,unidadesactivas.id_unitActiva, unidadesactivas.created_at
        FROM
          unidadesactivas
          INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
          INNER JOIN users ON (vehiculo.id_user = users.id_user)
        WHERE unidadesactivas.estado = ? AND vehiculo.estado=? AND unidadesactivas.reporte<2 ", [$estado, $estadoVehiculo]);
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;
    }

    public function deletUnitEnable($estado, $carrera, $id_unitActiva)
    {

        $query = $this->db->query('update unidadesactivas set estado=?, carrera=? where unidadesactivas.id_unitActiva=?', [$estado, $carrera, $id_unitActiva]);

        if ($query) {
            return true;
        } else {
            return false;
        }

    }

    public function selectUnitEnableId($id_unitActiva)
    {

        $query = $this->db->query('SELECT * FROM unidadesactivas WHERE unidadesactivas.id_unitActiva=?', [$id_unitActiva]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;

    }


    public function updateUnitEnable($horario, $id_unitActiva)
    {

        $query = $this->db->query('update unidadesactivas set horario=? where unidadesactivas.id_unitActiva=?', [$horario, $id_unitActiva]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateReporte($data, $id_unitActiva)
    {

        $builder = $this->db->table('unidadesactivas');
        $builder->where('id_unitActiva', $id_unitActiva);
        $builder->update($data);

    }

    public function frequencyTotal()
    {
        $query = $this->db->query('SELECT SUM(unidadesactivas.valor) AS "Total" FROM unidadesactivas');
        return $query->getResult();

    }

    public function selectAllUnitEnable($horario)
    {

        $query = $this->db->query('SELECT vehiculo.unidad,vehiculo.id_vehiculo,unidadesactivas.id_unitActiva FROM vehiculo
        INNER JOIN unidadesactivas ON (vehiculo.id_vehiculo = unidadesactivas.id_vehiculo)
        WHERE
        unidadesactivas.carrera=1 AND unidadesactivas.reporte=1 AND unidadesactivas.horario=? ', [$horario]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;

    }

    public function stateCarrera($carrera, $id_unitActiva)
    {

        $query = $this->db->query('update unidadesactivas set carrera=? where unidadesactivas.id_unitActiva=?', [$carrera, $id_unitActiva]);

        if ($query) {
            return true;
        } else {
            return false;
        }

    }


    public function selectVehicleReporte()
    {
        $query = $this->db->query("SELECT vehiculo.unidad, users.telefono,vehiculo.id_vehiculo, users.apellido, users.nombre,unidadesactivas.reporte, unidadesactivas.horario,unidadesactivas.id_unitActiva, unidadesactivas.created_at
        FROM
          unidadesactivas
          INNER JOIN vehiculo ON (unidadesactivas.id_vehiculo = vehiculo.id_vehiculo)
          INNER JOIN users ON (vehiculo.id_user = users.id_user)
        WHERE unidadesactivas.estado = 1 AND vehiculo.estado=1 AND unidadesactivas.reporte=2 ");
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;
    }

    public function getReportUnitPay()
    {
        $builder = $this->db->table('unidadesactivas');
        $builder->select('users.nombre, users.apellido, users.cedula, users.correo, vehiculo.unidad,vehiculo.placa,
        unidadesactivas.mesId,unidadesactivas.valor,unidadesactivas.anio, unidadesactivas.dia');
        $builder->join('vehiculo', 'unidadesactivas.id_vehiculo = vehiculo.id_vehiculo');
        $builder->join('users', 'vehiculo.id_user = users.id_user');
        $query = $builder->get();
        return $query->getResultArray();

    }


    public function getVehicleEnableForId($id)
    {
        $builder = $this->db->table('unidadesactivas');
        $builder->select(' unidadesactivas.horario,vehiculo.unidad,vehiculo.placa,unidadesactivas.estado,unidadesactivas.mesId,unidadesactivas.anio,unidadesactivas.dia');
        $builder->join('vehiculo', 'unidadesactivas.id_vehiculo = vehiculo.id_vehiculo');
        $builder->join('users', 'vehiculo.id_user = users.id_user');
        $builder->where(' unidadesactivas.estado', 1);
        $builder->where('users.id_user', $id);
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function getVehicleDisableForId($id)
    {
        $builder = $this->db->table('users');
        $builder->select(' vehiculo.marca,vehiculo.placa, vehiculo.modelo, vehiculo.unidad, vehiculo.pago');
        $builder->join('vehiculo', 'users.id_user = vehiculo.id_user');
        $builder->where('vehiculo.pago', 0);
        $builder->where('users.id_user', $id);
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function sumMonth($anio)
    {
        $builder = $this->db->table('unidadesactivas');
        $builder->select(' SUM(unidadesactivas.valor) AS TOTAL, MONTH(unidadesactivas.created_at) AS mes');
        $builder->where(' YEAR(unidadesactivas.created_at) ', $anio);
        $builder->groupBy('MONTH(unidadesactivas.created_at)');
        $query = $builder->get();
        return $query->getResultArray();

    }


    public function updateLocation($data, $id_unitActiva)
    {

        $builder = $this->db->table('unidadesactivas');
        $builder->where('id_unitActiva', $id_unitActiva);
        $builder->update($data);

    }


    public function deleteFrequency()
    {
        $builder = $this->db->table('unidadesactivas');
        $builder->select('id_unitActiva,id_vehiculo');
        $builder->where('estado',1);
        $query = $builder->get();
        return $query->getResultArray();

    }



}
