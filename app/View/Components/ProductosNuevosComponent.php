<?php

namespace App\View\Components;

use App\Models\Producto;
use Core\ViewComponent;

class ProductosNuevosComponent extends ViewComponent
{
    public function render()
    {
        $productos = Producto::orderBy('created_at', 'DESC')->take(20)->get();
        return viewOnly('components/productos-nuevos', compact('productos'));
    }
}
