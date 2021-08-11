<div class="modal-header">
    <h4 class="modal-title">Actualizar sucursal</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-9 div-input">
                <input type="text" required value="<?= $sucursal->nombre ?>" name="nombre" id="nombre"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="direccion">Dirección</label>
            <div class="col-sm-9 div-input">
                <input type="text" required value="<?= $sucursal->direccion ?>" name="direccion" id="direccion"
                       class="form-control"/>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="boton-submit-editar" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar
        </button>
    </div>
</form>
<script>
    document.getElementById('formulario-editar').addEventListener('submit', function (evento) {
        evento.preventDefault();
        actualizar(<?php echo $sucursal->id ?>);
    });

    function actualizar(id) {
        const boton = document.getElementById('boton-submit-editar');
        boton.disabled = true;
        const formulario = document.getElementById('formulario-editar');
        const datos = new FormData(formulario);
        const ruta = "/sucursales/update/" + id;
        axios.post(ruta, datos)
            .then(function () {
                toastr.success("Actualizado correctamente");
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