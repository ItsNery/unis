<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Efemérides (Calendario Cívico)') }}
            </h2>
            <a href="{{ route('admin.efemerides.create') }}" class="bg-[#246257] hover:bg-[#1a4b42] text-white font-bold py-2 px-4 rounded-xl text-sm transition-colors">
                + Nueva Efeméride
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-6 text-slate-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Título</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Color</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                @forelse($efemerides as $efemeride)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <span class="text-lg font-bold text-slate-800">{{ $efemeride->day }}</span>
                                                <span class="text-xs font-semibold text-slate-500 uppercase">{{ $efemeride->month }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-bold text-slate-900">{{ $efemeride->title }}</div>
                                            <div class="text-xs text-slate-500 line-clamp-1">{{ $efemeride->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $colorMap = [
                                                    'orange' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-600', 'label' => 'Naranja'],
                                                    'purple' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-600', 'label' => 'Morado'],
                                                    'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-600', 'label' => 'Rojo'],
                                                    'emerald' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-600', 'label' => 'Esmeralda'],
                                                    'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600', 'label' => 'Azul'],
                                                    'amber' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-600', 'label' => 'Ámbar'],
                                                    'pink' => ['bg' => 'bg-pink-100', 'text' => 'text-pink-600', 'label' => 'Rosa'],
                                                ];
                                                $current = $colorMap[$efemeride->color] ?? ['bg' => 'bg-slate-100', 'text' => 'text-slate-600', 'label' => $efemeride->color];
                                            @endphp
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $current['bg'] }} {{ $current['text'] }}">
                                                {{ $current['label'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($efemeride->is_active)
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                            @else
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-100 text-slate-800">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.efemerides.edit', $efemeride->id) }}" class="text-[#c79b66] hover:text-[#a07b4e] mr-3 font-bold transition-colors">Editar</a>
                                            <form action="{{ route('admin.efemerides.destroy', $efemeride->id) }}" method="POST" class="inline-block" x-data @submit.prevent="
                                                Swal.fire({
                                                    title: '¿Estás seguro?',
                                                    text: 'Esta efeméride se eliminará permanentemente.',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#ef4444',
                                                    cancelButtonColor: '#64748b',
                                                    confirmButtonText: 'Sí, eliminar',
                                                    cancelButtonText: 'Cancelar'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $el.submit();
                                                    }
                                                })
                                            ">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold transition-colors">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 text-sm">
                                            No hay efemérides registradas. Haz clic en "Nueva Efeméride" para crear una.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
