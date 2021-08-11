<a href="#" class="btn-close"><i class="ion-android-close"></i></a>
<div class="minicart-content">
    <div class="minicart-heading">
        <h4>Mi carrito</h4>
    </div>
    <?php if ($numero_items === 0) : ?>
        <div class="alert alert-danger">
            <h6>Aún no hay productos agregados</h6>
        </div>
    <?php else : ?>
        <ul class="minicart-list">
            <?php foreach ($carrito as $key => $item) : ?>
                <li class="minicart-product">
                    <a class="product-item_remove" onclick="quitarItem(<?=$key?>)" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    <div class="product-item_img">
                        <img src="<?= $item['presentacion']->producto->primera_imagen ?>" alt="Kenne's Product Image">
                    </div>
                    <div class="product-item_content">
                        <a class="product-item_title" href="shop-left-sidebar.html"><?= $item['presentacion']->titulo ?></a>
                        <span class="product-item_quantity"><?= $item['cantidad'] ?> x S/ <?= $item['presentacion']->precio ?></span>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div class="minicart-item_total">
    <span>Subtotal</span>
    <span class="ammount">S/ <?php echo number_format($total, 2, '.', '') ?></span>
</div>
<div class="minicart-btn_area">
    <a href="/carrito" class="kenne-btn kenne-btn_fullwidth <?php echo ($numero_items === 0) ? 'isDisabled' : '' ?>">Ir al carrito</a>
</div>
<div class="minicart-btn_area">
    <a href="/pagar" class="kenne-btn kenne-btn_fullwidth <?php echo ($numero_items === 0) ? 'isDisabled' : '' ?>">Pagar</a>
</div>
<script>
    $('.btn-close').on('click', function(e) {
        e.preventDefault();
        $('.mobile-menu .sub-menu').slideUp();
        $('.mobile-menu .menu-item-has-children').removeClass('menu-open');
    })

    $('.btn-close').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.parents('.open').removeClass('open');
    });
</script>