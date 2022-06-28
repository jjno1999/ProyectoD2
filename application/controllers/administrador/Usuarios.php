<?php
require_once(APPPATH . 'controllers/administrador/Index.php');
/**
* Trabaja con datos de usuario
*/
class Usuarios extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    /**
    * Muestra la pagina de administracion de usuarios
    */
    public function Index()
    {
        $data['usuarios'] = $this->Usuario_model->get();
        $this->view('usuarios', $data);
    }

    /**
    * Muestra la pagina de modificacion de usuarios
    *
    * @param int $id id del usuario a modificar
    */
    public function modificar($id)
    {
        $data['usuario'] = $this->Usuario_model->get($id);
        $this->view('usuario_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar un usuario
    */
    public function usuario_add()
    {
        $data = array(
            'id' => 'NULL',
            'nombre' => $this->input->post('nombre'),
            'password' => $this->input->post('password'),
            'rol' => $this->input->post('rol'),
            'estado' => $this->input->post('estado'),
        );
        $this->Usuario_model->add($data);
        redirect('administrador/usuarios');
    }

    /**
    * Recoge los valores del formulario para proceder a modificar un usuario
    *
    * @param int $id id del usuario a modificar
    */
    public function usuario_mod($id){
        $usuario = array(
            'id' => $id,
            'nombre' => $this->input->post('nombre'),
            'password' => $this->input->post('password'),
            'rol' => $this->input->post('rol'),
            'estado' => $this->input->post('estado'),
        );
        $this->Usuario_model->mod($usuario);
        redirect('administrador/usuarios');
    }
}