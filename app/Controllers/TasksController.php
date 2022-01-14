<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tasks;

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

            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' => $errors]);
        }
        $tasksModel=new Tasks();
        $query=$tasksModel->insert($input);
        if ($query) {
            echo json_encode(['success' => 'Tarea registrada..!!', 'error' => '']);
        } else {
            echo json_encode(['success' =>'', 'error' => 'Tareas no registrada']);
        }

    }

}
