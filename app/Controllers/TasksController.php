<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tasks;
use CodeIgniter\HTTP\ResponseInterface;

class TasksController extends BaseController
{
    public function index()
    {
        //
    }

    public function  storeTask (){

        $input=$this->getRequestInput($this->request);
        $validation = \Config\Services::validation();
        if (!$this->validate('task')) {

            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
        }
        $input['estado']=1;
        $tasksModel=new Tasks();
        $tasksModel->insert($input);
        return $this->getRespose([
            'message'=>'Tareas Regristrada',
        ]);
    }

    public  function  allTaskid(){

        $id_user=$this->request->getPost('id_user');
        $modelTask=new Tasks();
        echo  json_encode($modelTask->getAllTaskUser($id_user));

    }

}
