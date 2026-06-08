import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. Inicialización de Smooth Scroll (Lenis) ---
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), 
        smooth: true,
    });

    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);


    // --- 2. Barra de Progreso de Lectura ---
    const progressContainer = document.createElement('div');
    progressContainer.className = 'fixed top-0 left-0 w-full h-[3px] z-[60] pointer-events-none';
    const progressBar = document.createElement('div');
    progressBar.className = 'h-full bg-gradient-to-r from-[#c79b66] to-[#861e34] w-0';
    progressContainer.appendChild(progressBar);
    document.body.appendChild(progressContainer);
    
    gsap.to(progressBar, {
        width: '100%',
        ease: 'none',
        scrollTrigger: {
            trigger: document.body,
            start: 'top top',
            end: 'bottom bottom',
            scrub: true
        }
    });


    // --- 4. Control del Preloader ---
    const preloader = document.getElementById('preloader');
    const isFirstLoad = !sessionStorage.getItem('unis_preloader_loaded');
    const progressAnim = document.querySelector('.preloader-progress-bar');
    
    if (preloader) {
        if (isFirstLoad) {
            const preloadTl = gsap.timeline({
                onComplete: () => {
                    sessionStorage.setItem('unis_preloader_loaded', 'true');
                    startHeroAnimations();
                }
            });
            preloadTl.to(progressAnim, { width: '100%', duration: 2.0, ease: 'power3.inOut' })
            .to('.preloader-title, .preloader-subtitle', { y: 0, duration: 0.6, stagger: 0.2, ease: 'power3.out' }, "-=1.4")
            .to(preloader, { yPercent: -100, opacity: 0, duration: 1.0, ease: 'power4.inOut' }, "+=0.2")
            .set(preloader, { display: 'none' });
        } else {
            gsap.set(preloader, { display: 'none' });
            startHeroAnimations();
        }
    } else {
        startHeroAnimations();
    }


    // --- 5. Animaciones del Hero ---
    function startHeroAnimations() {
        const heroTl = gsap.timeline();
        heroTl.from('.hero-logo', { scale: 0.7, opacity: 0, duration: 1.4, ease: 'elastic.out(1, 0.8)' })
        .to('.hero-title-line', { y: 0, duration: 1.0, stagger: 0.18, ease: 'power4.out' }, "-=1.0")
        .from('.hero-text > span, .hero-text > p, .hero-text .flex', { y: 35, opacity: 0, duration: 0.8, stagger: 0.12, ease: 'power3.out' }, "-=0.7");
    }


    // --- 6. Tarjetas Interactivas (Hover Tilt) ---
    const cards = document.querySelectorAll('.glass-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            if (window.innerWidth < 1024) return;
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const xc = rect.width / 2;
            const yc = rect.height / 2;
            const angleX = (yc - y) / 20;
            const angleY = (x - xc) / 20;
            
            gsap.to(card, { rotationX: angleX, rotationY: angleY, scale: 1.02, duration: 0.3, ease: 'power2.out', transformPerspective: 1000 });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(card, { rotationX: 0, rotationY: 0, scale: 1, duration: 0.5, ease: 'power2.out' });
        });
    });


    // --- 7. Responsive MatchMedia (GSAP) ---
    let mm = gsap.matchMedia();

    // LÓGICA DE SCROLLSPY (Para todos los dispositivos)
    const sections = ['inicio', 'contenido-seccion', 'que-hacemos', 'lineas-accion', 'pronunciamientos', 'transparencia', 'buzon', 'contacto'];
    
    sections.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            ScrollTrigger.create({
                trigger: element,
                start: "top 40%",
                end: "bottom 40%",
                onToggle: self => {
                    if (self.isActive) updateNav(id);
                }
            });
        }
    });

    function updateNav(id) {
        window.dispatchEvent(new CustomEvent('section-change', { detail: id }));
    }

    // DESKTOP: Scroll Horizontal + Stacking
    mm.add("(min-width: 1024px)", () => {
        const wrap = document.querySelector('.actualidad-horizontal-wrap');
        if (wrap) {
            gsap.to(wrap, {
                x: () => -(wrap.scrollWidth - window.innerWidth),
                ease: 'none',
                scrollTrigger: {
                    trigger: '#contenido-seccion',
                    pin: true,
                    scrub: 1.2,
                    end: () => `+=${wrap.scrollWidth - window.innerWidth}`,
                    invalidateOnRefresh: true
                }
            });
        }

        // Apilamiento de Secciones
        const stackPanels = gsap.utils.toArray('.stack-panel');
        stackPanels.forEach((panel, i) => {
            if (i < stackPanels.length - 1) {
                const nextPanel = stackPanels[i + 1];
                gsap.to(panel, {
                    scale: 0.92,
                    opacity: 0.2,
                    yPercent: -10,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: nextPanel,
                        start: 'top bottom',
                        end: 'top top',
                        scrub: true
                    }
                });
            }
        });
    });

    // MÓVIL: Revelado Vertical Natural
    mm.add("(max-width: 1023px)", () => {
        const revealElements = document.querySelectorAll('.actualidad-panel, .glass-card, .gsap-reveal');
        revealElements.forEach((el) => {
            gsap.from(el, {
                opacity: 0,
                y: 50,
                duration: 1,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
    });

    // --- 8. Brillos de Fondo ---
    const glows = document.querySelectorAll('[class*="bg-glow-"]');
    glows.forEach((glow, i) => {
        gsap.to(glow, {
            y: (i % 2 === 0 ? 80 : -80),
            x: (i % 2 === 0 ? 40 : -40),
            ease: 'none',
            scrollTrigger: { trigger: document.body, start: 'top top', end: 'bottom bottom', scrub: 2 }
        });
    });

});
