<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VehicleController;

// Default

Route::redirect('/', '/login');

// Auth

Route::get('/login', [AuthController::class, 'getLogin'])->name('login.create');

Route::post('/login', [AuthController::class, 'login'])->name('login.send');

// Dashboard

Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard.create');

// Clients

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.create');

Route::post('/clients/send', [ClientController::class, 'send'])->name('clients.send');

Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');

Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');

Route::put('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');

// Mechanics

Route::get('/mechanics', [MechanicController::class, 'index'])->name('mechanics.index');

Route::get('/mechanics/add', [MechanicController::class, 'create'])->name('mechanics.create');

Route::post('/mechanics/send', [MechanicController::class, 'send'])->name('mechanics.send');

Route::get('/mechanics/delete/{id}', [MechanicController::class, 'delete'])->name('mechanics.delete');

Route::get('/mechanics/edit/{id}', [MechanicController::class, 'edit'])->name('mechanics.edit');

Route::put('/mechanics/update/{id}', [MechanicController::class, 'update'])->name('mechanics.update');

// Team

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/add', [TeamController::class, 'create'])->name('teams.create');

Route::post('/teams/send', [TeamController::class, 'send'])->name('teams.send');

Route::get('/teams/delete/{id}', [TeamController::class, 'delete'])->name('teams.delete');

// Vehicles

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

Route::get('/vehicles/add', [VehicleController::class, 'create'])->name('vehicles.create');

Route::post('/vehicles/send', [VehicleController::class, 'send'])->name('vehicles.send');

Route::get('/vehicles/delete/{id}', [VehicleController::class, 'delete'])->name('vehicles.delete');

Route::get('/vehicles/edit/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');

Route::put('/vehicles/update/{id}', [VehicleController::class, 'update'])->name('vehicles.update');

// Parts

Route::get('/parts', [PartController::class, 'index'])->name('parts.index');

Route::get('/parts/add', [PartController::class, 'create'])->name('parts.create');

Route::post('/parts/send', [PartController::class, 'send'])->name('parts.send');

Route::get('/parts/delete/{id}', [PartController::class, 'delete'])->name('parts.delete');

Route::get('/parts/edit/{id}', [PartController::class, 'edit'])->name('parts.edit');

Route::put('/parts/update/{id}', [PartController::class, 'update'])->name('parts.update');
