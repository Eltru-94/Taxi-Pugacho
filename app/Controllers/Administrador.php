<?php

namespace App\Controllers;
use \App\Models\PersonaModel;

class Administrador extends BaseController
{
    public function index()
    {
        $PerModel = new PersonaModel($db);
        $loggedUserID=session()->get('loggedUser');
        $perInfo=$PerModel->where('id_per',$loggedUserID)->findAll();

        $datos=[
            'title'=>"Admin",
            'id'=>$loggedUserID,
            'persona'=>$perInfo
        ];
        return view('administrador/index',$datos);
    }

    public function profile()
    {
        $PerModel = new PersonaModel($db);
          
        $loggedUserID=session()->get('loggedUser');
        //$a = $PerModel() -> find(8);

        $datos=[
            'title'=>"Perfil",
            'id'=>$loggedUserID
        ];

        return view('administrador/perfil',$datos);
    }
}