<?php

namespace App\Http\Controllers;

use App\Models\ContactoMensaje;
use Illuminate\Http\Request;

class ContactoMensajeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactoMensaje::create($validated);

        return redirect()->back()->with('contact_success', 'Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo a la brevedad. Gracias por comunicarte con la Unidad de Igualdad Sustantiva.');
    }

    public function index()
    {
        $messages = ContactoMensaje::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contacto.index', compact('messages'));
    }

    public function show(ContactoMensaje $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.contacto.show', compact('message'));
    }

    public function destroy(ContactoMensaje $message)
    {
        $message->delete();
        return redirect()->route('admin.contacto.index')->with('success', 'Mensaje eliminado correctamente.');
    }
}
