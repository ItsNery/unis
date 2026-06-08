<section id="que-hacemos"
    class="stack-panel min-h-screen w-full flex flex-col justify-center px-6 py-20 bg-white relative overflow-hidden border-b border-slate-200">
    <div class="max-w-6xl w-full mx-auto z-10 space-y-16">

        <!-- Encabezado de la Sección -->
        <div class="max-w-2xl text-left space-y-3 gsap-fade-in">
            <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#246257]">
                Funciones y Operación
            </span>
            <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">
                Competencias, Estructura y Actividades
            </h2>
            <div class="w-16 h-1 bg-[#c79b66] mt-2"></div>
        </div>

        <!-- Grid de Qué Hace y Quién Constituye -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">

            <!-- Columna Izquierda: Qué Hacemos & Constitución -->
            <div class="col-span-1 md:col-span-6 space-y-8">
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 space-y-4 gsap-fade-in shadow-sm">
                    <span class="text-[10px] uppercase tracking-widest text-[#c79b66] font-bold">
                        Materia de Igualdad
                    </span>
                    <h3 class="text-xl font-bold font-serif text-slate-900">
                        ¿Qué hace la UnIS?
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600 leading-relaxed font-light">
                        {{ $settings['what_we_do'] }}
                    </p>
                </div>

                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 space-y-4 gsap-fade-in shadow-sm">
                    <span class="text-[10px] uppercase tracking-widest text-[#246257] font-bold">
                        Constitución
                    </span>
                    <h3 class="text-xl font-bold font-serif text-slate-900">
                        ¿Quién la constituye?
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600 leading-relaxed font-light">
                        {{ $settings['who_constitutes'] }}
                    </p>
                </div>
            </div>

            <!-- Columna Derecha: Competencias y Alcances -->
            <div
                class="col-span-1 md:col-span-6 bg-gradient-to-tr from-[#5f1b2d] to-[#861e34] text-white rounded-3xl p-8 space-y-6 gsap-fade-in shadow-lg border border-[#c79b66]/30">
                <div>
                    <span class="text-[10px] uppercase tracking-widest text-[#c79b66] font-bold">
                        Marco Competencial
                    </span>
                    <h3 class="text-2xl font-bold font-serif text-white mt-1">
                        Competencias y Alcances
                    </h3>
                </div>

                <ul class="space-y-4">
                    @php
                        $scopes = array_filter(array_map('trim', explode("\n", $settings['scopes_and_competencies'])));
                    @endphp
                    @forelse ($scopes as $scope)
                        @php
                            // Limpiar viñeta inicial si existe
                            $cleanScope = ltrim($scope, '•-* ');
                        @endphp
                        <li class="flex items-start space-x-3 text-xs md:text-sm font-light leading-relaxed">
                            <span
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-white/10 flex items-center justify-center border border-[#c79b66]/40 text-[#c79b66]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>{{ $cleanScope }}</span>
                        </li>
                    @empty
                        <li class="text-xs text-white/60">
                            Competencias no especificadas.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Sección: Participación en Eventos y Acciones Realizadas -->
        <div class="space-y-8 pt-8 border-t border-slate-100">
            <div class="flex justify-between items-end">
                <div class="space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#246257] font-bold">
                        Bitácora Oficial
                    </span>
                    <h3 class="text-2xl md:text-3xl font-bold font-serif text-[#5f1b2d]">
                        Participación en Eventos y Acciones Realizadas
                    </h3>
                </div>
                <span class="text-xs text-slate-500 hidden sm:inline">
                    Galería y Actividades Recientes
                </span>
            </div>

            <!-- Grid de Eventos con Fotos y Detalles -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    // Combinamos noticias y eventos para mostrar como acciones realizadas
                    $actions = collect();
                    foreach ($noticias as $n) {
                        $actions->push([
                            'type' => 'Noticia',
                            'title' => $n->title,
                            'date' => $n->published_at ? $n->published_at->format('d/m/Y') : '',
                            'content' => $n->content,
                            'image' => $n->image_path,
                        ]);
                    }
                    foreach ($eventos as $e) {
                        $actions->push([
                            'type' => 'Evento',
                            'title' => $e->title,
                            'date' => $e->event_date ? $e->event_date->format('d/m/Y') : '',
                            'content' => $e->description,
                            'image' => $e->image_path,
                        ]);
                    }
                    // Tomar las 3 más recientes
                    $recentActions = $actions->take(3);
                @endphp

                @forelse($recentActions as $act)
                    <div @click='openModal("{{ $act['type'] }}", @json($act['title']), "{{ $act['date'] }}", @json($act['content']), "{{ $act['image'] }}")'
                        class="group cursor-pointer rounded-2xl overflow-hidden border border-slate-200 bg-[#fbfbfa] hover:bg-white hover:-translate-y-1.5 transition-all duration-300 shadow-sm">
                        <div class="h-44 w-full bg-slate-200 overflow-hidden relative">
                            @if ($act['image'])
                                <img src="{{ asset('storage/' . $act['image']) }}" alt="{{ $act['title'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <!-- Placeholder elegante si no hay foto -->
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-tr from-[#5f1b2d]/10 via-[#861e34]/5 to-[#246257]/10 text-[#5f1b2d]/50 p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#c79b66]/60 mb-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-[10px] uppercase font-bold tracking-widest text-[#246257]">
                                        Acción Registrada
                                    </span>
                                </div>
                            @endif
                            <span
                                class="absolute top-3 left-3 bg-[#5f1b2d] text-white text-[9px] uppercase tracking-wider font-bold px-2.5 py-1 rounded-full shadow-sm">
                                {{ $act['type'] }}
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-xs uppercase font-bold tracking-widest text-[#c79b66]">
                                {{ $act['date'] }}
                            </span>
                            <h4
                                class="text-sm font-bold text-slate-900 group-hover:text-[#5f1b2d] transition-colors line-clamp-2 leading-snug">
                                {{ $act['title'] }}
                            </h4>
                            <p class="text-sm text-slate-500 line-clamp-2 font-light leading-relaxed">
                                {{ strip_tags($act['content']) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-3 py-12 text-center text-slate-400 font-light bg-slate-50 border border-slate-100 rounded-2xl">
                        No hay participaciones o acciones registradas.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
