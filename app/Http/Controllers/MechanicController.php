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
            'phone' => 'required|unique:person,phone',
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

        if($person) {

            Mechanic::create([
                'person_id_person' => $person->id_person,
                'status' => 1,
                'specialty' => $request->input('specialty'),
            ]);

            $mechanics = (new Mechanic())->getAllMechanics();
            return redirect()->route('mechanics.index')->with(['mechanics' => $mechanics, 'success' => 'Mecânico adicionado com sucesso.']);
        }

        return redirect()->route('main.registers.mechanics')->with('error', 'Erro ao criar mecânico!');
    }

    public function delete($personId) {
        $person = Person::find($personId);

        if($person) {
            $mechanic = $person->mechanic;

            if($mechanic) {
                $mechanic->delete();
                $person->delete();

                return redirect()->route('mechanics.index')->with('success', 'Mecânico removido!');
            }
        }

        return redirect()->route('mechanics.index')->with('error', 'Mecânico não encontrado!');
    }

    public function edit($id) {
        $mechanic = Mechanic::with('person')->findOrFail($id);
        return view('main.edits.mechanics', ['mechanic' => $mechanic]);
    }    

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'rg' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
        ], [
            'email.unique' => 'O e-mail já está em uso.',
            'cpf.unique' => 'O CPF já está em uso.',
            'rg.unique' => 'O RG já está em uso.',
            'phone.unique' => 'O telefone já está em uso.'
        ]);

        $mechanic = Mechanic::with('person')->where('person_id_person', $id)->first();

        if(!$mechanic) {
            return redirect()->route('main.screens.mechanics')->with('error', 'Mecânico não encontrado.');
        }

        $personData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'phone' => $request->input('phone'),
        ];

        $mechanicData = [
            'specialty' => $request->input('specialty')
        ];

        $mechanic->person->update($personData);

        $mechanic->update($mechanicData);

        return redirect()->route('mechanics.index')->with('success', 'Mecânico atualizado com sucesso!');
    }

}