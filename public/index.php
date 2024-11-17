<?php

// Autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use App\Routes\Routes;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Inicia a sessão
session_start();

// Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Cria a aplicação Slim
$app = AppFactory::create();

// Configura o Twig
$twig = Twig::create(__DIR__ . '/../app/Views', ['cache' => false]);

// MIDDLEWEARES GLOBAIS
$app->addBodyParsingMiddleware(); // Middleware para lidar com requisições JSON e form-data
$app->addRoutingMiddleware(); // Middleware para habilitar o roteamento
$app->add(TwigMiddleware::create($app, $twig)); // Middleware para integração com Twig

// REGISTRO DEROTAS
Routes::register($app);

// Middleware para tratamento de erros (adicionado por último)
$app->addErrorMiddleware(
  filter_var($_ENV['DISPLAY_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERRORS'], FILTER_VALIDATE_BOOLEAN),
  filter_var($_ENV['LOG_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN)
);

// Executa a aplicação
$app->run();