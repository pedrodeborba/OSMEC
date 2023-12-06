<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class PartController extends Controller
{
    // public function index()
    // {
    //     $parts = Part::all();
    //     return view('main.registers.parts', ['parts' => $parts]);
    // }

    public function showPart()
    {
        return view('main.screens.parts');
    }

    public function registerPart()
    {
        return view('main.registers.parts');
    }

    public function addPart(Request $request)
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

        return view('main.screens.parts')->with('success', 'Peça adicionada!');
    }
}