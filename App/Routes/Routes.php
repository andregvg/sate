<?php

namespace App\Routes;

use App\Controllers\HomeController;
use Slim\App;

class Routes {

    public static function register(App $app): void {

        // Rotas públicas
        $app->get('/', [HomeController::class, 'index']);

        // Rotas de autenticação

        // Rotas protegidas por middleware de autenticação

        // Rotas de usuários

        // Rotas de escolas

        // Rotas de agendamentos
    }
}