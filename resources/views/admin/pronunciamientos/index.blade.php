<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de Pronunciamientos e Informes') }}
            </h2>
            <a href="{{ route('admin.pronunciamientos.create') }}" class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-xs uppercase tracking-wider transition-colors shadow-sm">
                + Nuevo Pronunciamiento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-left text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-700 text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Funcionario</th>
                                    <th class="px-6 py-3 font-semibold">Título / Postura</th>
                                    <th class="px-6 py-3 font-semibold">Estado</th>
                                    <th class="px-6 py-3 font-semibold">Fecha Publicación</th>
                                    <th class="px-6 py-3 font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($pronunciamientos as $item)
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-8 h-8 rounded-full overflow-hidden bg-slate-100 border border-slate-200">
                                                    @if($item->author_image)
                                                        <img src="{{ asset('storage/' . $item->author_image) }}" alt="{{ $item->author_name }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center bg-indigo-50 text-indigo-700 font-bold text-xs uppercase">
                                                            {{ substr($item->author_name, 0, 2) }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="block text-sm font-semibold">{{ $item->author_name }}</span>
                                                    <span class="block text-[10px] text-gray-400 font-medium uppercase tracking-wider">{{ $item->author_title }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs truncate text-gray-600 dark:text-gray-300">
                                            {{ $item->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' }}">
                                                {{ $item->is_active ? 'Activo' : 'Borrador' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                            {{ $item->published_at ? $item->published_at->format('d/m/Y') : 'Sin fecha' }}
                                        </td>
                                        <td class="px-6 py-4 flex items-center space-x-4">
                                            <a href="{{ route('admin.pronunciamientos.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">Editar</a>
                                            
                                            <form action="{{ route('admin.pronunciamientos.destroy', $item->id) }}" method="POST" class="inline-block" x-data @submit.prevent="
                                                Swal.fire({
                                                    title: '¿Estás seguro?',
                                                    text: 'Este pronunciamiento se eliminará permanentemente.',
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
                                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400 font-light">
                                            No hay pronunciamientos de funcionarios registrados aún.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $pronunciamientos->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
