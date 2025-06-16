<section class= "abm">
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?=session()->getFlashdata('fail')?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
        <?php if(!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?=session()->getFlashdata('success')?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>

    <h1>Detalle de la compra</h1>

    <?php
    $session = session();
    if(empty($ventas)) { ?>
            <div class="text-center">
                <h4>No posee compras registradas</h4>
                <p>Para realizar una compra visite nuestro catálogo</p>
                <a class="btn" href="<?php echo base_url('catalogo_produc'.'0') ?>">Catálogo</a>
            </div>
    <?php } else {?>

    
    <div class= "table-responsive mt-5">
        <table class="table table-striped" id="prod-list">
            <thead>

                <tr>
                    <th>N° ORDEN</th>
                    <th>NOMBRE PRODUCTO</th>
                    <th>IMAGEN</th>
                    <th>CANTIDAD</th>
                    <th>COSTO</th>
                    <th>COSTO SUB-TOTAL</th>
                </tr>
                
            </thead>

            <tbody>
                <?php 
                $indice = 1;
                $total = 0;
                ?>
                <?php foreach ($ventas as $prod): ?>    
                        <tr>
                            <td><?php echo $indice; ?></td>
                            <td><?php echo $prod['nombre_prod']; ?></td>
                            <td><img width="100" height="65" src="<?php echo base_url('assets/img/' . $prod['imagen'])?>"></td>
                            <td><?php echo $prod['cantidad']; ?></td>
                            <td>$<?php echo $prod['precio']; ?></td>
                            <td>$<?php echo ($prod['precio'] * $prod['cantidad']); ?></td>
                        </tr>
                        <?php 
                        $indice++;
                        $total = $total + ($prod['precio'] * $prod['cantidad']);
                        ?>

                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="fs-5 ps-3"><b>Total: $<?php echo $total?></b></p>
        <div class="text-center">
        <?php if(session()->get('perfil_id') == 1): ?>
        <a class="btn" href="<?php echo base_url('ventas'); ?>">Volver</a>
        <?php else: ?>
            <a class="btn" href="<?php echo base_url('ver_factura_usuario'.session()->get('id_usuario')); ?>">Volver</a>
        <?php endif; ?>
        </div>
    </div>

<?php } ?>
</section>