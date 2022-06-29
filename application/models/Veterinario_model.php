<?php
require_once(APPPATH . 'models/Base_model.php');
/**
* Modelo de Veterinario
*
* Permite interactuar con los datos de veterinario de la base de datos
*/
class Veterinario_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'veterinarios';
        $this->id = 'no_documento';
    }

    /**
    * Retorna el datos de veterinario del usuario indicado por id
    *
    * @param int $id id del usuario
    * @return string datos veterinario si existe coincidencia entre el id de usuario y un veterinario
    * @return boolean false si no se encuentra coincidencia
    */
    public function get_veterinario_desde_usuario($id)
    {
        $this->db->where('id_usuario', $id);
        $query = $this->db->get($this->tabla);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
        return false;
    }
}
