<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('main.registers.clients', ['clients' => $clients]);
    }

    public function showClient()
    {
        return view('main.screens.clients');
    }

    public function registerClient()
    {
        return view('main.registers.clients');
    }

    public function addClient(Request $request){

        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:client,email',
            'cpf' => 'required|unique:client,cpf',
            'rg' => 'required|unique:client,rg',
            'address' => 'required',
            'phone' => 'required|unique:client,phone'
        ], [
            'email.unique' => 'O e-mail já está em uso.',
            'cpf.unique' => 'O CPF já está em uso.',
            'rg.unique' => 'O RG já está em uso.',
            'phone.unique' => 'O telefone já está em uso.'
        ]);

        Client::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ]);
    
        return view('main.screens.clients')->with('success', 'Cliente criado com sucesso!');
    }
}