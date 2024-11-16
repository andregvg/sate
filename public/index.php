<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../env.php';

/**
 * Instantiate App and setting the base path
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
$app = AppFactory::create();

/**
 * Define o diretório base
 * 
 * Em ambiente de produção é necessário quando não inicia o servidor integrado do PHP
 * Não é necessário se executar php -S localhost:8000, à partir do diretório public/
 */
//$app->setBasePath('/sate');

/**
  * The routing middleware should be added earlier than the ErrorMiddleware
  * Otherwise exceptions thrown from it will not be handled by the middleware
  */
$app->addRoutingMiddleware();

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(
    getenv('DISPLAY_ERRORS_DETAILS'),
    getenv('LOG_ERRORS'),
    getenv('LOG_ERROR_DETAILS')
);

// Define app routes
$app->get('/', function(Request $request, Response $response, array $args){
    $response->getBody()->write("Hello world!");
    return $response;
});

// Run app
$app->run();