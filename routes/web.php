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

Route::get('/login', [AuthController::class, 'getLogin']);

Route::post('/login', [AuthController::class, 'login']);

// Dashboard

Route::get('/dashboard', [Dashboard::class, 'getDashboard']);

// Parts

Route::get('/parts/add', [PartController::class, 'registerPart']);

Route::get('/parts', [PartController::class, 'showPart']);

Route::post('/parts', [PartController::class, 'addPart']);

// Clients

Route::get('/clients/add', [ClientController::class, 'registerClient']);

Route::get('/clients', [ClientController::class, 'showClient']);

Route::post('/clients', [ClientController::class, 'addClient']);

// Mechanics

// Rota para exibir a lista de mecanicos
Route::get('/mechanics', [MechanicController::class, 'index'])->name('mechanics.show');

    // Rota para exibir o formulário de adição de funcionário
    Route::get('/mechanics/add', [MechanicController::class, 'create'])->name('mechanics.create');

    // Rota para processar o formulário e adicionar um novo funcionário
    Route::post('/mechanics/add', [MechanicController::class, 'send'])->name('mechanics.send');

// Team

// Rota para exibir a lista de clientes
Route::get('/teams', [TeamController::class, 'index'])->name('team.generate');

    // Rota para exibir o formulário de adição de equipe
    Route::get('/teams/add', [TeamController::class, 'create'])->name('team.create');

    // Rota para processar o formulário e adicionar uma nova equipe
    Route::post('/teams/add', [TeamController::class, 'send'])->name('teams.send');

// Vehicles

Route::get('/vehicles/add', [VehicleController::class, 'registerVehicle']);

Route::get('/vehicles', [VehicleController::class, 'showVehicle']);

Route::post('/vehicles', [VehicleController::class, 'addVehicle'])->name('vehicle.addVehicle');