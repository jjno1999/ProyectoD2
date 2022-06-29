<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Insertar registro</h1>
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
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_add');?>">
                <tr>
                    <th scope='row'>#</th>
                    <td><input class="form-control form-control-sm" name="nombre" placeholder="nombre de veterinario"></td>
                    <td><input class="form-control form-control-sm" name="fecha_nacimiento" placeholder="fecha de nacimiento"></td>
                    <td><input class="form-control form-control-sm" name="telefono" placeholder="telefono"></td>
                    <td><input class="form-control form-control-sm" name="email" placeholder="correo electronico"></td>
                    <td><input class="form-control form-control-sm" name="direccion" placeholder="direccion"></td>
                    <td><input class="form-control form-control-sm" name="especialidad" placeholder="especialidad"></td>
                    <td><select class="form-control form-control-sm" name="id_usuario">
                            <option disabled selected>usuario</option>
                            <?php
                            foreach($usuarios as $usuario)
                            {
                                echo '<option value="' . $usuario['id'] . '">(' . $usuario['id'] . ')' . $usuario['nombre'] . '</option>';
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Crear</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>