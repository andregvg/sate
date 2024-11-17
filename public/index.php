<?php

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use App\Core\Routes;
use App\Core\Middlewares;

// Carrega o autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
session_start();

// Carrega as variáveis de ambiente do .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Cria a aplicação Slim
$app = AppFactory::create();

// Aplica os middlewares globais
Middlewares::apply($app);

// Registra as rotas
Routes::register($app);

// Executa a aplicação
$app->run();
