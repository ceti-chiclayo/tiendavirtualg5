<?php

namespace App\View\Components;

use Core\ViewComponent;

class HeaderTopComponent extends ViewComponent
{

    public function render()
    {
        return viewOnly('components/header-top');
    }
}