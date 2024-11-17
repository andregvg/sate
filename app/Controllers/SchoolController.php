<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SchoolController
{
    public function home(Request $request, Response $response): Response
    {
        $response->getBody()->write("School Controler");
        return $response;
    }
}