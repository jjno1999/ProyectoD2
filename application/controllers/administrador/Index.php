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
        $this->acceso = array('Usuarios', 'Clientes', 'Mascotas', 'Veterinarios', 'Historias_Clinicas', 'Facturas');
    }

    /**
    * Muestra la pagina de administrador
    */
    public function Index()
    {
        $data['acceso'] = $this->acceso;
        $data['informacion'] = 'Bienvenido, '.$this->session->all_userdata()['nombre'];
        $this->view('dashboard', $data);
    }
}
