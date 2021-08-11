<?php

/** @var \Core\View $this */
?>

<?php $this->startSection('titulo_pagina') ?>
    Buscador de productos
<?php $this->endSection('titulo_pagina') ?>

<?php $this->startSection('breadcrumb-pagina') ?>
    <div class="breadcrumb-content">
        <h2>Buscador de productos</h2>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li class="active">Filtrar productos</li>
        </ul>
    </div>
<?php $this->endSection('breadcrumb-pagina') ?>

<?php $this->startSection('contenido') ?>
    <div class="kenne-content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
                    <div class="kenne-sidebar-catagories_area">
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title first-child">
                                <h5>Filter by price</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                                        <button class="filter-btn">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories category-module">
                            <div class="kenne-categories_title">
                                <h5>Categorías</h5>
                            </div>
                            <div class="sidebar-categories_menu">
                                <ul>
                                    <?php foreach ($categorias as $item): ?>
                                        <li class="has-sub <?= ($item->slug === $categoria) ? 'open' : '' ?>">
                                            <a href="/buscador/<?= $item->slug ?>"><?= $item->nombre ?>
                                                <i class="ion-ios-plus-empty"></i>
                                            </a>
                                            <ul <?= ($item->slug === $categoria) ? 'style="display: block;"' : '' ?>>
                                                <?php foreach ($item->categorias as $value): ?>
                                                    <li>
                                                        <a href="/buscador/<?= $item->slug ?>/<?= $value->slug ?>"><?= $value->nombre ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title">
                                <h5>Color</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                <li>
                                    <a href="javascript:void(0)">Black (1)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Blue (1)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Gold (3)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="kenne-sidebar_categories list-product_area">
                            <div class="kenne-categories_title">
                                <h5>Recent Post</h5>
                            </div>
                            <div class="kenne-element-carousel list-product_slider list-product_slider-2 slider-nav"
                                 data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": false,
                                "arrows": false,
                                "dots": false,
                                "spaceBetween": 30,
                                "rows" : 2
                                }' data-slick-responsive='[
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1
                                }}
                            ]'>

                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/1-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">hoodie, jacket</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/2-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/3-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">crochet, scarf</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$80.00</span>
                                                    <span class="old-price">$85.0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/4-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">shirts, t-shirt</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$75.91</span>
                                                    <span class="old-price">$80.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/2-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/3-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">crochet, scarf</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$80.00</span>
                                                    <span class="old-price">$85.0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/1-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">hoodie, jacket</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/2-1.jpg"
                                                     alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title kenne-tags_title">
                                <h5>Product Tags</h5>
                            </div>
                            <ul class="kenne-tags_list">
                                <li><a href="javascript:void(0)">Hoodie</a></li>
                                <li><a href="javascript:void(0)">Jacket</a></li>
                                <li><a href="javascript:void(0)">Frocks</a></li>
                                <li><a href="javascript:void(0)">Crochet</a></li>
                                <li><a href="javascript:void(0)">Scarf</a></li>
                                <li><a href="javascript:void(0)">Shirts</a></li>
                                <li><a href="javascript:void(0)">Men</a></li>
                                <li><a href="javascript:void(0)">Women</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top"
                               title="Grid View"><i class="fa fa-th"></i></a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top"
                               title="List View"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="product-page_count">
                            <p>Showing 1–9 of 40 results)</p>
                        </div>
                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Short By:</label>
                                <select class="nice-select myniceselect">
                                    <option value="1">Default sorting</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                    <option value="5">Rating (Highest)</option>
                                    <option value="5">Rating (Lowest)</option>
                                    <option value="5">Model (A - Z)</option>
                                    <option value="5">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid gridview-3 row">
                        <?php foreach ($productos as $producto): ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="/detalle-producto/<?= $producto->slug ?>">
                                                <img class="primary-img" src="<?= $producto->primera_imagen ?>"
                                                     alt="Kenne's Product Image">
                                                <?php if ($producto->segunda_imagen !== '') : ?>
                                                    <img class="secondary-img" src="<?= $producto->segunda_imagen ?>"
                                                         alt="Kenne's Product Image">
                                                <?php endif; ?>
                                            </a>
                                            <span class="sticker">-15%</span>
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal"
                                                        data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                                                             data-toggle="tooltip"
                                                                                             data-placement="right"
                                                                                             title="Quick View"><i
                                                                    class="ion-ios-search"></i></a>
                                                    </li>
                                                    <li><a href="wishlist.html" data-toggle="tooltip"
                                                           data-placement="right"
                                                           title="Add To Wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></a>
                                                    </li>
                                                    <li><a href="compare.html" data-toggle="tooltip"
                                                           data-placement="right"
                                                           title="Add To Compare"><i
                                                                    class="ion-ios-reload"></i></a>
                                                    </li>
                                                    <li><a href="cart.html" data-toggle="tooltip" data-placement="right"
                                                           title="Add To cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name">
                                                    <a href="single-product.html"><?= $producto->titulo ?></a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-product_item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img src="assets/images/product/1-2.jpg" alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                                <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a></h6>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-short_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                        lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal"
                                                        data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                                                             data-toggle="tooltip"
                                                                                             data-placement="top"
                                                                                             title="Quick View"><i
                                                                    class="ion-ios-search"></i></a>
                                                    </li>
                                                    <li><a href="wishlist.html" data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="Add To Wishlist"><i
                                                                    class="ion-ios-heart-outline"></i></a>
                                                    </li>
                                                    <li><a href="compare.html" data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                    </li>
                                                    <li><a href="cart.html" data-toggle="tooltip" data-placement="top"
                                                           title="Add To cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="kenne-paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="kenne-pagination-box primary-color">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                            <li><a href="javascript:void(0)">2</a></li>
                                            <li><a href="javascript:void(0)">3</a></li>
                                            <li><a href="javascript:void(0)">4</a></li>
                                            <li><a href="javascript:void(0)">5</a></li>
                                            <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection('contenido') ?>

<?php $this->startSection('javascript') ?>
    <script>
        function cargar() {
            window.history.pushState('page2', 'Title', '/page2.php');
        }
    </script>
<?php $this->endSection('javascript') ?>