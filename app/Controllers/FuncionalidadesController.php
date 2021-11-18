<?php

namespace App\Controllers;
use \App\Models\Funcionalidades;

class FuncionalidadesController extends BaseController
{
    public function index()
    {
        $datos=[
            'title'=>"Funcionalidad"
        ];
        return view('admin/funcionalidad/index',$datos);
    
    }

    public function fetch()
    {
        $funcionalidadModel = new Funcionalidades();
        $datos=$funcionalidadModel->getFuncionalidades();
        echo json_encode($datos);
    }
}
