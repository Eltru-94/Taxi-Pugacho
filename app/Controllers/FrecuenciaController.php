<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FrecuenciaController extends BaseController
{
    public function index()
    {
        $datos=[
            'title'=>'Cobro Frecuencia'
        ];

        $id_user=session()->get('loggedUser');

        return view('caja/index',$datos);
    }
}
