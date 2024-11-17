<?php

namespace App\Controllers;

use App\Core\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SchoolController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'pages/schools.twig', [
            'title' => 'Escolas'
        ]);
    }
}
