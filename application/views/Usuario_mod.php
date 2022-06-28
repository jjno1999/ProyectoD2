<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Modificar registro</h1>
    <table class="table table-light table-sm table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Password</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <form method="post" action="<?php echo base_url() . 'index.php/administrador/usuarios/usuario_mod/' . $usuario['id'];?>">
                <tr>
                    <th scope='row'><?php echo $usuario['id'];?></th>
                    <td><input class="form-control form-control-sm" name="nombre" value="<?php echo $usuario['nombre'];?>" placeholder="nombre de usuario"></td>
                    <td><input class="form-control form-control-sm" name="password" value="<?php echo $usuario['password'];?>" placeholder="Contraseña"></td>
                    <td><select class="custom-select form-control-sm" name="rol">
                            <option disabled>Rol</option>
                            <option <?php if($usuario['rol'] == 'administrador'){echo 'selected';}?>>administrador</option>
                            <option <?php if($usuario['rol'] == 'veterinario'){echo 'selected';}?>>veterinario</option>
                        </select></td>
                    <td><select class="custom-select form-control-sm" name="estado">
                            <option disabled>Estado</option>
                            <option <?php if($usuario['estado'] == 'activo'){echo 'selected';}?>>activo</option>
                            <option <?php if($usuario['estado'] == 'inactivo'){echo 'selected';}?>>inactivo</option>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Modificar</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>