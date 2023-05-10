<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

class Encuestas extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model(['encuestas_model']);
    }

    function crear() {
        $datos = json_decode($this->input->post('datos'), true);
        $tabla = $datos['tipo'];
        unset($datos['tipo']);

        $datos['fecha_creacion'] = date("Y-m-d H:i:s");

        print json_encode(['resultado' => $this->encuestas_model->crear($tabla, $datos)]);
    }
}
/* Fin del archivo Encuestas.php */
/* Ubicación: ./application/controllers/Encuestas.php */