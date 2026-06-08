        <!-- Sección 01-03: Actualidad, Eventos y Comunicados -->
        <section id="contenido-seccion" class="stack-panel relative bg-slate-50 border-y border-slate-200 overflow-hidden">
            
            <!-- Contenedor para Scroll Horizontal en Desktop / Vertical en Móvil -->
            <div class="actualidad-horizontal-wrap flex flex-col lg:flex-row lg:w-[400vw] lg:h-screen lg:will-change-transform">

                <!-- PANEL 0: INTRODUCCIÓN -->
                <div class="actualidad-panel flex-shrink-0 w-full lg:w-screen lg:h-full flex items-center justify-center px-6 lg:px-20 py-20 lg:py-0 bg-gradient-to-br from-white to-slate-50">
                    <div class="max-w-2xl text-center lg:text-left gsap-reveal">
                        <span class="text-sm md:text-base uppercase tracking-[0.3em] font-bold text-[#c79b66] mb-4 block">Actualidad & Novedades</span>
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold font-serif text-[#5f1b2d] mb-6 leading-tight">Comunicación Institucional</h2>
                        <p class="text-lg md:text-xl text-slate-600 leading-relaxed mb-10 font-light">
                            Mantente al tanto de las últimas noticias, eventos próximos y comunicados oficiales. Un espacio de transparencia y cercanía con la ciudadanía.
                        </p>
                        <div class="flex items-center justify-center lg:justify-start space-x-4 text-sm md:text-base text-[#246257] font-bold uppercase tracking-widest">
                            <span class="hidden lg:inline">Desliza para explorar</span>
                            <span class="lg:hidden">Sigue bajando</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-bounce lg:animate-pulse rotate-90 lg:rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- PANEL 1: NOTICIAS (ACTUALIDAD) -->
                <div class="actualidad-panel flex-shrink-0 w-full lg:w-screen lg:h-full flex flex-col justify-center px-6 lg:px-20 py-20 lg:py-0 bg-white lg:bg-transparent border-t lg:border-t-0 border-slate-100">
                    <div class="max-w-7xl w-full mx-auto">
                        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 lg:mb-12 gap-4">
                            <div>
                                <span class="text-xs md:text-sm uppercase tracking-widest text-[#246257] font-bold block mb-1">Sección 01</span>
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-[#5f1b2d]">Últimas Noticias</h3>
                            </div>
                            <a href="{{ route('public.noticias') }}" class="inline-flex items-center text-sm font-bold text-[#c79b66] hover:text-[#5f1b2d] transition-colors group">
                                VER TODAS LAS NOTICIAS
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                            @forelse ($noticias as $item)
                                <div @click='openModal("Noticia", @json($item->title), "{{ $item->published_at ? $item->published_at->format("d/m/Y") : "" }}", @json($item->content), "{{ $item->image_path }}")'
                                    class="glass-card rounded-[2rem] p-8 lg:p-10 flex flex-col justify-between cursor-pointer transition-all duration-500 hover:-translate-y-3 shadow-sm hover:shadow-2xl border border-slate-100 bg-white relative overflow-y-scroll group min-h-[200px] max-h-[300px]">
                                    <div class="absolute inset-x-0 top-0 h-2 bg-gradient-to-r from-[#5f1b2d] to-[#c79b66]"></div>
                                    <div class="relative z-10">
                                        <span class="text-xs md:text-sm uppercase tracking-widest text-[#c79b66] font-bold block mb-4">
                                            {{ $item->published_at ? $item->published_at->format('d M, Y') : 'Reciente' }}
                                        </span>
                                        <h4 class="text-xl md:text-xl font-bold font-serif text-slate-900 group-hover:text-[#5f1b2d] transition-colors mb-2 leading-tight line-clamp-3">
                                            {{ $item->title }}
                                        </h4>
                                        <p class="text-base md:text-lg text-slate-500 font-light leading-relaxed line-clamp-3">
                                            {{ strip_tags($item->content) }}
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-3 text-sm font-bold uppercase tracking-[0.1em] text-[#5f1b2d] mt-4 relative z-10">
                                        <span>Seguir leyendo</span>
                                        <div class="w-8 h-[1px] bg-[#5f1b2d] transform origin-left group-hover:scale-x-150 transition-transform"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-slate-400 text-lg font-light col-span-full py-20 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">No hay noticias disponibles en este momento.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- PANEL 2: EVENTOS -->
                <div class="actualidad-panel flex-shrink-0 w-full lg:w-screen lg:h-full flex flex-col justify-center px-6 lg:px-20 py-20 lg:py-0 bg-slate-50 lg:bg-transparent border-t lg:border-t-0 border-slate-200">
                    <div class="max-w-7xl w-full mx-auto">
                        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 lg:mb-12 gap-4">
                            <div>
                                <span class="text-xs md:text-sm uppercase tracking-widest text-[#246257] font-bold block mb-1">Sección 02</span>
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-[#5f1b2d]">Eventos</h3>
                            </div>
                            <a href="{{ route('public.events') }}" class="inline-flex items-center text-sm font-bold text-[#246257] hover:text-[#5f1b2d] transition-colors group">
                                VER CALENDARIO COMPLETO
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                            @forelse ($eventos as $evento)
                                <a href="{{ route('public.eventos.show', $evento->slug) }}"
                                    class="block glass-card rounded-[2rem] p-8 lg:p-10 flex flex-col justify-between cursor-pointer transition-all duration-500 hover:-translate-y-3 shadow-sm hover:shadow-2xl border border-slate-200 bg-white relative overflow-hidden group min-h-[200px] max-h-[300px]">
                                    <div class="absolute inset-x-0 top-0 h-2 bg-[#246257]"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="px-3 py-1 rounded-full bg-[#246257]/10 text-[#246257] text-xs font-bold uppercase tracking-widest border border-[#246257]/20">
                                                {{ $evento->event_date->format('d M, Y') }}
                                            </span>
                                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $evento->event_date->format('H:i') }} hrs</span>
                                        </div>
                                        <h4 class="text-xl md:text-xl font-bold font-serif text-slate-900 group-hover:text-[#246257] transition-colors mb-4 leading-tight line-clamp-2">
                                            {{ $evento->title }}
                                        </h4>
                                        <p class="text-base md:text-base text-slate-500 font-light leading-relaxed line-clamp-2 mb-4">
                                            {{ $evento->description }}
                                        </p>
                                        @if($evento->location)
                                            <div class="flex items-center space-x-2 text-sm text-slate-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#c79b66]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                <span class="truncate">{{ $evento->location }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-3 text-sm font-bold uppercase tracking-[0.1em] text-[#246257] mt-4 relative z-10">
                                        <span>Más información</span>
                                        <div class="w-8 h-[1px] bg-[#246257] transform origin-left group-hover:scale-x-150 transition-transform"></div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-slate-400 text-lg font-light col-span-full py-20 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">No hay eventos registrados.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- PANEL 3: COMUNICADOS -->
                <div class="actualidad-panel flex-shrink-0 w-full lg:w-screen lg:h-full flex flex-col justify-center px-6 lg:px-20 py-20 lg:py-0 bg-white lg:bg-transparent border-t lg:border-t-0 border-slate-200">
                    <div class="max-w-7xl w-full mx-auto">
                        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 lg:mb-12 gap-4">
                            <div>
                                <span class="text-xs md:text-sm uppercase tracking-widest text-[#5f1b2d] font-bold block mb-1">Sección 03</span>
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-[#5f1b2d]">Comunicados Oficiales</h3>
                            </div>
                            <a href="{{ route('public.comunicados') }}" class="inline-flex items-center text-sm font-bold text-[#5f1b2d] hover:text-[#c79b66] transition-colors group">
                                VER TODOS LOS COMUNICADOS
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                            @forelse ($comunicados as $comm)
                                <div class="glass-card rounded-[2rem] p-8 lg:p-10 flex flex-col justify-between shadow-sm hover:shadow-xl border border-slate-100 bg-white relative overflow-hidden group min-h-[200px] max-h-[300px] transition-all duration-500">
                                    <div class="absolute inset-x-0 bottom-0 h-1.5 bg-gradient-to-r from-[#5f1b2d] via-[#c79b66] to-[#0c312d]"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-6">
                                            <span class="text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-[0.2em]">BOLETÍN OFICIAL</span>
                                            <span class="text-xs font-bold text-slate-500">{{ $comm->published_at ? $comm->published_at->format('d/m/Y') : '' }}</span>
                                        </div>
                                        <h4 class="text-xl md:text-xl font-bold font-serif text-slate-900 group-hover:text-[#5f1b2d] transition-colors mb-4 leading-tight line-clamp-2">
                                            {{ $comm->title }}
                                        </h4>
                                        <p class="text-base md:text-base text-slate-500 font-light leading-relaxed line-clamp-3 mb-4">
                                            {{ $comm->summary }}
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-between mt-auto relative z-10">
                                        @if($comm->file_path)
                                            <a href="{{ asset('storage/' . $comm->file_path) }}" target="_blank" class="flex items-center space-x-2 text-xs font-bold uppercase tracking-widest text-[#246257] hover:text-[#5f1b2d] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                                                <span>DESCARGAR PDF</span>
                                            </a>
                                        @else
                                            <span class="text-[10px] text-slate-300 font-bold uppercase tracking-widest italic">Archivo en proceso</span>
                                        @endif
                                        <button @click='openModal("Comunicado", @json($comm->title), "{{ $comm->published_at ? $comm->published_at->format("d/m/Y") : "" }}", @json($comm->summary), "{{ $comm->image_path }}")'
                                            class="text-xs font-bold text-slate-600 hover:text-[#5f1b2d] underline decoration-[#c79b66] underline-offset-4 uppercase tracking-widest">
                                            VER MÁS
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <p class="text-slate-400 text-lg font-light col-span-full py-20 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">No hay comunicados oficiales recientes.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </section>
