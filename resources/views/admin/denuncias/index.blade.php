<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buzón de Sugerencias y Denuncias (Confidencial)') }}
        </h2>
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
                                    <th class="px-6 py-3 font-semibold">Folio / Ticket</th>
                                    <th class="px-6 py-3 font-semibold">Asunto</th>
                                    <th class="px-6 py-3 font-semibold">Tipo</th>
                                    <th class="px-6 py-3 font-semibold">Estado</th>
                                    <th class="px-6 py-3 font-semibold">Fecha Reporte</th>
                                    <th class="px-6 py-3 font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($denuncias as $item)
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">
                                            {{ $item->ticket_number }}
                                        </td>
                                        <td class="px-6 py-4 max-w-xs truncate text-gray-900 dark:text-gray-100">
                                            {{ $item->subject }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($item->is_anonymous)
                                                <span class="px-2.5 py-1 text-xs rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400 font-medium">
                                                    Anónimo
                                                </span>
                                            @else
                                                <span class="px-2.5 py-1 text-xs rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 font-semibold" title="{{ $item->complainant_name }} ({{ $item->complainant_email }})">
                                                    Identificado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $statusColors = [
                                                    'Recibido' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300',
                                                    'En revisión' => 'bg-sky-100 text-sky-800 dark:bg-sky-900/30 dark:text-sky-300',
                                                    'Canalizado' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300',
                                                    'Resuelto' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                                    'Falso / Improcedente' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                                                ];
                                                $color = $statusColors[$item->status] ?? 'bg-slate-100 text-slate-800';
                                            @endphp
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $color }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                            {{ $item->created_at->format('d/m/Y H:i') }} hrs
                                        </td>
                                        <td class="px-6 py-4 flex items-center space-x-4">
                                            <a href="{{ route('admin.denuncias.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">Revisar e Investigar</a>
                                            
                                            <form action="{{ route('admin.denuncias.destroy', $item->id) }}" method="POST" class="inline-block" x-data @submit.prevent="
                                                Swal.fire({
                                                    title: '¿Estás seguro?',
                                                    text: 'Este registro se eliminará permanentemente.',
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
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400 font-light">
                                            No se han recibido quejas o denuncias en el buzón.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $denuncias->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
