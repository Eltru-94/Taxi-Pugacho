<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\Vehiculo;

class VehiculoController extends BaseController
{
    public function index()
    {
        $datos = [
            'title' => "Vehículo"
        ];
        return view('unidades/vehiculo/index', $datos);
    }

    public function indexdelet()
    {
        $datos = [
            'title' => "Vehiculo Eliminado"
        ];
        return view('unidades/vehiculo/indexdelet', $datos);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $placa = $this->request->getPost('placa');
        $marca = $this->request->getPost('marca');
        $modelo = $this->request->getPost('modelo');
        $id_user = $this->request->getPost('id_user');
        $fechafabricacion = $this->request->getPost('fechafabricacion');
        $image1 = $this->request->getFile('imagen1');
        $image2 = $this->request->getFile('imagen2');
        $image3 = $this->request->getFile('imagen3');
        $unidad = $this->request->getPost('unidad');
        $color = $this->request->getPost('color');


        if (!$this->validate('vehiculo')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' => $errors]);
        } else {

            $newName1 = $image1->getRandomName();
            $image1->move(ROOTPATH . '/public/vehiculos', $newName1);

            $newName2 = $image2->getRandomName();
            $image2->move(ROOTPATH . '/public/vehiculos', $newName2);

            $newName3 = $image3->getRandomName();
            $image3->move(ROOTPATH . '/public/vehiculos', $newName3);

            $newVehiculo = [
                'placa' => $placa,
                'fechafabricacion' => $fechafabricacion,
                'marca' => $marca,
                'modelo' => $modelo,
                'imagen1' => $newName1,
                'imagen2' => $newName2,
                'imagen3' => $newName3,
                'id_user' => $id_user,
                'estado' => 1,
                'unidad' => $unidad,
                'color' => $color,
                'pago' => 0
            ];

            $vehiculoModel = new Vehiculo();
            $query = $vehiculoModel->insert($newVehiculo);
            if ($query) {
                echo json_encode(['success' => 'vehiculo registrado exitosamente..!!', 'error' => '']);
            } else {
                echo json_encode(['success' => '', 'error' => $newVehiculo]);
            }


        }
    }


    public function fetch()
    {
        $estado = $this->request->getPost('estado');
        $estadoVehiculo = $this->request->getPost('estadoVehiculo');
        $vehiculoModel = new Vehiculo();
        $datos = $vehiculoModel->getVehiculo($estado, $estadoVehiculo);
        echo json_encode($datos);
    }

    public function getVehiculoUser()
    {
        $id_vehiculo = $this->request->getPost('id_vehiculo');
        $estado = $this->request->getPost('estado');
        $vehiculoModel = new Vehiculo();
        $datos = $vehiculoModel->getVehiculoUSer($estado, $id_vehiculo);
        echo json_encode($datos);
    }

    public function vehiculoDetails($id_vehiculo = null)
    {

        $vehiculoModel = new Vehiculo();
        $datos = $vehiculoModel->getVehiculoUSer(1, $id_vehiculo);

        $vehiculoUser = [
            'title' => "Vehiculo",
            'vehiculoUser' => $datos
        ];

        return view('unidades/detailsVehiculo', $vehiculoUser);


    }


    public function activateUnidad()
    {

        $vehiculoUser = [
            'title' => "Unidades activas"
        ];

        return view('unidades/activateUnidad', $vehiculoUser);

    }

    public function deletVehiculo()
    {
        $estado = $this->request->getPost('estado');
        $id_vehiculo = $this->request->getPost('id_vehiculo');

        $vehiculoModel = new Vehiculo();
        $query = $vehiculoModel->deletVehiculo($estado, $id_vehiculo);
        if ($query) {
            echo json_encode(['success' => 'vehiculo eliminado..!!', 'error' => '']);
        }
    }

    public function enableVehiculo()
    {
        $estado = $this->request->getPost('estado');
        $id_vehiculo = $this->request->getPost('id_vehiculo');

        $vehiculoModel = new Vehiculo();
        $query = $vehiculoModel->deletVehiculo($estado, $id_vehiculo);
        if ($query) {
            echo json_encode(['success' => 'vehiculo Activado..!!', 'error' => '']);
        }
    }

    public function updatevehiculo()
    {
        $validation = \Config\Services::validation();
        if (!$this->validate('updatevehiculo')) {
            $errors = $validation->getErrors();
            echo json_encode(['success' => '', 'error' => $errors]);
        } else {
            $placa = $this->request->getPost('placa');
            $marca = $this->request->getPost('marca');
            $modelo = $this->request->getPost('modelo');
            $id_vehiculo = $this->request->getPost('id_vehiculo');
            $fechafabricacion = $this->request->getPost('fechafabricacion');
            $unidad = $this->request->getPost('unidad');
            $color = $this->request->getPost('color');
            $image1 = $this->request->getFile('imagen1');
            $image2 = $this->request->getFile('imagen2');
            $image3 = $this->request->getFile('imagen3');
            $newName1 = $image1->getRandomName();
            $image1->move(ROOTPATH . '/public/vehiculos', $newName1);

            $newName2 = $image2->getRandomName();
            $image2->move(ROOTPATH . '/public/vehiculos', $newName2);

            $newName3 = $image3->getRandomName();
            $image3->move(ROOTPATH . '/public/vehiculos', $newName3);

            $vehiculoModel = new Vehiculo();
            $query = $vehiculoModel->updateVehiculo($id_vehiculo, $placa, $marca, $modelo, $fechafabricacion, $unidad, $color,$newName1,$newName2,$newName3);
            if ($query) {
                echo json_encode(['success' => 'Vehiculo Actualizado', 'error' => '']);
            }

        }

    }





}