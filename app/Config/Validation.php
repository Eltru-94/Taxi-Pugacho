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
        'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]',
        'imagen'=>'uploaded[imagen]|max_size[imagen,255]|is_image[imagen]',
        'roles'=>'required',
    ];

    public $userupdate=[
        'nombre'=>'required|alpha_space',
        'apellido'=>'required|alpha_space',
        'cedula'=>'required',
        'telefono'=>'required',
        'fechanacimiento'=>'required',
        'genero'=>'required',
        'roles'=>'required',
        'licencia'=>'required',
        'direccion'=>'required',
        'correo'=>'required|valid_email',
        'imagen'=>'uploaded[imagen]|max_size[imagen,255]|is_image[imagen]',
        'roles'=>'required',
    ];

    public $rol=[
        'rol'=>'required|alpha_space|is_unique[roles.rol]',
        'descripcion'=>'required',
    ];
    public $searchID=[

        'cedula'=>'required|exact_length[10]|cedula'
    ];
    public $vehiculo=[

        'imagen1'=>'uploaded[imagen1]|max_size[imagen1,255]|is_image[imagen1]',
        'imagen2'=>'uploaded[imagen2]|max_size[imagen2,255]|is_image[imagen2]',
        'imagen3'=>'uploaded[imagen3]|max_size[imagen3,255]|is_image[imagen3]',
        'placa'=>'required|is_unique[vehiculo.placa]',
        'marca'=>'required',
        'modelo'=>'required',
        'fechafabricacion'=>'required',
        'unidad'=>'required|is_natural|is_unique[vehiculo.unidad]',
        'kilometraje'=>'required|is_natural',
    ];

    public $unitEnable=[
        'unidad'=>'is_natural',
        'horario'=>'is_natural'
    ];

    public $carrera=[
        'origen'=>'required',
        'destino'=>'required',
        'telefono'=>'required',
        'carrera'=>'required',
    ];


    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}