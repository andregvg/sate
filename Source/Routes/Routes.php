<?php

namespace App\Routes;

use Slim\App;
use App\Controllers\HomeController;
use App\Controllers\ScheduleController;
use App\Controllers\SchoolController;
use App\Controllers\UserController;

class Routes {

    public static function register(App $app): void {

        // Rotas públicas
        $app->get('/', [HomeController::class, 'index']);
        $app->get('/user', [UserController::class, 'index']);
        $app->get('/school', [SchoolController::class, 'index']);
        $app->get('/schedule', [ScheduleController::class, 'index']);

        // Rotas de autenticação

        // Rotas protegidas por middleware de autenticação

        // Rotas de usuários

        // Rotas de escolas

        // Rotas de agendamentos
    }
}