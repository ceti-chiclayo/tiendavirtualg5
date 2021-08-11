<?php

/** @var \Core\View $this */
?>
<?php
$this->startSection('extra-class-body')
?>
register-page
<?php
$this->endSection('extra-class-body')
?>
<?php
$this->startSection('titulo_pagina')
?>
Registro
<?php
$this->endSection('titulo_pagina')
?>
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1"><b>CETI</b>Store</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Registrarse como nuevo usuario</p>

            <form autocomplete="off" id="formulario-registro" action="/registro" method="post">
                <div class="input-group mb-3">
                    <input value="<?= session()->getFlash('apellido_paterno') ?>" type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input value="<?= session()->getFlash('apellido_materno') ?>" type="text" class="form-control" name="apellido_materno" placeholder="Apellido materno">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input value="<?= session()->getFlash('nombres') ?>" type="text" class="form-control" name="nombres" placeholder="Nombres">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input value="<?= session()->getFlash('email') ?>" type="email" class="form-control" name="email" placeholder="Correo eletrónico">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="confirmar_password" placeholder="Confirmar contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="/login" class="text-center">Ya tengo un usuario</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<?php
$this->section('javascript-extra')
?>
<script>
    $('#formulario-registro').validate({
        // submitHandler: function(form) {
        //     alert('Todo validado');
        // },
        rules: {
            apellido_paterno: {
                required: true,
            },
            apellido_materno: {
                required: true,
            },
            nombres: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            confirmar_password: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            confirmar_password: {
                equalTo: 'Las contraseñas deben coincidir'
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function(element) {
            // cuando sucede un error
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
<?php
$this->endSection('javascript-extra')
?>