<section class= "abm">

    <h1>Producto ABM</h1>

    <div class= "botones">
    <a href="<?php echo base_url('abm_producto'.'todos');?>" class="btn">Todos</a>
    <a href="<?php echo base_url('abm_producto'.'activos');?>" class="btn">Activos</a>
    <a href="<?php echo base_url('abm_producto'.'eliminados');?>" class="btn">Eliminados</a>
    <a href="<?php echo base_url('altaProducto');?>" class="btn">Nuevo Producto</a>
</div>

    <div class= "table-responsive mt-5">
        <table class="table table-striped" id="prod-list">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>PRODUCTO</th>
                    <th>COSTO</th>
                    <th>PRECIO VENTA</th>
                    <th>STOCK</th>
                    <th>STOCK MÍNIMO</th>
                    <th>IMAGEN</th>
                    <th>ELIMINADO</th>
                    <th>ACTION</th>
                </tr>
                
            </thead>

            <tbody>
                <?php if($producto): ?>
                <?php foreach ($producto as $prod): ?>
                    <?php $eliminado = $prod['eliminado']; ?>
                        <tr>
                            <td><?php echo $prod['id']; ?></td>
                            <td><?php echo $prod['nombre_prod']; ?></td>
                            <td><?php echo $prod['precio']; ?></td>
                            <td><?php echo $prod['precio_vta']; ?></td>
                            <td><?php echo $prod['stock']; ?></td>
                            <td><?php echo $prod['stock_min']; ?></td>
                            <?php $imagen = $prod['imagen'];?>
                            <?php $id = $prod['id'];?>
                            <td> <img height="70px" width="85px" src="<?=base_url()?>/assets/img/<?=$imagen?>"></td>
                            <td><b><?php echo $eliminado; ?></b></td>
                            <td>
                                <a href="" class="btn">Editar</a>
                                <?php if ($eliminado == 'NO'): ?>
                                    <a href="<?php echo base_url('bajaProducto'.$id)?>" class="btn">Dar de baja</a> 
                                <?php else: ?>
                                    <a href="<?php echo base_url('activarProducto'.$id)?>" class="btn">Dar de alta</a> 
                                <?php endif; ?>
                            </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


</section>