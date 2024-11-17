<?php

namespace App\Core;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        // Usa a instância singleton de View
        $this->view = View::getInstance();
    }
}