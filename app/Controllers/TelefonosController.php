<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Telefonos;

class TelefonosController extends BaseController
{
    public function index()
    {
        $modelTelefono=new Telefonos();
        $telefonos=$modelTelefono->getTelefonos();
        echo json_encode($telefonos);
    }
}
