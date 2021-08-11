<div class="row">
    <div class="col-12">
        <form action="javascript:void(0)">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="kenne-product-remove">Quitar</th>
                            <th class="kenne-product-thumbnail">Imagen producto</th>
                            <th class="cart-product-name">Titulo</th>
                            <th class="kenne-product-price">Precio unitario</th>
                            <th class="kenne-product-quantity">Cantidad</th>
                            <th class="kenne-product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrito as $key => $item) : ?>
                            <tr>
                                <td class="kenne-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash" title="Remove"></i></a>
                                </td>
                                <td class="kenne-product-thumbnail"><a href="javascript:void(0)"><img width="200px" src="<?= $item['presentacion']->producto->primera_imagen_objeto->getImagenUrlAncho(300) ?>" alt="Uren's Cart Thumbnail"></a></td>
                                <td class="kenne-product-name"><a href="javascript:void(0)"><?= $item['presentacion']->titulo ?></a></td>
                                <td class="kenne-product-price"><span class="amount">S/ <?= $item['presentacion']->precio ?></span></td>
                                <td class="quantity">
                                    <label>Cantidad</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="<?= $item['cantidad'] ?>" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">
                                        S/ <?= number_format($item['cantidad'] * $item['presentacion']->precio, 2, '.', '') ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="coupon-all">
                        <div class="coupon">
                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Ingresa tu cupón" type="text">
                            <input onclick="aplicarCupon()" class="button" id="btn_cupon_code" name="apply_coupon" value="Aplicar cupón" type="button">
                        </div>
                        <div class="coupon2">
                            <input onclick="generarTabla()" class="button" name="update_cart" value="Actualizar carrito" type="button">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ml-auto">
                    <div class="cart-page-total">
                        <h2>Totales</h2>
                        <ul>
                            <li>Subtotal <span>S/ <?= $subtotal ?></span></li>
                            <?php if ($cupon !== false) : ?>
                                <li class='text-danger'>
                                    <?= $cupon->codigo ?> <span>- S/ <?= $valor_cupon ?></span>
                                </li>
                            <?php endif; ?>
                            <li>Total <span>S/ <?= $total ?></span></li>
                        </ul>
                        <a href="/pagar">Proceder a pagar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>