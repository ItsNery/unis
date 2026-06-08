<section id="contacto"
    class="stack-panel min-h-[80vh] w-full flex flex-col justify-between px-6 pt-20 pb-0 bg-[#fafaf9] relative overflow-hidden">
    <div class="max-w-6xl w-full mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 z-10 mb-20">

        <!-- Información de Contacto -->
        <div class="col-span-1 md:col-span-5 space-y-8 text-left gsap-fade-in">
            <div class="space-y-3">
                <span class="text-base uppercase tracking-[0.3em] font-bold text-[#246257]">
                    Canales de
                    Atención
                </span>
                <h2 class="text-3xl font-bold font-serif text-slate-900">
                    Contacto
                </h2>
                <p class="text-slate-600 text-base font-light max-w-sm leading-relaxed">
                    Estamos a tu disposición para asesoramiento y recepción de solicitudes de igualdad
                    sustantiva. Comunícate mediante nuestros canales.
                </p>
            </div>

            <div class="space-y-6">
                <!-- Correo -->
                <div class="flex items-start space-x-4">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center bg-slate-50 border border-slate-200 text-[#5f1b2d]">
                        <i class="fa-regular fa-envelope h-5 w-5"></i>
                    </div>
                    <div class="space-y-0.5">
                        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-bold block">
                            Correo
                            Electrónico
                        </span>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'uis.spf@puebla.gob.mx' }}"
                            class="text-sm font-semibold text-[#5f1b2d] hover:text-[#861e34] transition-colors">
                            {{ $settings['contact_email'] ?? 'uis.spf@puebla.gob.mx' }}
                        </a>
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="flex items-start space-x-4">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center bg-slate-50 border border-slate-200 text-[#5f1b2d]">
                        <i class="fa-solid fa-phone h-5 w-5"></i>
                    </div>
                    <div class="space-y-0.5">
                        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-bold block">
                            Teléfono
                        </span>
                        <a href="tel:{{ $settings['contact_phone'] ?? '2221234567' }}"
                            class="text-sm font-semibold text-[#5f1b2d] hover:text-[#861e34] transition-colors">
                            {{ $settings['contact_phone'] ?? '222-123-4567' }}
                        </a>
                    </div>
                </div>

                <!-- Dirección -->
                <div class="flex items-start space-x-4">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center bg-slate-50 border border-slate-200 text-[#5f1b2d]">
                        <i class="fa-solid fa-map-pin h-5 w-5"></i>
                    </div>
                    <div class="space-y-0.5">
                        <span class="text-[9px] uppercase tracking-widest text-slate-400 font-bold block">
                            Dirección
                            Física
                        </span>
                        <span class="text-sm text-slate-700 font-light block leading-relaxed">
                            {{ $settings['contact_address'] ?? 'Av. Reforma 711, Centro Histórico, 72000 Puebla, Pue.' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de Contacto General -->
        <div
            class="col-span-1 md:col-span-7 bg-slate-50 border border-slate-200 rounded-3xl p-8 md:p-10 relative overflow-hidden gsap-fade-in shadow-sm">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-bold font-serif text-[#5f1b2d]">
                        Envíanos un Mensaje
                    </h3>
                    <p class="text-base text-slate-500 font-light mt-1">
                        Si deseas solicitar información institucional o realizar consultas sobre algún tema.
                    </p>
                </div>

                @if (session('contact_success'))
                    <div class="bg-emerald-50 border-2 border-emerald-500 rounded-2xl p-5 space-y-2 text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                            <i class="fa-regular fa-circle-check h-5 w-5"></i>
                        </div>
                        <p class="text-xs text-emerald-800 font-medium">{{ session('contact_success') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('contacto.store') }}"
                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    <div class="space-y-1">
                        <label for="contact_name" class="text-sm uppercase tracking-widest text-slate-500 font-bold">
                            Nombre completo
                        </label>
                        <input type="text" name="name" id="contact_name" value="{{ old('name') }}" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400 @error('name') border-red-400 @enderror"
                            placeholder="Escribe tu nombre">
                        @error('name')
                            <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="contact_email" class="text-sm uppercase tracking-widest text-slate-500 font-bold">
                            Correo electrónico
                        </label>
                        <input type="email" name="email" id="contact_email" value="{{ old('email') }}" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400 @error('email') border-red-400 @enderror"
                            placeholder="ejemplo@correo.com">
                        @error('email')
                            <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1 sm:col-span-2 space-y-1">
                        <label for="contact_subject" class="text-sm uppercase tracking-widest text-slate-500 font-bold">
                            Asunto
                        </label>
                        <input type="text" name="subject" id="contact_subject" value="{{ old('subject') }}" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400 @error('subject') border-red-400 @enderror"
                            placeholder="Asunto de la consulta">
                        @error('subject')
                            <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1 sm:col-span-2 space-y-1">
                        <label for="contact_message" class="text-sm uppercase tracking-widest text-slate-500 font-bold">
                            Mensaje
                        </label>
                        <textarea name="message" id="contact_message" rows="4" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400 resize-none @error('message') border-red-400 @enderror"
                            placeholder="Describe tu solicitud o comentario...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 sm:col-span-2 pt-2">
                        <button type="submit"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-[#5f1b2d] to-[#861e34] text-xs font-bold uppercase tracking-wider text-white hover:opacity-90 transition-opacity border border-[#c79b66]/30 shadow-md">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div> <!-- Fin del grid container -->
</section> <!-- Fin de la sección contacto -->
