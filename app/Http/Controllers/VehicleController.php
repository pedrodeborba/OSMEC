<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Client;

class VehicleController extends Controller {
    
    public function index() {
        $vehicles = (new Vehicle())->getAll();

        return view('main.screens.vehicles', ['vehicles' => $vehicles]);
    }

    public function create() {
        $clients = Client::all();
        return view('main.registers.vehicles', compact('clients'));
    }

    public function send(Request $request) {

        redirect()->route('vehicles.index');

        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'mileage' => 'required|numeric',
            'client_cpf' => 'required|string|max:255',
        ]);

        $client = Client::firstOrCreate(['cpf' => $request->input('client_cpf')]);

        $vehicle = Vehicle::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'license_plate' => $request->input('license_plate'),
            'model' => $request->input('model'),
            'mileage' => $request->input('mileage'),
            'client_id_client' => $client->id_client,
        ]);

        if($vehicle) {
            $vehicles = (new Vehicle())->getAll();
            return redirect()->route('vehicles.index')->with(['vehicles' => $vehicles, 'success' => 'Veículo criado com sucesso.']);
        } else {
            return view('main.registers.vehicles')->with('error', 'Falha ao associar o veículo ao cliente.');
        }
    }

    public function delete($id) {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Veículo removido!');
    }

    public function edit($id) {
        $vehicle = Vehicle::findOrFail($id);
        $clients = Client::all();
    
        return view('main.edits.vehicles', ['vehicle' => $vehicle, 'clients' => $clients]);
    } 

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'license_plate' => 'required',
            'model' => 'required',
            'mileage' => 'required|numeric',
            'client_cpf' => 'required|string|max:255',
        ]);
    
        $vehicle = Vehicle::where('id_vehicle', $id)->first();
    
        if (!$vehicle) {
            return redirect()->route('main.screens.vehicles')->with('error', 'Veículo não encontrado.');
        }
    
        $existingClient = Client::where('cpf', $request->input('client_cpf'))->first();
    
        if ($existingClient) {
            $vehicle->update([
                'name' => $request->input('name'),
                'color' => $request->input('color'),
                'license_plate' => $request->input('license_plate'),
                'model' => $request->input('model'),
                'mileage' => $request->input('mileage'),
                'client_id_client' => $existingClient->id_client,
            ]);
    
            return redirect()->route('vehicles.index')->with('success', 'Veículo atualizado com sucesso!');
        } else {
            return redirect()->route('vehicles.index')->with('error', 'Cliente não encontrado.');
        }
    }
    
}