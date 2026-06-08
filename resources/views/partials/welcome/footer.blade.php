<!-- FOOTER LEGAL (Referencia del Portal UnIS) -->
<footer>
    <div class="bg-[#212529] text-slate-400 border-t border-slate-800 relative z-10 w-full font-sans py-12">
        <div class="w-full mx-auto">
            <div
                class="w-full mx-auto px-0 sm:px-12 lg:px-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-0 lg:gap-0 pt-12">

                <!-- Columna 1: Identidad y Valoración (Emojis) -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 space-y-2 space-x-2 px-3 mb-12">
                    <div>
                        <a href="{{ url('/') }}" class="inline-block text-white mb-3" rel="noopener">
                            <h2 class="text-3xl font-bold tracking-wider font-serif ml-2">
                                <span class="text-[#c79b66]">U</span>nIS
                            </h2>
                        </a>
                        <p class="text-base text-[#dfebe9] font-light leading-relaxed">
                            Unidad de Igualdad Sustantiva de la Secretaría de Planeación, Finanzas y Administración del
                            Estado de Puebla
                        </p>
                    </div>

                    <div>
                        <h6 class="text-white text-[1.25rem] uppercase tracking-widest font-bold mb-4 font-serif">
                            Síguenos
                        </h6>
                        <div class="flex items-center space-x-3">
                            <a title="X/Twitter de la Secretaría de Planeación, Finanzas y Administración"
                                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700/60 flex items-center justify-center text-slate-350 hover:bg-[#861e34] hover:text-white transition-colors"
                                href="https://x.com/SPFAGobPue" rel="noopener" target="_blank">
                                <i class="fa-brands fa-square-x-twitter text-white text-lg"></i>
                            </a>
                            <a title="Facebook de la Secretaría de Planeación, Finanzas y Administración"
                                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700/60 flex items-center justify-center text-slate-350 hover:bg-[#861e34] hover:text-white transition-colors"
                                href="https://www.facebook.com/FinanzasGobPue" rel="noopener" target="_blank">
                                <i class="fa-brands fa-facebook text-white text-lg"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Contador de Visitas -->
                    <div class="pt-6">
                        <div
                            class="inline-flex items-center space-x-3 px-4 py-2.5 bg-slate-800/50 border border-slate-700/50 rounded-xl">
                            <div class="flex justify-center items-center flex-col">
                                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mb-0.5">
                                    Visitas del Sitio</p>
                                <p class="text-white font-bold text-lg font-serif leading-none">
                                    {{ number_format((int) \App\Models\ConfiguracionSitio::getValue('total_visits', 0)) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Evaluación interactiva -->
                    <div class="pt-6 border-t border-slate-800/60">
                        <div id="evaluationDiv" class="p-5 bg-slate-900/40 border border-slate-800/80 rounded-2xl">
                            <h5 class="text-base font-bold text-white mb-1.5">¡Ayúdanos a mejorar!</h5>
                            <p class="text-sm text-slate-400 mb-4">¿Te ha sido útil la información de esta página?</p>
                            <div class="emoji-container flex items-center space-x-3" id="emojiContainer">
                                <div class="emoji-wrapper flex flex-col items-center py-2.5 px-3 rounded-xl bg-slate-800/50 border border-slate-700/30 cursor-pointer hover:bg-[#861e34]/15 hover:border-[#861e34]/30 hover:scale-105 active:scale-95 transition-all w-20"
                                    data-score="3" title="¡Muy útil!">
                                    <span class="text-2xl">😊</span>
                                    <span
                                        class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5">Útil</span>
                                </div>
                                <div class="emoji-wrapper flex flex-col items-center py-2.5 px-3 rounded-xl bg-slate-800/50 border border-slate-700/30 cursor-pointer hover:bg-[#861e34]/15 hover:border-[#861e34]/30 hover:scale-105 active:scale-95 transition-all w-20"
                                    data-score="2" title="Más o menos">
                                    <span class="text-2xl">😐</span>
                                    <span
                                        class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5">Regular</span>
                                </div>
                                <div class="emoji-wrapper flex flex-col items-center py-2.5 px-3 rounded-xl bg-slate-800/50 border border-slate-700/30 cursor-pointer hover:bg-[#861e34]/15 hover:border-[#861e34]/30 hover:scale-105 active:scale-95 transition-all w-20"
                                    data-score="1" title="No me sirvió">
                                    <span class="text-2xl">😞</span>
                                    <span class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5">Poco
                                        útil</span>
                                </div>
                            </div>
                            <div id="feedbackForm" class="hidden mt-5 pt-4 border-t border-slate-800/80">
                                <p class="text-sm text-slate-450 mb-2.5 leading-relaxed">Lamentamos que no te haya sido
                                    útil. ¿Cómo podemos mejorar esta página?</p>
                                <textarea id="feedbackComment"
                                    class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-2.5 text-base text-white placeholder-slate-500 focus:outline-none focus:border-[#861e34] resize-none mb-3"
                                    rows="2" placeholder="Tu comentario (opcional)"></textarea>
                                <div class="mb-3">
                                    <x-turnstile />
                                </div>
                                <button id="submitFeedbackBtn"
                                    class="px-4 py-2 bg-[#861e34] hover:bg-[#5f1b2d] border border-[#c79b66]/30 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition-colors">Enviar
                                    comentarios</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Mapa de Sitio (Adaptado a secciones reales) -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 space-y-2 mb-12 px-3">
                    <h5
                        class="text-white text-[1.25rem] uppercase tracking-wider font-bold border-b border-slate-800 pb-0 font-serif mb-4">
                        Mapa de sitio
                    </h5>
                    <div class="flex flex-col space-y-1 text-base">

                        <!-- Inicio -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#inicio' : url('/#inicio') }}">
                            <i class="fa fa-home mr-2.5 text-slate-500 text-base"></i>
                            Inicio
                        </a>

                        <!-- Actualidad -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#contenido-seccion' : url('/#contenido-seccion') }}">
                            <i class="fa-solid fa-newspaper mr-2.5 text-slate-500 text-base"></i>
                            Actualidad
                        </a>

                        <!-- Identidad -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#identidad' : url('/#identidad') }}">
                            <i class="fa-solid fa-id-card mr-2.5 text-slate-500 text-base"></i>
                            Identidad
                        </a>

                        <!-- ¿Qué Hacemos? -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#que-hacemos' : url('/#que-hacemos') }}">
                            <i class="fa-solid fa-circle-info mr-2.5 text-slate-500 text-base"></i>
                            ¿Qué Hacemos?
                        </a>

                        <!-- Líneas de Acción -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#lineas-accion' : url('/#lineas-accion') }}">
                            <i class="fa-solid fa-gears mr-2.5 text-slate-500 text-base"></i>
                            Líneas de Acción
                        </a>

                        <!-- Pronunciamientos -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#pronunciamientos' : url('/#pronunciamientos') }}">
                            <i class="fa-solid fa-bullhorn mr-2.5 text-slate-500 text-base"></i>
                            Pronunciamientos
                        </a>

                        <!-- Transparencia -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#transparencia' : url('/#transparencia') }}">
                            <i class="fa-solid fa-file-shield mr-2.5 text-slate-500 text-base"></i>
                            Transparencia
                        </a>

                        <!-- Buzón -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#buzon' : url('/#buzon') }}">
                            <i class="fa-solid fa-mailbox mr-2.5 text-slate-500 text-base"></i>
                            Buzón de Denuncias
                        </a>

                        <!-- Contacto -->
                        <a class="text-slate-400 hover:text-white transition-colors flex items-center py-0"
                            href="{{ request()->is('/') ? '#contacto' : url('/#contacto') }}">
                            <i class="fa-solid fa-envelope mr-2.5 text-slate-500 text-base"></i>
                            Contacto
                        </a>

                    </div>
                </div>

                <!-- Columna 3: Sitios de Interes -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 space-y-2 mb-12 px-3">
                    <h4
                        class="text-white text-[1.25rem] uppercase tracking-wider font-bold border-b border-slate-800 pb-0 font-serif mb-4">
                        Sitios de interés
                    </h4>
                    <div class="flex flex-col space-y-1 text-base">
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://www.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Gobierno de los Estados Unidos Mexicanos</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://www.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Gobierno del Estado de Puebla</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://spf.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Secretaría de Planeación, Finanzas y Administración</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://informe.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Informe de Gobierno</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://ped2024-2030.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Plan Estatal de Desarrollo</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://planeader.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500"></i>
                            <span>Portal de Planeación para el Desarrollo</span>
                        </a>
                        <a target="_blank"
                            class="text-slate-400 hover:text-white transition-colors flex items-start py-0.5"
                            href="https://sped.puebla.gob.mx/" rel="noopener">
                            <i class="fa fa-angle-right mr-2.5 mt-1 text-slate-500 flex-shrink-0"></i>
                            <span class="break-words">Sistema de Información para el Seguimiento a la Planeación y
                                Evaluación del Desarrollo</span>
                        </a>
                    </div>
                </div>

                <!-- Columna 4: Contáctanos y Ubicación -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 space-y-2 mb-12 px-3">
                    <h4
                        class="text-white text-[1.25rem] uppercase tracking-wider font-bold border-b border-slate-800 pb-0 font-serif mb-4">
                        Contáctanos
                    </h4>
                    <div class="flex flex-col space-y-1 text-base text-slate-400">
                        <p class="flex items-start">
                            <i class="fa fa-map-marker-alt mr-3 mt-1 text-slate-500 text-base"></i>
                            <span class="text-base">
                                {{ $settings['contact_address'] ?? 'Av. Cúmulo de Virgo 1358, Reserva Territorial Atlixcáyotl, Puebla, Pue.' }}
                            </span>
                        </p>
                        <p class="flex items-center">
                            <i class="fa fa-phone-alt mr-3 text-slate-500 text-base"></i>
                            <a class="hover:text-white transition-colors font-medium text-base"
                                href="tel:{{ $settings['contact_phone'] ?? '2221234567' }}">
                                {{ $settings['contact_phone'] ?? '222-123-4567' }}
                            </a>
                        </p>
                        <p class="flex items-center">
                            <i class="fa fa-envelope mr-3 text-slate-500 text-base"></i>
                            <a class="hover:text-white transition-colors font-medium break-all text-base"
                                href="mailto:{{ $settings['contact_email'] ?? 'uis.spf@puebla.gob.mx' }}">
                                {{ $settings['contact_email'] ?? 'uis.spf@puebla.gob.mx' }}
                            </a>
                        </p>
                        <h6 class="text-white text-[1.25rem] uppercase tracking-widest font-bold mt-6 mb-2 hidden md:block font-serif">
                            Ubicación
                        </h6>
                        <div
                            class="w-full rounded-md overflow-hidden shadow-md border border-slate-800/80 opacity-80 hover:opacity-100 transition-opacity hidden md:block py-3 px-3">
                            <iframe id="mapIframe" title="Iframe de Mapas" class="w-full h-40 border-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.74991801338356!2d-98.23562714550607!3d19.019779470285457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc70067539479%3A0xf49b8ffba2f7d28e!2sSecretar%C3%ADa%20de%20Finanzas%20-%20Nueva%20Sede%20(en%20construcci%C3%B3n)!5e0!3m2!1sen!2smx!4v1779210197938!5m2!1sen!2smx"
                                allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Seccion Principal -->


    <!-- Franja Inferior de Copyright y CC -->
    <div
        class="bg-[#212529] border-t border-slate-850 py-6 px-12 sm:px-10 lg:px-12 text-slate-400 text-sm md:text-base">
        <div class="w-full mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-center md:text-center md:w-1/2 flex justify-center align-center">
                <div class="mx-4 font-normal text-white text-opacity-40">
                    <a href="https://spf.puebla.gob.mx" target="_blank" rel="noopener"
                        class="hover:text-white transition-colors text-white font-normal text-base">
                        Secretaría de Planeación,
                        Finanzas y Administración
                    </a>
                    <a href="https://creativecommons.org/licenses/by/4.0/deed.es" rel="noopener" target="_blank"
                        class="inline-flex items-center mx-2 align-middle">
                        <img src="{{ asset('img/logos/cc.xlarge.png') }}" class="h-6 w-auto mx-0.5"
                            alt="Logo de Creative Commons" title="Logo de Creative Commons">
                        <img src="{{ asset('img/logos/by.xlarge.png') }}" class="h-6 w-auto mx-0.5"
                            alt="Logo de Creative Commons" title="Logo de Creative Commons">
                    </a>
                    Se autoriza la reproducción parcial o total del contenido, siempre que se cite y referencie
                    la fuente.
                </div>
            </div>
            <div class="text-center md:text-center md:w-1/2 space-y-0 flex justify-center align-center flex-col">
                <p class="m-0 text-base">
                    Diseñado por la
                    <a target="_blank" href="https://planeacion.puebla.gob.mx" rel="noopener"
                        class="hover:text-white transition-colors font-medium">Subsecretaría de Planeación</a>
                </p>
                <p class="m-0 text-base">
                    <a href="{{ url('/login') }}" rel="noopener"
                        class="hover:text-white transition-colors font-bold text-base">Iniciar sesión</a>
                </p>
            </div>
        </div>
    </div>

    <x-turnstile.scripts />
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const evaluationDiv = document.getElementById('evaluationDiv');
        const emojiContainer = document.getElementById('emojiContainer');
        const emojiWrappers = document.querySelectorAll('.emoji-container .emoji-wrapper');
        const feedbackForm = document.getElementById('feedbackForm');
        const feedbackComment = document.getElementById('feedbackComment');
        const submitFeedbackBtn = document.getElementById('submitFeedbackBtn');
        let selectedScore = null;

        if (!evaluationDiv || emojiWrappers.length === 0) return;

        // Reset del voto para desarrollo/pruebas si la URL tiene ?reset_vote=1
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('reset_vote') === '1') {
            localStorage.removeItem('siteEvaluationVoted');
        }

        // Revisa si ya votó
        if (localStorage.getItem('siteEvaluationVoted') === 'true') {
            evaluationDiv.style.display = 'none';
            return;
        }

        // Función para enviar el voto con datos extra del User Agent
        function submitEvaluation(score, comment = null) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Datos del cliente recolectados con JS
            const currentUrl = window.location.href;
            const screenRes = window.innerWidth + 'x' + window.innerHeight;
            const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            const lang = navigator.language;

            // Feedback visual de espera
            if (comment !== null) {
                feedbackForm.innerHTML = '<p class="text-xs text-slate-450">Procesando tu voto...</p>';
            } else {
                evaluationDiv.innerHTML = '<p class="text-xs text-slate-450">Procesando tu voto...</p>';
            }

            fetch(`${window.APP_URL || ''}/evaluations`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        score: score,
                        comment: comment,
                        url_evaluated: currentUrl,
                        screen_resolution: screenRes,
                        time_zone: timeZone,
                        language: lang,
                        'cf-turnstile-response': document.querySelector(
                            '[name="cf-turnstile-response"]')?.value
                    })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Error en la respuesta del servidor.');
                    return response.json();
                })
                .then(data => {
                    localStorage.setItem('siteEvaluationVoted', 'true');
                    evaluationDiv.innerHTML =
                        '<p class="text-emerald-500 font-semibold text-xs">¡Gracias por tu evaluación!</p>';
                    evaluationDiv.classList.add('thank-you');
                    setTimeout(() => {
                        evaluationDiv.style.transition = 'opacity 0.5s ease-out';
                        evaluationDiv.style.opacity = '0';
                        setTimeout(() => evaluationDiv.style.display = 'none', 500);
                    }, 1500);
                })
                .catch(error => {
                    console.error('Error al enviar la evaluación:', error);
                    let targetDiv = comment !== null ? feedbackForm : evaluationDiv;
                    targetDiv.innerHTML =
                        '<p class="text-red-500 text-xs font-semibold">Hubo un error. Intenta más tarde.</p>';
                });
        }

        // Lógica de clic en emojis
        emojiWrappers.forEach(wrapper => {
            wrapper.addEventListener('click', function() {
                selectedScore = this.dataset.score;

                if (selectedScore === "3") {
                    // Envía inmediatamente
                    submitEvaluation(selectedScore);
                } else {
                    // Muestra el formulario de feedback
                    emojiWrappers.forEach(w => w.style.opacity = '0.5'); // atenuar los otros
                    this.style.opacity = '1'; // resaltar el seleccionado
                    this.style.transform = 'scale(1.1)'; // opcional: hacer un poco más grande

                    feedbackForm.style.display = 'block';
                    feedbackForm.classList.remove('hidden');
                    feedbackComment.focus();
                }
            });
        });

        // Lógica de clic en el botón de enviar
        submitFeedbackBtn.addEventListener('click', function() {
            if (selectedScore) {
                const comment = feedbackComment.value.trim();
                submitEvaluation(selectedScore, comment);
            }
        });
    });
</script>
