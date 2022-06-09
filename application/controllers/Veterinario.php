<?php
class Veterinario extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('veterinario');
        $this->load->view('templates/footer');
    }
