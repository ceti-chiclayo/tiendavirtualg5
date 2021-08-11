<div class="modal-header">
    <h4 class="modal-title">Registrar subcategoría</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="categoria_id">Categoría</label>
            <div class="col-sm-9 div-input">
                <select required name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($categorias as $value) : ?>
                        <option value="<?= $value->id ?>"><?= $value->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-9 div-input">
                <input type="text" required name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
        <!-- <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="imagen">Imagen</label>
            <div class="col-sm-9 div-input">
                <input type="file" required name="imagen" id="imagen" class="form-control" />
            </div>
        </div> -->
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="boton-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-crear').addEventListener('submit', function(evento) {
        evento.preventDefault();
        registrar();
    });

    function registrar() {
        const boton = document.getElementById('boton-submit');
        boton.disabled = true;
        const formulario = document.getElementById('formulario-crear');
        const datos = new FormData(formulario);

        axios.post('/subcategorias/store', datos)
            .then(function() {
                // mostrar un mensaje de confirmacion
                toastr.success('Registrado correctamente');
                // cerrar el modal
                $('#modal-subcategoria').modal('hide');
                // refresar la tabla, buscar
                buscar();
            })
            .catch(function() {
                toastr.error('Error al registrar');
            })
            .finally(function() {
                boton.disabled = false;
            });
    }
</script>