<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Insertar Historia clinica</h1>
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
                    <td><input class="form-control form-control-sm" name="fecha_ingreso" placeholder="fecha de ingreso"></td>
                    <td><input class="form-control form-control-sm" name="fecha_salida" placeholder="fecha de salida"></td>
                    <td><input class="form-control form-control-sm" name="diagnostico" placeholder="diagnostico"></td>
                    <td><input class="form-control form-control-sm" name="observaciones" placeholder="observaciones"></td>
                    <td><input class="form-control form-control-sm" name="tratamiento" placeholder="tratamiento"></td>
                    <td><select class="form-control form-control-sm" name="no_documento_veterinario" disabled>
                            <option disabled selected>veterinario</option>
                            <?php
                            foreach($veterinarios as $veterinario)
                            {
                                echo '<option value="' . $veterinario['no_documento'] . '"';
                                if($veterinario['no_documento'] == $this->session->userdata('veterinario')['no_documento'])
                                {
                                    echo ' selected';
                                }
                                echo'>(' . $veterinario['no_documento'] . ')' . $veterinario['nombre'] . '</option>';
                            }
                            ?>
                        </select></td>
                    <td><select class="form-control form-control-sm" name="id_mascota">
                            <option disabled selected>mascota</option>
                            <?php
                            foreach($mascotas as $mascota)
                            {
                                echo '<option value="' . $mascota['id'] . '">' . $mascota['nombre'] . '(' . $mascota['id'] . ')</option>';
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Crear</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>