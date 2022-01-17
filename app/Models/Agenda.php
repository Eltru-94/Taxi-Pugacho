<?php

namespace App\Models;

use CodeIgniter\Model;

class Agenda extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'agenda';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nombre','telefono','direccion','id_user','estado'];


    public function getAllAgendaUser($id_user){

        $query=$this->db->query('SELECT *FROM  agenda WHERE agenda.id_user=? AND agenda.estado=1',[$id_user]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }
    public function getAgendaId($id_agenda){

        $query=$this->db->query('SELECT *FROM  agenda WHERE agenda.id_agenda=? AND agenda.estado=1',[$id_agenda]);
        $array = json_decode(json_encode($query->getResult()),true);
        return $array;
    }

    public  function  updateAgendaID($id_agenda,$nombre,$telefono,$direccion){

        $query = $this->db->query('update agenda set nombre=?, telefono=?, direccion=? where id_agenda=?',[$nombre,$telefono,$direccion,$id_agenda]);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function deletAgenda($id_agenda){

        $query = $this->db->query('update agenda set estado=? where id_agenda=?',[0,$id_agenda]);

        if($query){
            return true;
        }else{
            return false;
        }
    }

}
