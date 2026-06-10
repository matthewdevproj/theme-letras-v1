/**
 * LETRAS FLCH - Theme Stack
 * Lightweight progressive enhancement for Alpine, GSAP and core UI components.
 */
(function () {
    'use strict';

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function ready(callback) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    }

    function initExternalLinks() {
        document.querySelectorAll('a[target="_blank"]').forEach(function (link) {
            var rel = (link.getAttribute('rel') || '').split(/\s+/);
            ['noopener', 'noreferrer'].forEach(function (token) {
                if (rel.indexOf(token) === -1) rel.push(token);
            });
            link.setAttribute('rel', rel.filter(Boolean).join(' '));
        });
    }

    function initFocusMode() {
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Tab') {
                document.documentElement.classList.add('flch-using-keyboard');
            }
        });

        document.addEventListener('mousedown', function () {
            document.documentElement.classList.remove('flch-using-keyboard');
        });
    }

    function initSmartHeader() {
        var header = document.querySelector('.main-header');
        if (!header) return;

        var lastY = window.scrollY;
        var ticking = false;

        function update() {
            var currentY = window.scrollY;
            header.classList.toggle('flch-header--scrolled', currentY > 12);
            header.classList.toggle('flch-header--compact', currentY > 160 && currentY > lastY);
            if (currentY < 80 || currentY < lastY) {
                header.classList.remove('flch-header--compact');
            }
            lastY = currentY;
            ticking = false;
        }

        update();
        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });
    }

    function initGsapReveals() {
        var items = document.querySelectorAll('[data-flch-animate]');
        if (!items.length || reducedMotion) return;

        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            items.forEach(function (item) {
                item.classList.add('flch-animate-ready');
            });
            return;
        }

        gsap.registerPlugin(ScrollTrigger);
        gsap.set(items, { autoAlpha: 0, y: 22 });

        ScrollTrigger.batch(items, {
            start: 'top 88%',
            once: true,
            onEnter: function (batch) {
                gsap.to(batch, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.55,
                    stagger: 0.08,
                    ease: 'power2.out',
                    clearProps: 'transform,opacity,visibility'
                });
            }
        });
    }

    function initAlpineComponents() {
        document.addEventListener('alpine:init', function () {
            if (typeof Alpine === 'undefined') return;

            Alpine.data('flchTabs', function (initial) {
                return {
                    active: initial || null,
                    set: function (key) { this.active = key; },
                    is: function (key) { return this.active === key; }
                };
            });

            Alpine.data('flchDisclosure', function (open) {
                return {
                    open: !!open,
                    toggle: function () { this.open = !this.open; },
                    close: function () { this.open = false; }
                };
            });
        });
    }

    initAlpineComponents();

    ready(function () {
        document.documentElement.classList.add('flch-stack-ready');
        initExternalLinks();
        initFocusMode();
        initSmartHeader();
        initGsapReveals();
    });
})();
