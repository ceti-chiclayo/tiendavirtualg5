<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil de usuario</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Editar datos de perfil</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" autocomplete="off" id="form-perfil">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nombre_completo" class="col-sm-4 col-form-label">Nombre
                                            completo</label>
                                        <div class="col-sm-8">
                                            <input value="<?= $usuario->nombre_completo ?>" type="text"
                                                   class="form-control" id="nombre_completo"
                                                   name="nombre_completo"
                                                   placeholder="Nombre completo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Correo electrónico</label>
                                        <div class="col-sm-8">
                                            <input value="<?= $usuario->email ?>" type="email" class="form-control"
                                                   id="email" name="email"
                                                   placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmacion" class="col-sm-4 col-form-label">Confirmar
                                            contraseña</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="password_confirmacion"
                                                   name="password_confirmacion"
                                                   placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" id="btn-submit" class="btn btn-info">Actualizar perfil
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-usuario" class="modal fade" tabindex="-1" data-backdrop='static' data-keyboard='false'>
        <div class="modal-dialog">
            <div class="modal-content" id="modal-contenido">
            </div>
        </div>
    </div>
</div>
<?php $this->startSection('javascript-extra'); ?>
<script>
    document.getElementById('form-perfil').addEventListener('submit', function (event) {
        event.preventDefault();
        const button = document.getElementById('btn-submit');
        button.disabled = true;
        const datos = new FormData(this);
        axios.post('/perfil/actualizar', datos)
            .then(function (response) {
                mostrarErrores([], 'form-perfil');
                emitirMensaje(response.data.message, 'success');
                document.getElementById('password').value = '';
                document.getElementById('password_confirmacion').value = '';
            })
            .catch(function (error) {
                if (error.response.status === 422) {
                    emitirMensaje(error.response.data.message, 'error');
                    mostrarErrores(error.response.data.errores, 'form-perfil');
                }
            })
            .finally(function () {
                button.disabled = false;
            });
    });
</script>
<?php $this->endSection('javascript-extra'); ?>