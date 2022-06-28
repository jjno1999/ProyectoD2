<?php
require_once(APPPATH . 'controllers/Auth_privilegiado.php');
/**
* Controlador para usuarios de tipo administrador
*/
class Index extends Auth_privilegiado
{
    public function __construct()
    {
        parent::__construct();
        $this->login_check('administrador');
        $this->acceso = array('Usuarios', 'Clientes', 'Veterinarios', 'Facturas');
    }

    /**
    * Muestra la pagina de administrador
    */
    public function Index()
    {
        $this->view('administrador');
    }
}
