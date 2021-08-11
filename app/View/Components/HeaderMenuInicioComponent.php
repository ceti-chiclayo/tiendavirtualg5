<?php


namespace App\View\Components;


use App\Models\Categoria;
use App\Models\Marca;

class HeaderMenuInicioComponent extends \Core\ViewComponent
{

    public function render()
    {
        $categorias = Categoria::whereNull('categoria_id')->select('id', 'slug', 'nombre')->get();
        $marcas = Marca::take(10)->get();
        return viewOnly('components/header-menu-inicio', compact('categorias', 'marcas'));
    }
}