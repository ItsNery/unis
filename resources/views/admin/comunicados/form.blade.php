<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($comunicado) ? __('Editar Comunicado Oficial') : __('Publicar Nuevo Comunicado Oficial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form method="POST" action="{{ isset($comunicado) ? route('admin.comunicados.update', $comunicado->id) : route('admin.comunicados.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($comunicado))
                        @method('PUT')
                    @endif

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título del Comunicado</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('title', $comunicado->title ?? '') }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Resumen / Extracto</label>
                        <textarea name="summary" id="summary" rows="5" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('summary', $comunicado->summary ?? '') }}</textarea>
                        @error('summary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Publicación</label>
                            <input type="date" name="published_at" id="published_at" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('published_at', isset($comunicado) && $comunicado->published_at ? $comunicado->published_at->format('Y-m-d') : '') }}">
                            @error('published_at')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo PDF del Comunicado</label>
                            <input type="file" name="file" id="file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                            @isset($comunicado)
                                @if($comunicado->file_path)
                                    <p class="text-xs text-gray-500 mt-1">Archivo actual: {{ basename($comunicado->file_path) }}</p>
                                @endif
                            @endisset
                            @error('file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen Ilustrativa / Banner (Opcional)</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                        @isset($comunicado)
                            @if($comunicado->image_path)
                                <p class="text-xs text-gray-500 mt-1">Imagen actual: {{ basename($comunicado->image_path) }}</p>
                            @endif
                        @endisset
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 rounded border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-500" {{ old('is_active', $comunicado->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Publicar inmediatamente (Activo)</label>
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.comunicados.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancelar</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            {{ isset($comunicado) ? 'Actualizar Comunicado' : 'Publicar Comunicado' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
