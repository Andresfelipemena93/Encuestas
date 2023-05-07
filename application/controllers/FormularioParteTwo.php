<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

class FormularioParteTwo extends CI_Controller {
   
    
    public function index()
	{
		$this->data['titulo'] = 'FormularioParteTwo';
        $this->data['contenido_principal'] = 'encuestaTwo/index';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Inicio.php */
/* Ubicación: ./application/controllers/Inicio.php */
