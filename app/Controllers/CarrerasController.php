<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Carreras;
use App\Models\UnidadActiva;

class CarrerasController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $datos=[
          'title'=>'Central'
        ];

        return view('central/index',$datos);
    }
    public function stateCarreras()
    {
        $datos=[
            'title'=>'Carreras'
        ];

        return view('central/estado/index',$datos);
    }

    public  function  allUnitEnableCarreras(){
        date_default_timezone_set('America/Bogota');
        $horario="";
        $fechaFin= date('H');
        if($fechaFin>=6 && $fechaFin<14){
            $horario=2;
        }
        if($fechaFin>=14 && $fechaFin<22){
            $horario=3;
        }
        if($fechaFin>=22 && $fechaFin<6){
            $horario=1;
        }
        $estado = $this->request->getPost('estado');
         $ModelCarreras =new Carreras();
         $datos=$ModelCarreras->selectUnitCarrera($estado,$horario,1);
        echo json_encode($datos);
    }


    public function getTipoCarrera()
    {
        $ModelCarreras =new Carreras();
        $datos=$ModelCarreras->getServicios(1);
        echo json_encode($datos);
    }

    public  function  store(){

        $validation = \Config\Services::validation();
        if (!$this->validate('carrera')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' =>  $errors]);
        }else{
            $fecha= date('Y-m-d H:i:s');
            $id_unitActiva=$this->request->getPost('id_unitActiva');


            $new_carrera=[
              'direccion_origen'=>$this->request->getPost('origen'),
              'direccion_destino'=>$this->request->getPost('destino'),
              'telefono_persona'=>$this->request->getPost('telefono'),
              'id_servicio'=>$this->request->getPost('carrera'),
                'descripcion'=>$this->request->getPost('descripcion'),
              'id_unitActiva'=>$id_unitActiva,
                'carrera'=>0,
                'dateInicio'=>$fecha,
                'dateFin'=>$fecha,
              'estado'=>1
            ];

            $ModelCarreras =new Carreras();
            $query = $ModelCarreras->insert($new_carrera);
            $ModelUnitEnable=new UnidadActiva();
            $ModelUnitEnable->deletUnitEnable(1,2,$id_unitActiva);
            echo json_encode(['success' =>'Carrera asignada', 'error' => '']);
        }
    }


    public function carreras()
    {
        $datos=[
            'title'=>'Estado Carreras'
        ];

        return view('central/carreras/index',$datos);
    }

    public function allCarrerasEnable(){

        $ModelCarreras =new Carreras();
        $query=$ModelCarreras->getCarrerasEnables(1);
        echo json_encode($query);
    }

    public function allCarrerasDisable(){

        $ModelCarreras =new Carreras();
        $query=$ModelCarreras->getCarrerasEnables(0);
        echo json_encode($query);
    }

    public  function  updateCarrera(){
        $id_unitActiva=$this->request->getPost('id_unitActiva');
        $fechaFin= date('Y-m-d H:i:s');
        $carrera=$this->request->getPost('carrera');
        $id_carrera=$this->request->getPost('id_carrera');
        $ModelCarreras =new Carreras();
        $query=$ModelCarreras->updateCarrera($id_carrera,$carrera,0,$fechaFin);
        $ModelUnitEnable=new UnidadActiva();
        $ModelUnitEnable->deletUnitEnable(1,1,$id_unitActiva);
        if ($query) {
            echo json_encode(['success' => 'Carrera creada con exito..!!', 'error' => '']);
        } else {
            echo json_encode(['success' => '', 'error' => 'Error']);
        }

    }





}
