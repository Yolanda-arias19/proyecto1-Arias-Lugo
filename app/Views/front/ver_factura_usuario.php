<section class= "abm">
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?=session()->getFlashdata('fail')?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
        <?php if(!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?=session()->getFlashdata('success')?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>

    <h1>Compras</h1>

    <?php
    $session = session();
    if(empty($ventas)) { ?>
            <div class="text-center">
                <h4>No posee compras registradas</h4>
                <p>Para realizar una compra visite nuestro catálogo</p>
                <a class="btn" href="<?php echo base_url('catalogo_produc'.'0') ?>">Catálogo</a>
            </div>
    <?php } else { ?>

    
    <div class= "table-responsive mt-5">
        <table class="table table-striped" id="prod-list">
            <thead>

                <tr>
                    <th>NOMBRE CLIENTE</th>
                    <th>EMAIL</th>
                    <th>USUARIO</th>
                    <th>TOTAL</th>
                    <th>FECHA</th>
                    <th>NRO COMPRA</th>
                    <th>OPCIÓN</th>
                </tr>
                
            </thead>

            <tbody>
                <?php if(!empty($ventas) && is_array($ventas)){
                    foreach($ventas as $row) { ?>
                
                        <tr>
                            <td><?= $row['nombre'] . " " . $row['apellido']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['usuario']?></td>
                            <td><?= $row['total_venta']?></td>
                            <td><?= $row['fecha']?></td>
                            <td><?= $row['id_venta']?></td>
                            <th><a href="<?php echo base_url('vista_compras' . $row['id_venta']) ?>" class="btn">Detalle</a></th>
                        </tr>
                        <?php } 
                        } ?>
            </tbody>
        </table>
    </div>

<?php } ?> 
</section>