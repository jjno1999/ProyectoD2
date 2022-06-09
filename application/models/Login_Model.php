<?php
class Login_Model extends CI_Model {

    public $usuario;
    public $password;

    public function validacion(){
        $this->db->where('nombre', $this->input->post('nombre'));  
        $this->db->where('password', $this->input->post('password')); 

        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) { 
            $data = array(
                'nombre' => $query->row_array()['nombre'],
                'password' => $query->row_array()['password'],
                'rol' => $query->row_array()['rol'],
                'currently_logged_in' => 1
            );
            $this->session->set_userdata($data);
            return true; 
        }

        return false;
    }
}
