<div class="product-item">
    <div class="single-product">
        <div class="product-img">
            <a href="/detalle-producto/<?= $producto->slug ?>">
                <img class="primary-img" src="<?= $producto->primera_imagen ?>" alt="Kenne's Product Image">
                <?php if ($producto->segunda_imagen !== '') : ?>
                    <img class="secondary-img" src="<?= $producto->segunda_imagen ?>" alt="Kenne's Product Image">
                <?php endif; ?>
            </a>
            <span class="sticker-2">Hot</span>
            <div class="add-actions">
                <ul>
                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                    </li>
                    <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                    </li>
                    <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                    </li>
                    <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <div class="product-desc_info">
                <h3 class="product-name"><a href="single-product.html"><?= $producto->titulo ?></a></h3>
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
                        <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>