<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Mensaje de Contacto') }}
            </h2>
            <a href="{{ route('admin.contacto.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-xl text-sm transition-colors">
                ← Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-slate-200">
                        <div>
                            <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Nombre</span>
                            <p class="text-sm font-semibold text-slate-900 mt-1">{{ $message->name }}</p>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Correo</span>
                            <p class="text-sm font-semibold text-slate-900 mt-1">
                                <a href="mailto:{{ $message->email }}" class="text-[#246257] hover:underline">{{ $message->email }}</a>
                            </p>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Asunto</span>
                            <p class="text-sm font-semibold text-slate-900 mt-1">{{ $message->subject }}</p>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Recibido</span>
                            <p class="text-sm font-semibold text-slate-900 mt-1">{{ $message->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>

                    <div>
                        <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Mensaje</span>
                        <div class="mt-2 p-5 bg-slate-50 rounded-2xl border border-slate-200">
                            <p class="text-sm text-slate-700 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-slate-200">
                        <div class="flex items-center space-x-2 text-xs text-slate-400">
                            @if($message->is_read)
                                <span class="text-green-600 font-medium">✓ Leído</span>
                            @else
                                <span class="text-amber-500 font-medium">● No leído</span>
                            @endif
                        </div>
                        <form action="{{ route('admin.contacto.destroy', $message->id) }}" method="POST" x-data @submit.prevent="
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: 'Este mensaje se eliminará permanentemente.',
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
                            <button type="submit" class="px-4 py-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 text-xs font-bold uppercase tracking-wider transition-colors">
                                Eliminar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
