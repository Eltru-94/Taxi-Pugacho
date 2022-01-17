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
}
