<?php

namespace App\View\Components;

use App\Services\CarritoService;
use Core\ViewComponent;

class MiniCartComponent extends ViewComponent
{

    public function render()
    {
        // consultar el estado actual del carrito de compras
        $carrito = session()->get('carrito', []);
        $total = CarritoService::total();
        $numero_items = CarritoService::numeroItems();
        return viewOnly('components/mini-cart', compact('carrito', 'total', 'numero_items'));
    }
}
