<?php
Class Encuestas_model extends CI_Model{
    function crear($tabla, $datos) {    
        $this->db->insert($tabla, $datos);
        return $this->db->insert_id();
    }
}
/* Fin del archivo Encuestas_model.php */
/* Ubicación: ./application/models/Encuestas_model.php */