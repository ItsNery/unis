<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ isset($banner) ? __('Editar Banner') : __('Crear Nuevo Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    
                    <form action="{{ isset($banner) ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($banner))
                            @method('PUT')
                        @endif
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Título -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-slate-700">Título</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('title', $banner->title ?? '') }}">
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Subtítulo -->
                            <div class="md:col-span-2">
                                <label for="subtitle" class="block text-sm font-medium text-slate-700">Subtítulo (Opcional)</label>
                                <input type="text" name="subtitle" id="subtitle" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('subtitle', $banner->subtitle ?? '') }}">
                                @error('subtitle') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-slate-700">Descripción (Opcional)</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50">{{ old('description', $banner->description ?? '') }}</textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Texto del Botón -->
                            <div>
                                <label for="button_text" class="block text-sm font-medium text-slate-700">Texto del Botón (Opcional)</label>
                                <input type="text" name="button_text" id="button_text" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('button_text', $banner->button_text ?? '') }}">
                                @error('button_text') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Enlace del Botón -->
                            <div>
                                <label for="button_link" class="block text-sm font-medium text-slate-700">Enlace del Botón (Opcional)</label>
                                <input type="url" name="button_link" id="button_link" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('button_link', $banner->button_link ?? '') }}" placeholder="https://...">
                                @error('button_link') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Imagen -->
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-slate-700">Imagen de Fondo <span class="text-red-500">{{ isset($banner) ? '' : '*' }}</span></label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#246257]/10 file:text-[#246257] hover:file:bg-[#246257]/20 transition-colors" accept="image/*" {{ isset($banner) ? '' : 'required' }}>
                                @isset($banner)
                                    <p class="text-xs text-slate-500 mt-1">Sube una nueva imagen solo si deseas reemplazar la actual.</p>
                                @endisset
                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Orden y Estado -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-slate-700">Orden de aparición</label>
                                <input type="number" name="order" id="order" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('order', $banner->order ?? 0) }}">
                                @error('order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex items-center mt-6">
                                <input type="checkbox" name="is_active" id="is_active" value="1" class="rounded border-slate-300 text-[#246257] shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-2 block text-sm text-slate-700">
                                    Activo (Mostrar en el inicio)
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ route('admin.banners.index') }}" class="text-slate-500 hover:text-slate-700 font-medium mr-4">Cancelar</a>
                            <button type="submit" class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-md">
                                {{ isset($banner) ? 'Actualizar Banner' : 'Guardar Banner' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
