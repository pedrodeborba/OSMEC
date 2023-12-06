<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VehicleController;

// Default

Route::redirect('/', '/login');

// Auth

Route::get('/login', [AuthController::class, 'getLogin'])->name('login.create');

Route::post('/login', [AuthController::class, 'login'])->name('send.send');

// Dashboard

Route::get('/dashboard', [Dashboard::class, 'getDashboard'])->name('dashboard.create');

// Parts

Route::get('/parts', [PartController::class, 'index'])->name('parts.show');

Route::get('/parts/add', [PartController::class, 'create'])->name('parts.create');

Route::post('/parts/add', [PartController::class, 'send'])->name('parts.send');

// Clients

Route::get('/clients', [ClientController::class, 'index'])->name('client.show');

Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.create');

Route::post('/clients/add', [ClientController::class, 'send'])->name('clients.send');

Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');

Route::put('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');

Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');

// Mechanics

Route::get('/mechanics', [MechanicController::class, 'index'])->name('mechanics.show');

Route::get('/mechanics/add', [MechanicController::class, 'create'])->name('mechanics.create');

Route::post('/mechanics/add', [MechanicController::class, 'send'])->name('mechanics.send');

// Team

Route::get('/teams', [TeamController::class, 'index'])->name('team.show');

Route::get('/teams/add', [TeamController::class, 'create'])->name('team.create');

Route::post('/teams/add', [TeamController::class, 'send'])->name('teams.send');

// Vehicles

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.show');

Route::get('/vehicles/add', [VehicleController::class, 'create'])->name('vehicles.create');

Route::post('/vehicles/add', [VehicleController::class, 'send'])->name('vehicles.send');

