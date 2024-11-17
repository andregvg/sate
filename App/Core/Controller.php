<?php

namespace App\Core;

abstract class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }
}