<?php


namespace App\View\Components;


class FooterComponent extends \Core\ViewComponent
{

    public function render()
    {
        return viewOnly('components/footer');
    }
}