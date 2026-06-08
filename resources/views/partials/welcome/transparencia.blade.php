        <section id="transparencia"
            class="stack-panel min-h-screen w-full flex flex-col justify-center px-6 py-20 bg-slate-50 relative overflow-hidden border-b border-slate-200">
            <div class="max-w-6xl w-full mx-auto z-10 space-y-16">

                <!-- Encabezado de la Sección -->
                <div class="max-w-2xl text-left space-y-3 gsap-fade-in">
                    <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#246257]">Rendición de
                        Cuentas</span>
                    <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">Transparencia Institucional
                    </h2>
                    <div class="w-16 h-1 bg-[#c79b66] mt-2"></div>
                    <p class="text-slate-600 text-xs md:text-sm font-light leading-relaxed">
                        Accede a la documentación del funcionamiento y normatividad de la Unidad, así como a reportes
                        visuales de los avances logrados en transversalización e igualdad de género.
                    </p>
                </div>

                <!-- Gráficos Simples y Reportes -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    @forelse($metricas as $index => $metrica)
                        @php
                            $colors = ['text-[#861e34]', 'text-[#246257]', 'text-[#c79b66]', 'text-[#5c1d91]'];
                            $colorClass = $colors[$index % 4];
                        @endphp
                        <div class="bg-white border border-slate-100 rounded-3xl p-6 md:p-8 flex flex-col shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                            
                            {{-- Efecto decorativo de fondo --}}
                            <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:opacity-10 transition-opacity duration-500 group-hover:scale-110 transform {!! $colorClass !!}">
                                @if($metrica->icon)
                                    {!! $metrica->icon !!}
                                @else
                                    <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                                @endif
                            </div>

                            <div class="space-y-4 relative z-10 flex-1 flex flex-col">
                                <div>
                                    <span class="text-[9px] uppercase tracking-wider font-bold text-slate-400">Indicador Oficial</span>
                                    <h3 class="text-base font-bold text-slate-800 font-serif mt-1">{{ $metrica->title }}</h3>
                                    @if($metrica->description)
                                    <p class="text-[11px] text-slate-500 font-light mt-2">{{ $metrica->description }}</p>
                                    @endif
                                </div>

                                <div class="py-6 mt-auto flex items-center">
                                    <span class="text-5xl font-extrabold {!! $colorClass !!} tracking-tight">{{ $metrica->value }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-3 bg-white border border-slate-100 rounded-3xl p-10 text-center shadow-sm">
                            <span class="text-slate-400 font-light text-sm">No hay métricas registradas en el sistema.</span>
                        </div>
                    @endforelse
                </div>

                <!-- Biblioteca de Documentos Descargables (Filtrable con Alpine.js) -->
                <div x-data="{ activeTab: 'Todos' }"
                    class="space-y-8 bg-white border border-slate-200/80 rounded-3xl p-6 md:p-10 shadow-sm">
                    <div
                        class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-slate-100 pb-6">
                        <div>
                            <h3 class="text-lg font-bold font-serif text-[#5f1b2d]">Documentación y Repositorio Oficial
                            </h3>
                            <p class="text-[11px] text-slate-500 font-light mt-0.5">Consulta y descarga los archivos
                                que norman y rigen las actividades de la UnIS.</p>
                        </div>

                        <!-- Tabs de Filtro -->
                        <div class="flex flex-wrap gap-2 text-xs">
                            @foreach (['Todos', 'Marco Jurídico', 'Informe Anual', 'Plan Anual de Trabajo', 'Actas de Sesiones'] as $tab)
                                <button type="button" @click="activeTab = '{{ $tab }}'"
                                    :class="activeTab === '{{ $tab }}' ? 'bg-[#5f1b2d] text-white border-[#5f1b2d]' :
                                        'bg-slate-50 text-slate-600 hover:bg-slate-100 border-slate-200/80'"
                                    class="px-4 py-2 rounded-full border font-bold uppercase tracking-wider text-[9px] transition-all">
                                    {{ $tab }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Listado de Documentos -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($documentoTransparencias as $doc)
                            <div x-show="activeTab === 'Todos' || activeTab === '{{ $doc->category }}'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                class="p-6 bg-slate-50 hover:bg-white border border-slate-200/70 hover:border-[#c79b66]/30 rounded-3xl flex flex-col justify-between h-[180px] hover:shadow-sm transition-all">
                                <div class="space-y-2">
                                    <div
                                        class="flex justify-between items-center text-[9px] font-bold uppercase tracking-wider text-[#246257]">
                                        <span>{{ $doc->category }}</span>
                                        <span
                                            class="text-slate-400">{{ $doc->published_at ? $doc->published_at->format('d/m/Y') : '' }}</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900 line-clamp-2 leading-snug">
                                        {{ $doc->title }}</h4>
                                    <p class="text-xs text-slate-500 font-light line-clamp-2 leading-relaxed">
                                        {{ $doc->description }}</p>
                                </div>

                                <div class="flex justify-end pt-3 border-t border-slate-100/50">
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                        class="flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest text-[#5f1b2d] hover:text-[#861e34] transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <span>Descargar PDF</span>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 py-12 text-center text-slate-400 font-light">
                                No hay documentos de transparencia publicados en esta categoría.
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </section>


