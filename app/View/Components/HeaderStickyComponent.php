<?php


namespace App\View\Components;

use App\Services\CarritoService;

class HeaderStickyComponent extends \Core\ViewComponent
{

    public function render()
    {
        $total_items = str_pad(CarritoService::numeroItems(), 2, "0", STR_PAD_LEFT);
        return viewOnly('components/header-sticky', compact('total_items'));
    }
}