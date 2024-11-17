<?php

namespace App\Controllers;

use App\Core\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        // Renderizando a página home com o objeto $response correto
        return $this->view->render($response, 'pages/home.twig', [
            'title' => 'Página Inicial'
        ]);
    }
}