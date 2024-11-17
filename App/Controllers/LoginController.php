<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public function index(): string
    {
        return $this->render('pages/login.twig', [
            'title' => 'Login'
        ]);
    }
}
