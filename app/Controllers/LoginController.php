<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class LoginController extends BaseController
{
    public function index()
    {
        $ModelUser=new Users();
        echo  json_encode($ModelUser->find());
    }
}
