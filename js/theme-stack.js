/**
 * LETRAS FLCH - Theme Stack
 * Lightweight progressive enhancement for Alpine, GSAP and core UI components.
 */
(function () {
    'use strict';

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
                document.documentElement.classList.add('kg-using-keyboard');
            }
        });

        document.addEventListener('mousedown', function () {
            document.documentElement.classList.remove('kg-using-keyboard');
        });
    }

    function initSmartHeader() {
        var header = document.querySelector('.main-header');
        if (!header) return;

        var ticking = false;

        function update() {
            header.classList.toggle('kg-header--compact', window.scrollY > 80);
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

    function initMegaMenu() {
        // Sin '>': cubre también los submenús anidados (2º nivel y más).
        // Con solo '.main-menu > li.has-dropdown' los hijos con sub-submenú
        // propio nunca recibían mouseenter/mouseleave y solo se abrían con
        // :focus-within (teclado) — con mouse el usuario no podía verlos.
        var items = document.querySelectorAll('.main-menu li.has-dropdown');
        if (!items.length) return;

        items.forEach(function (item) {
            var closeTimer = null;

            item.addEventListener('mouseenter', function () {
                clearTimeout(closeTimer);
                item.classList.add('is-open');
            });
            item.addEventListener('mouseleave', function () {
                closeTimer = setTimeout(function () {
                    item.classList.remove('is-open');
                }, 140);
            });
        });
    }

    // Invocada vía onclick inline desde Letras_FLCH_Mobile_Walker_Nav
    // (functions.php) — debe quedar en window porque el atributo
    // onclick="" del HTML solo puede llamar funciones globales.
    // Sin esto, expandir un submenú en el menú móvil no hacía nada
    // (ReferenceError silencioso: la función nunca existía).
    window.toggleMobileSubmenu = function (btn) {
        var submenu = btn.parentElement && btn.parentElement.querySelector(':scope > ul.sub-menu');
        if (!submenu) return;
        var isOpen = submenu.classList.toggle('open');
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        var icon = btn.querySelector('i');
        if (icon) icon.classList.toggle('rotate-180', isOpen);
        if (isOpen) {
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
        } else {
            submenu.style.maxHeight = '0';
        }
    };

    function initScrollSpy() {
        var sections = ['admision', 'escuelas', 'revistas', 'noticias']
            .map(function (id) { return document.getElementById(id); })
            .filter(Boolean);
        if (!sections.length || typeof IntersectionObserver === 'undefined') return;

        var links = document.querySelectorAll('.main-menu > li > a[href^="#"]');

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var activeHref = '#' + entry.target.id;
                links.forEach(function (link) {
                    link.classList.toggle('kg-navlink-on', link.getAttribute('href') === activeHref);
                });
            });
        }, { rootMargin: '-45% 0px -50% 0px' });

        sections.forEach(function (section) { observer.observe(section); });
    }

    /**
     * Sistema único de reveal-on-scroll (spec Kingster).
     * Reemplaza los 3 sistemas duplicados anteriores (.reveal + ScrollTrigger.batch,
     * [data-kg-animate] + GSAP, .kg-reveal/.kg-rL/.kg-rR + GSAP): ahora todo pasa
     * por un único IntersectionObserver con estilos inline (gana cualquier cascada
     * CSS) y protege el LCP (nunca oculta lo que ya está sobre el pliegue).
     */
    var kgRevealsInitialized = false;
    function initKgReveals() {
        if (kgRevealsInitialized) return;
        kgRevealsInitialized = true;

        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var fadeEls = Array.prototype.slice.call(document.querySelectorAll('.kg-reveal:not(.kg-rL):not(.kg-rR), .reveal, [data-kg-animate]'));
        var dirEls = Array.prototype.slice.call(document.querySelectorAll('.kg-rL, .kg-rR'));

        if (reduce || typeof IntersectionObserver === 'undefined') {
            fadeEls.forEach(function (el) {
                el.style.opacity = '1';
                el.style.transform = 'none';
                el.classList.add('is-in', 'kg-animate-ready');
            });
            dirEls.forEach(function (el) { el.classList.add('kg-in'); });
            return;
        }

        function siblingIndex(el) {
            var parent = el.parentElement;
            return parent ? Array.prototype.indexOf.call(parent.children, el) : 0;
        }

        function reveal(el) {
            if (el.dataset.kgRevealed) return;
            el.dataset.kgRevealed = '1';
            var delay = Math.min(Math.max(siblingIndex(el), 0) * 70, 350);
            el.style.transitionDelay = delay + 'ms';
            // will-change dinámico: promueve a capa compuesta solo durante la animación
            var restoreWillChange = false;
            if (!el.style.willChange) {
                el.style.willChange = 'transform, opacity';
                restoreWillChange = true;
            }
            el.style.opacity = '1';
            el.style.transform = 'none';
            el.classList.add('is-in', 'kg-animate-ready');
            if (restoreWillChange) {
                setTimeout(function () { el.style.willChange = ''; }, delay + 600);
            }
        }

        // Oculta solo lo que está bajo el pliegue (protege el LCP).
        var vh = window.innerHeight;
        fadeEls.forEach(function (el) {
            if (el.getBoundingClientRect().top >= vh * 0.92) {
                el.style.opacity = '0';
                el.style.transform = 'translateY(12px)';
            }
        });

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { reveal(entry.target); io.unobserve(entry.target); }
            });
        }, { threshold: 0.06, rootMargin: '0px 0px -4% 0px' });
        fadeEls.forEach(function (el) { io.observe(el); });

        var dio = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { entry.target.classList.add('kg-in'); dio.unobserve(entry.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -5% 0px' });
        dirEls.forEach(function (el) { dio.observe(el); });

        // Safety net: revela elementos visibles atascados (evita opacity:0 eterno)
        function revealVisible() {
            var viewport = window.innerHeight + 100;
            fadeEls.forEach(function (el) {
                if (!el.dataset.kgRevealed && el.getBoundingClientRect().top < viewport) {
                    reveal(el);
                }
            });
        }
        setTimeout(revealVisible, 300);
    }

    /**
     * Lenis — smooth scroll ligero (spec Kingster: lerp 0.42).
     * Sincroniza con ScrollTrigger cuando GSAP está cargado en la página
     * y delega los anchors internos (#seccion) con offset -84px (alto del
     * header sticky) y 0.6s de duración.
     */
    function initLenis() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        if (typeof Lenis === 'undefined') return;

        var lenis = new Lenis({
            lerp: 0.42,
            wheelMultiplier: 1.1,
            smoothWheel: true,
            touchMultiplier: 1.2
        });

        var rafId = null;
        function raf(time) {
            lenis.raf(time);
            rafId = requestAnimationFrame(raf);
        }
        function startRaf() {
            if (rafId) return;
            rafId = requestAnimationFrame(raf);
        }
        function stopRaf() {
            if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
        }

        // Pausa RAF cuando no hay scroll activo (idle 2s)
        var idleTimer = null;
        function resetIdle() {
            if (idleTimer) clearTimeout(idleTimer);
            startRaf();
            idleTimer = setTimeout(function () {
                stopRaf();
            }, 2000);
        }

        lenis.on('scroll', resetIdle);
        // Pausa RAF cuando la pestaña está oculta
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) { stopRaf(); }
            else { startRaf(); }
        });

        // Inicia RAF para que Lenis procese el primer scroll
        startRaf();

        if (window.gsap && window.ScrollTrigger) {
            lenis.on('scroll', ScrollTrigger.update);
        }

        document.addEventListener('click', function (e) {
            var link = e.target.closest && e.target.closest('a[href^="#"]');
            if (!link) return;
            var id = link.getAttribute('href').slice(1);
            if (!id) return;
            var target = document.getElementById(id);
            if (!target) return;
            e.preventDefault();
            lenis.scrollTo(target, { offset: -84, duration: 0.6 });
        });
    }

    function initAlpineComponents() {
        document.addEventListener('alpine:init', function () {
            if (typeof Alpine === 'undefined') return;

            Alpine.data('kgTabs', function (initial) {
                return {
                    active: initial || null,
                    set: function (key) { this.active = key; },
                    is: function (key) { return this.active === key; }
                };
            });

            Alpine.data('kgDisclosure', function (open) {
                return {
                    open: !!open,
                    toggle: function () { this.open = !this.open; },
                    close: function () { this.open = false; }
                };
            });

            Alpine.data('kgTheme', function () {
                return {
                    isDark: false,
                    init: function () {
                        var stored = localStorage.getItem('kg-theme');
                        if (stored === 'dark') {
                            this.isDark = true;
                        } else {
                            this.isDark = false;
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
                        // Además de .dark, hay que marcar .light explícitamente:
                        // variables.css tiene un fallback "@media (prefers-color-scheme:
                        // dark) :root:not(.light)" para respetar el tema del SO en la
                        // primera visita. Sin la clase .light, ese fallback seguía
                        // aplicando los colores oscuros aunque el usuario eligiera
                        // "claro" en un sistema con dark mode activado.
                        root.classList.toggle('light', !this.isDark);
                        root.style.colorScheme = this.isDark ? 'dark' : 'light';
                        localStorage.setItem('kg-theme', this.isDark ? 'dark' : 'light');
                    }
                };
            });

            Alpine.data('kgHome', function () {
                var wpNews = window.letrasNewsData || { news: [], categories: ['Todas'] };

                return {
                    newsPage: 0,

                    news: wpNews.news,

                    init: function () {
                        this.$nextTick(function () {
                            initKgReveals();
                        });
                    },

                    newsPages: function () {
                        var pages = [];
                        for (var i = 0; i < this.news.length; i += 3) {
                            pages.push(this.news.slice(i, i + 3));
                        }
                        return pages;
                    },
                    goNewsPage: function (p) { this.newsPage = p; },

                    stats: [
                        { value:10, suffix:'', label:'Escuelas profesionales' },
                        { value:475, suffix:'', label:'Años de trayectoria' },
                        { value:300, suffix:'+', label:'Docentes' },
                        { value:6, suffix:'', label:'Revistas indexadas' },
                    ],

                };
            });
        });
    }

    initAlpineComponents();

    ready(function () {
        initExternalLinks();
        initFocusMode();
        initSmartHeader();
        initMegaMenu();
        initScrollSpy();
        initKgReveals();
        initLenis();
    });
})();
