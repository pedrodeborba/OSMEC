<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;

Route::redirect('/', '/admin/login');

Route::get('/admin/login', [AuthController::class, 'getLogin']);

Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', [Dashboard::class, 'getDashboard']);
