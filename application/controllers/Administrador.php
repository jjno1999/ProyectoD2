<?php
require_once(APPPATH . 'controllers/Auth_privilegiado.php');
class Administrador extends Auth_privilegiado
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function Index()
    {
        $this->view('dashboard');
    }

    public function Usuarios()
    {
        $data['usuarios'] = $this->Usuario_model->get_usuarios();
        $this->view('usuarios', $data);
    }

    public function usuario_add()
    {
        $data = array(
            'id' => $this->input->post('NULL'),
            'nombre' => $this->input->post('nombre'),
            'password' => $this->input->post('password'),
            'rol' => $this->input->post('rol'),
            'estado' => $this->input->post('estado'),
        );
        $this->Usuario_model->add_usuario($data);
        redirect('administrador/usuarios');
    }
}
