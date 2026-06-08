<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de Comunicados Oficiales') }}
            </h2>
            <a href="{{ route('admin.comunicados.create') }}" class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-xs uppercase tracking-wider transition-colors shadow-sm">
                + Nuevo Comunicado
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
                                    <th class="px-6 py-3 font-semibold">Título</th>
                                    <th class="px-6 py-3 font-semibold">Documento PDF</th>
                                    <th class="px-6 py-3 font-semibold">Fecha Publicación</th>
                                    <th class="px-6 py-3 font-semibold">Estado</th>
                                    <th class="px-6 py-3 font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($comunicados as $comm)
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 max-w-xs truncate">
                                            {{ $comm->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($comm->file_path)
                                                <a href="{{ asset('storage/' . $comm->file_path) }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:underline flex items-center space-x-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <span>Descargar PDF</span>
                                                </a>
                                            @else
                                                <span class="text-gray-500 text-xs">Sin archivo</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                            {{ $comm->published_at ? $comm->published_at->format('d/m/Y') : 'Sin fecha' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $comm->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' }}">
                                                {{ $comm->is_active ? 'Activo' : 'Borrador' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex items-center space-x-4">
                                            <a href="{{ route('admin.comunicados.edit', $comm) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">Editar</a>
                                            
                                            <form action="{{ route('admin.comunicados.destroy', $comm->id) }}" method="POST" class="inline-block" x-data @submit.prevent="
                                                Swal.fire({
                                                    title: '¿Estás seguro?',
                                                    text: 'Este comunicado se eliminará permanentemente.',
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
                                            No hay comunicados oficiales publicados aún.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $comunicados->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
