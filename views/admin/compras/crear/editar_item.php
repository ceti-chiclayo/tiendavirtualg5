<div class="modal-header">
    <h4 class="modal-title">Editar item</h4>
</div>
<form action="" id="formulario-editar-item" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="producto_id">Producto:</label>
            <div class="col-sm-7 div-input">
                <select onchange="cargarPresentaciones()" name="producto_id" id="producto_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($productos as $value) : ?>
                        <option <?= ($value->id == $producto->id) ? 'selected' : '' ?>
                                value="<?php echo $value->id ?>"><?php echo $value->titulo ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="presentacion_id">Presentación</label>
            <div class="col-sm-7 div-input">
                <select name="presentacion_id" id="presentacion_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($presentaciones as $value) : ?>
                        <option <?= ($value->id == $presentacion->id) ? 'selected' : '' ?>
                                value="<?php echo $value->id ?>"><?php echo $value->titulo_corto ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="cantidad">Cantidad</label>
            <div class="col-sm-7 div-input">
                <input type="number" value="<?= $item['cantidad'] ?>" name="cantidad" id="cantidad"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_unitario">Precio</label>
            <div class="col-sm-7 div-input">
                <input type="number" value="<?= $item['precio_unitario'] ?>" name="precio_unitario" id="precio_unitario"
                       class="form-control"/>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-editar-item').addEventListener('submit', function (evento) {
        evento.preventDefault();
        actualizarItem();
    });

    function actualizarItem() {
        const datos = new FormData(document.getElementById('formulario-editar-item'));
        axios.post('/compras/create/edit_item/<?php echo $posicion ?>', datos)
            .then(function (respuesta) {
                const mensaje = respuesta.data.mensaje;
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
                    mostrarErrores(error.response.data.errores, 'formulario-editar-item');
                }
            })
    }
</script>