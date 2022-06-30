<div class="container rounded bg-light pb-1 mb-3">
    <h1>Registros</h1>
    <h5>Buscar: <input id="search-input", onkeyup="table_search()"></h5>
    <table id="search-table" class="table table-light table-sm table-hover table-striped">
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
            <?php
            foreach ($registros as $registro) {
                echo "<tr>";
                foreach($campos as $campo)
                {
                    echo '<td>' . $registro[$campo] . '</td>';
                }
                echo "<td><a href='" . base_url('index.php/' . $this->session->userdata('rol') . '/' .$this->uri->segment(2).  '/modificar/' . $registro[$campos[0]]) . "'>
                            <button type='button' class='btn btn-primary btn-sm'>Editar</button></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>