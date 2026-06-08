@extends('layouts.public-archive')

@section('title', 'Archivo de Actualidad')
@section('meta_description', 'Consulte el archivo histórico completo de noticias, boletines y novedades de la Unidad de Igualdad Sustantiva del Estado de Puebla.')

@section('content')
<!-- Header Banner con Degradado Premium -->
<div class="relative py-20 bg-gradient-to-r from-[#5f1b2d] via-[#861e34] to-[#0c312d] border-b border-[#c79b66]/30 overflow-hidden font-sans">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,255,255,0.05),transparent)] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10 text-left space-y-4">
        <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 text-white/70 hover:text-[#c79b66] transition-colors text-xs font-bold uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Volver al inicio</span>
        </a>
        <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#c79b66] block">Sala de Prensa UnIS</span>
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-white leading-tight">
            Archivo de <span class="italic text-[#c79b66]">Actualidad</span>
        </h1>
        <p class="text-white/80 text-xs md:text-sm font-light max-w-2xl leading-relaxed">
            Consulte el registro histórico completo de noticias, boletines informativos y novedades del trabajo diario de la Unidad de Igualdad Sustantiva.
        </p>
    </div>
</div>

<!-- Listado de Noticias -->
<div class="max-w-6xl mx-auto px-6 py-16 font-sans">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($noticias as $item)
            <div 
                @click='openModal("Noticia", @json($item->title), "{{ $item->published_at ? $item->published_at->format("d/m/Y") : "" }}", @json($item->content), "{{ $item->image_path }}")'
                class="bg-white rounded-3xl p-6 flex flex-col justify-between cursor-pointer transition-all duration-300 transform hover:-translate-y-1.5 hover:shadow-lg border border-slate-200/80 group overflow-hidden relative"
            >
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#5f1b2d] to-[#861e34]"></div>
                
                <div>
                    <!-- Imagen de cabecera si existe -->
                    @if($item->image_path)
                        <div class="w-full h-40 rounded-2xl overflow-hidden mb-4 bg-slate-100 border border-slate-200">
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @endif

                    <span class="text-[10px] uppercase tracking-widest text-[#c79b66] font-bold block mb-2">
                        {{ $item->published_at ? $item->published_at->format('d M, Y') : '' }}
                    </span>
                    
                    <h3 class="text-base font-bold font-serif text-slate-900 group-hover:text-[#5f1b2d] transition-colors line-clamp-3 leading-snug mb-3">
                        {{ $item->title }}
                    </h3>
                    
                    <p class="text-xs text-slate-500 line-clamp-4 font-light leading-relaxed">
                        {{ strip_tags($item->content) }}
                    </p>
                </div>

                <div class="flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest text-[#5f1b2d] group-hover:text-[#861e34] transition-colors mt-6 pt-4 border-t border-slate-100">
                    <span>Leer noticia completa</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400 font-light bg-white border border-slate-200 rounded-3xl text-sm">
                No se encontraron noticias publicadas en el archivo histórico.
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-12 flex justify-center">
        {{ $noticias->links() }}
    </div>
</div>
@endsection
