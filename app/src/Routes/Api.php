<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/create', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/update/{id}', [UserController::class, 'update']);
Route::get('/delete/{id}', [UserController::class, 'delete']);