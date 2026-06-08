<?php

namespace App\Http\Controllers;

use App\Models\DeclaracionComite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeclaracionComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $declarations = DeclaracionComite::orderBy('date', 'desc')->get();
        return view('admin.declaraciones_comite.index', compact('declarations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.declaraciones_comite.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'committee_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'external_url' => 'nullable|url|max:255',
            'file' => 'nullable|mimes:pdf|max:5120',
        ]);

        $declaration = new DeclaracionComite($validated);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('committees', 'public');
            $declaration->file_path = $path;
        }

        $declaration->save();

        return redirect()->route('admin.declaraciones_comite.index')->with('success', 'Acuerdo/Declaración creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeclaracionComite $committee)
    {
        // Notice we are accepting 'committee' as parameter to match route model binding if customized
        return view('admin.declaraciones_comite.edit', ['declaration' => $committee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeclaracionComite $committee)
    {
        $validated = $request->validate([
            'committee_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'external_url' => 'nullable|url|max:255',
            'file' => 'nullable|mimes:pdf|max:5120',
        ]);

        $committee->fill($validated);

        if ($request->hasFile('file')) {
            if ($committee->file_path) {
                Storage::disk('public')->delete($committee->file_path);
            }
            $path = $request->file('file')->store('committees', 'public');
            $committee->file_path = $path;
        }

        $committee->save();

        return redirect()->route('admin.declaraciones_comite.index')->with('success', 'Acuerdo/Declaración actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeclaracionComite $committee)
    {
        if ($committee->file_path) {
            Storage::disk('public')->delete($committee->file_path);
        }
        $committee->delete();

        return redirect()->route('admin.declaraciones_comite.index')->with('success', 'Acuerdo/Declaración eliminado exitosamente.');
    }
}
