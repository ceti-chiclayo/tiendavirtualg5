<div class="modal-header">
    <h4 class="modal-title">Editar presentacion</h4>
</div>
<form action="" id="formulario-editar-presentacion" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="medida">Medida</label>
            <div class="col-sm-7 div-input">
                <select name="medida_id" id="medida_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($medidas as $medida) : ?>
                        <option <?php echo ($medida->id == $item['medida_id']) ? 'selected' : '' ?> value="<?php echo $medida->id ?>"><?php echo $medida->nombre ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="color">Color</label>
            <div class="col-sm-7 div-input">
                <select name="color_id" id="color_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($colores as $color) : ?>
                        <option <?php echo ($color->id == $item['color_id']) ? 'selected' : '' ?> value="<?= $color->id ?>"><?= $color->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="codigo">Código</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="codigo" id="codigo" class="form-control" value="<?= $item['codigo'] ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_venta">Precio</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_venta" id="precio_venta" class="form-control" value="<?= $item['precio_venta'] ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_oferta">Precio oferta</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_oferta" id="precio_oferta" class="form-control" value="<?= $item['precio_oferta'] ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="porcentaje_descuento">Porcentaje descuento</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="porcentaje_descuento" id="porcentaje_descuento" class="form-control" value="<?= $item['porcentaje_descuento'] ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_compra">Precio compra</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_compra" id="precio_compra" class="form-control" value="<?= $item['precio_compra'] ?>" />
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
    document.getElementById('formulario-editar-presentacion').addEventListener('submit', function(evento) {
        evento.preventDefault();
        actualizarPresentacion();
    });


    function actualizarPresentacion() {
        const datos = new FormData(document.getElementById('formulario-editar-presentacion'));
        axios.post('/productos/create/edit_presentacion/<?php echo $posicion ?>', datos)
            .then(function(respuesta) {
                const mensaje = respuesta.data.mensaje;
                toastr.success(mensaje);
                $('#modal-presentacion').modal('hide');
                listarPresentaciones();
            })
            .catch(function() {
                toastr.error('Error al editar presentacion')
            })
    }
</script>