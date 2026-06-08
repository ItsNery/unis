<!-- 6. MODAL INTERACTIVO DE LECTURA RÁPIDA (Alpine.js) -->
<div x-show="showModal" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-[1100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
    <div @click.away="showModal = false"
        class="bg-white w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl relative border border-slate-200"
        x-transition:enter="transition ease-out duration-300 transform scale-95"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200 transform scale-100"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <!-- Cabecera / Imagen superior -->
        <div class="relative h-44 bg-[#5f1b2d] flex items-center justify-center border-b border-[#c79b66]/20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#5f1b2d] to-[#861e34] opacity-90">
            </div>
            <span class="relative z-10 text-white font-serif text-2xl font-bold italic tracking-wide text-gradient-gold"
                x-text="modalType"></span>

            <button @click="showModal = false"
                class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white hover:bg-black/40 transition-colors font-bold text-lg">
                &times;
            </button>
        </div>

        <!-- Contenido -->
        <div class="p-6 md:p-8 space-y-4 max-h-[60vh] overflow-y-auto bg-white text-slate-800">
            <div class="flex items-center justify-between text-xs text-slate-400">
                <span x-text="modalType.toUpperCase()" class="font-bold tracking-widest text-[#246257]"></span>
                <span x-text="modalDate"></span>
            </div>

            <h3 class="text-lg md:text-xl font-bold font-serif text-slate-900 leading-tight" x-text="modalTitle">
            </h3>

            <!-- Enlaces adicionales específicos de evento -->
            <template x-if="modalType === 'Evento' && modalExtra">
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs space-y-1">
                    <div class="flex items-center space-x-2 text-slate-700">
                        <strong>Ubicación:</strong>
                        <span x-text="modalExtra.split('|')[0] || 'Por definir'"></span>
                    </div>
                    <template x-if="modalExtra.split('|')[1]">
                        <div class="flex items-center space-x-2">
                            <strong>Enlace:</strong>
                            <a :href="modalExtra.split('|')[1]" target="_blank"
                                class="text-emerald-600 hover:underline font-bold">Acceder al
                                registro /
                                transmisión</a>
                        </div>
                    </template>
                </div>
            </template>

            <div class="text-xs text-slate-600 leading-relaxed font-light whitespace-pre-wrap" x-html="modalContent">
            </div>
        </div>

        <!-- Footer modal -->
        <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-end">
            <button @click="showModal = false"
                class="px-6 py-2 rounded-xl text-xs uppercase tracking-wider bg-white hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold">
                Cerrar
            </button>
        </div>
    </div>
</div>
