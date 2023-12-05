<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Person;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanics = Mechanic::all();
        return view('main.registers.mechanics', ['mechanics' => $mechanics]);
    }

    public function showMechanic()
    {
        return view('main.screens.mechanics');
    }

    public function registerMechanic()
    {
        return view('main.registers.mechanics');
    }

    public function addMechanic(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:person,email',
            'cpf' => 'required|unique:person,cpf',
            'rg' => 'required|unique:person,rg',
            'specialty' => 'required',
            'phone' => 'required',
        ], [
                'email.unique' => 'O e-mail já está em uso.',
                'cpf.unique' => 'O CPF já está em uso.',
                'rg.unique' => 'O RG já está em uso.',
                'phone.unique' => 'O phone já está em uso.'
            ]);

        $person = Person::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'profile' => 'mechanic', 
            // 'password' => bcrypt('12345678'),
            'rg' => $request->input('rg'), 
            'cpf' => $request->input('cpf'),
            'phone' => $request->input('phone'),
        ]);

        if ($person) {

            Mechanic::create([
                'person_id_person' => $person->id,
                'status' => 1,
                'specialty' => $request->input('specialty'),
            ]);

            return view('main.registers.mechanics')->with('success', 'Funcionário criado com sucesso.');
        } 

        return redirect()->route('main.registers.mechanics')->with('error', 'Erro ao criar funcionário. ID da person nulo.');
    }
}