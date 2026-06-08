<?php

namespace App\Http\Controllers;

use App\Models\Metrica;
use Illuminate\Http\Request;

class MetricaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metricas = Metrica::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.metricas.index', compact('metricas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.metricas.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $metric = new Metrica($validated);
        $metric->is_active = $request->has('is_active');
        $metric->order = $request->input('order', 0);
        $metric->save();

        return redirect()->route('admin.metricas.index')->with('success', 'Métrica creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metrica $metrica)
    {
        return view('admin.metricas.form', compact('metrica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Metrica $metrica)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $metrica->fill($validated);
        $metrica->is_active = $request->has('is_active');
        if ($request->has('order') && $request->input('order') !== null) {
            $metrica->order = $request->input('order');
        }
        $metrica->save();

        return redirect()->route('admin.metricas.index')->with('success', 'Métrica actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metrica $metrica)
    {
        $metrica->delete();
        return redirect()->route('admin.metricas.index')->with('success', 'Métrica eliminada exitosamente.');
    }
}
