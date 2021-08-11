<div class="product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Todos los productos</h3>
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <?php $clase = 'active'; ?>
                            <?php foreach ($categorias as $categoria): ?>
                                <li><a class="<?= $clase ?>" data-toggle="tab"
                                       href="#<?= $categoria->slug ?>"><span><?= $categoria->nombre ?></span></a>
                                </li>
                                <?php $clase = ''; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content kenne-tab_content">
                    <?php $clase = 'active show'; ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <div id="<?= $categoria->slug ?>" class="tab-pane <?=$clase?>" role="tabpanel">
                            <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow"
                                 data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":992, "settings": {
                                    "slidesToShow": 3
                                    }},
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 2
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                                <?php
                                $productos = $categoria->productosPorCategoria()->inRandomOrder()->take(20)->get();
                                foreach ($productos as $producto):
                                    ?>
                                    <?php echo  viewComponent('ProductItem', $producto) ?>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <?php $clase = ''; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>