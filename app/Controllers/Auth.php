<?php

namespace App\Controllers;

use CodeIgniter\Controller;

//Libraries para cifrar
use App\Libraries\Hash;
use \App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends Controller

{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $datos = [
            'title' => "Login"
        ];
        return view('auth/login', $datos);
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $validation = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|min_length[5]|max_length[12]',
            'telefono' => 'required|min_length[9]|max_length[12]',
            'correo' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[12]',
            'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
        ]);
        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            //Registro Users
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cedula = $this->request->getPost('cedula');
            $telefono = $this->request->getPost('telefono');
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');

            $persona = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'telefono' => $telefono,
                'correo' => $correo,
                'clave' => Hash::make($password)
            ];

            $PersonaModel = new Users();
            $query = $PersonaModel->insert($persona);
            if (!$query) {

                return redirect()->back()->with('fail', 'No registrado');

            } else {
                //return redirect()->to('auth/register')->with('success','Registrado con exito');
                $last_id = $PersonaModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('administrador');

            }


        }
    }

    function check()
    {
        $session = session();


        $validation = \Config\Services::validation();
        if (!$this->validate('loginUser')) {
            return $this->getRespose(['error' => $validation->getErrors()]);
        }
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('contrasenia');
        $modelUsers = new Users();

        $modelUsers->select("users.nombre,users.correo,users.clave,users.apellido,users.foto,users.id_user,users.estado,roles.rol,roles.id_rol");
        $modelUsers->join('userrol', 'users.id_user = userrol.id_user');
        $modelUsers->join('roles', 'userrol.id_rol = roles.id_rol');
        $userLogin = $modelUsers->where('correo', $correo)->first();
        if ($userLogin['estado'] == 1) {
            $checkpassword = Hash::check($password, $userLogin['clave']);
            if (!$checkpassword) {
                return $this->getRespose(['fail' => 'Contraseña incorrecta']);
            }
            $perid=$userLogin['id_user'];
            $nombre=$userLogin['nombre'].' '.$userLogin['apellido'];
            $foto=$userLogin['foto'];
            $rol=$userLogin['rol'];
            $funcionalidades=$modelUsers->getUserFunction($perid);
            $data=[
                "loggedUser"=>$perid,
                "nombre"=>$nombre,
                "foto"=>$foto,
                "rol"=>$rol,
                "id_rol"=>$userLogin['id_rol'],
                "funcionalidades"=>$funcionalidades
            ];
            session()->set($data);
            return $this->getRespose(['success' => 'Usuario Loginnn']);

        }

        if ($userLogin['estado'] == 0) {

            return $this->getRespose(['fail' => 'Usuario bloqueado o no registrado']);
        }




    }


    function logout()
    {

        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');

            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out !');
        }
    }

    public function getRespose(array $responseBody, int $code = ResponseInterface::HTTP_OK)
    {
        return $this->response->setStatusCode($code)->setJSON($responseBody);
    }
}