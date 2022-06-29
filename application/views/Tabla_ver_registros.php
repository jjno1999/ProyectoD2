<head>
    <script type="text/javascript" src="<?php echo base_url('public/js/auxiliar.js');?>"></script>
</head>

<div class="container rounded bg-light pb-1 mb-3">
    <h1>Registros</h1>
    <h5>Buscar: <input id="search-input", onkeyup="table_search()"></h5>
    <table id="search-table select-table" class="table table-light table-sm table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <?php
                foreach($campos as $campo)
                {
                    echo '<th scope="col">' . $campo . '</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($registros as $registro) {
                echo "<tr>";
                foreach($campos as $campo)
                {
                    echo '<td>' . $campo . '</td>';
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>