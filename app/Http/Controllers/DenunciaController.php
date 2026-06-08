<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DenunciaController extends Controller
{
    // Listado administrativo de denuncias
    public function index()
    {
        $denuncias = Denuncia::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.denuncias.index', compact('denuncias'));
    }

    // Guardado de denuncia pública (anónima o identificada)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'is_anonymous' => 'nullable|boolean',
            'complainant_name' => 'required_without:is_anonymous|nullable|string|max:255',
            'complainant_email' => 'required_without:is_anonymous|nullable|email|max:255',
            'complainant_phone' => 'nullable|string|max:20',
        ]);

        $isAnonymous = $request->boolean('is_anonymous', false) || !$request->filled('complainant_name');

        // Generar un número de ticket único seguro
        $year = date('Y');
        $random = rand(1000, 9999);
        $ticketNumber = "UNIS-{$year}-{$random}";

        // Verificar unicidad del ticket
        while (Denuncia::where('ticket_number', $ticketNumber)->exists()) {
            $random = rand(1000, 9999);
            $ticketNumber = "UNIS-{$year}-{$random}";
        }

        Denuncia::create([
            'ticket_number' => $ticketNumber,
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'is_anonymous' => $isAnonymous,
            'complainant_name' => $isAnonymous ? null : $validated['complainant_name'],
            'complainant_email' => $isAnonymous ? null : $validated['complainant_email'],
            'complainant_phone' => $isAnonymous ? null : ($validated['complainant_phone'] ?? null),
            'status' => 'Recibido',
        ]);

        return redirect()->back()->with('complaint_success', "Tu reporte ha sido enviado de forma segura. El número de folio asignado es: {$ticketNumber}. Por favor, guárdalo para futuras aclaraciones.");
    }

    // Detalle de denuncia para el administrador
    public function edit(Denuncia $complaint)
    {
        $statuses = ['Recibido', 'En revisión', 'Canalizado', 'Resuelto', 'Falso / Improcedente'];
        return view('admin.denuncias.edit', compact('complaint', 'statuses'));
    }

    // Actualización de estado y notas internas
    public function update(Request $request, Denuncia $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'internal_notes' => 'nullable|string',
        ]);

        $complaint->update($validated);

        return redirect()->route('admin.denuncias.index')->with('success', "Denuncia {$complaint->ticket_number} actualizada con éxito.");
    }

    // Eliminar denuncia
    public function destroy(Denuncia $complaint)
    {
        $complaint->delete();
        return redirect()->route('admin.denuncias.index')->with('success', 'La denuncia ha sido eliminada del registro administrativo.');
    }
}
