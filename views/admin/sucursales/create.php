<div class="modal-header">
    <h4 class="modal-title">Registrar sucursal</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-9 div-input">
                <input required type="text" name="nombre" id="nombre" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="direccion">Dirección</label>
            <div class="col-sm-9 div-input">
                <input required type="text" name="direccion" id="direccion" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="boton-submit-crear" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-crear').addEventListener('submit', function (evento) {
        evento.preventDefault();
        registrar();
    });

    function registrar() {
        const boton = document.getElementById('boton-submit-crear');
        boton.disabled = true;
        const formulario = document.getElementById('formulario-crear');
        const datos = new FormData(formulario);
        axios.post('/sucursales/store', datos)
            .then(function () {
                toastr.success('Registrado correctamente');
                $('#modal-sucursal').modal('hide');
                buscar();
            })
            .catch(function (error) {
                let message = 'Ocurrió un error';
                if (error.response.data.message) {
                    message = error.response.data.message
                }
                toastr.error(message);
                if (error.response.status === 422) {
                    mostrarErrores(error.response.data.errores, 'formulario-crear');
                }
            })
            .finally(function () {
                boton.disabled = false;
            });
    }
</script>