<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return redirect()->intended('/admin/login');
});

Route::get('/admin/login', [AuthController::class, 'getLogin']);

Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', [Dashboard::class, 'getDashboard']);
