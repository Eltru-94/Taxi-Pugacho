<?php

namespace App\Controllers;

use \App\Models\Users;

class Administrador extends BaseController
{
    public function index()
    {


        $datos=[
            'title'=>session('rol')
        ];
        return view('administrador/index',$datos);
    }

   
}