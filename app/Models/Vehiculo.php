<?php

namespace App\Models;

use CodeIgniter\Model;

class Vehiculo extends Model
{

    protected $table = 'vehiculo';
    protected $primaryKey = 'id_vehiculo';
    protected $allowedFields = ['placa', 'fechafabricacion', 'pago', 'marca', 'modelo', 'imagen1', 'imagen2', 'imagen3', 'id_user', 'estado', 'unidad', 'color'];


    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function getVehiculo($estado, $estadoVehiculo)
    {
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE users.estado =? AND vehiculo.estado=?', [$estado, $estadoVehiculo]);
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;
    }

    public function getVehiculoUSer($estado, $id_vehiculo)
    {
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE vehiculo.estado =? AND vehiculo.id_vehiculo=?', [$estado, $id_vehiculo]);
        $array = json_decode(json_encode($query->getResult()), true);

        return $array;
    }

    public function getUnidad($unidad, $estado)
    {
        $query = $this->db->query('SELECT * FROM vehiculo WHERE vehiculo.unidad=? AND vehiculo.estado=?', [$unidad, $estado]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function deletVehiculo($estado, $id_vehiculo)
    {

        $query = $this->db->query('update vehiculo set estado=? where id_vehiculo=?', [$estado, $id_vehiculo]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateVehiculo($id_vehiculo, $placa, $marca, $modelo, $fechafabricacion, $unidad, $color,$imagen1,$imagen2,$imagen3)
    {

        $query = $this->db->query('update vehiculo set placa=?, marca=?, modelo=?,fechafabricacion=?,unidad=?,color=?, imagen1=?,imagen2=?,imagen3=? where id_vehiculo=?', [$placa, $marca, $modelo, $fechafabricacion, $unidad, $color,$imagen1,$imagen2,$imagen3, $id_vehiculo]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getVehicleUserFroIdentification($identification)
    {

        $builder = $this->db->table('vehiculo');
        $builder->select('*');
        $builder->join('users', 'users.id_user=vehiculo.id_user');
        $builder->where('users.cedula', $identification);
        $builder->where('users.estado',1);
        $builder->where('vehiculo.estado', 1);
        $query = $builder->get();
        return $query;
    }

    public function getVehicleUserFroId($id_vehiculo)
    {

        $builder = $this->db->table('vehiculo');
        $builder->select('*');
        $builder->join('users', 'users.id_user=vehiculo.id_user');
        $builder->where('vehiculo.id_vehiculo', $id_vehiculo);
        $builder->where('vehiculo.estado', 1);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getVehicleEnable($id_vehiculo)
    {

        $builder = $this->db->table('vehiculo');
        $builder->select('*');
        $builder->join('unidadesactivas', 'unidadesactivas.id_vehiculo=vehiculo.id_vehiculo');
        $builder->join('users', 'users.id_user=vehiculo.id_user');
        $builder->where('vehiculo.id_vehiculo', $id_vehiculo);
        $builder->where('unidadesactivas.estado', 1);
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function statePayVehicleOnOff($estado, $id_vehiculo)
    {

        $query = $this->db->query('update vehiculo set pago=? where id_vehiculo=?', [$estado, $id_vehiculo]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function selectLocation()
    {
        $builder = $this->db->table('vehiculo');
        $builder->select('vehiculo.unidad,unidadesactivas.logitud,unidadesactivas.latitud,users.apellido,users.nombre');
        $builder->join('unidadesactivas', 'vehiculo.id_vehiculo = unidadesactivas.id_vehiculo');
        $builder->join('users', 'vehiculo.id_user = users.id_user');
        $builder->where('unidadesactivas.estado', 1);
        $builder->where('unidadesactivas.reporte', 1);
        $query = $builder->get();
        return $query->getResultArray();

    }
    public function selectLocationForId($id_user)
    {
        $builder = $this->db->table('vehiculo');
        $builder->select('unidadesactivas.id_unitActiva');
        $builder->join('unidadesactivas', 'vehiculo.id_vehiculo = unidadesactivas.id_vehiculo');
        $builder->join('users', 'vehiculo.id_user = users.id_user');
        $builder->where('unidadesactivas.estado', 1);
        $builder->where('users.id_user', $id_user);
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function total_vehicle_users($id_user)
    {
        $builder = $this->db->table('vehiculo');
        $builder->select(' SUM(vehiculo.pago) AS TOTAL');
        $builder->where('vehiculo.pago', 1);
        $builder->where('vehiculo.id_user', $id_user);
        $query = $builder->get();
        return $query->getResultArray();

    }


}
