<head>
    <title>Veterinaria ACME</title>
    <link href="<?php echo base_url(); ?>public/css/login.css" rel="stylesheet">
</head>

<div class="login-form">
    <h2 class="text-white text-center">Iniciar sesión</h2>
    <form method="post" class="form-horizontal" action="<?php echo base_url() . 'index.php/login/log_in'; ?>">
        <div class="form-group">
            <label class="col-sm-12 text-left">Nombre de usuario</label>
            <div class="col-sm-12">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese email" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6 text-left">Contraseña</label>
            <div class="col-sm-12">
                <input type="password" name="password" class="form-control" placeholder="Ingrese passowrd" required />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-success btn-block" value="Iniciar Sesion">
            </div>
        </div>
    </form>
</div>