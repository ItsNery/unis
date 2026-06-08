<?php

namespace App\Http\Controllers;

use App\Models\Efemeride;
use Illuminate\Http\Request;

class EfemerideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $efemerides = Efemeride::getSortedChronologically(Efemeride::query());
        return view('admin.efemerides.index', compact('efemerides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.efemerides.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|string|in:Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $efemeride = new Efemeride($validated);
        $efemeride->is_active = $request->has('is_active');
        $efemeride->order = 0; // Deprecated but kept for db compatibility
        $efemeride->save();

        return redirect()->route('admin.efemerides.index')->with('success', 'Efeméride creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Efemeride $efemeride)
    {
        return view('admin.efemerides.form', compact('efemeride'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Efemeride $efemeride)
    {
        $validated = $request->validate([
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|string|in:Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $efemeride->fill($validated);
        $efemeride->is_active = $request->has('is_active');
        $efemeride->save();

        return redirect()->route('admin.efemerides.index')->with('success', 'Efeméride actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Efemeride $efemeride)
    {
        $efemeride->delete();
        return redirect()->route('admin.efemerides.index')->with('success', 'Efeméride eliminada exitosamente.');
    }
}
