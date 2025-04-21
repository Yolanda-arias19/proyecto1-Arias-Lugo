<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('contacto', 'Home::contacto');
$routes->get('consultas', 'Home::consultas');
$routes->get('catalogo_produc', 'Home::catalogo_produc');
$routes->get('terminosYusos', 'Home::terminosYusos');