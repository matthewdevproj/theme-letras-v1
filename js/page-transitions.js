/**
 * LETRAS FLCH — Page Transitions
 * Stack: GSAP
 * CRÍTICO: Fallback si GSAP no carga (navegación normal)
 * CRÍTICO: Skip en admin, external links, downloads
 */
(function() {
    'use strict';

    var DOMAIN = window.location.hostname;
    var transitioning = false;
    var overlay = null;

    function waitForGSAP(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined') {
            cb();
        } else if (attempts < 40) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        } else {
            // GSAP no disponible — navegación normal
            console.warn('Page transitions: GSAP no disponible');
        }
    }

    waitForGSAP(function() {

        /* Crear overlay moderno */
        overlay = document.createElement('div');
        overlay.id = 'flch-transition-overlay';
        overlay.style.cssText = [
            'position: fixed',
            'inset: 0',
            'background: linear-gradient(135deg, #143B63 0%, #0E2A48 100%)',
            'z-index: 99999',
            'pointer-events: none',
            'opacity: 0',
            'display: flex',
            'align-items: center',
            'justify-content: center',
            'backdrop-filter: blur(10px)',
            '-webkit-backdrop-filter: blur(10px)'
        ].join('; ');

        // Logo o spinner mejorado
        var spinner = document.createElement('div');
        spinner.style.cssText = [
            'width: 60px',
            'height: 60px',
            'border: 4px solid rgba(168,143,29,0.2)',
            'border-top-color: #A88F1D',
            'border-right-color: #A88F1D',
            'border-radius: 50%',
            'animation: spin 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite'
        ].join('; ');

        overlay.appendChild(spinner);
        document.body.appendChild(overlay);

        // Agregar keyframes para el spinner
        var style = document.createElement('style');
        style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
        document.head.appendChild(style);

        /* Fade IN suave al cargar la página */
        gsap.fromTo(overlay,
            { opacity: 1 },
            {
                opacity: 0,
                duration: 0.6,
                ease: 'power3.out',
                onComplete: function() {
                    overlay.style.pointerEvents = 'none';
                }
            }
        );

        /* Fade IN del body con slide sutil */
        gsap.fromTo('body',
            { opacity: 0, y: 20 },
            {
                opacity: 1,
                y: 0,
                duration: 0.6,
                ease: 'power2.out',
                clearProps: 'all'
            }
        );

        /* Interceptar clicks en links internos */
        document.addEventListener('click', function(e) {
            if (transitioning) return;

            var link = e.target.closest('a[href]');
            if (!link) return;

            var href = link.getAttribute('href');
            if (!href) return;

            // Skip conditions
            var shouldSkip = (
                link.getAttribute('target') === '_blank' ||
                link.hasAttribute('download') ||
                href.startsWith('#') ||
                href.startsWith('mailto:') ||
                href.startsWith('tel:') ||
                href.includes('/wp-admin') ||
                href.includes('/wp-login') ||
                href.includes('/wp-json') ||
                link.classList.contains('no-transition') ||
                (href.startsWith('http') && !href.includes(DOMAIN))
            );

            if (shouldSkip) return;

            e.preventDefault();
            transitioning = true;
            overlay.style.pointerEvents = 'all';

            /* Fade OUT suave con slide */
            gsap.to(overlay, {
                opacity: 1,
                duration: 0.4,
                ease: 'power3.in',
                onComplete: function() {
                    window.location.href = href;
                }
            });

            gsap.to('body', {
                opacity: 0,
                y: -20,
                duration: 0.4,
                ease: 'power2.in'
            });
        });

        /* Botón atrás del browser */
        window.addEventListener('pageshow', function(e) {
            if (e.persisted) {
                // Página cargada desde cache
                transitioning = false;
                overlay.style.pointerEvents = 'none';
                gsap.to(overlay, { opacity: 0, duration: 0.4 });
                gsap.to('body', { opacity: 1, duration: 0.3 });
            }
        });

        /* Timeout de seguridad: si la transición toma >3s, forzar navegación */
        var transitionTimeout;
        document.addEventListener('click', function(e) {
            if (!transitioning) return;

            clearTimeout(transitionTimeout);
            transitionTimeout = setTimeout(function() {
                // Forzar navegación si algo falla
                var link = e.target.closest('a[href]');
                if (link) {
                    window.location.href = link.getAttribute('href');
                }
            }, 3000);
        });

        console.log('✅ LETRAS Page Transitions activas');

    }); // end waitForGSAP

})();
