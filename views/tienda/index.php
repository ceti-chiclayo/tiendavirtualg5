<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio | CETI Store</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png"/>

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-stars.min.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="assets/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="assets/css/plugins/timecircles.css">

    <link rel="stylesheet" href="css/app.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body class="template-color-1">

<div class="main-wrapper">

    <!-- Begin Loading Area -->
    <div class="loading">
        <div class="text-center middle">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
        </div>
    </div>
    <!-- Loading Area End Here -->

    <!-- Begin Main Header Area -->
    <?= viewComponent('HeaderInicio') ?>
    <!-- Main Header Area End Here -->

    <!-- Begin Slider Area -->
    <div class="slider-area">

        <div class="kenne-element-carousel home-slider arrow-style" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "autoplay" : true,
                "fade" : true,
                "autoplaySpeed" : 7000,
                "pauseOnHover" : false,
                "pauseOnFocus" : false
                }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>
            <div class="slide-item bg-1 animation-style-01">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="slide-content">
                        <span>Exclusive Offer -20% Off This Week</span>
                        <h2>Accessories <br> Explore Trending</h2>
                        <p class="short-desc">Aliquam error eos cumque aut repellat quasi accusantium inventore
                            necessitatibus. Vel quisquam distinctio in inventore dolorum.</p>
                        <div class="slide-btn">
                            <a class="kenne-btn" href="shop-left-sidebar.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item bg-2 animation-style-01">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="slide-content">
                        <span>Exclusive Offer -10% Off This Week</span>
                        <h2>Stylist <br> Female Clothes</h2>
                        <p class="short-desc-2">Made from Soft, Durable, US-grown Supima cotton.</p>
                        <div class="slide-btn">
                            <a class="kenne-btn" href="shop-left-sidebar.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Slider Area End Here -->

    <!-- Begin Service Area -->
    <div class="service-area">
        <div class="container">
            <div class="service-nav">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Free Shipping</h4>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Money Return</h4>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Online Support</h4>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End Here -->

    <!-- Begin Banner Area -->
    <?php echo viewComponent('BannerArea'); ?>
    <!-- Banner Area End Here -->

    <!-- Begin Product Area -->
    <?php echo viewComponent('ProductosNuevos') ?>
    <!-- Product Area End Here -->

    <!-- Begin Banner Area Two -->
    <div class="banner-area banner-area-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img class="img-full" src="assets/images/banner/1-4.jpg" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img class="img-full" src="assets/images/banner/1-5.jpg" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area Two End Here -->

    <!-- Begin Product Tab Area -->
    <?= viewComponent('TodoProducto') ?>
    <!-- Product Tab Area End Here -->

    <!-- Begin Latest Blog Area -->
    <?php /*usar componente BlogComponent*/ ?>
    <!-- Latest Blog Area End Here -->

    <!-- Begin Kenne's Banner Area Four -->
    <div class="kenne-banner_area kenne-banner_area-4">
        <div class="banner-img"></div>
        <div class="banner-content">
            <h3>Obten productos exclusivos.</h3>
            <p>La ropa se trata de sentimientos. Si hoy te sientes con ganas de atraer todas las miradas, prepárate
                porque lo vas a lograr.</p>
            <div class="kenne-btn-ps_center">
                <a class="kenne-btn transparent-btn" href="/buscador">Ver productos</a>
            </div>
        </div>
    </div>
    <!-- Kenne's Banner Area Four End Here -->

    <!-- Begin Kenne's Instagram Area -->
    <?php /*usar componente InstagramFeedComponent*/ ?>
    <!-- Kenne's Instagram Area End Here -->

    <!-- Begin Kenne's Footer Area -->
    <?= viewComponent('Footer') ?>
    <!-- Kenne's Footer Area End Here -->

    <!-- Begin Kenne's Modal Area -->
    <div class="modal fade modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area sp-area row">
                        <div class="col-lg-5">
                            <div class="sp-img_area">
                                <div class="kenne-element-carousel sp-img_slider slick-img-slider" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                    <div class="single-slide red">
                                        <img src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="assets/images/product/1-2.jpg" alt="Kenne's Product Image">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="assets/images/product/2-2.jpg" alt="Kenne's Product Image">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="assets/images/product/3-2.jpg" alt="Kenne's Product Image">
                                    </div>
                                </div>
                                <div class="kenne-element-carousel sp-img_slider-nav arrow-style-2 arrow-style-3"
                                     data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider",
                                   "focusOnSelect": true,
                                   "arrows" : true,
                                   "spaceBetween": 30
                                  }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                    <div class="single-slide red">
                                        <img src="assets/images/product/1-1.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                    <div class="single-slide orange">
                                        <img src="assets/images/product/1-2.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                    <div class="single-slide brown">
                                        <img src="assets/images/product/2-1.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                    <div class="single-slide umber">
                                        <img src="assets/images/product/2-2.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                    <div class="single-slide black">
                                        <img src="assets/images/product/3-1.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                    <div class="single-slide golden">
                                        <img src="assets/images/product/3-2.jpg" alt="Kenne's Product Thumnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><a href="#">Dolorem odio provident ut nihil</a></h5>
                                </div>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box">
                                    <span class="new-price new-price-2">$194.00</span>
                                    <span class="old-price">$241.00</span>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                        <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                        <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                        <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                        <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                        <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                    </ul>
                                </div>
                                <div class="color-list_area">
                                    <div class="color-list_heading">
                                        <h4>Available Options</h4>
                                    </div>
                                    <span class="sub-title">Color</span>
                                    <div class="color-list">
                                        <a href="javascript:void(0)" class="single-color active"
                                           data-swatch-color="red">
                                            <span class="bg-red_color"></span>
                                            <span class="color-text">Red (+$150)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                            <span class="burnt-orange_color"></span>
                                            <span class="color-text">Orange (+$170)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                            <span class="brown_color"></span>
                                            <span class="color-text">Brown (+$120)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                            <span class="raw-umber_color"></span>
                                            <span class="color-text">Umber (+$125)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                            <span class="black_color"></span>
                                            <span class="color-text">Black (+$125)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="golden">
                                            <span class="golden_color"></span>
                                            <span class="color-text">Golden (+$125)</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="kenne-group_btn">
                                    <ul>
                                        <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                        <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    </ul>
                                </div>
                                <div class="kenne-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)">Scraf</a>,
                                    <a href="javascript:void(0)">hoodie</a>,
                                    <a href="javascript:void(0)">jacket</a>
                                </div>
                                <div class="kenne-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank"
                                               title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com" data-toggle="tooltip" target="_blank"
                                               title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank"
                                               title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                               target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com" data-toggle="tooltip" target="_blank"
                                               title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Modal Area End Here -->
    <!-- Scroll To Top Start -->
    <a class="scroll-to-top" href=""><i class="ion-chevron-up"></i></a>
    <!-- Scroll To Top End -->

</div>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/vendor/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.min.js"></script>

<!-- Slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Barrating JS -->
<script src="assets/js/plugins/jquery.barrating.min.js"></script>
<!-- Counterup JS -->
<script src="assets/js/plugins/jquery.counterup.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/jquery.nice-select.js"></script>
<!-- Sticky Sidebar JS -->
<script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
<!-- Jquery-ui JS -->
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
<!-- Theia Sticky Sidebar JS -->
<script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
<!-- Waypoints JS -->
<script src="assets/js/plugins/waypoints.min.js"></script>
<!-- jQuery Zoom JS -->
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<!-- Timecircles JS -->
<script src="assets/js/plugins/timecircles.js"></script>

<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script> -->

<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>

</html>