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
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_mod/' . $cliente['no_documento']);?>">
                <tr>
                    <th scope='row'><?php echo $cliente['no_documento']; ?></th>
                    <td><input class="form-control form-control-sm" name="nombre" value="<?php echo $cliente['nombre']; ?>" placeholder="nombre del cliente"></td>
                    <td><input class="form-control form-control-sm" name="email" value="<?php echo $cliente['email']; ?>" placeholder="correo electronico"></td>
                    <td><input class="form-control form-control-sm" name="direccion" value="<?php echo $cliente['direccion']; ?>" placeholder="direccion"></td>
                    <td><input class="form-control form-control-sm" name="telefono" value="<?php echo $cliente['telefono']; ?>" placeholder="telefono"></td></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Modificar</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>