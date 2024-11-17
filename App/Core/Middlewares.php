<?php

namespace App\Core;

use Slim\App;

class Middlewares
{
    public static function apply(App $app): void
    {
        // Middleware para lidar com JSON e form-data
        $app->addBodyParsingMiddleware();

        // Middleware para roteamento
        $app->addRoutingMiddleware();

        // Middleware para tratamento de erros
        $app->addErrorMiddleware(
            filter_var($_ENV['DISPLAY_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN),
            filter_var($_ENV['LOG_ERRORS'], FILTER_VALIDATE_BOOLEAN),
            filter_var($_ENV['LOG_ERROR_DETAILS'], FILTER_VALIDATE_BOOLEAN)
        );
    }
}