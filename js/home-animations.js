/**
 * LETRAS FLCH — Home Animations
 * Stack: GSAP 3 + ScrollTrigger
 * Páginas: home (front page)
 *
 * CRÍTICO: No re-registrar GSAP (ya cargado por letras-performance.php)
 * CRÍTICO: clearProps para evitar conflictos con hover CSS
 * CRÍTICO: Fallback visual si GSAP no carga (red externa)
 */
(function() {
    'use strict';

    // Garantizar visibilidad inicial sin GSAP
    var styleEl = document.createElement('style');
    styleEl.textContent = `
        .gsap-fade-in { opacity: 1 !important; transform: none !important; }
        .gsap-card { opacity: 1 !important; transform: none !important; }
    `;
    document.head.appendChild(styleEl);

    // Esperar GSAP con timeout (fallback si CDN falla)
    var gsapTimeout = setTimeout(function() {
        console.warn('GSAP timeout - usando fallback CSS');
        document.body.classList.add('gsap-fallback');
    }, 3000);

    var waitForGSAP = (window.flchGSAP && window.flchGSAP.waitForGSAP) || function(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            clearTimeout(gsapTimeout);
            gsap.registerPlugin(ScrollTrigger);
            cb();
        } else if (attempts < 60) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        } else {
            console.warn('GSAP no disponible después de 3s');
        }
    };

    waitForGSAP(function() {

        /* ─── 1. HERO — Animación de entrada ───────────────────────────
           Selectores flexibles para diferentes estructuras de Elementor */

        var heroSelectors = [
            '.elementor-slideshow',
            '.hero-section',
            '.main-banner',
            'section.elementor-top-section:first-of-type'
        ];

        var hero = null;
        for (var i = 0; i < heroSelectors.length; i++) {
            hero = document.querySelector(heroSelectors[i]);
            if (hero) break;
        }

        if (hero) {
            var heroElements = hero.querySelectorAll(
                'h1, h2, h3, p, a.elementor-button, .elementor-heading-title, ' +
                '.elementor-slide-heading, .elementor-slide-description, ' +
                '.hero-title, .hero-subtitle, .hero-cta'
            );

            if (heroElements.length) {
                // Set inicial sin depender de inline styles
                gsap.set(heroElements, { opacity: 0, y: 30, willChange: 'opacity, transform' });

                gsap.to(heroElements, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: 'power3.out',
                    delay: 0.3,
                    clearProps: 'all',  // CRÍTICO: limpiar para no bloquear hover
                    onComplete: function() {
                        heroElements.forEach(function(el) {
                            el.classList.add('gsap-animated');
                        });
                    }
                });
            }
        }

        /* ─── 2. CARDS DE NOTICIAS — ScrollTrigger batch ───────────────
           Animar entrada cuando son visibles */

        var cardSelectors = [
            '.sp-smart-post-show-pro article',
            '.sp-post-item',
            'article.type-post',
            '.post-card',
            '.flch-card',
            '.elementor-post'
        ].join(', ');

        var cards = document.querySelectorAll(cardSelectors);
        cards.forEach(function(card) {
            ScrollTrigger.create({
                trigger: card,
                start: 'top 85%',
                once: true,
                onEnter: function() {
                    gsap.fromTo(card,
                        {
                            opacity: 0,
                            y: 40,
                            willChange: 'opacity, transform'
                        },
                        {
                            opacity: 1,
                            y: 0,
                            duration: 0.6,
                            ease: 'power2.out',
                            clearProps: 'all',
                            onComplete: function() {
                                card.classList.add('gsap-card');
                            }
                        }
                    );
                }
            });
        });

        /* ─── 3. SECCIONES ELEMENTOR — Fade in general ─────────────────
           Todas las secciones que no son el hero */

        var sections = document.querySelectorAll(
            'section.elementor-section:not(:first-of-type)'
        );

        sections.forEach(function(section) {
            gsap.fromTo(section,
                {
                    opacity: 0,
                    y: 30,
                    willChange: 'opacity, transform'
                },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 80%',
                        once: true
                    },
                    clearProps: 'all'
                }
            );
        });

        /* ─── 4. CONTADORES ESTADÍSTICOS ───────────────────────────────
           Busca [data-count] o clases .counter-number */

        var counters = document.querySelectorAll(
            '[data-count], .counter-number, .stat-number, .count-up'
        );

        counters.forEach(function(el) {
            var target = parseInt(el.getAttribute('data-count') || el.textContent, 10);
            if (!isNaN(target) && target > 0) {
                el.textContent = '0';

                ScrollTrigger.create({
                    trigger: el,
                    start: 'top 75%',
                    once: true,
                    onEnter: function() {
                        gsap.to(el, {
                            textContent: target,
                            duration: 2,
                            ease: 'power1.out',
                            snap: { textContent: 1 },
                            onUpdate: function() {
                                var val = Math.round(this.targets()[0].textContent);
                                el.textContent = val.toLocaleString('es-PE');
                            }
                        });
                    }
                });
            }
        });

        /* ─── 5. HOVER AVANZADO en cards ───────────────────────────────
           Efectos visuales sutiles con GSAP */

        var cards = document.querySelectorAll(cardSelectors);
        var isMobile = window.innerWidth < 768;

        cards.forEach(function(card) {
            var img = card.querySelector('img');
            var badge = card.querySelector(
                '.flch-badge, .post-badge, .category-badge, .sp-post-cat a'
            );

            // Skip hover effects en mobile
            if (isMobile) return;

            // HOVER IN
            card.addEventListener('mouseenter', function(e) {
                // Card lift con sombra dinámica
                gsap.to(card, {
                    y: -8,
                    boxShadow: '0 20px 40px rgba(20,59,99,0.15)',
                    duration: 0.4,
                    ease: 'power2.out'
                });

                // Image zoom suave
                if (img) {
                    gsap.to(img, {
                        scale: 1.08,
                        duration: 0.6,
                        ease: 'power2.out'
                    });
                }

                // Badge color shift (Navy → Gold)
                if (badge) {
                    gsap.to(badge, {
                        backgroundColor: '#A8861C',
                        color: '#fff',
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                }
            });

            // HOVER OUT
            card.addEventListener('mouseleave', function() {
                gsap.to(card, {
                    y: 0,
                    boxShadow: '0 1px 3px rgba(0,0,0,0.05)',
                    duration: 0.4,
                    ease: 'power2.inOut'
                });

                if (img) {
                    gsap.to(img, {
                        scale: 1,
                        duration: 0.5,
                        ease: 'power2.inOut'
                    });
                }

                if (badge) {
                    gsap.to(badge, {
                        backgroundColor: 'rgba(20,59,99,0.92)',
                        color: '#fff',
                        duration: 0.3
                    });
                }
            });
        });

        /* ─── 6. FOOTER reveal ─────────────────────────────────────────
           Footer entra suavemente */

        var footer = document.querySelector('footer.site-footer, footer[role="contentinfo"]');
        if (footer) {
            gsap.fromTo(footer,
                { opacity: 0, y: 30 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: footer,
                        start: 'top 90%',
                        once: true
                    },
                    clearProps: 'all'
                }
            );
        }

        console.log('✅ LETRAS Home Animations cargadas');

    }); // end waitForGSAP

})();
