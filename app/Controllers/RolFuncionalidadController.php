<?php

namespace App\Controllers;


use \App\Models\RolfuncionalidadModel;

class RolFuncionalidadController extends BaseController
{
    public function index()
    {
        $funcionalidades=$this->request->getPost('funcionalidades');
        $id_rol=$this->request->getPost('id_temp');
        $rolfuncionalidadModel = new RolfuncionalidadModel();

        if(!empty($funcionalidades)){
            $funcionalidadesRol=$rolfuncionalidadModel->getFuncionalidadesRol($id_rol);
           for ($i = 0; $i <count($funcionalidades); $i++) {
                $id_fun=$funcionalidades[$i];
                $datos=$rolfuncionalidadModel->getRolFuncionalidades($id_rol,$id_fun);
              
               if(empty($datos)){
                    $rolfuncionalidad=[
                        "id_rol"=>$id_rol,
                        "id_funcionalidad"=>$id_fun,
                        "estado"=>1
                    ];

                    $query= $rolfuncionalidadModel->insert($rolfuncionalidad);
               }
            }
            
            foreach($funcionalidadesRol as $date){
               
                $aux1=$date['id_funcionalidad'];
                $id_rolfuncional=$date['id_rolfuncional'];
                $check=0;
                for ($i = 0; $i <count($funcionalidades); $i++) {
                    $aux2=$funcionalidades[$i];
                    if($aux1==$aux2){
                       
                        $check=1;
                    }
                }
                if($check==1){
                    $rolfuncionalidadModel->__update($id_rolfuncional,$aux1,1);
                }else{
                    $rolfuncionalidadModel->__update($id_rolfuncional,$aux1,0);
                }   
            }

                
            echo json_encode(['success' => 'Asignada', 'error' => '']);
        }else{

            $errors=[
                'radio'=>"Seleccione una funcionalidad"
            ];
            echo json_encode(['success' => '', 'error' => $errors]);
        }
       
    }
}