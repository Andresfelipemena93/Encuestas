mostrarNotificacion = (tipo, mensaje, tiempo = 2000) => {
    switch (tipo) {
        case 'exito':
            titulo = 'Éxito'
            icono = 'success'
        break;

        case 'error':
            titulo = 'Error'
            icono = 'error'
        break;

        case 'alerta':
            titulo = 'Alerta'
            icono = 'warning'
        break;

        case 'info':
            titulo = 'Información'
            icono = 'info'
        break;

        case 'pregunta':
            titulo = 'Pregunta'
            icono = 'question'
        break;
    }

    Swal.fire({
        confirmButtonText: 'Aceptar',
        icon: icono,
        // position: 'top-end',
        html: mensaje,
        timer: tiempo,
        title: titulo,
    })
}

promesa = (url, opciones) => {
    return new Promise((resolve, reject) => {
        // Datos a enviar                
        var datos = new FormData()
        datos.append('datos', JSON.stringify(opciones))

        // Creación de solicitud http
        const xhttp = new XMLHttpRequest()
        xhttp.open(`POST`, url, true)

        // Cuando cambie el estado
        xhttp.onreadystatechange = (() => {
            if(xhttp.readyState === 4) {
                // Si el estado es exitoso
                (xhttp.status === 200)
                    ? resolve(JSON.parse(xhttp.responseText)) // Envía el string del peso
                    : reject(new Error('Error', url)) // Envía el error
            }
        })

        // Se envía la solicitud
        xhttp.send(datos)
    }) 
}

validarCamposObligatorios = campos => {
    // Para iniciar, el resultado es exitoso
    let exito = true

    //Recorrido para validar cada campo
    for (var i = 0; i < campos.length; i++){
        // Se remueve la validación a todos los campos
        $(`.invalid-feedback`).remove()
        campos[i].removeClass(`is-invalid`)

        // Si el campo está vacío
        if($.trim(campos[i].val()) == "") {
            // El resultado cambia a falso
            exito = false
            
            // Se marcan los campos en rojo con un mensaje
            campos[i].addClass(`is-invalid`)
            // campos[i].after(`<div class="invalid-feedback">Este campo no puede estar vacío</div>`)
        }
    }

    return exito
}