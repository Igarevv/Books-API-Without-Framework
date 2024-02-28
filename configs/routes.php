<?php

namespace App\Config;

use App\Core\Routes\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

return [
  Route::get('/', [HomeController::class, 'index']),
  Route::post('/api/auth/login', [LoginController::class, 'login']),
  Route::post('/api/auth/register', [RegisterController::class, 'register']),
  Route::post('/api/auth/refresh-tokens', [LoginController::class, 'refresh']),
  Route::post('/api/auth/logout', [LoginController::class, 'logout']),
  Route::post('/api/admin/books', [BookController::class, 'create'])->only('auth')->only('admin'),
  Route::delete('/api/admin/books/{id}', [BookController::class, 'deleteBook'])->only('auth')->only('admin'),
  Route::get('/api/books', [BookController::class, 'index']),
  Route::get('/api/books/{id}', [BookController::class, 'showOneBook']),
    // /api/books?limit={}
];