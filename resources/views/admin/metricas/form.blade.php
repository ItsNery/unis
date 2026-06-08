<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ isset($metrica) ? __('Editar Métrica') : __('Crear Nueva Métrica') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    
                    <form action="{{ isset($metrica) ? route('admin.metricas.update', $metrica->id) : route('admin.metricas.store') }}" method="POST" class="space-y-6">
                        @csrf
                        @if(isset($metrica))
                            @method('PUT')
                        @endif
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Título -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-slate-700">Título / Nombre de la Métrica</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('title', $metrica->title ?? '') }}" required>
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Valor -->
                            <div>
                                <label for="value" class="block text-sm font-medium text-slate-700">Valor (ej. 1500+, 95%)</label>
                                <input type="text" name="value" id="value" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('value', $metrica->value ?? '') }}" required>
                                @error('value') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Icono (Opcional) -->
                            <div>
                                <label for="icon" class="block text-sm font-medium text-slate-700">Icono (SVG opcional)</label>
                                <input type="text" name="icon" id="icon" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('icon', $metrica->icon ?? '') }}">
                                @error('icon') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-slate-700">Descripción (Opcional)</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50">{{ old('description', $metrica->description ?? '') }}</textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Orden y Estado -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-slate-700">Orden de aparición</label>
                                <input type="number" name="order" id="order" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('order', $metrica->order ?? 0) }}">
                                @error('order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex items-center mt-6">
                                <input type="checkbox" name="is_active" id="is_active" value="1" class="rounded border-slate-300 text-[#246257] shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" {{ old('is_active', $metrica->is_active ?? true) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-2 block text-sm text-slate-700">
                                    Activo (Mostrar en la página)
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ route('admin.metricas.index') }}" class="text-slate-500 hover:text-slate-700 font-medium mr-4">Cancelar</a>
                            <button type="submit" class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-md">
                                {{ isset($metrica) ? 'Actualizar Métrica' : 'Guardar Métrica' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
