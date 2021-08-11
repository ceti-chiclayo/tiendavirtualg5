<?php

namespace App\View\Components;

use Core\ViewComponent;

class HeaderComponent extends ViewComponent
{
    public function render()
    {
        return viewOnly('components/header');
    }
}
