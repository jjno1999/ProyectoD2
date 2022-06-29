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
                    <td><input class="form-control form-control-sm" name="nombre" placeholder="nombre de la mascota"></td>
                    <td><input class="form-control form-control-sm" name="especie" placeholder="especie"></td>
                    <td><input class="form-control form-control-sm" name="raza" placeholder="raza"></td>
                    <td><input class="form-control form-control-sm" name="fecha_nacimiento" placeholder="fecha de nacimiento"></td>
                    <td><select class="form-control form-control-sm" name="no_documento_cliente">
                            <option disabled selected>numero de documento del cliente</option>
                            <?php
                            foreach($clientes as $cliente)
                            {
                                echo '<option value="' . $cliente['no_documento'] . '">(' . $cliente['no_documento'] . ')' . $cliente['nombre'] . '</option>';
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Crear</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>