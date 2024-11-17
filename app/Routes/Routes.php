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
        $app->get('/', [HomeController::class, 'home']);
        $app->get('/user', [UserController::class, 'home']);
        $app->get('/school', [SchoolController::class, 'home']);
        $app->get('/schedule', [ScheduleController::class, 'home']);

        // Rotas de autenticação

        // Rotas protegidas por middleware de autenticação

        // Rotas de usuários

        // Rotas de escolas

        // Rotas de agendamentos
    }
}