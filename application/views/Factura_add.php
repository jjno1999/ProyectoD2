<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Insertar Factura</h1>
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
                    <td><input class="form-control form-control-sm" name="fecha" placeholder="fecha"></td>
                    <td><input class="form-control form-control-sm" name="descripcion" placeholder="descripcion"></td>
                    <td><input class="form-control form-control-sm" name="monto" placeholder="monto"></td>
                    <td><select class="form-control form-control-sm" name="estado">
                            <option disabled selected>estado</option>
                            <option>pagada</option>
                            <option>pendiente</option>
                        </select></td>
                    <td><select class="form-control form-control-sm" name="id_historia_clinica">
                            <option disabled selected>historia clinica</option>
                            <?php
                            foreach($historias_clinicas as $historia_clinica)
                            {
                                echo '<option value="' . $historia_clinica['id'] . '">' . $historia_clinica['id'] . '</option>';
                            }
                            ?>
                        </select></td>
                    <td><button type='submit' class='btn btn-success btn-sm'>Crear</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>