<?php

namespace App\Controllers;

use \App\Models\Users;

class Administrador extends BaseController
{
    public function index()
    {

        $modelUser=new Users();
        $query=$modelUser->select_user_id(session('loggedUser'));
        $datos=[
            'title'=>session('rol'),
            'user'=>$query
        ];
        return view('administrador/index',$datos);
    }

   
}