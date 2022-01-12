<?php

namespace App\Controllers\Api\V1;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserRolModel;
use \App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
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
            Hash::check($input['clave'], $user['clave']);
            return $this->getJWTForUser($input['correo']);

        }catch (\Exception $e){
            return $this->getRespose([
                'error'=>$e->getMessage(),

            ]);
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
                'message'=>'User authenticated successfully',
                'user'=>$user,
                'access_token'=>getSignedJWTFormUser($email)
            ]);
        }catch (\Exception $e){
            return $this->getRespose([
                'error'=>$e->getMessage(),

            ],$responseCode);
        }
    }
}
