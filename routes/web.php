<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DeclaracionComiteController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\ContactoMensajeController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetricaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\MiembroOrganizacionController;
use App\Http\Controllers\EfemerideController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PronunciamientoController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DocumentoTransparenciaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\SiteEvaluationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas públicas de archivos históricos paginados ("Ver Todos")
Route::get('/actualidad', [PublicController::class, 'noticias'])->name('public.noticias');
Route::get('/eventos', [PublicController::class, 'events'])->name('public.events');
Route::get('/eventos/{slug}', [PublicController::class, 'showEvent'])->name('public.eventos.show');
Route::get('/comunicados', [PublicController::class, 'comunicados'])->name('public.comunicados');
Route::get('/pronunciamientos', [PublicController::class, 'pronunciamientos'])->name('public.pronunciamientos');
Route::get('/identidad/miembro/{id}', [PublicController::class, 'showMiembro'])->name('public.miembros.show');

// Ruta pública para reportes y denuncias (buzón)
Route::post('/denuncias', [DenunciaController::class, 'store'])->name('denuncias.store');

// Ruta pública para formulario de contacto
Route::post('/contacto', [ContactoMensajeController::class, 'store'])->name('contacto.store');

// Ruta pública para evaluación del sitio con emojis
Route::post('/evaluations', [SiteEvaluationController::class, 'store'])->name('evaluations.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/settings', [AdminController::class, 'editSettings'])->name('admin.settings.edit');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    Route::resource('admin/noticias', NoticiaController::class)->names('admin.noticias');
    
    Route::resource('admin/eventos', EventoController::class)->names('admin.eventos');
    Route::post('admin/eventos/{evento}/gallery', [EventoController::class, 'uploadGallery'])->name('admin.eventos.gallery.store');
    Route::delete('admin/eventos/gallery/{imagen}', [EventoController::class, 'deleteGalleryImage'])->name('admin.eventos.gallery.destroy');

    Route::resource('admin/comunicados', ComunicadoController::class)->names('admin.comunicados');
    Route::resource('admin/pronunciamientos', PronunciamientoController::class)->names('admin.pronunciamientos');
    Route::resource('admin/documentos_transparencia', DocumentoTransparenciaController::class)->names('admin.documentos_transparencia');
    Route::resource('admin/denuncias', DenunciaController::class)->names('admin.denuncias')->except(['create', 'store']);

    Route::resource('admin/banners', BannerController::class)->names('admin.banners');
    Route::resource('admin/metricas', MetricaController::class)->names('admin.metricas');
    Route::resource('admin/miembros_organizacion', MiembroOrganizacionController::class)->names('admin.miembros_organizacion');
    Route::resource('admin/declaraciones_comite', DeclaracionComiteController::class)->names('admin.declaraciones_comite');
    Route::resource('admin/efemerides', EfemerideController::class)->names('admin.efemerides')->except(['show']);

    Route::get('admin/contacto', [ContactoMensajeController::class, 'index'])->name('admin.contacto.index');
    Route::get('admin/contacto/{message}', [ContactoMensajeController::class, 'show'])->name('admin.contacto.show');
    Route::delete('admin/contacto/{message}', [ContactoMensajeController::class, 'destroy'])->name('admin.contacto.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
