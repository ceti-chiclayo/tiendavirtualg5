/**
 * Función para lanzar alertas usando librería toastr
 * @param {String} mensaje
 * @param {String} tipo
 */
function emitirMensaje(mensaje, tipo = 'info') {
    switch (tipo) {
        case 'error':
            toastr.error(mensaje);
            break
        case 'success':
            toastr.success(mensaje);
            break
        case 'warning':
            toastr.warning(mensaje);
            break
        default:
            toastr.info(mensaje);
            break
    }
}

function quitarMensajesErrorValidation(formulario_id) {
    const formulario = document.getElementById(formulario_id);
    const campos_formulario = formulario.elements;
    for (let i = 0; i < campos_formulario.length; i++) {
        campos_formulario[i].classList.remove("is-invalid");
    }
}

/**
 * Función para mostrar errores que sean retornados por el servidor
 * @param errores
 * @param formulario_id
 */
function mostrarErrores(errores, formulario_id) {
    const formulario = document.getElementById(formulario_id);
    quitarMensajesErrorValidation(formulario_id);
    // const campos_formulario = formulario.elements;
    // for (let i = 0; i < campos_formulario.length; i++) {
    //     campos_formulario[i].classList.remove("is-invalid");
    // }
    const campos_con_errores = Object.keys(errores);
    campos_con_errores.map(function (item) {
        const campo = $(`#${formulario_id} [name=${item}]`);
        if (campo.length) {
            campo.addClass('is-invalid');
            let div_error = $('#div_error_' + item);
            if (div_error.length) {
                div_error.html(errores[item][0]);
            } else {
                div_error = `<div class="invalid-feedback" id="div_error_${item}">${errores[item][0]}</div>`;
                campo.parent().append(div_error);
            }
        }
    });
}