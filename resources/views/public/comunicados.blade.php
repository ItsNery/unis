@extends('layouts.public-archive')

@section('title', 'Ventanilla de Comunicados')
@section('meta_description', 'Consulte y descargue los comunicados oficiales, convocatorias, acuerdos e informes de la Unidad de Igualdad Sustantiva del Estado de Puebla en formato PDF.')

@section('content')
<!-- Header Banner con Degradado Premium -->
<div class="relative py-20 bg-gradient-to-r from-[#5f1b2d] via-[#861e34] to-[#c79b66] border-b border-[#c79b66]/30 overflow-hidden font-sans">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,255,255,0.05),transparent)] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10 text-left space-y-4">
        <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 text-white/70 hover:text-[#c79b66] transition-colors text-xs font-bold uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Volver al inicio</span>
        </a>
        <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#c79b66] block">Prensa & Difusión Oficial</span>
        <h1 class="text-4xl md:text-5xl font-bold font-serif text-white leading-tight">
            Archivo de <span class="italic text-white">Comunicados</span>
        </h1>
        <p class="text-white/80 text-xs md:text-sm font-light max-w-2xl leading-relaxed">
            Consulte y descargue en formato oficial PDF los pronunciamientos conjuntos, convocatorias especiales, acuerdos de comité e informes informativos de la UnIS.
        </p>
    </div>
</div>

<!-- Listado de Comunicados -->
<div class="max-w-6xl mx-auto px-6 py-16 font-sans">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($comunicados as $comm)
            <div class="bg-white rounded-3xl p-6 flex flex-col justify-between h-[230px] group transition-all duration-300 relative overflow-hidden border border-slate-200/80 hover:shadow-lg">
                <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-[#5f1b2d] via-[#c79b66] to-[#0c312d]"></div>
                
                <div>
                    <div class="flex items-center justify-between mb-3 text-[10px] text-slate-400 font-bold">
                        <span>COMUNICADO OFICIAL</span>
                        <span>{{ $comm->published_at ? $comm->published_at->format('d/m/Y') : '' }}</span>
                    </div>
                    
                    <h3 class="text-sm font-bold text-slate-900 group-hover:text-[#5f1b2d] transition-colors line-clamp-2 leading-snug">
                        {{ $comm->title }}
                    </h3>
                    
                    <p class="text-xs text-slate-500 mt-2 line-clamp-3 font-light leading-relaxed">
                        {{ $comm->summary }}
                    </p>
                </div>
                
                <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-100">
                    @if($comm->file_path)
                        <a 
                            href="{{ asset('storage/' . $comm->file_path) }}" 
                            target="_blank" 
                            class="flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest text-[#246257] hover:text-[#5f1b2d] transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span>Descargar PDF</span>
                        </a>
                    @else
                        <span class="text-[9px] text-slate-400 uppercase tracking-widest">Sin archivo adjunto</span>
                    @endif
                    
                    <button 
                        @click='openModal("Comunicado", @json($comm->title), "{{ $comm->published_at ? $comm->published_at->format("d/m/Y") : "" }}", @json($comm->summary), "{{ $comm->image_path }}")'
                        class="text-xs text-slate-500 hover:text-[#5f1b2d] underline font-medium"
                    >
                        Ver
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400 font-light bg-white border border-slate-200 rounded-3xl text-sm">
                No se encontraron comunicados oficiales en el archivo.
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-12 flex justify-center">
        {{ $comunicados->links() }}
    </div>
</div>
@endsection
