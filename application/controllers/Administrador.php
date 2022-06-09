<?php
class Administrador extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('currently_logged_in')) {
            $this->load->view('templates/header');
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
        }
        else {
            redirect('login');
        }
    }
}
