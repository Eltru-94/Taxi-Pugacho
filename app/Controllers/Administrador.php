<?php

namespace App\Controllers;

use \App\Models\Users;

class Administrador extends BaseController
{
    public function index()
    {
        $PerModel = new Users();
        $loggedUserID=session()->get('loggedUser');
        $perInfo=$PerModel->where('id_user',$loggedUserID)->findAll();

        $datos=[
            'title'=>session('rol')
        ];
        return view('administrador/index',$datos);
    }

   
}