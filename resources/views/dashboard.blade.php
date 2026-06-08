<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard UnIS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Cards de Métricas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- Noticias -->
                <a href="{{ route('admin.noticias.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Noticias</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $noticiasCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#861e34]/10 dark:bg-[#861e34]/30 text-[#861e34] rounded-lg border border-[#861e34]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v8a2 2 0 01-2 2h-3" />
                        </svg>
                    </div>
                </a>

                <!-- Eventos -->
                <a href="{{ route('admin.eventos.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Eventos</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $eventsCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#246257]/10 dark:bg-[#246257]/30 text-[#246257] rounded-lg border border-[#246257]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </a>

                <!-- Comunicados -->
                <a href="{{ route('admin.comunicados.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Comunicados</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $comunicadosCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#5c1d91]/10 dark:bg-[#5c1d91]/30 text-[#5c1d91] rounded-lg border border-[#5c1d91]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                </a>

                <!-- Pronunciamientos -->
                <a href="{{ route('admin.pronunciamientos.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Posturas</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $pronunciamientosCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#c79b66]/10 dark:bg-[#c79b66]/30 text-[#c79b66] rounded-lg border border-[#c79b66]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                </a>

                <!-- Transparencia -->
                <a href="{{ route('admin.documentos_transparencia.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Transparencia</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $transparencyCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#5f1b2d]/10 dark:bg-[#5f1b2d]/30 text-[#5f1b2d] rounded-lg border border-[#5f1b2d]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </a>

                <!-- Quejas / Denuncias -->
                <a href="{{ route('admin.denuncias.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Buzón</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $denunciasCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#af1731]/10 dark:bg-[#af1731]/30 text-[#af1731] rounded-lg border border-[#af1731]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </a>

                <!-- Contacto -->
                <a href="{{ route('admin.contacto.index') }}" class="block bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-widest font-semibold">Contacto</p>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $contactoCount }}</h3>
                    </div>
                    <div class="p-3 bg-[#609b84]/10 dark:bg-[#609b84]/30 text-[#609b84] rounded-lg border border-[#609b84]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Accesos rápidos / Listas Recientes -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recientes Noticias -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Noticias Recientes</h4>
                        <a href="{{ route('admin.noticias.create') }}" class="text-xs text-[#861e34] hover:underline font-semibold">+ Nueva Noticia</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentNoticia as $item)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->title }}</h5>
                                    <p class="text-xs text-gray-500">{{ $item->created_at->format('d/m/Y') }}</p>
                                </div>
                                <a href="{{ route('admin.noticias.edit', $item) }}" class="text-xs text-gray-400 hover:text-gray-200">Editar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay registros aún.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Eventos -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Eventos Recientes</h4>
                        <a href="{{ route('admin.eventos.create') }}" class="text-xs text-[#246257] hover:underline font-semibold">+ Nuevo Evento</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentEvents as $event)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $event->title }}</h5>
                                    <p class="text-xs text-gray-500">{{ $event->event_date->format('d/m/Y H:i') }} hrs</p>
                                </div>
                                <a href="{{ route('admin.eventos.edit', $event) }}" class="text-xs text-gray-400 hover:text-gray-200">Editar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay registros aún.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Comunicados -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 font-sans">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Comunicados Recientes</h4>
                        <a href="{{ route('admin.comunicados.create') }}" class="text-xs text-[#5c1d91] hover:underline font-semibold">+ Nuevo Comunicado</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentComunicados as $comm)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $comm->title }}</h5>
                                    <p class="text-xs text-gray-500">{{ $comm->created_at->format('d/m/Y') }}</p>
                                </div>
                                <a href="{{ route('admin.comunicados.edit', $comm) }}" class="text-xs text-gray-400 hover:text-gray-200">Editar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay registros aún.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Pronunciamientos -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 font-sans">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Pronunciamientos Recientes</h4>
                        <a href="{{ route('admin.pronunciamientos.create') }}" class="text-xs text-[#c79b66] hover:underline font-semibold">+ Nuevo Pronunciamiento</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentPronunciamientos as $item)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->title }}</h5>
                                    <p class="text-xs text-gray-500">{{ $item->author_name }} - {{ $item->created_at->format('d/m/Y') }}</p>
                                </div>
                                <a href="{{ route('admin.pronunciamientos.edit', $item) }}" class="text-xs text-gray-400 hover:text-gray-200">Editar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay registros aún.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Documentos de Transparencia -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 font-sans">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Documentos Recientes</h4>
                        <a href="{{ route('admin.documentos_transparencia.create') }}" class="text-xs text-[#5f1b2d] hover:underline font-semibold">+ Subir Documento</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentTransparency as $doc)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $doc->title }}</h5>
                                    <p class="text-xs text-gray-500">{{ $doc->category }} - {{ $doc->created_at->format('d/m/Y') }}</p>
                                </div>
                                <a href="{{ route('admin.documentos_transparencia.edit', $doc) }}" class="text-xs text-gray-400 hover:text-gray-200">Editar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay registros aún.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Denuncias / Quejas -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 font-sans">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Denuncias del Buzón</h4>
                        <span class="text-xs text-[#af1731] font-semibold">Confidenciales</span>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentDenuncias as $comp)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100 flex items-center space-x-1.5">
                                        <span class="font-bold text-indigo-500">{{ $comp->ticket_number }}</span>
                                        <span class="text-xs font-light text-gray-500">- {{ $comp->status }}</span>
                                    </h5>
                                    <p class="text-xs text-gray-500 truncate max-w-xs">{{ $comp->subject }}</p>
                                </div>
                                <a href="{{ route('admin.denuncias.edit', $comp) }}" class="text-xs text-gray-400 hover:text-gray-200">Revisar</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">Buzón vacío por el momento.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recientes Mensajes de Contacto -->
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 font-sans">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-gray-200">Mensajes de Contacto</h4>
                        <a href="{{ route('admin.contacto.index') }}" class="text-xs text-[#609b84] hover:underline font-semibold">Ver todos</a>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentContacto as $msg)
                            <div class="py-3 flex items-center justify-between">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100 flex items-center space-x-1.5">
                                        <span>{{ $msg->name }}</span>
                                        @if(!$msg->is_read)
                                            <span class="w-2 h-2 rounded-full bg-amber-500 inline-block"></span>
                                        @endif
                                    </h5>
                                    <p class="text-xs text-gray-500 truncate max-w-xs">{{ $msg->subject }}</p>
                                </div>
                                <a href="{{ route('admin.contacto.show', $msg) }}" class="text-xs text-gray-400 hover:text-gray-200">Ver</a>
                            </div>
                        @empty
                            <p class="py-4 text-sm text-gray-500 text-center">No hay mensajes de contacto.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
