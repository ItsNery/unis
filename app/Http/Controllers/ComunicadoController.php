<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComunicadoController extends Controller
{
    public function index()
    {
        $comunicados = Comunicado::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.comunicados.index', compact('comunicados'));
    }

    public function create()
    {
        return view('admin.comunicados.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB PDF
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . rand(1000, 9999);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('comunicados', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('comunicados/images', 'public');
        }

        Comunicado::create($validated);

        return redirect()->route('admin.comunicados.index')->with('success', 'Comunicado oficial publicado exitosamente.');
    }

    public function edit(Comunicado $comunicado)
    {
        return view('admin.comunicados.form', compact('comunicado'));
    }

    public function update(Request $request, Comunicado $comunicado)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('comunicados', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('comunicados/images', 'public');
        }

        $comunicado->update($validated);

        return redirect()->route('admin.comunicados.index')->with('success', 'Comunicado oficial actualizado exitosamente.');
    }

    public function destroy(Comunicado $comunicado)
    {
        $comunicado->delete();
        return redirect()->route('admin.comunicados.index')->with('success', 'Comunicado oficial eliminado exitosamente.');
    }
}
