<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Modificar registro</h1>
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
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_mod/' . $mascota['id']);?>">
                <tr>
                    <th scope='row'>#</th>
                    <td><input class="form-control form-control-sm" name="nombre" value="<?php echo $mascota['nombre'];?>" placeholder="nombre de la mascota"></td>
                    <td><input class="form-control form-control-sm" name="especie" value="<?php echo $mascota['especie'];?>" placeholder="especie"></td>
                    <td><input class="form-control form-control-sm" name="raza" value="<?php echo $mascota['raza'];?>" placeholder="raza"></td>
                    <td><input class="form-control form-control-sm" name="fecha_nacimiento" value="<?php echo $mascota['fecha_nacimiento'];?>" placeholder="fecha de nacimiento"></td>
                    <td><select class="form-control form-control-sm" name="no_documento_cliente">
                            <option disabled selected>numero de documento del cliente</option>
                            <?php
                            foreach($clientes as $cliente)
                            {
                                if($mascota['no_documento_cliente'] == $cliente['no_documento']){
                                    echo '<option value="' . $cliente['no_documento'] . '" selected>(' . $cliente['no_documento'] . ')' . $cliente['nombre'] . '</option>';
                                }
                                else{
                                    echo '<option value="' . $cliente['no_documento'] . '">(' . $cliente['no_documento'] . ')' . $cliente['nombre'] . '</option>';
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