<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ScheduleController
{
    public function home(Request $request, Response $response): Response
    {
        $response->getBody()->write("Schedule Controler");
        return $response;
    }
}