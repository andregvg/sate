<?php

namespace App\Routes;

use Slim\App;
use App\Controllers\HomeController;

class Routes {

    public static function register(App $app): void {

        // Rotas públicas
        $app->get('/', [HomeController::class, 'home']);

        // Rotas de autenticação

        // Rotas protegidas por middleware de autenticação

        // Rotas de usuários

        // Rotas de escolas

        // Rotas de agendamentos
    }
}