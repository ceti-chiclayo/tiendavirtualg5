<?php

namespace App\View\Components;

use App\Models\Categoria;
use Core\ViewComponent;

class BannerAreaComponent extends ViewComponent
{
    public function render()
    {
        $categorias = Categoria::whereNull('categoria_id')->get()->take(4);
        return viewOnly('components/banner-area', compact('categorias'));
    }
}
