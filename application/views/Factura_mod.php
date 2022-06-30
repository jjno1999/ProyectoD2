<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Modificar Factura</h1>
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
            <form method="post" action="<?php echo base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2). '/reg_mod/' . $factura['id']);?>">
                <tr>
                    <th scope='row'><?php echo $factura['id'];?></th>
                    <td><input class="form-control form-control-sm" name="fecha" value="<?php echo $factura['fecha'];?>" placeholder="fecha"></td>
                    <td><input class="form-control form-control-sm" name="descripcion" value="<?php echo $factura['descripcion'];?>" placeholder="descripcion"></td>
                    <td><input class="form-control form-control-sm" name="monto" value="<?php echo $factura['monto'];?>" placeholder="monto"></td>
                    <td><select class="form-control form-control-sm" name="estado">
                            <option disabled selected>estado</option>
                            <option <?php if($factura['estado'] == 'pagada') echo 'selected';?>>pagada</option>
                            <option <?php if($factura['estado'] == 'pendiente') echo 'selected';?>>pendiente</option>
                        </select></td>
                    <td><select class="form-control form-control-sm" name="id_historia_clinica">
                            <option disabled selected>historia clinica</option>
                            <?php
                            foreach($historias_clinicas as $historia_clinica)
                            {
                                if($factura['id_historia_clinica'] == $historia_clinica['id'])
                                {
                                    echo '<option value="' . $historia_clinica['id'] . '" selected>' . '(' . $historia_clinica['id'] . ')</option>';
                                }else{
                                    echo '<option value="' . $historia_clinica['id'] . '">' . $historia_clinica['id'] . '</option>';
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