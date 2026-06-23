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

        items.forEach(function (item) {
            ScrollTrigger.create({
                trigger: item,
                start: 'top 88%',
                once: true,
                onEnter: function () {
                    gsap.to(item, {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.55,
                        ease: 'power2.out',
                        clearProps: 'transform,opacity,visibility'
                    });
                }
            });
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
                        root.style.colorScheme = this.isDark ? 'dark' : 'light';
                        localStorage.setItem('flch-theme', this.isDark ? 'dark' : 'light');
                    }
                };
            });

            Alpine.data('flchHome', function () {
                var wpNews = window.letrasNewsData || { news: [], categories: ['Todas'] };

                return {
                    mobile: false,
                    openMenu: null,
                    modal: null,
                    newsFilter: 'Todas',
                    school: 0,

                    news: wpNews.news,
                    newsCats: wpNews.categories,

                    init: function () {
                        this.$nextTick(function () {
                            if (!document.documentElement.hasAttribute('data-reveal-init')) {
                                document.documentElement.setAttribute('data-reveal-init', '1');
                                this.animate();
                            }
                        }.bind(this));
                    },

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

                    heroStats: [
                        { icon:'fa-graduation-cap', value:'10', label:'Escuelas profesionales' },
                        { icon:'fa-compass', value:'4', label:'Centros de producci\u00f3n' },
                        { icon:'fa-flask', value:'I+D', label:'Investigaci\u00f3n' },
                        { icon:'fa-landmark', value:'1551', label:'Decana de Am\u00e9rica' },
                    ],

                    centros: [
                        { icon:'fa-user-graduate', title:'Posgrado', desc:'Maestr\u00edas y doctorados en humanidades, ling\u00fc\u00edstica y comunicaci\u00f3n.', cta:'Ver programas', href:'https://posgradoletras.unmsm.edu.pe/' },
                        { icon:'fa-language', title:'Centro de Idiomas', desc:'Cursos y certificaci\u00f3n en lenguas modernas y originarias.', cta:'Inscr\u00edbete', href:'https://ceidletras.unmsm.edu.pe/' },
                        { icon:'fa-certificate', title:'Examen de Suficiencia', desc:'Acredita tu dominio de idiomas con la OESI de la Facultad.', cta:'Programa tu examen', href:'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/' },
                        { icon:'fa-hands-holding-circle', title:'CERSEU', desc:'Extensi\u00f3n, responsabilidad social y educaci\u00f3n continua.', cta:'Conoce m\u00e1s', href:'https://letras.unmsm.edu.pe/cerseu/' },
                    ],

                    schools: [
                        { n:'01', name:'Arte', desc:'Historia del arte, curadur\u00eda y gesti\u00f3n cultural.', img:'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=800', href:'https://letras.unmsm.edu.pe/escuelas/arte-flch/' },
                        { n:'02', name:'Bibliotecolog\u00eda y CC. de la Informaci\u00f3n', desc:'Gesti\u00f3n del conocimiento y acceso a la informaci\u00f3n.', img:'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=800', href:'https://letras.unmsm.edu.pe/escuelas/bibliotecologia-flch/' },
                        { n:'03', name:'Comunicaci\u00f3n Social', desc:'Periodismo, medios y comunicaci\u00f3n para el cambio.', img:'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800', href:'https://letras.unmsm.edu.pe/escuelas/comunicacion-social-flch/' },
                        { n:'04', name:'Conservaci\u00f3n y Restauraci\u00f3n', desc:'Patrimonio material, ciencia y memoria.', img:'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?w=800', href:'https://letras.unmsm.edu.pe/escuelas/conservacion-y-restauracion-flch/' },
                        { n:'05', name:'Danza', desc:'Cuerpo, coreograf\u00eda e investigaci\u00f3n esc\u00e9nica.', img:'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=800', href:'https://letras.unmsm.edu.pe/escuelas/danza-flch/' },
                        { n:'06', name:'Filosof\u00eda', desc:'Pensamiento cr\u00edtico, \u00e9tica y tradici\u00f3n de las ideas.', img:'https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=800', href:'https://letras.unmsm.edu.pe/escuelas/filosofia-flch/' },
                        { n:'07', name:'Literatura', desc:'Cr\u00edtica, creaci\u00f3n e historia literaria peruana y universal.', img:'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=800', href:'https://letras.unmsm.edu.pe/escuelas/literatura-flch/' },
                        { n:'08', name:'Ling\u00fc\u00edstica', desc:'El lenguaje, las lenguas originarias y el pensamiento.', img:'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=800', href:'https://letras.unmsm.edu.pe/escuelas/linguistica-flch/' },
                        { n:'09', name:'Estudios Generales', desc:'Formaci\u00f3n human\u00edstica com\u00fan de primer ciclo.', img:'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800', href:'https://letras.unmsm.edu.pe/escuelas/estudios-generales-flch/' },
                        { n:'10', name:'Lenguas, Traducci\u00f3n e Interpretaci\u00f3n', desc:'Di\u00e1logo intercultural en varias lenguas.', img:'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800', href:'https://letras.unmsm.edu.pe/escuelas/lenguas-traduccion-e-interpretacion-flch/' },
                    ],

                    adn: ['Humanidades','Investigación','Producción intelectual','Cultura','Patrimonio','Pensamiento crítico'],

                    institutos: [
                        { icon:'fa-solid fa-flask', name:'Institutos de Investigación', desc:'Centros que articulan la investigación humanística.', cta:'Explorar' },
                        { icon:'fa-solid fa-diagram-project', name:'Proyectos destacados', desc:'Líneas con financiamiento y colaboración.', cta:'Ver proyectos' },
                        { icon:'fa-solid fa-feather-pointed', name:'Producción intelectual', desc:'Libros, ensayos y ponencias de la comunidad.', cta:'Ver catálogo' },
                        { icon:'fa-solid fa-scroll', name:'Patrimonio documental', desc:'Archivos, fondos y memoria de las humanidades.', cta:'Descubrir' },
                    ],

                    publicaciones: [
                        { year:'2026', title:'Oralidad y memoria en la sierra central', author:'Instituto de Investigaciones Lingüísticas' },
                        { year:'2025', title:'Vargas Llosa: archivo y crítica', author:'Instituto de Literatura' },
                        { year:'2025', title:'Filosofía política en el Perú contemporáneo', author:'Departamento de Filosofía' },
                    ],

                    lineas: ['Lenguas originarias','Crítica literaria','Filosofía política','Comunicación y sociedad','Patrimonio cultural','Estudios de género'],

                    revistas: [
                        { short:'Letras', name:'Letras (Lima)', field:'Humanidades · Scielo', issn:'ISSN 2071-5072', cover:'https://revistaletras.unmsm.edu.pe/public/journals/1/cover_issue_150_es.png', href:'https://revistaletras.unmsm.edu.pe/index.php/le/issue/view/150' },
                        { short:'L&S', name:'Lengua y Sociedad', field:'Lingüística', issn:'ISSN 1729-9721', cover:'https://revistasinvestigacion.unmsm.edu.pe/public/journals/40/cover_issue_1836_es.png', href:'https://revistasinvestigacion.unmsm.edu.pe/index.php/lys/issue/view/1836' },
                        { short:'E&P', name:'Escritura y Pensamiento', field:'Literatura', issn:'ISSN 1561-0837', cover:'https://revistasinvestigacion.unmsm.edu.pe/public/journals/21/cover_issue_1855_es.jpg', href:'https://revistasinvestigacion.unmsm.edu.pe/index.php/ayp/issue/view/1855' },
                        { short:'Tesis', name:'Tesis (Lima)', field:'Posgrado', issn:'ISSN 2519-7843', cover:'https://revistasinvestigacion.unmsm.edu.pe/public/journals/36/cover_issue_1868_es.png', href:'https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis/issue/view/1868' },
                        { short:'Azul', name:'Revista Azul', field:'Cultura', issn:'ISSN', cover:'https://revistaazulletras.unmsm.edu.pe/public/journals/1/cover_issue_2_es.png', href:'https://revistaazulletras.unmsm.edu.pe/index.php/azul/issue/view/2' },
                    ],

                    agenda: [
                        { type:'Congreso', date:'14 abr 2026', time:'9:00 a.m.', title:'Congreso Internacional de Estudios Literarios', place:'Auditorio FLCH' },
                        { type:'Sustentación', date:'22 abr 2026', time:'4:00 p.m.', title:'Sustentación de tesis doctoral en Lingüística', place:'Sala de Grados' },
                        { type:'Libro', date:'8 may 2026', time:'6:30 p.m.', title:'Presentación de libro: nueva narrativa peruana', place:'Sala Raúl Porras' },
                        { type:'Cultural', date:'17 may 2026', time:'7:00 p.m.', title:'Recital de poesía — Casa de Letras', place:'Patio Central' },
                    ],

                    stats: [
                        { value:10, suffix:'', label:'Escuelas profesionales' },
                        { value:475, suffix:'', label:'Años de trayectoria' },
                        { value:300, suffix:'+', label:'Docentes' },
                        { value:6, suffix:'', label:'Revistas indexadas' },
                    ],

                    logros: [
                        { icon:'fa-solid fa-award', label:'Premio Nobel Vargas Llosa' },
                        { icon:'fa-solid fa-masks-theater', label:'Cine Club & Teatro' },
                        { icon:'fa-solid fa-book-open', label:'Recitales y coloquios' },
                        { icon:'fa-solid fa-globe', label:'Movilidad internacional' },
                    ],

                    animate: function () {
                        var reduce = window.matchMedia('(prefers-reduced-motion:reduce)').matches;
                        var reveals = document.querySelectorAll('.reveal');
                        if (reduce) {
                            reveals.forEach(function (el) { el.classList.add('is-in'); });
                            return;
                        }
                        if (window.gsap && window.ScrollTrigger) {
                            gsap.registerPlugin(ScrollTrigger);
                            reveals.forEach(function (el) {
                                ScrollTrigger.create({ trigger: el, start: 'top 88%', once: true, onEnter: function () { el.classList.add('is-in'); } });
                            });
                            requestAnimationFrame(function () { ScrollTrigger.refresh(); });
                        } else {
                            var io = new IntersectionObserver(function (es) {
                                es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
                            }, { threshold: 0.1 });
                            reveals.forEach(function (el) { io.observe(el); });
                        }
                    },
                };
            });
        });
    }

    initAlpineComponents();

    ready(function () {
        initExternalLinks();
        initFocusMode();
        initSmartHeader();
        initGsapReveals();
    });
})();
