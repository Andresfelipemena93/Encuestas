<?php
Class Configuracion_model extends CI_Model{
    function obtener($tipo, $datos = null)
	{
        switch($tipo) {
            default:
                return $this->db->get($tipo)->result();
            break;

            case 'barrios':
                $sql =
                "SELECT
                    ba.id,
                    ba.nombre,
                    ( SELECT COUNT( e.barrio_id ) FROM encuestas e WHERE e.barrio_id = ba.id GROUP BY e.barrio_id ) cantidad 
                FROM
                    barrios AS ba";
            
                return $this->db->query($sql)->result();
            break;

            case 'escolaridades':
                $sql =
                "SELECT
                    es.id,
                    es.nombre,
                    ( SELECT COUNT( e.escolaridad_id ) FROM encuestas e WHERE e.escolaridad_id = es.id GROUP BY e.escolaridad_id ) cantidad 
                FROM
                    escolaridades AS es";
            
                return $this->db->query($sql)->result();
            break;

            case 'generos':
                $sql =
                "SELECT
                    ge.id,
                    ge.nombre,
                    ( SELECT COUNT( e.genero_id ) FROM encuestas e WHERE e.genero_id = ge.id GROUP BY e.genero_id ) cantidad 
                FROM
                    generos AS ge";
            
                return $this->db->query($sql)->result();
            break;

            case 'encuesta_tema':
                return $this->db->where($datos)->get('encuestas_temas')->row();
            break;

            case 'rangos_edades':
                $sql =
                "SELECT
                    re.id,
                    re.nombre,
                    ( SELECT COUNT( e.edad_rango_id ) FROM encuestas e WHERE e.edad_rango_id = re.id GROUP BY e.edad_rango_id ) cantidad 
                FROM
                    rangos_edades AS re";
            
                return $this->db->query($sql)->result();
            break;

            case 'tema':
                return $this->db->where($datos)->get('temas')->row();
            break;

            case 'temas':
                $this->db->where('activo', 1);
                $orden = (isset($datos['ordenado'])) ? 'nombre' : 'rand()' ;
                $this->db->order_by($orden);
                return $this->db->get($tipo)->result();
            break;

            case 'respuestas_mas_seleccionadas':
                $sql =
                "SELECT
                    tp.descripcion,
                    COUNT( tp.id ) cantidad 
                FROM
                    respuestas AS r
                    INNER JOIN temas_preguntas AS tp ON r.tema_pregunta_id = tp.id
                    INNER JOIN temas AS t ON tp.tema_id = t.id 
                WHERE
                    tp.tema_id = {$datos['id_tema']} 
                GROUP BY
                    tp.id 
                ORDER BY
                    cantidad DESC";
            
                return $this->db->query($sql)->result();
            break;

            case 'temas_mas_seleccionados':
                $sql =
                "SELECT
                    t.nombre,
                    COUNT( t.nombre ) cantidad 
                FROM
                    respuestas AS r
                    INNER JOIN temas_preguntas AS tp ON r.tema_pregunta_id = tp.id
                    INNER JOIN temas AS t ON tp.tema_id = t.id 
                GROUP BY
                    t.id 
                HAVING
                    cantidad > 0 
                ORDER BY
                    cantidad DESC";
            
                return $this->db->query($sql)->result();
            break;

            case 'temas_preguntas':
                return $this->db->where($datos)->order_by('rand()')->get($tipo)->result();
            break;
        }
    }
}
/* Fin del archivo Configuracion_model.php */
/* Ubicación: ./application/models/Configuracion_model.php */