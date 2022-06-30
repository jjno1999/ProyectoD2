<?php
require_once(APPPATH . 'controllers/veterinario/Index.php');
/**
* Trabaja con datos de Historias clinicas
*/
class Historias_clinicas extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Historia_clinica_model');
        $this->load->model('Veterinario_model');
        $this->load->model('Mascota_model');
    }

    /**
    * Muestra la pagina de administracion de Historias clinicas
    */
    public function Index()
    {
        $data['registros'] = $this->Historia_clinica_model->get();
        $data['veterinarios'] = $this->Veterinario_model->get();
        $data['mascotas'] = $this->Mascota_model->get();
        $data['campos'] = $this->Historia_clinica_model->get_fields();
        $paginas = array('veterinario/historia_clinica_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
    * Muestra la pagina de modificacion de Historia clinica
    *
    * @param int $id id de la Historia clinica a modificar
    */
    public function modificar($id)
    {
        $data['historia_clinica'] = $this->Historia_clinica_model->get($id);
        $data['veterinarios'] = $this->Veterinario_model->get();
        $data['mascotas'] = $this->Mascota_model->get();
        $data['campos'] = $this->Historia_clinica_model->get_fields();
        $this->view('veterinario/historia_clinica_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar una Historia clinica
    */
    public function reg_add()
    {
        $_POST['no_documento_veterinario'] = $this->session->userdata('veterinario')['no_documento'];
        $this->Historia_clinica_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }

    /**
    * Recoge los valores del formulario para proceder a modificar una Historia clinica
    *
    * @param int $id id de la Historia clinica a modificar
    */
    public function reg_mod($id){
        $_POST['id'] = $id;
        $this->Historia_clinica_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }
}