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

            Alpine.data('flchTheme', function () {
                return {
                    isDark: false,
                    init: function () {
                        var stored = localStorage.getItem('flch-theme');
                        if (stored === 'dark') {
                            this.isDark = true;
                        } else if (stored === 'light') {
                            this.isDark = false;
                        } else {
                            this.isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                        }
                        this.apply();
                    },
                    toggle: function () {
                        this.isDark = !this.isDark;
                        this.apply();
                    },
                    apply: function () {
                        var root = document.documentElement;
                        root.classList.toggle('dark', this.isDark);
                        root.style.colorScheme = this.isDark ? 'dark' : 'light';
                        localStorage.setItem('flch-theme', this.isDark ? 'dark' : 'light');
                    }
                };
            });

            Alpine.data('flchHome', function () {
                return {
                    news: [
                        { id:1, cat:'Convocatoria', date:'3 marzo 2026', title:'Becas de movilidad estudiantil 2026-I', excerpt:'Postula a los programas de intercambio nacional e internacional para estudiantes de pregrado.', img:'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=900' },
                        { id:2, cat:'Evento', date:'28 febrero 2026', title:'Coloquio Internacional de Lingüística Andina', excerpt:'Tres días de mesas, conferencias y diálogo sobre las lenguas originarias del Perú.', img:'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=900' },
                        { id:3, cat:'Investigación', date:'15 febrero 2026', title:'Nueva revista científica indexada de la Facultad', excerpt:'La FLCH suma una publicación arbitrada a su producción intelectual en humanidades.', img:'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=900' },
                        { id:4, cat:'Convocatoria', date:'10 febrero 2026', title:'Concurso de ensayo «Letras Vivas» 2026', excerpt:'Abierta la recepción de trabajos para estudiantes de las diez escuelas profesionales.', img:'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=900' },
                        { id:5, cat:'Evento', date:'5 febrero 2026', title:'Ciclo de Cine Club Letras: cine peruano', excerpt:'Proyecciones y conversatorios cada jueves en el auditorio de la Facultad.', img:'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=900' },
                        { id:6, cat:'Investigación', date:'30 enero 2026', title:'Grupo de estudio en Filosofía de la mente', excerpt:'Convocatoria a estudiantes interesados en sumarse a la línea de investigación 2026.', img:'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=900' },
                    ],
                    newsCats: ['Todas','Convocatoria','Evento','Investigación'],
                    newsFilter: 'Todas',
                    modal: null,
                    filteredNews: function () {
                        return this.newsFilter === 'Todas'
                            ? this.news
                            : this.news.filter(function (n) { return n.cat === this.newsFilter; }.bind(this));
                    },
                    newsCount: function (c) {
                        return c === 'Todas'
                            ? this.news.length
                            : this.news.filter(function (n) { return n.cat === c; }).length;
                    },
                    trapFocus: function (e) {
                        var panel = this.$refs.modalPanel;
                        if (!panel || !this.modal) return;
                        var focusable = panel.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                        if (!focusable.length) return;
                        var first = focusable[0], last = focusable[focusable.length - 1];
                        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
                        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
                    },
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
