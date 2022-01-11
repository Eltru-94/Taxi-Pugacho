<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
use App\Controllers\Api\V1\AuthController;
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/* Ruta de loggin */

$routes->get('/api/allUser','Api\V1\AuthController::index');

$routes->post('/vehiculo/update', 'VehiculoController::updatevehiculo');
$routes->post('/carreras/selectId','CarrerasController::selectIdCarrera');
$routes->post('/carreras/dateUpdate','CarrerasController::updateDateCarrera');


$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {


    $routes->get('/administrador', 'Administrador::index');
    $routes->get('/auth/register', 'Auth::register');
    //Users
    $routes->get('/users', 'UsersController::index');
    $routes->get('/users/block', 'UsersController::block');
    $routes->post('/users/fetch', 'UsersController::fetch');
    $routes->post('/users/save', 'UsersController::save');
    $routes->post('/users/deleteUser', 'UsersController::delete');
    $routes->post('/users/update', 'UsersController::update');
    $routes->post('/users/updateUser', 'UsersController::updateUser');
    $routes->post('/users/searchID', 'UsersController::searchID');

    //Roles
    $routes->get('/roles', 'RolController::index');
    $routes->post('/roles/save', 'RolController::save');
    $routes->get('/roles/fetch', 'RolController::fetch');
    $routes->post('/roles/update', 'RolController::update');
    $routes->post('/roles/updateRol', 'RolController::updateRol');
    $routes->post('/roles/deleteRol', 'RolController::delete');
    //Funcionalidades
    $routes->get('/funcionalidad', 'FuncionalidadesController::index');
    $routes->get('/funcionalidad/fetch', 'FuncionalidadesController::fetch');
    $routes->post('/rolfunc', 'FuncionalidadesController::getRolFuncionalidad');
    $routes->post('/asigarRolFuncionalidad', 'RolFuncionalidadController::index');
    //Vehiculo
    $routes->post('/vehiculo/fetch', 'VehiculoController::fetch');
    $routes->get('/vehiculo', 'VehiculoController::index');
    $routes->get('/vehiculo/details/(:num)', 'VehiculoController::vehiculoDetails/$1');
    $routes->get('/vehiculo/activar', 'VehiculoController::activateUnidad');
    $routes->post('/vehiculo/vehiculouser', 'VehiculoController::getVehiculoUser');
    $routes->post('/vehiculo/create', 'VehiculoController::create');
    $routes->post('/vehiculo/delet', 'VehiculoController::deletVehiculo');
    $routes->post('vehiculo/enable','VehiculoController::enableVehiculo');
    $routes->get('vehiculo/alleliminar','VehiculoController::indexdelet');

    $routes->post('/enableUnit','UnidadEnableController::enableUnit');
    $routes->post('/enableUnit/all','UnidadEnableController::allUnitEnable');

    $routes->get('/enableUnit/delet/(:num)', 'UnidadEnableController::deletEnableUnit/$1');
    $routes->get('/enableUnit/select/(:num)', 'UnidadEnableController::id_select/$1');
    $routes->post('/enableUnit/update', 'UnidadEnableController::update_horario');

    //Carreras
    
    $routes->get('/', 'Home::index');
    $routes->get('/carreras','CarrerasController::index');
    $routes->post('/carreras/store','CarrerasController::store');
    $routes->get('/carreras/activadas','CarrerasController::carreras');
    $routes->get('/carreras/allenable','CarrerasController::allCarrerasEnable');
    $routes->get('/carreras/alldisable','CarrerasController::allCarrerasDisable');
    $routes->post('/carreras/updatecarrera','CarrerasController::updateCarrera');
    $routes->get('/carreras/state','CarrerasController::stateCarreras');
    $routes->post('/carreras/all','CarrerasController::allUnitEnableCarreras');
    $routes->get('/carreras/tipocarrera','CarrerasController::getTipoCarrera');
    //Frecuencia
    $routes->get('/frecuencia','FrecuenciaController::index');
    //Geolocalizacion 
    $routes->get('/geolocalizacion', 'GeolocalizacionController::index');

    
});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('/auth', 'Auth::index');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
