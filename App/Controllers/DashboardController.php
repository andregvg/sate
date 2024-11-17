<?php

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index(): string
    {
        return $this->render('pages/dashboard.twig', [
            'title' => 'Dashboard'
        ]);
    }
}
