<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Comunicado;
use App\Models\Pronunciamiento;
use App\Models\DocumentoTransparencia;
use App\Models\Banner;
use App\Models\Metrica;
use App\Models\MiembroOrganizacion;
use App\Models\DeclaracionComite;
use App\Models\Efemeride;
use App\Models\ConfiguracionSitio;

class HomeController extends Controller
{
    /**
     * Mostrar la página principal.
     */
    public function index()
    {
        $noticias = Noticia::where('is_active', true)->orderBy('published_at', 'desc')->take(5)->get();
        $eventos = Evento::where('is_active', true)->orderBy('event_date', 'desc')->take(5)->get();
        $comunicados = Comunicado::where('is_active', true)->orderBy('published_at', 'desc')->take(6)->get();
        $pronunciamientos = Pronunciamiento::where('is_active', true)->orderBy('published_at', 'desc')->get();
        $documentoTransparencias = DocumentoTransparencia::where('is_active', true)->orderBy('category')->orderBy('title')->get();
        
        // Nuevas entidades dinámicas
        $banners = Banner::where('is_active', true)->orderBy('order', 'asc')->get();
        $metricas = Metrica::where('is_active', true)->orderBy('order', 'asc')->get();
        $titular = MiembroOrganizacion::where('is_titular', true)->first();
        $directores = MiembroOrganizacion::where('is_titular', false)->orderBy('order', 'asc')->get();
        $declaracionComites = DeclaracionComite::orderBy('date', 'desc')->get();
        $efemerides = Efemeride::getSortedChronologically(Efemeride::where('is_active', true));
        
        $settings = [
            'mission' => ConfiguracionSitio::getValue('mission', 'Promover, coordinar y evaluar la política pública en materia de igualdad sustantiva entre mujeres y hombres...'),
            'vision' => ConfiguracionSitio::getValue('vision', 'Ser la entidad de referencia estatal en la consolidación de una sociedad igualitaria, libre de discriminación...'),
            'values' => ConfiguracionSitio::getValue('values', 'Justicia, Respeto, Inclusión, Sororidad, Equidad, Compromiso Social, Transparencia.'),
            'contact_email' => ConfiguracionSitio::getValue('contact_email', 'contacto.unis@gob.mx'),
            'contact_phone' => ConfiguracionSitio::getValue('contact_phone', '55-1234-5678'),
            'contact_address' => ConfiguracionSitio::getValue('contact_address', 'Av. Constituyentes 1000, Col. Centro, CDMX'),
            'what_we_do' => ConfiguracionSitio::getValue('what_we_do', ''),
            'who_constitutes' => ConfiguracionSitio::getValue('who_constitutes', ''),
            'scopes_and_competencies' => ConfiguracionSitio::getValue('scopes_and_competencies', ''),
        ];

        return view('inicio', compact(
            'noticias', 
            'eventos', 
            'comunicados', 
            'settings', 
            'pronunciamientos', 
            'documentoTransparencias', 
            'banners', 
            'metricas', 
            'titular', 
            'directores', 
            'declaracionComites',
            'efemerides'
        ));
    }
}
