<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\Vehicle;
use App\Models\Client;
use App\Models\Team;
use App\Models\Part;

class ServiceOrderController extends Controller
{
    public function index()
    {
        $service_orders = ServiceOrder::all();

        return view('main.screens.service_orders', compact('service_orders'));
    }
    public function create()
    {
        $vehicles = Vehicle::pluck('license_plate', 'id_vehicle');
        $clients = Client::pluck('name', 'id_client');
        $teams = Team::pluck('name', 'id_mechanic_team');
        $parts = Part::pluck('name', 'id_part');

        return view('main.registers.service_orders', compact('vehicles', 'clients', 'teams', 'parts'));
    }

    public function send(Request $request)
    {
        $request['status'] = $request->has('status') ? 0 : 1;
        $request->validate([
            'entry_date' => 'required|date_format:Y-m-d',
            'exit_date' => 'required|date_format:Y-m-d',
            'defect' => 'required',
            'solution' => 'required',
            'work_price' => 'required',
            'total',
            'status' => 'required|in:0,1',
            'vehicle_id_vehicle_fk' => 'required',
            'mechanic_team_id_mechanic_team' => 'required',
            'client_id_client_fk' => 'required',
            'part' => 'required|array',
            'part.*' => 'exists:part,id_part',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'part.*.exists' => 'Uma ou mais peças selecionadas não existem.',
        ]);

        try {
            // Calcula o custo das peças
            $partsCost = 0;
            if ($request->has('part')) {
                $selectedParts = $request->input('part');
                foreach ($selectedParts as $partId) {
                    $part = Part::find($partId);
                    if ($part) {
                        $partsCost += $part->cost;
                    }
                }
            }

            // Calcula o total da ordem de serviço (work_price + custo das peças)
            $total = $request->input('work_price') + $partsCost;

            // Define o total calculado
            $request['total'] = $total;

            $service_order = ServiceOrder::create($request->all());

            $service_order->vehicle()->associate($request->input('vehicle_id_vehicle_fk'));
            $service_order->team()->associate($request->input('mechanic_team_id_mechanic_team'));
            $service_order->client()->associate($request->input('client_id_client_fk'));
            $service_order->parts()->sync($request->input('part'));

            return redirect()->route('service_orders.index')->with('success', 'Ordem de serviço criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('service_orders.create')->with('error', 'Falha ao criar a ordem de serviço.');
        }
    }

    public function delete($id)
    {
        $service_order = ServiceOrder::findOrFail($id);

        try {
            $service_order->delete();

            return redirect()->route('service_orders.index')->with('success', 'Ordem de serviço excluída com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('service_orders.index')->with('error', 'Falha ao excluir a ordem de serviço.');
        }
    }

    public function edit($id)
    {
        $service_order = ServiceOrder::findOrFail($id);
        $service_order->entry_date = \Carbon\Carbon::parse($service_order->entry_date)->format('Y-m-d');
        $service_order->exit_date = \Carbon\Carbon::parse($service_order->exit_date)->format('Y-m-d');

        $vehicles = Vehicle::pluck('license_plate', 'id_vehicle');
        $clients = Client::pluck('name', 'id_client');
        $teams = Team::pluck('name', 'id_mechanic_team');
        $parts = Part::pluck('name', 'id_part');

        return view('main.edits.service_orders', compact('service_order', 'vehicles', 'clients', 'teams', 'parts'));
    }


    public function update(Request $request, $id)
    {
        $request['status'] = $request->has('status') ? 0 : 1;
        $request->validate([
            'entry_date' => 'required|date_format:Y-m-d',
            'exit_date' => 'required|date_format:Y-m-d',
            'defect' => 'required',
            'solution' => 'required',
            'work_price' => 'required',
            'total',
            'status' => 'required|in:0,1',
            'vehicle_id_vehicle_fk' => 'required',
            'mechanic_team_id_mechanic_team' => 'required',
            'client_id_client_fk' => 'required',
            'part' => 'required|array',
            'part.*' => 'exists:part,id_part',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'part.*.exists' => 'Uma ou mais peças selecionadas não existem.',
        ]);

        try {
            // Calcula o custo das peças
            $partsCost = 0;
            if ($request->has('part')) {
                $selectedParts = $request->input('part');
                foreach ($selectedParts as $partId) {
                    $part = Part::find($partId);
                    if ($part) {
                        $partsCost += $part->cost;
                    }
                }
            }

            // Calcula o total da ordem de serviço (work_price + custo das peças)
            $total = $request->input('work_price') + $partsCost;

            // Define o total calculado
            $request['total'] = $total;

            $service_order = ServiceOrder::findOrFail($id);

            $service_order->update($request->all());

            $service_order->vehicle()->associate($request->input('vehicle_id_vehicle_fk'));
            $service_order->team()->associate($request->input('mechanic_team_id_mechanic_team'));
            $service_order->client()->associate($request->input('client_id_client_fk'));
            $service_order->parts()->sync($request->input('part'));

            return redirect()->route('service_orders.index')->with('success', 'Ordem de serviço atualizada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('service_orders.index')->with('error', 'Falha ao atualizar a ordem de serviço.');
        }
    }
}
