<?php

/** @var \Core\View $this */
?>
<?php
$this->startSection('extra-class-body')
?>
    login-page
<?php
$this->endSection('extra-class-body')
?>
<?php
$this->startSection('titulo_pagina')
?>
    Login
<?php
$this->endSection('titulo_pagina')
?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>CETI</b>Store</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Bienvenido de nuevo</p>
                <?php
                if (session()->getFlash('mensaje_error')) :
                    ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlash('mensaje_error') ?>
                    </div>
                <?php
                endif;
                ?>
                <form autocomplete="off" id="formulario-login" action="/login" method="post">
                    <div class="input-group mb-3">
                        <input value="<?= session()->getFlash('email') ?>" name="email" id="email" type="email"
                               class="form-control" placeholder="Correo eletrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="/login-registro" class="text-center">Registrarme como cliente</a>
                </p>
            </div>
        </div>
    </div>
<?php
$this->startSection('javascript-extra')
?>
    <script>
        $('#formulario-login').validate({
            // submitHandler: function(form) {
            //     alert('Todo validado');
            // },
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {},
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function (element) {
                // cuando sucede un error
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
<?php
$this->endSection('javascript-extra')
?>