<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return view('main.screens.parts', ['parts' => $parts]);
    }

    public function create()
    {
        return view('main.registers.parts');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'manufacture_year' => 'required|numeric',
        ]);

        Part::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'manufacturer' => $request->input('manufacturer'),
            'quantity' => $request->input('quantity'),
            'cost' => $request->input('cost'),
            'manufacture_year' => $request->input('manufacture_year'),
        ]);

        $parts = Part::all();
        return view('main.screens.parts', ['parts' => $parts])->with('success', 'Peça adicionada!');
    }
}