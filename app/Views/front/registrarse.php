

<?php if(!empty (session()->getFlashdata('fail'))):?>
    <div class="alert alert-danger alert-dismissible"><?=session()->getFlashdata('fail');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif?>

<?php if(!empty (session()->getFlashdata('success'))):?>
    <div class="alert alert-success alert-dismissible"><?=session()->getFlashdata('success');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif?> 

<section class = "registro">
    <?php $validation = \Config\Services::validation(); ?>

        <form method="post" class="needs-validation" action="<?php echo base_url('/enviar-form') ?>"> 	
                <h2>Registrarse</h2>

                <div class="form_input">
                    <label for="ID-Nombre-Registro" class="form-label">Nombre</label>
                    <input name="nombre" id="ID-Nombre-Registro" type="text"  class="form-control" placeholder="Ingresa tu nombre" maxlength="30" minlength="3" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,30}$" required>
                    <!-- Error Del Lado del Cliente -->
                    <div id="ID-Nombre-Registro" class="invalid-feedback">
                        Inserte un nombre válido. El nombre debe tener entre 3 y 30 caracteres.
                    </div>
                    <!-- Error Del Lado del Servidor -->
                    <?php if($validation->getError('nombre')) {?>
                        <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('nombre'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                </div>

                <div class="form_input">
                    <label for="ID-Apellido-Registro" class="form-label">Apellido</label>
                    <input name="apellido" id="ID-Apellido-Registro" type="text" class="form-control" placeholder="Apellido" maxlength="30" minlength="3" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,30}$" required>
                    <!-- Error Del Lado del Cliente -->
                    <div id="ID-Apellido-Registro" class="invalid-feedback">
                        Inserte un apellido válido. El apellido debe tener entre 3 y 30 caracteres.
                    </div>
                    <!-- Error Del Lado del Servidor -->
                    <?php if($validation->getError('apellido')) {?>
                        <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('apellido'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                </div>

                <div class="form_input">
                    <label for="ID-Mail-Registro" class="form-label">Correo</label>
                    <input name="email" id="ID-Mail-Registro" type="email" class="form-control"  placeholder="correo@algo.com" maxlength="50" minlength="4" required>
                    <!-- Error Del Lado del Cliente -->
                    <div id="ID-Mail-Registro" class="invalid-feedback">
                        Inserte un correo válido. El correo debe tener entre 4 y 50 caracteres.
                    </div>
                    <!-- Error Del Lado del Servidor -->
                    <?php if($validation->getError('email')) {?>
                        <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('email'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                </div>

                <div class="form_input">
                    <label for="ID-Usuario-Registro" class="form-label">Usuario</label>
                    <input name="usuario" id="ID-Usuario-Registro" type="text" class="form-control" placeholder="Usuario" maxlength="20" minlength="3" required>
                    <!-- Error Del Lado del Cliente -->
                    <div id="ID-Usuario-Registro" class="invalid-feedback">
                        Inserte un nombre de usuario válido. El nombre debe tener entre 3 y 20 caracteres.
                    </div>
                    <!-- Error Del Lado del Servidor -->
                    <?php if($validation->getError('usuario')) {?>
                        <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('usuario'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                </div>

                <div class="form_input">
                    <label for="ID-Contraseña-Registro" class="form-label">Contraseña</label>
                    <input name="pass" id="ID-Contraseña-Registro" type="password" class="form-control"  placeholder="Contraseña" maxlength="50" minlength="4" required>
                    <!-- Error Del Lado del Cliente -->
                    <div id="ID-Contraseña-Registro" class="invalid-feedback">
                        Inserte una contraseña válida. La contraseña debe tener entre 4 y 50 caracteres.
                    </div>
                    <!-- Error Del Lado del Servidor -->
                    <?php if($validation->getError('pass')) {?>
                        <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('pass'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                </div>

                <input class="registrarse" type="submit" value="Enviar">
                <p>¿Ya tenes una cuenta? <a href="<?php echo base_url('login'); ?>">Iniciar sesión</a></p>
                
        </form>

</section>
