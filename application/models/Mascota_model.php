<?php
require_once(APPPATH . 'models/Base_model.php');
/**
* Modelo de mascota
*
* Permite interactuar con los datos de usuario de la base de datos
*/
class Mascota_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'mascotas';
        $this->id = 'id';
    }
}
