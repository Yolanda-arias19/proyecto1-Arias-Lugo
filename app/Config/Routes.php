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

/**rutas del registro de usuario */
$routes->get('/registro', 'Home::registrarse');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

/**rutas para el login */
//$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

$routes->get('login', 'Login_controller::login');