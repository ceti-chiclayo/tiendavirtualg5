<?php

/** @var \Core\View $this */
?>

<?php $this->startSection('titulo_pagina') ?>
Mi carrito
<?php $this->endSection('titulo_pagina') ?>

<?php $this->startSection('breadcrumb-pagina') ?>
<div class="breadcrumb-content">
    <h2>Carrito de compra</h2>
    <ul>
        <li><a href="/">Inicio</a></li>
        <li class="active">Carrito</li>
    </ul>
</div>
<?php $this->endSection('breadcrumb-pagina') ?>

<!-- Begin Uren's Cart Area -->
<?php $this->startSection('contenido') ?>
<div class="kenne-cart-area">
    <div class="container" id="tabla-carrito">
    </div>
</div>
<?php $this->endSection('contenido') ?>
<!-- Uren's Cart Area End Here -->
<?php $this->startSection('javascript') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        generarTabla();
    });

    function generarTabla() {
        axios.get('/carrito/generar-tabla')
            .then(function(respuesta) {
                $('#tabla-carrito').html(respuesta.data);
            })
            .catch(function() {
                toastr.error('Error cargando detalle de carrito')
            });
    }

    function aplicarCupon() {
        const codigo_cupon = document.getElementById('coupon_code').value;
        if (codigo_cupon.trim() === '') {
            emitirMensaje('Debes ingresar código de cupón', 'error');
            return;
        }
        const btn_action = document.getElementById('btn_cupon_code');
        btn_action.disabled = true;
        const datos = new FormData();
        datos.append('codigo_cupon', codigo_cupon);
        axios.post('/carrito/aplicar-cupon', datos)
            .then(function() {
                generarTabla();
                emitirMensaje('Cupón aplicado correctamente', 'success');
            })
            .catch(function(error) {
                let mensaje = 'Error al aplicar el cupón';
                if (error.response.status === 409) {
                    mensaje = error.response.data.message;
                }
                emitirMensaje(mensaje, 'error');
            })
            .finally(function() {
                btn_action.disabled = true;
            });
    }
</script>
<?php $this->endSection('javascript') ?>