<?php

namespace App\Controllers;


use App\Models\Reportes;
use App\Models\UnidadActiva;
use App\Models\Vehiculo;

class UnidadEnableController extends BaseController
{
    public function index()
    {
        $datos = [
            'title' => "Reporte Vehiculo"
        ];
        return view('unidades/reporte/index', $datos);
    }

    public function enableUnit()
    {


        $validation = \Config\Services::validation();

        if (!$this->validate('unitEnable')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' => $errors]);
        } else {
            $unidad = $this->request->getPost('unidad');
            $ModelVehiculo = new Vehiculo();
            $data = $ModelVehiculo->getUnidad($unidad, 1);

            if ($data) {
                $id_vehiculo = $data[0]['id_vehiculo'];
                $ModelUnidadEnable = new UnidadActiva();
                $dataUE = $ModelUnidadEnable->selectUnit($id_vehiculo, 1);
                $tam = count($dataUE);

                if ($tam == 0) {

                    $newUnitEnable = [
                        'id_vehiculo' => $id_vehiculo,
                        'horario' => $this->request->getPost('horario'),
                        'estado' => 1,
                        'carrera' => 1,
                        'reporte' => 0
                    ];
                    $ModelUnidadEnable->insert($newUnitEnable);
                    echo json_encode(['success' => 'La unidad  : ' . $unidad . ' fue activada..!!', 'error' => '']);

                } else {
                    $errors = [
                        'unidad' => 'La unidad  : ' . $unidad . ' ya se encuentra activada.!!'
                    ];
                    echo json_encode(['success' => '', 'error' => $errors]);
                }

            } else {
                $errors = [
                    'unidad' => 'La unidad  : ' . $unidad . ' no se encuentra registrada..!!'
                ];
                echo json_encode(['success' => '', 'error' => $errors]);
            }

        }


    }

    public function allUnitEnable()
    {
        $ModelUnitEnable = new UnidadActiva();
        $datos = $ModelUnitEnable->selectUnitEnable(1, 1);
        echo json_encode($datos);
    }

    public function deletEnableUnit()
    {
        $input = $this->getRequestInput($this->request);
        $id_unitActiva = $input['id_unitActiva'];
        $id_vehiculo = $input['id_vehiculo'];

        $modelUnitEnable = new UnidadActiva();
        $modelVehiculo = new Vehiculo();
        $modelUnitEnable->deletUnitEnable(0, 0, $id_unitActiva);
        $modelVehiculo->statePayVehicleOnOff(0, $id_vehiculo);
        return $this->getRespose([
            'success' => "Eliminado el vehiculo activado"
        ]);

    }

    public function id_select($id)
    {
        $ModelUnitEnable = new UnidadActiva();
        $date = $ModelUnitEnable->selectUnitEnableId($id);
        echo json_encode($date);
    }

    public function update_horario()
    {
        $id_unitEnable = $this->request->getPost('id_unitEnable');
        $horario = $this->request->getPost('horario');
        $ModelUnitEnable = new UnidadActiva();
        $date = $ModelUnitEnable->updateUnitEnable($horario, $id_unitEnable);

        if ($date) {
            echo json_encode(['success' => 'Horario actualizado', 'error' => '']);
        }

    }

    public function reporteUnidad()
    {

        $input = $this->getRequestInput($this->request);

        $idUnitActiva = $input['id_unitActiva'];
        $modelUnidadEnable = new UnidadActiva();
        $modelReporte = new Reportes();

        if ($input['reporte'] == 1) {


            $newReport = [
                'id_unitActiva' => $idUnitActiva,
                'estado' => 1,
                'descripcion' => $input['descripcion'],
                'id_operador' => session()->get('loggedUser'),
                'reporte' => $input['reporte']
            ];
            unset($input['descripcion']);

            $modelReporte->insert($newReport);
            $modelUnidadEnable->updateReporte($input, $idUnitActiva);
            return $this->getRespose([
                'success' => $input,
                'datos' => $newReport
            ]);
        } else {
            if (!empty($input['descripcion'])) {


                $newReport = [
                    'id_unitActiva' => $idUnitActiva,
                    'estado' => 1,
                    'descripcion' => $input['descripcion'],
                    'id_operador' => session()->get('loggedUser'),
                    'reporte' => $input['reporte']
                ];
                unset($input['descripcion']);

                $modelReporte->insert($newReport);
                $modelUnidadEnable->updateReporte($input, $idUnitActiva);
                return $this->getRespose([
                    'success' => $input,
                    'datos' => $newReport
                ]);
            } else {
                $error = [
                    'descripcion' => 'El campo descripción es obligatorio'
                ];
                echo json_encode(['success' => '', 'error' => $error]);
            }

        }


    }

    public function sellectAllUnitEnable()
    {
        date_default_timezone_set('America/Bogota');
        $horario = "";
        $fechaFin = date('H');
        if ($fechaFin >= 6 && $fechaFin < 14) {
            $horario = 2;
        } else if ($fechaFin >= 14 && $fechaFin < 22) {
            $horario = 3;
        } else {
            $horario = 1;
        }
        $modelUnidadEnable = new UnidadActiva();
        $unitEnable = $modelUnidadEnable->selectAllUnitEnable($horario);
        echo json_encode($unitEnable);
    }

    public function getVehicleEnableReport()
    {
        $modelUnidadActiva = new UnidadActiva();
        $query = $modelUnidadActiva->selectVehicleReporte();
        return $this->getRespose([
            'reporte' => $query
        ]);
    }
   //Function from delete all unit enable
    public function deleteFrequency()
    {
        $modelUnitEnable = new UnidadActiva();
        $modelVehiculo = new Vehiculo();
        $query = $modelUnitEnable->deleteFrequency();

        foreach ($query as $a) {

            $modelUnitEnable->deletUnitEnable(0, 0, $a['id_unitActiva']);
            $modelVehiculo->statePayVehicleOnOff(0, $a['id_vehiculo']);

        }

        return $this->getRespose([
            'success' => "Frequency update"
        ]);
    }


}
