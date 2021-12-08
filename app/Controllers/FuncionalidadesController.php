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

    public function rolfuncionalidad()
    {
        $funcionalidadModel = new Funcionalidades();
        $datos=$funcionalidadModel->getFuncionalidades();
        echo json_encode($datos);
    }


    public function getRolFuncionalidad(){
        $id_rol=$this->request->getPost('id_rol');

        $funcionalidadModel = new Funcionalidades();
        $datos=$funcionalidadModel->getFunctionRol($id_rol);
        $func=$funcionalidadModel->getFuncionalidades();

        
        $check=0;
        $rolesFuncion = array();
        foreach($func as $fuc){
           
            foreach($datos as $date){
               if($date['id_funcionalidad']==$fuc['id_funcionalidad']){
                $check=1;
                break;
               }else{
                $check=0;
               }
            }
            
            if($check==1){

                $temp=[
                    "id_funcionalidad"=>$fuc['id_funcionalidad'],
                    "funcionalidad"=>$fuc['funcionalidad'],
                    "estado"=>1
                ];
                $rolesFuncion[]=$temp;
            }else{

                $temp=[
                    "id_funcionalidad"=>$fuc['id_funcionalidad'],
                    "funcionalidad"=>$fuc['funcionalidad'],
                    "estado"=>0
                ];
                $rolesFuncion[]=$temp;
            }
  
        }

       
        echo json_encode($rolesFuncion);
        
    }
}