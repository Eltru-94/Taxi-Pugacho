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


}
