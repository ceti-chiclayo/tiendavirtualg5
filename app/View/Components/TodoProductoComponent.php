<?php


namespace App\View\Components;


use App\Models\Categoria;

class TodoProductoComponent extends \Core\ViewComponent
{

    public function render()
    {
        $categorias = Categoria::whereNull('categoria_id')->get();
        return viewOnly('components/todo-producto', compact('categorias'));
    }
}