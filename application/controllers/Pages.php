<?php
class Pages extends CI_Controller {

    public function index()
    {
        $this->view('home');
    }

    public function view($page = 'home')
    {
        $this->load->view('templates/header');
        $this->load->view('/'.$page);
        $this->load->view('templates/footer');
    }
}