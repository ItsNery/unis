        <section id="lineas-accion"
            class="stack-panel min-h-screen w-full flex flex-col justify-center px-6 py-20 bg-slate-50 relative overflow-hidden border-b border-slate-200">
            <div class="max-w-6xl w-full mx-auto z-10 space-y-16">

                <!-- Encabezado de la Sección -->
                <div class="max-w-2xl text-left space-y-3 gsap-fade-in">
                    <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#c79b66]">Líneas de Acción</span>
                    <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">Detalle del Trabajo y
                        Colaboración</h2>
                    <div class="w-16 h-1 bg-[#5f1b2d] mt-2"></div>
                </div>

                <!-- Métricas y Resultados (Contadores Animados) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 pt-6 pb-10 border-b border-slate-200/60">
                    @forelse($metricas ?? [] as $metric)
                        <div class="text-center space-y-2 p-6 bg-white rounded-3xl shadow-sm border border-[#c79b66]/20 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#c79b66]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <h3 class="relative z-10 text-4xl md:text-5xl font-serif font-bold text-[#5f1b2d] tracking-tighter" x-data="{ count: 0, target: {{ intval(preg_replace('/[^0-9]/', '', $metric->value)) ?: 0 }} }" x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target / 40); if(count > target) count = target; } else { clearInterval(interval); } }, 40)" x-text="count + '{{ preg_replace('/[0-9]/', '', $metric->value) }}'">
                                0
                            </h3>
                            <span class="relative z-10 text-[10px] md:text-xs font-bold text-slate-800 uppercase tracking-widest block">{{ $metric->title }}</span>
                        </div>
                    @empty
                        <!-- Fallback si no hay métricas en BD -->
                        <div class="text-center space-y-2 p-6 bg-white rounded-3xl shadow-sm border border-[#c79b66]/20 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#c79b66]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <h3 class="relative z-10 text-4xl md:text-5xl font-serif font-bold text-[#5f1b2d] tracking-tighter" x-data="{ count: 0, target: 500 }" x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target / 40); if(count > target) count = target; } else { clearInterval(interval); } }, 40)" x-text="count + '+'">0</h3>
                            <span class="relative z-10 text-[10px] md:text-xs font-bold text-slate-800 uppercase tracking-widest block">Solicitudes Atendidas</span>
                        </div>
                        <div class="text-center space-y-2 p-6 bg-white rounded-3xl shadow-sm border border-[#c79b66]/20 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#c79b66]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <h3 class="relative z-10 text-4xl md:text-5xl font-serif font-bold text-[#5f1b2d] tracking-tighter" x-data="{ count: 0, target: 120 }" x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target / 40); if(count > target) count = target; } else { clearInterval(interval); } }, 40)" x-text="count">0</h3>
                            <span class="relative z-10 text-[10px] md:text-xs font-bold text-slate-800 uppercase tracking-widest block">Asesorías Jurídicas</span>
                        </div>
                        <div class="text-center space-y-2 p-6 bg-white rounded-3xl shadow-sm border border-[#c79b66]/20 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#c79b66]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <h3 class="relative z-10 text-4xl md:text-5xl font-serif font-bold text-[#5f1b2d] tracking-tighter" x-data="{ count: 0, target: 45 }" x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target / 40); if(count > target) count = target; } else { clearInterval(interval); } }, 40)" x-text="count">0</h3>
                            <span class="relative z-10 text-[10px] md:text-xs font-bold text-slate-800 uppercase tracking-widest block">Capacitaciones</span>
                        </div>
                        <div class="text-center space-y-2 p-6 bg-white rounded-3xl shadow-sm border border-[#c79b66]/20 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#c79b66]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <h3 class="relative z-10 text-4xl md:text-5xl font-serif font-bold text-[#5f1b2d] tracking-tighter" x-data="{ count: 0, target: 100 }" x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target / 40); if(count > target) count = target; } else { clearInterval(interval); } }, 40)" x-text="count + '%'">0</h3>
                            <span class="relative z-10 text-[10px] md:text-xs font-bold text-slate-800 uppercase tracking-widest block">Compromiso</span>
                        </div>
                    @endforelse
                </div>

                <!-- Grid: Muro de Comunicados y Detalle del Trabajo -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start pt-4">

                    <!-- Columna Izquierda: Detalle del Trabajo (Líneas de Acción) -->
                    <div class="col-span-1 md:col-span-6 space-y-6">
                        <h3 class="text-xl font-bold font-serif text-slate-900 flex items-center space-x-2">
                            <span class="w-2 h-6 bg-[#246257] inline-block rounded-full"></span>
                            <span>Trabajo Estratégico</span>
                        </h3>

                        <div class="space-y-4">
                            <!-- Card 1 -->
                            <div
                                class="bg-white border border-slate-200/80 rounded-2xl p-6 space-y-3 hover:shadow-md transition-shadow">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-[#5f1b2d]/10 text-[#5f1b2d]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </div>
                                    <h4 class="font-bold text-sm text-slate-800 font-serif">1. Transversalización de la
                                        Perspectiva de Género</h4>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed font-light">
                                    Asesoramos y emitimos recomendaciones técnicas en la planeación y desarrollo
                                    institucional para integrar metas de equidad y no discriminación en todas las áreas
                                    de la Secretaría.
                                </p>
                            </div>

                            <!-- Card 2 -->
                            <div
                                class="bg-white border border-slate-200/80 rounded-2xl p-6 space-y-3 hover:shadow-md transition-shadow">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-[#246257]/10 text-[#246257]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-bold text-sm text-slate-800 font-serif">2. Sensibilización y Clima
                                        Laboral</h4>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed font-light">
                                    Coordinamos capacitaciones permanentes, pláticas de prevención del hostigamiento
                                    sexual y laboral, y promovemos el uso de lenguaje incluyente y no sexista dentro del
                                    servicio público.
                                </p>
                            </div>

                            <!-- Card 3 -->
                            <div
                                class="bg-white border border-slate-200/80 rounded-2xl p-6 space-y-3 hover:shadow-md transition-shadow">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-[#c79b66]/10 text-[#c79b66]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                    <h4 class="font-bold text-sm text-slate-800 font-serif">3. Enlace de Quejas y
                                        Sugerencias</h4>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed font-light">
                                    Damos seguimiento seguro y confidencial a las denuncias de hostigamiento o acoso
                                    laboral a través del buzón oficial, brindando canalización técnica y acompañamiento
                                    institucional de primer nivel.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha: Muro de Comunicados y Llamamientos -->
                    <div class="col-span-1 md:col-span-6 space-y-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold font-serif text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-6 bg-[#c79b66] inline-block rounded-full"></span>
                                <span>Muro de Comunicados y Llamamientos</span>
                            </h3>
                            <a href="#contenido-seccion"
                                class="text-xs font-bold text-[#5f1b2d] hover:underline uppercase tracking-wider">Ver
                                Todo</a>
                        </div>

                        <div class="space-y-4 max-h-[420px] overflow-y-auto pr-2 custom-scrollbar">
                            @forelse($comunicados as $comm)
                                <div
                                    class="bg-white border border-slate-100 rounded-2xl p-5 hover:border-[#c79b66]/30 transition-all flex flex-col justify-between shadow-sm relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 w-1 bg-[#246257] group-hover:bg-[#5f1b2d] transition-colors rounded-l-full">
                                    </div>

                                    <div>
                                        <div
                                            class="flex justify-between items-center text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-2">
                                            <span>Boletín Oficial</span>
                                            <span>{{ $comm->published_at ? $comm->published_at->format('d/m/Y') : '' }}</span>
                                        </div>
                                        <h4
                                            class="text-sm font-bold text-slate-900 group-hover:text-[#5f1b2d] transition-colors line-clamp-2 leading-snug">
                                            {{ $comm->title }}
                                        </h4>
                                        <p class="text-xs text-slate-500 mt-2 line-clamp-2 font-light leading-relaxed">
                                            {{ $comm->summary }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
                                        @if ($comm->file_path)
                                            <a href="{{ asset('storage/' . $comm->file_path) }}" target="_blank"
                                                class="flex items-center space-x-1.5 text-[10px] font-bold uppercase tracking-widest text-[#246257] hover:text-[#5f1b2d] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                <span>Descargar PDF</span>
                                            </a>
                                        @else
                                            <span
                                                class="text-[9px] text-slate-400 uppercase tracking-widest">Informativo</span>
                                        @endif

                                        <button
                                            @click='openModal("Comunicado", @json($comm->title), "{{ $comm->published_at ? $comm->published_at->format("d/m/Y") : "" }}", @json($comm->summary), "{{ $comm->image_path }}")'
                                            class="text-[10px] uppercase tracking-wider font-bold text-slate-500 hover:text-[#5f1b2d] transition-colors">
                                            Ver Detalles
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="py-8 text-center text-slate-400 font-light bg-white border border-slate-100 rounded-2xl text-xs">
                                    No hay comunicados o boletines publicados en este momento.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Celebraciones de Días y Efemérides -->
                <div class="space-y-8 pt-8 border-t border-slate-200">
                    <div class="max-w-xl text-left space-y-2">
                        <span class="text-xs uppercase tracking-wider text-[#246257] font-bold">Calendario Cívico e
                            Igualdad</span>
                        <h3 class="text-2xl font-bold font-serif text-[#5f1b2d]">Celebraciones de Días y Efemérides
                        </h3>
                    </div>

                    <!-- Efemérides Carousel -->
                    <style>
                        .hide-scrollbar::-webkit-scrollbar { display: none; }
                        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
                    </style>
                    <div class="relative group border border-[#c79b66]/25 rounded-3xl bg-white shadow-sm overflow-hidden" x-data="{
                        scrollNext() { $refs.slider.scrollBy({ left: $refs.slider.offsetWidth, behavior: 'smooth' }) },
                        scrollPrev() { $refs.slider.scrollBy({ left: -$refs.slider.offsetWidth, behavior: 'smooth' }) }
                    }">
                        <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory hide-scrollbar">
                            @forelse($efemerides as $efemeride)
                                <div class="w-full sm:w-1/2 lg:w-1/4 flex-none snap-start">
                                    <div class="glass-card p-6 space-y-4 hover:bg-slate-50/50 transition-colors relative overflow-hidden group/card border-r border-[#c79b66]/20 h-full">
                                        <div class="absolute top-0 right-0 w-24 h-24 bg-{{ $efemeride->color }}-500/5 rounded-full -mr-8 -mt-8 group-hover/card:scale-110 transition-transform"></div>
                                        <div class="w-10 h-10 rounded-2xl bg-{{ $efemeride->color }}-100 text-{{ $efemeride->color }}-600 flex items-center justify-center font-bold text-sm">
                                            {{ $efemeride->day }}
                                        </div>
                                        <div class="space-y-1">
                                            <span class="text-[9px] uppercase font-bold tracking-widest text-{{ $efemeride->color }}-600 block">{{ $efemeride->month }}</span>
                                            <h4 class="font-bold text-slate-900 text-sm font-serif">{{ $efemeride->title }}</h4>
                                        </div>
                                        <p class="text-xs text-slate-600 font-light leading-relaxed">
                                            {{ $efemeride->description }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full p-8 text-center text-slate-500">
                                    No hay efemérides programadas.
                                </div>
                            @endforelse
                        </div>
                        
                        <!-- Navigation Buttons (Solo visibles si hay efemerides) -->
                        @if($efemerides->count() > 0)
                        <button @click="scrollPrev" class="absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 rounded-full shadow-lg flex items-center justify-center text-[#246257] opacity-0 group-hover:opacity-100 transition-opacity hover:bg-white z-10 hidden sm:flex">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button @click="scrollNext" class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 rounded-full shadow-lg flex items-center justify-center text-[#246257] opacity-0 group-hover:opacity-100 transition-opacity hover:bg-white z-10 hidden sm:flex">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                        @endif
                    </div>
                </div>

                <!-- Colaboraciones Interinstitucionales -->
                <div class="space-y-8 pt-8 border-t border-slate-200">
                    <div class="max-w-xl text-left space-y-2">
                        <span class="text-xs uppercase tracking-wider text-[#246257] font-bold">Red del Sector
                            Público</span>
                        <h3 class="text-2xl font-bold font-serif text-[#5f1b2d]">Colaboración con otras Unidades y
                            Secretarías</h3>
                    </div>

                    <!-- Colaboradores Grid / Declaraciones -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($declaracionComites ?? [] as $declaration)
                            <div class="bg-white border border-slate-200/60 p-6 rounded-3xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                                <div class="absolute inset-y-0 left-0 w-1 bg-[#c79b66]"></div>
                                <div class="flex justify-between items-start mb-3">
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#246257] bg-[#246257]/10 px-3 py-1 rounded-full">{{ $declaration->committee_name }}</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase">{{ $declaration->date ? \Carbon\Carbon::parse($declaration->date)->format('d/m/Y') : '' }}</span>
                                </div>
                                <h4 class="font-bold text-sm text-slate-800 font-serif leading-snug mb-2 group-hover:text-[#5f1b2d] transition-colors">{{ $declaration->title }}</h4>
                                <p class="text-[11px] text-slate-600 font-light leading-relaxed mb-4 line-clamp-3">{{ $declaration->description }}</p>
                                <div class="flex items-center space-x-4">
                                    @if($declaration->file_path)
                                        <a href="{{ asset('storage/' . $declaration->file_path) }}" target="_blank" class="flex items-center space-x-1.5 text-[10px] font-bold uppercase tracking-widest text-[#5f1b2d] hover:text-[#c79b66] transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            <span>Documento</span>
                                        </a>
                                    @endif
                                    @if($declaration->external_url)
                                        <a href="{{ $declaration->external_url }}" target="_blank" class="flex items-center space-x-1.5 text-[10px] font-bold uppercase tracking-widest text-[#246257] hover:text-[#c79b66] transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            <span>Ver Más</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <!-- Fallback UI -->
                            <div class="md:col-span-2 py-8 text-center bg-white border border-slate-200/60 rounded-3xl text-slate-400 text-xs font-light">
                                Aún no hay declaraciones o acuerdos interinstitucionales publicados.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
