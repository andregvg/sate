<?php

namespace App\Controllers;

use App\Core\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ScheduleController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'pages/schedules-list.twig', [
            'title' => 'Agendamentos'
        ]);
    }

    public function new(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'pages/schedules-form.twig', [
            'title' => 'Agendamentos'
        ]);
    }

    public function save(Request $request, Response $response): Response
    {
        $response->getBody()->write("método para gerenciar o preenchimento do formulário");
        return $response;
    }
}
