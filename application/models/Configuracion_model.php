<?php
Class Configuracion_model extends CI_Model{
    function obtener($tipo, $datos = null)
	{
        switch($tipo) {
            default:
                return $this->db->get($tipo)->result();
            break;

            case 'temas':
                return $this->db->where('activo', 1)->get($tipo)->result();
            break;
        }
    }
}
/* Fin del archivo Configuracion_model.php */
/* Ubicación: ./application/models/Configuracion_model.php */