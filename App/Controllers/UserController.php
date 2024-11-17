<?php

namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    public function index(): string
    {
        return $this->render('pages/users.twig', [
            'title' => 'Usuários'
        ]);
    }
}
