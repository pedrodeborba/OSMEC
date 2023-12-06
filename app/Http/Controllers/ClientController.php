<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller {

    public function index() {
        $clients = Client::all();
        return view('main.screens.clients', ['clients' => $clients]);
    }

    public function create() {
        return view('main.registers.clients');
    }

    public function send(Request $request) {

        $request->validate([
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
            'phone.unique' => 'O phone já está em uso.'
        ]);

        Client::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ]);

        $clients = Client::all();
        return redirect()->route('clients.index')->with(['clients' => $clients, 'success' => 'Cliente adicionado com sucesso.']);
    }

    public function delete($id) {
        $client = Client::find($id);

        if($client->vehicle()->exists()) {
            return redirect()->route('clients.index')->with('error', 'Este cliente possui carros associados. Remova os carros e tente novamente.');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'cliente removido!');
    }

    // public function edit($id) {
    //     $client = Client::find($id);
    //     return view('EDITCLIENT', ['client' => $client]);
    // }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:client,email,'.$id,
    //         'cpf' => 'required|unique:client,cpf,'.$id,
    //         'rg' => 'required|unique:client,rg,'.$id,
    //         'address' => 'required',
    //         'phone' => 'required|unique:client,phone,'.$id,
    //     ], [
    //         'email.unique' => 'O e-mail já está em uso.',
    //         'cpf.unique' => 'O CPF já está em uso.',
    //         'rg.unique' => 'O RG já está em uso.',
    //         'phone.unique' => 'O phone já está em uso.'
    //     ]);

    //     $client = Client::find($id);

    //     $client->update($request->all());

    //     return redirect()->route('client.show')->with('success', 'client atualizado com sucesso.');
    // }

}