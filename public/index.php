<?php

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use App\Core\Routes;
use App\Core\Session;
use App\Core\Views;
use Slim\Views\TwigMiddleware;

// Autoload do Composer
require __DIR__ . '/../vendor/autoload.php';


// Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Inicia sessão
Session::start();

// Cria a aplicação Slim
$app = AppFactory::create();

// Configura Twig e Middleware
$twig = Views::create();
$app->add(TwigMiddleware::create($app, $twig));

// Middlewares globais
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(
  filter_var($_ENV['DISPLAY_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERRORS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN)
);

// Registra rotas
Routes::register($app);

// Executa o app
$app->run();
