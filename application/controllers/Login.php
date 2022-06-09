<?php
class Login extends CI_Controller {

    public function login_action() {
        $this->load->model('Login_Model');
        $this->load->helper('security');  
        $this->load->library('form_validation');  
        
  
        $data = array(  
            'usuario' => $this->input->post('usuario'),  
            'password' => $this->input->post('password'),  
            'currently_logged_in' => 1  
        );    

        if ($this->Login_Model->validacion($data)) {  
            $this->session->set_userdata($data);  
            redirect('pages/view/dashboard');  
            echo $this->session->all_userdata();
        }   
        else {  
            redirect('pages/view/login');
        }  
    }  

    public function signin_validation() {  
        $this->load->library('form_validation');  
  
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[signup.username]');  
  
        $this->form_validation->set_rules('password', 'Password', 'required|trim');  
  
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');  
  
        $this->form_validation->set_message('is_unique', 'username already exists');  
  
    if ($this->form_validation->run())  
        {  
            echo "Welcome, you are logged in.";  
         }   
            else {  
              
            $this->load->view('signin');  
        }  
    }  
}