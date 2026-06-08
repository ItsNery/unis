<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($evento) ? __('Editar Evento') : __('Nuevo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form method="POST" action="{{ isset($evento) ? route('admin.eventos.update', $evento->id) : route('admin.eventos.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($evento))
                        @method('PUT')
                    @endif

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título del Evento</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('title', $evento->title ?? '') }}" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción / Detalles</label>
                        <textarea name="description" id="description" rows="6" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('description', $evento->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="event_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora del Evento</label>
                            <input type="datetime-local" name="event_date" id="event_date" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('event_date', isset($evento) && $evento->event_date ? $evento->event_date->format('Y-m-d\TH:i') : '') }}" required>
                            @error('event_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lugar o Ubicación (Física o En Línea)</label>
                            <input type="text" name="location" id="location" placeholder="e.g. Auditorio Principal / Zoom" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('location', $evento->location ?? '') }}">
                            @error('location')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="external_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enlace Externo (Registro / Transmisión)</label>
                            <input type="url" name="external_link" id="external_link" placeholder="https://..." class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('external_link', $evento->external_link ?? '') }}">
                            @error('external_link')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen Promocional (Opcional)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                            @isset($evento)
                                @if($evento->image_path)
                                    <p class="text-xs text-gray-500 mt-1">Imagen actual: {{ basename($evento->image_path) }}</p>
                                @endif
                            @endisset
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 rounded border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-500" {{ old('is_active', $evento->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Publicar inmediatamente (Activo)</label>
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.eventos.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancelar</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            {{ isset($evento) ? 'Actualizar Evento' : 'Programar Evento' }}
                        </button>
                    </div>
                </form>

            </div>

            @isset($evento)
            <!-- Sección de Galería del Evento -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-4">Galería de Imágenes del Evento</h3>
                    <p class="text-sm text-slate-500 mb-6">Sube fotos relacionadas a este evento. Serán visibles en la galería de la vista pública.</p>

                    <!-- Zona de Subida (Alpine.js) -->
                    <div x-data="galleryUploader({{ $evento->id }})" class="space-y-6">
                        
                        <!-- Drag & Drop Area -->
                        <div 
                            @dragover.prevent="dragover = true"
                            @dragleave.prevent="dragover = false"
                            @drop.prevent="handleDrop($event)"
                            :class="dragover ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900/30' : 'border-gray-300 dark:border-gray-700'"
                            class="border-2 border-dashed rounded-xl p-10 text-center transition-colors relative"
                        >
                            <input type="file" multiple accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="handleFiles($event)">
                            <div class="text-indigo-600 dark:text-indigo-400 mb-2">
                                <svg class="mx-auto h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span class="font-medium text-indigo-600 dark:text-indigo-400">Haz clic para subir</span> o arrastra y suelta
                            </p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF hasta 5MB</p>
                        </div>

                        <!-- Estado de subida -->
                        <div x-show="uploading" class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700" style="display: none;">
                            <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-300" :style="`width: ${progress}%`"></div>
                        </div>

                        <!-- Grid de Galería -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <template x-for="image in images" :key="image.id">
                                <div class="relative group rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 aspect-square">
                                    <img :src="image.path" class="w-full h-full object-cover transition-transform group-hover:scale-105" alt="Galería">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <button @click.prevent="deleteImage(image.id)" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transform transition-transform hover:scale-110">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Script de Alpine para Galería -->
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('galleryUploader', (eventoId) => ({
                        dragover: false,
                        uploading: false,
                        progress: 0,
                        images: @json($evento->galeria->map(function($img) {
                            return ['id' => $img->id, 'path' => asset('storage/' . $img->image_path)];
                        })->values() ?? []),
                        
                        handleFiles(event) {
                            const files = event.target.files;
                            this.uploadFiles(files);
                        },
                        
                        handleDrop(event) {
                            this.dragover = false;
                            const files = event.dataTransfer.files;
                            this.uploadFiles(files);
                        },

                        async uploadFiles(files) {
                            if (!files.length) return;
                            
                            this.uploading = true;
                            this.progress = 10;
                            
                            const url = `{{ url('admin/eventos') }}/${eventoId}/gallery`;
                            
                            for (let i = 0; i < files.length; i++) {
                                const formData = new FormData();
                                formData.append('file', files[i]);
                                formData.append('_token', '{{ csrf_token() }}');

                                try {
                                    const response = await fetch(url, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'Accept': 'application/json'
                                        }
                                    });

                                    if (response.ok) {
                                        const data = await response.json();
                                        if (data.success) {
                                            this.images.push({
                                                id: data.id,
                                                path: data.path
                                            });
                                        }
                                    } else {
                                        console.error('Error uploading file');
                                    }
                                } catch (error) {
                                    console.error('Error:', error);
                                }
                                
                                this.progress = 10 + ((i + 1) / files.length) * 90;
                            }
                            
                            setTimeout(() => {
                                this.uploading = false;
                                this.progress = 0;
                            }, 500);
                        },

                        async deleteImage(imageId) {
                            if (!confirm('¿Estás seguro de eliminar esta imagen de la galería?')) return;

                            const url = `{{ url('admin/eventos/gallery') }}/${imageId}`;
                            
                            try {
                                const response = await fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                });

                                if (response.ok) {
                                    this.images = this.images.filter(img => img.id !== imageId);
                                }
                            } catch (error) {
                                console.error('Error:', error);
                            }
                        }
                    }));
                });
            </script>
            @endisset

        </div>
    </div>
</x-app-layout>
