<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <!-- Grupo: Publicaciones -->
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full h-16 {{ request()->routeIs('admin.noticias.*') || request()->routeIs('admin.eventos.*') || request()->routeIs('admin.comunicados.*') || request()->routeIs('admin.pronunciamientos.*') ? 'border-[#c79b66] text-[#861e34] dark:text-gray-100' : '' }}">
                                    <div>Publicaciones</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.noticias.index')">{{ __('Noticias') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.eventos.index')">{{ __('Eventos') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.comunicados.index')">{{ __('Comunicados') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.pronunciamientos.index')">{{ __('Pronunciamientos') }}</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Grupo: Transparencia y Contacto -->
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full h-16 {{ request()->routeIs('admin.documentos_transparencia.*') || request()->routeIs('admin.denuncias.*') ? 'border-[#c79b66] text-[#861e34] dark:text-gray-100' : '' }}">
                                    <div>Institucional</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.documentos_transparencia.index')">{{ __('Transparencia') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.denuncias.index')">{{ __('Buzón Denuncias') }}</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    
                    <!-- Grupo: Página Principal -->
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full h-16 {{ request()->routeIs('admin.banners.*') || request()->routeIs('admin.miembros_organizacion.*') || request()->routeIs('admin.metricas.*') || request()->routeIs('admin.declaraciones_comite.*') || request()->routeIs('admin.efemerides.*') ? 'border-[#c79b66] text-[#861e34] dark:text-gray-100' : '' }}">
                                    <div>Página Web</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.banners.index')">{{ __('Inicio (Banners)') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.miembros_organizacion.index')">{{ __('Identidad (Organigrama)') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.metricas.index')">{{ __('Métricas (Líneas)') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.declaraciones_comite.index')">{{ __('Comités (Líneas)') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.efemerides.index')">{{ __('Efemérides (Calendario)') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('admin.settings.edit')">{{ __('Configuración General') }}</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown and Dark Mode -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition-colors">
                    <!-- Sun icon for light mode -->
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon icon for dark mode -->
                    <svg x-show="darkMode" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                Publicaciones
            </div>
            <x-responsive-nav-link :href="route('admin.noticias.index')" :active="request()->routeIs('admin.noticias.*')">
                {{ __('Noticias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.eventos.index')" :active="request()->routeIs('admin.eventos.*')">
                {{ __('Eventos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.comunicados.index')" :active="request()->routeIs('admin.comunicados.*')">
                {{ __('Comunicados') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.pronunciamientos.index')" :active="request()->routeIs('admin.pronunciamientos.*')">
                {{ __('Pronunciamientos') }}
            </x-responsive-nav-link>

            <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                Institucional
            </div>
            <x-responsive-nav-link :href="route('admin.documentos_transparencia.index')" :active="request()->routeIs('admin.documentos_transparencia.*')">
                {{ __('Transparencia') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.denuncias.index')" :active="request()->routeIs('admin.denuncias.*')">
                {{ __('Buzón Denuncias') }}
            </x-responsive-nav-link>
            
            <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
            <div class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                Página Web
            </div>
            
            <x-responsive-nav-link :href="route('admin.banners.index')" :active="request()->routeIs('admin.banners.*')">
                {{ __('Inicio (Banners)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.miembros_organizacion.index')" :active="request()->routeIs('admin.miembros_organizacion.*')">
                {{ __('Identidad (Organigrama)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.metricas.index')" :active="request()->routeIs('admin.metricas.*')">
                {{ __('Métricas (Líneas)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.declaraciones_comite.index')" :active="request()->routeIs('admin.declaraciones_comite.*')">
                {{ __('Comités (Líneas)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.efemerides.index')" :active="request()->routeIs('admin.efemerides.*')">
                {{ __('Efemérides (Calendario)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.settings.edit')" :active="request()->routeIs('admin.settings.edit')">
                {{ __('Configuración General') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Dark Mode & Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <!-- Dark mode toggle for mobile -->
            <div class="px-4 py-3 flex items-center justify-between">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Modo Oscuro</span>
                <button @click="darkMode = !darkMode" class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors focus:outline-none" :class="darkMode ? 'bg-[#861e34]' : 'bg-gray-200'">
                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform" :class="darkMode ? 'translate-x-6' : 'translate-x-1'"></span>
                </button>
            </div>
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
