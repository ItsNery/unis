@extends('layouts.public-archive')

@section('title', 'Cartelera de Eventos')
@section('meta_description', 'Participe en nuestros talleres, foros, capacitaciones y conmemoraciones cívicas de la Unidad de Igualdad Sustantiva en Puebla. Calendario oficial de actividades.')

@section('content')
<!-- Header Banner con Degradado Premium -->
<div class="relative py-20 bg-gradient-to-r from-[#246257] via-[#0c312d] to-[#5f1b2d] border-b border-[#c79b66]/30 overflow-hidden font-sans">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,255,255,0.05),transparent)] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10 text-left space-y-4">
        <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 text-white/70 hover:text-[#c79b66] transition-colors text-xs font-bold uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Volver al inicio</span>
        </a>
        <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#c79b66] block">Cartelera de Actividades</span>
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-white leading-tight">
            Todos los <span class="italic text-[#c79b66]">Eventos</span>
        </h1>
        <p class="text-white/80 text-xs md:text-sm font-light max-w-2xl leading-relaxed">
            Participe activamente en nuestros talleres, foros, capacitaciones y conmemoraciones cívicas diseñadas para promover la equidad y transversalizar el enfoque de género.
        </p>
    </div>
</div>

<!-- Listado de Eventos -->
<div class="max-w-6xl mx-auto px-6 py-16 font-sans">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($eventos as $evento)
            <a href="{{ route('public.eventos.show', $evento->slug) }}"
                class="block bg-white rounded-3xl p-6 flex flex-col justify-between cursor-pointer transition-all duration-300 transform hover:-translate-y-1.5 hover:shadow-lg border border-slate-200/80 group overflow-hidden relative"
            >
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#246257] to-[#0c312d]"></div>
                
                <div>
                    <!-- Imagen de cabecera si existe -->
                    @if($evento->image_path)
                        <div class="w-full h-40 rounded-2xl overflow-hidden mb-4 bg-slate-100 border border-slate-200">
                            <img src="{{ asset('storage/' . $evento->image_path) }}" alt="{{ $evento->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @endif

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-[10px] uppercase tracking-widest text-[#246257] font-bold">
                            {{ $evento->event_date->format('d M, Y') }}
                        </span>
                        <span class="px-2 py-0.5 rounded text-[8px] uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200">
                            {{ $evento->event_date->format('H:i') }} hrs
                        </span>
                    </div>
                    
                    <h3 class="text-base font-bold font-serif text-slate-900 group-hover:text-[#246257] transition-colors line-clamp-3 leading-snug mb-3">
                        {{ $evento->title }}
                    </h3>
                    
                    <p class="text-xs text-slate-500 line-clamp-4 font-light leading-relaxed mb-3">
                        {{ $evento->description }}
                    </p>

                    @if($evento->location)
                        <div class="flex items-center space-x-1.5 text-[10px] text-slate-400 mt-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-[#c79b66]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="truncate">{{ $evento->location }}</span>
                        </div>
                    @endif
                </div>

                <div class="flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest text-[#246257] group-hover:text-[#5f1b2d] transition-colors mt-6 pt-4 border-t border-slate-100">
                    <span>Detalles del evento</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400 font-light bg-white border border-slate-200 rounded-3xl text-sm">
                No se encontraron eventos programados en este momento.
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-12 flex justify-center">
        {{ $eventos->links() }}
    </div>
</div>
@endsection
