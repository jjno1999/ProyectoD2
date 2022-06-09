<?php
class Login_Model extends CI_Model {

    public $usuario;
    public $password;

    public function validacion($data){
        $this->db->where('nombre', $this->input->post('usuario'));  
        $this->db->where('password', $this->input->post('password')); 

        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {  
            return true; 
        }

        return false;
    }
}
?>