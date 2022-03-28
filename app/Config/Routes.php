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

$routes->get('/apiall', 'LoginController::index');
//Api User
$routes->post('/api/user/register', 'LoginController::register');
$routes->post('/api/login', 'LoginController::login');
$routes->post('/api/user/update', 'LoginController::updateUser');
$routes->post('/users/updateUser', 'UsersController::updateUser');
$routes->get('/api/user/vehicles/(:num)', 'LoginController::vehiclesUser/$1');
$routes->post('/api/updateVehicleEnable', 'GeolocalizacionController::updateLocationVehicleEnable');


$routes->get('/auth/register', 'Auth::register');



$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {


    $routes->get('/administrador', 'Administrador::index');


    //Users
    $routes->get('/users', 'UsersController::index');
    $routes->post('/users/state', 'UsersController::enable');
    $routes->get('/users/locked', 'UsersController::locked');
    $routes->post('/users/delete', 'UsersController::delete');
    $routes->post('/users/create', 'UsersController::create');
    $routes->post('/users/update', 'UsersController::update');

    //$routes->get('/users/block', 'UsersController::block');

    $routes->post('/users/update_data', 'UsersController::update_data');
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
    $routes->post('vehiculo/enable', 'VehiculoController::enableVehiculo');
    $routes->get('vehiculo/alleliminar', 'VehiculoController::indexdelet');
    $routes->post('/vehiculo/update', 'VehiculoController::updatevehiculo');

//vehicle state enable
    $routes->post('/enableUnit', 'UnidadEnableController::enableUnit');
    $routes->post('/enableUnit/delet', 'UnidadEnableController::deletEnableUnit');
    $routes->get('/enableUnit/select/(:num)', 'UnidadEnableController::id_select/$1');
    $routes->post('/enableUnit/update', 'UnidadEnableController::update_horario');
    $routes->post('/enableUnit/reporte', 'UnidadEnableController::reporteUnidad');
    $routes->get('/enableUnit/selectAllUnitEnable', 'UnidadEnableController::sellectAllUnitEnable');
    $routes->get('/enableUnit/selectReport', 'UnidadEnableController::getVehicleEnableReport');
    $routes->get('/enableUnit/Report', 'UnidadEnableController::index');
    $routes->post('/enableUnit/all', 'UnidadEnableController::allUnitEnable');
    $routes->get('/enableUnit/deleteFrequency', 'UnidadEnableController::deleteFrequency');

//Carreras
    $routes->get('/', 'Home::index');
    $routes->get('/carreras', 'CarrerasController::index');
    $routes->get('/carreras/activadas', 'CarrerasController::carreras');
    $routes->get('/carreras/alldisable', 'CarrerasController::allCarrerasDisable');
    $routes->get('/carreras/state', 'CarrerasController::stateCarreras');
    $routes->get('/carreras/tipocarrera', 'CarrerasController::getTipoCarrera');
    $routes->post('/carreras/selectId', 'CarrerasController::selectIdCarrera');
    $routes->get('/carreras/allRaceMadeImportExcel', 'CarrerasController::allRaceMadeImportExcel');
    $routes->get('/carreras/allenable', 'CarrerasController::allCarrerasEnable');
    $routes->get('/carreras/allActivadas', 'CarrerasController::allCarrerasActivadas');
    $routes->post('/carreras/storeOrigen', 'CarrerasController::storeOrigen');
    $routes->get('/carreras/allRaceMade', 'CarrerasController::allRaceMade');
    $routes->get('/carreras/delet/(:num)', 'CarrerasController::deletCarrera/$1');
    $routes->post('/carreras/updateDestino', 'CarrerasController::updateDestino');
    $routes->post('/carreras/qualify', 'CarrerasController::qualifyCarrera');
    $routes->post('/carreras/update', 'CarrerasController::update');
    $routes->post('/carreras/total_race_day', 'CarrerasController::total_race_day');


//Frecuencia
    $routes->get('/frecuencia', 'FrecuenciaController::index');
    $routes->post('/frecuencia/getVehicleUser', 'FrecuenciaController::getVehicleUser');
    $routes->post('/frecuencia/storeVehicleEnable', 'FrecuenciaController::storeVehicleEnable');
    $routes->get('/frecuencia/selectIdVehicle/(:num)', 'FrecuenciaController::getIdVehicle/$1');
    $routes->get('/frecuencia/printFactura/(:num)', 'FrecuenciaController::printBill/$1');
    $routes->get('/frecuencia/total', 'FrecuenciaController::total');

//Geolocalizacion
    $routes->get('/geolocalizacion', 'GeolocalizacionController::index');
    $routes->get('/geolocalizacion/vehicleEnable', 'GeolocalizacionController::locationVehicleEnable');
    $routes->post('/geolocalizacion/updateVehicleEnable', 'GeolocalizacionController::updateLocationVehicleEnable');

//Telefonos
    $routes->get('/telefonos/getAll', 'TelefonosController::index');

//Profile
    $routes->get('/profile/vehicleEnable', 'Profile::vehicleEnable');
    $routes->get('/profile/viewVehicleEnable', 'Profile::viewVehicleEnable');
    $routes->get('/profile/viewVehicleDisable', 'Profile::viewVehicleDisable');
    $routes->get('/profile/vehicleDisable', 'Profile::vehicleDisable');
    $routes->get('/profile/editUser', 'Profile::index');
    $routes->get('/profile/editUser', 'Profile::index');

//Reportes
    $routes->get('/reports/users', 'Reporte::reportUsers');
    $routes->get('/reports/getUsers', 'Reporte::getReportUsers');
    $routes->get('/reports/assistance', 'Reporte::reportAssistance');
    $routes->get('/reports/getAssistance', 'Reporte::getReportAssistance');
    $routes->get('/reports/frequency', 'Reporte::reportFrequency');
    $routes->get('/reports/getFrequency', 'Reporte::getReportFrequency');
    $routes->get('/reports/frequencyExcel', 'Reporte::importExcelReportFrequency');
    $routes->get('/reports/usersExcel', 'Reporte::importExcelReportUsers');
    $routes->get('/reports/assistanceExcel', 'Reporte::importExcelReportAssistance');
    $routes->get('/reports/graphicFrequency', 'Reporte::graphicFrequency');

    //Operadores
    $routes->get('/operadores', 'Operador::index');

    $routes->get('/operadores/selectForId/(:num)', 'Operador::selectForId/$1');
    $routes->post('/operadores/create', 'Operador::store');
    $routes->post('/operadores/update', 'Operador::update');

});

$routes->get('/operadores/select', 'Operador::select');
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
