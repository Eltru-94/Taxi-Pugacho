<?php

namespace App\Controllers;

use \App\Models\Users;
use \App\Models\UserRolModel;
use App\Libraries\Hash;

class UsersController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {

        $datos = [
            'title' => "Usuarios"
        ];
        return view('admin/users/index', $datos);
    }

    public function fetch()
    {
        $estado = $this->request->getPost('estado');
        $userModel = new Users();
        $datos = $userModel->getUsers($estado);
        echo json_encode($datos);
    }

    public function block()
    {
        $datos = [
            'title' => "Bloqueados"
        ];
        return view('admin/users/block', $datos);
    }

    public function save()
    {

        $validation = \Config\Services::validation();
        if (!$this->validate('user')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' =>  $errors]);
        } else {

            $imagefile = $this->request->getFile('imagen');
            $newName = $imagefile->getRandomName();
            $imagefile->move(ROOTPATH . '/public/image', $newName);
            //Datos
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cedula = $this->request->getPost('cedula');
            $correo = $this->request->getPost('correo');
            $telefono = $this->request->getPost('telefono');
            $fechanacimiento = $this->request->getPost('fechanacimiento');
            $genero = $this->request->getPost('genero');
            $licencia = $this->request->getPost('licencia');
            $direccion = $this->request->getPost('direccion');
            $password = $this->request->getPost('password');
            $id_rol = $this->request->getPost('roles');

            $user = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'telefono' => $telefono,
                'correo' => $correo,
                'clave' => Hash::make($password),
                'estado' => 1,
                'genero' => $genero,
                'licencia' => $licencia,
                'direccion' => $direccion,
                'fechanacimiento' => $fechanacimiento,
                'foto' => $newName

            ];
            $UserModel = new Users();
            $query = $UserModel->insert($user);
            if ($query) {

                $userRol = [
                    'id_user' => $query,
                    'id_rol' => $id_rol,
                    'estado' => 1
                ];

                $UserRolModel = new UserRolModel();
                $UserRolModel->insert($userRol);
                echo json_encode(['success' => 'Usuario registrado..!','error'=>'']);

            } else {
                echo json_encode(['success' => '', 'error' => 'Usuario no registrado']);
            }
        }
    }


    public function delete()
    {

        $UserModel = new Users();
        $id_user = $this->request->getPost('id_user');
        $estado = $this->request->getPost('estado');
        $query = $UserModel->deleteUsers($estado, $id_user);

        if ($query) {
            if ($estado == 0) {
                echo json_encode(['code' => 1, 'msg' => "Usuario Eliminado"]);
            } else {
                echo json_encode(['code' => 1, 'msg' => "Usuario Activado"]);
            }
        } else {
            echo json_encode(['code' => 0, 'msg' => "Usuario no Eliminado"]);
        }
    }



    public function update()
    {

        $UserModel = new Users();
        $id_user = $this->request->getPost('id_user');
        $data = $UserModel->getIdUser($id_user);
        echo json_encode($data);
    }


    public function updateUser()
    {

        $validation = \Config\Services::validation();

        if (!$this->validate('userupdate')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' =>$errors]);
        } else {
           

                $imagefile = $this->request->getFile('imagen');
                $newName = $imagefile->getRandomName();
                $imagefile->move(ROOTPATH . '/public/image', $newName);
                //Datos
                $id_user = $this->request->getPost('id_user');
                $nombre = $this->request->getPost('nombre');
                $apellido = $this->request->getPost('apellido');
                $cedula = $this->request->getPost('cedula');
                $correo = $this->request->getPost('correo');
                $telefono = $this->request->getPost('telefono');
                $fechanacimiento = $this->request->getPost('fechanacimiento');
                $genero = $this->request->getPost('genero');
                $licencia = $this->request->getPost('licencia');
                $direccion = $this->request->getPost('direccion');
                $clave = $this->request->getPost('password');
                $id_rol = $this->request->getPOst('roles');
                if (!empty($clave)) {
                    $clave = Hash::make($clave);
                }

                $UserModel = new Users();
                $UserRolModel = new UserRolModel();

                $query = $UserModel->updateUser($id_user, $nombre, $apellido, $cedula, $correo, $telefono, $clave, $fechanacimiento, $genero, $licencia, $newName, $direccion);
                if ($query) {
                    $UserRolModel->__update($id_user, $id_rol);
                    echo json_encode(['success' => 'Usuario Actualizado con exito..!!', 'error' => '']);
                } else {
                    echo json_encode(['success' => '', 'error' => 'Usuario no actualizacion']);
                }
           
        }
    }


    function searchID()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate('searchID')) {
            $errors = $validation->getErrors();
            echo json_encode(['code' => 0, 'error' => $errors]);
        } else {

            $cedula = $this->request->getPost('cedula');
            $UserModel = new Users();
            $datos = $UserModel->getUserID($cedula);
           
            $temDatos = count($UserModel->getUserIDVehiculos($cedula));
           
            if ($temDatos< 3  ) {
               
                echo json_encode(['error' => '', 'success' => $datos]);
            } else {
                $errors = [
                    'cedula' => 'El usuario alcanzo el numero maximo de unidades'
                ];
                echo json_encode(['code' => 0, 'error' => $errors]);
            }
            
        }
    }
}
