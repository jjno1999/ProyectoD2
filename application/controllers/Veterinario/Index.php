<?php
require_once(APPPATH . 'controllers/Auth_privilegiado.php');
/**
* Controlador para usuarios de tipo veterinarios
*/
class Index extends Auth_privilegiado
{
    public function __construct()
    {
        parent::__construct();
        $this->login_check('veterinario');
        $this->acceso = array('Mascotas', 'Clientes', 'Historias_Clinicas');
    }

    /**
    * Muestra la pagina de veterinario
    */
    public function Index()
    {
        $data['acceso'] = $this->acceso;
        $data['informacion'] = 'Bienvenido, ' . $this->session->userdata('veterinario')['nombre'];
        $this->view('dashboard', $data);
    }
}
