<section id="buzon"
    class="stack-panel min-h-screen w-full flex flex-col justify-center px-6 py-20 bg-white bg-talavera relative overflow-hidden border-b border-slate-200">
    <div class="max-w-4xl w-full mx-auto z-10 space-y-12">

        <!-- Encabezado de la Sección -->
        <div class="max-w-2xl text-left space-y-3 gsap-fade-in mx-auto text-center">
            <span class="text-xs uppercase tracking-[0.4em] font-bold text-[#861e34]">
                Atención Segura
            </span>
            <h2 class="text-3xl md:text-4xl font-bold font-serif text-[#5f1b2d]">
                Buzón de Sugerencias y
                Denuncias
            </h2>
            <div class="w-16 h-1 bg-[#c79b66] mx-auto mt-2"></div>
            <p class="text-slate-600 text-base font-light leading-relaxed max-w-xl mx-auto mb-6">
                Un espacio seguro y estrictamente confidencial operado por la Unidad de Igualdad Sustantiva para
                manifestar tus propuestas o reportar malas conductas, discriminación u hostigamiento laboral.
            </p>
        </div>

        <!-- Guía de Proceso (Timeline Temporal) -->
        <div class="max-w-3xl mx-auto py-8">
            <div class="relative">
                <!-- Línea conectora -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-slate-200 -translate-y-1/2 z-0">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
                    <!-- Paso 1 -->
                    <div
                        class="bg-white border border-slate-200 p-6 rounded-3xl shadow-sm text-center space-y-3 relative hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-10 h-10 mx-auto bg-[#5f1b2d] text-white rounded-full flex items-center justify-center font-bold text-lg font-serif outline outline-4 outline-white">
                            1
                        </div>
                        <h4 class="font-bold text-base text-[#5f1b2d] uppercase tracking-wider">
                            Recepción
                        </h4>
                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                            Levantamiento de la queja de forma confidencial a través de nuestro buzón interno o el
                            portal estatal.
                        </p>
                    </div>
                    <!-- Paso 2 -->
                    <div
                        class="bg-white border border-slate-200 p-6 rounded-3xl shadow-sm text-center space-y-3 relative hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-10 h-10 mx-auto bg-[#861e34] text-white rounded-full flex items-center justify-center font-bold text-lg font-serif outline outline-4 outline-white">
                            2
                        </div>
                        <h4 class="font-bold text-base text-[#861e34] uppercase tracking-wider">
                            Análisis
                        </h4>
                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                            Evaluación imparcial de los hechos bajo estricta perspectiva de género y cero
                            discriminación.
                        </p>
                    </div>
                    <!-- Paso 3 -->
                    <div
                        class="bg-white border border-slate-200 p-6 rounded-3xl shadow-sm text-center space-y-3 relative hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-10 h-10 mx-auto bg-[#c79b66] text-white rounded-full flex items-center justify-center font-bold text-lg font-serif outline outline-4 outline-white">
                            3
                        </div>
                        <h4 class="font-bold text-base text-[#c79b66] uppercase tracking-wider">
                            Resolución
                        </h4>
                        <p class="text-sm text-slate-500 font-light leading-relaxed">
                            Emisión de recomendaciones técnicas y acompañamiento institucional continuo a la
                            víctima.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensajes de Respuesta / Success -->
        @if (session('complaint_success'))
            <div
                class="bg-emerald-50 dark:bg-emerald-950/20 border-2 border-emerald-500 rounded-3xl p-6 md:p-8 space-y-4 max-w-2xl mx-auto text-center shadow-lg relative">
                <div
                    class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mx-auto">
                    <i class="fa-regular fa-circle-check h-6 w-6"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="text-lg font-bold text-slate-800 font-serif">¡Reporte Enviado Exitosamente!</h3>
                    <p class="text-xs text-slate-600 leading-relaxed font-light">
                        {{ session('complaint_success') }}
                    </p>
                </div>
                <div
                    class="p-3 bg-white border border-emerald-100 rounded-2xl inline-block text-xs font-bold text-slate-500">
                    Por motivos de seguridad, este folio es único. Guárdalo para seguimiento administrativo
                    interno de la UnIS.
                </div>
            </div>
        @endif

        <!-- Nota de Advertencia / Seguridad -->
        <div
            class="max-w-2xl mx-auto flex items-start space-x-4 bg-[#5f1b2d]/5 border border-[#5f1b2d]/10 p-5 rounded-3xl text-left">
            <div class="p-2.5 bg-[#5f1b2d]/10 text-[#5f1b2d] rounded-2xl flex-shrink-0">
                <i class="fa-solid fa-user-shield h-5 w-5"></i>
            </div>
            <div class="space-y-1">
                <h4 class="text-base font-bold text-[#5f1b2d]">
                    Protección y Confidencialidad Garantizada
                </h4>
                <p class="text-sm text-slate-600 leading-relaxed font-light">
                    La Secretaría garantiza el anonimato absoluto si así lo requieres. Tu reporte no creará
                    registros públicos vinculados a tu cuenta y se canaliza bajo el Protocolo del Órgano Interno
                    de Control sin riesgo de represalias.
                </p>
            </div>
        </div>

        <!-- Formulario con Toggle Alpine.js para Anónimo -->
        <div x-data="{ isAnonymous: true }"
            class="bg-slate-50 border border-slate-200 rounded-3xl p-8 md:p-10 max-w-2xl mx-auto shadow-sm">
            <form method="POST" action="{{ route('denuncias.store') }}" class="space-y-6">
                @csrf

                <!-- Opción Anónimo -->
                <div class="flex items-center justify-between p-4 bg-white border border-slate-200/80 rounded-2xl">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                            <i class="fa-regular fa-comments h-5 w-5"></i>
                        </div>
                        <div>
                            <span class="text-base font-bold text-slate-800 block">
                                Deseo realizar un reporte ANÓNIMO
                            </span>
                            <span class="text-sm text-slate-400 block font-light">
                                No guardaremos datos de tu identidad.
                            </span>
                        </div>
                    </div>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_anonymous" value="1" x-model="isAnonymous"
                            class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#246257]">
                        </div>
                    </label>
                </div>

                <!-- Campos del Denunciante Identificado -->
                <div x-show="!isAnonymous" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="space-y-4 border-t border-slate-200/80 pt-4">
                    <span class="text-sm uppercase font-bold tracking-widest text-[#246257] block font-sans">
                        Datos
                        de Identidad (Confidenciales)
                    </span>

                    <div class="space-y-1">
                        <label for="complainant_name"
                            class="text-sm uppercase tracking-widest text-slate-500 font-bold block">
                            Nombre
                            Completo
                        </label>
                        <input type="text" name="complainant_name" id="complainant_name" ::required="!isAnonymous"
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400"
                            placeholder="Escribe tu nombre completo">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="complainant_email"
                                class="text-sm uppercase tracking-widest text-slate-500 font-bold block">Correo
                                Electrónico</label>
                            <input type="email" name="complainant_email" id="complainant_email"
                                ::required="!isAnonymous"
                                class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400"
                                placeholder="ejemplo@correo.com">
                        </div>
                        <div class="space-y-1">
                            <label for="complainant_phone"
                                class="text-sm uppercase tracking-widest text-slate-500 font-bold block">Teléfono
                                de Contacto (Opcional)</label>
                            <input type="text" name="complainant_phone" id="complainant_phone"
                                class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400"
                                placeholder="222-000-0000">
                        </div>
                    </div>
                </div>

                <!-- Campos Generales del Reporte (Siempre visibles) -->
                <div class="space-y-4 pt-4 border-t border-slate-200/80">
                    <span
                        class="text-[10px] uppercase font-bold tracking-widest text-[#5f1b2d] block font-sans">Detalles
                        del Suceso</span>

                    <div class="space-y-1">
                        <label for="subject"
                            class="text-sm uppercase tracking-widest text-slate-500 font-bold block">Asunto
                            / Temática Principal</label>
                        <input type="text" name="subject" id="subject" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400"
                            placeholder="Ej. Comportamiento hostil, propuesta de capacitación, duda de lactario...">
                    </div>

                    <div class="space-y-1">
                        <label for="description"
                            class="text-sm uppercase tracking-widest text-slate-500 font-bold block">Relato
                            Detallado</label>
                        <textarea name="description" id="description" rows="6" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-[#5f1b2d] placeholder-slate-400 resize-none"
                            placeholder="Describe de forma detallada las circunstancias, fechas u oficinas en las que ocurrió la situación..."></textarea>
                    </div>
                </div>

                <!-- Aviso de Privacidad Simplificado Checkbox -->
                <div class="flex items-start space-x-3 bg-white border border-slate-200/80 p-4 rounded-2xl">
                    <input type="checkbox" id="privacy_policy_accepted" name="privacy_policy_accepted" required
                        value="1"
                        class="mt-0.5 h-4 w-4 rounded border-slate-300 text-[#5f1b2d] focus:ring-[#5f1b2d]">
                    <label for="privacy_policy_accepted"
                        class="text-[10px] text-slate-600 leading-relaxed font-light">
                        Acepto los términos del <a href="#"
                            @click.prevent="openModal('pdf', 'Aviso de Privacidad Simplificado', '', 'De conformidad con la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, los datos personales recabados en este buzón serán tratados de manera estrictamente confidencial para el trámite, análisis y canalización del reporte.', '')"
                            class="text-[#5f1b2d] font-bold underline hover:text-[#861e34]">Aviso de Privacidad
                            Simplificado</a>. Se garantiza la protección absoluta de tus datos.
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#5f1b2d] to-[#861e34] hover:opacity-90 transition-all font-bold text-xs uppercase tracking-wider text-white border border-[#c79b66]/30 shadow-md">
                    Enviar Reporte de Forma Segura
                </button>
            </form>
        </div>

    </div>
</section>
