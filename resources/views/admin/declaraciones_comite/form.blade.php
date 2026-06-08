<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ isset($declaracion_comite) ? __('Editar Acuerdo o Declaración') : __('Registrar Nuevo Acuerdo o Declaración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    
                    <form action="{{ isset($declaracion_comite) ? route('admin.declaraciones_comite.update', $declaracion_comite->id) : route('admin.declaraciones_comite.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($declaracion_comite))
                            @method('PUT')
                        @endif
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre del Comité -->
                            <div>
                                <label for="committee_name" class="block text-sm font-medium text-slate-700">Comité / Institución / Secretaría <span class="text-red-500">*</span></label>
                                <input type="text" name="committee_name" id="committee_name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('committee_name', $declaracion_comite->committee_name ?? '') }}" placeholder="Ej. SIS, Fiscalía, Comité de Ética" required>
                                @error('committee_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Fecha -->
                            <div>
                                <label for="date" class="block text-sm font-medium text-slate-700">Fecha del Acuerdo <span class="text-red-500">*</span></label>
                                <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('date', isset($declaracion_comite) ? $declaracion_comite->date->format('Y-m-d') : date('Y-m-d')) }}" required>
                                @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Título -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-slate-700">Título / Nombre del Acuerdo <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('title', $declaracion_comite->title ?? '') }}" required>
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-slate-700">Descripción Breve (Opcional)</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50">{{ old('description', $declaracion_comite->description ?? '') }}</textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- URL Externa -->
                            <div class="md:col-span-2">
                                <label for="external_url" class="block text-sm font-medium text-slate-700">URL Externa ("Ver Más") (Opcional)</label>
                                <input type="url" name="external_url" id="external_url" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('external_url', $declaracion_comite->external_url ?? '') }}" placeholder="https://...">
                                @error('external_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Archivo PDF -->
                            <div class="md:col-span-2">
                                <label for="file" class="block text-sm font-medium text-slate-700">Documento PDF (Opcional)</label>
                                <input type="file" name="file" id="file" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#246257]/10 file:text-[#246257] hover:file:bg-[#246257]/20 transition-colors" accept=".pdf">
                                <p class="text-xs text-slate-500 mt-1">Sube el documento del acuerdo firmado en formato PDF (Máx. 5MB). @isset($declaracion_comite) @if($declaracion_comite->file_path) (Actualmente hay un archivo guardado, subir uno nuevo lo reemplazará) @endif @endisset</p>
                                @error('file') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ route('admin.declaraciones_comite.index') }}" class="text-slate-500 hover:text-slate-700 font-medium mr-4">Cancelar</a>
                            <button type="submit" class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-md">
                                {{ isset($declaracion_comite) ? 'Actualizar Acuerdo' : 'Guardar Acuerdo' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
