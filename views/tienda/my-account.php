<?php

/** @var \Core\View $this */
?>

<?php $this->startSection('titulo_pagina') ?>
    Mi Cuenta
<?php $this->endSection('titulo_pagina') ?>

<?php $this->startSection('breadcrumb-pagina') ?>
    <div class="breadcrumb-content">
        <h2>Mi cuenta</h2>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li class="active">Detalles de mi cuenta</li>
        </ul>
    </div>
<?php $this->endSection('breadcrumb-pagina') ?>

<?php $this->startSection('contenido') ?>
    <main class="page-content">
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?= ($opcion_activa === 'dashboard' ? 'active' : '') ?>"
                                   id="account-dashboard-tab" data-toggle="tab"
                                   href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                   aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($opcion_activa === 'pedidos' ? 'active' : '') ?>"
                                   id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                   role="tab" aria-controls="account-orders" aria-selected="false">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($opcion_activa === 'direcciones' ? 'active' : '') ?>"
                                   id="account-address-tab" data-toggle="tab" href="#account-address"
                                   role="tab" aria-controls="account-address" aria-selected="false">Direcciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($opcion_activa === 'detalles_cuenta' ? 'active' : '') ?>"
                                   id="account-details-tab" data-toggle="tab" href="#account-details"
                                   role="tab" aria-controls="account-details" aria-selected="false">Detalles de
                                    cuenta</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="document.getElementById('form-logout').submit()" class="nav-link"
                                   style="cursor:pointer;" id="account-logout-tab" role="tab"
                                   aria-selected="false">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade <?= ($opcion_activa === 'dashboard' ? 'active' : '') ?>"
                                 id="account-dashboard" role="tabpanel"
                                 aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Hola <b><?= $usuario->nombre_completo; ?></b>
                                        (¿No eres <?= $usuario->nombre_completo; ?>?
                                        <a style="cursor:pointer;text-decoration: underline;"
                                           onclick="document.getElementById('form-logout').submit()">Cerrar sesión</a>)
                                    </p>
                                    <p>Desde el panel de su cuenta, puede ver sus pedidos recientes, administrar sus
                                        direcciones de envío y facturación y editar su contraseña y los detalles de su
                                        cuenta.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= ($opcion_activa === 'pedidos' ? 'active' : '') ?>"
                                 id="account-orders" role="tabpanel"
                                 aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">Mis pedidos</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                            <tr>
                                                <th>Pedido</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                <td>Mar 27, 2019</td>
                                                <td>On Hold</td>
                                                <td>£162.00 for 2 items</td>
                                                <td><a href="javascript:void(0)" class="kenne-btn kenne-btn_sm"><span>View</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="account-order-id" href="javascript:void(0)">#5356</a></td>
                                                <td>Mar 27, 2019</td>
                                                <td>On Hold</td>
                                                <td>£162.00 for 2 items</td>
                                                <td><a href="javascript:void(0)" class="kenne-btn kenne-btn_sm"><span>View</span></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= ($opcion_activa === 'direcciones' ? 'active' : '') ?>"
                                 id="account-address" role="tabpanel"
                                 aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">Billing Adress</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">Shipping Address</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= ($opcion_activa === 'detalles_cuenta' ? 'active' : '') ?>"
                                 id="account-details" role="tabpanel"
                                 aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="/mi-cuenta/actualizar-datos" method="post" autocomplete="off"
                                          class="kenne-form">
                                        <div class="kenne-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="apellido_paterno">Apellido paterno</label>
                                                <input value="<?= session()->getFlash('inputs')['apellido_paterno'] ?? $cliente->apellido_paterno ?>"
                                                       type="text" id="apellido_paterno"
                                                       class="form-control <?= (isset(session()->getFlash('errores')['apellido_paterno'])) ? 'is-invalid' : '' ?>"
                                                       name="apellido_paterno">
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
                                            <div class="single-input single-input-half">
                                                <label for="apellido_materno">Apellido materno</label>
                                                <input class="form-control <?= (isset(session()->getFlash('errores')['apellido_materno'])) ? 'is-invalid' : '' ?>"
                                                       value="<?= session()->getFlash('inputs')['apellido_materno'] ?? $cliente->apellido_materno ?>"
                                                       type="text" id="apellido_materno" name="apellido_materno">
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
                                            <div class="single-input single-input-half">
                                                <label for="nombres">Nombres</label>
                                                <input class="form-control <?= (isset(session()->getFlash('errores')['nombres'])) ? 'is-invalid' : '' ?>"
                                                       value="<?= session()->getFlash('inputs')['nombres'] ?? $cliente->nombres ?>"
                                                       type="text" id="nombres" name="nombres">
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
                                            <div class="single-input single-input-half">
                                                <label for="email">Correo electrónico</label>
                                                <input class="form-control <?= (isset(session()->getFlash('errores')['email'])) ? 'is-invalid' : '' ?>"
                                                       value="<?= session()->getFlash('inputs')['email'] ?? $cliente->email ?>"
                                                       type="email" id="email" name="email">
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
                                            <div class="single-input">
                                                <label for="password_actual">
                                                    Contraseña actual (déjela en blanco para no modificarla)
                                                </label>
                                                <input class="form-control <?= (isset(session()->getFlash('errores')['password_actual'])) ? 'is-invalid' : '' ?>"
                                                       type="password" id="password_actual" name="password_actual">
                                                <?php if (isset(session()->getFlash('errores')['password_actual'])) : ?>
                                                    <div class="invalid-feedback">
                                                        <ul>
                                                            <?php foreach (session()->getFlash('errores')['password_actual'] as $mensaje) : ?>
                                                                <li><?= $mensaje ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="single-input">
                                                <label for="password_nueva">
                                                    Nueva contraseña (déjela en blanco para no modificarla)
                                                </label>
                                                <input class="form-control <?= (isset(session()->getFlash('errores')['password_nueva'])) ? 'is-invalid' : '' ?>"
                                                       type="password" id="password_nueva"
                                                       name="password_nueva">
                                                <?php if (isset(session()->getFlash('errores')['password_nueva'])) : ?>
                                                    <div class="invalid-feedback">
                                                        <ul>
                                                            <?php foreach (session()->getFlash('errores')['password_nueva'] as $mensaje) : ?>
                                                                <li><?= $mensaje ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="single-input">
                                                <label for="password_nueva_confirmacion">
                                                    Confirmar nueva contraseña
                                                </label>
                                                <input type="password" id="password_nueva_confirmacion"
                                                       name="password_nueva_confirmacion"
                                                       class="form-control <?= (isset(session()->getFlash('errores')['password_nueva_confirmacion'])) ? 'is-invalid' : '' ?>">
                                                <?php if (isset(session()->getFlash('errores')['password_nueva_confirmacion'])) : ?>
                                                    <div class="invalid-feedback">
                                                        <ul>
                                                            <?php foreach (session()->getFlash('errores')['password_nueva_confirmacion'] as $mensaje) : ?>
                                                                <li><?= $mensaje ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="single-input">
                                                <button class="kenne-btn kenne-btn_dark" type="submit">
                                                    <span>GUARDAR CAMBIOS</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Account Page Area End Here -->
    </main>
<?php $this->endSection('contenido') ?>