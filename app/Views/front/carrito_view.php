<section class= "abm">
    <div class="container-fluid" id="carrito">
        <div class="cart">
            <div class="heading">
                <h2 class="text-center">Productos en tu carrito</h2>
            </div>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                    <?= session()->getFlashdata('msg') ;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('fail')):?>
                <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                    <?= session()->getFlashdata('fail') ;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                    <?= session()->getFlashdata('success') ;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center">
            <?php if(empty($cart)): ?>
                <p>Para agregar productos al carrito, hace clic en:</p>
                <a class="btn" href="<?= base_url('catalogo_produc'.'0'); ?>">Volver al catálogo
                </a>
                <?php endif; ?>
        </div>
        <?php if(!empty($cart)): ?>
            <form class="tabla-carrito" action="<?= base_url('carrito_actualiza') ?>" method="post">
                <div class="table-responsive mt-5">
                    <table class="table table-striped" id="carrito-list">
                        <thead>
                            <tr>
                                <th>IMAGEN</th>
                                <th>PRODUCTO</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL</th>
                                <th>Cancelar</th>
                            </tr>
                            
                        </thead>
                            <tbody>
                                <?php $gran_total = 0; ?>
                                <?php foreach ($cart as $item): ?>
                                    <?php $gran_total += $item['price'] * $item['qty']; ?>
                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][id]" value="<?= esc($item['id']) ?>">

                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][rowid]" value="<?= esc($item['rowid']) ?>">

                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][name]" value="<?= esc($item['name']) ?>">

                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][price]" value="<?= esc($item['price']) ?>">

                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][qty]" value="<?= esc($item['qty']) ?>">

                                    <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][imagen]" value="<?= esc($item['imagen']) ?>">
                                    <tr class="table-danger align-middle">
                                    <td><img src="<?= base_url('assets/img/' . $item['imagen']) ?>" width="80" height="80" alt="<?= esc($item['name']) ?>"></td>

                                    <td><?= esc($item['name']) ?></td>
                                    <td>$ <?= number_format($item['price'], 2)?></td>
                                    <td>
                                        <?php if (isset($item['stock']) && $item['qty'] < $item['stock']): ?>

                                        <a class="btn btn-sm" href="<?= base_url('carrito_suma/'. $item['rowid']) ?>">+</a>
                                        <?php else: ?>
                                        <button class="btn btn-sm btn-secondary" disabled>+</button>
                                        <?php endif; ?>

                                        <?= number_format($item['qty'])?>
                                    
                                        <a class="btn btn-sm" href="<?= base_url('carrito_resta/'. $item['rowid']) ?>">-</a>
                                
                                </td>
                                    
                                <td>$ <?= number_format($item['subtotal'], 2)?></td> 
                                
                                <td>
                                    <a class= "btn" href="<?= base_url('carrito_elimina/' . $item['rowid'])?>">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="table">
                                <td colspan="4"><strong>Total: $ <?= number_format($gran_total, 2) ?></strong></td>
                                <td colspan="2" class="text-end">
                                    <input type="button" class="btn btn-lg" value="Borrar Carrito" onclick="window.location= '<?= base_url('borrar')?>'">

                                    <input type="button" class="btn btn-lg" value="Comprar" onclick="window.location= '<?= base_url('carrito-comprar')?>'">
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </form>
            <?php endif; ?>
    </div>
</section>