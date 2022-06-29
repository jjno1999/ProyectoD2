<?php
/**
* Modelo Base
*
* Permite interactuar con los datos de la base de datos
*/
class Base_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = NULL;
        $this->id = NULL;
    }

    /**
    * Retorna los campos de la tabla
    *
    * @return array arreglo de campos
    */
    public function get_fields()
    {
        $this->db->select('COLUMN_NAME');
        $this->db->where('TABLE_NAME', $this->tabla);
        $query = $this->db->get('INFORMATION_SCHEMA.COLUMNS');

        $columnas = array();
        foreach($query->result_array() as $row)
        {
            array_push($columnas, $row['COLUMN_NAME']);
        }
        return $columnas;
    }

    /**
    * Retorna un registro por su id
    *
    * @param int $id id del registro
    * @return array arreglo de registros si no se define $id
    * @return array registro si el registro existe
    * @return boolean false si el registro no existe
    */
    public function get($id = NULL)
    {
        if($id)
        {
            $this->db->where($this->id, $id);
            $query = $this->db->get($this->tabla);
            if ($query->num_rows() == 1) {
                return $query->row_array();
            }
            return false;
        }
        else
        {
            $this->db->order_by($this->id, 'DESC');
            $query = $this->db->get($this->tabla);
            return $query->result_array();
        }
    }

    /**
    * Inserta un registro a la tabla
    *
    * @param array $data datos del registro a ingresar
    * @return boolean true si la operacion fue exitosa
    */
    public function add($data)
    {
        $query = $this->db->insert($this->tabla, $data);
        return $query;
    }

    /**
    * Modifica un registro de la tabla
    *
    * @param array $data datos del registro a modificar
    * @return boolean true si la operacion fue exitosa
    */
    public function mod($data)
    {
        $this->db->where($this->id, $data[$this->id]);
        $query = $this->db->update($this->tabla, $data);
        return $query;
    }
}
