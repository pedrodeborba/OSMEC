<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceOrder;

class DashboardController extends Controller
{
    public function index(){

        //Total de vendas
        $totalSales = ServiceOrder::sum('total');; 

        //Total de despesas
        $totalExpenses = ServiceOrder::with('parts')->get()->sum(function ($order) {
            return $order->parts->sum('cost');
        });

        //Total de ganhos (receitas - despesas)
        $totalEarnings = $totalSales - $totalExpenses; 

        // $totalOrders = 0; //Total de ordens de serviço
        // $totalClients = 0; //Total de clientes
        // $totalVehicles = 0; //Total de veículos
        // $totalMechanics = 0; //Total de mecânicos
        // $totalTeams = 0; //Total de equipes
        // $totalPars = 0; //Total de peças
        // $totalServices = 0; //Total de serviços

        return view('main.screens.dashboard', compact('totalSales', 'totalExpenses', 'totalEarnings'));
    }
}
