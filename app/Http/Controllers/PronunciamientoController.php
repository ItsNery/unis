<?php

namespace App\Http\Controllers;

use App\Models\Pronunciamiento;
use Illuminate\Http\Request;

class PronunciamientoController extends Controller
{
    public function index()
    {
        $pronunciamientos = Pronunciamiento::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.pronunciamientos.index', compact('pronunciamientos'));
    }

    public function create()
    {
        return view('admin.pronunciamientos.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'author_title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $validated['author_image'] = $request->file('image')->store('pronunciamientos', 'public');
        }

        Pronunciamiento::create($validated);

        return redirect()->route('admin.pronunciamientos.index')->with('success', 'Pronunciamiento creado exitosamente.');
    }

    public function edit(Pronunciamiento $pronunciamiento)
    {
        return view('admin.pronunciamientos.form', compact('pronunciamiento'));
    }

    public function update(Request $request, Pronunciamiento $pronunciamiento)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'author_title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['author_image'] = $request->file('image')->store('pronunciamientos', 'public');
        }

        $pronunciamiento->update($validated);

        return redirect()->route('admin.pronunciamientos.index')->with('success', 'Pronunciamiento actualizado exitosamente.');
    }

    public function destroy(Pronunciamiento $pronunciamiento)
    {
        $pronunciamiento->delete();
        return redirect()->route('admin.pronunciamientos.index')->with('success', 'Pronunciamiento eliminado exitosamente.');
    }
}
