<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'clientes';
    protected $primaryKey           = 'id_cliente';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields    = ['nombre','apellido','altura','peso','estado','IMC'];


}
