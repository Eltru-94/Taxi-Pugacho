<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadActiva;
use App\Models\Vehiculo;

class FrecuenciaController extends BaseController
{
    public function index()
    {
        $a = date('m');
        $datos = [
            'title' => 'Frecuencia' . ' ' . nameMonth($a)
        ];

        return view('caja/index', $datos);
    }

    public function printBill($id = null)
    {

        $modelVehiculo = new Vehiculo();
        $vehicle = $modelVehiculo->getVehicleEnable($id);
        $a = date('m');
        $datos = [
            'title' => 'Factura',
            'vehicle' => $vehicle,
            'mes' => nameMonth($a)
        ];

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('caja/impresiones/frecuencia', $datos));
        $dompdf->setPaper('A5', 'landscape');
        $dompdf->render();
        $dompdf->stream("archivo_.pdf", array("Attachment" => 1));


    }

    public function getVehicleUser()
    {
        $validation = \Config\Services::validation();
        if (!$this->validate('searchIdetification')) {
            return $this->getRespose([
                'error' => $validation->getErrors()
            ]);
        }
        $cedula = $this->request->getPost('cedula');
        $modelVehicle = new Vehiculo();
        $query = $modelVehicle->getVehicleUserFroIdentification($cedula);
        $vehiclesUser = $query->getResultArray();
        if (count($vehiclesUser) != 0) {
            return $this->getRespose([
                'success' => 'lista',
                'vehicle' => $vehiclesUser
            ]);
        }
        return $this->getRespose([
            'error' => ['cedula' => 'Usuario no registrado']
        ]);
    }

    public function getIdVehicle($id = null)
    {
        $modelVehicle = new Vehiculo();
        $query = $modelVehicle->getVehicleUserFroId($id);
        return $this->getRespose([
            'vehicle' => $query
        ]);

    }

    public function storeVehicleEnable()
    {
        $input = $this->getRequestInput($this->request);
        $mes=date('m');
        $id_vehiculo = $input['id_vehiculo'];
        $input['id_operador'] = session()->get('loggedUser');
        $input['estado'] = 1;
        $input['horario'] = $input['id_servicio'];
        $input['carrera'] = 1;
        $input['reporte'] = 0;
        $input['mesId'] = $mes;
        $input['mesname'] = nameMonth($mes);
        $input['anio'] = date('y');
        $input['dia'] = date('d');
        $input['logitud'] ='0.23457';
        $input['latitud'] = '-78.26248';
        unset($input['id_servicio']);

        $modelUnitEnable = new UnidadActiva();
        $modelVehiculo = new Vehiculo();
        $modelUnitEnable->insert($input);
        $modelVehiculo->statePayVehicleOnOff(1, $id_vehiculo);

        return $this->getRespose(
            [
                'success' => "Unidad Pagada",
            ]
        );
    }

    function total()
    {
        $modelUnidadesActivas = new UnidadActiva();
        $query = $modelUnidadesActivas->frequencyTotal();
        /*return $this->getRespose([
            $query
        ]);*/
        echo json_encode($query);

    }

}
