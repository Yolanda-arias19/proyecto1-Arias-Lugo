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
$routes->get('catalogo_produc(:any)', 'producto_controller::mostrarCatalogo/$1');

$routes->get('terminosYusos', 'Home::terminosYusos');

/**rutas del registro de usuario */
$routes->post('/enviar-form', 'Usuario_controller::formValidation', ['filter' => 'visitantes']);
$routes->get('registrarse', 'Usuario_controller::registrarse', ['filter' => 'visitantes']);

/**rutas para el login */
$routes->post('/enviarlogin', 'login_controller::auth', ['filter' => 'visitantes']);
$routes->get('/logout', 'login_controller::logout', ['filter' => 'auth']);
$routes->get('login', 'login_controller::login', ['filter' => 'visitantes']);


//other routes
$routes->get('abm_producto(:any)', 'producto_controller::mostrarProductos/$1', ['filter' => 'admin']);
$routes->get('bajaProducto(:num)', 'producto_controller::deleteproducto/$1', ['filter' => 'admin']);
$routes->get('activarProducto(:num)', 'producto_controller::activarproducto/$1', ['filter' => 'admin']);
$routes->get('altaProducto', 'producto_controller::creaProducto', ['filter' => 'admin']);
$routes->post('enviar-prod', 'producto_controller::store', ['filter' => 'admin']);
$routes->get('editar_prod(:num)', 'producto_controller::singleProducto/$1', ['filter' => 'admin']);
$routes->post('modificarProducto(:num)', 'producto_controller::modificaProducto/$1', ['filter' => 'admin']);


$routes->post('enviar-form-consultas', 'consulta_controller::validarMensajeConsultas');
$routes->get('mostrarMensajes(:any)', 'consulta_controller::mostrarMensajes/$1', ['filter' => 'admin']);
$routes->get('marcarLeido(:num)', 'consulta_controller::marcarLeido/$1', ['filter' => 'admin']);

$routes->get('abm_usuario(:any)', 'usuario_controller::mostrarABM/$1', ['filter' => 'admin']);
$routes->get('bajaUsuario(:num)', 'usuario_controller::bajaUsuario/$1', ['filter' => 'admin']);
$routes->get('activarUsuario(:num)', 'usuario_controller::activarUsuario/$1', ['filter' => 'admin']);
