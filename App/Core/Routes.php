<?php

namespace App\Core;

use Slim\App;

class Routes
{
    public static function register(App $app): void
    {
        // Rotas publicas
        $app->get('/', \App\Controllers\HomeController::class . ':index');

        // Outras rotas...

        // Rotas de autenticação

        // Rotas protegidas por middleware de autenticação

        // Rotas de usuários

        // Rotas de escolas

        // Rotas de agendamentos

    }
}