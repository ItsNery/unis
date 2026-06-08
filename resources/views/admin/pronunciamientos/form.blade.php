<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($pronunciamiento) ? __('Editar Pronunciamiento u Opinión') : __('Crear Nuevo Pronunciamiento u Opinión') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form method="POST" action="{{ isset($pronunciamiento) ? route('admin.pronunciamientos.update', $pronunciamiento->id) : route('admin.pronunciamientos.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($pronunciamiento))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="author_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del Funcionario / Autor</label>
                            <input type="text" name="author_name" id="author_name" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('author_name', $pronunciamiento->author_name ?? '') }}" required>
                            @error('author_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="author_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cargo u Oficina</label>
                            <input type="text" name="author_title" id="author_title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ej. Subsecretaria de Planeación" value="{{ old('author_title', $pronunciamiento->author_title ?? '') }}" required>
                            @error('author_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título del Posicionamiento</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ej. Compromiso total con la paridad de género" value="{{ old('title', $pronunciamiento->title ?? '') }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Extracto / Frase Destacada (Para vista rápida)</label>
                        <textarea name="excerpt" id="excerpt" rows="2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('excerpt', $pronunciamiento->excerpt ?? '') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Detalle / Desglose Completo</label>
                        <textarea name="content" id="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('content', $pronunciamiento->content ?? '') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Publicación</label>
                            <input type="datetime-local" name="published_at" id="published_at" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('published_at', isset($pronunciamiento) && $pronunciamiento->published_at ? $pronunciamiento->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto del Funcionario (Opcional)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                            @isset($pronunciamiento)
                                @if($pronunciamiento->image_path)
                                    <p class="text-xs text-gray-500 mt-1">Imagen actual: {{ basename($pronunciamiento->image_path) }}</p>
                                @endif
                            @endisset
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 rounded border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-500" {{ old('is_active', $pronunciamiento->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Publicar inmediatamente (Activo)</label>
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.pronunciamientos.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancelar</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            {{ isset($pronunciamiento) ? 'Actualizar Pronunciamiento' : 'Crear Pronunciamiento' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
