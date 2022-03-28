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

    public function update_data($data,$id_user){
        
        /*$query = $this->db->query('update userrol set id_rol=? where id_user=?',[$id_rol,$id_user]);

        if($query){
            return true;
        }else{
            return false;
        }*/
        $builder = $this->db->table('userrol');
        $builder->where('userrol.id_user', $id_user);
        $query = $builder->update($data);
        return $query;
    }

}