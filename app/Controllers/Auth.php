<?php

namespace App\Controllers;

use CodeIgniter\Controller;
//Libraries para cifrar
use App\Libraries\Hash;
use \App\Models\Users;
class Auth extends Controller

{

    public function __construct(){
        helper(['url','form']);
    }

    public function index()
    {
        $datos=[
            'title'=>"Login"
        ];
        return view('auth/login',$datos);
    }

    public function register(){
        return view ('auth/register');
    }

    public function save (){
        $validation =$this->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=> 'required|min_length[5]|max_length[12]',
            'telefono'=> 'required|min_length[9]|max_length[12]',
            'correo'=>'required|valid_email',
            'password'=> 'required|min_length[5]|max_length[12]',
            'cpassword'=> 'required|min_length[5]|max_length[12]|matches[password]'
        ]);
        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            //Registro Users
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cedula = $this->request->getPost('cedula');
            $telefono = $this->request->getPost('telefono');
            $correo = $this->request->getPost('correo');
            $password = $this->request->getPost('password');

            $persona=[
                'nombre'=>$nombre,
                'apellido'=>$apellido,
                'cedula'=> $cedula,
                'telefono'=>$telefono,
                'correo'=>$correo,
                'clave'=>Hash::make($password)
            ];

            $PersonaModel = new Users();
            $query=$PersonaModel->insert($persona);
            if(!$query){

                return redirect()->back()->with('fail','No registrado');
            
            }else{
                //return redirect()->to('auth/register')->with('success','Registrado con exito');
                $last_id=$PersonaModel->insertID();
                session()->set('loggedUser',$last_id);
                return redirect()->to('administrador');
                
            }
            
           
        }
    }

    function check(){
        $validation =$this->validate([
            'correo'=>'required|valid_email',
            'password'=> 'required|min_length[5]|max_length[12]'
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{

            $correo = $this->request->getPost('correo');
            $password= $this->request->getPost('password');
            $PersonaModel = new Users();

            $PersonaModel->select("users.nombre,users.correo,users.clave,users.apellido,users.foto,users.id_user,users.estado,roles.rol");
            $PersonaModel->join('userrol', 'users.id_user = userrol.id_user');
            $PersonaModel->join('roles', 'userrol.id_rol = roles.id_rol');
            $personainfo=$PersonaModel->where('correo',$correo)->first();


            if($personainfo['estado']==1){

                $checkpassword=Hash::check($password, $personainfo['clave']);
                if(!$checkpassword){
                   
                    session()->setFlashdata('fail','Password Incorrecto');
                    return redirect()->to('/auth')->withInput();
                }else{
                    $perid=$personainfo['id_user'];
                    $nombre=$personainfo['nombre'].' '.$personainfo['apellido'];
                    $foto=$personainfo['foto'];
                    $rol=$personainfo['rol'];
                    $funcionalidades=$PersonaModel->getUserFunction($perid);
                    $data=[
                        "loggedUser"=>$perid,
                        "nombre"=>$nombre,
                        "foto"=>$foto,
                        "rol"=>$rol,
                        "funcionalidades"=>$funcionalidades
                    ];
                    session()->set($data);
                   
                    return redirect()->to('administrador');
                }
            }else{
                session()->setFlashdata('fail','Usuario bloqueado');
                return redirect()->to('/auth')->withInput();
            }
            

        }
    }


    function logout(){

        if (session()->has('loggedUser')){
            session()->remove('loggedUser');

            return redirect()->to('/auth?access=out')->with('fail','You are logged out !');
        }
    }
}