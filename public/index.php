<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use App\Routes\Routes;

// Autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
session_start();

// Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Cria a aplicação Slim
$app = AppFactory::create();

/**********************
 * Middlewares globais
 **********************/
// Middleware para lidar com requisições JSON e form-data
$app->addBodyParsingMiddleware();

// Middleware para habilitar o roteamento
$app->addRoutingMiddleware();
 
// Middleware para tratamento de erros
$app->addErrorMiddleware(
  filter_var($_ENV['DISPLAY_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERRORS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN)
);

/**********************
 * Registro das rotas
 **********************/
Routes::register($app);

// Executa a aplicação
$app->run();
