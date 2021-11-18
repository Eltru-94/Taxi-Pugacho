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

    public function getUsers() {
        
        $query = $this->db->query('select * from users where estado =?',[1]);
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

        $query = $this->db->query('select * from users where id_user =?',[$id_user]);
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
}