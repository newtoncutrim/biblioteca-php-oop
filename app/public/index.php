<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Routes\Api;
use App\Controllers\HomeController;

Api::get('/', [HomeController::class, 'index']);

Api::dispatch();