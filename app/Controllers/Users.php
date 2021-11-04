<?php

namespace App\Controllers;

use \App\Models\PersonaModel;

class Users extends BaseController
{
    public function index()
    {
        $UserModel = new PersonaModel($db);
        $users=$UserModel->findAll();
        
        $datos=[
            'title'=>"Persona",
            'personas'=>$users
        ];
        return view('admin/users/index',$datos);
    }
}
