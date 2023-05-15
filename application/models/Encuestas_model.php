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

    function obtener($tipo, $datos = null)
	{
        switch($tipo) {
            default:
                return $this->db->get($tipo)->result();
            break;

            case 'encuestas':
                $sql = 
                "SELECT
                    en.fecha_creacion,
                    en.nombres,
                    es.nombre AS escolaridad,
                    ge.nombre AS genero,
                    ba.nombre AS barrio,
                    re.nombre AS rango_edad,
                    en.telefono,
                    (
                    SELECT
                        SUM((
                            SELECT
                                COUNT( r.id ) 
                            FROM
                                respuestas AS r
                                INNER JOIN temas_preguntas AS tp ON r.tema_pregunta_id = tp.id 
                            WHERE
                                r.encuesta_id = et.encuesta_id 
                                AND tp.tema_id = et.tema_id 
                            )) 
                    FROM
                        encuestas_temas AS et 
                    WHERE
                        et.encuesta_id = en.id 
                    ) AS total_respuestas 
                FROM
                    encuestas AS en
                    INNER JOIN escolaridades AS es ON en.escolaridad_id = es.id
                    INNER JOIN generos AS ge ON en.genero_id = ge.id
                    INNER JOIN barrios AS ba ON en.barrio_id = ba.id
                    INNER JOIN rangos_edades AS re ON en.edad_rango_id = re.id 
                ORDER BY
                    en.fecha_creacion DESC";
                    
                return $this->db->query($sql)->result();
            break;
        }
    }
}
/* Fin del archivo Encuestas_model.php */
/* Ubicación: ./application/models/Encuestas_model.php */