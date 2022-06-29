<?php
require_once(APPPATH . 'controllers/administrador/Index.php');
/**
* Trabaja con datos de mascota
*/
class Mascotas extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mascota_model');
        $this->load->model('Cliente_model');
    }

    /**
    * Muestra la pagina de administracion de mascotas
    */
    public function Index()
    {
        $data['registros'] = $this->Mascota_model->get();
        $data['clientes'] = $this->Cliente_model->get();
        $data['campos'] = $this->Mascota_model->get_fields();
        $paginas = array('mascota_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
    * Muestra la pagina de modificacion de mascota
    *
    * @param int $id id de la mascota a modificar
    */
    public function modificar($id)
    {
        $data['mascota'] = $this->Mascota_model->get($id);
        $data['clientes'] = $this->Cliente_model->get();
        $data['campos'] = $this->Mascota_model->get_fields();
        $this->view('mascota_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar una mascota
    */
    public function reg_add()
    {
        $this->Mascota_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }

    /**
    * Recoge los valores del formulario para proceder a modificar una mascota
    *
    * @param int $id id de la mascota a modificar
    */
    public function reg_mod($id){
        $_POST['id'] = $id;
        $this->Mascota_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }
}