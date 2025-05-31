<body>
<header>
  <?php
  $session = session();
  $nombre = $session->get('nombre');
  $perfil = $session->gwt('perfil_id'); ?>

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

<!--Barra de navegación admin-->
    <?php if($perfil == 1): ?>
      <div class="btn btn-info active btnUser btn-sm"><a href="">USUARIO: <?php echo session('nombre'); ?></a></div>
        <div class="offcanvas-body">
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
              Categorías
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tortas</a></li>
              <li><a class="dropdown-item" href="#">Postres</a></li>
              <li><a class="dropdown-item" href="#">Tartas</a></li>
              <li><a class="dropdown-item" href="#">Alfajores</a></li>
              <li><a class="dropdown-item" href="#">Cupcakes</a></li>
              <li><a class="dropdown-item" href="#">Galletas</a></li>
              <li><a class="dropdown-item" href="#">Donas</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable categorias-->

          <!--Menu desplegable de operaciones del admin-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Operaciones Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">CRUD usuarios</a></li>
              <li><a class="dropdown-item" href="#">CRUD productos</a></li>
              <li><a class="dropdown-item" href="#">Muestra ventas</a></li>
              <li><a class="dropdown-item" href="#">Consultas</a></li>
              <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable operacines admin-->
        </ul>
      </div>













      <!--Aca es la del cliente-->
      <?php elseif($perfil == 2): ?>
        <div class="btn btn-info active btnUser btn-sm"><a href="">CLIENTE: <?php echo session('nombre'); ?></a></div>

      <!--Si no es ninguno de los dos-->
<!--original-->
      <div class="offcanvas-body">
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
              Categorías
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tortas</a></li>
              <li><a class="dropdown-item" href="#">Postres</a></li>
              <li><a class="dropdown-item" href="#">Tartas</a></li>
              <li><a class="dropdown-item" href="#">Alfajores</a></li>
              <li><a class="dropdown-item" href="#">Cupcakes</a></li>
              <li><a class="dropdown-item" href="#">Galletas</a></li>
              <li><a class="dropdown-item" href="#">Donas</a></li>
            </ul>
          </li>
          <!--Fin del menu desplegable-->
        </ul>
      </div>
    </div>
      <a class="btnLogin-popup" href="<?php echo base_url('login');?>">
      Iniciar sesión
      </a>
  
  </div>
</nav>

</header>
