<?php

namespace App\Core;

use Slim\Views\Twig;

class Views
{
    public static function create(): Twig
    {
        return Twig::create(__DIR__ . '/../Views', ['cache' => false]);
    }
}
