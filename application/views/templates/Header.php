<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto" href="<?php echo base_url() . 'index.php/administrador';?>"><h5 class="font-weight-normal">Veterinaria Acme</h5></a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?php echo base_url() . 'index.php/administrador';?>">Inicio</a>
        <?php 
            foreach ($acceso as $link)
            {
                echo '<a class="p-2 text-dark" href="' . base_url() . 'index.php/administrador/' . $link . '">' . $link . '</a>';
            }
        ?>
    </nav>
    <a class="btn btn-outline-primary" href="<?php echo base_url() . 'index.php/login/log_out';?>">Cerrar Sesión</a>
</div>