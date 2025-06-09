<body>
<header>
  <?php
  $session = session();
  $nombre = $session->get('nombre');
  $perfil = $session->get('perfil_id'); ?>

<!--Navegador-->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand me-auto" href="<?php echo base_url('/');?>">
      <img src="assets\img\logo.jpg" alt="Logo" width="56" height="56" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">V&V</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
<!--Barra de navegación admin-->
    <?php if($perfil == 1): ?>
      <div class="nombre-log"><a href="">USUARIO: <?php echo session('nombre'); ?></a></div>
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('quienes_somos');?>">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('contacto');?>">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('consultas');?>">Consultas</a>
          </li>
          <!--Menu desplegable categorias-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catálogo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'0');?>">Todos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'1'); ?>">Tortas de dos pisos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'2'); ?>">Tortas medianas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'3'); ?>">Tortas de kilos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'4'); ?>">Mini tortas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'5'); ?>">Tortas tamaño hamburguesa</a></
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'6');?>">Postres</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'7');?>">Tartas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'8');?>">Alfajores</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'9');?>">Cupcakes</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'10');?>">Galletas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'11');?>">Donas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'12');?>">Mesa de dulces</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable categorias-->

          <!--Menu desplegable de operaciones del admin-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Operaciones Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('abm_usuario'.'todos'); ?>">CRUD usuarios</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('abm_producto'.'todos'); ?>">CRUD productos</a></li>
              <li><a class="dropdown-item" href="#">Muestra ventas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('mostrarMensajes'.'todos'); ?>">Consultas</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable operacines admin-->
        </ul>


      <!--Aca es la del cliente-->
      <?php elseif($perfil == 2): ?>
        <div class="nombre-log"><a href="">CLIENTE: <?php echo session('nombre'); ?></a></div>
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('quienes_somos');?>">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('contacto');?>">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('consultas');?>">Consultas</a>
          </li>
<!--Menu desplegable-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catálogo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'0');?>">Todos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'1'); ?>">Tortas de dos pisos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'2'); ?>">Tortas medianas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'3'); ?>">Tortas de kilos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'4'); ?>">Mini tortas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'5'); ?>">Tortas tamaño hamburguesa</a></
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'6');?>">Postres</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'7');?>">Tartas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'8');?>">Alfajores</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'9');?>">Cupcakes</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'10');?>">Galletas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'11');?>">Donas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'12');?>">Mesa de dulces</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable-->
        </ul>

      <!--Si no es ninguno de los dos-->
      <?php else: ?>

        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('quienes_somos');?>">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('contacto');?>">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="<?php echo base_url('consultas');?>">Consultas</a>
          </li>
<!--Menu desplegable-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catálogo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'0');?>">Todos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'1'); ?>">Tortas de dos pisos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'2'); ?>">Tortas medianas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'3'); ?>">Tortas de kilos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'4'); ?>">Mini tortas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'5'); ?>">Tortas tamaño hamburguesa</a></
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'6');?>">Postres</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'7');?>">Tartas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'8');?>">Alfajores</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'9');?>">Cupcakes</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'10');?>">Galletas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'11');?>">Donas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('catalogo_produc'.'12');?>">Mesa de dulces</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable-->
        </ul>
                <?php endif; ?>
      </div>
    </div>
          <div class="icono_cart">
            <?php if($perfil !=1): ?>
            <a href=""><ion-icon name="cart-outline"></ion-icon></a>
            <?php endif; ?>
          </div>
          <div class="d-flex">
                <?php if (empty($nombre)): ?>
                      <a class="btnLogin-popup" href="<?php echo base_url('login');?>">Iniciar sesión</a>
                    <?php else: ?>
                      <a class="btnLogin-popup" href="<?php echo base_url('logout');?>">Cerrar sesión</a>
                <?php endif; ?>
                </div>
  </div>
</nav>

</header>
