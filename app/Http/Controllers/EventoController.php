<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\EventoImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('event_date', 'desc')->paginate(10);
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('admin.eventos.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'external_link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Evento::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        $validated['slug'] = $slug;
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $year = \Carbon\Carbon::parse($validated['event_date'])->format('Y');
            $file = $request->file('image');
            $filename = $slug . '-main-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs("eventos/{$year}/{$slug}", $filename, 'public');
        }

        $evento = Evento::create($validated);

        return redirect()->route('admin.eventos.edit', $evento)->with('success', 'Evento programado exitosamente. Ahora puedes agregar imágenes a la galería.');
    }

    public function edit(Evento $evento)
    {
        return view('admin.eventos.form', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'external_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($evento->image_path) {
                Storage::disk('public')->delete($evento->image_path);
            }
            $year = \Carbon\Carbon::parse($validated['event_date'])->format('Y');
            $slug = $evento->slug;
            $file = $request->file('image');
            $filename = $slug . '-main-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs("eventos/{$year}/{$slug}", $filename, 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $evento->update($validated);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(Evento $evento)
    {
        if ($evento->image_path) {
            Storage::disk('public')->delete($evento->image_path);
        }
        
        foreach($evento->galeria as $imagen) {
            Storage::disk('public')->delete($imagen->image_path);
        }
        
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }

    public function uploadGallery(Request $request, Evento $evento)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($request->hasFile('file')) {
            $year = $evento->event_date->format('Y');
            $slug = $evento->slug;
            $file = $request->file('file');
            $filename = $slug . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            
            $path = $file->storeAs("eventos/{$year}/{$slug}", $filename, 'public');
            
            $imagen = $evento->galeria()->create([
                'image_path' => $path
            ]);

            return response()->json(['success' => true, 'id' => $imagen->id, 'path' => asset('storage/' . $path)]);
        }

        return response()->json(['success' => false], 400);
    }

    public function deleteGalleryImage(Request $request, EventoImagen $imagen)
    {
        Storage::disk('public')->delete($imagen->image_path);
        $imagen->delete();
        
        return response()->json(['success' => true]);
    }
}
