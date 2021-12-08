<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table='users';
    protected $primarykey ='id_user';
    protected $allowedFields=['nombre','apellido','cedula','correo','telefono','clave','estado','fechanacimiento','genero','licencia','foto','direccion'];
    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();  
    }

    public function getUsers($estado) {
        
        
        $query = $this->db->query('SELECT * FROM users INNER JOIN userrol ON (users.id_user = userrol.id_user) INNER JOIN roles ON (userrol.id_rol = roles.id_rol) WHERE users.estado =?',[$estado]);
        $array = json_decode(json_encode($query->getResult()),true);
        $datos=[
            'users'=>$array
        ];
        return $datos;

    }

    public function deleteUsers($estado,$id_user){
        
        $query = $this->db->query('update users set estado=? where id_user=?',[$estado,$id_user]);
        
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function getIdUser($id_user) {

        $query = $this->db->query('SELECT * FROM users INNER JOIN userrol ON (users.id_user = userrol.id_user) INNER JOIN roles ON (userrol.id_rol = roles.id_rol) WHERE users.id_user =?',[$id_user]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public function updateUser($id_user,$nombre,$apellido,$cedula,$correo,$telefono,$clave,$fechanacimiento,$genero,$licencia,$foto,$direccion){
        
        if(empty($clave)){
            $query = $this->db->query('update users set nombre=?, apellido=?, cedula=?,correo=?,telefono=?,fechanacimiento=?,genero=?,licencia=?,foto=?,direccion=? where id_user=?',[$nombre,$apellido,$cedula,$correo,$telefono,$fechanacimiento,$genero,$licencia,$foto,$direccion,$id_user]);
        }else{
            $query = $this->db->query('update users set nombre=?, apellido=?, cedula=?,correo=?,telefono=?,fechanacimiento=?,genero=?,licencia=?,foto=?,direccion=?,clave=? where id_user=?',[$nombre,$apellido,$cedula,$correo,$telefono,$fechanacimiento,$genero,$licencia,$foto,$direccion,$clave,$id_user]);
        }
       
        
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function getUserFunction($id_user){
        $query=$this->db->query('SELECT funcionalidades.funcionalidad,funcionalidades.id_funcionalidad FROM users INNER JOIN userrol ON (users.id_user = userrol.id_user)
        INNER JOIN roles ON (userrol.id_rol = roles.id_rol) INNER JOIN rolfuncionalidad ON (roles.id_rol = rolfuncionalidad.id_rol)
        INNER JOIN funcionalidades ON (funcionalidades.id_funcionalidad = rolfuncionalidad.id_funcionalidad) WHERE
        users.id_user = ? AND rolfuncionalidad.estado=1 AND funcionalidades.estado=1',[$id_user]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public function getUserID($cedula){
        $query=$this->db->query('SELECT * FROM users WHERE users.cedula=? AND users.estado=1',[$cedula]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public function getUserIDVehiculos($cedula){
        $query=$this->db->query('SELECT * FROM users INNER JOIN vehiculo ON (users.id_user = vehiculo.id_user) WHERE users.cedula=? AND users.estado=1',[$cedula]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }
}