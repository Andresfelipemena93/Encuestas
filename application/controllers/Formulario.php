<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

class Formulario extends CI_Controller {
    public function index()
	{
		$this->data['titulo'] = 'Formulario';
        $this->data['contenido_principal'] = 'formulario/iniciar';
        $this->load->view('core/template', $this->data);
	}

    public function preguntas()
	{
        if(!$this->uri->segment(3)) redirect('sesion/cerrar');
        
		$this->data['id_encuesta'] = $this->uri->segment(3);
		$this->data['titulo'] = 'Preguntas';
        $this->data['contenido_principal'] = 'formulario/preguntas/index';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Formulario.php */
/* Ubicación: ./application/controllers/Formulario.php */