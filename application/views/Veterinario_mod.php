<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Modificar veterinario</h1>
    <table class="table table-light table-sm table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <?php
                foreach($campos as $campo)
                {
                    echo '<th scope="col">' . $campo . '</th>';
                }
                ?>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_mod/' . $veterinario['no_documento']);?>">
                <tr>
                    <th scope='row'><?php echo $veterinario['no_documento'];?></th>
                    <td><input class="form-control form-control-sm" name="nombre" value="<?php echo $veterinario['nombre'];?>" placeholder="nombre de veterinario"></td>
                    <td><input class="form-control form-control-sm" name="fecha_nacimiento" value="<?php echo $veterinario['fecha_nacimiento'];?>" placeholder="fecha de nacimiento"></td>
                    <td><input class="form-control form-control-sm" name="telefono" value="<?php echo $veterinario['telefono'];?>" placeholder="telefono"></td>
                    <td><input class="form-control form-control-sm" name="email" value="<?php echo $veterinario['email'];?>" placeholder="correo electronico"></td>
                    <td><input class="form-control form-control-sm" name="direccion" value="<?php echo $veterinario['direccion'];?>" placeholder="direccion"></td>
                    <td><input class="form-control form-control-sm" name="especialidad" value="<?php echo $veterinario['especialidad'];?>" placeholder="especialidad"></td>
                    <td><select class="form-control form-control-sm" name="id_usuario">
                            <option disabled selected>usuario</option>
                            <?php
                            foreach($usuarios as $usuario)
                            {
                                if($veterinario['id_usuario'] == $usuario['id'])
                                {
                                    echo '<option value="' . $usuario['id'] . '" selected>' . $usuario['nombre'] . '(' . $usuario['id'] . ')</option>';
                                }else
                                {
                                    echo '<option value="' . $usuario['id'] . '">(' . $usuario['id'] . ')' . $usuario['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Modificar</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>