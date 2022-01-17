<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agenda;
use CodeIgniter\HTTP\ResponseInterface;

class AgendaController extends BaseController
{
    public function index()
    {
        //
    }

    public  function  store(){

        $input=$this->getRequestInput($this->request);
        $validation = \Config\Services::validation();
        if (!$this->validate('agenda')) {
            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
        }
        $input['estado']=1;
        $agendaModel = new Agenda();
        $agendaModel->insert($input);

        return $this->getRespose([
            'message'=>'Agenda registrada',
        ]);
    }

    public  function  allAgendaId($id_user=null){

        $modelAgende=new Agenda();
        echo  json_encode($modelAgende->getAllAgendaUser($id_user));

    }
    public  function  agendaId($id_agenda=null){

            $modelAgenda=new Agenda();
            echo json_encode($modelAgenda->getAgendaId($id_agenda));
    }

    public  function  updateAgenda(){

        $validation = \Config\Services::validation();
        if (!$this->validate('agenda')) {

            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
        }else{
            $modelAgenda=new Agenda();
            $id_agenda = $this->request->getPost('id_agenda');
            $nombre=$this->request->getPost('nombre');
            $telefono=$this->request->getPost('telefono');
            $direccion=$this->request->getPost('direccion');
            $modelAgenda->updateAgendaID($id_agenda,$nombre,$telefono,$direccion);
            return $this->getRespose([
                'message'=>'Agenda Actualizada',
            ]);
        }
    }

    public  function  deletAgenda($id_agenda=null){
        $modelAgenda=new Agenda();
        $query=$modelAgenda->deletAgenda($id_agenda);
        if($query){
            return $this->getRespose([
                'message'=>'Agenda Eliminada',
            ]);
        }
    }
}
