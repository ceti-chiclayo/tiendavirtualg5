<?php

namespace App\Controllers\Tienda;

use App\Models\Categoria;
use App\Models\Producto;
use Core\Controller;

class TiendaController extends Controller
{
    public function __construct()
    {
        // $this->registerMiddleware(new AuthMiddleware());
    }


    public function inicio(): string
    {
        return viewOnly('tienda/index');
    }

    public function detalleProducto($slug)
    {
        $producto = Producto::firstWhere('slug', $slug);
        $medidas = $producto->medidas()->distinct()->get();
        $colores = $producto->colores()->distinct()->get();
        $this->setLayout('tienda');
        return view('tienda/single-product', compact('producto', 'colores', 'medidas'));
    }
}
