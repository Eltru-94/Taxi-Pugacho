<?php

namespace App\Controllers;

use \App\Models\Users;
use \CodeIgniter\HTTP\Files\UploadedFile;
use App\Libraries\Hash;

class UsersController extends BaseController
{
    
    public function __construct(){
        helper(['url','form']);
    }
    
    public function index()
    {
       
        $UserModel = new Users($db);
        $users=$UserModel->findAll();
        
        $datos=[
            'title'=>"Usuarios"
        ];
        return view('admin/users/index',$datos);
    }

    public function fetch()
    {
        $userModel = new Users();
        $datos=$userModel->getUsers();
        echo json_encode($datos);
    }

    public function save(){
       
        $validation=\Config\Services::validation();
        if(!$this->validate('user')){
            $errors=$validation->getErrors();
            echo json_encode(['code'=>0,'error'=>$errors]);
        }else{
        if ($imagefile = $this->request->getFile('imagen')) {
           
                if ($imagefile->isValid() && ! $imagefile->hasMoved()) {
                    $newName = $imagefile->getRandomName();
                    $imagefile->move(ROOTPATH.'/public/image', $newName);
                    //Datos
                    $nombre=$this->request->getPost('nombre');
                    $apellido=$this->request->getPost('apellido');
                    $cedula=$this->request->getPost('cedula');
                    $correo=$this->request->getPost('correo');
                    $telefono=$this->request->getPost('telefono');
                    $fechanacimiento=$this->request->getPost('fechanacimiento');
                    $genero=$this->request->getPost('genero');
                    $licencia=$this->request->getPost('licencia');
                    $direccion=$this->request->getPost('direccion');
                    $password = $this->request->getPost('password');

                    $user=[
                        'nombre'=>$nombre,
                        'apellido'=>$apellido,
                        'cedula'=> $cedula,
                        'telefono'=>$telefono,
                        'correo'=>$correo,
                        'clave'=>Hash::make($password),
                        'estado'=>1,
                        'genero'=>$genero,
                        'licencia'=>$licencia,
                        'direccion'=>$direccion,
                        'fechanacimiento'=>$fechanacimiento,
                        'foto'=>$newName

                    ];
                $UserModel = new Users();
                $query=$UserModel->insert($user);
                if($query){
                    echo json_encode(['code'=>1,'msg'=>'Usuario registrado..!']);
                }else{
                    echo json_encode(['code'=>0,'error'=>'Usuario no registrado']);
                }
                
                }else{
                    echo json_encode(['code'=>0,'error'=>'No se pudo cargar la imagen']);
                }
                
               
        }

        
    }

}


public function delete(){

    $UserModel = new Users();
    $id_user=$this->request->getPost('id_user');
    $query=$UserModel->deleteUsers('0',$id_user);
        
    if($query){
        echo json_encode(['code'=>1,'msg'=>"Usuario Eliminado"]);
    }else{
        echo json_encode(['code'=>0,'msg'=>"Usuario no Eliminado"]);
    }
    
}



public function update(){

    $UserModel = new Users();
    $id_user=$this->request->getPost('id_user');
    $data=$UserModel->getIdUser($id_user);
    echo json_encode($data);

}


public function updateUser(){
       
    $validation=\Config\Services::validation();

    if(!$this->validate('userupdate')){
        $errors=$validation->getErrors();
        echo json_encode(['code'=>0,'error'=>$errors]);
    }else{
        if ($imagefile = $this->request->getFile('imagen')) {
           
            if ($imagefile->isValid() && ! $imagefile->hasMoved()) {
                $newName = $imagefile->getRandomName();
                $imagefile->move(ROOTPATH.'/public/image', $newName);
                //Datos
                $id_user=$this->request->getPost('id_user');
                $nombre=$this->request->getPost('nombre');
                $apellido=$this->request->getPost('apellido');
                $cedula=$this->request->getPost('cedula');
                $correo=$this->request->getPost('correo');
                $telefono=$this->request->getPost('telefono');
                $fechanacimiento=$this->request->getPost('fechanacimiento');
                $genero=$this->request->getPost('genero');
                $licencia=$this->request->getPost('licencia');
                $direccion=$this->request->getPost('direccion');
                $clave=$this->request->getPost('password');
                if(!empty($clave)){
                    $clave=Hash::make($clave);
                }
               
                
              
            $UserModel = new Users();
           
            $query=$UserModel->updateUser($id_user,$nombre,$apellido,$cedula,$correo,$telefono,$clave,$fechanacimiento,$genero,$licencia,$newName,$direccion);
            if($query){
                echo json_encode(['code'=>1,'msg'=>$clave]);
            }else{
                echo json_encode(['code'=>0,'error'=>'Usuario no actualizacion']);
            }
            
            }else{
                echo json_encode(['code'=>0,'error'=>'No se pudo cargar la imagen']);
            }
            
           
    }else{
        echo json_encode(['code'=>0,'error'=>'No se pudo cargar la imagen']);
    }

}
}
}