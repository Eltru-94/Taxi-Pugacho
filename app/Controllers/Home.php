<?php

namespace App\Controllers;

use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $modelUser=new Users();
        $query=$modelUser->getIdUser(session('loggedUser'));
        $datos=[
            'title'=>session('rol'),
            'user'=>$query
        ];
        return view('administrador/index',$datos);
    }
}
