<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model(['sesion_model']);
    }

    function index()
	{
        $this->data['titulo'] = 'Bienvenido';
        $this->data['contenido_principal'] = 'sesion/index';
        $this->load->view('core/template', $this->data);
	}

    function cargar_respuestas()
	{
        $this->data['id_tema'] = $this->input->post('id_tema');
        $this->load->view('inicio/respuestas', $this->data);
	}

    function cerrar()
	{
        $this->session->sess_destroy();

        redirect(site_url('sesion'));
	}

    function iniciar()
	{
        // Se obtienen los datos que llegan por POST
        $datos = json_decode($this->input->post('datos'), true);

		// Se consultan los datos del usuario
		$usuario = $this->sesion_model->obtener('usuario', ['id' => $datos['id']]);

        // Se arma un arreglo con los datos de sesion que va a mantener
		$datos = [
			'usuario_id' => $usuario->id,
			'estado' => $usuario->id,
			'nombres' => $usuario->nombres,
			'apellidos' => $usuario->apellidos,
		];

        // Se inicia la sesión
        $this->session->set_userdata($datos);

		// Se cargan los datos a la sesión
        print json_encode($this->session->userdata());
	}

    function obtener_datos()
    {
        // Se obtienen los datos que llegan por POST
        $datos = json_decode($this->input->post('datos'), true);

        switch($datos['tipo']) {
            case 'usuario':
                $nombre_usuario = $datos['login'];
                $clave = sha1($datos['clave']);

                $resultado = $this->sesion_model->obtener('usuario', ['login' => $nombre_usuario, 'clave' => $clave]);
            break;

            case 'barrios':
                $resultado = $this->configuracion_model->obtener('barrios');
            break;

            case 'escolaridades':
                $resultado = $this->configuracion_model->obtener('escolaridades');
            break;

            case 'generos':
                $resultado = $this->configuracion_model->obtener('generos');
            break;

            case 'rangos_edades':
                $resultado = $this->configuracion_model->obtener('rangos_edades');
            break;
        }

        print json_encode($resultado);
    }
}
/* Fin del archivo Sesion.php */
/* Ubicación: ./application/controllers/Sesion.php */