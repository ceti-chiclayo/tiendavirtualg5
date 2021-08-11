<div class="modal-header">
    <h4 class="modal-title">Actualizar color</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-9 div-input">
                <input type="text" required value="<?= $color->nombre ?>" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </div>
</form>
<script>
    document.getElementById('formulario-editar').addEventListener('submit', function(evento) {
        evento.preventDefault();
        actualizar(<?php echo $color->id ?>);
    });

    function actualizar(id) {
        const formulario = document.getElementById('formulario-editar');
        const datos = new FormData(formulario);
        const ruta = "/colores/update/" + id;
        axios.post(ruta, datos)
            .then(function() {
                toastr.success("Actualizado correctamente");
                $('#modal-color').modal('hide');
                buscar();
            })
            .catch(function() {
                toastr.error("Error al actualizar");
            })
            .finally(function() {

            });

    }
</script>