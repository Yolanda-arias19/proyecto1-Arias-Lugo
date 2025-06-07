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
//$routes->get('/registrarse', 'Home::registrarse');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('registrarse', 'Usuario_controller::registrarse');

/**rutas para el login */
//$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin', 'login_controller::auth');
//$routes->get('/panel', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'login_controller::logout');

$routes->get('login', 'login_controller::login');


//other routes
$routes->get('abm_producto(:any)', 'producto_controller::mostrarProductos/$1');
$routes->get('bajaProducto(:num)', 'producto_controller::deleteproducto/$1');
$routes->get('activarProducto(:num)', 'producto_controller::activarproducto/$1');
$routes->get('altaProducto', 'producto_controller::creaProducto');
$routes->post('enviar-prod', 'producto_controller::store');


$routes->post('enviar-form-consultas', 'consulta_controller::validarMensajeConsultas');
$routes->get('mostrarMensajes(:any)', 'consulta_controller::mostrarMensajes/$1');
$routes->get('marcarLeido(:num)', 'consulta_controller::marcarLeido/$1');

$routes->get('abm_usuario(:any)', 'usuario_controller::mostrarABM/$1');
$routes->get('bajaUsuario(:num)', 'usuario_controller::bajaUsuario/$1');
$routes->get('activarUsuario(:num)', 'usuario_controller::activarUsuario/$1');
