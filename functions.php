<?php
/**
 * Letras FLCH — Theme Functions
 *
 * @package LetrasFLCH
 */

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
        array( 'name' => esc_html__( 'Dorado',             'letrasflch' ), 'slug' => 'accent-gold',   'color' => '#A88F1D' ),
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
        $cls    = $depth === 0
            ? 'sub-menu absolute left-0 top-full mt-0 bg-[#0A1E3C] border border-[#A88F1D]/30 rounded-lg shadow-xl py-2 min-w-[250px] z-50'
            : 'sub-menu absolute left-full top-0 ml-2 bg-[#0A1E3C] border border-[#A88F1D]/30 rounded-lg shadow-xl py-2 min-w-[250px] z-50';
        $output .= "\n{$indent}<ul class=\"{$cls}\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent       = $depth ? str_repeat( "\t", $depth ) : '';
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        $li_cls = array_filter( array( 'relative', $has_children ? 'group' : '' ) );
        $li_cls = apply_filters( 'nav_menu_css_class', $li_cls, $item, $args, $depth );
        $li_cls = $li_cls ? ' class="' . esc_attr( implode( ' ', $li_cls ) ) . '"' : '';

        $output .= $indent . '<li' . $li_cls . '>';

        if ( $depth === 0 ) {
            $link_cls = 'block px-4 py-2 text-sm font-medium text-white hover:text-[#A88F1D] hover:bg-white/5 rounded-lg transition-all duration-200';
        } else {
            $link_cls = 'block px-4 py-2 text-sm text-white hover:text-[#A88F1D] hover:bg-[#1E4A7A] transition-all duration-200 whitespace-nowrap';
        }
        if ( $has_children && $depth === 0 ) {
            $link_cls .= ' flex items-center gap-1';
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

class Letras_FLCH_Mobile_Walker_Nav extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "\n" . str_repeat( "\t", $depth )
            . "<ul class=\"sub-menu pl-4 mt-2 space-y-2 border-l-2 border-[#A88F1D]/30 hidden\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent       = $depth ? str_repeat( "\t", $depth ) : '';
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        $li_cls = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );
        $li_cls = $li_cls ? ' class="' . esc_attr( implode( ' ', $li_cls ) ) . '"' : '';

        $output .= $indent . '<li' . $li_cls . '>';

        $atts = array(
            'href'  => ! empty( $item->url ) ? $item->url : '#',
            'class' => 'block py-2 px-3 text-white hover:text-[#A88F1D] transition-colors duration-200 rounded-lg',
        );
        $attrs = '';
        foreach ( $atts as $k => $v ) {
            $attrs .= ' ' . $k . '="' . esc_attr( $v ) . '"';
        }

        $title = $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        $item_output = $args->before;
        if ( $has_children ) {
            $item_output .= '<div class="flex items-center justify-between w-full">'
                . '<a' . $attrs . ' class="flex-1">' . $title . '</a>'
                . '<button class="mobile-submenu-toggle w-10 h-10 flex items-center justify-center text-white hover:text-[#A88F1D] focus:outline-none transition-colors duration-200" onclick="toggleMobileSubmenu(this);return false;" aria-expanded="false" aria-label="' . esc_attr__( 'Expandir submenú', 'letrasflch' ) . '">'
                . '<i class="fas fa-chevron-down transition-transform duration-300" aria-hidden="true"></i>'
                . '</button></div>';
        } else {
            $item_output .= '<a' . $attrs . '>' . $title . '</a>';
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
    $version = wp_get_theme()->get( 'Version' ) ?: '1.0';

    // Google Fonts — Poppins (display=swap avoids FOIT)
    wp_enqueue_style(
        'letras-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap',
        array(), null
    );

    // Font Awesome 6 via CDN
    wp_enqueue_style(
        'letras-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(), '6.4.0'
    );

    // CSS pipeline: tailwind → variables → main → theme
    wp_enqueue_style( 'letras-tailwind',   $uri . '/css/tailwind.css',   array(),                                    $version );
    wp_enqueue_style( 'letras-variables',  $uri . '/css/variables.css',  array( 'letras-tailwind' ),                 $version );
    wp_enqueue_style( 'letras-main',       $uri . '/css/main.css',       array( 'letras-variables' ),                $version );
    wp_enqueue_style( 'letras-theme',      get_stylesheet_uri(),         array( 'letras-tailwind', 'letras-main' ),  $version );

    // Alpine.js — deferred so it does not block rendering
    wp_enqueue_script(
        'alpinejs',
        'https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js',
        array(), '3.14.8', array( 'strategy' => 'defer', 'in_footer' => true )
    );
}
add_action( 'wp_enqueue_scripts', 'letras_flch_enqueue_scripts' );

// ═══════════════════════════════════════════════════════════
// 5. PERFORMANCE CLEANUP
// ═══════════════════════════════════════════════════════════

function letras_flch_performance_cleanup() {
    // Remove emoji detection script/styles (saves ~15 KB)
    remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles',     'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles',  'print_emoji_styles' );

    // Remove shortlink and WP generator tag from <head>
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
    remove_action( 'wp_head', 'wp_generator' );

    // Remove RSD / Windows Live Writer links
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'letras_flch_performance_cleanup' );

// DNS prefetch + preconnect for third-party origins
function letras_flch_resource_hints( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        $hints[] = 'https://cdnjs.cloudflare.com';
        $hints[] = 'https://cdn.jsdelivr.net';
    }
    if ( 'preconnect' === $relation_type ) {
        $hints[] = array( 'href' => 'https://fonts.googleapis.com' );
        $hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'letras_flch_resource_hints', 10, 2 );

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

function letras_flch_anuncios_popup() {
    if ( is_admin() ) {
        return;
    }
    get_template_part( 'template-parts/flch-anuncios-popup' );
}
add_action( 'wp_footer', 'letras_flch_anuncios_popup', 20 );
