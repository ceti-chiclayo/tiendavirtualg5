<div class="transparent-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="transparent-header_nav position-relative">
                    <div class="header-logo_area">
                        <a href="/">
                            <img src="assets/images/menu/logo/1.png" alt="Header Logo">
                        </a>
                    </div>
                    <div class="main-menu_area d-none d-lg-block">
                        <nav class="main-nav d-flex justify-content-center">
                            <ul>
                                <li><a href="/">Inicio</a></li>
                                <li><a href="/buscador">Tienda</a></li>
                                <li><a href="javascript:void(0)">Categorías <i class="ion-chevron-down"></i></a>
                                    <ul class="kenne-dropdown">
                                        <?php foreach ($categorias as $categoria): ?>
                                            <li>
                                                <a href="/buscador/<?= $categoria->slug ?>"><?= $categoria->nombre ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Marcas <i class="ion-chevron-down"></i></a>
                                    <ul class="kenne-dropdown">
                                        <?php foreach ($marcas as $marca): ?>
                                            <li><a href="/buscador"><?= $marca->nombre ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php if (auth()->isAuth()): ?>
                                    <li><a href="/mi-cuenta">Mi cuenta</a></li>
                                    <li>
                                        <form id="form-logout" action="/logout-cliente" method="post"></form>
                                        <a style="cursor:pointer;"
                                           onclick="document.getElementById('form-logout').submit()">Salir</a>
                                    </li>
                                <?php else: ?>
                                    <li><a href="/login-registro">Ingresar</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right_area header-right_area-2">
                        <ul>
                            <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">03</span>
                                        <i class="ion-bag"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#searchBar" class="search-btn toolbar-btn">
                                    <i class="ion-ios-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvasMenu"
                                   class="menu-btn toolbar-btn color--white d-none d-lg-block">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>