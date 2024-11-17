<?php

namespace App\Controllers;

use App\Core\Controller;

class SchoolController extends Controller
{
    public function index(): string
    {
        return $this->render('pages/schools.twig', [
            'title' => 'Escolas'
        ]);
    }
}
