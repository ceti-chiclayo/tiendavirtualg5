<div class="modal-header">
    <h4 class="modal-title">Registrar item</h4>
</div>
<form action="" id="formulario-agregar-item" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="producto_id">Producto:</label>
            <div class="col-sm-7 div-input">
                <select onchange="cargarPresentaciones()" name="producto_id" id="producto_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($productos as $producto) : ?>
                        <option value="<?php echo $producto->id ?>"><?php echo $producto->titulo ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="presentacion_id">Presentación</label>
            <div class="col-sm-7 div-input">
                <select name="presentacion_id" id="presentacion_id" class="form-control">
                    <option value="">Seleccione...</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="cantidad">Cantidad</label>
            <div class="col-sm-7 div-input">
                <input type="number" name="cantidad" id="cantidad" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_unitario">Precio</label>
            <div class="col-sm-7 div-input">
                <input type="number" name="precio_unitario" id="precio_unitario" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-agregar-item').addEventListener('submit', function (evento) {
        evento.preventDefault();
        agregarItem();
    });


    function agregarItem() {
        const datos = new FormData(document.getElementById('formulario-agregar-item'));
        axios.post('/compras/create/agregar_item', datos)
            .then(function (respuesta) {
                const mensaje = respuesta.data.message;
                toastr.success(mensaje);
                $('#modal-item').modal('hide');
                listarDetalle();
            })
            .catch(function (error) {
                let message = 'Ocurrió un error';
                if (error.response.data.message) {
                    message = error.response.data.message
                }
                toastr.error(message);
                if (error.response.status === 422) {
                    mostrarErrores(error.response.data.errores, 'formulario-agregar-item');
                }
            })
    }
</script>