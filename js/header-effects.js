/**
 * LETRAS FLCH — Header Effects
 * Stack: GSAP + ScrollTrigger
 * - Glass effect al scroll
 * - Reading progress bar
 * - Nav underline smooth
 */
(function() {
    'use strict';

    function waitForGSAP(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            cb();
        } else if (attempts < 40) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        }
    }

    waitForGSAP(function() {

        /* ─── 1. Header Glass Effect ──────────────────────────────────
           Backdrop blur + shadow al hacer scroll */

        var headerSelectors = [
            'header.main-header',
            'header.site-header',
            '#masthead',
            'header[role="banner"]'
        ];

        var header = null;
        for (var i = 0; i < headerSelectors.length; i++) {
            header = document.querySelector(headerSelectors[i]);
            if (header) break;
        }

        if (header) {
            ScrollTrigger.create({
                start: 'top -80',
                end: 99999,
                toggleClass: { className: 'is-scrolled', targets: header },
                onUpdate: function(self) {
                    if (self.direction === 1 && self.scroll() > 80) {
                        // Scrolling down
                        gsap.to(header, {
                            backgroundColor: 'rgba(20, 59, 99, 0.95)',
                            backdropFilter: 'blur(16px) saturate(180%)',
                            webkitBackdropFilter: 'blur(16px) saturate(180%)',
                            boxShadow: '0 2px 24px rgba(20,59,99,0.15)',
                            duration: 0.3,
                            ease: 'power2.out'
                        });
                    } else if (self.scroll() < 80) {
                        // At top
                        gsap.to(header, {
                            backgroundColor: 'rgba(20, 59, 99, 1)',
                            backdropFilter: 'blur(0px)',
                            webkitBackdropFilter: 'blur(0px)',
                            boxShadow: 'none',
                            duration: 0.4,
                            ease: 'power2.inOut'
                        });
                    }
                }
            });
        }

        /* ─── 2. Reading Progress Bar ─────────────────────────────────
           Solo en posts y páginas largas */

        var isLongContent = (
            document.body.classList.contains('single') ||
            document.body.classList.contains('page') ||
            document.body.classList.contains('post-type-archive')
        );

        if (isLongContent && document.body.scrollHeight > window.innerHeight * 1.5) {
            var progressBar = document.createElement('div');
            progressBar.id = 'reading-progress';
            progressBar.style.cssText = [
                'position: fixed',
                'top: 0',
                'left: 0',
                'width: 0%',
                'height: 3px',
                'background: linear-gradient(90deg, #A8861C 0%, #C4A822 100%)',
                'z-index: 10001',
                'transform-origin: left',
                'pointer-events: none',
                'transition: width 0.1s ease-out'
            ].join('; ');
            document.body.appendChild(progressBar);

            gsap.to(progressBar, {
                width: '100%',
                ease: 'none',
                scrollTrigger: {
                    trigger: 'body',
                    start: 'top top',
                    end: 'bottom bottom',
                    scrub: 0.3
                }
            });
        }

        /* ─── 3. Nav Links Underline Smooth (FIXED) ───────────────────
           Múltiples selectores para compatibilidad con Elementor */

        var navSelectors = [
            '.main-navigation a:not(.sub-menu a)',
            '.elementor-nav-menu--main > .elementor-nav-menu > li > a',
            '.elementor-nav-menu > li > a',
            '.site-navigation > ul > li > a',
            'nav.main-nav ul.menu > li > a',
            '.primary-menu > li > a',
            'header nav ul > li > a'
        ];

        var navLinks = [];
        navSelectors.forEach(function(sel) {
            var found = document.querySelectorAll(sel);
            if (found.length) {
                navLinks = navLinks.concat(Array.from(found));
            }
        });

        // Eliminar duplicados
        navLinks = navLinks.filter(function(link, index, self) {
            return self.indexOf(link) === index;
        });

        navLinks.forEach(function(link) {
            // Skip si ya tiene indicador o es submenu
            if (link.querySelector('.nav-indicator') ||
                link.closest('.sub-menu, .elementor-nav-menu--dropdown')) {
                return;
            }

            var indicator = document.createElement('span');
            indicator.className = 'nav-indicator';
            indicator.style.cssText = [
                'position: absolute',
                'bottom: -4px',
                'left: 50%',
                'transform: translateX(-50%) scaleX(0)',
                'width: 80%',
                'height: 3px',
                'background: linear-gradient(90deg, #A8861C, #C4A822)',
                'border-radius: 2px',
                'transform-origin: center',
                'pointer-events: none',
                'transition: none'  // GSAP controlará la animación
            ].join('; ');

            // Asegurar posición relativa en el link
            var linkStyle = window.getComputedStyle(link);
            if (linkStyle.position === 'static') {
                link.style.position = 'relative';
            }

            link.appendChild(indicator);

            // Hover in
            link.addEventListener('mouseenter', function() {
                gsap.to(indicator, {
                    scaleX: 1,
                    duration: 0.4,
                    ease: 'power2.out'
                });
            });

            // Hover out
            link.addEventListener('mouseleave', function() {
                // No ocultar si es página activa
                var isActive = (
                    link.classList.contains('current-menu-item') ||
                    link.parentElement.classList.contains('current-menu-item') ||
                    link.getAttribute('aria-current') === 'page'
                );

                if (!isActive) {
                    gsap.to(indicator, {
                        scaleX: 0,
                        duration: 0.3,
                        ease: 'power2.in'
                    });
                }
            });

            // Mostrar en página activa
            if (link.classList.contains('current-menu-item') ||
                link.parentElement.classList.contains('current-menu-item') ||
                link.getAttribute('aria-current') === 'page') {
                gsap.set(indicator, { scaleX: 1 });
            }
        });

        console.log('✅ LETRAS Header Effects cargados');

    }); // end waitForGSAP

})();
