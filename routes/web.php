<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PartController;

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'getLogin']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [Dashboard::class, 'getDashboard']);

Route::get('/parts/add', [PartController::class, 'registerPart']);

Route::get('/parts', [PartController::class, 'showPart']);

Route::post('/parts', [PartController::class, 'addPart']);