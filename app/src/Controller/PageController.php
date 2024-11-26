<?php

namespace App\Controller;

use Symplefony\View;

class PageController
{
    public function index(): void
    {
        $view = new View('page:home');

        $view->render();
    }

    public function mentionsLegales(): void
    {
        echo 'Les mentions légales';
    }
}
