<?php

namespace App\Controllers;

use App\Core\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ScheduleController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'pages/schedules.twig', [
            'title' => 'Agendamentos'
        ]);
    }
}
