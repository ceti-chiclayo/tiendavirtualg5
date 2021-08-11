<?php


namespace App\View\Components;


class HeaderInicioComponent extends \Core\ViewComponent
{

    public function render()
    {
        return viewOnly('components/header-inicio');
    }
}