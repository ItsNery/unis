@if($titular)
        <section id="titular"
            class="stack-panel min-h-screen w-full flex items-center justify-center px-6 py-20 relative overflow-hidden bg-white border-b border-slate-200">
            <div class="max-w-5xl w-full mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 items-center z-10">
                <!-- Foto Titular o Escudo Decorado -->
                <div class="col-span-1 md:col-span-5 flex justify-center gsap-fade-in">
                    <div class="relative group">
                        <!-- Marco decorativo en gradiente -->
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-[#5f1b2d] via-[#c79b66] to-[#246257] rounded-3xl blur-xl opacity-20 group-hover:opacity-35 transition-opacity duration-500">
                        </div>

                        <div
                            class="relative w-72 h-80 md:w-80 md:h-[400px] rounded-3xl overflow-hidden border border-[#c79b66]/40 bg-[#fbfbfa] flex items-center justify-center p-4 shadow-sm">
                            @if ($titular->image_path)
                                <img src="{{ asset('storage/' . $titular->image_path) }}"
                                    alt="{{ $titular->name }}"
                                    class="w-full h-full object-cover rounded-2xl gsap-parallax-img">
                            @else
                                <!-- Silueta/Avatar Institucional en SVG si no hay imagen subida -->
                                <div class="flex flex-col items-center text-center space-y-4 gsap-parallax-img">
                                    <div class="relative">
                                        <img src="{{ asset('img/logos/logo_uis_veda.png') }}"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            alt="UnIS Logo" class="h-28 w-auto object-contain">
                                        <div
                                            class="hidden w-24 h-24 rounded-full bg-slate-100 items-center justify-center text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-14 w-14 text-[#c79b66]/60" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-xs uppercase tracking-widest text-[#246257] font-bold">Secretaría
                                        de Planeación, Finanzas y Administración</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Mensaje / Texto -->
                <div class="col-span-1 md:col-span-7 space-y-6 text-left gsap-fade-in">
                    <span class="text-xs uppercase tracking-[0.3em] font-bold text-[#246257]">Nuestra Dirección</span>

                    <div class="space-y-1">
                        <h2 class="text-2xl md:text-3xl font-bold font-serif text-slate-900 leading-tight">
                            {{ $titular->name }}
                        </h2>
                        <p class="text-xs font-bold uppercase tracking-widest text-[#5f1b2d]">
                            {{ $titular->title }}
                        </p>
                    </div>

                    @if($titular->phrase)
                    <!-- Bloque de frase destacada -->
                    <blockquote
                        class="border-l-4 border-[#c79b66] pl-6 py-2 italic text-[#5f1b2d] text-lg md:text-xl font-light font-serif leading-relaxed bg-slate-50 pr-4">
                        "{{ $titular->phrase }}"
                    </blockquote>
                    @endif

                    <p class="text-base text-slate-600 leading-relaxed font-light">
                        {!! nl2br(e($titular->description)) !!}
                    </p>
                </div>
            </div>
        </section>
@endif
