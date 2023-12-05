<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MechanicController;
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

Route::get('/mechanics/add', [MechanicController::class, 'registerMechanic']);

Route::get('/mechanics', [MechanicController::class, 'showMechanic']);

Route::post('/mechanics', [MechanicController::class, 'addMechanic']);

// Vehicles

Route::get('/vehicles/add', [VehicleController::class, 'registerVehicle']);

Route::get('/vehicles', [VehicleController::class, 'showVehicle']);

Route::post('/vehicles', [VehicleController::class, 'addVehicle']);