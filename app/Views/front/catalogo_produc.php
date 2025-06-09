<section class="abm">
    <h5>Categorías </h5>
    <div class= "filtros_cat d-flex flex-wrap mb-4">
    <a class="btn mb-2 mr-2" href="<?php echo base_url('catalogo_produc'.'0');?>">Todos los productos</a>
    <?php foreach($categorias as $categoria): ?>
        <a class="btn mb-2 mr-2" href="<?php echo base_url('catalogo_produc'.$categoria['id']);?>"><?php echo $categoria['descripcion']; ?></a>
    <?php endforeach; ?>
    </div>
    <h5>Productos </h5>
    <div class="row">
    <?php foreach($productos as $producto): ?>
        <?php if ($producto['eliminado']== 'NO'): ?>
            <div class="col-sm-6 col md-4 col-lg-3 mb-4">
            <div class="product-card">
                <img src="<?=base_url()?>/assets/img/<?=$producto['imagen'];?>" alt="producto">
                    <h4 class="card-title "><?php echo $producto['nombre_prod']; ?></h4>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                    <span>$<?php echo $producto['precio_vta']; ?></span>
                    <button class="btn-sm">+</button>
                </div>
        </div>
    </div>    
        <?php endif;?>
    <?php endforeach; ?>  
    </div>  
</section>

