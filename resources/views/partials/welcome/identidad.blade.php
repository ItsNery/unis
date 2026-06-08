<section id="identidad"
    class="stack-panel w-full flex flex-col justify-center px-6 py-20 bg-slate-50 bg-talavera relative overflow-hidden border-b border-slate-200">

    <div class="max-w-6xl w-full mx-auto z-10 space-y-20">

        {{-- ── Encabezado ── --}}
        <div class="max-w-2xl mx-auto text-center space-y-3 gsap-fade-in">
            <span class="text-base uppercase tracking-[0.4em] font-bold text-[#c79b66]">Institucional</span>
            <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">Identidad e Igualdad</h2>
            <div class="w-16 h-1 bg-[#5f1b2d] mx-auto mt-2"></div>
        </div>

        {{-- ── Misión / Visión / Valores ── --}}
        <div
            class="grid grid-cols-1 md:grid-cols-3 border border-[#c79b66]/25 rounded-3xl overflow-hidden bg-white shadow-sm gsap-fade-in">
            <!-- Mision -->
            <div
                class="glass-card p-8 md:p-10 text-left space-y-4 hover:bg-slate-50/50 transition-colors duration-300 flex flex-col justify-between border-b md:border-b-0 md:border-r border-[#c79b66]/20 bg-white">
                <div class="space-y-4">
                    <div
                        class="w-11 h-11 rounded-xl flex items-center justify-center bg-[#5c1d91]/5 border border-[#5c1d91]/20 text-[#5c1d91]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-slate-900">Misión</h3>
                    <p class="text-base text-slate-600 leading-relaxed font-light">{{ $settings['mission'] }}
                    </p>
                </div>
            </div>
            <!-- Vision -->
            <div
                class="glass-card p-8 md:p-10 text-left space-y-4 hover:bg-slate-50/50 transition-colors duration-300 flex flex-col justify-between border-b md:border-b-0 md:border-r border-[#c79b66]/20 bg-white">
                <div class="space-y-4">
                    <div
                        class="w-11 h-11 rounded-xl flex items-center justify-center bg-[#246257]/5 border border-[#246257]/20 text-[#246257]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-slate-900">Visión</h3>
                    <p class="text-base text-slate-600 leading-relaxed font-light">{{ $settings['vision'] }}</p>
                </div>
            </div>
            <!-- Valores -->
            <div
                class="glass-card p-8 md:p-10 text-left space-y-4 hover:bg-slate-50/50 transition-colors duration-300 flex flex-col justify-between bg-white">
                <div class="space-y-4">
                    <div
                        class="w-11 h-11 rounded-xl flex items-center justify-center bg-[#861e34]/5 border border-[#861e34]/20 text-[#861e34]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-slate-900">Valores</h3>
                    <p class="text-base text-slate-600 leading-relaxed font-light">{{ $settings['values'] }}</p>
                </div>
            </div>
        </div>

        {{-- ── Organigrama ── --}}
        <div class="space-y-10 gsap-fade-in">
            <div class="text-center space-y-2">
                <span class="text-base uppercase tracking-[0.4em] font-bold text-[#246257]">Estructura
                    Organizacional</span>
                <h3 class="text-2xl md:text-3xl font-bold font-serif text-[#5f1b2d]">Nuestro Equipo</h3>
                <div class="w-12 h-1 bg-[#c79b66] mx-auto mt-2"></div>
            </div>

            {{-- Titular (nivel 1) --}}
            @if ($titular)
                @php
                    $titularImgUrl = $titular->image_path ? asset('storage/' . $titular->image_path) : '';
                @endphp
                <div class="flex flex-col items-center w-full">
                    <a href="{{ route('public.miembros.show', $titular->id) }}"
                        class="group flex flex-col items-center cursor-pointer focus:outline-none">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-tr from-[#5f1b2d] via-[#c79b66] to-[#246257] rounded-3xl blur-md opacity-30 group-hover:opacity-60 transition-opacity duration-500">
                            </div>
                            <div
                                class="relative w-28 h-28 rounded-3xl overflow-hidden border-2 border-[#c79b66]/60 bg-[#fbfbfa] shadow-lg flex items-center justify-center">
                                @if ($titular->image_path)
                                    <img src="{{ $titularImgUrl }}" alt="{{ $titular->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <span class="font-serif font-bold text-[#5f1b2d] text-2xl tracking-widest">
                                        @php
                                            $words = explode(' ', $titular->name);
                                            echo strtoupper(
                                                substr($words[0] ?? 'T', 0, 1) . substr($words[1] ?? '', 0, 1),
                                            );
                                        @endphp
                                    </span>
                                @endif
                            </div>
                            {{-- Badge --}}
                            <div
                                class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#5f1b2d] text-white text-[9px] font-bold uppercase tracking-widest px-3 py-0.5 rounded-full shadow whitespace-nowrap">
                                Titular</div>
                        </div>
                        <div class="mt-5 text-center space-y-0.5">
                            <p
                                class="font-bold text-base font-serif text-slate-900 group-hover:text-[#5f1b2d] transition-colors">
                                {{ $titular->name }}</p>
                            <p class="text-[10px] uppercase tracking-widest text-[#5f1b2d] font-bold">
                                {{ $titular->title }}</p>
                        </div>
                    </a>

                    {{-- Conector vertical --}}
                    <div class="w-px h-8 bg-[#c79b66]/40 mt-5"></div>
                    {{-- Línea horizontal del conector --}}
                    <div class="w-full max-w-2xl h-px bg-[#c79b66]/30"></div>
                </div>

                {{-- Directores (nivel 2) --}}
                @php
                    $directorsList = isset($directores) && $directores->count() > 0 ? $directores : collect([]);
                @endphp

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 w-full max-w-4xl mx-auto -mt-px">
                    @foreach ($directorsList as $index => $dir)
                        @php
                            $colors = ['#5c1d91', '#246257', '#c79b66', '#861e34'];
                            $icon_color = $colors[$index % 4];
                            $words = explode(' ', $dir->name);
                            $initial = strtoupper(substr($words[0] ?? 'D', 0, 1) . substr($words[1] ?? '', 0, 1));
                            $imgUrl = $dir->image_path ? asset('storage/' . $dir->image_path) : '';
                        @endphp
                        <div class="flex flex-col items-center">
                            {{-- Conector vertical superior --}}
                            <div class="w-px h-8 bg-[#c79b66]/30"></div>
                            <a href="{{ route('public.miembros.show', $dir->id) }}"
                                class="group flex flex-col items-center cursor-pointer focus:outline-none w-full">
                                <div class="relative">
                                    @if ($dir->image_path)
                                        <div
                                            class="relative w-20 h-20 rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-sm group-hover:border-[#c79b66]/60 group-hover:shadow-md transition-all duration-300">
                                            <img src="{{ $imgUrl }}" alt="{{ $dir->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="relative w-20 h-20 rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-sm group-hover:border-[#c79b66]/60 group-hover:shadow-md transition-all duration-300 flex items-center justify-center"
                                            style="background: {{ $icon_color }}08;">
                                            <span class="font-serif font-bold text-xl tracking-wider"
                                                style="color: {{ $icon_color }};">{{ $initial }}</span>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-gradient-to-tr from-transparent via-transparent to-white/10 group-hover:opacity-0 transition-opacity">
                                    </div>

                                    {{-- Ícono de ver más --}}
                                    <div
                                        class="absolute -bottom-1.5 -right-1.5 w-6 h-6 rounded-full bg-white border border-[#c79b66]/40 shadow flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-[#5f1b2d]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-3 text-center space-y-0.5 px-1">
                                    <p
                                        class="font-bold text-xs font-serif text-slate-800 group-hover:text-[#5f1b2d] transition-colors leading-tight">
                                        {{ $dir->area }}</p>
                                    <p class="text-xs uppercase tracking-widest font-bold"
                                        style="color: {{ $icon_color }};">{{ $dir->title }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>

    @endif

</section>
