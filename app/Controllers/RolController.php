<?php

namespace App\Controllers;
use \App\Models\Roles;
class RolController extends BaseController
{
   

    
    public function index()
    {
        $datos=[
            'title'=>"Roles"
        ];
        return view('admin/rol/index',$datos);
    }

    public function fetch()
    {
        $rolModel = new Roles();
        $datos=$rolModel->getRoles();
        echo json_encode($datos);
    }

    public function save(){
       
        $validation=\Config\Services::validation();

   

        if(!$this->validate('rol')){
            $errors=$validation->getErrors();
            echo json_encode(['code'=>0,'error'=>$errors]);
        }else{
            //Insert rol
            $rolModel = new Roles();
            $rol=[
                'rol'=>$this->request->getPost('rol'),
                'descripcion'=>$this->request->getPost('descripcion'),
                'estado'=>1
            ];
            //Retorna el id del nuevo registro creado
            $query=$rolModel->insert($rol);
            if($query){
                echo json_encode(['success' => 'Rol resgistrado', 'error' => '']);
            
            }else{
                echo json_encode(['success' => '', 'error' => 'Rol no resgistrado']);
                
            }
        }
         
    }

    public function updateRol(){
       
        $validation=\Config\Services::validation();

        if(!$this->validate('updaterol')){
            $errors=$validation->getErrors();
            echo json_encode(['code'=>0,'error'=>$errors]);
        }else{
            //Update rol
            $rolModel = new Roles();
            $id_rol=$this->request->getPost('id_rol');
            $rol=$this->request->getPost('rol');
            $descripcion=$this->request->getPost('descripcion');
           
            $query=$rolModel->updateRol($id_rol,$rol,$descripcion);
            
            if($query){
                echo json_encode(['success' => 'Rol actualizado', 'error' => '']);
            }else{
                echo json_encode(['success' => 'Rol no actualizado', 'error' => '']);
            }
            
        }
    
    }
    
    public function update(){

        $rolModel = new Roles();
        $id_rol=$this->request->getPost('id_rol');
        $data=$rolModel-> getIdRol($id_rol);
        echo json_encode($data);

    }

    public function delete(){

        $rolModel = new Roles();
        $id_rol=$this->request->getPost('id_rol');
        $query=$rolModel->deleteRol('0',$id_rol);
            
        if($query){
            echo json_encode(['code'=>1,'msg'=>"Rol Eliminado"]);
        }else{
            echo json_encode(['code'=>0,'msg'=>"Rol no Eliminado"]);
        }
        
    }


}