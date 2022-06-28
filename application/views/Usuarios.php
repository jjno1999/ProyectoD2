<head>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/table_search.js"></script>
</head>
<div class="container rounded bg-light pb-1 mb-3">
    <h1 class="center">Insertar registro</h1>
    <table class="table table-light table-sm table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Password</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <form method="post" action="<?php echo base_url() . 'index.php/administrador/usuarios/usuario_add';?>">
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
                    <td><a href="<?php echo base_url() . "index.php/administrador/usuario_add" ?>">
                            <button type='submit' class='btn btn-success btn-sm'>Crear</button></a></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>

<div class="container rounded bg-light pb-1 mb-3">
    <h1>Registros</h1>
    <h5>Buscar: <input id="search-input", onkeyup="table_search()"></h5>
    <table id="search-table" class="table table-light table-sm table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Password</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
                echo "<tr>
                    <th scope='row'>" . $usuario['id'] . "</th>
                    <td>" . $usuario['nombre'] . "</td>
                    <td>" . $usuario['password'] . "</td>
                    <td>" . $usuario['rol'] . "</td>
                    <td>" . $usuario['estado'] . "</td>
                    <td> 
                        <a href='" . base_url() . "index.php/administrador/usuarios/modificar/" . $usuario['id'] . "'>
                            <button type='button' class='btn btn-primary btn-sm'>Editar</button></a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>