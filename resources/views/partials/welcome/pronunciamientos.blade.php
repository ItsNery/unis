        <section id="pronunciamientos"
            class="stack-panel min-h-screen w-full flex flex-col justify-center px-6 py-20 bg-white relative overflow-hidden border-b border-slate-200">
            <div class="max-w-6xl w-full mx-auto z-10 space-y-16">

                <!-- Encabezado de la Sección -->
                <div class="max-w-2xl text-left space-y-3 gsap-fade-in">
                    <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#246257]">Voces Oficiales</span>
                    <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">Pronunciamientos y Posturas
                    </h2>
                    <div class="w-16 h-1 bg-[#c79b66] mt-2"></div>
                </div>

                <!-- Muro de Pronunciamientos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($pronunciamientos as $pr)
                        <div
                            class="bg-slate-50 border border-slate-100 rounded-3xl p-6 md:p-8 flex flex-col md:flex-row items-center md:items-start gap-6 hover:shadow-md transition-shadow gsap-fade-in relative overflow-hidden group">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-[#5f1b2d]/5 rounded-full -mr-12 -mt-12 group-hover:scale-105 transition-transform">
                            </div>

                            <!-- Foto del Funcionario -->
                            <div
                                class="w-24 h-24 md:w-28 md:h-28 rounded-2xl flex-shrink-0 overflow-hidden bg-gradient-to-tr from-[#5f1b2d]/10 to-[#246257]/10 border border-slate-200 shadow-sm relative">
                                @if ($pr->author_image)
                                    <img src="{{ asset('storage/' . $pr->author_image) }}"
                                        alt="{{ $pr->author_name }}" class="w-full h-full object-cover">
                                @else
                                    <!-- Fallback Avatar elegante con iniciales -->
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center text-[#5f1b2d] font-bold font-serif">
                                        <span class="text-2xl tracking-wider">
                                            @php
                                                $words = explode(' ', $pr->author_name);
                                                $initials = '';
                                                if (isset($words[0])) {
                                                    $initials .= substr($words[0], 0, 1);
                                                }
                                                if (isset($words[1])) {
                                                    $initials .= substr($words[1], 0, 1);
                                                }
                                                echo strtoupper($initials);
                                            @endphp
                                        </span>
                                        <span
                                            class="text-[8px] uppercase tracking-widest text-[#246257] mt-1 font-semibold">Servidor(a)</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Contenido del Posicionamiento -->
                            <div class="flex-grow space-y-3 text-center md:text-left z-10">
                                <div class="space-y-1">
                                    <span
                                        class="text-[9px] uppercase font-bold tracking-widest text-[#c79b66] block">Posicionamiento
                                        Oficial</span>
                                    <h3 class="text-base md:text-lg font-bold text-slate-900 font-serif leading-tight">
                                        {{ $pr->title }}
                                    </h3>
                                </div>

                                <p class="text-xs text-slate-600 font-light leading-relaxed">
                                    "{{ $pr->excerpt }}"
                                </p>

                                <!-- Funcionario info -->
                                <div class="pt-2 border-t border-slate-200/80">
                                    <h4 class="text-xs font-bold text-slate-800 leading-snug">{{ $pr->author_name }}
                                    </h4>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                        {{ $pr->author_title }}</p>
                                </div>

                                <!-- Enlace Ver Más Detalles -->
                                <div class="pt-2">
                                    <button
                                        @click='openModal("Pronunciamiento", @json($pr->title), "{{ $pr->author_name }} | {{ $pr->author_title }}", @json($pr->content), "{{ $pr->author_image }}")'
                                        class="text-xs font-bold text-[#5f1b2d] hover:text-[#246257] hover:underline uppercase tracking-wider flex items-center space-x-1.5 mx-auto md:mx-0">
                                        <span>Leer Posicionamiento Completo</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-2 py-12 text-center text-slate-400 font-light bg-slate-50 border border-slate-100 rounded-3xl text-xs">
                            No se han publicado pronunciamientos o posturas oficiales en este momento.
                        </div>
                    @endforelse
                </div>

                <!-- Botón Ver Todos -->
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('public.pronunciamientos') }}"
                        class="px-8 py-3 rounded-full text-xs font-bold uppercase tracking-wider bg-white border border-[#5f1b2d]/25 text-[#5f1b2d] hover:bg-[#5f1b2d]/5 transition-all shadow-sm">
                        Ver todos los pronunciamientos
                    </a>
                </div>
            </div>
        </section>


