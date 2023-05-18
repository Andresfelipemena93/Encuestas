<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

class Terminos extends CI_Controller {
 
    public function index()
	{
		$this->data['titulo'] = 'Terminos';
        $this->data['contenido_principal'] = 'formulario/terminos';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Formulario.php */
/* Ubicación: ./application/controllers/Formulario.php */