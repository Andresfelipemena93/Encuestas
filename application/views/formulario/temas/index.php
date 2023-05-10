<?php $this->load->view('formulario/temas/navbar'); ?>

<div  class="main-container">
  	<div id="main">
    	<div class="container">
			<header class="header">
				<h1 id="title" class="text-center welcome">BIENVENID@</h1>

				<p id="description" class="description text-center">
					<strong>
						Por favor sólo selecciona 5 temas de los cuales te gustaría responder la encuesta
					</strong>
				</p>
			</header>

			<div class="form-group survey-form">
				<p>
					¿Qué le gustaría ver mejorado?
					<span class="clue">(Marque todo lo que corresponda)</span>
				</p>

				<?php foreach($this->configuracion_model->obtener('temas') as $tema) { ?>
					<label>
						<input value="<?php echo $tema->id; ?>" id="<?php echo $tema->id; ?>" type="checkbox" class="input-checkbox" /> <?php echo $tema->nombre; ?>
					</label>
				<?php } ?>
	        </div>
			<div class="form-group">
            	<button type="submit" id="submit" class="submit-button" onClick="javascript:cargarTemas()">
               		<strong class="text-send">Continuar</strong>
            	</button>
          	</div>
		</div>
	</div>
</div>

<script>
	cargarTemas = async() => {
		var cantidadSeleccionados = 0
		var temas = []
		var posicion = 1

		$('input[type=checkbox]').each(function () {
			if(this.checked) temas.push({
				tema_id: $(this).val(),
				encuesta_id: <?php echo $id_encuesta; ?>,
				posicion: posicion++
			})
		})

		if(temas.length < 5 || temas.length > 5) {
			mostrarNotificacion('alerta', `Debe seleccionar 5 preguntas. Selecionó ${temas.length}`)
			return false
		}

		let temasSeleccionados = await promesa("<?php echo site_url('encuestas/crear'); ?>", {datos: temas, tipo: 'encuestas_temas'})
		
		if(temasSeleccionados) location.assign(`<?php echo site_url('formulario/preguntas'); ?>/${<?php echo $id_encuesta; ?>}/1`)
	}
</script>