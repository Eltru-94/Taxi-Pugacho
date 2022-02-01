<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadActiva;

class Profile extends BaseController
{
    public function index()
    {
        $datos = [
            'title' => 'Editar Usuario'
        ];

        return view('profile/users/editUser', $datos);
    }

    public function viewVehicleEnable()
    {

        $datos = [
            'title' => 'Vehículos Activados'
        ];

        return view('profile/vehicleEnable/index', $datos);
    }
    public function viewVehicleDisable()
    {

        $datos = [
            'title' => 'Vehículos no Activados'
        ];

        return view('profile/vehicleDisable/index', $datos);
    }


    public function vehicleEnable()
    {
        $id=session()->get('loggedUser');
        $modelUnidadesActivas=new UnidadActiva();
        $query=$modelUnidadesActivas->getVehicleEnableForId($id);
        return $this->getRespose([
            $query
        ]);
    }

    public function vehicleDisable()
    {
        $id=session()->get('loggedUser');
        $modelUnidadesActivas=new UnidadActiva();
        $query=$modelUnidadesActivas->getVehicleDisableForId($id);
        return $this->getRespose([
            $query
        ]);
    }
}
