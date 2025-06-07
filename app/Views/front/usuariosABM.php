<section>
    <a href="<?php echo base_url('abm_usuario'.'activos'); ?>" class="btn btn-dark mb-1">Usuarios activos</a>
    <a href="<?php echo base_url('abm_usuario'.'eliminados'); ?>" class="btn btn-dark mb-1">Usuarios eliminados</a>
    <a href="<?php echo base_url('abm_usuario'.'todos');?>" class="btn btn-dark mb-1">Eliminar Filtro</a>

    <div class="table-responsive">
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
                                    <a href="<?php echo base_url('bajaUsuario'.$user['id'])?>" class="btn btn-secondary btn-sm mt-1">Dar de baja</a> 
                                <?php else: ?>
                                    <a href="<?php echo base_url('activarUsuario'.$user['id'])?>" class="btn btn-secondary btn-sm mt-1">Dar de alta</a> 
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