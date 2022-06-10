<?php
class Login extends CI_Controller
{

    public function index()
    {
        if($this->session->userdata('logged_in')){
            redirect($this->session->userdata('rol'));
        }
        $this->load->view('templates/base');
        $this->load->view('login');
    }

    public function log_in()
    {
        $this->load->model('Usuario_model');
        $this->load->helper('security');
        $this->load->library('form_validation');

        if ($this->Usuario_model->validacion()) {
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
