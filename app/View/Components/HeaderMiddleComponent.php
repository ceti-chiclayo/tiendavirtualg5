<?php


namespace App\View\Components;

use App\Services\CarritoService;

class HeaderMiddleComponent extends \Core\ViewComponent
{

    public function render()
    {
        $total_items = str_pad(CarritoService::numeroItems(), 2, "0", STR_PAD_LEFT);
        $total = CarritoService::total();
        return viewOnly('components/header-middle', compact('total_items', 'total'));
    }
}
