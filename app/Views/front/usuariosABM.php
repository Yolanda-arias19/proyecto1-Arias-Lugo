<section class="abm">

    <h1>Usuarios ABM</h1>
    
    <div class= "botones">
    <a href="<?php echo base_url('abm_usuario'.'activos'); ?>" class="btn">Usuarios activos</a>
    <a href="<?php echo base_url('abm_usuario'.'eliminados'); ?>" class="btn">Usuarios eliminados</a>
    <a href="<?php echo base_url('abm_usuario'.'todos');?>" class="btn">Eliminar Filtro</a>
</div>

    <div class="table-responsive mt-5">
        <table class="table table-striped" id="user-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Dado de baja</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if($usuarios): ?>
                <?php foreach ($usuarios as $user): ?>
                    <?php $eliminado = $user['baja']; ?>
                    <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['nombre']; ?></td>
                            <td><?php echo $user['apellido']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['usuario']; ?></td>
                            <td><?php echo $user['perfil_id']; ?></td>
                            <td><?php echo $user['baja']; ?></td>
                            <td>
                            <?php if ($user['usuario']!=session()->get('usuario')): ?>
                                <?php if ($eliminado == 'no'): ?>
                                    <a href="<?php echo base_url('bajaUsuario'.$user['id'])?>" class="btn">Dar de baja</a> 
                                <?php else: ?>
                                    <a href="<?php echo base_url('activarUsuario'.$user['id'])?>" class="btn">Dar de alta</a> 
                                <?php endif; ?>
                            <?php endif; ?>
                            </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


</section>