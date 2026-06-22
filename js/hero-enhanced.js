/**
 * LETRAS FLCH — Hero Enhanced
 * Stack: GSAP 3 + ScrollTrigger
 * Animación cinematográfica con soporte responsive completo
 *
 * Breakpoints:
 * - Mobile: < 768px (sin parallax, animaciones reducidas)
 * - Tablet: 768px - 1024px (parallax suave)
 * - Desktop: > 1024px (parallax completo + efectos avanzados)
 */
(function() {
    'use strict';

    var waitForGSAP = (window.flchGSAP && window.flchGSAP.waitForGSAP) || function(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            cb();
        } else if (attempts < 60) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        } else {
            console.warn('hero-enhanced: GSAP no disponible después de 3s');
        }
    };

    waitForGSAP(function() {

        // Detectar dispositivo
        var isMobile = window.innerWidth < 768;
        var isTablet = window.innerWidth >= 768 && window.innerWidth < 1024;
        var isDesktop = window.innerWidth >= 1024;

        /* ─── BUSCAR HERO ───────────────────────────────────────────────
           Compatible con múltiples estructuras */

        var heroSelectors = [
            '.flch-hero',
            '.elementor-slideshow',
            'section.hero-section',
            '.main-banner',
            'section.elementor-top-section:first-of-type'
        ];

        var hero = null;
        for (var i = 0; i < heroSelectors.length; i++) {
            hero = document.querySelector(heroSelectors[i]);
            if (hero) break;
        }

        if (!hero) return;

        /* ─── BUSCAR ELEMENTOS DEL HERO ────────────────────────────────*/

        var badge = hero.querySelector(
            '.flch-hero__badge, .hero-badge, .eyebrow, .elementor-slide-eyebrow'
        );

        var title = hero.querySelector(
            'h1, .flch-hero__title, .hero-title, ' +
            '.elementor-heading-title, .elementor-slide-heading'
        );

        var description = hero.querySelector(
            '.flch-hero__description, .hero-description, ' +
            '.elementor-slide-description, p:not(.eyebrow)'
        );

        var cta = hero.querySelector(
            '.flch-hero__buttons, .hero-cta, .elementor-button-wrapper, ' +
            'a.elementor-button, a.flch-btn'
        );

        var heroImage = hero.querySelector(
            '.flch-hero__slide-bg, .hero-bg, ' +
            '.elementor-background-slideshow__slide__image, ' +
            '.elementor-background-overlay + div'
        );

        /* ─── TIMELINE PRINCIPAL ────────────────────────────────────────
           Animación de entrada con stagger secuencial */

        var tl = gsap.timeline({
            defaults: {
                ease: 'power3.out',
                force3D: true  // Mejor performance en mobile
            }
        });

        // 1. BADGE - Slide desde izquierda
        if (badge) {
            gsap.set(badge, {
                opacity: 0,
                x: isMobile ? -30 : -50,
                filter: 'blur(8px)'
            });

            tl.to(badge, {
                opacity: 1,
                x: 0,
                filter: 'blur(0px)',
                duration: isMobile ? 0.6 : 0.8,
                clearProps: 'all'
            }, 0.2);
        }

        // 2. TÍTULO - Revelación con blur
        if (title) {
            gsap.set(title, {
                opacity: 0,
                y: isMobile ? 30 : 40,
                filter: 'blur(10px)'
            });

            tl.to(title, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: isMobile ? 0.8 : 1,
                clearProps: 'all'
            }, isMobile ? 0.3 : 0.4);
        }

        // 3. DESCRIPCIÓN - Fade simple
        if (description) {
            gsap.set(description, {
                opacity: 0,
                y: isMobile ? 20 : 30
            });

            tl.to(description, {
                opacity: 1,
                y: 0,
                duration: isMobile ? 0.6 : 0.8,
                clearProps: 'all'
            }, isMobile ? 0.6 : 0.8);
        }

        // 4. CTA - Bounce suave
        if (cta) {
            gsap.set(cta, {
                opacity: 0,
                y: isMobile ? 20 : 30,
                scale: 0.95
            });

            tl.to(cta, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.7,
                ease: 'back.out(1.2)',
                clearProps: 'all'
            }, isMobile ? 0.9 : 1.1);
        }

        /* ─── PARALLAX EN IMAGEN DE FONDO ──────────────────────────────
           Solo tablet y desktop */

        if (heroImage && !isMobile) {
            // En tablet: parallax reducido (15%), desktop: completo (30%)
            var parallaxAmount = isTablet ? 15 : 30;

            ScrollTrigger.create({
                trigger: hero,
                start: 'top top',
                end: 'bottom top',
                scrub: 1,
                onUpdate: function(self) {
                    var yPercent = self.progress * parallaxAmount;
                    gsap.to(heroImage, {
                        yPercent: yPercent,
                        ease: 'none'
                    });
                }
            });
        }

        /* ─── SCROLL HINT ANIMADO ───────────────────────────────────────
           Pulso continuo + fade al scroll */

        var scrollHint = hero.querySelector(
            '.flch-hero__scroll, .scroll-hint, .scroll-indicator, ' +
            '[class*="scroll-down"]'
        );

        if (scrollHint) {
            // Pulso vertical
            gsap.to(scrollHint, {
                y: isMobile ? 8 : 10,
                duration: 1.5,
                repeat: -1,
                yoyo: true,
                ease: 'power1.inOut'
            });

            // Fade out al hacer scroll
            ScrollTrigger.create({
                trigger: hero,
                start: 'top top',
                end: 'bottom top',
                scrub: true,
                onUpdate: function(self) {
                    gsap.to(scrollHint, {
                        opacity: 1 - self.progress,
                        ease: 'none'
                    });
                }
            });
        }

        /* ─── RESPONSIVE: AJUSTES EN RESIZE ────────────────────────────
           Recalcular ScrollTriggers al cambiar orientación */

        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                ScrollTrigger.refresh();
            }, 300);
        });

        console.log('✅ Hero Enhanced cargado (' + (isMobile ? 'Mobile' : isTablet ? 'Tablet' : 'Desktop') + ')');

    }); // end waitForGSAP

})();
