<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id_user';
    protected $allowedFields = ['nombre', 'apellido', 'cedula', 'correo', 'telefono', 'clave', 'estado', 'fechanacimiento', 'genero', 'licencia', 'foto', 'direccion'];


    public function get_users($estado)
    {

        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('userrol', 'users.id_user = userrol.id_user');
        $builder->join('roles', 'userrol.id_rol = roles.id_rol');
        $builder->where('users.estado', $estado);
        $query = $builder->get();

        return $query->getResultArray();

    }

    public function delete_users($data, $id_user)
    {

        $builder = $this->db->table('users');
        $builder->where('id_user', $id_user);
        $query = $builder->update($data);
        return $query;
    }

    public function select_user_id($id_user)
    {


        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('userrol', 'users.id_user = userrol.id_user');
        $builder->join('roles', 'userrol.id_rol = roles.id_rol');
        $builder->where('users.id_user', $id_user);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function update_data($data, $id_user)
    {

        $builder = $this->db->table('users');
        $builder->where('id_user', $id_user);
        $query = $builder->update($data);
        return $query;
    }


    public function getUserFunction($id_user)
    {
        $query = $this->db->query('SELECT funcionalidades.funcionalidad,funcionalidades.id_funcionalidad FROM users INNER JOIN userrol ON (users.id_user = userrol.id_user)
        INNER JOIN roles ON (userrol.id_rol = roles.id_rol) INNER JOIN rolfuncionalidad ON (roles.id_rol = rolfuncionalidad.id_rol)
        INNER JOIN funcionalidades ON (funcionalidades.id_funcionalidad = rolfuncionalidad.id_funcionalidad) WHERE
        users.id_user = ? AND rolfuncionalidad.estado=1 AND funcionalidades.estado=1', [$id_user]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function getUserID($cedula)
    {
        $query = $this->db->query('SELECT * FROM users WHERE users.cedula=? AND users.estado=1', [$cedula]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function getUserIDVehiculos($cedula)
    {
        $query = $this->db->query('SELECT * FROM users INNER JOIN vehiculo ON (users.id_user = vehiculo.id_user) WHERE users.cedula=? AND users.estado=1', [$cedula]);
        $array = json_decode(json_encode($query->getResult()), true);
        return $array;
    }

    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this->asArray()->where(['correo' => $emailAddress])->first();
        if (!$user) {
            throw  new \Exception('User does not exist for specified email address');
        }
        return $user;
    }

    public function apiUpdateUser($id_user, $nombre, $apellido, $cedula, $correo, $clave)
    {

        if (empty($clave)) {
            $query = $this->db->query('update users set nombre=?, apellido=?, cedula=?,correo=? where id_user=?', [$nombre, $apellido, $cedula, $correo, $id_user]);
        } else {
            $query = $this->db->query('update users set nombre=?, apellido=?, cedula=?,correo=?,clave=? where id_user=?', [$nombre, $apellido, $cedula, $correo, $clave, $id_user]);
        }

        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function getReportUser()
    {
        $builder = $this->db->table('users');
        $builder->select('users.nombre,users.apellido,roles.rol,users.created_at,
        users.direccion,users.foto,users.licencia,users.genero,users.fechanacimiento,
        users.estado,users.telefono,users.cedula,users.correo');
        $builder->join('userrol', 'users.id_user = userrol.id_user');
        $builder->join('roles', 'userrol.id_rol = roles.id_rol');
        $query = $builder->get();
        return $query->getResultArray();

    }


    public function selectVehicleForIdUser($id_user)
    {
        $builder = $this->db->table('users');
        $builder->select('vehiculo.placa,vehiculo.unidad,vehiculo.pago,vehiculo.marca,vehiculo.fechafabricacion');
        $builder->join(' vehiculo', 'users.id_user = vehiculo.id_user');
        $builder->where('users.id_user', $id_user);
        $query = $builder->get();
        return $query->getResultArray();

    }


}