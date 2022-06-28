<?php
/**
* Controlador para operaciones pre autenticacion
*/
class Login extends CI_Controller
{
    /**
    * Muestra la pagina de login
    */
    public function Index()
    {
        if ($this->session->userdata('estado') == 'activo') {
            redirect($this->session->userdata('rol'));
        }
        $this->load->view('templates/base');
        $this->load->view('login');
    }

    /**
    * Inicia sesion si el usuario ingresado por post es valido
    */
    public function log_in()
    {
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');

        $data = array(
            'nombre' => $this->input->post('nombre'), 
            'password' => $this->input->post('password'));

        $usuario = $this->Usuario_model->validar($data);
        if ($usuario) {
                $this->session->set_userdata($usuario);
            redirect($this->session->userdata('rol'));
        } else {
            redirect('login');
        }
    }

    /**
    * Cierra sesion
    */
    public function log_out()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
