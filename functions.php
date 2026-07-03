<?php
/**
 * Letras FLCH — Theme Functions
 *
 * @package LetrasFLCH
 */

// ═══════════════════════════════════════════════════════════
// 0. CONFIGURACIÓN GENERAL
// ═══════════════════════════════════════════════════════════

// HEADER MODERNO: Desactivado — el CSS de entrada se movió a header.css
define('LETRAS_USE_MODERN_HEADER', false);

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

    // Elementor support — fuentes CODICE ya se definen en performance.php
    add_theme_support( 'elementor' );
    add_theme_support( 'elementor-default-fonts' );
}
add_action( 'after_setup_theme', 'letras_flch_setup' );

// Elementor Pro: Registrar locations del theme builder (header, footer)
add_action( 'elementor/theme/register_locations', function( $elementor_theme_manager ) {
    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single'  );
    $elementor_theme_manager->register_location( 'archive' );
});

// ═══════════════════════════════════════════════════════════
// FIX: Font Awesome en Vista Previa de Elementor
// ═══════════════════════════════════════════════════════════
add_action( 'elementor/preview/enqueue_styles', function() {
    // Asegurar Font Awesome en preview de Elementor
    if ( ! wp_style_is( 'ch-fontawesome', 'done' ) && ! wp_style_is( 'ch-fontawesome', 'enqueued' ) ) {
        echo '<link rel="stylesheet" id="ch-fontawesome-preview-css" href="' .
             esc_url( home_url( '/assets/libs/fontawesome/all.min.css' ) ) .
             '?ver=6.4.0" media="all" />' . "\n";
    }

    // Asegurar iconos de Elementor en preview
    if ( ! wp_style_is( 'elementor-icons', 'enqueued' ) ) {
        wp_enqueue_style( 'elementor-icons' );
    }
}, 1 );

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
// CAMPOS DE PERFIL — author.php (docente/investigador)
// Sin ACF: usermeta simple editable desde el perfil de WP-Admin.
// ═══════════════════════════════════════════════════════════
function letras_flch_user_profile_fields( $user ) {
    if ( ! current_user_can( 'edit_user', $user->ID ) ) {
        return;
    }
    ?>
    <h2><?php esc_html_e( 'Perfil académico FLCH', 'letrasflch' ); ?></h2>
    <table class="form-table">
        <tr>
            <th><label for="letras_departamento"><?php esc_html_e( 'Departamento / Instituto', 'letrasflch' ); ?></label></th>
            <td><input type="text" name="letras_departamento" id="letras_departamento" value="<?php echo esc_attr( get_user_meta( $user->ID, 'letras_departamento', true ) ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="letras_orcid"><?php esc_html_e( 'ORCID (URL)', 'letrasflch' ); ?></label></th>
            <td><input type="url" name="letras_orcid" id="letras_orcid" value="<?php echo esc_attr( get_user_meta( $user->ID, 'letras_orcid', true ) ); ?>" class="regular-text" placeholder="https://orcid.org/0000-0000-0000-0000"></td>
        </tr>
        <tr>
            <th><label for="letras_lineas_investigacion"><?php esc_html_e( 'Líneas de investigación (separadas por coma)', 'letrasflch' ); ?></label></th>
            <td><input type="text" name="letras_lineas_investigacion" id="letras_lineas_investigacion" value="<?php echo esc_attr( get_user_meta( $user->ID, 'letras_lineas_investigacion', true ) ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="letras_proyectos"><?php esc_html_e( 'Proyectos activos', 'letrasflch' ); ?></label></th>
            <td><input type="number" min="0" name="letras_proyectos" id="letras_proyectos" value="<?php echo esc_attr( get_user_meta( $user->ID, 'letras_proyectos', true ) ); ?>" class="small-text"></td>
        </tr>
        <tr>
            <th><label for="letras_citas"><?php esc_html_e( 'Citas', 'letrasflch' ); ?></label></th>
            <td><input type="number" min="0" name="letras_citas" id="letras_citas" value="<?php echo esc_attr( get_user_meta( $user->ID, 'letras_citas', true ) ); ?>" class="small-text"></td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'letras_flch_user_profile_fields' );
add_action( 'edit_user_profile', 'letras_flch_user_profile_fields' );

function letras_flch_save_user_profile_fields( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return;
    }
    $fields = array( 'letras_departamento', 'letras_orcid', 'letras_lineas_investigacion' );
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_user_meta( $user_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
        }
    }
    $number_fields = array( 'letras_proyectos', 'letras_citas' );
    foreach ( $number_fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_user_meta( $user_id, $field, absint( $_POST[ $field ] ) );
        }
    }
}
add_action( 'personal_options_update', 'letras_flch_save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'letras_flch_save_user_profile_fields' );

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

    // Fuentes CODICE autoalojadas (sin CDN — zero HTTP externo)
    wp_enqueue_style(
        'letras-fonts',
        $uri . '/css/fonts.css',
        array(), $version
    );

    // Font Awesome 6 — vía cdnjs (con fallback local en el tema si existe)
    $fa_local = $dir . '/css/fontawesome.min.css';
    $fa_src = file_exists($fa_local)
        ? $uri . '/css/fontawesome.min.css'
        : 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css';
    wp_enqueue_style(
        'letras-fontawesome',
        $fa_src,
        array(),
        file_exists($fa_local) ? filemtime($fa_local) : null
    );

    // FontAwesome global fix (asegura rendering correcto)
    wp_enqueue_style(
        'letras-fontawesome-fix',
        $uri . '/css/fontawesome-fix.css',
        array( 'letras-fontawesome' ),
        $version
    );

    // CSS pipeline: variables → tailwind → main → header → theme → kingster → footer
    // NOTA: variables.css/main.css usaban $version (número de versión fijo del
    // tema) en vez de filemtime(), por lo que un cambio en el archivo no
    // invalidaba la caché del navegador/CDN. Se homologa con el resto del
    // pipeline (header/kingster/footer) que ya usa filemtime().
    wp_enqueue_style( 'letras-variables', $uri . '/css/variables.css',
        array(),
        file_exists( $dir . '/css/variables.css' ) ? filemtime( $dir . '/css/variables.css' ) : $version );
    wp_enqueue_style( 'letras-tailwind',  $uri . '/css/tailwind.css',
        array( 'letras-variables' ),
        file_exists( $dir . '/css/tailwind.css' ) ? filemtime( $dir . '/css/tailwind.css' ) : $version );
    wp_enqueue_style( 'letras-main',      $uri . '/css/main.css',
        array( 'letras-tailwind' ),
        file_exists( $dir . '/css/main.css' ) ? filemtime( $dir . '/css/main.css' ) : $version );
    wp_enqueue_style( 'letras-header',    $uri . '/css/header.css',
        array( 'letras-main' ),
        file_exists( $dir . '/css/header.css' ) ? filemtime( $dir . '/css/header.css' ) : $version );
    wp_enqueue_style( 'letras-theme',     get_stylesheet_uri(),        array( 'letras-header' ),   $version );
    wp_enqueue_style( 'letras-kingster',  $uri . '/css/kingster.css',
        array( 'letras-theme' ),
        file_exists( $dir . '/css/kingster.css' ) ? filemtime( $dir . '/css/kingster.css' ) : $version );
    wp_enqueue_style( 'letras-footer',    $uri . '/css/footer.css',
        array( 'letras-kingster' ),
        file_exists( $dir . '/css/footer.css' ) ? filemtime( $dir . '/css/footer.css' ) : $version );

    // Header Moderno CSS (opcional - todos los estilos consolidados en un archivo)
    if (defined('LETRAS_USE_MODERN_HEADER') && LETRAS_USE_MODERN_HEADER) {
        wp_enqueue_style( 'letras-header-modern', $uri . '/css/header-modern.css',
            array( 'letras-header' ),
            file_exists( $dir . '/css/header-modern.css' ) ? filemtime( $dir . '/css/header-modern.css' ) : $version );
    }

    // Lenis — smooth scroll ligero (spec Kingster: lerp 0.42). Debe cargar
    // antes que theme-stack.js, que es quien la inicializa (initLenis()).
    wp_enqueue_script(
        'letras-lenis',
        $uri . '/js/vendor/lenis.min.js',
        array(),
        file_exists( $dir . '/js/vendor/lenis.min.js' ) ? filemtime( $dir . '/js/vendor/lenis.min.js' ) : '1.3.25',
        array( 'strategy' => 'defer', 'in_footer' => true )
    );

    wp_enqueue_script(
        'letras-theme-stack',
        $uri . '/js/theme-stack.js',
        array( 'letras-lenis' ),
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

/**
 * Orden de resultados en archive.php ("Más recientes ▾"), vía ?orderby=.
 * Solo afecta la query principal de archivo (categoría/etiqueta/fecha/autor).
 */
function letras_flch_archive_orderby( $query ) {
    if ( is_admin() || ! $query->is_main_query() || ! $query->is_archive() ) {
        return;
    }
    $orderby = isset( $_GET['orderby'] ) ? sanitize_key( wp_unslash( $_GET['orderby'] ) ) : '';
    switch ( $orderby ) {
        case 'oldest':
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'ASC' );
            break;
        case 'comments':
            $query->set( 'orderby', 'comment_count' );
            $query->set( 'order', 'DESC' );
            break;
        // 'recientes' (por defecto de WordPress: date DESC) — no requiere cambios.
    }
}
add_action( 'pre_get_posts', 'letras_flch_archive_orderby' );

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
/* ══════════════════════════════════════════════════════════════
   POOL DE IMAGENES FALLBACK PARA NOTICIAS (auditoria P0)
   Fotos institucionales reales ya publicadas en el sitio. Se elige
   por post_id % n: determinista (misma noticia -> misma foto siempre)
   y variado (noticias contiguas -> fotos distintas).
   ══════════════════════════════════════════════════════════════ */
function letras_flch_news_fallback_img( $post_id ) {
    $pool = array(
        'https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1556-scaled.webp',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1565-scaled.webp',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/DJI_0007-Trim-frame-at-0m5s.webp',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/literatura.jpg',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/Filosofia.jpg',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/comunica.jpg',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/arte.jpg',
        'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/danza.jpg',
    );
    return $pool[ absint( $post_id ) % count( $pool ) ];
}

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

            // Thumbnail con fallback determinista a un POOL de fotos
            // institucionales reales. Antes: un unico SVG gris -> cuando
            // varias noticias no tienen imagen destacada, la reticula
            // repite la misma tarjeta n veces (visto en produccion:
            // 8 de 10 tarjetas identicas). Con post_id % pool, cada
            // noticia sin imagen recibe una foto distinta y ESTABLE.
            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'card-thumbnail');
            if (!$thumb) {
                $thumb = letras_flch_news_fallback_img( get_the_ID() );
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

/* ══════════════════════════════════════════════════════════════
   DATOS REALES COMPARTIDOS — Kingster (portada + command palette)
   Fuente única para escuelas / revistas / centros: se usan en el
   índice del command palette ⌘K y en los template-parts de la
   portada, para no duplicar/desincronizar los mismos datos.
   ══════════════════════════════════════════════════════════════ */
function letras_flch_schools_data() {
    return array(
        array( 'n' => '01', 'name' => 'Arte', 'desc' => 'Historia del arte, curaduría y gestión cultural.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/arte.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/arte-flch/' ),
        array( 'n' => '02', 'name' => 'Bibliotecología y CC. de la Información', 'desc' => 'Gestión del conocimiento y acceso a la información.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2021/01/Bibliotecologia.jpeg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/bibliotecologia-flch/' ),
        array( 'n' => '03', 'name' => 'Comunicación Social', 'desc' => 'Periodismo, medios y comunicación para el cambio.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/comunica.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/comunicacion-social-flch/' ),
        array( 'n' => '04', 'name' => 'Conservación y Restauración', 'desc' => 'Patrimonio material, ciencia y memoria.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2021/01/WhatsApp-Image-2021-01-05-at-3.38.22-PM.jpeg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/conservacion-y-restauracion-flch/' ),
        array( 'n' => '05', 'name' => 'Danza', 'desc' => 'Cuerpo, coreografía e investigación escénica.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/danza.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/danza-flch/' ),
        array( 'n' => '06', 'name' => 'Filosofía', 'desc' => 'Pensamiento crítico, ética y tradición de las ideas.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/Filosofia.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/filosofia-flch/' ),
        array( 'n' => '07', 'name' => 'Literatura', 'desc' => 'Crítica, creación e historia literaria peruana y universal.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2019/07/literatura.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/literatura-flch/' ),
        array( 'n' => '08', 'name' => 'Lingüística', 'desc' => 'El lenguaje, las lenguas originarias y el pensamiento.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2021/01/linguistica-pagina-e1609879534767.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/linguistica-flch/' ),
        array( 'n' => '09', 'name' => 'Estudios Generales', 'desc' => 'Formación humanística común de primer ciclo.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2026/02/portada.png', 'href' => 'https://letras.unmsm.edu.pe/escuelas/estudios-generales-flch/' ),
        array( 'n' => '10', 'name' => 'Lenguas, Traducción e Interpretación', 'desc' => 'Diálogo intercultural en varias lenguas.', 'img' => 'https://letras.unmsm.edu.pe/wp-content/uploads/2025/01/interpretacion-1024x384.jpg', 'href' => 'https://letras.unmsm.edu.pe/escuelas/lenguas-traduccion-e-interpretacion-flch/' ),
    );
}

function letras_flch_revistas_data() {
    return array(
        array( 'short' => 'Letras', 'name' => 'Letras (Lima)', 'issn' => 'ISSN 2071-5072', 'c1' => '#1A4279', 'c2' => '#0E2742', 'cover' => 'https://revistaletras.unmsm.edu.pe/public/journals/1/cover_issue_150_es.png', 'href' => 'https://revistaletras.unmsm.edu.pe/index.php/le/issue/view/150' ),
        array( 'short' => 'RCLL', 'name' => 'Crítica Literaria Latinoamericana', 'issn' => 'ISSN', 'c1' => '#7A1F2B', 'c2' => '#3A0E15', 'cover' => 'https://rcllletras.unmsm.edu.pe/public/journals/1/cover_issue_97_es.jpg', 'href' => 'https://rcllletras.unmsm.edu.pe/' ),
        array( 'short' => 'L&S', 'name' => 'Lengua y Sociedad', 'issn' => 'ISSN 1729-9721', 'c1' => '#1F6E5A', 'c2' => '#0C3429', 'cover' => 'https://revistasinvestigacion.unmsm.edu.pe/public/journals/40/cover_issue_1836_es.png', 'href' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/lys/issue/view/1836' ),
        array( 'short' => 'E&P', 'name' => 'Escritura y Pensamiento', 'issn' => 'ISSN 1561-0837', 'c1' => '#3A4C8A', 'c2' => '#161E3D', 'cover' => 'https://revistasinvestigacion.unmsm.edu.pe/public/journals/21/cover_issue_1855_es.jpg', 'href' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/ayp/issue/view/1855' ),
        array( 'short' => 'Tesis', 'name' => 'Tesis (Lima)', 'issn' => 'ISSN 2519-7843', 'c1' => '#8A5A18', 'c2' => '#3F280A', 'cover' => 'https://revistasinvestigacion.unmsm.edu.pe/public/journals/36/cover_issue_1868_es.png', 'href' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis/issue/view/1868' ),
        array( 'short' => 'Azul', 'name' => 'Revista Azul', 'issn' => 'ISSN', 'c1' => '#155E63', 'c2' => '#0A2E31', 'cover' => 'https://revistaazulletras.unmsm.edu.pe/public/journals/1/cover_issue_2_es.png', 'href' => 'https://revistaazulletras.unmsm.edu.pe/index.php/azul/issue/view/2' ),
    );
}

function letras_flch_centros_data() {
    return array(
        array( 'icon' => 'fa-solid fa-user-graduate', 'title' => 'Posgrado', 'sub' => 'Maestrías y doctorados', 'desc' => 'Maestrías y doctorados en humanidades, lingüística y comunicación.', 'cta' => 'Ver programas', 'href' => 'https://posgradoletras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-language', 'title' => 'Centro de Idiomas', 'sub' => 'Cursos y certificación', 'desc' => 'Cursos y certificación en lenguas modernas y originarias.', 'cta' => 'Inscríbete', 'href' => 'https://ceidletras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-certificate', 'title' => 'Examen de Suficiencia', 'sub' => 'OESI', 'desc' => 'Acredita tu dominio de idiomas con la OESI de la Facultad.', 'cta' => 'Programa tu examen', 'href' => 'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/' ),
        array( 'icon' => 'fa-solid fa-hands-holding-circle', 'title' => 'CERSEU', 'sub' => 'Extensión y educación continua', 'desc' => 'Extensión, responsabilidad social y educación continua.', 'cta' => 'Conoce más', 'href' => 'https://letras.unmsm.edu.pe/cerseu/' ),
    );
}

// NOTA: algunos hrefs apuntan a la home institucional (letras.unmsm.edu.pe)
// como fallback seguro porque no se confirmó la URL profunda exacta de ese
// servicio; reemplazar por el enlace específico real cuando se confirme.
function letras_flch_quicklinks_data() {
    return array(
        array( 'icon' => 'fa-solid fa-file-signature', 'title' => 'Admisión y postulación', 'href' => 'https://admision.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-calendar-days',   'title' => 'Calendario académico',    'href' => 'https://letras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-clock',           'title' => 'Horarios 2026-I',          'href' => 'https://letras.unmsm.edu.pe/horarios-flch.php' ),
        array( 'icon' => 'fa-solid fa-laptop',          'title' => 'Aula Virtual',             'href' => 'https://letras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-book',            'title' => 'Biblioteca',               'href' => 'https://letras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-stamp',           'title' => 'Trámites y certificados',  'href' => 'https://letras.unmsm.edu.pe/' ),
        array( 'icon' => 'fa-solid fa-address-book',    'title' => 'Directorio',               'href' => 'https://letras.unmsm.edu.pe/directorio/' ),
    );
}

/* ══════════════════════════════════════════════════════════════
   KINGSTER EXTRAS — propuesta "Portada FLCH Kingster"
   ══════════════════════════════════════════════════════════════ */
function letras_flch_kingster_extras_assets() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();

    wp_enqueue_script(
        'letras-kingster-extras',
        $uri . '/js/kingster-extras.js',
        array( 'letras-theme-stack' ),
        file_exists( $dir . '/js/kingster-extras.js' ) ? filemtime( $dir . '/js/kingster-extras.js' ) : wp_get_theme()->get( 'Version' ),
        array( 'strategy' => 'defer', 'in_footer' => true )
    );

    // Splide — carruseles de la portada (banner de destacadas + revistas).
    // Solo se necesita en front-page; el resto del sitio no paga su costo.
    if ( is_front_page() ) {
        wp_enqueue_style(
            'letras-splide',
            $uri . '/css/splide.min.css',
            array(),
            file_exists( $dir . '/css/splide.min.css' ) ? filemtime( $dir . '/css/splide.min.css' ) : '4.1.4'
        );
        wp_enqueue_script(
            'letras-splide',
            $uri . '/js/vendor/splide.min.js',
            array(),
            file_exists( $dir . '/js/vendor/splide.min.js' ) ? filemtime( $dir . '/js/vendor/splide.min.js' ) : '4.1.4',
            array( 'strategy' => 'defer', 'in_footer' => true )
        );
        wp_enqueue_script(
            'letras-home-carousels',
            $uri . '/js/home-carousels.js',
            array( 'letras-splide', 'letras-theme-stack' ),
            file_exists( $dir . '/js/home-carousels.js' ) ? filemtime( $dir . '/js/home-carousels.js' ) : wp_get_theme()->get( 'Version' ),
            array( 'strategy' => 'defer', 'in_footer' => true )
        );
    }

    // ── Índice de búsqueda del command palette ⌘K ──────────────
    // 100% datos reales: el menú "Menú Principal" que administras
    // desde WP-Admin (theme_location 'primary') + noticias reales
    // (misma fuente que letrasNewsData, categoría "noticias").
    $search_index = array();

    // 1) Ítems del menú real de WordPress.
    $menu_locations = get_nav_menu_locations();
    if ( ! empty( $menu_locations['primary'] ) ) {
        $menu_items = wp_get_nav_menu_items( $menu_locations['primary'] );
        if ( $menu_items ) {
            foreach ( $menu_items as $mi ) {
                $search_index[] = array(
                    'title' => $mi->title,
                    'sub'   => 'Menú principal',
                    'icon'  => 'fa-solid fa-link',
                    'group' => 'Menú',
                    'href'  => $mi->url,
                );
            }
        }
    }

    // 2) Noticias reales (últimas 8 de la categoría "noticias").
    $news_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => 8,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'category_name'  => 'noticias',
    ) );
    if ( $news_query->have_posts() ) {
        while ( $news_query->have_posts() ) {
            $news_query->the_post();
            $search_index[] = array(
                'title' => get_the_title(),
                'sub'   => get_the_date( 'j F Y' ),
                'icon'  => 'fa-regular fa-newspaper',
                'group' => 'Noticias',
                'href'  => get_permalink(),
            );
        }
        wp_reset_postdata();
    }

    // 3) Escuelas profesionales (10, mismos datos reales de template-parts/home/escuelas.php).
    foreach ( letras_flch_schools_data() as $school ) {
        $search_index[] = array(
            'title' => $school['name'],
            'sub'   => 'Escuela profesional',
            'icon'  => 'fa-solid fa-graduation-cap',
            'group' => 'Escuelas',
            'href'  => $school['href'],
        );
    }

    // 4) Revistas académicas (mismos datos reales de template-parts/home/revistas.php).
    foreach ( letras_flch_revistas_data() as $revista ) {
        $search_index[] = array(
            'title' => $revista['name'],
            'sub'   => $revista['issn'],
            'icon'  => 'fa-solid fa-book-open',
            'group' => 'Revistas',
            'href'  => $revista['href'],
        );
    }

    // 5) Centros de producción (mismos datos reales del hero/accesos).
    foreach ( letras_flch_centros_data() as $centro ) {
        $search_index[] = array(
            'title' => $centro['title'],
            'sub'   => 'Centro de producción',
            'icon'  => $centro['icon'],
            'group' => 'Centros',
            'href'  => $centro['href'],
        );
    }

    // 6) Accesos rápidos.
    $search_index[] = array( 'title' => 'Horarios 2026-I', 'sub' => 'Consulta tu horario de clases', 'icon' => 'fa-solid fa-clock', 'group' => 'Accesos', 'href' => 'https://letras.unmsm.edu.pe/horarios-flch.php' );
    $search_index[] = array( 'title' => 'Directorio FLCH', 'sub' => 'Contactos institucionales', 'icon' => 'fa-solid fa-address-book', 'group' => 'Accesos', 'href' => 'https://letras.unmsm.edu.pe/directorio/' );
    $search_index[] = array( 'title' => 'Admisión 2026', 'sub' => 'Postula a la Decana de América', 'icon' => 'fa-solid fa-file-signature', 'group' => 'Accesos', 'href' => 'https://admision.unmsm.edu.pe/' );

    wp_localize_script( 'letras-kingster-extras', 'kgSearchIndex', $search_index );
}
add_action( 'wp_enqueue_scripts', 'letras_flch_kingster_extras_assets', 40 );

/* ══════════════════════════════════════════════════════════════
   LOGIN INSTITUCIONAL — estiliza wp-login.php (sin plantilla nueva)
   ══════════════════════════════════════════════════════════════ */
function letras_flch_login_styles() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();
    wp_enqueue_style(
        'letras-fonts',
        $uri . '/css/fonts.css',
        array(),
        file_exists( $dir . '/css/fonts.css' ) ? filemtime( $dir . '/css/fonts.css' ) : wp_get_theme()->get( 'Version' )
    );
    wp_enqueue_style(
        'letras-variables',
        $uri . '/css/variables.css',
        array(),
        file_exists( $dir . '/css/variables.css' ) ? filemtime( $dir . '/css/variables.css' ) : wp_get_theme()->get( 'Version' )
    );
    wp_enqueue_style(
        'letras-login',
        $uri . '/css/login.css',
        array( 'letras-variables' ),
        file_exists( $dir . '/css/login.css' ) ? filemtime( $dir . '/css/login.css' ) : wp_get_theme()->get( 'Version' )
    );
}
add_action( 'login_enqueue_scripts', 'letras_flch_login_styles' );

function letras_flch_login_heading() {
    echo '<p class="kg-login__title">' . esc_html__( 'Acceso institucional', 'letrasflch' ) . '</p>';
    echo '<p class="kg-login__subtitle">' . esc_html__( 'Intranet · Aula Virtual · Correo FLCH', 'letrasflch' ) . '</p>';
}
add_action( 'login_header', 'letras_flch_login_heading' );

function letras_flch_login_logo_url() {
    return home_url( '/' );
}
add_filter( 'login_headerurl', 'letras_flch_login_logo_url' );

function letras_flch_login_logo_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'letras_flch_login_logo_title' );

