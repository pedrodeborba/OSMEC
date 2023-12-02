<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return redirect()->intended('login');
});

Route::get('/login', [Auth::class, 'getLogin']);

// Route::post('/login', [Auth::class, 'login']);

Route::get('/dashboard', [Dashboard::class, 'getDashboard']);
