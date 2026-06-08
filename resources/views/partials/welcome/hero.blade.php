<section id="inicio"
    class="stack-panel min-h-[70vh] lg:min-h-[80vh] w-full flex flex-col justify-center items-center px-6 relative pt-12 lg:pt-16 pb-20 lg:pb-24 bg-white">
    <div class="max-w-7xl w-full mx-auto z-10">

        @php
            $slides = [];
            // Slide default institucional
            $slides[] = [
                'is_default' => true,
                'subtitle' => 'Secretaría de Planeación, Finanzas y Administración',
                'title' =>
                    '<span class="inline-block overflow-hidden"><span class="inline-block hero-title-line">Unidad de</span></span><br><span class="inline-block overflow-hidden"><span class="inline-block hero-title-line text-gradient-purple font-sans font-bold">Igualdad Sustantiva</span></span>',
                'description' =>
                    'Buscamos alcanzar la igualdad de trato y oportunidades entre mujeres y hombres dentro del entorno laboral, personal y profesional, y así poder garantizar condiciones de trabajo basadas en el principio de igualdad sustantiva entre mujeres y hombres.',
            ];
            // Append banners from DB
            if (isset($banners) && $banners->count() > 0) {
                foreach ($banners as $banner) {
                    $slides[] = [
                        'is_default' => false,
                        'subtitle' => $banner->subtitle ?? 'Novedades UnIS',
                        'title' => $banner->title ?? 'Aviso Importante',
                        'description' => $banner->description ?? '',
                        'button_text' => $banner->button_text,
                        'button_link' => $banner->button_link,
                        'image_path' => $banner->image_path ? asset('storage/' . $banner->image_path) : null,
                    ];
                }
            }
        @endphp

        <div class="relative w-full min-h-[520px] lg:min-h-[400px]" x-data="{
            activeSlide: 0,
            slides: @js($slides),
            init() {
                if (this.slides.length > 1) {
                    setInterval(() => { this.activeSlide = (this.activeSlide + 1) % this.slides.length; }, 6000);
                }
            }
        }">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-500 absolute inset-x-0 top-0"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4"
                    class="w-full grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">

                    <!-- Columna Izquierda: Texto y Botones (Ancho 7/12 en Desktop) -->
                    <div class="lg:col-span-7 text-left space-y-5 md:space-y-6 flex flex-col justify-center">

                        <!-- Badge de Sección -->
                        <div class="inline-flex">
                            <span
                                class="px-3.5 py-1.5 rounded-[20px] text-xs font-bold uppercase tracking-wider bg-[#246257]/10 text-[#246257] border border-[#246257]/20"
                                x-text="slide.is_default ? 'Acerca de la UnIS' : slide.subtitle">
                            </span>
                        </div>

                        <!-- Subtítulo de Gobierno (Solo si es Default) -->
                        <template x-if="slide.is_default">
                            <span class="text-xs uppercase tracking-[0.25em] font-semibold text-slate-500 block"
                                x-text="slide.subtitle"></span>
                        </template>

                        <!-- Título -->
                        <template x-if="slide.is_default">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight font-serif leading-tight text-[#5f1b2d]"
                                x-html="slide.title"></h1>
                        </template>
                        <template x-if="!slide.is_default">
                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight font-serif leading-tight text-[#5f1b2d]"
                                x-text="slide.title"></h1>
                        </template>

                        <!-- Línea Separadora Dorada / Verde -->
                        <div class="w-20 h-1" :class="slide.is_default ? 'bg-[#c79b66]' : 'bg-[#246257]'"></div>

                        <!-- Descripción -->
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed font-light"
                            :class="!slide.is_default ? 'line-clamp-4' : ''" x-text="slide.description"></p>

                        <!-- Botones de Acción -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-2">
                            <!-- Botones del Slide Default -->
                            <template x-if="slide.is_default">
                                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                                    <a href="#contenido-seccion"
                                        class="px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-gradient-to-r from-[#5f1b2d] to-[#861e34] text-white hover:opacity-90 hover:scale-105 transition-all duration-300 border border-[#c79b66]/30 shadow-md shadow-[#5f1b2d]/10 text-center w-full sm:w-auto">
                                        Explorar Novedades
                                    </a>
                                    <a href="#titular"
                                        class="px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 transition-all text-center w-full sm:w-auto">
                                        Mensaje de la Titular
                                    </a>
                                </div>
                            </template>

                            <!-- Botón del Slide Dinámico -->
                            <template x-if="!slide.is_default && slide.button_text">
                                <a :href="slide.button_link || '#'" target="_blank"
                                    class="inline-block px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#246257] text-white hover:bg-[#1a4b42] hover:scale-105 transition-all duration-300 shadow-md text-center w-full sm:w-auto">
                                    <span x-text="slide.button_text"></span>
                                </a>
                            </template>
                        </div>

                    </div>

                    <!-- Columna Derecha: Imagen/Logo (Ancho 5/12 en Desktop) -->
                    <div class="lg:col-span-5 flex justify-center items-center lg:mt-0 mt-6">

                        <!-- Vista Default: Isotipo UIS grande -->
                        <template x-if="slide.is_default">
                            <div class="relative group max-w-[280px] md:max-w-[340px] lg:max-w-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-[#5f1b2d] via-[#c79b66] to-[#246257] rounded-full blur-2xl opacity-10 group-hover:opacity-25 transition-opacity duration-500">
                                </div>
                                <img src="{{ asset('img/logos/isotipo_UnIS.png') }}"
                                    onerror="this.src='{{ asset('img/logos/logo_uis_veda.png') }}'; this.onerror=function(){this.style.display='none'; this.nextElementSibling.style.display='flex';};"
                                    alt="UnIS Isotipo"
                                    class="w-64 h-auto md:w-72 lg:w-80 object-contain relative z-10 transition-transform duration-500 hover:scale-105">

                                <div
                                    class="hidden w-48 h-48 rounded-full items-center justify-center bg-gradient-to-tr from-[#5f1b2d] via-[#861e34] to-[#246257] border-2 border-[#c79b66] shadow-xl text-center relative z-10">
                                    <span class="font-serif font-bold text-white text-4xl tracking-widest">UnIS</span>
                                </div>
                            </div>
                        </template>

                        <!-- Vista Dinámica: Imagen del Banner -->
                        <template x-if="!slide.is_default">
                            <div class="w-full max-w-[420px] lg:max-w-[480px] relative group">
                                <div
                                    class="absolute inset-0 bg-slate-900/10 rounded-3xl blur-xl opacity-40 group-hover:opacity-60 transition-opacity">
                                </div>
                                <div
                                    class="relative w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 bg-white">
                                    <template x-if="slide.image_path">
                                        <img :src="slide.image_path" :alt="slide.title"
                                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                    </template>
                                    <template x-if="!slide.image_path">
                                        <div
                                            class="w-full h-full flex flex-col items-center justify-center bg-slate-50 border border-slate-200 p-6 text-center text-slate-400">
                                            <i class="fa-solid fa-image text-3xl mb-2 text-slate-355"></i>
                                            <span class="text-xs">Sin imagen de banner</span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                    </div>

                </div>
            </template>

            <!-- Navegación de Puntos (Dots) -->
            <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 flex space-x-2" x-show="slides.length > 1">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                        class="w-2.5 h-2.5 rounded-full transition-colors border border-[#5f1b2d]/20"
                        :class="activeSlide === index ? 'bg-[#5f1b2d]' : 'bg-white'"></button>
                </template>
            </div>
        </div>

    </div>

    <!-- Indicador de Scroll -->
    <div
        class="absolute bottom-16 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-1.5 opacity-60 hidden md:flex">
        <span class="text-[9px] uppercase tracking-widest text-slate-500 font-bold">Desliza para explorar</span>
        <div class="w-5 h-8 rounded-full border border-slate-400 flex justify-center p-1">
            <div class="w-1.5 h-1.5 bg-[#c79b66] rounded-full animate-bounce"></div>
        </div>
    </div>

    <!-- Cinta de Texto Infinito Premium (Lando Norris style) -->
    <div
        class="absolute bottom-0 left-0 w-full overflow-hidden bg-slate-900 border-t border-[#c79b66]/20 py-3.5 select-none z-20">
        <div
            class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-slate-900 to-transparent z-10 pointer-events-none">
        </div>
        <div
            class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-slate-900 to-transparent z-10 pointer-events-none">
        </div>

        <div
            class="animate-marquee-track flex gap-12 items-center whitespace-nowrap text-[11px] md:text-xs font-serif uppercase tracking-[0.25em] text-[#c79b66] font-bold">
            <span>Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Derechos Humanos</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Prevención y Equidad</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Acceso a la Justicia</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Empoderamiento Sustentable</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Cultura de Respeto</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>

            <!-- Duplicado idéntico para que el bucle infinito sea invisible y fluido -->
            <span>Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Derechos Humanos</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Prevención y Equidad</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Acceso a la Justicia</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Empoderamiento Sustentable</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
            <span>Cultura de Respeto</span>
            <span class="text-[#c79b66]/30 text-lg">•</span>
        </div>
    </div>
</section>
