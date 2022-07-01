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
     * Inicializa variables de sesion si el usuario ingresado por post es valido
     */
    public function log_in()
    {
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');

        $usuario = $this->Usuario_model->validar($_POST);
        if ($usuario) {
            $this->session->set_userdata($usuario);
            if($usuario['rol'] == 'veterinario')
            {
                $this->load->model('Veterinario_model');
                $veterinario = $this->Veterinario_model->get_veterinario_desde_usuario($this->session->userdata('id'));
                $this->session->set_userdata('veterinario', $veterinario);
            }
            redirect($this->session->userdata('rol'));
        } else {
            redirect('login');
        }
    }

    /**
     * Elimina variables de sesion
     */
    public function log_out()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
