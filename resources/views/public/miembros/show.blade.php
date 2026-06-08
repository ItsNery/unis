@extends('layouts.public-archive')

@section('title', $miembro->name . ' - Organigrama | UnIS')

@section('content')

{{-- ── Hero Section ── --}}
<section class="relative bg-slate-50 pt-32 pb-16 overflow-hidden border-b border-slate-200">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-[#5f1b2d]/5 to-[#c79b66]/10 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-[#246257]/5 to-[#5f1b2d]/5 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/4"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 relative z-10 text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-[#c79b66]/30 shadow-sm text-xs font-bold uppercase tracking-widest text-[#c79b66] mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <a href="{{ route('home') }}#identidad" class="hover:text-[#5f1b2d] transition-colors">Volver al Organigrama</a>
        </div>
    </div>
</section>

{{-- ── Detalle del Perfil ── --}}
<section class="py-16 bg-white relative">
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 -mt-32 relative">
            
            {{-- Header del Perfil --}}
            <div class="bg-gradient-to-tr from-[#5f1b2d] to-[#861e34] p-8 md:p-12 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden">
                {{-- Textura/Pattern de fondo --}}
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
                
                {{-- Foto --}}
                <div class="relative z-10 flex-shrink-0">
                    <div class="w-40 h-40 md:w-48 md:h-48 rounded-3xl overflow-hidden border-4 border-white/20 bg-[#861e34] flex items-center justify-center shadow-2xl">
                        @if($miembro->image_path)
                            <img src="{{ asset('storage/' . $miembro->image_path) }}" alt="{{ $miembro->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="font-serif font-bold text-white text-5xl tracking-widest">
                                @php
                                    $words = explode(' ', $miembro->name);
                                    echo strtoupper(substr($words[0] ?? 'M', 0, 1) . substr($words[1] ?? '', 0, 1));
                                @endphp
                            </span>
                        @endif
                    </div>
                    @if($miembro->is_titular)
                        <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-[#c79b66] text-white text-[10px] md:text-xs font-bold uppercase tracking-widest px-4 py-1 rounded-full shadow-lg whitespace-nowrap border border-white/20">
                            Titular
                        </div>
                    @endif
                </div>

                {{-- Info Principal --}}
                <div class="relative z-10 flex-1 text-center md:text-left space-y-2">
                    @if($miembro->area)
                        <span class="inline-block text-[#c79b66] bg-[#c79b66]/10 border border-[#c79b66]/20 px-3 py-1 rounded-full text-[10px] md:text-xs uppercase tracking-widest font-bold mb-2">
                            {{ $miembro->area }}
                        </span>
                    @endif
                    <h1 class="text-3xl md:text-4xl font-bold font-serif text-white leading-tight">
                        {{ $miembro->name }}
                    </h1>
                    <p class="text-white/80 text-sm md:text-base uppercase tracking-widest mt-1 font-medium">
                        {{ $miembro->title }}
                    </p>
                </div>
            </div>

            {{-- Cuerpo del Perfil --}}
            <div class="p-8 md:p-12 space-y-12">
                
                {{-- Frase --}}
                @if($miembro->phrase)
                <div class="relative pl-8 md:pl-10">
                    <div class="absolute left-0 top-0 text-6xl text-[#c79b66]/20 font-serif leading-none mt-2">"</div>
                    <p class="text-xl md:text-2xl text-slate-800 font-serif font-medium leading-relaxed italic">
                        {{ $miembro->phrase }}
                    </p>
                </div>
                @endif

                {{-- Divider --}}
                @if($miembro->phrase && $miembro->description)
                <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
                @endif

                {{-- Descripción / Biografía / Funciones --}}
                @if($miembro->description)
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#246257]/5 border border-[#246257]/20 flex items-center justify-center flex-shrink-0 text-[#246257]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold font-serif text-slate-900">Descripción y Funciones</h2>
                    </div>
                    
                    <div class="prose prose-slate max-w-none text-slate-600 font-light leading-relaxed">
                        {!! nl2br(e($miembro->description)) !!}
                    </div>
                </div>
                @endif

                {{-- Datos de Contacto --}}
                @if($miembro->phone)
                <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent my-8"></div>
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#c79b66]/10 border border-[#c79b66]/30 flex items-center justify-center flex-shrink-0 text-[#c79b66]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold font-serif text-slate-900">Contacto</h2>
                    </div>
                    
                    <div class="flex items-center gap-2 text-slate-600">
                        <span class="font-semibold text-slate-700">Teléfono:</span>
                        <a href="tel:{{ $miembro->phone }}" class="hover:text-[#c79b66] transition-colors">{{ $miembro->phone }}</a>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</section>

@endsection
