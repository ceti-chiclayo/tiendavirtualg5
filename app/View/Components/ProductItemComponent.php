<?php

namespace App\View\Components;

use Core\ViewComponent;

class ProductItemComponent extends ViewComponent
{
    public $producto;

    public function __construct($producto)
    {
        $this->producto = $producto;
    }

    public function render()
    {
        return viewOnly('components/product-item', [
            'producto' => $this->producto
        ]);
    }
}
