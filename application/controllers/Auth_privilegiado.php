<?php
/**
* Controlador basico para operaciones
* de uso exclusivo de usuarios autenticados
*/
class Auth_privilegiado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->login_check('administrador');
        $this->acceso = NULL;
    }

    /**
    * Muestra una pagina con componentes basicos
    */
    public function view($page, $data = []) {
        $this->load->view('templates/base');
        $this->load->view('templates/header', array('acceso' => $this->acceso));
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    /**
    * Verifica que el usuario de la sesion sea del rol especificado
    *
    * @param string $rol rol del usuario a verificar
    */
    public function login_check($rol) {
        if ($this->session->userdata('rol') != $rol) {
            redirect($this->session->userdata('rol'));
        }
    }
}