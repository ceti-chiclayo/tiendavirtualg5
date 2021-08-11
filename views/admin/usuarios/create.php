<div class="modal-header">
    <h4 class="modal-title">Registrar usuario</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="nombre_completo">Nombre completo</label>
            <div class="col-sm-7 div-input">
                <input type="text" required name="nombre_completo" id="nombre_completo" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="email">Correo electrónico</label>
            <div class="col-sm-7 div-input">
                <input type="email" required name="email" id="email" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="password">Contraseña</label>
            <div class="col-sm-7 div-input">
                <input type="password" required name="password" id="password" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="password_confirmacion">Confirmar contraseña</label>
            <div class="col-sm-7 div-input">
                <input type="password" required name="password_confirmacion" id="password_confirmacion"
                       class="form-control"/>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="boton-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-crear').addEventListener('submit', function (evento) {
        evento.preventDefault();
        registrar();
    });

    function registrar() {
        const boton = document.getElementById('boton-submit');
        boton.disabled = true;
        const formulario = document.getElementById('formulario-crear');
        const datos = new FormData(formulario);
        axios.post('/usuarios/store', datos)
            .then(function () {
                toastr.success('Registrado correctamente');
                $('#modal-usuario').modal('hide');
                buscar();
            })
            .catch(function (error) {
                mostrarErrores(error.response.data.errores, 'formulario-crear');
                toastr.error('Error al registrar');
            })
            .finally(function () {
                boton.disabled = false;
            });
    }
</script>