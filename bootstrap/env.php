<?php

use Dotenv\Dotenv;

// Carregar variáveis de ambiente do .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();