<section class="abm">
    <h5>Categorías -----------------------------------------------------------------</h5>
    <a class="btn mb-2" href="<?php echo base_url('catalogo_produc'.'0');?>">Todos los productos</a>
    <?php foreach($categorias as $categoria): ?>
        <a class="btn mb-2" href="<?php echo base_url('catalogo_produc'.$categoria['id']);?>"><?php echo $categoria['descripcion']; ?></a>
    <?php endforeach; ?>
    <h5>Productos -----------------------------------------------------------------</h5>
    <?php foreach($productos as $producto): ?>
        <?php if ($producto['eliminado']== 'NO'): ?>
            <div class= "card" style="height:15%; width:15%;">
                <img class="card-img-top" src="<?=base_url()?>/assets/img/<?=$producto['imagen'];?>">
                <div class="card-body">
                    <h5 class="card-title "><?php echo $producto['nombre_prod']; ?></h5>
                    <p class="card-text">$<?php echo $producto['precio_vta']; ?></p>
                </div>
            </div>
        <?php endif;?>
    <?php endforeach; ?>    
</section>