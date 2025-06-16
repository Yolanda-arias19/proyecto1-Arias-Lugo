<section class= "formulario_abm">

        

        <!--inicio del formulario-->
        <form class="needs-validation" action="<?= base_url('enviar-prod'); ?>" method="post" enctype="multipart/form-data">
        
            <h2>Alta de productos</h2>
                <!--validacion-->
            <?php if(!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?=session()->getFlashdata('fail');?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>

            <?php endif; ?>
            <?php if(!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?=session()->getFlashdata('success')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            <?php endif; ?>

            <?php $validation = \Config\Services::validation(); ?>
                <div class="mb-2">
                    <label for="nombre_prod" class="form-label">Producto</label>
                    <input class="form-control" type="text" name="nombre_prod" id="nombre_prod" placeholder="Nombre del producto" autofocus required>
                    
                    <!--Error-->
                    <?php if($validation->getError('nombre_prod')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('nombre_prod'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                <?php if (!empty($categorias) && is_array($categorias)): ?>
                            <?php $contador = 1;?>
                            <label for="ID-Categoria" class="form-label">Categoria</label>
                            <select name="categoria_id"  id="ID-Categoria" class="form-select" aria-label="categoria" required>
                                <option value="">Seleccionar Categoria </option>
                                <?php foreach ($categorias as $categoria):?>
                                    <option value="<?php echo $categoria['id'];?>"> <?php echo $contador, " - " , $categoria['descripcion']; ?>
                                    </option>
                                    <?php $contador++;?>
                                    <div id="ID-categoria" class="invalid-feedback">
                                        Inserte una categoria válida.
                                    </div>
                                <?php endforeach ?>
                            </select>
                        <?php endif ?>
                    <!--Error-->
                    <?php if($validation->getError('categoria')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('categoria'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="precio" class="form-label">Precio de costo</label>
                    <input class="form-control" type="text" name="precio" id="precio" required>
                    
                    <!--Error-->
                    <?php if($validation->getError('precio')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('precio'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="precio_vta" class="form-label">Precio de venta</label>
                    <input class="form-control" type="text" name="precio_vta" id="precio_vta" required>
                    
                    <!--Error-->
                    <?php if($validation->getError('precio_vta')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="text" name="stock" id="stock" required>
                    
                    <!--Error-->
                    <?php if($validation->getError('stock')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('stock'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="stock_min" class="form-label">Stock Mínimo</label>
                    <input class="form-control" type="text" name="stock_min" id="stock_min" required>
                    
                    <!--Error-->
                    <?php if($validation->getError('stock_min')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('stock_min'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen" id="imagen" accept="image/png, image/jpg, image/jpeg">
                    
                    <!--Error-->
                    <?php if($validation->getError('imagen')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('imagen'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                        <?php endif; ?>
                </div>
                
                <!--Botones-->
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn">Enviar</button>
                    <button type="reset" class="btn">Cancelar</button>
                    <a href="<?= base_url('crear'); ?>" class="btn">Volver</a>
                </div>
        </form><!--Fin del formulario-->
</section>
