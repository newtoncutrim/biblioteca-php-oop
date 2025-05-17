<?php

namespace App\Routes;

use App\Controllers\Auth\LoginController;
use App\Controllers\BookController;
use App\Controllers\LoanController;
use App\Controllers\UserController;
use App\Controllers\LivroController;

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/cadastro', [UserController::class, 'cadastro']);

Route::post('/create', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/update/{id}', [UserController::class, 'update']);
Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::get('/book-create', [BookController::class, 'create']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::get('/book-update/{id}', [BookController::class, 'update']);
Route::get('/book-delete/{id}', [BookController::class, 'delete']);

Route::get('/loan-create', [LoanController::class, 'create']);
Route::get('/loans', [LoanController::class, 'index']);
Route::get('/loan/{id}', [LoanController::class, 'show']);
Route::get('/loan-update/{id}', [LoanController::class, 'update']);
Route::get('/loan-delete/{id}', [LoanController::class, 'delete']);
