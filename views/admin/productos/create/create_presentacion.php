<div class="modal-header">
    <h4 class="modal-title">Registrar presentacion</h4>
</div>
<form action="" id="formulario-agregar-presentacion" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="medida">Medida</label>
            <div class="col-sm-7 div-input">
                <select name="medida_id" id="medida_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($medidas as $medida) : ?>
                        <option value="<?php echo $medida->id ?>"><?php echo $medida->nombre ?></option>
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
                        <option value="<?= $color->id ?>"><?= $color->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="codigo">Código</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="codigo" id="codigo" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_venta">Precio</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_venta" id="precio_venta" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_oferta">Precio oferta</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_oferta" id="precio_oferta" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="porcentaje_descuento">Porcentaje descuento</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="porcentaje_descuento" id="porcentaje_descuento" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="precio_compra">Precio compra</label>
            <div class="col-sm-7 div-input">
                <input type="text" name="precio_compra" id="precio_compra" class="form-control" />
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
    document.getElementById('formulario-agregar-presentacion').addEventListener('submit', function(evento) {
        evento.preventDefault();
        agregarPresentacion();
    });


    function agregarPresentacion() {
        const datos = new FormData(document.getElementById('formulario-agregar-presentacion'));
        axios.post('/productos/create/add_presentacion', datos)
            .then(function(respuesta) {
                const mensaje = respuesta.data.mensaje;
                toastr.success(mensaje);
                $('#modal-presentacion').modal('hide');
                listarPresentaciones();
            })
            .catch(function() {
                toastr.error('Error al agregar presentacion')
            })
    }
</script>