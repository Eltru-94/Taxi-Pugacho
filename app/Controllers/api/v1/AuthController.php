<?php

namespace App\Controllers\Api\V1;

use App\Controllers\BaseController;
use \App\Models\Users;
class AuthController extends BaseController
{
    public function index()
    {
        $ModelUser=new Users();
        echo json_encode($ModelUser->findAll());
    }
}
