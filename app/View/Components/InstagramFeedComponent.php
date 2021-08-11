<?php


namespace App\View\Components;


class InstagramFeedComponent extends \Core\ViewComponent
{

    public function render()
    {
        return viewOnly('components/instagram-feed');
    }
}