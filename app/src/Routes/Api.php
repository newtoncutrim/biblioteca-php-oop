<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/create', [UserController::class, 'create']);