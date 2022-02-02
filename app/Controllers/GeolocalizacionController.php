<?php

namespace App\Controllers;


use App\Models\UnidadActiva;
use App\Models\Vehiculo;

class GeolocalizacionController extends BaseController
{
    public function index()
    {
        $datos = [
            'title' => 'Geolocalización'
        ];

        return view('geolocalizacion/index', $datos);

    }


    public function locationVehicleEnable()
    {

        $modelVehicle = new Vehiculo();
        $query = $modelVehicle->selectLocation();
        return $this->getRespose([
            'location' => $query
        ]);
    }

    public function updateLocationVehicleEnable()
    {
        $input = $this->getRequestInput($this->request);
        $id_user = $input['id_user'];
        $modelVehicle = new Vehiculo();
        $modelUnidadActiva=new UnidadActiva();
        $query = $modelVehicle->selectLocationForId($id_user);
        $id_unitActiva=$query[0]['id_unitActiva'];
        if($id_unitActiva){
            unset($input['id_user']);
            $modelUnidadActiva->updateLocation($input,$id_unitActiva);
            return $this->getRespose([
                'message' => 'location update'
            ]);
        }
        return $this->getRespose([
            'message' => 'location not update'
        ]);

    }

}
