<?php

namespace App\Controllers;



class GeolocalizacionController extends BaseController
{
    public function index()
    {
     $datos=[
         'title'=>'Geolocalización'
     ];
     
     return view('geolocalizacion/index',$datos);
    }
}
