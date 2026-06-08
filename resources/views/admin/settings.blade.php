<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Configuración del Portal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Seccion Identidad -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Identidad Institucional</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="mission" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Misión</label>
                                <textarea name="mission" id="mission" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('mission', $settings['mission']) }}</textarea>
                            </div>
                            
                            <div>
                                <label for="vision" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Visión</label>
                                <textarea name="vision" id="vision" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('vision', $settings['vision']) }}</textarea>
                            </div>

                            <div>
                                <label for="values" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valores (Separados por coma)</label>
                                <textarea name="values" id="values" rows="2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('values', $settings['values']) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Seccion Que Hace, Quien la constituye y Competencias -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Competencias y Funciones (Pestaña 2)</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="what_we_do" class="block text-sm font-medium text-gray-700 dark:text-gray-300">¿Qué hace la UnIS?</label>
                                <textarea name="what_we_do" id="what_we_do" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('what_we_do', $settings['what_we_do']) }}</textarea>
                            </div>
                            
                            <div>
                                <label for="who_constitutes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">¿Quién la constituye?</label>
                                <textarea name="who_constitutes" id="who_constitutes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('who_constitutes', $settings['who_constitutes']) }}</textarea>
                            </div>

                            <div>
                                <label for="scopes_and_competencies" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Competencias y Alcances (Una función por línea)</label>
                                <textarea name="scopes_and_competencies" id="scopes_and_competencies" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('scopes_and_competencies', $settings['scopes_and_competencies']) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Seccion Contacto -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Información de Contacto</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico de Contacto</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                            
                            <div>
                                <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono de Contacto</label>
                                <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="contact_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección Física</label>
                            <textarea name="contact_address" id="contact_address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('contact_address', $settings['contact_address']) }}</textarea>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold text-sm shadow-sm transition-colors">
                            Guardar Cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
