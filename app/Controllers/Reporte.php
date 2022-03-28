<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reportes;
use App\Models\UnidadActiva;
use App\Models\Users;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte extends BaseController
{
    public function index()
    {
        //
    }

    public function reportUsers()
    {
        $datos = [
            'title' => "Reporte Usuarios"
        ];
        return view('reportes/reportUsers', $datos);
    }

    public function reportFrequency()
    {
        $datos = [
            'title' => "Reporte Frecuencia"
        ];
        return view('reportes/reportFrequency', $datos);
    }

    public function reportUnitEnable()
    {
        $datos = [
            'title' => "Reporte Usuarios"
        ];
        return view('reportes/reportUsers', $datos);
    }

    public function reportAssistance()
    {
        $modelReport = new Reportes();
        $query = $modelReport->getReportAssistance();
        $datos = [
            'title' => "Reporte Asistencia"
        ];
        return view('reportes/reportAssistance', $datos);
    }

    public function getReportAssistance()
    {
        $modelReport = new Reportes();
        $query = $modelReport->getReportAssistance();
        return $this->getRespose([
            $query
        ]);

    }

    public function importExcelReportAssistance()
    {
        $modelReport = new Reportes();
        $query = $modelReport->getReportAssistance();
        $fileName = 'assistance.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Unidad');
        $sheet->setCellValue('D1', 'Reporte');
        $sheet->setCellValue('E1', 'descripcion');
        $sheet->setCellValue('F1', 'Fecha creación');
        $count = 2;
        foreach ($query as $row) {
            $sheet->setCellValue('A' . $count, $row['nombre']);
            $sheet->setCellValue('B' . $count, $row['apellido']);
            $sheet->setCellValue('C' . $count, $row['unidad']);
            $sheet->setCellValue('D' . $count, $row['reporte']);
            $sheet->setCellValue('E' . $count, $row['descripcion']);
            $sheet->setCellValue('F' . $count, $row['created_at']);

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

    public function getReportUsers()
    {
        $modelUser = new Users();
        $query = $modelUser->getReportUser();
        return $this->getRespose([
            $query
        ]);

    }

    public function importExcelReportUsers()
    {

        $modelUser = new Users();
        $query = $modelUser->getReportUser();
        $fileName = 'users.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Cedula');
        $sheet->setCellValue('D1', 'Correo');
        $sheet->setCellValue('E1', 'Direccion');
        $sheet->setCellValue('F1', 'Rol');
        $sheet->setCellValue('G1', 'Telefono');
        $sheet->setCellValue('H1', 'Licencia');
        $sheet->setCellValue('I1', 'Fecha creación');
        $sheet->setCellValue('J1', 'Estado');
        $count = 2;
        foreach ($query as $row) {
            $sheet->setCellValue('A' . $count, $row['nombre']);
            $sheet->setCellValue('B' . $count, $row['apellido']);
            $sheet->setCellValue('C' . $count, $row['cedula']);
            $sheet->setCellValue('D' . $count, $row['correo']);
            $sheet->setCellValue('E' . $count, $row['direccion']);
            $sheet->setCellValue('F' . $count, $row['rol']);
            $sheet->setCellValue('G' . $count, $row['telefono']);
            $sheet->setCellValue('H' . $count, $row['licencia']);
            $sheet->setCellValue('I' . $count, $row['created_at']);
            $sheet->setCellValue('J' . $count, $row['estado']);
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

        exit;
    }

    public function getReportFrequency()
    {
        $modelUnidadesActivas = new UnidadActiva();
        $query = $modelUnidadesActivas->getReportUnitPay();
        return $this->getRespose([
            $query
        ]);

    }

    public function importExcelReportFrequency()
    {
        //print ("reporte excell");
        $modelUnidadesActivas = new UnidadActiva();
        $query = $modelUnidadesActivas->getReportUnitPay();
        $fileName = 'frequency.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Cedula');
        $sheet->setCellValue('D1', 'Correo');
        $sheet->setCellValue('E1', 'Placa');
        $sheet->setCellValue('F1', 'Unidad');
        $sheet->setCellValue('G1', 'Valor');
        $sheet->setCellValue('H1', 'Fecha');
        $count = 2;
        foreach ($query as $row) {
            $sheet->setCellValue('A' . $count, $row['nombre']);
            $sheet->setCellValue('B' . $count, $row['apellido']);
            $sheet->setCellValue('C' . $count, $row['cedula']);
            $sheet->setCellValue('D' . $count, $row['correo']);
            $sheet->setCellValue('E' . $count, $row['placa']);
            $sheet->setCellValue('F' . $count, $row['unidad']);
            $sheet->setCellValue('G' . $count, $row['valor']);
            $sheet->setCellValue('H' . $count, $row['dia'] . "/" . $row['mesId'] . "/" . $row['anio']);
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

        exit;

    }

    public function graphicFrequency()
    {
        $anio = date('y');
        $modelUnidadesActivas = new UnidadActiva();
        $query = $modelUnidadesActivas->sumMonth(2022);
        return $this->getRespose([
            $query
        ]);
    }
}
