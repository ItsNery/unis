{{-- Componente 1: Logos superiores, Menú Móvil y Botón Volver Arriba --}}
<div x-data="{ 
        mobileMenuOpen: false, 
        showBackToTop: false
    }" 
    x-init="
        window.addEventListener('scroll', () => { 
            showBackToTop = window.pageYOffset > 500;
        });
    "
    class="w-full relative z-40">

    {{-- 1. HEADER (Logos y Hamburguesa) --}}
    <header class="bg-white border-b border-slate-200 py-3 w-full relative z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 flex items-center justify-between">
            
            {{-- GRUPO IZQUIERDA: Logo Gobierno --}}
            <div class="flex-1 flex justify-start">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logos/Logos-SPFA_.png') }}" 
                         onerror="this.src='{{ asset('img/logos/Logos-SPFA-UNIS.png') }}';"
                         alt="Logo Gobierno de Puebla" 
                         class="h-8 lg:h-[100px] max-sm:h-auto max-sm:max-h-[40px] max-sm:max-w-[220px] w-auto object-contain block">
                </a>
            </div>

            {{-- GRUPO DERECHA: Logo UnIS --}}
            <div class="flex items-center space-x-7">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logos/logo_uis_veda.png') }}" 
                             onerror="this.src='{{ asset('img/logos/logo_uis_symbol.png') }}';"
                             alt="Logo UnIS Puebla" 
                             class="h-8 lg:h-[70px] w-auto object-contain block">
                    </a>
                </div>

                {{-- Botón Hamburguesa (Móvil) --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="lg:hidden flex flex-col justify-around w-7 h-6 bg-transparent border-none cursor-pointer p-0 z-50 focus:outline-none" 
                    aria-label="Abrir menú de navegación">
                    <span class="block w-full h-[3px] bg-slate-700 rounded-[10px] transition-all duration-300" :class="mobileMenuOpen ? 'rotate-45 translate-y-[8px] translate-x-[2px]' : ''"></span>
                    <span class="block w-full h-[3px] bg-slate-700 rounded-[10px] transition-all duration-300" :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                    <span class="block w-full h-[3px] bg-slate-700 rounded-[10px] transition-all duration-300" :class="mobileMenuOpen ? '-rotate-45 -translate-y-[8px] translate-x-[2px]' : ''"></span>
                </button>
            </div>

        </div>
    </header>

    {{-- Botón Back to Top (Flotante) --}}
    <button 
        x-show="showBackToTop"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-50"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-50"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-6 right-6 z-[1002] p-3.5 rounded-full bg-white text-[#861e34] shadow-2xl border border-[#c79b66]/30 hover:bg-[#861e34] hover:text-white transition-all duration-300 group flex items-center justify-center"
        aria-label="Subir al inicio">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    {{-- 3. MENÚ DE NAVEGACIÓN MÓVIL (Overlay) --}}
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[1010] lg:hidden">
        
        {{-- Backdrop --}}
        <div @click="mobileMenuOpen = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>
        
        {{-- Panel lateral --}}
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="absolute left-0 top-0 bottom-0 w-full max-w-[320px] bg-white shadow-2xl flex flex-col border-r border-slate-200 overflow-y-auto pt-20">
            
            <div class="flex justify-between items-center px-6 py-5 border-b border-slate-100 bg-slate-50/50 absolute top-0 left-0 w-full">
                <span class="text-xs uppercase tracking-widest font-bold text-[#c79b66]">Navegación</span>
                <button @click="mobileMenuOpen = false" class="p-2 text-slate-450 hover:text-[#861e34] transition-colors rounded-lg hover:bg-white border border-transparent hover:border-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex flex-col space-y-1 font-sans text-slate-800 text-[17px] mt-6">
                {{-- Enlaces directos --}}
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#inicio' : url('/#inicio') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Inicio</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#contenido-seccion' : url('/#contenido-seccion') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Actualidad</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#identidad' : url('/#identidad') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Identidad</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#que-hacemos' : url('/#que-hacemos') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">¿Qué Hacemos?</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#lineas-accion' : url('/#lineas-accion') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Líneas de Acción</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#pronunciamientos' : url('/#pronunciamientos') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Pronunciamientos</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#transparencia' : url('/#transparencia') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Transparencia</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#buzon' : url('/#buzon') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Buzón de Denuncias</a>
                <a @click="mobileMenuOpen = false" href="{{ request()->is('/') ? '#contacto' : url('/#contacto') }}" class="block py-[15px] px-[25px] border-b border-[#f0f0f0] font-semibold transition-all">Contacto</a>
            </div>
        </div>
    </div>
</div>

{{-- Componente 2: Barra de Navegación Sticky (Desktop) --}}
<div x-data="{ 
        activeSection: 'inicio',
        scrolled: false,
        isHome: {{ request()->is('/') ? 'true' : 'false' }}
    }" 
    x-init="
        window.addEventListener('scroll', () => { 
            scrolled = window.pageYOffset > 40;
        });
        window.addEventListener('section-change', (e) => {
            activeSection = e.detail;
        });
    "
    :class="scrolled ? 'shadow-md border-slate-200 bg-white/95 backdrop-blur-md' : 'border-transparent bg-white'"
    class="sticky top-0 w-full z-[999] border-b transition-all duration-300 lg:block hidden">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center">
            {{-- Menú Horizontal para Desktop --}}
            <ul class="flex items-center justify-center space-x-1 list-none p-0 m-0 text-slate-800 transition-all duration-300">
                
                {{-- === INICIO === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#inicio' : url('/#inicio') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'inicio' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Inicio
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'inicio' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === ACTUALIDAD === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#contenido-seccion' : url('/#contenido-seccion') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'contenido-seccion' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Actualidad
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'contenido-seccion' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === IDENTIDAD === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#identidad' : url('/#identidad') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'identidad' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Identidad
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'identidad' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === ¿QUÉ HACEMOS? === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#que-hacemos' : url('/#que-hacemos') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'que-hacemos' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        ¿Qué Hacemos?
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'que-hacemos' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === LÍNEAS DE ACCIÓN === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#lineas-accion' : url('/#lineas-accion') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'lineas-accion' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Líneas de Acción
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'lineas-accion' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === PRONUNCIAMIENTOS === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#pronunciamientos' : url('/#pronunciamientos') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'pronunciamientos' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Pronunciamientos
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'pronunciamientos' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === TRANSPARENCIA === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#transparencia' : url('/#transparencia') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'transparencia' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Transparencia
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'transparencia' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === BUZÓN === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#buzon' : url('/#buzon') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'buzon' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Buzón
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'buzon' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

                {{-- === CONTACTO === --}}
                <li>
                    <a href="{{ request()->is('/') ? '#contacto' : url('/#contacto') }}" 
                        class="relative group block py-[18px] px-3.5 text-sm lg:text-base font-semibold transition-colors"
                        :class="(activeSection === 'contacto' && isHome) ? 'text-[#861e34]' : 'text-slate-700 hover:text-[#861e34]'">
                        Contacto
                        <span class="absolute bottom-2.5 left-1/2 -translate-x-1/2 h-[3px] bg-[#861e34] rounded-[2px] transition-all duration-300"
                              :class="(activeSection === 'contacto' && isHome) ? 'w-[70%]' : 'w-0 group-hover:w-[70%]'"></span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</div>
