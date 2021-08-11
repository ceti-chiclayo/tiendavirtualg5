<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar compra</h1>
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
                            <h5 class="m-0">Datos generales de la compra</h5>
                        </div>
                        <form id="formulario-registrar-compra" autocomplete="off">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="proveedor_id">Proveedor:</label>
                                            <div class="col-sm-9 div-input">
                                                <select name="proveedor_id"
                                                        id="proveedor_id" class="form-control select2">
                                                    <option value="">Seleccione</option>
                                                    <?php foreach ($proveedores as $proveedor) : ?>
                                                        <option value="<?php echo $proveedor->id ?>"><?php echo $proveedor->razon_ruc ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="sucursal_id">Sucursal:</label>
                                            <div class="col-sm-9 div-input">
                                                <select name="sucursal_id" id="sucursal_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <?php foreach ($sucursales as $sucursal) : ?>
                                                        <option value="<?php echo $sucursal->id ?>"><?php echo $sucursal->nombre ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="fecha">Fecha
                                                corta:</label>
                                            <div class="col-sm-9 div-input">
                                                <input type="date" name="fecha" value=""
                                                       id="fecha" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a role="button" href="/compras" class="btn btn-danger">
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
    <div class="modal fade" id="modal-item" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-contenido">
            </div>
        </div>
    </div>
</div>
<?php
$this->startSection('javascript-extra');
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.select2').select2();
        listarDetalle();
    })

    document.getElementById('formulario-registrar-compra').addEventListener('submit', function (evento) {
        evento.preventDefault();
        guardar();
    });

    function guardar() {
        const datos = new FormData(document.getElementById('formulario-registrar-compra'));
        const button = document.getElementById('btn-submit');
        button.disabled = true;
        axios.post('/compras/store', datos)
            .then(function (respuesta) {
                toastr.success(respuesta.data.message);
                setTimeout(function () {
                    window.location.replace('/compras');
                }, 2000);
            })
            .catch(function (error) {
                let message = 'Ocurrió un error';
                if (error.response.data.message) {
                    message = error.response.data.message
                }
                toastr.error(message);
                if (error.response.status === 422) {
                    mostrarErrores(error.response.data.errores, 'formulario-registrar-compra');
                }
                button.disabled = false;
            })
    }

    function listarDetalle() {
        axios.get('/compras/create/listar_detalle')
            .then(function (respuesta) {
                $('#listado').html(respuesta.data);
            })
            .catch(function (error) {
                console.log('Error al cargar contenido');
            });
    }

    function modalCrearItem() {
        axios.get('/compras/create/modal_item')
            .then(function (respuesta) {
                const codigo_html = respuesta.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-item').modal('show');
            })
            .catch(function (error) {
                console.log('error al cargar modal de presentacion');
            })
    }

    function cargarPresentaciones() {
        const producto_id = document.getElementById('producto_id').value;
        if (producto_id === '') {
            $('#presentacion_id').html('<option value="">Seleccione</option>');
            return;
        }
        axios.get('/compras/create/cargar_presentaciones/' + producto_id)
            .then(function (respuesta) {
                $('#presentacion_id').html(respuesta.data);
            })
            .catch(function (error) {
                $('#presentacion_id').html('<option value="">Seleccione</option>');
            })
    }

    function editarItem(posicion) {
        axios.get('/compras/create/modal_edit_item/' + posicion)
            .then(function (respuesta) {
                const codigo_html = respuesta.data;
                $('#modal-contenido').html(codigo_html);
                $('#modal-item').modal('show')
            })
            .catch(function () {
                toastr.error('Error al cargar modal');
            })
    }

    function quitarItem(posicion) {
        Swal.fire({
            title: '¿Está seguro de eliminar el item?',
            icon: 'error',
            text: 'Esta acción no se puede revertir',
            showCancelButton: true,
            confirmButtonText: '<i class="far fa-trash-alt"></i> Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.isConfirmed) {
                axios.post('/compras/create/eliminar_item/' + posicion)
                    .then(function (respuesta) {
                        const mensaje = respuesta.data.message;
                        toastr.success(mensaje);
                        listarDetalle();
                    })
                    .catch(function () {
                        toastr.error('Error al quitar presentacion');
                    });
            }
        });
    }
</script>
<?php
$this->endSection('javascript-extra');
?>