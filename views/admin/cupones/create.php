<div class="modal-header">
    <h4 class="modal-title">Registrar cupon</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="tipo">Tipo</label>
            <div class="col-sm-9 div-input">
                <select required name="tipo" id="tipo" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($tipos as $value) : ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="codigo">Codigo</label>
            <div class="col-sm-9 div-input">
                <input required type="text" name="codigo" id="codigo" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="monto">Monto</label>
            <div class="col-sm-9 div-input">
                <input required type="number" name="monto" id="monto" class="form-control"/>
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
        axios.post('/cupones/store', datos)
            .then(function () {
                toastr.success('Registrado correctamente');
                $('#modal-cupon').modal('hide');
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