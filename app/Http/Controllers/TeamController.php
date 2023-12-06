<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){
        $teams = (new Team())->getAll();

        return view('main.screens.teams', ['teams' => $teams]);
    }
    public function create()
    {
        $persons = Person::where('profile', 'mechanic')->get();

        return view('main.registers.teams', compact('persons'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'function' => 'required',
            'mechanics' => 'required',
            'mechanic_person_id_person' => 'required',
        ]);

        $persons = Person::firstOrCreate(['name' => $request->input('mechanic_person_id_person'), 'profile' => 'mechanic']);

        $team = Team::create([
            'name' => $request->input('name'),
            'function' => $request->input('function'),
            'mechanics' => $request->input('mechanics'),
            'mechanic_person_id_person' => $persons->id_person,
        ]);

        if ($team) {
            $teams = (new Team())->getAll();
            return redirect()->route('teams.index')->with(['teams' => $teams, 'success' => 'Equipe criada com sucesso.']);
        } else {
            return view('main.registers.teams')->with('error', 'Falha ao criar a equipe!');
        }
    }
}