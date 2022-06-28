<?php
/**
* Redirecciona al Login
*/
class Index extends CI_Controller {

    public function index()
    {
        redirect('/login');
    }
}