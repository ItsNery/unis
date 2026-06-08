<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ isset($member) ? __('Editar Miembro del Organigrama') : __('Crear Nuevo Miembro del Organigrama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    
                    <form action="{{ isset($member) ? route('admin.miembros_organizacion.update', $member->id) : route('admin.miembros_organizacion.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($member))
                            @method('PUT')
                        @endif
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700">Nombre Completo <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('name', $member->name ?? '') }}" required>
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Cargo -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-700">Cargo Oficial <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('title', $member->title ?? '') }}" required>
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Área -->
                            <div>
                                <label for="area" class="block text-sm font-medium text-slate-700">Área o Departamento (Opcional)</label>
                                <input type="text" name="area" id="area" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('area', $member->area ?? '') }}">
                                @error('area') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700">Teléfono (Opcional)</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('phone', $member->phone ?? '') }}">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Orden -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-slate-700">Orden de aparición</label>
                                <input type="number" name="order" id="order" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" value="{{ old('order', $member->order ?? 0) }}">
                                @error('order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Frase destacada -->
                            <div class="md:col-span-2">
                                <label for="phrase" class="block text-sm font-medium text-slate-700">Frase destacada (Opcional)</label>
                                <textarea name="phrase" id="phrase" rows="2" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50" placeholder="Ej. La igualdad sustantiva transforma vidas">{{ old('phrase', $member->phrase ?? '') }}</textarea>
                                @error('phrase') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-slate-700">Descripción / Funciones (Opcional)</label>
                                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50">{{ old('description', $member->description ?? '') }}</textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Fotografía -->
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-slate-700">Fotografía (Opcional)</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#246257]/10 file:text-[#246257] hover:file:bg-[#246257]/20 transition-colors" accept="image/*">
                                @isset($member)
                                    @if($member->image_path)
                                        <p class="text-xs text-slate-500 mt-1">Sube una nueva imagen solo si deseas reemplazar la actual.</p>
                                    @endif
                                @endisset
                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Es Titular -->
                            <div class="md:col-span-2">
                                <div class="flex items-start mt-4 p-4 bg-amber-50 rounded-xl border border-amber-200">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="is_titular" id="is_titular" value="1" class="rounded border-amber-300 text-[#c79b66] shadow-sm focus:border-[#c79b66] focus:ring focus:ring-[#c79b66] focus:ring-opacity-50" {{ old('is_titular', $member->is_titular ?? false) ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="is_titular" class="font-bold text-amber-900">¿Es la Titular General?</label>
                                        <p class="text-amber-700">Márcalo si esta persona es la Titular de la Unidad. Aparecerá en la parte superior del organigrama (solo debe haber una titular por lo general).</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ route('admin.miembros_organizacion.index') }}" class="text-slate-500 hover:text-slate-700 font-medium mr-4">Cancelar</a>
                            <button type="submit" class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-md">
                                {{ isset($member) ? 'Actualizar Miembro' : 'Guardar Miembro' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
