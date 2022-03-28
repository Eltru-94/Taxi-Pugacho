<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Carreras;
use App\Models\UnidadActiva;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

//Type race service
    public function allRaceMade()
    {
        $ModelCarreras =new Carreras();
        $datos=$ModelCarreras->getRaceMade();
        return $this->getRespose([
           'carreras'=>$datos
        ]);
    }
    public function allRaceMadeImportExcel()
    {
        $ModelCarreras =new Carreras();
        $query=$ModelCarreras->getRaceMade();
        $fileName = 'allCarreras.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Unidad');
        $sheet->setCellValue('B1', 'Carrera');
        $sheet->setCellValue('C1', 'Tipo');
        $sheet->setCellValue('D1', 'Telefono officina');
        $sheet->setCellValue('E1', 'Telefono cliente');
        $sheet->setCellValue('F1', 'Horara Inicio');
        $sheet->setCellValue('G1', 'Fecha Fin');
        $sheet->setCellValue('H1', 'Dirección Origen');
        $sheet->setCellValue('I1', 'Dirección Destino');
        $sheet->setCellValue('J1', 'Descripción');
        $count = 2;
        foreach ($query as $row) {
            $sheet->setCellValue('A' . $count, $row['unidad']);
            $sheet->setCellValue('B' . $count, $row['qualify']);
            $sheet->setCellValue('C' . $count, $row['servicio']);
            $sheet->setCellValue('D' . $count, $row['telefono']);
            $sheet->setCellValue('E' . $count, $row['telefono_cliente']);
            $sheet->setCellValue('F' . $count, $row['dateInicio']);
            $sheet->setCellValue('G' . $count, $row['dateFin']);
            $sheet->setCellValue('H' . $count, $row['direccion_origen']);
            $sheet->setCellValue('I' . $count, $row['direccion_destino']);
            $sheet->setCellValue('J' . $count, $row['descripcion']);


            $count++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($fileName));
        flush();

        readfile($fileName);

    }

//Type race service
    public function getTipoCarrera()
    {
        $ModelCarreras =new Carreras();
        $datos=$ModelCarreras->getServicios(1);
        echo json_encode($datos);
    }
 // new create Store carrerra  origen
    public  function  storeOrigen(){

        $validation = \Config\Services::validation();
        if (!$this->validate('carreraOrigen')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error'=>$errors,
            ]);
        }
            $input=$this->getRequestInput($this->request);
            $input['estado']=1;
            $input['carrera']=1;
            $modelCarrera=new Carreras();
            $query=$modelCarrera->insert($input);
            return $this->getRespose([
                'success'=>'Esperando vehiculo',
            ]);


    }
// delete race by id race
    public function deletCarrera($id){

        $modelCarrera=new Carreras();
        $modelCarrera->delet($id);
        return $this->getRespose([
            'success'=>'Carrera Eliminada..!!',
        ]);
    }

    public function carreras()
    {
        $datos=[
            'title'=>'Carreras en Ejecución'
        ];

        return view('central/carreras/index',$datos);
    }

    public function allCarrerasEnable(){

        $modelCarreras =new Carreras();
        $datos=$modelCarreras->allCarrerasOrigen();
        return $this->getRespose([
            'carrera'=>$datos,
        ]);
    }

    public function allCarrerasActivadas(){

        $modelCarreras =new Carreras();
        $datos=$modelCarreras->getCarrerasActivadas();
        return $this->getRespose([
            'carrera'=>$datos,
        ]);
    }

    public function allCarrerasDisable(){

        $ModelCarreras =new Carreras();
        $query=$ModelCarreras->getCarrerasEnables(1);
        echo json_encode($query);
    }

    public  function  qualifyCarrera(){

        $input=$this->getRequestInput($this->request);
        $id_carrera=$input['id_carrera'];
        $id_unitActiva=$input['id_unitActiva'];
        $input['dateFin']=date('Y-m-d H:i:s');
        $input['carrera']=3;
        $modelCarreras=new Carreras();
        $modelActiva=new UnidadActiva();
        $modelCarreras->updateDestino($input,$id_carrera);
        $modelActiva->stateCarrera(1,$id_unitActiva);
        $modelCarreras->updateDestino($input,$id_carrera);
        return $this->getRespose([
            'success'=>"Carrera calificada"
        ]);

    }


    public  function  selectIdCarrera(){

        $id_carrera=$this->request->getPost('id_carrera');
        $ModelCarrera =new Carreras();
        $carrera=$ModelCarrera->selectIdCarrera($id_carrera);
        echo  json_encode($carrera);
    }

    public function updateDestino(){

        $validation = \Config\Services::validation();
        if (!$this->validate('carreraDestino')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
               'error'=>$errors
            ]);
        }
        $input=$this->getRequestInput($this->request);
        $input['dateInicio']= date('Y-m-d H:i:s');
        $id_carrera=$input['id_carrera'];
        $id_unitActiva=$input['id_unitActiva'];
        $input['carrera']=2;
        unset($input['id_carrera']);
        $modelCarreras=new Carreras();
        $modelActiva=new UnidadActiva();
        $modelCarreras->updateDestino($input,$id_carrera);
        $modelActiva->stateCarrera(2,$id_unitActiva);

        return  $this->getRespose([
           'success'=>'Vehiculo asignado a la carrera'
        ]);
    }
    public function update(){

        $validation = \Config\Services::validation();
        if (!$this->validate('carreraUpdate')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error'=>$errors
            ]);
        }
        $input=$this->getRequestInput($this->request);
        $id_carrera=$input['id_carreraUpdate'];
        unset($input['id_carreraUpdate']);
        $modelCarreras=new Carreras();
        $modelCarreras->updateDestino($input,$id_carrera);

        return  $this->getRespose([
            'success'=>"Carrera Actualizada con exito..!!"
        ]);
    }

    public function total_race_day(){
        $input=$this->getRequestInput($this->request);
        $day = date('d');
        $month = date('m');
        $modelCarreras=new Carreras();
        $query=$modelCarreras->total_race_day($day,$month,$input['qualify']);
        return $this->getRespose([
            "Total_race_day"=>$query[0]['TOTAL'],
        ]);
    }


}
