<?php

namespace App\Core;

use App\Core\Views;
use Slim\Views\Twig;

abstract class Controller
{
    protected Twig $view;

    public function __construct()
    {
        $this->view = Views::create();
    }
}
