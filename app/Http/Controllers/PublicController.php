<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Comunicado;
use App\Models\Pronunciamiento;
use App\Models\ConfiguracionSitio;
use App\Models\MiembroOrganizacion;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Obtener configuraciones del sitio comunes para el layout público.
     */
    protected function getSettings(): array
    {
        return [
            'mission' => ConfiguracionSitio::getValue('mission', 'Promover, coordinar y evaluar la política pública en materia de igualdad sustantiva entre mujeres y hombres...'),
            'vision' => ConfiguracionSitio::getValue('vision', 'Ser la entidad de referencia estatal en la consolidación de una sociedad igualitaria, libre de discriminación...'),
            'values' => ConfiguracionSitio::getValue('values', 'Justicia, Respeto, Inclusión, Sororidad, Equidad, Compromiso Social, Transparencia.'),
            'contact_email' => ConfiguracionSitio::getValue('contact_email', 'contacto.unis@gob.mx'),
            'contact_phone' => ConfiguracionSitio::getValue('contact_phone', '222-123-4567'),
            'contact_address' => ConfiguracionSitio::getValue('contact_address', 'Av. Reforma 711, Centro Histórico, 72000 Puebla, Pue.'),
        ];
    }

    /**
     * Listado completo y paginado de noticias de actualidad.
     */
    public function noticias()
    {
        $noticias = Noticia::where('is_active', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $settings = $this->getSettings();

        return view('public.noticias', compact('noticias', 'settings'));
    }

    /**
     * Listado completo y paginado de eventos de la cartelera.
     */
    public function events()
    {
        $eventos = Evento::where('is_active', true)
            ->orderBy('event_date', 'desc')
            ->paginate(9);

        $settings = $this->getSettings();

        return view('public.events', compact('eventos', 'settings'));
    }

    /**
     * Detalle de un evento y su galería.
     */
    public function showEvent($slug)
    {
        $evento = Evento::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $settings = $this->getSettings();

        return view('public.eventos.show', compact('evento', 'settings'));
    }

    /**
     * Listado completo y paginado de comunicados oficiales.
     */
    public function comunicados()
    {
        $comunicados = Comunicado::where('is_active', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        $settings = $this->getSettings();

        return view('public.comunicados', compact('comunicados', 'settings'));
    }

    /**
     * Listado completo y paginado de pronunciamientos de funcionarios.
     */
    public function pronunciamientos()
    {
        $pronunciamientos = Pronunciamiento::where('is_active', true)
            ->orderBy('published_at', 'desc')
            ->paginate(8);

        $settings = $this->getSettings();

        return view('public.pronunciamientos', compact('pronunciamientos', 'settings'));
    }

    /**
     * Detalle de un miembro del organigrama.
     */
    public function showMiembro($id)
    {
        $miembro = MiembroOrganizacion::findOrFail($id);
        $settings = $this->getSettings();

        return view('public.miembros.show', compact('miembro', 'settings'));
    }
}
