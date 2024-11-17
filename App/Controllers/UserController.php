<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class UserController
{

    public function index(Request $request, Response $response): Response
    {
        // Retorna lista de usuários

        $response->getBody()->write("Listagem de usuários");
        return $response;
    }

    public function store(Request $request, Response $response): Response
    {
        // Lida com criação de um novo usuário
        return $response;
    }
}
