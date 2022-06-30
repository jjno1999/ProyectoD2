<?php
require_once(APPPATH . 'controllers/administrador/Index.php');
/**
 * Trabaja con datos de cliente
 */
class Clientes extends Index
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_model');
    }

    /**
     * Muestra la pagina de administracion de clientes
     */
    public function Index()
    {
        $data['registros'] = $this->Cliente_model->get();
        $data['campos'] = $this->Cliente_model->get_fields();
        $paginas = array('administrador/cliente_add', 'tabla_admin_registros');
        $this->view($paginas, $data);
    }

    /**
     * Muestra la pagina de modificacion de cliente
     *
     * @param int $id id del cliente a modificar
     */
    public function modificar($id)
    {
        $data['cliente'] = $this->Cliente_model->get($id);
        $data['campos'] = $this->Cliente_model->get_fields();
        $this->view('administrador/cliente_mod', $data);
    }

    /**
     * Recoge los valores del formulario para proceder a registrar un cliente
     */
    public function reg_add()
    {
        $this->Cliente_model->add($_POST);
        redirect($this->session->userdata('rol') . '/' . $this->uri->segment(2));
    }

    /**
     * Recoge los valores del formulario para proceder a modificar un cliente
     *
     * @param int $id id del cliente a modificar
     */
    public function reg_mod($id)
    {
        $_POST['no_documento'] = $id;
        $this->Cliente_model->mod($_POST);
        redirect($this->session->userdata('rol') . '/' . $this->uri->segment(2));
    }
}
