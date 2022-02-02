<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserRolModel;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        $ModelUser=new Users();
        echo  json_encode($ModelUser->find());
    }

    public function  register (){

        $input=$this->getRequestInput($this->request);
        $validation = \Config\Services::validation();
        if (!$this->validate('apiuser')) {

            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);


        }

        $tempClave=$input['clave'];
        $input['clave']=Hash::make($tempClave);
        $input['estado']=1;
        $userModel=new Users();
        $query=$userModel->insert($input);

        $userRol = [
            'id_user' => $query,
            'id_rol' => 3,
            'estado' => 1
        ];

        $UserRolModel = new UserRolModel();
        $UserRolModel->insert($userRol);

        return $this->getJWTForUser($input['correo'],ResponseInterface::HTTP_CREATED);
    }
    public function login(){

        try {

            $input=$this->getRequestInput($this->request);
            $validation = \Config\Services::validation();
            if (!$this->validate('login')) {
                return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
            }
            $modelUser=new Users();
            $user=$modelUser->findUserByEmailAddress($input['correo']);
            $aux=Hash::check($input['clave'], $user['clave']);
            if($aux){
                return $this->getJWTForUser($input['correo']);
            }
            return $this->getRespose([
                'error'=>'Contraseña Incorrecta',

            ]);

        }catch (\Exception $e){
            return $this->getRespose([
                'error'=>$e->getMessage(),

            ]);
        }


    }
    public function updateUser(){

        $validation = \Config\Services::validation();
        if (!$this->validate('apiuserupdate')) {
            return $this->getRespose($validation->getErrors(),ResponseInterface::HTTP_BAD_REQUEST);
        }else{
            $id_user = $this->request->getPost('id_user');
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cedula = $this->request->getPost('cedula');
            $correo = $this->request->getPost('correo');
            $clave = $this->request->getPost('clave');

            if (!empty($clave)) {
                $clave = Hash::make($clave);
            }

            $UserModel = new Users();
            $query=$UserModel->apiUpdateUser($id_user,$nombre,$apellido,$cedula,$correo,$clave);
            if($query){
                return $this->getRespose([
                    'message'=>'User Actualizado',
                ]);

            }
        }
    }

    private function getJWTForUser(string $email,int $responseCode=ResponseInterface::HTTP_OK)
    {
        try {
            $modelUser=new Users();
            $user=$modelUser->findUserByEmailAddress($email);
            unset($user['clave']);
            helper('jwt');
            return $this->getRespose([
                'message'=>'User authenticated successfullyg',
                'user'=>$user,
                'access_token'=>getSignedJWTFormUser($email)
            ]);
        }catch (\Exception $e){
            return $this->getRespose([
                'error'=>$e->getMessage(),

            ],$responseCode);
        }
    }

    public function vehiclesUser($id=0)
    {
       $modelUser=new Users();
       $query=$modelUser->selectVehicleForIdUser($id);
       return $this->getRespose([
            'vehicleUser'=>$query
       ]);
    }
}
