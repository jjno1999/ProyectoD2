<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Insertar usuario</h1>
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
                    <td><input class="form-control form-control-sm" name="nombre" placeholder="nombre de usuario"></td>
                    <td><input class="form-control form-control-sm" name="password" placeholder="Contraseña"></td>
                    <td><select class="form-control form-control-sm" name="rol">
                            <option disabled selected>Rol</option>
                            <option>administrador</option>
                            <option>veterinario</option>
                        </select></td>
                    <td><input class="form-control form-control-sm" name="estado" value="activo" readonly></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Crear</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>