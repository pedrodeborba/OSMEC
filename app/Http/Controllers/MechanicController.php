<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Person;

class MechanicController extends Controller {
    public function index() {
        $mechanics = (new Mechanic())->getAllMechanics();

        return view('main.screens.mechanics', ['mechanics' => $mechanics]);
    }


    public function create() {
        return view('main.registers.mechanics');
    }

    public function send(Request $request) {

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
            'password' => bcrypt('12345678'),
            'profile' => 'mechanic', 
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

            $mechanics = (new Mechanic())->getAllMechanics();
            return view('main.screens.mechanics', ['mechanics' => $mechanics])->with('success', 'Mecânico criado com sucesso.');
        } 

        return redirect()->route('main.registers.mechanics')->with('error', 'Erro ao criar mecânico!');
    }

}