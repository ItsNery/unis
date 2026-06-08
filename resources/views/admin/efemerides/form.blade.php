<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ isset($efemeride) ? __('Editar Efeméride') : __('Crear Nueva Efeméride') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">

                    <form
                        action="{{ isset($efemeride) ? route('admin.efemerides.update', $efemeride->id) : route('admin.efemerides.store') }}"
                        method="POST" class="space-y-6">
                        @csrf
                        @if (isset($efemeride))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Día -->
                            <div>
                                <label for="day" class="block text-sm font-medium text-slate-700">Día</label>
                                <input type="number" min="1" max="31" name="day" id="day"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                    value="{{ old('day', $efemeride->day ?? '') }}" required>
                                @error('day')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Mes -->
                            <div>
                                <label for="month" class="block text-sm font-medium text-slate-700">Mes</label>
                                <select name="month" id="month"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                    required>
                                    @php $monthVal = old('month', $efemeride->month ?? ''); @endphp
                                    <option value="" disabled {{ empty($monthVal) ? 'selected' : '' }}>Selecciona
                                        un mes</option>
                                    <option value="Enero" {{ $monthVal == 'Enero' ? 'selected' : '' }}>Enero</option>
                                    <option value="Febrero" {{ $monthVal == 'Febrero' ? 'selected' : '' }}>Febrero
                                    </option>
                                    <option value="Marzo" {{ $monthVal == 'Marzo' ? 'selected' : '' }}>Marzo</option>
                                    <option value="Abril" {{ $monthVal == 'Abril' ? 'selected' : '' }}>Abril</option>
                                    <option value="Mayo" {{ $monthVal == 'Mayo' ? 'selected' : '' }}>Mayo</option>
                                    <option value="Junio" {{ $monthVal == 'Junio' ? 'selected' : '' }}>Junio</option>
                                    <option value="Julio" {{ $monthVal == 'Julio' ? 'selected' : '' }}>Julio</option>
                                    <option value="Agosto" {{ $monthVal == 'Agosto' ? 'selected' : '' }}>Agosto
                                    </option>
                                    <option value="Septiembre" {{ $monthVal == 'Septiembre' ? 'selected' : '' }}>
                                        Septiembre</option>
                                    <option value="Octubre" {{ $monthVal == 'Octubre' ? 'selected' : '' }}>Octubre
                                    </option>
                                    <option value="Noviembre" {{ $monthVal == 'Noviembre' ? 'selected' : '' }}>
                                        Noviembre</option>
                                    <option value="Diciembre" {{ $monthVal == 'Diciembre' ? 'selected' : '' }}>
                                        Diciembre</option>
                                </select>
                                @error('month')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Título -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-slate-700">Título de
                                    Efeméride <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                    value="{{ old('title', $efemeride->title ?? '') }}" required>
                                @error('title')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-slate-700">Descripción
                                    <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                    required>{{ old('description', $efemeride->description ?? '') }}</textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Color -->
                            <div>
                                <label for="color" class="block text-sm font-medium text-slate-700">Color Destacado
                                    <span class="text-red-500">*</span></label>
                                <select name="color" id="color"
                                    class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                    required>
                                    @php $colorVal = old('color', $efemeride->color ?? ''); @endphp
                                    <option value="orange" {{ $colorVal == 'orange' ? 'selected' : '' }}>Naranja
                                    </option>
                                    <option value="purple" {{ $colorVal == 'purple' ? 'selected' : '' }}>Morado
                                    </option>
                                    <option value="red" {{ $colorVal == 'red' ? 'selected' : '' }}>Rojo</option>
                                    <option value="emerald" {{ $colorVal == 'emerald' ? 'selected' : '' }}>Esmeralda
                                    </option>
                                    <option value="blue" {{ $colorVal == 'blue' ? 'selected' : '' }}>Azul</option>
                                    <option value="amber" {{ $colorVal == 'amber' ? 'selected' : '' }}>Ámbar</option>
                                    <option value="pink" {{ $colorVal == 'pink' ? 'selected' : '' }}>Rosa</option>
                                </select>
                                @error('color')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Activo -->
                            <div class="md:col-span-2 mt-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1"
                                        class="rounded border-slate-300 text-[#246257] shadow-sm focus:border-[#246257] focus:ring focus:ring-[#246257] focus:ring-opacity-50"
                                        {{ old('is_active', $efemeride->is_active ?? true) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-slate-600 font-medium">Efeméride visible en el sitio
                                        público</span>
                                </label>
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-slate-100 pt-6">
                            <a href="{{ route('admin.efemerides.index') }}"
                                class="text-slate-500 hover:text-slate-700 font-medium mr-4">Cancelar</a>
                            <button type="submit"
                                class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-md">
                                {{ isset($efemeride) ? 'Actualizar Efeméride' : 'Guardar Efeméride' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
