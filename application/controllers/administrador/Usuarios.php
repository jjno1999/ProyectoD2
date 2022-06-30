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
        $data['registros'] = $this->Usuario_model->get();
        $data['campos'] = $this->Usuario_model->get_fields();
        $paginas = array('administrador/usuario_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
    * Muestra la pagina de modificacion de usuarios
    *
    * @param int $id id del usuario a modificar
    */
    public function modificar($id)
    {
        $data['usuario'] = $this->Usuario_model->get($id);
        $data['campos'] = $this->Usuario_model->get_fields();
        $this->view('administrador/usuario_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar un usuario
    */
    public function reg_add()
    {
        $this->Usuario_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }

    /**
    * Recoge los valores del formulario para proceder a modificar un usuario
    *
    * @param int $id id del usuario a modificar
    */
    public function reg_mod($id)
    {
        $_POST['id'] = $id;
        $this->Usuario_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' . $this->uri->segment(2));
    }
}