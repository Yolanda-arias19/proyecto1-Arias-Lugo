<section class="abm">

    <h1>Consultas Administrador</h1>
    <div class= "botones">
    <a href="<?php echo base_url('mostrarMensajes'.'todos') ;?>" class="btn">Todos los mensajes</a>
    <a href="<?php echo base_url('mostrarMensajes'.'leidos') ;?>" class="btn">Leidos</a>
    <a href="<?php echo base_url('mostrarMensajes'.'no_leidos') ;?>"class="btn">No leidos</a>
</div>

    <div class="table-responsive mt-5">
        <table class="tablero table table-striped" id="consulta-list">
            <thead>
                <tr>
                <th>ID</th>
                <th>FECHA</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>MENSAJE</th>
                <th>ESTADO</th>
                <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php if($consultas):?>
                <?php foreach ($consultas as $consulta): ?>
                <?php $estado = $consulta['estado']; ?>
                    <tr>
                            <td><?php echo $consulta['id']; ?></td>
                            <td><?php echo $consulta['fecha']; ?></td>
                            <td><?php echo $consulta['nombre']; ?></td>
                            <td><?php echo $consulta['email']; ?></td>
                            <td><?php echo $consulta['mensaje']; ?></td>
                            <td><?php echo $consulta['estado']; ?></td>
                            <td>
                                <?php if ($estado == 'no_leido'): ?>
                                    <a href="<?php echo base_url('marcarLeido'.$consulta['id']);?>" class="btn">Marcar como leido</a> 
                                <?php endif; ?>
                            </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


</section>