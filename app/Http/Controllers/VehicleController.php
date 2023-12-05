<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Client;

class VehicleController extends Controller {
    
    public function showVehicle() {
        $vehicles = (new Vehicle())->getAll();

        return view('main.screens.vehicles', ['vehicles' => $vehicles]);
    }

    public function registerVehicle() {
        $clients = Client::all();
        return view('main.registers.vehicles', compact('clients'));
    }

    public function addVehicle(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'mileage' => 'required|string|max:255',
            'client_cpf' => 'required|string|max:255',
        ]);

        $client = Client::firstOrCreate(['cpf' => $request->input('client_cpf')]);

        $veiculo = Vehicle::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'license_plate' => $request->input('license_plate'),
            'model' => $request->input('model'),
            'mileage' => $request->input('mileage'),
            'client_id_client' => $client->id_client,
        ]);


        if($veiculo) {
            return view('main.registers.vehicles')->with('success', 'Veículo criado com sucesso.');
        } else {
            return view('main.registers.vehicles')->with('error', 'Falha ao associar o veículo ao cliente.');
        }
    }
}