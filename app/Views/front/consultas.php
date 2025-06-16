<section class="consultas">
    <h1>Consultas</h1>
    <?php if(!empty (session()->getFlashdata('success'))):?>
        <div class="alert alert-success alert-dismissible"><?=session()->getFlashdata('success');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>
    <?php if(!empty (session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger alert-dismissible"><?=session()->getFlashdata('fail');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>
    <h2>Preguntas Frecuentes</h2>
    
<!--Preguntas desplegables-->

    <details>
        <summary>¿Para cuantas personas es cada una?</summary>
        <ul><li>Mini torta (1/2 personas aprox.)</li>
            <li>Torta tamaño hamburguesa (1/2 personas aprox.)</li>
            <li>Mediana (8/10 personas aprox.)</li>
            <li>Torta 1kg (10/12 personas aprox.)</li>
            <li>Torta 1.5Kg (10/15 personas aprox.)</li>
            <li>Torta 2Kg (15/20 personas aprox.)</li>
            <li>Torta 2.5Kg (20/25 personas aprox.)</li>
            <li>Las tortas de dos pisos dependen de su distribucion o como se corten.</li>
        </ul>
    </details>
    <details>
        <summary>¿Que sabores de bizcocho y rellenos hay?</summary>
        <p>Bizcochos:</p>
        <ul><li>Vainilla.</li>
            <li>Chocolate.</li>
            <li>Naranja.</li>
            <li>Limon.</li>
            <li>Banana.</li>
            <li>Red velvet.</li>
            <li>Marmolado.</li>
            <li>Cafe.</li>
            <li>Coco.</li></ul>

            <p>Rellenos:</p>
        <ul><li>Mousse de frutilla.</li>
            <li>Mousse de limon.</li>
            <li>Mousse de dulce de leche.</li>
            <li>Mousse de dulce de leche granizado.</li>
            <li>Mousse de chocolate.</li>
            <li>Mousse de vainilla.</li>
            <li>Crema mocca.</li>
            <li>Crema coco.</li>
            <li>Dulce de leche.</li>
            <li>Crema de banana.</li>
            <li>Crema de limon.</li>
            <li>Crema cookie.</li>
            <li>Chocotorta.</li>
            <li>Cheesecake limon.</li>
            <li>Crema pastelera.</li></ul>

            <p>Agregados para relleno: 2Kg en adelante.</p>
            <ul><li>Tortas 1Kg en adelante: 2 rellenos.</li>
                <li>Tortas medianas: 2 rellenos.</li>
                <li>Tortas tamaño hamburguesa: 1 relleno.</li>
                <li>Chocolates, bombones, oreos, chips,merengues, cerezas, durazno, 
                frutilla, banana, frutos secos, etc.</li>
            </ul> 
    </details>
    <details>
        <summary>¿Seña?</summary>
        <p></p>
    </details>
    
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" class="needs-validation" action="<?php echo base_url('enviar-form-consultas') ?>">
        <h2>Formulario de Consultas</h2>
        
        <div class= "paddingConsultas">
        <?php if (session()->get('logged_in')):?>
            <div class="form-group ">
                    <input type="text" name="nombre" hidden value="<?= session()->get('nombre') . ' ' . session()->get('apellido') ?>" placeholder="Nombre" id="nombre">
            </div>
             <div class="form-group">
                    <input type="email" name ="email" hidden value=<?= session()->get('email') ?> placeholder="ejemplo@gmail.com" id="email">
            </div>
        <?php else:?>
           <div class="form-group ">
                <label for="nombre">Nombre</label>
                    <input type="text" name ="nombre" placeholder="Nombre" id="nombre"  required>
            </div>
             <!-- Error Del Lado del Servidor -->
            <?php if($validation->getError('nombre')) {?>
                <div class='alert alert-danger alert-dismissible mt-2'>
                    <?= $error = $validation->getError('nombre'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>

            <div class="form-group">
                <label for="email">Email</label>
                    <input type="email" name ="email" placeholder="ejemplo@gmail.com" id="email" required>
            </div>
            <!-- Error Del Lado del Servidor -->
            <?php if($validation->getError('email')) {?>
                <div class='alert alert-danger alert-dismissible mt-2'>
                    <?= $error = $validation->getError('email'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>
        <?php endif;?>
       

        <div class="form-group">
            <label for="mensaje">Mensaje</label>
                <textarea rows="8" name ="mensaje" placeholder="Deja tu mensaje" id="mensaje" required></textarea>
                <!-- Error Del Lado del Servidor -->
                <?php if($validation->getError('mensaje')) {?>
                    <div class='alert alert-danger alert-dismissible mt-2'>
                        <?= $error = $validation->getError('mensaje'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }?>
        </div>
        
        <input class="enviar" type="submit">
        </div>
    </form>

</section>

