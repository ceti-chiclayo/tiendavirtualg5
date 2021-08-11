<div class="header-top_area d-none d-lg-block">
    <div class="container">
        <div class="header-top_nav">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="header-top_right">
                        <ul>
                            <?php if (auth()->isAuth()): ?>
                                <li>
                                    <a href="/mi-cuenta">Mi cuenta</a>
                                </li>
                                <li>
                                    <form id="form-logout" action="/logout-cliente" method="post"></form>
                                    <a style="cursor:pointer;"
                                       onclick="document.getElementById('form-logout').submit()">Salir</a>
                                </li>
                            <?php endif; ?>
                            <?php if (!auth()->isAuth()): ?>
                                <li>
                                    <a href="/login-registro">Ingresar o registrarse</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="/carrito">Carrito</a>
                            </li>
                            <li>
                                <a href="/pagar">Pagar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>