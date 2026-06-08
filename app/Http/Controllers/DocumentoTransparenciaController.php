<?php

namespace App\Http\Controllers;

use App\Models\DocumentoTransparencia;
use Illuminate\Http\Request;

class DocumentoTransparenciaController extends Controller
{
    public function index()
    {
        $documents = DocumentoTransparencia::orderBy('category')
            ->orderBy('title')
            ->paginate(10);
        return view('admin.documentos_transparencia.index', compact('documents'));
    }

    public function create()
    {
        $categories = ['Marco Jurídico', 'Informe Anual', 'Plan Anual de Trabajo', 'Actas de Sesiones', 'Otros Documentos'];
        return view('admin.documentos_transparencia.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:15360', // Max 15MB PDF
            'description' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['published_at'] = $validated['published_at'] ?? now();

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('transparency', 'public');
        }

        DocumentoTransparencia::create($validated);

        return redirect()->route('admin.documentos_transparencia.index')->with('success', 'Documento de transparencia cargado exitosamente.');
    }

    public function edit(DocumentoTransparencia $documento_transparencia)
    {
        $categories = ['Marco Jurídico', 'Informe Anual', 'Plan Anual de Trabajo', 'Actas de Sesiones', 'Otros Documentos'];
        return view('admin.documentos_transparencia.form', compact('documento_transparencia', 'categories'));
    }

    public function update(Request $request, DocumentoTransparencia $documento_transparencia)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:15360', // Max 15MB PDF
            'description' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('transparency', 'public');
        }

        $documento_transparencia->update($validated);

        return redirect()->route('admin.documentos_transparencia.index')->with('success', 'Documento de transparencia actualizado exitosamente.');
    }

    public function destroy(DocumentoTransparencia $documento_transparencia)
    {
        $documento_transparencia->delete();
        return redirect()->route('admin.documentos_transparencia.index')->with('success', 'Documento de transparencia eliminado exitosamente.');
    }
}
