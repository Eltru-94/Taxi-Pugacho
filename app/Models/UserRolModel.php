<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRolModel extends Model
{
    protected $table='userrol';
    protected $primarykey ='id_userRol';
    protected $allowedFields=['id_user','id_rol','estado'];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
       
    }

    public function __update($id_user,$id_rol){
        
        $query = $this->db->query('update userrol set id_rol=? where id_user=?',[$id_rol,$id_user]);

        if($query){
            return true;
        }else{
            return false;
        }
    }

}