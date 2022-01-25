<?php

namespace App\Controllers;



use App\Models\UnidadActiva;
use App\Models\Vehiculo;
class UnidadEnableController extends BaseController
{
    public function index()
    {
        //
    }

    public function enableUnit(){


        $validation = \Config\Services::validation();

        if (!$this->validate('unitEnable')) {
            $errors=$validation->getErrors();
            echo json_encode(['success' => '', 'error' =>$errors]);
        } else {
            $unidad = $this->request->getPost('unidad');
            $ModelVehiculo=new Vehiculo();
            $data=$ModelVehiculo->getUnidad($unidad,1);

            if($data){
                $id_vehiculo=$data[0]['id_vehiculo'];
                $ModelUnidadEnable=new UnidadActiva();
                $dataUE=$ModelUnidadEnable->selectUnit($id_vehiculo,1);
                $tam=count($dataUE);

                if($tam==0){

                    $newUnitEnable=[
                        'id_vehiculo' => $id_vehiculo,
                        'horario'=>$this->request->getPost('horario'),
                        'estado'=>1,
                        'carrera'=>1,
                        'reporte'=>0
                    ];
                    $ModelUnidadEnable->insert($newUnitEnable);
                    echo json_encode(['success' => 'La unidad  : '.$unidad.' fue activada..!!','error'=>'']);

                }else{
                    $errors = [
                        'unidad' => 'La unidad  : '.$unidad.' ya se encuentra activada.!!'
                    ];
                    echo json_encode(['success' => '','error'=>$errors]);
                }

            }else{
                $errors = [
                    'unidad' => 'La unidad  : '.$unidad.' no se encuentra registrada..!!'
                ];
                echo json_encode(['success' => '','error'=>$errors]);
            }

        }


    }

    public  function  allUnitEnable(){
        $ModelUnitEnable=new UnidadActiva();
        $datos=$ModelUnitEnable->selectUnitEnable(1,1);

        echo json_encode($datos);
    }

    public function deletEnableUnit($id){

        $ModelUnitEnable=new UnidadActiva();
        $date=$ModelUnitEnable->deletUnitEnable(0,0,$id);
        if($date){
            echo json_encode(['success' => 'Unidad Eliminada','error'=>'']);
        }
    }

    public function id_select($id){
        $ModelUnitEnable=new UnidadActiva();
        $date=$ModelUnitEnable->selectUnitEnableId($id);
        echo json_encode($date);
    }

    public function update_horario(){
        $id_unitEnable = $this->request->getPost('id_unitEnable');
        $horario = $this->request->getPost('horario');
        $ModelUnitEnable=new UnidadActiva();
        $date=$ModelUnitEnable->updateUnitEnable($horario,$id_unitEnable);

        if($date){
            echo json_encode(['success' => 'Horario actualizado','error'=>'']);
        }

    }
    public  function reporteUnidad(){

        $input=$this->getRequestInput($this->request);

        $idUnitActiva=$input['id_unitActiva'];


        if($input['reporte']==1){
            $modelUnidadEnable=new UnidadActiva();
            $modelUnidadEnable->updateReporte($input,$idUnitActiva);
            return $this->getRespose([
                'success'=>'Reporte Registrado',
            ]);
        }else{
            if(!empty($input['descripcion'])){
                $modelUnidadEnable=new UnidadActiva();
                $modelUnidadEnable->updateReporte($input,$idUnitActiva);
                return $this->getRespose([
                    'success'=>'Reporte Registrado',
                ]);
            }else{
                $error=[
                    'descripcion'=>'El campo descripción es obligatorio'
                ];
                echo json_encode(['success' => '','error'=>$error]);
            }

        }


    }

    public  function  sellectAllUnitEnable(){
        date_default_timezone_set('America/Bogota');
        $horario="";
        $fechaFin= date('H');
        if($fechaFin>=6 && $fechaFin<14){
            $horario=2;
        }else if($fechaFin>=14 && $fechaFin<22){
            $horario=3;
        }else {
            $horario=1;
        }
        $modelUnidadEnable=new UnidadActiva();
        $unitEnable=$modelUnidadEnable->selectAllUnitEnable($horario);
        echo json_encode($unitEnable);
    }
}
