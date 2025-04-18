<?php

require_once __DIR__ . '/../vendor/autoload.php';
$entityManager = require_once __DIR__ . '/../src/Conf/Doctrine.php';

use Dotenv\Dotenv;
use App\Routes\Api;
use App\Controllers\HomeController;
use App\Conf\Connection;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Api::get('/', [HomeController::class, 'index']);

Api::dispatch();