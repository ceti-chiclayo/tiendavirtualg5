<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Búsqueda de usuarios</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" id="formulario-buscar" autocomplete="off">
                                <label class="my-1 mr-2" for="texto_busqueda">Nombre</label>
                                <input type="text" class="form-control my-1 mr-sm-2" id="texto_busqueda" placeholder="Escriba un texto">
                                <button id="boton-buscar" onclick="buscar()" type="button" class="btn btn-primary my-1 mr-1">
                                    <i class="fas fa-search"></i> Buscar
                                </button>
                                <button id="boton-crear" onclick="modalCrear()" type="button" class="btn btn-success my-1">
                                    <i class="fas fa-plus"></i> Nuevo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Listado de usuarios</h3>
                        </div>
                        <div class="card-body" id="div_listado">
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
<?php $this->startSection('javascript-extra') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        buscar();
    });

    document.getElementById('formulario-buscar').addEventListener('submit', function(evento) {
        evento.preventDefault();
        buscar();
    });

    function buscar() {
        const boton = document.getElementById('boton-buscar');
        boton.disabled = true;
        const texto_busqueda = $('#texto_busqueda').val();
        axios.get('/usuarios/search', {
                "params": {
                    "texto_busqueda": texto_busqueda
                }
            })
            .then(function(respuesta) {
                const codigo_html = respuesta.data;
                $('#div_listado').html(codigo_html);
            })
            .catch(function() {
                emitirMensaje('Error al cargar el contenido', 'error');
            })
            .finally(function() {
                boton.disabled = false;
            });
    }

    function modalCrear() {
        const boton = document.getElementById('boton-crear');
        boton.disabled = true;
        axios.get('/usuarios/create')
            .then(function(response) {
                const codigo_html = response.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-usuario').modal('show');
            })
            .catch(function(error) {
                emitirMensaje('Error al cargar el contenido', 'error');
            }).finally(function() {
                boton.disabled = false;
            });
    }

    function modalEditar(id, boton) {
        boton.disabled = true;
        const ruta = "/usuarios/edit/" + id;
        axios.get(ruta)
            .then(function(response) {
                const codigo_html = response.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-usuario').modal('show');
            })
            .catch(function() {
                emitirMensaje('Error al cargar el contenido', 'error');
            })
            .finally(function() {
                boton.disabled = false;
            });
    }

    function confirmarEliminar(id, boton) {
        boton.disabled = true;
        Swal.fire({
            title: '¿Está seguro?',
            icon: 'error',
            text: 'Esta acción no se puede revertir',
            showCancelButton: true,
            confirmButtonText: '<i class="far fa-trash-alt"></i> Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if (result.isConfirmed) {
                const url = "/usuarios/destroy/" + id;
                axios.post(url)
                    .then(function(response) {
                        emitirMensaje('Eliminado correctamente', 'success');
                        buscar();
                    })
                    .catch(function() {
                        emitirMensaje('Error al eliminiar', 'error');
                    })
                    .finally(function() {

                    });
            }
            boton.disabled = false;
        });
    }
</script>
<?php $this->endSection('javascript-extra') ?>