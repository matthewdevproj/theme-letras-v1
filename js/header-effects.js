/**
 * LETRAS FLCH — Header Effects
 * Stack: GSAP + ScrollTrigger
 * - Glass effect al scroll
 * - Reading progress bar
 * - Nav underline smooth
 */
(function() {
    'use strict';

    var waitForGSAP = (window.flchGSAP && window.flchGSAP.waitForGSAP) || function(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            cb();
        } else if (attempts < 40) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        }
    };

    waitForGSAP(function() {

        /* ─── 1. Header Glass Effect ──────────────────────────────────
           Backdrop blur + shadow al hacer scroll */

        var headerSelectors = [
            'header.main-header',
            'header.site-header',
            '#masthead',
            'header[role="banner"]'
        ];

        // gsap-utils: toArray finds all matches, grab first
        var header = gsap.utils.toArray(headerSelectors.join(', '))[0];

        if (header) {
            // gsap-performance: avoid creating tweens on every scroll update
            // Use CSS transitions with toggleClass instead of GSAP onUpdate
            // The 'is-scrolled' class triggers CSS transition defined in style.css
            ScrollTrigger.create({
                start: 'top -80',
                end: 99999,
                toggleClass: { className: 'is-scrolled', targets: header }
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

        // gsap-utils: toArray handles selector, dedup, and scoping
        var navLinks = gsap.utils.toArray(navSelectors.join(', '));

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

            // gsap-performance: create tween once, play/reverse on hover
            // instead of creating new tweens on every mouseenter/mouseleave
            var isActivePage = function() {
                return link.classList.contains('current-menu-item') ||
                    link.parentElement.classList.contains('current-menu-item') ||
                    link.getAttribute('aria-current') === 'page';
            };

            var hoverTween = gsap.to(indicator, {
                scaleX: 1,
                duration: 0.4,
                ease: 'power2.out',
                paused: true,
                reversed: true
            });

            // Mostrar en página activa desde el inicio
            if (isActivePage()) {
                hoverTween.progress(1);
            }

            link.addEventListener('mouseenter', function() {
                hoverTween.play();
            });

            link.addEventListener('mouseleave', function() {
                if (!isActivePage()) {
                    hoverTween.reverse();
                }
            });
        });

        console.log('✅ LETRAS Header Effects cargados');

    }); // end waitForGSAP

})();
