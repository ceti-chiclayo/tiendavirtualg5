<?php


namespace App\Controllers\Tienda;


use App\Models\Categoria;
use App\Models\Producto;
use Core\Request;

class BuscadorController extends \Core\Controller
{
    public function filtrar(Request $request)
    {
        return $this->respuesta(null, null, $request);
    }

    public function filtrarPorCategoria($categoria, Request $request)
    {
        return $this->respuesta($categoria, null, $request);
    }

    public function filtrarPorSubcategoria($categoria, $subcategoria, Request $request)
    {
        return $this->respuesta($categoria, $subcategoria, $request);
    }

    protected function respuesta($categoria, $subcategoria, Request $request)
    {
        $marca = $request->get('marca');
        $pagina = $request->get('pagina', 1);
        $orden = $request->get('orden', 'ASC');
        $columna_orden = $request->get('precio', 1);
        $page = ($pagina - 1) * 18;
        $categorias = Categoria::whereNull('categoria_id')->get();
        $productos = Producto::listar($categoria, $subcategoria, $marca, $page);
        $this->setLayout('tienda');
        return view('tienda/shop-left-sidebar', compact('categorias', 'productos', 'categoria', 'subcategoria'));
    }
}