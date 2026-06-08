@extends('layouts.public-archive')

@section('title', $evento->title . ' - Detalles del Evento')

@section('content')
<!-- Header / Portada del Evento -->
<div class="relative min-h-[40vh] md:min-h-[50vh] flex items-end justify-start bg-slate-900 overflow-hidden font-sans border-b border-[#c79b66]/30">
    @if($evento->image_path)
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/' . $evento->image_path) }}" alt="{{ $evento->title }}" class="w-full h-full object-cover opacity-40 mix-blend-overlay">
        </div>
    @else
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-[#246257] via-[#0c312d] to-[#5f1b2d]"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10 pointer-events-none"></div>

    <div class="max-w-6xl w-full mx-auto px-6 pb-12 relative z-20">
        <a href="{{ route('public.events') }}" class="inline-flex items-center space-x-2 text-white/70 hover:text-[#c79b66] transition-colors text-xs font-bold uppercase tracking-widest mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Volver a la cartelera</span>
        </a>
        
        <div class="flex flex-wrap items-center gap-4 mb-4">
            <span class="px-3 py-1 rounded-full bg-[#c79b66]/20 text-[#c79b66] border border-[#c79b66]/30 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                {{ $evento->event_date->format('d M, Y') }}
            </span>
            <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                {{ $evento->event_date->format('H:i') }} hrs
            </span>
        </div>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-serif text-white leading-tight max-w-4xl">
            {{ $evento->title }}
        </h1>
        
        @if($evento->location)
            <div class="flex items-center space-x-2 text-white/80 mt-6 font-medium bg-black/30 w-max px-4 py-2 rounded-lg backdrop-blur-md border border-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#c79b66]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $evento->location }}</span>
            </div>
        @endif
    </div>
</div>

<!-- Contenido y Galería -->
<div class="bg-[#fafaf9] py-16 font-sans">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Columna Izquierda: Información -->
            <div class="w-full lg:w-1/3 space-y-8">
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm sticky top-24">
                    <h3 class="text-xl font-bold font-serif text-[#5f1b2d] mb-4">Detalles del Evento</h3>
                    <div class="w-12 h-1 bg-gradient-to-r from-[#246257] to-[#c79b66] mb-6"></div>
                    
                    <p class="text-slate-600 font-light leading-relaxed mb-6 whitespace-pre-line">
                        {{ $evento->description }}
                    </p>

                    @if($evento->external_link)
                        <a href="{{ $evento->external_link }}" target="_blank" class="flex items-center justify-center w-full bg-[#246257] hover:bg-[#0c312d] text-white py-3 px-6 rounded-xl font-bold text-sm uppercase tracking-widest transition-colors shadow-md hover:shadow-xl">
                            <span>Enlace Externo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                    @endif

                    <div class="mt-8 pt-8 border-t border-slate-100 flex items-center justify-center space-x-4">
                        <span class="text-xs uppercase tracking-widest text-slate-400 font-bold">Compartir</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:text-white hover:bg-[#1877F2] transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ request()->url() }}&text={{ urlencode($evento->title) }}" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:text-white hover:bg-[#1DA1F2] transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Galería -->
            <div class="w-full lg:w-2/3">
                @if($evento->galeria->count() > 0)
                    <div class="mb-8">
                        <span class="text-sm uppercase tracking-[0.3em] font-bold text-[#c79b66] mb-2 block">Imágenes</span>
                        <h3 class="text-3xl font-bold font-serif text-[#5f1b2d]">Galería del Evento</h3>
                    </div>
                    
                    <div class="columns-1 md:columns-2 gap-6 space-y-6">
                        @foreach($evento->galeria as $imagen)
                            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-zoom-in" onclick="openLightbox('{{ asset('storage/' . $imagen->image_path) }}')">
                                <img src="{{ asset('storage/' . $imagen->image_path) }}" class="w-full h-auto rounded-2xl transition-transform duration-700 group-hover:scale-105" alt="Galería del evento" loading="lazy">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="h-full flex flex-col items-center justify-center py-20 px-6 text-center border-2 border-dashed border-slate-200 rounded-3xl bg-white">
                        <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <h4 class="text-lg font-bold text-slate-500 mb-2">Próximamente</h4>
                        <p class="text-sm text-slate-400 font-light max-w-sm">Las fotografías de este evento estarán disponibles muy pronto.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<!-- Lightbox Modal para la galería -->
<div id="lightbox" class="fixed inset-0 z-[100] bg-black/95 hidden items-center justify-center transition-opacity opacity-0">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="lightbox-img" src="" class="max-w-[90vw] max-h-[90vh] object-contain rounded-lg shadow-2xl transform scale-95 transition-transform duration-300">
</div>

@push('scripts')
<script>
    function openLightbox(src) {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        img.src = src;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        
        // Animación suave
        setTimeout(() => {
            lightbox.classList.remove('opacity-0');
            img.classList.remove('scale-95');
            img.classList.add('scale-100');
        }, 10);
        
        document.body.style.overflow = 'hidden'; // Evitar scroll
    }
    
    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        
        lightbox.classList.add('opacity-0');
        img.classList.remove('scale-100');
        img.classList.add('scale-95');
        
        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        }, 300);
    }

    // Cerrar al hacer clic fuera
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if(e.target === this) {
            closeLightbox();
        }
    });
    
    // Cerrar con Escape
    document.addEventListener('keydown', function(e) {
        if(e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
@endpush

@endsection
