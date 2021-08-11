<?php

/** @var \Core\View $this */
?>

<?php $this->startSection('titulo_pagina') ?>
    Login y Registro
<?php $this->endSection('titulo_pagina') ?>

<?php $this->startSection('breadcrumb-pagina') ?>
    <div class="breadcrumb-content">
        <h2>Ingresar o registrarse</h2>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li class="active">Ingresar o registrarse</li>
        </ul>
    </div>
<?php $this->endSection('breadcrumb-pagina') ?>

<?php $this->startSection('contenido') ?>
    <div class="kenne-login-register_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                    <!-- Login Form s-->
                    <form action="/login-cliente" method="post" autocomplete="off">
                        <div class="login-form">
                            <h4 class="login-title">Iniciar sesión</h4>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label>Correo electrónico</label>
                                    <input value="<?= session()->getFlash('values')['email-login'] ?? '' ?>"
                                           class="form-control <?= (isset(session()->getFlash('errores')['email-login'])) ? 'is-invalid' : '' ?>"
                                           type="email" required name="email-login" placeholder="Correo electrónico">
                                    <?php if (isset(session()->getFlash('errores')['email-login'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['email-login'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 mb--20">
                                    <label>Contraseña</label>
                                    <input class="form-control <?= (isset(session()->getFlash('errores')['password-login'])) ? 'is-invalid' : '' ?>"
                                           type="password" required name="password-login" placeholder="Contraseña">
                                    <?php if (isset(session()->getFlash('errores')['password-login'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['password-login'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!--<div class="col-md-4">
                                    <div class="forgotton-password_info">
                                        <a href="#"> Forgotten pasward?</a>
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <button class="kenne-login_btn">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form action="/registro-cliente" method="post" autocomplete="off">
                        <div class="login-form">
                            <h4 class="login-title">Registro</h4>
                            <?php if (session()->getFlash('mensaje')) : ?>
                                <div class="alert alert-success">
                                    <strong><?= session()->getFlash('mensaje') ?></strong>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Nombres</label>
                                    <input value="<?= session()->getFlash('values')['nombres'] ?? '' ?>"
                                           class="form-control <?= (isset(session()->getFlash('errores')['nombres'])) ? 'is-invalid' : '' ?>"
                                           required type="text" name="nombres" placeholder="Nombres">
                                    <?php if (isset(session()->getFlash('errores')['nombres'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['nombres'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Apellido paterno</label>
                                    <input value="<?= session()->getFlash('values')['apellido_paterno'] ?? '' ?>"
                                           class="form-control <?= (isset(session()->getFlash('errores')['apellido_paterno'])) ? 'is-invalid' : '' ?>"
                                           required type="text" name="apellido_paterno" placeholder="Apellido paterno">
                                    <?php if (isset(session()->getFlash('errores')['apellido_paterno'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['apellido_paterno'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Apellido materno</label>
                                    <input value="<?= session()->getFlash('values')['apellido_materno'] ?? '' ?>"
                                           class="form-control <?= (isset(session()->getFlash('errores')['apellido_materno'])) ? 'is-invalid' : '' ?>"
                                           required type="text" name="apellido_materno" placeholder="Apellido materno">
                                    <?php if (isset(session()->getFlash('errores')['apellido_materno'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['apellido_materno'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Correo electrónico</label>
                                    <input value="<?= session()->getFlash('values')['email'] ?? '' ?>"
                                           class="form-control <?= (isset(session()->getFlash('errores')['email'])) ? 'is-invalid' : '' ?>"
                                           required type="email" placeholder="Correo electrónico" name="email">
                                    <?php if (isset(session()->getFlash('errores')['email'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['email'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Contraseña</label>
                                    <input required
                                           class="form-control <?= (isset(session()->getFlash('errores')['password'])) ? 'is-invalid' : '' ?>"
                                           type="password" placeholder="Contraseña" name="password">
                                    <?php if (isset(session()->getFlash('errores')['password'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['password'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Confirmar contraseña</label>
                                    <input required
                                           class="form-control <?= (isset(session()->getFlash('errores')['password_confirmacion'])) ? 'is-invalid' : '' ?>"
                                           type="password" placeholder="Confirmar contraseña"
                                           name="password_confirmacion">
                                    <?php if (isset(session()->getFlash('errores')['password_confirmacion'])) : ?>
                                        <div class="invalid-feedback">
                                            <ul>
                                                <?php foreach (session()->getFlash('errores')['password_confirmacion'] as $mensaje) : ?>
                                                    <li><?= $mensaje ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="kenne-register_btn">Registrarme</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection('contenido') ?>