<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Clientes;

class Cliente extends BaseController
{
    public function index()
    {
        //
    }

    public function store(){


        $validation = \Config\Services::validation();
        if (!$this->validate('cliente')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error'=>$errors,
            ]);
        }
        $input=$this->getRequestInput($this->request);
        $altura=$input['altura'];
        $peso=$input['peso'];
        $input['estado']=1;
        $input['IMC']=($peso/($altura*$altura));
        $modelUser=new Clientes();
        $modelUser->insert($input);
        return $this->getRespose([
            'user'=>$input,
            'success'=>'registrado'
        ]);
    }
}
