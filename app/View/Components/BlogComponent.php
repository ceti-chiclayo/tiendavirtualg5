<?php


namespace App\View\Components;


class BlogComponent extends \Core\ViewComponent
{

    public function render()
    {
        return viewOnly('components/blog');
    }
}