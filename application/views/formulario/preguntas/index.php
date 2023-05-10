<?php $this->load->view('formulario/preguntas/navbar'); ?>

<div  class="main-container">
  	<div id="main">
    	<div class="container">
			<header class="header">
				<h1 id="title" class="text-center welcome">BIENVENID@</h1>

				<p id="description" class="description text-center">
					<strong>
					Del siguiente listado de temas seleccione a su criterio los 5 temas de mayor interes para un mejor funcionamiento de nuestro municipio
					</strong>
				</p>
			</header>

			<div class="form-group survey-form">
				<p>
					¿Qué le gustaría ver mejorado?
					<span class="clue">(Marque sólo 5 temas)</span>
				</p>

				<?php foreach($this->configuracion_model->obtener('temas') as $tema) { ?>
					<label>
						<input name="prefer" value="front-end-projects" id="<?php echo $tema->id; ?>" type="checkbox" class="input-checkbox" /> <?php echo $tema->nombre; ?>
					</label>
				<?php } ?>
          </div>
          <div class="form-group">
            	<button type="submit" id="submit" class="submit-button">
               		<strong class="text-send">Continuar</strong> 
            	</button>
          </div>
		</div>
	</div>
</div>       