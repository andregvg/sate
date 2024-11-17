<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        // Renderiza a view da página inicial
        $html = $this->view->render('pages/home.twig', [
            'title' => 'Página Inicial',
            'message' => 'Bem-vindo ao SATE!',
        ]);

        $response->getBody()->write($html);
        return $response;
    }
}