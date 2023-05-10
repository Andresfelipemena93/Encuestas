<div class="container my-2">
  	<div class="wrapper d-flex col-12 justify-content-center  rounded p-4 form mt-5">
    	<div class="rounded rounded-lg shadow-lg position-absolute card-bg"></div>
		<div class="grid-form col-12 col-md-8 col-sm-12 col-lg-8 pb-5 px-5 rounded rounded-lg shadow-lg d-flex flex-column aling-items-center card_main">
			<img src="https://cdn.pixabay.com/photo/2023/05/05/04/22/internet-7971453_960_720.png" alt="equiposopetran">
			<div>
				<h4 class="title-main-encuesta">
					ENCUESTA DE PERCEPCIÓN TERRITORIAL. <br> SOPETRÁN - ANTIOQUIA.
				</h4>
				<span class="descripcion-encuesta">
					La siguiente encuesta tiene como objetivo establecer un diagnóstico barrial y veredal en el Municipio de SOPETRÁN - ANTIOQUIA de las diferentes problemáticas que aquejan a los habitantes del territorio, para buscar soluciones que se conviertan en políticas públicas en el programa de Gobierno.
				</span>
				<br><br>
			</div>
			<form action="">
				<div class="form-group d-flex flex-column mx-auto  mt-5  filtros_text" >
					<label for="nombres">Nombres completos *</label>
					<input type="text" id="nombres" class="form-control" autofocus>
				</div>

				<div class="form-group d-flex flex-column mx-auto  filtros_text">
					<label for="escolaridad">Escolaridad *</label>
					<select id="escolaridad" class="form-control" >
						<option disabled selected value>Seleccione</option>
						<?php foreach($this->configuracion_model->obtener('escolaridades') as $escolaridad) echo "<option value='$escolaridad->id'>$escolaridad->nombre</option>"; ?>
					</select>
				</div>

				<div class="form-group d-flex flex-column mx-auto filtros_text">
					<label for="genero">Género *</label>
					<select id="genero" class="form-control" >
						<option disabled selected value>Seleccione</option>
						<?php foreach($this->configuracion_model->obtener('generos') as $genero) echo "<option value='$genero->id'>$genero->nombre</option>"; ?>
					</select>
				</div>

				<div class="form-group d-flex flex-column mx-auto  filtros_text">
					<label for="barrio">Barrio o Vereda</label>
					<select id="barrio" class="form-control" >
						<option disabled selected value>Seleccione</option>
						<?php foreach($this->configuracion_model->obtener('barrios') as $barrio) echo "<option value='$barrio->id'>$barrio->nombre</option>"; ?>
					</select>
				</div>

				<div class="form-group d-flex flex-column mx-auto filtros_text">
					<label for="edad">Edad</label>
					<input type="number" id="edad" class="form-control">
				</div>

				<div class="from-group btn-encuesta-start">
					<input type="submit" class="btn btn-primary btn-encuesta" value="Iniciar la encuesta">
				</div>

				<img src="/img/login.jpg" alt="">
			</form>
    	</div>
  	</div>
</div>

<script>
	$().ready(() => {
		$('form').submit(async(evento) => {
			evento.preventDefault()

			let nombres = $('#nombres')
			let escolaridadId = $('#escolaridad')
			let generoId = $('#genero')
			let barrioId = $('#barrio')
			let edad = $('#edad')

			let campos = [
				nombres,
				escolaridadId,
			]

			// Validación de campos obligatorios
			if (!validarCamposObligatorios(campos)) {
				mostrarNotificacion('alerta', 'Hay campos obligatorios por diligenciar')
				return false
			}

			let datos = {
				tipo: 'encuestas',
				nombres: nombres.val(),
				edad: edad.val(),
				barrio_id: barrioId.val(),
				genero_id: generoId.val(),
				escolaridad_id: escolaridadId.val(),
			}
			
			let encuesta = await promesa("<?php echo site_url('encuestas/crear'); ?>", datos)
			console.log(encuesta)
			
			location.assign(`<?php echo site_url('formulario/preguntas'); ?>/${encuesta.resultado}`)
		})
	})
</script>