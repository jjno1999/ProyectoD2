<?php
require_once(APPPATH . 'models/Base_model.php');
/**
* Modelo de usuario
*
* Permite interactuar con los datos de usuario de la base de datos
*/
class Usuario_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'usuarios';
        $this->id = 'id';
    }
    
    /**
    * Verifica si el usuario esta en la base de datos y es valido
    *
    * @param array $usuario arreglo de datos del usuario ingresado por post
    * @return array usuario si el usuario es valido
    * @return boolean false si el usuario es no valido
    */
    public function validar($usuario)
    {
        $this->db->where($usuario);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {
            if ($query->row_array()['estado'] == 'activo') {
                return $query->row_array();
            }
        }
        return false;
    }
    
    /**
    * Retorna los usuarios veterinarios
    *
    * @return array arreglo de usuarios de tipo veterinario
    */
    public function get_veterinarios()
    {
        $this->db->order_by($this->id, 'DESC');
        $this->db->where('rol', 'veterinario');
        $query = $this->db->get($this->tabla);
        return $query->result_array();
    }
}
