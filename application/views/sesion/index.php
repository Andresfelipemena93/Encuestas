<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Formulario Construyendo futuro - Equipo Sopetrán</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="login" placeholder="Ingrese su correo">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="clave" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Recordarme</label>
                                        </div>
                                    </div>
                                    <a onClick="javascript:validarSesion()" class="btn btn-primary btn-user btn-block">
                                        Iniciar Sesión
                                    </a>
                                    <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Ingresar con Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Ingresar con Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Recuperar contraseña</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Solicitar un usuario</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    validarSesion = async() => {
		let nombreUsuario = $('#login')
		let clave = $('#clave')

		let campos = [
			nombreUsuario,
			clave,
		]

		// Validación de campos obligatorios
		if (!validarCamposObligatorios(campos)) {
			mostrarNotificacion('alerta', 'Hay campos obligatorios por diligenciar')
			return false
		} 

		let datos = {
			tipo: 'usuario',
			login: $.trim(nombreUsuario.val()),
			clave: $.trim(clave.val()),
		}

		let usuario = await promesa("<?php echo site_url('sesion/obtener_datos'); ?>", datos)

		// Si no se encontró el usuario
		if(!usuario) {
			mostrarNotificacion('alerta', 'El usuario y clave que ha digitado no existen en la base de datos. Por favor verifique nuevamente.')
			return false
		}

		// Si el usuario está desactivado
		if(usuario.estado == 0) {
			mostrarNotificacion('error', `El usuario ${nombreUsuario.val()} se encuentra desactivado.`)
			return false
		}

		// Se genera el inicio de sesión
		let sesion = await promesa("<?php echo site_url('sesion/iniciar'); ?>", {id: usuario.id})
		
		// Si tuvo éxito, se redirecciona
		if(sesion) location.href = '<?php echo site_url('inicio'); ?>'
	}

    $().ready(() => {
        $('form').on('submit', event => {
			// event.preventDefault()
			
            // validarSesion()
        })
    })
</script>