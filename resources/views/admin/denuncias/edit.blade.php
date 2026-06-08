<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Revisión de Reporte Confidencial: ') }} <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $complaint->ticket_number }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Detalles de la Denuncia -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8 space-y-6">
                <div class="border-b border-gray-100 dark:border-gray-700 pb-4 flex justify-between items-center">
                    <div>
                        <span class="text-xs uppercase font-bold tracking-widest text-[#246257]">Detalles del Registro</span>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mt-1">{{ $complaint->subject }}</h3>
                    </div>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Recibido: {{ $complaint->created_at->format('d/m/Y H:i') }} hrs</span>
                </div>

                <!-- Información del Comitente / Complainant -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 dark:bg-slate-900/50 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-gray-400 block">Tipo de Identidad</span>
                        @if($complaint->is_anonymous)
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-300 flex items-center space-x-1.5 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <span>ANÓNIMO (Protección de identidad activa)</span>
                            </span>
                        @else
                            <span class="text-sm font-bold text-blue-700 dark:text-blue-400 flex items-center space-x-1.5 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <span>Identificado</span>
                            </span>
                        @endif
                    </div>

                    @if(!$complaint->is_anonymous)
                        <div class="space-y-2">
                            <div>
                                <span class="text-[10px] uppercase font-bold text-gray-400 block">Nombre del Denunciante</span>
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $complaint->complainant_name }}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block">Correo Electrónico</span>
                                    <a href="mailto:{{ $complaint->complainant_email }}" class="text-xs font-semibold text-indigo-500 hover:underline">{{ $complaint->complainant_email }}</a>
                                </div>
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block">Teléfono de Contacto</span>
                                    <span class="text-xs text-gray-800 dark:text-gray-200 font-semibold">{{ $complaint->complainant_phone ?? 'No proporcionado' }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Descripción del Reporte -->
                <div class="space-y-2">
                    <span class="text-xs uppercase font-bold tracking-wider text-gray-400 block">Relato del Suceso o Sugerencia</span>
                    <div class="p-6 bg-white dark:bg-gray-900 border border-slate-200/70 dark:border-gray-700 rounded-2xl text-sm leading-relaxed text-gray-800 dark:text-gray-300 font-light whitespace-pre-wrap">
                        {{ $complaint->description }}
                    </div>
                </div>

            </div>

            <!-- Formulario de Actualización y Notas Internas (Privado para Administradores) -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="border-b border-gray-100 dark:border-gray-700 pb-4 mb-6">
                    <span class="text-xs uppercase font-bold tracking-widest text-[#5f1b2d]">Bitácora y Seguimiento de la UnIS</span>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mt-1">Actualizar Estatus del Reporte</h3>
                </div>

                <form method="POST" action="{{ route('admin.denuncias.update', $complaint) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estatus del Folio</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @foreach($statuses as $st)
                                    <option value="{{ $st }}" {{ old('status', $complaint->status) == $st ? 'selected' : '' }}>{{ $st }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="internal_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas Internas de Seguimiento (No visibles públicamente)</label>
                            <textarea name="internal_notes" id="internal_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ej. Se turnó el caso al Órgano Interno de Control el 24/05/2026.">{{ old('internal_notes', $complaint->internal_notes) }}</textarea>
                            <p class="text-[10px] text-gray-400 mt-1">Usa esta área para registrar la bitácora de investigación, canalizaciones o resoluciones del caso.</p>
                            @error('internal_notes')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.denuncias.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Regresar a Buzón</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            Guardar Estatus y Notas
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
