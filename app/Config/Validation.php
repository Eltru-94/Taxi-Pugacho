<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use \App\Validation\CustomRules;



class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    

    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        CustomRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $user=[
        'nombre'=>'required|alpha_space',
        'apellido'=>'required|alpha_space',
        'cedula'=>'required',
        'telefono'=>'required',
        'fechanacimiento'=>'required',
        'genero'=>'required',
        'licencia'=>'required',
        'direccion'=>'required',
        'correo'=>'required|valid_email',
        'password'=>'required|min_length[5]|max_length[12]',
        'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]'
    ];

    public $userupdate=[
        'nombre'=>'required|alpha_space',
        'apellido'=>'required|alpha_space',
        'cedula'=>'required',
        'telefono'=>'required',
        'fechanacimiento'=>'required',
        'genero'=>'required',
        'licencia'=>'required',
        'direccion'=>'required',
        'correo'=>'required|valid_email'
    ];

    public $rol=[
        'rol'=>'required|alpha_space|is_unique[roles.rol]',
        'descripcion'=>'required',
    ];


    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}