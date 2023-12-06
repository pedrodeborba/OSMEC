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

        if ($person) {

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
        // Buscar a pessoa associada ao mecânico
        $person = Person::find($personId);
    
        if ($person) {
            // Buscar o mecânico associado à pessoa
            $mechanic = $person->mechanic;
    
            if ($mechanic) {
                // Excluir o mecânico e a pessoa associada em cascata
                $mechanic->delete();
                $person->delete();
    
                return redirect()->route('mechanics.index')->with('success', 'Mecânico removido!');
            }
        }
    
        return redirect()->route('mechanics.index')->with('error', 'Mecânico não encontrado!');
    }
}