<?php


namespace App\View\Components;


class MenuComponent extends \Core\ViewComponent
{

    public function render()
    {
        return viewOnly('components/menu');
    }
}