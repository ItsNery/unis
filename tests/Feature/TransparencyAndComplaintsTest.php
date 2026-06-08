<?php
namespace Tests\Feature;

use App\Models\User;
use App\Models\Complaint;
use App\Models\TransparencyDocument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransparencyAndComplaintsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_user_can_submit_an_anonymous_complaint()
    {
        $response = $this->post(route('complaints.store'), [
            'is_anonymous' => '1',
            'subject' => 'Reporte anónimo de acoso laboral',
            'description' => 'Descripción detallada del incidente en la oficina de planeación.',
        ]);

        $response->assertStatus(302); // Redirect back
        $response->assertSessionHas('complaint_success');

        $this->assertDatabaseHas('complaints', [
            'is_anonymous' => true,
            'subject' => 'Reporte anónimo de acoso laboral',
            'complainant_name' => null,
            'complainant_email' => null,
        ]);

        $complaint = Complaint::first();
        $this->assertNotNull($complaint->ticket_number);
        $this->assertStringStartsWith('UNIS-' . date('Y') . '-', $complaint->ticket_number);
    }

    /** @test */
    public function public_user_can_submit_an_identified_complaint()
    {
        $response = $this->post(route('complaints.store'), [
            'is_anonymous' => '0',
            'complainant_name' => 'María Pérez',
            'complainant_email' => 'maria@correo.com',
            'complainant_phone' => '2221234567',
            'subject' => 'Propuesta para capacitación de género',
            'description' => 'Me gustaría que se incluyera una sesión sobre lenguaje inclusivo.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('complaint_success');

        $this->assertDatabaseHas('complaints', [
            'is_anonymous' => false,
            'complainant_name' => 'María Pérez',
            'complainant_email' => 'maria@correo.com',
            'complainant_phone' => '2221234567',
            'subject' => 'Propuesta para capacitación de género',
        ]);
    }

    /** @test */
    public function guest_cannot_access_transparency_admin_crud()
    {
        $response = $this->get(route('admin.transparency.index'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_access_transparency_admin_crud()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.transparency.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_view_and_update_complaint_status()
    {
        $user = User::factory()->create();
        $complaint = Complaint::create([
            'ticket_number' => 'UNIS-2026-0001',
            'is_anonymous' => true,
            'subject' => 'Asunto de prueba',
            'description' => 'Descripción de prueba',
        ]);

        // Access index
        $response = $this->actingAs($user)->get(route('admin.complaints.index'));
        $response->assertStatus(200);
        $response->assertSee($complaint->ticket_number);

        // Update status
        $response = $this->actingAs($user)->put(route('admin.complaints.update', $complaint), [
            'status' => 'En Proceso',
            'internal_notes' => 'Se turnó al OIC para su revisión.',
        ]);

        $response->assertRedirect(route('admin.complaints.index'));
        
        $this->assertDatabaseHas('complaints', [
            'id' => $complaint->id,
            'status' => 'En Proceso',
            'internal_notes' => 'Se turnó al OIC para su revisión.',
        ]);
    }

    /** @test */
    public function public_user_can_access_news_archive_page()
    {
        \App\Models\News::factory()->create([
            'title' => 'Noticia de Archivo Especial',
            'is_active' => true,
        ]);

        $response = $this->get(route('public.news'));
        $response->assertStatus(200);
        $response->assertSee('Noticia de Archivo Especial');
    }

    /** @test */
    public function public_user_can_access_events_archive_page()
    {
        \App\Models\UpcomingEvent::factory()->create([
            'title' => 'Evento de Archivo Especial',
            'is_active' => true,
        ]);

        $response = $this->get(route('public.events'));
        $response->assertStatus(200);
        $response->assertSee('Evento de Archivo Especial');
    }

    /** @test */
    public function public_user_can_access_communiques_archive_page()
    {
        \App\Models\Communique::factory()->create([
            'title' => 'Comunicado de Archivo Especial',
            'is_active' => true,
        ]);

        $response = $this->get(route('public.communiques'));
        $response->assertStatus(200);
        $response->assertSee('Comunicado de Archivo Especial');
    }

    /** @test */
    public function public_user_can_access_pronouncements_archive_page()
    {
        \App\Models\Pronouncement::create([
            'title' => 'Pronunciamiento de Archivo Especial',
            'author_name' => 'Dip. Sofía Alarcón',
            'author_title' => 'Presidenta de la Comisión',
            'excerpt' => 'Extracto de posicionamiento especial.',
            'content' => 'Contenido completo del posicionamiento especial.',
            'is_active' => true,
            'published_at' => now(),
        ]);

        $response = $this->get(route('public.pronouncements'));
        $response->assertStatus(200);
        $response->assertSee('Pronunciamiento de Archivo Especial');
    }
}
