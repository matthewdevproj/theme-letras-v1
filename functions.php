<?php
/**
 * Letras FLCH — Theme Functions
 *
 * @package LetrasFLCH
 */

// ═══════════════════════════════════════════════════════════
// 0. CONFIGURACIÓN GENERAL
// ═══════════════════════════════════════════════════════════

// ACTIVAR HEADER MODERNO: Cambiar a true para usar header-modern.php
define('LETRAS_USE_MODERN_HEADER', true);

// WhatsApp number for contact button
define('LETRAS_WHATSAPP_NUMBER', '51982086285');

// ═══════════════════════════════════════════════════════════
// 1. THEME SETUP
// ═══════════════════════════════════════════════════════════

function letras_flch_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'wp-body-open' );

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ) );

    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-color-palette', array(
        array( 'name' => esc_html__( 'Azul institucional', 'letrasflch' ), 'slug' => 'primary-dark',  'color' => '#143B63' ),
        array( 'name' => esc_html__( 'Dorado',             'letrasflch' ), 'slug' => 'accent-gold',   'color' => '#A8861C' ),
        array( 'name' => esc_html__( 'Blanco',             'letrasflch' ), 'slug' => 'white',          'color' => '#FFFFFF' ),
        array( 'name' => esc_html__( 'Gris claro',         'letrasflch' ), 'slug' => 'gray-light',     'color' => '#F5F7FA' ),
    ) );

    register_nav_menus( array(
        'primary' => esc_html__( 'Menú Principal', 'letrasflch' ),
        'footer'  => esc_html__( 'Menú Footer',    'letrasflch' ),
    ) );

    add_image_size( 'card-thumbnail',   800,  450, true );
    add_image_size( 'card-square',      400,  400, true );
    add_image_size( 'archive-featured', 1200, 675, true );
}
add_action( 'after_setup_theme', 'letras_flch_setup' );

// ═══════════════════════════════════════════════════════════
// 2. MENU WALKERS
// ═══════════════════════════════════════════════════════════

class Letras_FLCH_Walker_Nav extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        // Clases eliminadas - los estilos están en css/header.css
        $output .= "\n{$indent}<ul class=\"sub-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent       = $depth ? str_repeat( "\t", $depth ) : '';
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        // Clases eliminadas - los estilos están en css/header.css
        $li_cls = array_filter( array( $has_children ? 'has-dropdown' : '' ) );
        $li_cls = apply_filters( 'nav_menu_css_class', $li_cls, $item, $args, $depth );
        $li_cls = $li_cls ? ' class="' . esc_attr( implode( ' ', $li_cls ) ) . '"' : '';

        $output .= $indent . '<li' . $li_cls . '>';

        // Clases eliminadas - los estilos están en css/header.css
        $link_cls = '';
        if ( $has_children && $depth === 0 ) {
            $link_cls = 'has-children'; // Clase semántica para referencia
        }

        $atts = array(
            'href'  => ! empty( $item->url ) ? $item->url : '#',
            'class' => $link_cls,
        );
        $attrs = '';
        foreach ( $atts as $k => $v ) {
            $attrs .= ' ' . $k . '="' . esc_attr( $v ) . '"';
        }

        $item_output  = $args->before . '<a' . $attrs . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        if ( $has_children ) {
            $icon         = $depth === 0 ? 'fa-chevron-down group-hover:rotate-180' : 'fa-chevron-right';
            $item_output .= '<i class="' . ( $depth === 0 ? 'ml-1' : 'ml-2' ) . ' text-xs fas ' . $icon . ' transition-transform duration-200" aria-hidden="true"></i>';
        }
        $item_output .= '</a>' . $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= str_repeat( "\t", $depth ) . "</ul>\n";
    }
}

class Modern_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n{$indent}<ul class=\"sub-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = $depth ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        // Clases del <li>
        $li_classes = array('relative');
        if ($has_children) {
            $li_classes[] = 'group';
            $li_classes[] = 'has-dropdown';
        }
        $li_classes = apply_filters('nav_menu_css_class', $li_classes, $item, $args, $depth);
        $li_class = implode(' ', array_filter($li_classes));

        // Clases del <a>
        if ($depth === 0) {
            $link_class = 'px-4 py-2 text-sm font-medium text-white/90 hover:text-gold-400 transition-colors rounded-lg hover:bg-white/5 flex items-center gap-1';
        } else {
            $link_class = 'block px-4 py-3 text-sm text-gray-700 hover:bg-navy-50 hover:text-navy-900 transition-colors';
        }

        $output .= $indent . '<li class="' . esc_attr($li_class) . '">';

        // Atributos del link
        $atts = array(
            'href' => !empty($item->url) ? $item->url : '#',
            'class' => $link_class,
        );
        // aria-current para navegación por teclado
        if (in_array('current-menu-item', $classes)) {
            $atts['aria-current'] = 'page';
        }
        if (!empty($item->attr_title)) {
            $atts['title'] = $item->attr_title;
        }
        if (!empty($item->target)) {
            $atts['target'] = $item->target;
        }

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // Icono de dropdown para todos los niveles
        if ($has_children) {
            if ($depth === 0) {
                $item_output .= ' <i class="ml-1 text-xs fas fa-chevron-down transition-transform duration-200"></i>';
            } else {
                $item_output .= ' <i class="ml-auto text-xs fas fa-chevron-right transition-transform duration-200"></i>';
            }
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "{$indent}</ul>\n";
    }
}

class Letras_FLCH_Mobile_Walker_Nav extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "\n" . str_repeat( "\t", $depth ) . "<ul class=\"sub-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent       = $depth ? str_repeat( "\t", $depth ) : '';
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        $li_cls = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );
        $li_cls = $li_cls ? ' class="' . esc_attr( implode( ' ', $li_cls ) ) . '"' : '';

        $output .= $indent . '<li' . $li_cls . '>';

        $href  = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $title = $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        // aria-current para navegación por teclado
        $aria_current = in_array( 'current-menu-item', $classes, true ) ? ' aria-current="page"' : '';

        $item_output = $args->before;
        if ( $has_children ) {
            $item_output .= '<a href="' . $href . '"' . $aria_current . '>' . $title . '</a>'
                . '<button class="mobile-submenu-toggle" onclick="toggleMobileSubmenu(this);return false;" aria-expanded="false" aria-label="' . esc_attr__( 'Expandir submenú', 'letrasflch' ) . '">'
                . '<i class="fas fa-chevron-down" aria-hidden="true"></i>'
                . '</button>';
        } else {
            $item_output .= '<a href="' . $href . '"' . $aria_current . '>' . $title . '</a>';
        }
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= str_repeat( "\t", $depth ) . "</ul>\n";
    }
}

// ═══════════════════════════════════════════════════════════
// 3. SIDEBARS
// ═══════════════════════════════════════════════════════════

function letras_flch_widgets_init() {
    $defaults = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    );

    register_sidebar( array_merge( $defaults, array(
        'name'        => esc_html__( 'Sidebar del Blog',    'letrasflch' ),
        'id'          => 'blog-sidebar',
        'description' => esc_html__( 'Widgets para el listado de noticias.', 'letrasflch' ),
    ) ) );

    register_sidebar( array_merge( $defaults, array(
        'name'        => esc_html__( 'Sidebar de Artículo', 'letrasflch' ),
        'id'          => 'post-sidebar',
        'description' => esc_html__( 'Widgets para la vista de artículo individual.', 'letrasflch' ),
    ) ) );

    register_sidebar( array_merge( $defaults, array(
        'name'        => esc_html__( 'Sidebar de Archivo',  'letrasflch' ),
        'id'          => 'archive-sidebar',
        'description' => esc_html__( 'Widgets para páginas de archivo.', 'letrasflch' ),
    ) ) );
}
add_action( 'widgets_init', 'letras_flch_widgets_init' );

// ═══════════════════════════════════════════════════════════
// 4. ENQUEUE SCRIPTS & STYLES
// ═══════════════════════════════════════════════════════════

function letras_flch_enqueue_scripts() {
    $uri     = get_template_directory_uri();
    $dir     = get_template_directory();
    $version = wp_get_theme()->get( 'Version' ) ?: '1.0';

    // Google Fonts CODICE (Hanken Grotesk + Newsreader) — CDN + autoalojadas
    wp_enqueue_style(
        'letras-fonts-cdn',
        'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;500;600;700&family=Newsreader:opsz,wght@6..72,400;6..72,500;6..72,600;6..72,700&display=swap',
        array(), null
    );
    wp_enqueue_style(
        'letras-fonts-consolidated',
        get_template_directory_uri() . '/css/fonts.css',
        array('letras-fonts-cdn'), null
    );

    // Font Awesome 6 (local)
    wp_enqueue_style(
        'letras-fontawesome',
        get_site_url() . '/assets/libs/fontawesome/all.min.css',
        array(), '6.4.0'
    );

    // FontAwesome global fix (asegura rendering correcto)
    wp_enqueue_style(
        'letras-fontawesome-fix',
        $uri . '/css/fontawesome-fix.css',
        array( 'letras-fontawesome' ),
        $version
    );

    // CSS pipeline: variables → tailwind → main → header → theme → responsive → modern-ui
    wp_enqueue_style( 'letras-variables',  $uri . '/css/variables.css',  array(),                                    $version );
    wp_enqueue_style(
        'letras-tailwind',
        $uri . '/css/tailwind.css',
        array( 'letras-variables' ),
        file_exists( $dir . '/css/tailwind.css' ) ? filemtime( $dir . '/css/tailwind.css' ) : $version
    );
    wp_enqueue_style( 'letras-main',       $uri . '/css/main.css',       array( 'letras-tailwind' ),                 $version );
    wp_enqueue_style(
        'letras-header',
        $uri . '/css/header.css',
        array( 'letras-main' ),
        file_exists( $dir . '/css/header.css' ) ? filemtime( $dir . '/css/header.css' ) : $version
    );
    wp_enqueue_style( 'letras-theme',      get_stylesheet_uri(),         array( 'letras-header' ),                   $version );
    wp_enqueue_style( 'letras-responsive', $uri . '/css/responsive.css', array( 'letras-theme' ),                    $version );
    wp_enqueue_style(
        'letras-modern-ui',
        $uri . '/css/modern-ui.css',
        array( 'letras-theme', 'letras-responsive' ),
        file_exists( $dir . '/css/modern-ui.css' ) ? filemtime( $dir . '/css/modern-ui.css' ) : $version
    );
    wp_enqueue_style(
        'letras-footer',
        $uri . '/css/footer.css',
        array( 'letras-modern-ui' ),
        file_exists( $dir . '/css/footer.css' ) ? filemtime( $dir . '/css/footer.css' ) : $version
    );

    // Header Moderno CSS (opcional - solo si se usa header-modern.php)
    if (defined('LETRAS_USE_MODERN_HEADER') && LETRAS_USE_MODERN_HEADER) {
        // Mantener header.css para estilos del topbar original
        // header.css ya está encolado arriba, solo agregamos los modernos

        wp_enqueue_style(
            'letras-header-modern',
            $uri . '/css/header-modern.css',
            array( 'letras-header' ),
            file_exists( $dir . '/css/header-modern.css' ) ? filemtime( $dir . '/css/header-modern.css' ) : $version
        );

        // Override final para asegurar estilos correctos
        wp_enqueue_style(
            'letras-header-modern-override',
            $uri . '/css/header-modern-override.css',
            array( 'letras-header-modern' ),
            file_exists( $dir . '/css/header-modern-override.css' ) ? filemtime( $dir . '/css/header-modern-override.css' ) : $version
        );

        // Menú profesional UI/UX
        wp_enqueue_style(
            'letras-menu-professional',
            $uri . '/css/menu-professional.css',
            array( 'letras-header-modern-override' ),
            file_exists( $dir . '/css/menu-professional.css' ) ? filemtime( $dir . '/css/menu-professional.css' ) : $version
        );

        // Mejoras de accesibilidad y performance
        wp_enqueue_style(
            'letras-a11y',
            $uri . '/css/a11y-improvements.css',
            array( 'letras-menu-professional', 'letras-modern-ui' ),
            file_exists( $dir . '/css/a11y-improvements.css' ) ? filemtime( $dir . '/css/a11y-improvements.css' ) : $version
        );
    } else {
        // Sin header moderno: igual cargar a11y (último en cascada)
        wp_enqueue_style(
            'letras-a11y',
            $uri . '/css/a11y-improvements.css',
            array( 'letras-modern-ui' ),
            file_exists( $dir . '/css/a11y-improvements.css' ) ? filemtime( $dir . '/css/a11y-improvements.css' ) : $version
        );
    }

    wp_enqueue_script(
        'letras-theme-stack',
        $uri . '/js/theme-stack.js',
        array(),
        file_exists( $dir . '/js/theme-stack.js' ) ? filemtime( $dir . '/js/theme-stack.js' ) : $version,
        array( 'strategy' => 'defer', 'in_footer' => true )
    );

    // Alpine.js — deferred so it does not block rendering.
    // theme-stack.js is intentionally loaded first so Alpine components
    // can register during the alpine:init event.
    wp_enqueue_script(
        'alpinejs',
        $uri . '/js/vendor/alpine.min.js',
        array( 'letras-theme-stack' ),
        file_exists( $dir . '/js/vendor/alpine.min.js' ) ? filemtime( $dir . '/js/vendor/alpine.min.js' ) : '3.14.8',
        array( 'strategy' => 'defer', 'in_footer' => true )
    );

    // Header Moderno JS (opcional - solo si se usa header-modern.php)
    if (defined('LETRAS_USE_MODERN_HEADER') && LETRAS_USE_MODERN_HEADER) {
        wp_enqueue_script(
            'letras-header-modern',
            $uri . '/js/header-modern.js',
            array( 'gsap', 'gsap-scrolltrigger' ),
            file_exists( $dir . '/js/header-modern.js' ) ? filemtime( $dir . '/js/header-modern.js' ) : $version,
            array( 'strategy' => 'defer', 'in_footer' => true )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'letras_flch_enqueue_scripts' );

// ═══════════════════════════════════════════════════════════
// 5. PERFORMANCE CLEANUP
// ═══════════════════════════════════════════════════════════

function letras_flch_performance_cleanup() {
    // Remove shortlink and WP generator tag from <head>
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
    remove_action( 'wp_head', 'wp_generator' );

    // Remove RSD / Windows Live Writer links
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'letras_flch_performance_cleanup' );

// DNS prefetch + preconnect for third-party origins
// DISABLED: All resources are now local, no CDN dependencies
// function letras_flch_resource_hints( $hints, $relation_type ) {
//     if ( 'dns-prefetch' === $relation_type ) {
//         // $hints[] = 'https://cdnjs.cloudflare.com';
//         // $hints[] = 'https://cdn.jsdelivr.net';
//     }
//     if ( 'preconnect' === $relation_type ) {
//     }
//     return $hints;
// }
// add_filter( 'wp_resource_hints', 'letras_flch_resource_hints', 10, 2 );

// ═══════════════════════════════════════════════════════════
// 6. FOOTER WIDGETS
// ═══════════════════════════════════════════════════════════

function letras_flch_footer_widgets_init() {
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( esc_html__( 'Footer Columna %d', 'letrasflch' ), $i ),
            'id'            => "footer-{$i}",
            'description'   => sprintf( esc_html__( 'Widgets para la columna %d del footer.', 'letrasflch' ), $i ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-6">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title text-[#C6A43F] text-lg font-semibold mb-4">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'letras_flch_footer_widgets_init', 20 );

// ═══════════════════════════════════════════════════════════
// 7. SCHEMA.ORG
// ═══════════════════════════════════════════════════════════

function letras_flch_schema_website() {
    if ( ! is_front_page() ) {
        return;
    }
    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        'name'            => get_bloginfo( 'name' ),
        'url'             => home_url( '/' ),
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => array(
                '@type'       => 'EntryPoint',
                'urlTemplate' => home_url( '/?s={search_term_string}' ),
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );
    echo '<script type="application/ld+json">'
         . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
         . "</script>\n";
}
add_action( 'wp_head', 'letras_flch_schema_website' );

// Placeholder — implementar en template-parts/breadcrumbs.php via do_action()
function letras_flch_breadcrumb_schema_output() {}

// ═══════════════════════════════════════════════════════════
// 8. UTILITY FUNCTIONS
// ═══════════════════════════════════════════════════════════

function letras_flch_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'letras_flch_excerpt_length' );

function letras_flch_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'letras_flch_excerpt_more' );

function letras_flch_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'card-thumbnail'   => esc_html__( 'Tarjeta de noticia (16:9)', 'letrasflch' ),
        'card-square'      => esc_html__( 'Tarjeta cuadrada',          'letrasflch' ),
        'archive-featured' => esc_html__( 'Destacada de archivo (16:9)', 'letrasflch' ),
    ) );
}
add_filter( 'image_size_names_choose', 'letras_flch_custom_image_sizes' );

function letras_flch_get_post_type_label( $post_type = '' ) {
    if ( empty( $post_type ) ) {
        $post_type = get_post_type();
    }
    $obj = get_post_type_object( $post_type );
    return $obj ? $obj->labels->singular_name : ucfirst( $post_type );
}

if ( ! defined( 'LETRAS_RELATED_COUNT' ) ) {
    define( 'LETRAS_RELATED_COUNT', 3 );
}

// ═══════════════════════════════════════════════════════════
// 9. OPEN GRAPH TAGS
// ═══════════════════════════════════════════════════════════

function letras_flch_og_tags() {
    if ( is_admin() ) {
        return;
    }

    global $post;

    $og_type  = is_single() ? 'article' : 'website';
    $og_title = wp_get_document_title();
    $og_desc  = get_bloginfo( 'description' );
    $og_url   = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
    $og_image = '';

    // Prioridad: thumbnail del post → og-default.jpg (si existe en el tema)
    if ( is_singular() && has_post_thumbnail() ) {
        $og_image = get_the_post_thumbnail_url( $post->ID, 'large' );
    } elseif ( file_exists( get_template_directory() . '/images/og-default.jpg' ) ) {
        $og_image = get_template_directory_uri() . '/images/og-default.jpg';
    }

    echo "\n<!-- Open Graph / Social -->\n";
    printf( '<meta property="og:type"        content="%s">' . "\n", esc_attr( $og_type ) );
    printf( '<meta property="og:title"       content="%s">' . "\n", esc_attr( $og_title ) );
    printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $og_desc ) );
    printf( '<meta property="og:url"         content="%s">' . "\n", esc_url( $og_url ) );
    printf( '<meta property="og:site_name"   content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
    if ( $og_image ) {
        printf( '<meta property="og:image"        content="%s">' . "\n", esc_url( $og_image ) );
        echo    '<meta property="og:image:width"   content="1200">' . "\n";
        echo    '<meta property="og:image:height"  content="630">'  . "\n";
    }
    echo    '<meta name="twitter:card"        content="summary_large_image">' . "\n";

    if ( is_single() ) {
        printf( '<meta property="article:published_time" content="%s">' . "\n", esc_attr( get_the_date( 'c' ) ) );
        printf( '<meta property="article:modified_time"  content="%s">' . "\n", esc_attr( get_the_modified_date( 'c' ) ) );
    }
    echo "\n";
}
add_action( 'wp_head', 'letras_flch_og_tags', 5 );

// ═══════════════════════════════════════════════════════════
// 10. LAZY LOADING & IMAGE ATTRIBUTES
// ═══════════════════════════════════════════════════════════

add_filter( 'wp_get_attachment_image_attributes', function ( $attrs, $attachment, $size ) {
    if ( is_admin() ) {
        return $attrs;
    }
    if ( empty( $attrs['loading'] ) ) {
        $attrs['loading'] = 'lazy';
    }
    if ( empty( $attrs['decoding'] ) ) {
        $attrs['decoding'] = 'async';
    }
    return $attrs;
}, 10, 3 );

// ═══════════════════════════════════════════════════════════
// 11. POPUP DE ANUNCIOS (pre-integration hook)
// ═══════════════════════════════════════════════════════════

//function letras_flch_anuncios_popup() {
//    if ( is_admin() ) {
//        return;
//    }
//    get_template_part( 'template-parts/flch-anuncios-popup' );
//}
//add_action( 'wp_footer', 'letras_flch_anuncios_popup', 20 );

// ═══════════════════════════════════════════════════════════
// 12. STACK FRONTEND GLOBAL + OPTIMIZACIONES
// ═══════════════════════════════════════════════════════════

/**
 * Stack frontend global + optimizaciones de rendimiento
 * Modernización letras.unmsm.edu.pe — Junio 2026
 * Resuelve: FA x7, Bootstrap inactivo, Gzip, Debug, GSAP
 *
 * @see /inc/letras-performance.php
 */
$letras_perf = get_template_directory() . '/inc/letras-performance.php';
if ( file_exists( $letras_perf ) ) {
    require_once $letras_perf;
}

/* ══════════════════════════════════════════════════
   FIX ACCESIBILIDAD: Alt text automático en imágenes
   Si una imagen no tiene alt, usa el título del adjunto
   ══════════════════════════════════════════════════ */
add_filter('wp_get_attachment_image_attributes', function($attr, $attachment) {
    if(empty($attr['alt'])) {
        $attr['alt'] = sanitize_text_field(
            $attachment->post_excerpt
            ?: $attachment->post_title
            ?: 'Facultad de Letras y Ciencias Humanas - UNMSM'
        );
    }
    return $attr;
}, 10, 2);

/* ══════════════════════════════════════════════════
   FIX ACCESIBILIDAD: type="button" en botones sin tipo
   Previene submit accidental de formularios
   ══════════════════════════════════════════════════ */
add_action('wp_footer', function() {
    ?>
    <script>
    // Agregar type="button" a botones sin tipo (23 detectados en audit)
    document.querySelectorAll('button:not([type])').forEach(function(btn) {
        btn.setAttribute('type', 'button');
    });
    </script>
    <?php
}, 999);

/* ══════════════════════════════════════════════════
   SEGURIDAD: Ocultar versión de WordPress
   ══════════════════════════════════════════════════ */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

/* ══════════════════════════════════════════════════
   PERFORMANCE: Preconnect hints para assets críticos
   ══════════════════════════════════════════════════ */
add_action('wp_head', function() {
    // All resources are now local, no CDN preconnect needed
    // echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>' . "\n";

    // DNS prefetch para analytics
    echo '<link rel="dns-prefetch" href="//www.google-analytics.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//www.googletagmanager.com">' . "\n";
}, 1);

/* ══════════════════════════════════════════════════
   DIAGNÓSTICO DE RECURSOS (solo para admins)
   Uso: ?diagnostico=1 en cualquier URL
   ══════════════════════════════════════════════════ */
require_once get_template_directory() . '/inc/diagnostico-recursos.php';
/* ══════════════════════════════════════════════════
   LOCALIZAR NOTICIAS PARA ALPINE.JS
   Envía noticias reales de WordPress al frontend
   ══════════════════════════════════════════════════ */
add_action('wp_enqueue_scripts', 'letras_flch_localize_news');
function letras_flch_localize_news() {
    // Solo en front page
    if (!is_front_page()) {
        return;
    }

    // Query de noticias de la categoría "Noticias"
    $news_query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'category_name'  => 'noticias',
    ));

    $news_data = array();
    $categories = array('Todas');

    if ($news_query->have_posts()) {
        while ($news_query->have_posts()) {
            $news_query->the_post();

            // Obtener categoría principal
            $cats = get_the_category();
            $cat_name = !empty($cats) ? $cats[0]->name : 'Sin categoría';

            // Agregar categoría única al array
            if (!in_array($cat_name, $categories)) {
                $categories[] = $cat_name;
            }

            // Thumbnail con fallback a data URI SVG
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'card-thumbnail');
            if (!$thumb) {
                // SVG placeholder incrustado (mejor performance que imagen externa)
                $thumb = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="800" height="450" viewBox="0 0 800 450"%3E%3Crect fill="%23143B63" width="800" height="450"/%3E%3Ctext fill="rgba(255,255,255,0.3)" font-family="system-ui" font-size="24" x="50%25" y="50%25" text-anchor="middle" dy=".3em"%3EFLCH UNMSM%3C/text%3E%3C/svg%3E';
            }

            $news_data[] = array(
                'id'      => get_the_ID(),
                'cat'     => $cat_name,
                'date'    => get_the_date('j F Y'),
                'title'   => get_the_title(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 20, '...'),
                'img'     => $thumb,
                'url'     => get_permalink(),
            );
        }
        wp_reset_postdata();
    }

    // Fallback si no hay noticias
    if (empty($news_data)) {
        $news_data = array(
            array(
                'id'      => 1,
                'cat'     => 'Aviso',
                'date'    => date('j F Y'),
                'title'   => 'Bienvenido al sitio de la Facultad',
                'excerpt' => 'Pronto publicaremos noticias y eventos académicos.',
                'img'     => get_template_directory_uri() . '/images/placeholder-news.jpg',
                'url'     => home_url('/'),
            )
        );
        $categories = array('Todas', 'Aviso');
    }

    // Pasar datos a JavaScript
    wp_localize_script('letras-theme-stack', 'letrasNewsData', array(
        'news'       => $news_data,
        'categories' => $categories,
    ));
}

/* Cache bust - jue 18 jun 2026 15:40:55 -05 */
