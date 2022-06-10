<?php
class Auth_privilegiado extends CI_Controller
{
    public function view($page, $data = []) {
        $this->login_check();
        $this->load->view('templates/base');
        $this->load->view('templates/header');
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    public function login_check() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
}