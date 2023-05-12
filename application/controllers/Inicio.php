<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

class Inicio extends CI_Controller {
    function __construct() {
        parent::__construct();

        // Si no se ha iniciado sesión, se redirecciona al inicio
        if(!$this->session->userdata('usuario_id')) redirect('sesion/cerrar');
    }
    
    public function index()
	{
		$this->data['titulo'] = 'Admin';
        $this->data['contenido_principal'] = 'inicio/index';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Inicio.php */
/* Ubicación: ./application/controllers/Inicio.php */
