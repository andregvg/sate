<?php

namespace App\Controllers;

use App\Core\Controller;

class ScheduleController extends Controller
{
    public function index(): string
    {
        return $this->render('pages/schedules.twig', [
            'title' => 'Agendamentos'
        ]);
    }
}
