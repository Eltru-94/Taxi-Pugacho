<?php

namespace App\Models;

use CodeIgniter\Model;

class Tasks extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tasks';
    protected $primaryKey           = 'id_task';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['task','descripcion','estado','id_user'];
    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function getAllTaskUser($id_user){
        $query=$this->db->query('SELECT tasks.id_task,tasks.task,tasks.descripcion,tasks.created_at FROM tasks INNER JOIN users ON (users.id_user = tasks.id_user) WHERE tasks.id_user=? AND tasks.estado=1',[$id_user]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }
}
