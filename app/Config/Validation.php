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
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $user = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required|is_unique[users.cedula]|cedula',
        'telefono' => 'required|is_unique[users.telefono]',
        'fechanacimiento' => 'required',
        'genero' => 'required',
        'licencia' => 'required',
        'direccion' => 'required',
        'correo' => 'is_unique[users.correo]|required|valid_email',
        'password' => 'required|min_length[5]|max_length[12]',
        'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]',
        'imagen' => 'uploaded[imagen]|max_size[imagen,255]|is_image[imagen]',
        'roles' => 'required',
    ];

    public $userupdate = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required|cedula',
        'telefono' => 'required',
        'fechanacimiento' => 'required',
        'genero' => 'required',
        'roles' => 'required',
        'licencia' => 'required',
        'direccion' => 'required',
        'correo' => 'required|valid_email',
    ];

    public $rol = [
        'rol' => 'required|is_unique[roles.rol]',
        'descripcion' => 'required',
    ];
    public $updaterol = [
        'rol' => 'required',
        'descripcion' => 'required',
    ];
    public $searchID = [

        'cedula' => 'required|exact_length[10]|cedula'
    ];
    public $vehiculo = [

        'imagen1' => 'uploaded[imagen1]|max_size[imagen1,255]|is_image[imagen1]',
        'imagen2' => 'uploaded[imagen2]|max_size[imagen2,255]|is_image[imagen2]',
        'imagen3' => 'uploaded[imagen3]|max_size[imagen3,255]|is_image[imagen3]',
        'placa' => 'required|is_unique[vehiculo.placa]',
        'marca' => 'required',
        'modelo' => 'required',
        'fechafabricacion' => 'required',
        'unidad' => 'required|is_natural|is_unique[vehiculo.unidad]',
        'color' => 'required',
    ];

    public $updatevehiculo = [
        'placa' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'fechafabricacion' => 'required',
        'unidad' => 'required',
        'color' => 'required',
        'imagen1' => 'uploaded[imagen1]|max_size[imagen1,255]|is_image[imagen1]',
        'imagen2' => 'uploaded[imagen2]|max_size[imagen2,255]|is_image[imagen2]',
        'imagen3' => 'uploaded[imagen3]|max_size[imagen3,255]|is_image[imagen3]',
    ];

    public $unitEnable = [
        'unidad' => 'is_natural',
        'horario' => 'is_natural'
    ];

    public $carreraOrigen = [
        'direccion_origen' => 'required'

    ];
    public $carreraDestino = [
        'direccion_destino' => 'required',
        'id_unitActiva' => 'required'
    ];
    public $carreraUpdate = [
        'direccion_destino' => 'required',
        'direccion_origen' => 'required',
        'telefono_cliente' => 'required'
    ];

    public $apiuser = [
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'is_unique[users.correo]|required|valid_email',
        'clave' => 'required|min_length[5]|max_length[12]',
        'cclave' => 'required|min_length[5]|max_length[12]|matches[clave]',
        'cedula' => 'required|cedula|is_unique[users.cedula]',
    ];
    public $apiuserupdate = [
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'required|valid_email',
        'cedula' => 'required|cedula',
    ];
    public $login = [
        'correo' => 'required|valid_email',
        'clave' => 'required|min_length[5]|max_length[12]'
    ];
    public $task = [
        'task' => 'required',
        'descripcion' => 'required'
    ];

    public $taskUpdate = [
        'task' => 'required',
        'descripcion' => 'required'
    ];

    public $agenda = [
        'nombre' => 'required',
        'telefono' => 'required',
        'direccion' => 'required'
    ];

    public $updateImagen = [
        'imagen' => 'uploaded[imagen]|max_size[imagen,255]|is_image[imagen]'
    ];

    public $cliente = [
        'nombre' => 'required|alpha',
        'apellido' => 'required|alpha',
        'altura' => 'required',
        'peso' => 'required'
    ];


    public $searchIdetification = [
        'cedula' => 'required|numeric|min_length[10]|max_length[10]|cedula'
    ];

    public $loginUser = [
        'correo' => 'required|valid_email',
        'contrasenia' => 'required|min_length[5]|max_length[12]'
    ];

    public $operador = [
        'horario' => 'required|is_natural'
    ];


    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}