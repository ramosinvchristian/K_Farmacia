<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', compact('medicamentos'));
    }
    
    public function create()
    {
        return view('medicamentos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:medicamentos',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('medicamentos', 'public');
        }
    
        Medicamento::create($data);
    
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento creado correctamente.');
    }
    
    public function edit(Medicamento $medicamento)
        {
            return view('medicamentos.edit', compact('medicamento'));
        }
    
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:medicamentos,codigo,' . $medicamento->id,
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('medicamentos', 'public');
        }
    
        $medicamento->update($data);
    
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado.');
    }
    
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado.');
    }
}
