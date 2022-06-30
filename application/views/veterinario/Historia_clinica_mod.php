<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Modificar Historia clinica</h1>
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
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_mod/' . $historia_clinica['id']);?>">
                <tr>
                    <th scope='row'><?php echo $historia_clinica['id'];?></th>
                    <td><input class="form-control form-control-sm" name="fecha_ingreso" value="<?php echo $historia_clinica['fecha_ingreso'];?>" placeholder="fecha de ingreso"></td>
                    <td><input class="form-control form-control-sm" name="fecha_salida" value="<?php echo $historia_clinica['fecha_salida'];?>" placeholder="fecha de salida"></td>
                    <td><input class="form-control form-control-sm" name="diagnostico" value="<?php echo $historia_clinica['diagnostico'];?>" placeholder="diagnostico"></td>
                    <td><input class="form-control form-control-sm" name="observaciones" value="<?php echo $historia_clinica['observaciones'];?>" placeholder="observaciones"></td>
                    <td><input class="form-control form-control-sm" name="tratamiento" value="<?php echo $historia_clinica['tratamiento'];?>" placeholder="tratamiento"></td>
                    <td><select class="form-control form-control-sm" name="no_documento_veterinario">
                            <option disabled selected>veterinario</option>
                            <?php
                            foreach($veterinarios as $veterinario)
                            {
                                echo '<option value="' . $veterinario['no_documento'] . '"';
                                if($veterinario['no_documento'] == $historia_clinica['no_documento_veterinario'])
                                {
                                    echo ' selected';
                                }
                                echo '>' . $veterinario['nombre'] . '(' . $veterinario['no_documento'] . ')</option>';
                            }
                            ?>
                        </select></td>
                    <td><select class="form-control form-control-sm" name="id_mascota">
                            <option disabled selected>mascota</option>
                            <?php
                            foreach($mascotas as $mascota)
                            {
                                echo '<option value="' . $mascota['id'] . '"';
                                if($mascota['id'] == $historia_clinica['id_mascota'])
                                {
                                    echo ' selected';
                                }
                                echo '>' . $mascota['nombre'] . '(' . $mascota['id'] . ')</option>';
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Modificar</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>