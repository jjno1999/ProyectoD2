<?php
class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function log_in()
    {
        $this->load->model('Login_Model');
        $this->load->helper('security');
        $this->load->library('form_validation');

        if ($this->Login_Model->validacion()) {
            redirect($this->session->userdata('rol'));
        } else {
            redirect('login');
        }
    }

    public function log_out() {
        $this->session->sess_destroy();  
        redirect('login');  
    }
}
