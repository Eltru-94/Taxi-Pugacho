<?php

namespace App\Controllers;
use \App\Models\Users;

class Administrador extends BaseController
{
    public function index()
    {
        $PerModel = new Users($db);
        $loggedUserID=session()->get('loggedUser');
        $perInfo=$PerModel->where('id_user',$loggedUserID)->findAll();

        $datos=[
            'title'=>"Admin",
            'id'=>$loggedUserID,
            'persona'=>$perInfo
        ];
        return view('administrador/index',$datos);
    }

   
}