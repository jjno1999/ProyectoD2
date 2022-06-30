<?php
require_once(APPPATH . 'controllers/administrador/Index.php');
/**
* Trabaja con datos de Factura
*/
class Facturas extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->model('Historia_clinica_model');
    }

    /**
    * Muestra la pagina de administracion de Facturas
    */
    public function Index()
    {
        $data['registros'] = $this->Factura_model->get();
        $data['historias_clinicas'] = $this->Historia_clinica_model->get();
        $data['campos'] = $this->Factura_model->get_fields();
        $paginas = array('administrador/factura_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
    * Muestra la pagina de modificacion de Factura
    *
    * @param int $id id de la Factura a modificar
    */
    public function modificar($id)
    {
        $data['factura'] = $this->Factura_model->get($id);
        $data['historias_clinicas'] = $this->Historia_clinica_model->get();
        $data['campos'] = $this->Factura_model->get_fields();
        $this->view('administrador/factura_mod', $data);
    }

    /**
    * Recoge los valores del formulario para proceder a registrar una Factura
    */
    public function reg_add()
    {
        $this->Factura_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }

    /**
    * Recoge los valores del formulario para proceder a modificar una Factura
    *
    * @param int $id id de la Factura a modificar
    */
    public function reg_mod($id){
        $_POST['id'] = $id;
        $this->Factura_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' .$this->uri->segment(2));
    }
}