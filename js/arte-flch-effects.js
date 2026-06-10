/**
 * LETRAS FLCH — Arte FLCH Effects
 * Efectos especiales para la página arte-flch
 * Stack: GSAP 3 + ScrollTrigger + Alpine.js
 *
 * Features:
 * - Reveal de imágenes con clip-path
 * - Parallax en secciones (desktop/tablet)
 * - Tabs animados (Alpine integration)
 * - Contadores animados
 * - Sticky nav con glass effect
 * - Soporte responsive completo
 */
(function() {
    'use strict';

    // Solo ejecutar en página arte-flch
    var isArtePage = (
        document.body.classList.contains('page-arte-flch') ||
        document.body.classList.contains('page-escuela-profesional-de-arte') ||
        window.location.href.includes('arte-flch') ||
        window.location.href.includes('arte')
    );

    if (!isArtePage) return;

    function waitForGSAP(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            cb();
        } else if (attempts < 60) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        } else {
            console.warn('Arte Effects: GSAP no disponible');
        }
    }

    waitForGSAP(function() {

        var isMobile = window.innerWidth < 768;
        var isTablet = window.innerWidth >= 768 && window.innerWidth < 1024;

        /* ─── 1. REVEAL DE IMÁGENES CON CLIP-PATH ──────────────────────
           Efecto de cortina horizontal */

        var images = document.querySelectorAll(
            '#ar img, .arte-gallery img, section img, .elementor-image img'
        );

        images.forEach(function(img) {
            // Skip logos pequeños o iconos
            if (img.width < 100 || img.height < 100) return;

            gsap.fromTo(img,
                {
                    clipPath: 'inset(0 100% 0 0)',
                    scale: 1.15
                },
                {
                    clipPath: 'inset(0 0% 0 0)',
                    scale: 1,
                    duration: isMobile ? 1 : 1.2,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: img,
                        start: 'top 85%',
                        once: true
                    }
                }
            );
        });

        /* ─── 2. PARALLAX EN SECCIONES ─────────────────────────────────
           Solo tablet y desktop, skip primera sección */

        if (!isMobile) {
            var sections = document.querySelectorAll(
                '#ar > div, section.elementor-section, .arte-section'
            );

            sections.forEach(function(section, idx) {
                // Skip primera sección para evitar espacio blanco superior
                if (idx === 0) return;

                // Alternar dirección (reducido para evitar offsets grandes)
                var speed = idx % 2 === 0 ? 20 : -20;

                // Reducir en tablet
                if (isTablet) {
                    speed = speed / 2;
                }

                gsap.to(section, {
                    yPercent: speed,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1
                    }
                });
            });
        }

        /* ─── 3. TABS ANIMADOS (Alpine.js integration) ─────────────────
           Detectar cuando un tab se muestra */

        var tabs = document.querySelectorAll('[x-show], [data-tab-content]');

        if (tabs.length) {
            tabs.forEach(function(tab) {
                // MutationObserver para detectar cuando el tab se muestra
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.target.style.display !== 'none' &&
                            mutation.target.offsetHeight > 0) {

                            // Tab visible — animar contenido
                            var elements = mutation.target.querySelectorAll(
                                'h2, h3, p, .card, .stat, img, .elementor-widget'
                            );

                            if (elements.length === 0) return;

                            gsap.fromTo(elements,
                                { opacity: 0, y: isMobile ? 20 : 30 },
                                {
                                    opacity: 1,
                                    y: 0,
                                    stagger: 0.08,
                                    duration: isMobile ? 0.5 : 0.6,
                                    ease: 'power2.out',
                                    clearProps: 'all'
                                }
                            );

                            // Disconnect después de primera animación
                            observer.disconnect();
                        }
                    });
                });

                observer.observe(tab, {
                    attributes: true,
                    attributeFilter: ['style', 'class']
                });
            });
        }

        /* ─── 4. CONTADORES ANIMADOS ───────────────────────────────────
           Para estadísticas y números destacados */

        var stats = document.querySelectorAll(
            '[data-count], .counter-number, .stat-number, .count-up'
        );

        stats.forEach(function(stat) {
            var target = parseInt(stat.getAttribute('data-count') || stat.textContent, 10);

            if (isNaN(target) || target <= 0) return;

            var originalText = stat.textContent;
            stat.textContent = '0';

            ScrollTrigger.create({
                trigger: stat,
                start: 'top 80%',
                once: true,
                onEnter: function() {
                    gsap.to(stat, {
                        textContent: target,
                        duration: isMobile ? 1.5 : 2,
                        ease: 'power1.out',
                        snap: { textContent: 1 },
                        onUpdate: function() {
                            var val = Math.round(this.targets()[0].textContent);
                            stat.textContent = val.toLocaleString('es-PE');
                        }
                    });
                }
            });
        });

        /* ─── 5. STICKY TABS NAVBAR CON GLASS EFFECT ───────────────────
           Nav de tabs sticky con cambio de estilo al scroll */

        var tabNav = document.querySelector(
            '.nv, [role="tablist"], .tabs-nav, .arte-tabs-nav'
        );

        if (tabNav) {
            var originalBg = window.getComputedStyle(tabNav).backgroundColor;

            ScrollTrigger.create({
                trigger: tabNav,
                start: 'top 0',
                end: 99999,
                onUpdate: function(self) {
                    if (self.direction === 1 && self.scroll() > 100) {
                        // Scroll down — glass effect
                        gsap.to(tabNav, {
                            backgroundColor: 'rgba(255,255,255,0.98)',
                            backdropFilter: 'blur(12px) saturate(180%)',
                            webkitBackdropFilter: 'blur(12px) saturate(180%)',
                            boxShadow: '0 2px 16px rgba(0,0,0,0.1)',
                            duration: 0.3
                        });
                    } else if (self.scroll() < 100) {
                        // Top — reset
                        gsap.to(tabNav, {
                            backgroundColor: originalBg || 'rgba(255,255,255,0.96)',
                            backdropFilter: 'blur(0px)',
                            webkitBackdropFilter: 'blur(0px)',
                            boxShadow: 'none',
                            duration: 0.3
                        });
                    }
                }
            });

            // Asegurar posición sticky
            if (window.getComputedStyle(tabNav).position !== 'sticky' &&
                window.getComputedStyle(tabNav).position !== 'fixed') {
                tabNav.style.position = 'sticky';
                tabNav.style.top = isMobile ? '60px' : '80px';  // Debajo del header
                tabNav.style.zIndex = '100';
            }
        }

        /* ─── 6. ANIMACIÓN DE CARDS/TESTIMONIOS ────────────────────────
           Cualquier card dentro de arte-flch */

        var cards = document.querySelectorAll(
            '.arte-card, .testimonial-card, .team-card, .flch-card'
        );

        if (cards.length) {
            ScrollTrigger.batch(cards, {
                onEnter: function(elements) {
                    gsap.fromTo(elements,
                        {
                            opacity: 0,
                            y: isMobile ? 30 : 50,
                            scale: 0.95
                        },
                        {
                            opacity: 1,
                            y: 0,
                            scale: 1,
                            duration: 0.6,
                            stagger: 0.1,
                            ease: 'back.out(1.2)',
                            clearProps: 'all'
                        }
                    );
                },
                start: 'top 85%',
                once: true
            });
        }

        /* ─── 7. TÍTULOS CON SUBRAYADO ANIMADO ─────────────────────────
           H2, H3 con línea decorativa */

        var headings = document.querySelectorAll(
            '#ar h2, #ar h3, .arte-heading'
        );

        headings.forEach(function(heading) {
            // Solo si no tiene ya el decorador
            if (heading.querySelector('.heading-underline')) return;

            // Crear línea
            var underline = document.createElement('span');
            underline.className = 'heading-underline';
            underline.style.cssText = [
                'display: block',
                'width: 60px',
                'height: 3px',
                'background: linear-gradient(90deg, #A88F1D, #C4A822)',
                'margin: 12px 0 0 0',
                'transform: scaleX(0)',
                'transform-origin: left'
            ].join('; ');

            heading.appendChild(underline);

            // Animar entrada
            ScrollTrigger.create({
                trigger: heading,
                start: 'top 85%',
                once: true,
                onEnter: function() {
                    gsap.to(underline, {
                        scaleX: 1,
                        duration: 0.8,
                        ease: 'power2.out'
                    });
                }
            });
        });

        /* ─── 8. RESPONSIVE: REFRESH EN RESIZE ─────────────────────────*/

        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                ScrollTrigger.refresh();
            }, 300);
        });

        console.log('✅ Arte-FLCH Effects cargados (' + (isMobile ? 'Mobile' : isTablet ? 'Tablet' : 'Desktop') + ')');

    }); // end waitForGSAP

})();
