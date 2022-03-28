<?php

namespace App\Controllers;

use \App\Models\Users;
use \App\Models\UserRolModel;
use App\Libraries\Hash;
use App\Models\Vehiculo;
use function PHPUnit\Framework\isEmpty;

class UsersController extends BaseController
{


    public function index()
    {

        $datos = [
            'title' => "Usuarios"
        ];
        return view('admin/users/index', $datos);
    }

    public function enable()
    {
        $state = $this->request->getPost('estado');
        $modelUser = new Users();
        $query = $modelUser->get_users($state);

        return $this->getRespose(
            [
                'users' => $query
            ]
        );
    }

    public function block()
    {
        $datos = [
            'title' => "Bloqueados"
        ];
        return view('admin/users/block', $datos);
    }

    public function locked()
    {
        $datos = [
            'title' => "Usuarios Bloqueados"
        ];
        return view('admin/users/indexUserBlock', $datos);
    }

    public function create()
    {
        $input = $this->getRequestInput($this->request);
        $validation = \Config\Services::validation();
        if (!$this->validate('user')) {
            return $this->getRespose([
                'error' => $validation->getErrors()
            ]);
        }
        $fileImagen = $this->request->getFile('imagen');
        $input['foto'] = $fileImagen->getRandomName();
        $input['estado'] = 1;
        $id_rol = $input['roles'];
        $input['clave'] = Hash::make($input['password']);
        unset($input['roles']);
        unset($input['password']);
        unset($input['cpassword']);
        unset($input['id_user']);

        $UserModel = new Users();
        $query = $UserModel->insert($input);
        if ($query) {
            $fileImagen->move(ROOTPATH . '/public/image', $input['foto']);
            $userRol = [
                'id_user' => $query,
                'id_rol' => $id_rol,
                'estado' => 1
            ];

            $modelUserRol = new UserRolModel();
            $modelUserRol->insert($userRol);
            return $this->getRespose([
                'success' => "Registrado",
            ]);

        }

    }


    public function delete()
    {

        $input = $this->getRequestInput($this->request);
        $id_user = $input['id_user'];
        $modelVehiculo = new Vehiculo();
        $query1 = $modelVehiculo->total_vehicle_users($id_user);
        if ($input['estado'] == 0) {

            if ($query1[0]['TOTAL']) {
                return $this->getRespose(
                    [
                        'alert' => "Unidades Activas"
                    ]
                );

            }
        }

        unset($input['id_user']);
        $modelUser = new Users();
        $query = $modelUser->delete_users($input, $id_user);
        if ($query) {
            if ($input['estado'] == 0) {
                return $this->getRespose(
                    [
                        'success' => "Eliminado"
                    ]
                );
            }
            return $this->getRespose(
                [
                'success' => "Activado"
                ]
            );
        }


    }


    public function update()
    {

        $UserModel = new Users();
        $id_user = $this->request->getPost('id_user');
        $query = $UserModel->select_user_id($id_user);
        return $this->getRespose(
            [
                'user' => $query
            ]
        );
    }


    public function update_data()
    {
        $validation = \Config\Services::validation();
        $input = $this->getRequestInput($this->request);
        if (!$this->validate('userupdate')) {

            return $this->getRespose([
                'error' => $validation->getErrors()
            ]);
        }
        $imagefile = $this->request->getFile('imagen');
        if (!empty($input['password'])) {
            $input['clave'] = Hash::make($input['password']);
        }
        $id_rol = $input['roles'];
        $id_user = $input['id_user'];

        unset($input['roles']);
        unset($input['id_user']);
        unset($input['password']);
        unset($input['cpassword']);
        $a = $imagefile->getClientName();
        if ($a != "") {
            if (!$this->validate('updateImagen')) {
                return $this->getRespose([
                    'error' => $validation->getErrors()
                ]);
            }

            $newName = $imagefile->getRandomName();
            $imagefile->move(ROOTPATH . '/public/image', $newName);
            $input['foto'] = $newName;
        }

        $modelUser = new Users();
        $modelUser->update_data($input, $id_user);
        $rolUser = [
            'id_rol' => $id_rol
        ];
        $modelRolUser = new UserRolModel();
        $modelRolUser->update_data($rolUser, $id_user);
        return $this->getRespose([
            'success' => "Actualizado",
        ]);

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

            if ($temDatos < 3) {

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
