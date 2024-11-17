<?php

namespace App\Core;

use Slim\Views\Twig;

class View
{
    private static ?Twig $twig = null;

    private function __construct()
    {
        // Proibe instanciamento direto
    }

    public static function getInstance(): Twig
    {
        if (self::$twig === null) {
            self::$twig = Twig::create(__DIR__ . '/../Views', ['cache' => false]);
        }
        return self::$twig;
    }

    public function render(string $template, array $data = []): string
    {
        return self::getInstance()->fetch($template, $data);
    }
}