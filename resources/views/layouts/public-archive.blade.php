<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Archivo Oficial') - UnIS Puebla</title>
    <meta name="description" content="@yield('meta_description', 'Accede al archivo oficial de la Unidad de Igualdad Sustantiva del Estado de Puebla. Noticias, eventos, comunicados, pronunciamientos y documentos de transparencia.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Archivo Oficial') - UnIS Puebla">
    <meta property="og:description" content="@yield('meta_description', 'Accede al archivo oficial de la Unidad de Igualdad Sustantiva del Estado de Puebla.')">
    <meta property="og:image" content="{{ asset('img/logos/logo_uis_veda.png') }}">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="UnIS Puebla">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Archivo Oficial') - UnIS Puebla">
    <meta name="twitter:description" content="@yield('meta_description', 'Accede al archivo oficial de la Unidad de Igualdad Sustantiva del Estado de Puebla.')">
    <meta name="twitter:image" content="{{ asset('img/logos/logo_uis_veda.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- JSON-LD -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "GovernmentOrganization",
        "name": "Unidad de Igualdad Sustantiva",
        "alternateName": "UnIS",
        "url": "{{ url('/') }}",
        "parentOrganization": {
            "@type": "GovernmentOrganization",
            "name": "Secretaría de Planeación, Finanzas y Administración",
            "url": "https://spfa.puebla.gob.mx"
        }
    }
    </script>

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Widget de Accesibilidad Sienna -->
    <script src="https://accessibility-widget.pages.dev/widget.js" defer></script>
</head>

<body class="bg-[#fafaf9] text-slate-800 antialiased font-sans overflow-x-clip" x-data="{
    showModal: false,
    modalType: '',
    modalTitle: '',
    modalDate: '',
    modalContent: '',
    modalImage: '',
    modalExtra: '',
    openModal(type, title, date, content, image, extra = '') {
        this.modalType = type;
        this.modalTitle = title;
        this.modalDate = date;
        this.modalContent = content;
        this.modalImage = image;
        this.modalExtra = extra;
        this.showModal = true;
    }
}">

    <!-- PRELOADER PREMIUM -->
    <div id="preloader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-[#5f1b2d] text-white">
        <div class="preloader-content flex flex-col items-center space-y-6 text-center px-6">
            <div
                class="preloader-logo-wrap relative w-24 h-24 rounded-3xl bg-gradient-to-tr from-[#5f1b2d] via-[#861e34] to-[#246257] border-2 border-[#c79b66] shadow-2xl flex items-center justify-center overflow-hidden">
                <span class="font-serif font-bold text-white text-3xl tracking-widest">UnIS</span>
            </div>
            <div class="space-y-2 overflow-hidden">
                <h2
                    class="preloader-title text-lg md:text-xl font-bold font-serif text-[#c79b66] tracking-wide translate-y-full">
                    Unidad de Igualdad Sustantiva</h2>
                <p class="preloader-subtitle text-[10px] uppercase tracking-[0.3em] text-white/60 translate-y-full">
                    Gobierno del Estado de Puebla</p>
            </div>
            <div class="w-48 h-1 bg-white/10 rounded-full overflow-hidden relative mt-4">
                <div class="preloader-progress-bar absolute left-0 top-0 bottom-0 bg-[#c79b66] rounded-full w-0"></div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.welcome.nav')

    <!-- Background Glows -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
        <div class="bg-glow-purple top-10 left-10"></div>
        <div class="bg-glow-gold top-[120vh] right-10"></div>
        <div class="bg-glow-green top-[250vh] left-[20%]"></div>
        <div class="bg-glow-purple bottom-20 right-20"></div>
    </div>

    <!-- Contenido Principal -->
    <main class="relative z-10 min-h-[70vh] pt-32">
        @yield('content')
    </main>

    <!-- Footer Legal e Institucional -->
    <footer class="py-12 border-t border-slate-200 bg-slate-900 text-white relative z-10 mt-16 w-full font-sans">
        <div class="max-w-6xl w-full mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-slate-400 text-base">
            <div class="flex flex-col md:flex-row items-center gap-4 text-center md:text-left">
                <!-- Logo Footer Veda -->
                <img src="{{ asset('img/logos/logo_uis_veda.png') }}" onerror="this.style.display='none';" alt="UnIS"
                    class="h-9 w-auto object-contain">
                <div>
                    <span class="font-bold tracking-widest text-[#c79b66] font-serif block">UnIS Puebla</span>
                    <span class="text-xs text-slate-550">&copy; {{ date('Y') }} Todos los derechos
                        reservados.</span>
                </div>
            </div>
            <div class="flex flex-col items-center md:items-end text-center md:text-right gap-1">
                <span class="text-sm text-[#c79b66] uppercase tracking-widest font-bold">Secretaría de Planeación, Finanzas y Administración</span>
                <span class="text-xs text-slate-500 uppercase tracking-wider font-light">Unidad de Igualdad Sustantiva del Estado de Puebla</span>
            </div>
        </div>
    </footer>

    {{-- Modal global de detalles --}}
    @include('partials.welcome.modal')

    {{-- Botón de salida de pánico --}}
    @include('partials.welcome.panico')

    @stack('scripts')
</body>

</html>
