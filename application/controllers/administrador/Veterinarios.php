<?php
require_once(APPPATH . 'controllers/administrador/Index.php');
/**
* Trabaja con datos de veterinario
*/
class Veterinarios extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Veterinario_model');
        $this->load->model('Usuario_model');
    }

    /**
    * Muestra la pagina de administracion de Veterinarios
    */
    public function Index()
    {
        $data['registros'] = $this->Veterinario_model->get();
        $data['campos'] = $this->Veterinario_model->get_fields();
        $data['usuarios'] = $this->Usuario_model->get();
        $paginas = array('veterinario_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
    * Muestra la pagina de modificacion de Veterinarios
    *
    * @param int $id id del veterinario a modificar
    */
    public function modificar($id)
    {
        $data['veterinario'] = $this->Veterinario_model->get($id);
        $data['campos'] = $this->Veterinario_model->get_fields();
        $data['usuarios'] = $this->Usuario_model->get();
        $this->view('veterinario_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar un veterinario
    */
    public function reg_add()
    {
        $this->Veterinario_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }

    /**
    * Recoge los valores del formulario para proceder a modificar un veterinario
    *
    * @param int $id id del veterinario a modificar
    */
    public function reg_mod($id)
    {
        $_POST['no_documento'] = $id;
        $this->Veterinario_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' . $this->uri->segment(2));
    }
}