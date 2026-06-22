<?php
/**
 * letras-performance.php
 * Stack frontend global + optimizaciones de rendimiento
 * letras.unmsm.edu.pe — Junio 2026
 *
 * Problemas resueltos (auditoría 2026-06-04):
 *   #1 WP_DEBUG  → desactivado en wp-config.php (Paso 1)
 *   #2 Gzip      → activado en .htaccess (Paso 2)
 *   #3 Cache     → headers en .htaccess (Paso 2)
 *   #4 FA x7     → desencolar duplicados (este archivo)
 *   #5 XML-RPC   → bloqueado en .htaccess (Paso 2)
 *   #6 Plugins desactivados → desencolar assets (este archivo)
 *   #7 Bootstrap → desencolar de plugin inactivo (este archivo)
 *
 * Librería agregada:
 *   GSAP 3.12.5 + ScrollTrigger (única faltante detectada)
 *
 * YA EXISTENTES (no re-registrar):
 *   alpinejs, tablepress-datatables, swiper,
 *   backbone, backbone-marionette, backbone-radio,
 *   letras-tailwind
 *
 * @package letras-v1
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ══════════════════════════════════════════════════
   SECCIÓN 1: FONT AWESOME — DEDUPLICACIÓN CRÍTICA
   Problema #4: cargado 7 veces → ahorro ~500KB CSS

   ESTRATEGIA:
   - Mantener: ch-fontawesome (CDN 6.4.0) — ya funciona
   - Mantener: elementor-icons-* — necesarios para Elementor
   - Eliminar: letras-fontawesome (duplicado exacto de ch-)
   - Eliminar: font-awesome de post-carousel (viejo, local)
   - Eliminar: wpsm_tabs_r-font-awesome-front (plugin inactivo)
   ══════════════════════════════════════════════════ */
function letras_dedup_fontawesome() {
    // letras-fontawesome = CDN idéntico a ch-fontawesome (DUPLICADO EXACTO)
    wp_dequeue_style( 'letras-fontawesome' );
    wp_deregister_style( 'letras-fontawesome' );

    // font-awesome de post-carousel = versión local antigua
    wp_dequeue_style( 'font-awesome' );
    // No deregistrar globalmente — puede tener dependencias

    // Font Awesome de tabs-responsive-DESACTIVADO
    wp_dequeue_style( 'wpsm_tabs_r-font-awesome-front' );
    wp_deregister_style( 'wpsm_tabs_r-font-awesome-front' );

    // Font Awesome de Elementor (duplicado - conflicto con versión local)
    wp_dequeue_style( 'font-awesome-5-all' );
    wp_deregister_style( 'font-awesome-5-all' );

    // Font Awesome 4 shims de Elementor (no necesario con FA 6)
    wp_dequeue_style( 'font-awesome-4-shim' );
    wp_deregister_style( 'font-awesome-4-shim' );
}
add_action( 'wp_enqueue_scripts', 'letras_dedup_fontawesome', 100 );

// Guardia: si ch-fontawesome fue desregistrado por algo, restaurar
add_action( 'wp_enqueue_scripts', function() {
    if ( ! wp_style_is( 'ch-fontawesome', 'registered' )
      && ! wp_style_is( 'ch-fontawesome', 'enqueued' ) ) {
        wp_enqueue_style(
            'ch-fontawesome',
            get_site_url() . '/assets/libs/fontawesome/all.min.css',
            [],
            '6.4.0'
        );
    }
}, 200 );

/* ══════════════════════════════════════════════════
   SECCIÓN 2: PLUGINS DESACTIVADOS — LIMPIAR ASSETS
   Problema #6 y #7:
   - responsive-tabs-DESACTIVADO → 168KB JS innecesario
   - tabs-responsive-DESACTIVADO → 6.8MB + Bootstrap + FA
   ══════════════════════════════════════════════════ */
function letras_clean_inactive_plugin_assets() {
    // responsive-tabs-DESACTIVADO (168KB JS)
    wp_dequeue_script( 'rtbs-script' );
    wp_deregister_script( 'rtbs-script' );
    wp_dequeue_style( 'rtbs-style' );
    wp_deregister_style( 'rtbs-style' );

    // tabs-responsive-DESACTIVADO (6.8MB total)
    // Bootstrap (~30KB CSS)
    wp_dequeue_style( 'wpsm_tabs_r_bootstrap-front' );
    wp_deregister_style( 'wpsm_tabs_r_bootstrap-front' );
    // JS del plugin
    wp_dequeue_script( 'wpsm_tabs_r_custom-js-front' );
    wp_deregister_script( 'wpsm_tabs_r_custom-js-front' );
}
add_action( 'wp_enqueue_scripts', 'letras_clean_inactive_plugin_assets', 100 );

/* ══════════════════════════════════════════════════
   SECCIÓN 3: LIMPIAR HEAD DE WORDPRESS
   Elimina ~15KB (emojis) + meta tags que exponen info
   ══════════════════════════════════════════════════ */
// Emojis (~15KB + 1 petición HTTP)
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );
remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
remove_filter( 'comment_text_rss',    'wp_staticize_emoji' );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', function( $plugins ) {
    return is_array( $plugins )
        ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
} );

// Meta tags innecesarios
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/* ══════════════════════════════════════════════════
   SECCIÓN 4: RESOURCE HINTS
   Reduce latencia de conexiones a dominios externos
   ══════════════════════════════════════════════════ */
function letras_resource_hints() {
    if ( is_admin() ) return;
    ?>
    <link rel="dns-prefetch" href="//cdn.datatables.net">
    <?php
}
add_action( 'wp_head', 'letras_resource_hints', 1 );

/* ══════════════════════════════════════════════════
   SECCIÓN 5: DEFER EN SCRIPTS NO CRÍTICOS
   Mejora LCP — scripts de analytics no bloquean render
   ══════════════════════════════════════════════════ */
add_filter( 'script_loader_tag', function( $tag, $handle ) {
    if ( is_admin() ) return $tag;

    $defer_handles = [
        'wp-statistics',        // WP Statistics analytics
        'wps-js-tracker',       // WP Statistics tracker
        'google_gtagjs',        // Site Kit GA
        'google_tag',           // Site Kit Tag Manager
        'wpcf7',                // Contact Form 7
        'contact-form-7',       // CF7 alias
    ];

    if ( in_array( $handle, $defer_handles, true ) ) {
        if ( strpos( $tag, ' defer' ) === false ) {
            return str_replace( ' src=', ' defer src=', $tag );
        }
    }

    return $tag;
}, 10, 2 );

/* ══════════════════════════════════════════════════
   SECCIÓN 6: REGISTRAR GSAP 3.12.5
   Única librería que faltaba según auditoría.
   API: gsap.to() gsap.fromTo() gsap.timeline()
   NO usar TweenMax (eso es GSAP 2.x)
   ══════════════════════════════════════════════════ */
function letras_register_gsap() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();

    // GSAP Core 3.12.5
    wp_register_script(
        'gsap',
        $uri . '/js/vendor/gsap.min.js',
        [],
        file_exists( $dir . '/js/vendor/gsap.min.js' ) ? filemtime( $dir . '/js/vendor/gsap.min.js' ) : '3.12.5',
        true // footer
    );

    // ScrollTrigger — animaciones al hacer scroll
    wp_register_script(
        'gsap-scrolltrigger',
        $uri . '/js/vendor/ScrollTrigger.min.js',
        [ 'gsap' ],
        file_exists( $dir . '/js/vendor/ScrollTrigger.min.js' ) ? filemtime( $dir . '/js/vendor/ScrollTrigger.min.js' ) : '3.12.5',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'letras_register_gsap', 5 );

/* ══════════════════════════════════════════════════
   SECCIÓN 7: TAILWIND — CONFIGURACIÓN GLOBAL
   letras-tailwind ya está registrado como archivo LOCAL
   Este código inyecta la config FLCH cuando está encolado
   Tokens de identidad: navy #143B63 + gold #A88F1D
   ══════════════════════════════════════════════════ */
add_action( 'wp_head', function() {
    // Solo inyectar si Tailwind está activo en esta página
    if ( ! wp_style_is( 'letras-tailwind', 'enqueued' )
      && ! wp_script_is( 'tailwindcss', 'enqueued' ) ) {
        return;
    }
    ?>
    <script>
    window.addEventListener('load', function() {
        if (typeof tailwind === 'undefined') return;
        tailwind.config = {
            prefix: 'tw-',
            corePlugins: { preflight: false },
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#143B63',
                            dark:    '#0E2A48',
                            mid:     '#1e5590',
                            faint:   '#F0F5FB',
                            subtle:  '#EEF2FF'
                        },
                        gold: {
                            DEFAULT: '#A88F1D',
                            dark:    '#8B7518',
                            light:   '#C4A822',
                            faint:   '#FEF9E6'
                        }
                    },
                    fontFamily: {
                        sans:  ['"DM Sans"', 'system-ui', 'sans-serif'],
                        serif: ['"Libre Baskerville"', 'Georgia', 'serif']
                    }
                }
            }
        };
    });
    </script>
    <?php
}, 100 );

/* ══════════════════════════════════════════════════
   SECCIÓN 8: PÁGINAS CON STACK COMPLETO
   Activar GSAP en páginas que lo necesiten.
   Agregar slugs según se modernicen páginas.
   Alpine, DataTables, Tailwind ya están globales.
   ══════════════════════════════════════════════════ */
function letras_page_stacks() {
    if ( is_admin() ) return;

    $slug = get_post_field( 'post_name', get_the_ID() );

    // Páginas con animaciones GSAP
    $gsap_pages = [
        'linguistica-flch',  // Lingüística (ID 40672)
        // Agregar más páginas modernizadas aquí:
        // 'escuela-profesional-de-linguistica',
        // 'escuela-profesional-de-comunicacion-social',
        // 'escuela-profesional-de-filosofia',
        // 'escuela-profesional-de-literatura',
        // 'escuela-profesional-de-bibliotecologia',
        // 'uviseg',
    ];

    // Cargar GSAP en home y páginas específicas
    if ( is_front_page() || in_array( $slug, $gsap_pages, true ) ) {
        wp_enqueue_script( 'gsap' );
        wp_enqueue_script( 'gsap-scrolltrigger' );
        // Alpine: ya global (alpinejs)
        // DataTables: ya global (tablepress-datatables)
        // Tailwind: ya global (letras-tailwind)
        // Font Awesome: ya global (ch-fontawesome)
    }
}
add_action( 'wp_enqueue_scripts', 'letras_page_stacks', 30 );

/* ══════════════════════════════════════════════════
   SECCIÓN 9: SEGURIDAD ADICIONAL
   Complementa lo del .htaccess
   ══════════════════════════════════════════════════ */
// XML-RPC ya bloqueado en .htaccess — doble seguro vía PHP
add_filter( 'xmlrpc_enabled', '__return_false' );

// Limitar revisiones de posts (reduce tamaño BD 3.35GB)
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
    define( 'WP_POST_REVISIONS', 5 );
}

// Lazy loading nativo en imágenes
add_filter( 'wp_lazy_loading_enabled', '__return_true' );

/* ══════════════════════════════════════════════════
   SECCIÓN 10: GOOGLE FONTS — LETRAS FLCH
   DM Sans + Libre Baskerville (identidad tipográfica)
   Solo agrega si el tema no lo carga ya
   ══════════════════════════════════════════════════ */
// DESACTIVADO (consolidado en functions.php): function letras_google_fonts() {
// DESACTIVADO (consolidado en functions.php):     // No duplicar si ya está registrado
// DESACTIVADO (consolidado en functions.php):     if ( wp_style_is( 'letras-google-fonts', 'enqueued' )
// DESACTIVADO (consolidado en functions.php):       || wp_style_is( 'letras-fonts', 'enqueued' ) ) {
// DESACTIVADO (consolidado en functions.php):         return;
// DESACTIVADO (consolidado en functions.php):     }
// DESACTIVADO (consolidado en functions.php): 
// DESACTIVADO (consolidado en functions.php):     wp_enqueue_style(
// DESACTIVADO (consolidado en functions.php):         'letras-google-fonts',
// DESACTIVADO (consolidado en functions.php):         'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&display=swap',
// DESACTIVADO (consolidado en functions.php):         [],
// DESACTIVADO (consolidado en functions.php):         null
// DESACTIVADO (consolidado en functions.php):     );
// DESACTIVADO (consolidado en functions.php): }
// DESACTIVADO (consolidado en functions.php): add_action( 'wp_enqueue_scripts', 'letras_google_fonts', 5 );

/* ══════════════════════════════════════════════════
   SECCIÓN 11: DATATABLES AUTO-INIT
   Mejora la inicialización de DataTables en tablas
   que están inicialmente ocultas (tabs Alpine)
   ══════════════════════════════════════════════════ */
function letras_datatables_helper() {
    // Solo en frontend
    if ( is_admin() ) return;

    ?>
    <script>
    (function() {
        // Esperar a que jQuery y DataTables estén disponibles
        function initDataTablesWhenReady() {
            if (typeof jQuery === 'undefined' || typeof jQuery.fn.DataTable === 'undefined') {
                setTimeout(initDataTablesWhenReady, 100);
                return;
            }

            var $ = jQuery;
            var initialized = [];

            // Función para inicializar DataTables en una tabla
            function initTable($table) {
                if (!$table.length) return false;
                if ($.fn.DataTable.isDataTable($table[0])) return false;
                if (initialized.indexOf($table[0]) !== -1) return false;

                try {
                    $table.DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                        },
                        pageLength: 25,
                        order: [[0, 'asc']],
                        responsive: true,
                        autoWidth: false,
                        info: true,
                        searching: true,
                        paging: true
                    });
                    initialized.push($table[0]);
                    return true;
                } catch(e) {
                    console.warn('DataTables init error:', e);
                    return false;
                }
            }

            // Inicializar tablas visibles inmediatamente
            function initVisibleTables() {
                $('table.tbl, table.dataTable, table.tablepress').each(function() {
                    var $this = $(this);
                    // Solo inicializar si está visible o su contenedor está visible
                    if ($this.is(':visible') || $this.closest('[x-show]').length === 0) {
                        initTable($this);
                    }
                });
            }

            // Observar cambios de visibilidad (para tabs Alpine)
            if (typeof MutationObserver !== 'undefined') {
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'style' ||
                            mutation.attributeName === 'class') {
                            var $target = $(mutation.target);
                            // Si un contenedor se vuelve visible, inicializar tablas dentro
                            if ($target.is(':visible')) {
                                $target.find('table.tbl, table.dataTable, table.tablepress').each(function() {
                                    initTable($(this));
                                });
                            }
                        }
                    });
                });

                // Observar el body para cambios de estilo
                observer.observe(document.body, {
                    attributes: true,
                    attributeFilter: ['style', 'class'],
                    subtree: true
                });
            }

            // Init inicial
            $(document).ready(function() {
                initVisibleTables();

                // Reintentar después de que Alpine pueda haber hidratado
                setTimeout(initVisibleTables, 500);
                setTimeout(initVisibleTables, 1000);
            });

            // Hook para Alpine cuando cambia de tab
            document.addEventListener('alpine:initialized', function() {
                setTimeout(initVisibleTables, 100);
            });

            // Exponer función global por si scripts externos la necesitan
            window.letrasInitDataTables = initVisibleTables;
        }

        initDataTablesWhenReady();
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'letras_datatables_helper', 999 );

/* ══════════════════════════════════════════════════════════════
   FIX ELEMENTOR — Eliminar Roboto y forzar DM Sans globalmente
   Problema: Kit de Elementor cargaba Roboto desde Google Fonts
   causando inconsistencias en redes lentas o con bloqueo.
   Solución: Override de variables CSS de Elementor en wp_head
   ══════════════════════════════════════════════════════════ */

// Eliminar Roboto de la cola de Google Fonts de Elementor
add_filter('elementor/frontend/print_google_fonts', function($fonts) {
    // Eliminar cualquier fuente Roboto de la lista
    foreach($fonts as $key => $font) {
        if(strpos($font, 'Roboto') !== false) {
            unset($fonts[$key]);
        }
    }
    return $fonts;
}, 10, 1);

// Forzar variables FLCH en Elementor (priority 1 = antes que Elementor CSS)
add_action('wp_head', function() {
    echo '<style id="flch-elementor-override">
    /* Override variables globales de Elementor con identidad FLCH */
    :root {
        --e-global-typography-primary-font-family: "DM Sans" !important;
        --e-global-typography-secondary-font-family: "Libre Baskerville" !important;
        --e-global-typography-text-font-family: "DM Sans" !important;
        --e-global-typography-accent-font-family: "DM Sans" !important;
        --e-global-color-primary: #143B63 !important;
        --e-global-color-secondary: #0E2A48 !important;
        --e-global-color-text: #334155 !important;
        --e-global-color-accent: #A88F1D !important;
    }
    
    /* Aplicar DM Sans a elementos de Elementor como fallback final */
    .elementor-widget-container,
    .elementor-heading-title,
    .elementor-text-editor,
    .elementor-widget-text-editor,
    body.elementor-page {
        font-family: "DM Sans", -apple-system, BlinkMacSystemFont, 
                     "Segoe UI", sans-serif !important;
    }
    
    /* Headings con Libre Baskerville */
    .elementor-heading-title.elementor-size-default,
    .elementor-heading-title.elementor-size-large {
        font-family: "Libre Baskerville", Georgia, serif !important;
    }
    </style>
';
}, 1);

/* ══════════════════════════════════════════════════════════════
   GSAP SCRIPTS — Home Animations, Page Transitions, Header Effects
   Solo se cargan cuando GSAP está disponible
   ══════════════════════════════════════════════════════════ */

// 1. Home Animations (solo front page)
add_action('wp_enqueue_scripts', function() {
    if (!is_front_page()) return;

    wp_enqueue_script(
        'letras-home-animations',
        get_template_directory_uri() . '/js/home-animations.js',
        ['gsap', 'gsap-scrolltrigger'],
        filemtime(get_template_directory() . '/js/home-animations.js'),
        true
    );
}, 35);

// 2. Page Transitions (GLOBAL en todo el sitio)
add_action('wp_enqueue_scripts', function() {
    if (is_admin()) return;

    // Cargar GSAP si aún no está encolado (para transitions)
    if (!wp_script_is('gsap', 'enqueued')) {
        wp_enqueue_script('gsap');
    }

    // Encolar transitions en TODAS las páginas para experiencia fluida
    wp_enqueue_script(
        'letras-page-transitions',
        get_template_directory_uri() . '/js/page-transitions.js',
        ['gsap'],
        filemtime(get_template_directory() . '/js/page-transitions.js'),
        true
    );
}, 36);

// 3. Header Effects (global con GSAP)
add_action('wp_enqueue_scripts', function() {
    if (is_admin()) return;

    $slug = get_post_field('post_name', get_the_ID());
    $gsap_pages = ['linguistica-flch'];

    if (is_front_page() || in_array($slug, $gsap_pages, true)) {
        wp_enqueue_script(
            'letras-header-effects',
            get_template_directory_uri() . '/js/header-effects.js',
            ['gsap', 'gsap-scrolltrigger'],
            filemtime(get_template_directory() . '/js/header-effects.js'),
            true
        );
    }
}, 37);


/* ══════════════════════════════════════════════════════════════
   ALPINE COMPONENTS — Componentes globales del tema
   Alpine ya está registrado como 'alpinejs' — NUNCA re-registrar
   ══════════════════════════════════════════════════════════ */
add_action('wp_footer', function() {
    ?>
    <script>
    // Componentes Alpine para el tema
    document.addEventListener('alpine:init', function() {

        // ─── Back to Top Button ───────────────────────────────────
        Alpine.data('backToTop', function() {
            return {
                visible: false,
                init: function() {
                    var self = this;
                    var threshold = 300;

                    window.addEventListener('scroll', function() {
                        self.visible = window.scrollY > threshold;
                    }, { passive: true });
                },
                scrollToTop: function() {
                    if (typeof gsap !== 'undefined' && gsap.plugins && gsap.plugins.ScrollToPlugin) {
                        gsap.to(window, {
                            scrollTo: { y: 0 },
                            duration: 0.8,
                            ease: 'power2.inOut'
                        });
                    } else {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                }
            };
        });

        // ─── Animated Counter ─────────────────────────────────────
        // Uso: <span x-data="counter(120, 2000)" x-text="value"></span>
        Alpine.data('counter', function(target, duration) {
            return {
                target: target || 0,
                duration: duration || 2000,
                value: 0,
                started: false,
                start: function() {
                    if (this.started) return;
                    this.started = true;

                    var self = this;
                    var startTime = null;

                    function animate(ts) {
                        if (!startTime) startTime = ts;
                        var progress = Math.min((ts - startTime) / self.duration, 1);
                        var ease = 1 - Math.pow(1 - progress, 3);  // easeOutCubic
                        self.value = Math.round(ease * self.target);
                        if (progress < 1) requestAnimationFrame(animate);
                    }

                    // Activar con IntersectionObserver
                    var obs = new IntersectionObserver(function(entries) {
                        if (entries[0].isIntersecting) {
                            requestAnimationFrame(animate);
                            obs.disconnect();
                        }
                    }, { threshold: 0.5 });

                    obs.observe(this.$el);
                }
            };
        });

        // ─── Read More / Show More ────────────────────────────────
        // Uso: <div x-data="readMore(150)">
        Alpine.data('readMore', function(limit) {
            return {
                limit: limit || 150,
                expanded: false,
                get truncated() {
                    if (this.expanded) return this.$el.dataset.fullText || '';
                    var text = this.$el.dataset.fullText || this.$el.textContent;
                    return text.length > this.limit
                        ? text.substring(0, this.limit) + '...'
                        : text;
                },
                toggle: function() {
                    this.expanded = !this.expanded;
                }
            };
        });

        // ─── Tooltip Component ────────────────────────────────────
        // Uso: <button x-data="tooltip('Texto del tooltip')">
        Alpine.data('tooltip', function(content) {
            return {
                content: content,
                show: false,
                toggle: function() { this.show = !this.show; },
                hide: function() { this.show = false; }
            };
        });

        // ─── Modal/Dialog Component ───────────────────────────────
        Alpine.data('modal', function() {
            return {
                open: false,
                show: function() {
                    this.open = true;
                    document.body.style.overflow = 'hidden';
                },
                close: function() {
                    this.open = false;
                    document.body.style.overflow = '';
                },
                escapeHandler: function(e) {
                    if (e.key === 'Escape' && this.open) {
                        this.close();
                    }
                }
            };
        });

    }); // end alpine:init
    </script>
    <?php
}, 15);

/* ══════════════════════════════════════════════════════════════
   NUEVOS SCRIPTS — Mejoras Junio 2026
   Hero Enhanced, Lightbox GSAP, Arte Effects
   Con soporte responsive completo (mobile, tablet, desktop)
   ══════════════════════════════════════════════════════════ */

// 4. Hero Enhanced (solo front page)
add_action('wp_enqueue_scripts', function() {
    if (!is_front_page()) return;

    wp_enqueue_script(
        'letras-hero-enhanced',
        get_template_directory_uri() . '/js/hero-enhanced.js',
        ['gsap', 'gsap-scrolltrigger'],
        filemtime(get_template_directory() . '/js/hero-enhanced.js'),
        true
    );
}, 38);

// 5. Lightbox GSAP (global - galerías en cualquier página)
add_action('wp_enqueue_scripts', function() {
    if (is_admin()) return;

    // Cargar en páginas con galerías
    $has_gallery = (
        has_shortcode(get_post_field('post_content', get_the_ID()), 'gallery') ||
        is_singular() ||
        is_page()
    );

    if ($has_gallery || is_front_page()) {
        wp_enqueue_script(
            'letras-lightbox',
            get_template_directory_uri() . '/js/lightbox.js',
            ['gsap'],
            filemtime(get_template_directory() . '/js/lightbox.js'),
            true
        );
    }
}, 40);

// 6. Arte FLCH Effects — REMOVIDO
// Las animaciones personalizadas de arte-flch han sido eliminadas
// Se mantienen las animaciones generales del tema (GSAP global)


/* ══════════════════════════════════════════════════════════════
   SECCIÓN 12: ADMIN BAR COMPATIBILITY FIX
   Fix para espacio blanco de 262px cuando admin está logueado
   Implementado: 2026-06-08
   ══════════════════════════════════════════════════════════ */

add_action('wp_head', function() {
    if (!is_admin_bar_showing()) return;

    ?>
    <style id="flch-admin-bar-fix">
    /* Admin bar compensation - prevents 262px white space */
    body.admin-bar .main-header {
        top: 32px !important;
    }

    @media screen and (max-width: 782px) {
        body.admin-bar .main-header {
            top: 46px !important;
        }
    }

    /* Fix Elementor full-height sections */
    body.admin-bar #ar,
    body.admin-bar .elementor-section-height-full {
        min-height: calc(100vh - 32px) !important;
    }

    @media screen and (max-width: 782px) {
        body.admin-bar #ar,
        body.admin-bar .elementor-section-height-full {
            min-height: calc(100vh - 46px) !important;
        }
    }

    /* Elementor sticky elements */
    body.admin-bar .elementor-sticky--effects {
        top: 32px !important;
    }

    @media screen and (max-width: 782px) {
        body.admin-bar .elementor-sticky--effects {
            top: 46px !important;
        }
    }

    /* Mobile menu panel height compensation */
    body.admin-bar .mobile-menu-panel {
        max-height: calc(100dvh - 60px - 46px) !important;
    }

    @media screen and (min-width: 641px) and (max-width: 782px) {
        body.admin-bar .mobile-menu-panel {
            max-height: calc(100dvh - 68px - 46px) !important;
        }
    }

    @media screen and (min-width: 783px) {
        body.admin-bar .mobile-menu-panel {
            max-height: calc(100dvh - 76px - 32px) !important;
        }
    }
    </style>
    <?php
}, 999); // Priority 999 para override cualquier otro CSS

/* ══════════════════════════════════════════════════════════════
   SECCIÓN 13: LIMPIEZA ADICIONAL DE ELEMENTOR Y PLUGINS
   Optimizaciones críticas de rendimiento
   ══════════════════════════════════════════════════════════ */

add_action('wp_enqueue_scripts', function() {
    if (is_admin()) return;

    // 1. FontAwesome 4 Shims JS (no necesario con FA 6)
    wp_dequeue_script('font-awesome-4-shim');
    wp_deregister_script('font-awesome-4-shim');

    // 2. TinyMCE en frontend (NUNCA debería estar aquí - ~400KB)
    wp_dequeue_script('wp-tinymce');
    wp_dequeue_script('wp-tinymce-root');
    wp_deregister_script('wp-tinymce');
    wp_deregister_script('wp-tinymce-root');

    // 3. Elementor Icons - solo cargar si se detecta uso de Elementor
    global $post;
    if ($post) {
        $is_elementor_page = get_post_meta($post->ID, '_elementor_edit_mode', true);
        $has_elementor_shortcode = has_shortcode($post->post_content, 'elementor-template');

        // Si NO es página de Elementor, eliminar sus iconos
        if (!$is_elementor_page && !$has_elementor_shortcode) {
            wp_dequeue_style('elementor-icons');
        }
    }

}, 999); // Prioridad alta para override todo
