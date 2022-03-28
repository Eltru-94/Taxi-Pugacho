<?php

namespace App\Models;

use CodeIgniter\Model;

class Operadores extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'operadores';
    protected $primaryKey = 'id_operador';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_user', 'horario', 'estado', 'horafin'];

    public function __construct()
    {
        parent::__construct();
    }


    public function selectForIdUser($id)
    {
        $builder = $this->db->table('operadores');
        $builder->select('estado,id_operador');
        $builder->where('estado', 1);
        $builder->where('id_user', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateOperador($id, $data)
    {
        $builder = $this->db->table('operadores');
        $builder->where('id_operador', $id);
        $builder->where($data);

    }


    public function selectOperadores()
    {
        $builder = $this->db->table('operadores');
        $builder->select("operadores.horafin,operadores.created_at,TIME(operadores.created_at) as 'tiempoinicio', TIME(operadores.horafin) as 'tiempofin', DATE(operadores.created_at) as 'fecha',operadores.horario,operadores.estado,users.nombre,users.apellido,users.telefono");
        $builder->join('users', 'users.id_user=operadores.id_user');
        $query = $builder->get();
        return $query->getResultArray();
    }

}
