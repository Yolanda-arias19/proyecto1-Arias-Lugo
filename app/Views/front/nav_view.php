<body>
<header>
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
    <button class="btnLogin-popup">Iniciar sesión</button>
  </div>
</nav>

</header>

<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    
    <div class="form-box login">
      <h2>Iniciar sesión</h2>
      <form action="#">
            <div class="input-box">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" required>
              <label>Email</label>
            </div>

            <div class="input-box">
              <span class="icon"><ion-icon name="lock"></ion-icon></span>
              <input type="password" required>
              <label>Contraseña</label>
            </div>
            <button type="submit" class="btn">Iniciar sesión</button>
            <div class="login-register">
              <p>¿No tienes una cuenta? <a href="#" class="register-link">Regístrate</a></p>
            </div>
      </form>
    </div>

    <div class="form-box register">
      <h2>Registro</h2>
      <form action="#">
            <div class="input-box">
              <span class="icon"><ion-icon name="person"></ion-icon></span>
              <input type="text" required>
              <label>Nombre de usuario</label>
            </div>

            <div class="input-box">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" required>
              <label>Email</label>
            </div>

            <div class="input-box">
              <span class="icon"><ion-icon name="lock"></ion-icon></span>
              <input type="password" required>
              <label>Contraseña</label>
            </div>
            
            <div class="remember-forgot">
              <label><input type="checkbox"> Estoy de acuerdo con los términos y condiciones</label>

            </div>

            <button type="submit" class="btn">Registrarse</button>
            <div class="login-register">
              <p>¿Ya tienes una cuenta? <a href="#" class="login-link">Iniciar sesión</a></p>
            </div>
      </form>
    </div>
</div>
