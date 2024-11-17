<?php

namespace App\Core;

use Slim\App;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\SchoolController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\ScheduleController;

class Routes
{
    public static function register(App $app): void
    {
        $app->get('/', [HomeController::class, 'index']);
        
        $app->get('/login', [LoginController::class, 'index']);
        $app->get('/logout', [LoginController::class, 'index']);
        
        $app->get('/dashboard', [DashboardController::class, 'index']);
        
        $app->get('/schedules', [ScheduleController::class, 'index']);
        $app->get('/schedules/list', [ScheduleController::class, 'index']);
        $app->get('/schedules/new', [ScheduleController::class, 'new']);
        $app->post('/schedules/new', [ScheduleController::class, 'save']);
        
        $app->get('/users', [UserController::class, 'index']);

        $app->get('/schools', [SchoolController::class, 'index']);
    }
}