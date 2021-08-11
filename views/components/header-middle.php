<div class="header-middle_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-middle_nav">
                    <div class="header-logo_area">
                        <a href="/">
                            <img src="assets/images/menu/logo/1.png" alt="Header Logo">
                        </a>
                    </div>
                    <div class="header-contact d-none d-md-flex">
                        <i class="fa fa-headphones-alt"></i>
                        <div class="contact-content">
                            <p>
                                Call us
                                <br>
                                Free Support: (012) 800 456 789
                            </p>
                        </div>
                    </div>
                    <div class="header-search_area d-none d-lg-block">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search">
                            <button class="search-button"><i class="ion-ios-search"></i></button>
                        </form>
                    </div>
                    <div class="header-right_area d-none d-lg-inline-block">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count valor-cantidad"><?= $total_items ?></span>
                                        <i class="ion-bag"></i>
                                    </div>
                                    <div class="minicart-front_text">
                                        <span>Total:</span>
                                        <span id="total-carrito" class="total-price">S/ <?= number_format($total, 2, '.', '') ?></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-right_area header-right_area-2 d-inline-block d-lg-none">
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
                                    <i class="pe-7s-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white d-none d-lg-block">
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