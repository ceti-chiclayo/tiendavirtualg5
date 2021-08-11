<div class="banner-area">
    <div class="container">
        <div class="row">
            <?php foreach ($categorias as $categoria) : ?>
                <div class="col-md-3 col-6 custom-xxs-col">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="/buscador/<?=$categoria->slug?>">
                                <img src="<?php echo $categoria->imagen_url ?>" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>