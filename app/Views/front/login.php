

<section class="iniciar_sesion">
    

        <!-- Incio del formulario de login-->              
    <form class="login" method="post" action="<?php echo base_url('/enviarlogin') ?>">
        <h2>Iniciar sesión</h2> 
        <?php if(!empty (session()->getFlashdata('msg'))):?>
        <div class="alert alert-danger alert-dismissible"><?=session()->getFlashdata('msg');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif?>  
        <?php if(!empty (session()->getFlashdata('success'))):?>
            <div class="alert alert-success alert-dismissible"><?=session()->getFlashdata('success');?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif?>  
        <div class="form_input">
            <label for="usuario" class="form-label">Usuario</label>
            <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario" maxlength="20" minlength="3" required>
        </div>
        
        <div class="form_input">
            <label for="ID-Pass-Imput" class="form-label">Contraseña</label>
            <input name="pass" id="ID-Pass-Imput" type="password"  class="form-control" placeholder="Contraseña" required>
        </div>
        
        <input class="ingresar" type="submit" value="Ingresar">
        
        <p>¿No tenes una cuenta? <a href="<?php echo base_url('registrarse'); ?>">Registrarse</a></p>
    </form>
</section>