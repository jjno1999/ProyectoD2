<?php
/**
* Controlador basico para operaciones
* de uso exclusivo de usuarios autenticados
*/
abstract class Auth_privilegiado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->acceso = NULL;
    }

    abstract function Index();

    /**
    * Muestra una pagina con componentes basicos
    * @param object $page pagina o paginas a mostrar
    * @param array $data datos a pasar a las vistas
    */
    public function view($page, $data = []) {
        if(gettype($page) == 'string'){
            $this->load->view('templates/base');
            $this->load->view('templates/header', array('acceso' => $this->acceso));
            $this->load->view($page, $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/base');
            $this->load->view('templates/header', array('acceso' => $this->acceso));
            foreach($page as $p)
            {
                $this->load->view($p, $data);
            }
            $this->load->view('templates/footer');
        }
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