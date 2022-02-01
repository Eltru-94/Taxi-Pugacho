<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Clientes;
use CodeIgniter\HTTP\ResponseInterface;

class Cliente extends BaseController
{
    public function index()
    {
        $modelCliente=new Clientes();

        return $this->getRespose([
            'clientes'=>$modelCliente->find()
        ]);

    }

    public function store(){


        $validation = \Config\Services::validation();
        if (!$this->validate('cliente')) {
            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
        }
        $input=$this->getRequestInput($this->request);
        $altura=$input['altura'];
        $peso=$input['peso'];
        $input['estado']=1;
        $input['IMC']=($peso/($altura*$altura));
        $modelUser=new Clientes();
        $modelUser->insert($input);
        return $this->getRespose([
            'success'=>$input
        ]);
    }
}
