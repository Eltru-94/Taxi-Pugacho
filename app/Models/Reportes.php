<?php

namespace App\Models;

use CodeIgniter\Model;

class Reportes extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'reportes';
    protected $primaryKey           = 'id_reporte';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id_unitActiva','id_operador','descripcion','reporte','estado'];


    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();

    }


    public function getReportAssistance()
    {

        $builder = $this->db->table('unidadesactivas');
        $builder->select(' users.nombre,users.apellido, reportes.reporte,reportes.descripcion,vehiculo.unidad,reportes.created_at');
        $builder->join('reportes', 'unidadesactivas.id_unitActiva = reportes.id_unitActiva');
        $builder->join('vehiculo', 'unidadesactivas.id_vehiculo = vehiculo.id_vehiculo');
        $builder->join('users', 'vehiculo.id_user = users.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }

}
