<?php
$this->load->view('formulario/temas/navbar');

// Se consulta cada registro de los 5 seleccionados
$registro = $this->configuracion_model->obtener('encuesta_tema', ['encuesta_id' => $id_encuesta, 'posicion' => $numero_pregunta]);

// Se consulta el tema correspondiente
$tema =  $this->configuracion_model->obtener('tema', ['id' => $registro->tema_id]);

// Se obtienen las preguntas del tema
$preguntas =  $this->configuracion_model->obtener('temas_preguntas', ['tema_id' => $tema->id, 'activo' => 1]);
?>

<div  class="main-container">
  	<div id="main">
    	<div class="container">
			<header class="header">
				<h1 id="title" class="text-center welcome">PREGUNTA <?php echo $registro->posicion; ?> - <?php echo $tema->nombre; ?></h1>

				<p id="description" class="description text-center">
					<strong>
                        ¿Qué cree usted que debamos mejorar en <?php echo $tema->nombre; ?>? Seleccione a su criterio, los <?php echo $tema->limite; ?> de mayor interés.
					</strong>
				</p>
			</header>

			<div class="form-group survey-form">
				<!-- <p>
					¿Qué le gustaría ver mejorado?
					<span class="clue">(Marque todo lo que corresponda)</span>
				</p> -->

				<?php foreach($preguntas as $pregunta) { ?>
					<label>
						<input value="<?php echo $pregunta->id; ?>" id="<?php echo $pregunta->id; ?>" type="checkbox" class="input-checkbox" /> <?php echo $pregunta->descripcion; ?>
					</label>
				<?php } ?>
	        </div>
			<div class="form-group">
            	<button type="submit" id="submit" class="submit-button"  onClick="javascript:siguientePregunta(<?php echo $registro->posicion; ?>)">
               		<strong class="text-send">Continuar</strong>
            	</button>
          	</div>
		</div>
	</div>
</div>

<script>
	siguientePregunta = async(posicionActual) => {
		var cantidadSeleccionados = 0
		var respuestas = []
		var limite = parseInt('<?php echo $tema->limite; ?>')

		$('input[type=checkbox]').each(function () {
			if(this.checked) respuestas.push({
				tema_pregunta_id: $(this).val(),
				encuesta_id: <?php echo $id_encuesta; ?>,
			})
		})

		if(respuestas.length < limite || respuestas.length > limite) {
			mostrarNotificacion('alerta', `Debe seleccionar ${limite} preguntas. Selecionó ${respuestas.length}`)
			return false
		}

		let respuestasSeleccionadas = await promesa("<?php echo site_url('encuestas/crear'); ?>", {datos: respuestas, tipo: 'respuestas'})
		
		if(respuestasSeleccionadas) {
            if(posicionActual < 5) location.assign(`<?php echo site_url('formulario/preguntas'); ?>/${<?php echo $id_encuesta; ?>}/${posicionActual+1}`)
            if(posicionActual == 5) location.assign(`<?php echo site_url('formulario/fin'); ?>`)
        }
	}
</script>