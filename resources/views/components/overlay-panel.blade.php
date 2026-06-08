@props(['type' => 'noticias', 'title' => 'Listado Completo', 'items' => []])

<div x-show="showOverlay && currentOverlay === '{{ $type }}'" 
     x-cloak
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 translate-y-12"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-12"
     class="fixed inset-0 z-[60] bg-[#fafaf9] overflow-y-auto pb-20">
    
    <!-- Header del Overlay -->
    <div class="sticky top-0 z-10 bg-white/90 backdrop-blur-md border-b border-slate-200 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button @click="showOverlay = false" class="p-2 hover:bg-slate-100 rounded-full transition-colors text-[#5f1b2d]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
            <div>
                <span class="text-[10px] uppercase tracking-widest text-[#246257] font-bold block">Explorar</span>
                <h2 class="text-xl font-bold font-serif text-[#5f1b2d]">{{ $title }}</h2>
            </div>
        </div>
        
        <button @click="showOverlay = false" class="px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#5f1b2d] text-white hover:opacity-90 transition-all">
            Cerrar
        </button>
    </div>

    <!-- Contenido del Listado -->
    <div class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{ $slot }}
        </div>
    </div>
</div>
