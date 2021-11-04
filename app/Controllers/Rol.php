<?php

namespace App\Controllers;
use \App\Models\Roles;
class Rol extends BaseController
{
    public function index()
    {
      
        $rolModel = new Roles();
        $roles=$rolModel->findAll();
        $datos=[
            'title'=>"Rol",
            'roles'=>$roles
        ];
        
        
        return view('admin/rol/index',$datos);
    }


    public function save(){
        echo "llegamos";
    }
}