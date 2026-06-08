<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Comunicado;
use App\Models\ConfiguracionSitio;
use App\Models\Pronunciamiento;
use App\Models\DocumentoTransparencia;
use App\Models\ContactoMensaje;
use App\Models\Denuncia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $noticiasCount = Noticia::count();
        $eventsCount = Evento::count();
        $comunicadosCount = Comunicado::count();
        $pronunciamientosCount = Pronunciamiento::count();
        $transparencyCount = DocumentoTransparencia::count();
        $denunciasCount = Denuncia::count();
        $contactoCount = ContactoMensaje::count();
        
        $recentNoticia = Noticia::orderBy('created_at', 'desc')->take(3)->get();
        $recentEvents = Evento::orderBy('created_at', 'desc')->take(3)->get();
        $recentComunicados = Comunicado::orderBy('created_at', 'desc')->take(3)->get();
        $recentPronunciamientos = Pronunciamiento::orderBy('created_at', 'desc')->take(3)->get();
        $recentTransparency = DocumentoTransparencia::orderBy('created_at', 'desc')->take(3)->get();
        $recentDenuncias = Denuncia::orderBy('created_at', 'desc')->take(3)->get();
        $recentContacto = ContactoMensaje::orderBy('created_at', 'desc')->take(3)->get();
        
        return view('dashboard', compact(
            'noticiasCount', 'eventsCount', 'comunicadosCount', 'pronunciamientosCount', 'transparencyCount', 'denunciasCount', 'contactoCount',
            'recentNoticia', 'recentEvents', 'recentComunicados', 'recentPronunciamientos', 'recentTransparency', 'recentDenuncias', 'recentContacto'
        ));
    }

    public function editSettings()
    {
        $settings = [
            'mission' => ConfiguracionSitio::getValue('mission', ''),
            'vision' => ConfiguracionSitio::getValue('vision', ''),
            'values' => ConfiguracionSitio::getValue('values', ''),
            'contact_email' => ConfiguracionSitio::getValue('contact_email', ''),
            'contact_phone' => ConfiguracionSitio::getValue('contact_phone', ''),
            'contact_address' => ConfiguracionSitio::getValue('contact_address', ''),
            'what_we_do' => ConfiguracionSitio::getValue('what_we_do', ''),
            'who_constitutes' => ConfiguracionSitio::getValue('who_constitutes', ''),
            'scopes_and_competencies' => ConfiguracionSitio::getValue('scopes_and_competencies', ''),
        ];

        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'mission' => 'required|string',
            'vision' => 'required|string',
            'values' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'contact_address' => 'required|string',
            'what_we_do' => 'required|string',
            'who_constitutes' => 'required|string',
            'scopes_and_competencies' => 'required|string',
        ]);

        foreach ($validated as $key => $value) {
            ConfiguracionSitio::setValue($key, $value);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Configuraciones del sitio actualizadas con éxito.');
    }
}
