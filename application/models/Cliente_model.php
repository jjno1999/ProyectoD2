<?php
require_once(APPPATH . 'models/Base_model.php');
/**
* Modelo del cliente
*
* Permite interactuar con los datos de cliente de la base de datos
*/
class Cliente_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = 'clientes';
        $this->id = 'no_documento';
    }
}
