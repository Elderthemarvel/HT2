<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('ciudadanos', 'Home::ciudadanos');
$routes->get('ciudadanos/delete/(:num)', 'DeleteController::ciudadanos_delete/$1');
$routes->post('ciudadanos/save', 'CreateController::ciudadanos_save');
$routes->get('ciudadanos/edit/(:num)', 'Home::ciudadanos_edit/$1');
$routes->post('ciudadanos/update/(:num)', 'UpdateController::ciudadanos_update/$1');

$routes->get('departamentos', 'Home::departamentos');
$routes->get('departamentos/delete/(:num)', 'DeleteController::departamentos_delete/$1');
$routes->post('departamentos/save', 'CreateController::departamentos_save');
$routes->get('departamentos/edit/(:num)', 'Home::departamentos_edit/$1');
$routes->post('departamentos/update/(:num)', 'UpdateController::departamentos_update/$1');

$routes->get('municipios', 'Home::municipios');
$routes->get('municipios/delete/(:num)', 'DeleteController::municipios_delete/$1');
$routes->post('municipios/save', 'CreateController::municipios_save');
$routes->get('municipios/edit/(:num)', 'Home::municipios_edit/$1');
$routes->post('municipios/update/(:num)', 'UpdateController::municipios_update/$1');

$routes->get('niveles', 'Home::niveles');
$routes->get('niveles/delete/(:num)', 'DeleteController::niveles_delete/$1');
$routes->post('niveles/save', 'CreateController::niveles_save');
$routes->get('niveles/edit/(:num)', 'Home::niveles_edit/$1');
$routes->post('niveles/update/(:num)', 'UpdateController::niveles_update/$1');

$routes->get('regiones', 'Home::regiones');
$routes->get('regiones/delete/(:num)', 'DeleteController::regiones_delete/$1');
$routes->post('regiones/save', 'CreateController::regiones_save');
$routes->get('regiones/edit/(:num)', 'Home::regiones_edit/$1');
$routes->post('regiones/update/(:num)', 'UpdateController::regiones_update/$1');
