<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar producto</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Datos generales del producto</h5>
                        </div>
                        <form id="formulario-registrar" autocomplete="off">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="categoria_id">Categoria:</label>
                                            <div class="col-sm-9 div-input">
                                                <select onchange="cargarSubcategorias()" name="categoria_id" id="categoria_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <?php foreach ($categorias as $categoria) : ?>
                                                        <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="subcategoria_id">Subcategoria:</label>
                                            <div class="col-sm-9 div-input">
                                                <select name="subcategoria_id" id="subcategoria_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="marca_id">Marca:</label>
                                            <div class="col-sm-9 div-input">
                                                <select name="marca_id" id="marca_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <?php foreach ($marcas as $marca) : ?>
                                                        <option value="<?php echo $marca->id ?>"><?php echo $marca->nombre ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="titulo">Título:</label>
                                            <div class="col-sm-9 div-input">
                                                <input type="text" name="titulo" value="" id="titulo" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="descripcion_larga">Descripción:</label>
                                            <div class="col-sm-9 div-input">
                                                <textarea name="descripcion_larga" id="descripcion_larga" class="form-control" rows="4">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="descripcion_corta">Descripcion corta:</label>
                                            <div class="col-sm-9 div-input">
                                                <input type="text" name="descripcion_corta" value="" id="descripcion_corta" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a role="button" href="/productos" class="btn btn-danger">
                                    <i class="fas fa-undo-alt"></i> Retornar
                                </a>
                                <button id="btn-submit" type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card  card-success card-outline" id="listado">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-presentacion" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-contenido">
            </div>
        </div>
    </div>
</div>
<?php $this->startSection('javascript-extra'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        listarPresentaciones();
    });

    document.getElementById('formulario-registrar').addEventListener('submit', function(evento) {
        evento.preventDefault();
        guardar();
    });


    function guardar() {
        const datos = new FormData(document.getElementById('formulario-registrar'));
        axios.post('/productos/store', datos)
            .then(function(respuesta) {
                toastr.success(respuesta.data.mensaje);
                setTimeout(function() {
                    window.location.replace('/productos');
                }, 2000);
            })
            .catch(function() {
                toastr.error('Error al registrar');
            })
    }

    function listarPresentaciones() {
        axios.get('/productos/create/listar_presentaciones')
            .then(function(respuesta) {
                $('#listado').html(respuesta.data);
            })
            .catch(function(error) {
                console.log('Error al cargar contenido');
            });
    }

    function cargarSubcategorias() {
        const categoria_id = document.getElementById('categoria_id').value;
        if (categoria_id === '') {
            $('#subcategoria_id').html('<option value="">Seleccione</option>');
            return;
        }
        // peticion ajax
        axios.get('/productos/create/load_subcategorias/' + categoria_id)
            .then(function(respuesta) {
                $('#subcategoria_id').html(respuesta.data);
            })
            .catch(function(error) {
                $('#subcategoria_id').html('<option value="">Seleccione</option>');
            })
    }

    function modalCrearPresentacion() {
        axios.get('/productos/create/modal_presentacion')
            .then(function(respuesta) {
                const codigo_html = respuesta.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-presentacion').modal('show');
            })
            .catch(function(error) {
                console.log('error al cargar modal de presentacion');
            })
    }

    function editarPresentacion(posicion) {
        axios.get('/productos/create/modal_edit_presentacion/' + posicion)
            .then(function(respuesta) {
                const codigo_html = respuesta.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-presentacion').modal('show')
            })
            .catch(function() {
                toastr.error('Error al cargar modal');
            })
    }

    function quitarPresentacion(posicion) {

        Swal.fire({
            title: '¿Está seguro de eliminar la presentacion?',
            icon: 'error',
            text: 'Esta acción no se puede revertir',
            showCancelButton: true,
            confirmButtonText: '<i class="far fa-trash-alt"></i> Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if (result.isConfirmed) {
                axios.post('/productos/create/remove_presentacion/' + posicion)
                    .then(function(respuesta) {
                        const mensaje = respuesta.data.mensaje;
                        toastr.success(mensaje);
                        listarPresentaciones();
                    })
                    .catch(function() {
                        toastr.error('Error al quitar presentacion');
                    });
            }
        });
    }
</script>
<?php $this->endSection('javascript-extra') ?>