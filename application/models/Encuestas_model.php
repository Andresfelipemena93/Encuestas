<?php
Class Encuestas_model extends CI_Model{
    function crear($tabla, $datos) {
        switch($tabla) {
            default:
                $this->db->insert($tabla, $datos);
                return $this->db->insert_id();
            break;

            case 'encuestas_temas':
                return $this->db->insert_batch($tabla, $datos['datos']);
            break;

            case 'respuestas':
                return $this->db->insert_batch($tabla, $datos['datos']);
            break;
        }
        
    }
}
/* Fin del archivo Encuestas_model.php */
/* Ubicación: ./application/models/Encuestas_model.php */