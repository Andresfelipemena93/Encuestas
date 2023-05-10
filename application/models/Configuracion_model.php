<?php
Class Configuracion_model extends CI_Model{
    function obtener($tipo, $datos = null)
	{
        switch($tipo) {
            default:
                return $this->db->get($tipo)->result();
            break;

            case 'encuesta_tema':
                return $this->db->where($datos)->get('encuestas_temas')->row();
            break;

            case 'tema':
                return $this->db->where($datos)->get('temas')->row();
            break;

            case 'temas':
                return $this->db->where('activo', 1)->order_by('rand()')->get($tipo)->result();
            break;

            case 'temas_preguntas':
                return $this->db->where($datos)->order_by('rand()')->get($tipo)->result();
            break;
        }
    }
}
/* Fin del archivo Configuracion_model.php */
/* Ubicación: ./application/models/Configuracion_model.php */