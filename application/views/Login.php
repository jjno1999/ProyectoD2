
  <head>
    <link href="<?php echo base_url();?>public/css/login.css" rel="stylesheet">
  </head>

    <div class="login-form">
      <center><h2 class="text-white ">Iniciar sesión</h2></center>
      <form method="post" class="form-horizontal" action="<?php echo base_url() . 'index.php/login/login_action';?>">
        <div class="form-group">
          <label class="col-sm-6 text-left">Email</label>
          <div class="col-sm-12">
            <input type="text" name="usuario" class="form-control" placeholder="Ingrese email" />
          </div>
        </div>
            
        <div class="form-group">
          <label class="col-sm-6 text-left">Password</label>
          <div class="col-sm-12">
            <input type="password" name="password" class="form-control" placeholder="Ingrese passowrd" />
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
            <input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar Sesion">
          </div>
        </div>
      </form>
    </div>
    </div>