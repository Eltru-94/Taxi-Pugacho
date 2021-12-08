<?php

namespace App\Models;

use CodeIgniter\Model;

class Vehiculo extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'vehiculo';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['placa','fechafabricacion','marca','modelo','imagen1','imagen2','imagen3','id_user','estado'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();  
    }

    public function getVehiculo($estado){
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE users.estado =?',[$estado]);
        $array = json_decode(json_encode($query->getResult()),true);
        
        return $array;
    }

    public function getVehiculoUSer($estado,$id_vehiculo){
        $query = $this->db->query('SELECT * FROM vehiculo INNER JOIN users ON (vehiculo.id_user = users.id_user) WHERE vehiculo.estado =? AND vehiculo.id_vehiculo=?',[$estado,$id_vehiculo]);
        $array = json_decode(json_encode($query->getResult()),true);
        
        return $array;
    }
    
}
