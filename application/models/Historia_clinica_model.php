<?php
require_once(APPPATH . 'models/Base_model.php');
/**
* Modelo de historia clinica
*
* Permite interactuar con los datos de historia clinica de la base de datos
*/
class Historia_clinica_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'historias_clinicas';
        $this->id = 'id';
    }
}
