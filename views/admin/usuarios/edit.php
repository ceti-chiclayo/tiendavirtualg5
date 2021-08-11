<div class="modal-header">
    <h4 class="modal-title">Actualizar usuario</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="nombre_completo">Nombre completo</label>
            <div class="col-sm-7 div-input">
                <input type="text" required name="nombre_completo" value="<?= $usuario->nombre_completo ?>"
                       id="nombre_completo" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="email">Correo electrónico</label>
            <div class="col-sm-7 div-input">
                <input type="email" required name="email" id="email" value="<?= $usuario->email ?>"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="password">Contraseña</label>
            <div class="col-sm-7 div-input">
                <input type="password" name="password" id="password" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="password_confirmacion">Confirmar contraseña</label>
            <div class="col-sm-7 div-input">
                <input type="password" name="password_confirmacion" id="password_confirmacion"
                       class="form-control"/>
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
    document.getElementById('formulario-editar').addEventListener('submit', function (evento) {
        evento.preventDefault();
        actualizar(<?php echo $usuario->id ?>);
    });

    function actualizar(id) {
        const boton = document.getElementById('btn-submit');
        boton.disabled = true;
        const formulario = document.getElementById('formulario-editar');
        const datos = new FormData(formulario);
        const ruta = "/usuarios/update/" + id;
        axios.post(ruta, datos)
            .then(function () {
                toastr.success("Actualizado correctamente");
                $('#modal-usuario').modal('hide');
                buscar();
            })
            .catch(function (error) {
                mostrarErrores(error.response.data.errores, 'formulario-editar');
                toastr.error("Error al actualizar");
            })
            .finally(function () {
                boton.disabled = false;
            });
    }
</script>