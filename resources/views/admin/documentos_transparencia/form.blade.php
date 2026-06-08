<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($documento_transparencia) ? __('Editar Documento de Transparencia') : __('Cargar Nuevo Documento de Transparencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form method="POST" action="{{ isset($documento_transparencia) ? route('admin.documentos_transparencia.update', $documento_transparencia->id) : route('admin.documentos_transparencia.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($documento_transparencia))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría del Documento</label>
                            <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $documento_transparencia->category ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título o Nombre Oficial</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ej. Plan de Trabajo 2026" value="{{ old('title', $documento_transparencia->title ?? '') }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción / Propósito (Opcional)</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Breve explicación sobre lo que regula o informa este documento.">{{ old('description', $documento_transparencia->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Archivo PDF</label>
                            <input type="file" name="file" id="file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400" {{ isset($documento_transparencia) ? '' : 'required' }}>
                            <p class="text-xs text-gray-400 mt-1">Solo se permiten archivos en formato PDF (Max. 15MB).</p>
                            @error('file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Publicación</label>
                            <input type="date" name="published_at" id="published_at" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('published_at', isset($documento_transparencia) && $documento_transparencia->published_at ? $documento_transparencia->published_at->format('Y-m-d') : '') }}">
                            @error('published_at')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 rounded border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-500" {{ old('is_active', $documento_transparencia->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Publicar inmediatamente (Activo)</label>
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.documentos_transparencia.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancelar</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            {{ isset($documento_transparencia) ? 'Actualizar Documento' : 'Subir Documento' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
