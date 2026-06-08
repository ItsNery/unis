<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Crear Administrador por defecto
        \App\Models\User::factory()->create([
            'name' => 'Administrador UnIS',
            'email' => 'admin@unis.gob.mx',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        ]);

        // Sembrar Noticias
        \App\Models\Noticia::factory(5)->create();

        // Sembrar Eventos
        \App\Models\Evento::factory(4)->create();

        // Sembrar Comunicados
        \App\Models\Comunicado::factory(6)->create();

        // Sembrar Pronunciamientos
        \App\Models\Pronunciamiento::create([
            'title' => 'Compromiso total con la paridad de género en cargos directivos',
            'author_name' => 'Mtra. Josefina Aguilar Osorio',
            'author_title' => 'Subsecretaria de Planeación SFPA',
            'author_image' => null,
            'excerpt' => 'El desarrollo del estado de Puebla solo es posible cuando las decisiones son compartidas de forma equitativa.',
            'content' => 'La Subsecretaria de Planeación declaró formalmente que a partir del presente ciclo fiscal, todos los comités de planeación y dictaminación del gasto público deberán contar con una representación de al menos el 50% de mujeres, impulsando el liderazgo femenino en los puestos más estratégicos de la administración estatal de Puebla.',
            'is_active' => true,
            'published_at' => now()->subDays(2),
        ]);

        \App\Models\Pronunciamiento::create([
            'title' => 'Cero tolerancia a conductas hostiles y de acoso en las dependencias',
            'author_name' => 'Dr. Carlos Mendoza Reyes',
            'author_title' => 'Director General de Administración',
            'author_image' => null,
            'excerpt' => 'No permitiremos ningún tipo de conducta hostil u hostigamiento. Cuidar al personal es nuestra mayor prioridad.',
            'content' => 'Durante la reunión de directores de área, el Dr. Mendoza refrendó el apoyo institucional al Buzón de Denuncias administrado por la UnIS, recalcando que cualquier reporte de acoso laboral o sexual será turnado de inmediato al órgano interno de control con una política de cero tolerancia, no represalias y confidencialidad absoluta.',
            'is_active' => true,
            'published_at' => now()->subDays(5),
        ]);

        \App\Models\Pronunciamiento::create([
            'title' => 'Presupuestos públicos diseñados bajo el lente de la equidad social',
            'author_name' => 'Lic. Patricia Ramírez Galindo',
            'author_title' => 'Directora de Presupuesto y Gasto Público',
            'author_image' => null,
            'excerpt' => 'El dinero público debe servir para cerrar brechas de desigualdad, no para perpetuarlas.',
            'content' => 'En el marco de la capacitación anual de presupuesto, la Lic. Patricia Ramírez señaló que el diseño del presupuesto estatal de egresos cuenta ahora con ponderadores específicos recomendados por la UnIS para evaluar el beneficio directo de las mujeres y grupos vulnerables en cada una de las dependencias gubernamentales.',
            'is_active' => true,
            'published_at' => now()->subDays(10),
        ]);

        // Sembrar Site Settings
        $settings = [
            'mission' => 'Promover, coordinar y evaluar la política pública en materia de igualdad sustantiva entre mujeres y hombres, propiciando el desarrollo pleno de las personas y eliminando cualquier brecha de género.',
            'vision' => 'Ser la entidad de referencia estatal en la consolidación de una sociedad igualitaria, libre de discriminación y violencia, donde los derechos humanos sean una realidad para todas las personas.',
            'values' => 'Justicia, Respeto, Inclusión, Sororidad, Equidad, Compromiso Social, Transparencia.',
            'contact_email' => 'contacto.unis@gob.mx',
            'contact_phone' => '222-123-4567',
            'contact_address' => 'Av. Reforma 711, Centro Histórico, 72000 Puebla, Pue.',
            'what_we_do' => 'La Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración tiene como encomienda principal transversalizar la perspectiva de género y el principio de igualdad y no discriminación en el diseño de las políticas de planeación, asignación de recursos y modernización administrativa en el Estado de Puebla.',
            'who_constitutes' => 'La Unidad se constituye por un comité interdisciplinario que incluye personal directivo, coordinadores de igualdad, enlace administrativo y asesores técnicos especializados en derechos humanos, perspectiva de género y mediación de conflictos en el ámbito laboral.',
            'scopes_and_competencies' => "• Diseñar e implementar directrices y protocolos en materia de igualdad de género.\n• Coordinar capacitaciones y talleres de sensibilización al personal de la Secretaría.\n• Monitorear que la planeación y presupuesto estatal cuenten con enfoque de perspectiva de género.\n• Atender denuncias y dar acompañamiento seguro en casos de hostigamiento o discriminación laboral.",
        ];

        foreach ($settings as $key => $value) {
            \App\Models\ConfiguracionSitio::setValue($key, $value);
        }

        // Sembrar Miembros del Organigrama
        \App\Models\MiembroOrganizacion::create([
            'name' => 'Mtra. Andrea Mendoza Garza',
            'title' => 'Titular de la Unidad de Igualdad Sustantiva',
            'area' => 'Dirección General',
            'phrase' => 'La igualdad sustantiva no es solo una meta legal, es una práctica diaria que transforma vidas.',
            'description' => 'Titular de la Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración del Gobierno del Estado de Puebla. Responsable de coordinar, evaluar y ejecutar las políticas de igualdad sustantiva y no discriminación dentro del ámbito institucional.',
            'is_titular' => true,
            'order' => 1,
        ]);

        \App\Models\MiembroOrganizacion::create([
            'name' => 'Lic. Roberto Torres',
            'title' => 'Dirección de Área',
            'area' => 'Perspectiva de Género',
            'phrase' => 'Integrando la equidad en cada proyecto institucional.',
            'description' => 'Responsable de integrar la perspectiva de género en la planeación institucional, así como de asesorar técnicamente a las distintas dependencias.',
            'is_titular' => false,
            'order' => 2,
        ]);

        \App\Models\MiembroOrganizacion::create([
            'name' => 'Lic. Fernanda Gómez',
            'title' => 'Dirección de Área',
            'area' => 'Capacitación y Sensibilización',
            'phrase' => 'La educación es la base del cambio.',
            'description' => 'Coordina los programas de formación, talleres y actividades de sensibilización dirigidas al personal de la Secretaría.',
            'is_titular' => false,
            'order' => 3,
        ]);

        // Sembrar Documentos de Transparencia
        \App\Models\DocumentoTransparencia::create([
            'title' => 'Ley para la Igualdad entre Mujeres y Hombres del Estado de Puebla',
            'category' => 'Marco Jurídico',
            'file_path' => 'docs/transparencia/ley_igualdad_puebla.pdf',
            'description' => 'Documento rector estatal que promueve la igualdad jurídica, social y económica entre géneros.',
            'published_at' => now(),
            'is_active' => true,
        ]);

        \App\Models\DocumentoTransparencia::create([
            'title' => 'Protocolo para la Prevención, Atención y Sanción del Hostigamiento y Acoso Sexual',
            'category' => 'Marco Jurídico',
            'file_path' => 'docs/transparencia/protocolo_hostigamiento_puebla.pdf',
            'description' => 'Lineamientos oficiales para la atención oportuna y confidencial de quejas al interior de la administración pública.',
            'published_at' => now(),
            'is_active' => true,
        ]);

        \App\Models\DocumentoTransparencia::create([
            'title' => 'Plan Anual de Trabajo UnIS 2026',
            'category' => 'Plan Anual de Trabajo',
            'file_path' => 'docs/transparencia/pat_unis_2026.pdf',
            'description' => 'Cronograma de actividades, metas de capacitación y estrategias de transversalización de género para el año 2026.',
            'published_at' => now(),
            'is_active' => true,
        ]);

        \App\Models\DocumentoTransparencia::create([
            'title' => 'Informe Anual de Resultados UnIS - Periodo 2025',
            'category' => 'Informe Anual',
            'file_path' => 'docs/transparencia/informe_resultados_unis_2025.pdf',
            'description' => 'Detalle estadístico de capacitaciones impartidas, asesorías brindadas y metas alcanzadas durante el ejercicio fiscal anterior.',
            'published_at' => now()->subMonths(2),
            'is_active' => true,
        ]);

        \App\Models\DocumentoTransparencia::create([
            'title' => 'Acta de la Primera Sesión Ordinaria del Comité de Igualdad',
            'category' => 'Actas de Sesiones',
            'file_path' => 'docs/transparencia/acta_primera_sesion_2026.pdf',
            'description' => 'Minuta firmada por los integrantes del comité donde se aprueban las reglas de operación y directrices.',
            'published_at' => now()->subMonth(),
            'is_active' => true,
        ]);

        // Sembrar Denuncias / Sugerencias de prueba
        \App\Models\Denuncia::create([
            'ticket_number' => 'UNIS-2026-0001',
            'subject' => 'Sugerencia de talleres de lenguaje inclusivo y no sexista',
            'description' => 'Sería excelente que se impartiera un taller práctico a todo el personal de la Secretaría, en especial al de comunicación social, sobre el uso adecuado de lenguaje inclusivo en boletines oficiales.',
            'is_anonymous' => true,
            'status' => 'Resuelto',
            'internal_notes' => 'Taller calendarizado para el mes de agosto en colaboración con la Secretaría de Igualdad Sustantiva estatal.',
        ]);

        \App\Models\Denuncia::create([
            'ticket_number' => 'UNIS-2026-0002',
            'subject' => 'Comportamiento hostil y comentarios despectivos en reuniones',
            'description' => 'El jefe de mi departamento realiza de manera recurrente comentarios inapropiados y despectivos hacia mis compañeras durante las reuniones de planeación presupuestaria.',
            'is_anonymous' => false,
            'complainant_name' => 'María Alejandra Robles',
            'complainant_email' => 'mrobles@finanzas.puebla.gob.mx',
            'complainant_phone' => '222-987-6543',
            'status' => 'En revisión',
            'internal_notes' => 'Se activó el protocolo de escucha segura y acompañamiento confidencial. Se está preparando el informe para el Órgano Interno de Control.',
        ]);

        \App\Models\Denuncia::create([
            'ticket_number' => 'UNIS-2026-0003',
            'subject' => 'Duda sobre el lactario de la Secretaría',
            'description' => 'Hola, quisiera saber cuáles son los horarios del lactario institucional, en dónde se ubica exactamente y si necesito pedir alguna llave especial para ingresar.',
            'is_anonymous' => false,
            'complainant_name' => 'Ingrid Sánchez Pérez',
            'complainant_email' => 'isanchez@finanzas.puebla.gob.mx',
            'complainant_phone' => '222-111-2233',
            'status' => 'Recibido',
            'internal_notes' => null,
        ]);
    }
}
