<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UnIS - Unidad de Igualdad Sustantiva | SPFA Puebla</title>
    <meta name="description"
        content="Sitio oficial de la Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración del Estado de Puebla. Información sobre igualdad de género, derechos humanos, transparencia y buzón de denuncias.">
    <meta name="keywords"
        content="UnIS, igualdad sustantiva, Puebla, SPFA, derechos humanos, género, equidad, gobierno, transparencia">
    <meta name="author" content="Unidad de Igualdad Sustantiva - SPFA Puebla">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="UnIS - Unidad de Igualdad Sustantiva | SPFA Puebla">
    <meta property="og:description"
        content="Sitio oficial de la Unidad de Igualdad Sustantiva. Información sobre igualdad de género, derechos humanos, transparencia y buzón de denuncias.">
    <meta property="og:image" content="{{ asset('img/logos/og-image.jpg') ?: asset('img/logos/logo_uis_veda.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_MX">
    <meta property="og:site_name" content="UnIS Puebla">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UnIS - Unidad de Igualdad Sustantiva | SPFA Puebla">
    <meta name="twitter:description"
        content="Sitio oficial de la Unidad de Igualdad Sustantiva. Información sobre igualdad de género, derechos humanos, transparencia y buzón de denuncias.">
    <meta name="twitter:image" content="{{ asset('img/logos/og-image.jpg') ?: asset('img/logos/logo_uis_veda.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "GovernmentOrganization",
        "name": "Unidad de Igualdad Sustantiva",
        "alternateName": "UnIS",
        "description": "Unidad administrativa de la Secretaría de Planeación, Finanzas y Administración del Estado de Puebla encargada de coordinar y evaluar las políticas de igualdad sustantiva y no discriminación.",
        "url": "{{ url('/') }}",
        "email": "{{ $settings['contact_email'] ?? 'contacto.unis@gob.mx' }}",
        "telephone": "{{ $settings['contact_phone'] ?? '55-1234-5678' }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $settings['contact_address'] ?? 'Av. Constituyentes 1000, Col. Centro' }}",
            "addressLocality": "Puebla",
            "addressRegion": "Puebla",
            "addressCountry": "MX"
        },
        "parentOrganization": {
            "@type": "GovernmentOrganization",
            "name": "Secretaría de Planeación, Finanzas y Administración",
            "url": "https://spfa.puebla.gob.mx"
        }
    }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

    @include('partials.welcome.nav')
    @include('partials.welcome.preloader')
    @include('partials.welcome.background-glows')

    {{-- Secciones apiladas con efecto de hojas --}}
    <div class="stack-container relative z-10">
        @include('partials.welcome.hero')
        @include('partials.welcome.actualidad')
        @include('partials.welcome.titular')
        @include('partials.welcome.identidad')
        @include('partials.welcome.que-hacemos')
        @include('partials.welcome.lineas-accion')
        @include('partials.welcome.pronunciamientos')
        @include('partials.welcome.transparencia')
        @include('partials.welcome.buzon')
        @include('partials.welcome.contacto')
        @include('partials.welcome.footer')
    </div>

    {{-- Modal global de detalles --}}
    @include('partials.welcome.modal')

    {{-- Botón de salida de pánico --}}
    @include('partials.welcome.panico')

    <!-- Widget de Accesibilidad Sienna -->
    <script src="https://cdn.jsdelivr.net/npm/sienna-accessibility/dist/sienna-accessibility.umd.js" defer></script>
</body>

</html>
