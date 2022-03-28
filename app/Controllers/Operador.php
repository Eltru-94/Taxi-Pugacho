<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Operadores;

class Operador extends BaseController
{
    public function index()
    {
        $datos = [
            'title' => "Reporte Operadores"
        ];
        return view('reportes/asistencia-operador/index', $datos);
    }

    public function selectForId($id)
    {
        $modelOperador = new Operadores();
        $query = $modelOperador->selectForIdUser($id);
        if (count($query) == 0) {
            $query[0] = 0;
        } else {
            $query[0] = 1;
        }
        return $this->getRespose([
            'estado' => $query[0]
        ]);
    }

    public function store()
    {

        $validation = \Config\Services::validation();
        if (!$this->validate('operador')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }
        $input = $this->getRequestInput($this->request);
        $input['estado'] = 1;
        $input['horafin'] = date('Y-m-d H:i:s');
        $modelOperador = new Operadores();
        $query = $modelOperador->insert($input);
        return $this->getRespose([
            'success' => "Operador registrado"
        ]);
    }

    public function update()
    {

        $input = $this->getRequestInput($this->request);
        $id_user = $input['id_user'];
        $modelOperador = new Operadores();
        $query = $modelOperador->selectForIdUser($id_user);
        $id_operador = $query[0]['id_operador'];
        $input['horafin'] = date('Y-m-d H:i:s');
        unset($input['id_user']);
        $modelOperador->update($id_operador, $input);
        return $this->getRespose([
            'success' => "Turno Finalizado"
        ]);
    }


    public function select()
    {

        $modelOperador = new Operadores();
        $query = $modelOperador->selectOperadores();

        return $this->getRespose([
            'operadores' => $query
        ]);
    }
}
