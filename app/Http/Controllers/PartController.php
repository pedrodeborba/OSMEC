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
        return redirect()->route('parts.index')->with(['parts' => $parts, 'success' => 'Peça adicionada com sucesso.']);
    }

    public function delete($id) {
        $part = Part::find($id);
        $part->delete();
        return redirect()->route('parts.index')->with('success', 'Peça removida!');
    }

    public function edit($id) {
        $part = Part::findOrFail($id);
        return view('main.edits.parts', ['part' => $part]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'manufacture_year' => 'required|numeric',
        ]);
    
        $part = Part::where('id_part', $id)->first();
    
        if (!$part) {
            return redirect()->route('main.screens.parts')->with('error', 'Peça não encontrada.');
        }
    
        $part->update($request->all());
    
        return redirect()->route('parts.index')->with('success', 'Peça atualizada com sucesso!');
    }
}