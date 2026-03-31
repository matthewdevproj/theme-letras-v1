<?php
/**
 * Letras FLCH Theme Functions
 *
 * @package LetrasFLCH
 */

// Registrar ubicaciones de menú
function letras_flch_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Menú Principal', 'letrasflch'),
        'footer'  => esc_html__('Menú Footer', 'letrasflch'),
    ));
}
add_action('init', 'letras_flch_register_menus');

/**
 * Walker personalizado para menú desktop
 */
class Letras_FLCH_Walker_Nav extends Walker_Nav_Menu {
    
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            $output .= "\n$indent<ul class=\"sub-menu absolute left-0 top-full mt-0 bg-[#0A1E3C] border border-[#A88F1D]/30 rounded-lg shadow-xl py-2 min-w-[250px] z-50\">\n";
        } else {
            $output .= "\n$indent<ul class=\"sub-menu absolute left-full top-0 ml-2 bg-[#0A1E3C] border border-[#A88F1D]/30 rounded-lg shadow-xl py-2 min-w-[250px] z-50\">\n";
        }
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        
        $li_classes = array('relative');
        if ($has_children) {
            $li_classes[] = 'group';
        }
        
        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '#';
        
        if ($depth === 0) {
            $link_classes = 'block px-4 py-2 text-sm font-medium text-white hover:text-[#A88F1D] hover:bg-white/5 rounded-lg transition-all duration-200';
        } else {
            $link_classes = 'block px-4 py-2 text-sm text-white hover:text-[#A88F1D] hover:bg-[#1E4A7A] transition-all duration-200 whitespace-nowrap';
        }
        
        if ($has_children && $depth === 0) {
            $link_classes .= ' flex items-center gap-1';
        }
        
        $atts['class'] = $link_classes;
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        
        if ($has_children) {
            if ($depth === 0) {
                $item_output .= '<i class="ml-1 text-xs fas fa-chevron-down transition-transform duration-200 group-hover:rotate-180"></i>';
            } else {
                $item_output .= '<i class="ml-2 text-xs fas fa-chevron-right transition-transform duration-200"></i>';
            }
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

/**
 * Walker para menú móvil con Tailwind
 */
class Letras_FLCH_Mobile_Walker_Nav extends Walker_Nav_Menu {
    
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu pl-4 mt-2 space-y-2 border-l-2 border-[#A88F1D]/30 hidden\">\n";
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        
        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '#';
        
        $link_classes = 'block py-2 px-3 text-white hover:text-[#A88F1D] transition-colors duration-200 rounded-lg';
        $atts['class'] = $link_classes;
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
        }
        
        $item_output = $args->before;
        
        if ($has_children) {
            $item_output .= '<div class="flex items-center justify-between w-full">';
            $item_output .= '<a' . $attributes . ' class="flex-1">';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= '<button class="mobile-submenu-toggle w-10 h-10 flex items-center justify-center text-white hover:text-[#A88F1D] focus:outline-none transition-colors duration-200" onclick="toggleMobileSubmenu(this); return false;">';
            $item_output .= '<i class="fas fa-chevron-down transition-transform duration-300"></i>';
            $item_output .= '</button>';
            $item_output .= '</div>';
        } else {
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

// Agregar soporte para thumbnails
add_theme_support('post-thumbnails');

// Agregar soporte para logo personalizado
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
));

// Agregar soporte para título dinámico
add_theme_support('title-tag');

// Configurar tamaño de excerpt
function letras_flch_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'letras_flch_excerpt_length');

// Configurar texto de "Leer más"
function letras_flch_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'letras_flch_excerpt_more');

/**
 * Configuración inicial del tema
 */
function letras_flch_setup() {
    // Soporte para feeds automáticos
    add_theme_support('automatic-feed-links');

    // Soporte para HTML5 en formularios, galería, etc.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Tamaños de imagen personalizados
    add_image_size('card-thumbnail', 800, 450, true);   // 16:9 para tarjetas
    add_image_size('card-square', 400, 400, true);       // 1:1 cuadrado
    add_image_size('archive-featured', 1200, 675, true); // 16:9 imagen destacada

    // ---- Soporte para editor de bloques (Gutenberg) ----
    add_theme_support( 'wp-block-styles' );       // Estilos opcionales de bloques core
    add_theme_support( 'align-wide' );            // Alineaciones anchas y completas
    add_theme_support( 'responsive-embeds' );     // Embeds responsivos
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_html__( 'Azul institucional', 'letrasflch' ),
            'slug'  => 'primary-dark',
            'color' => '#143B63',
        ),
        array(
            'name'  => esc_html__( 'Dorado', 'letrasflch' ),
            'slug'  => 'accent-gold',
            'color' => '#A88F1D',
        ),
        array(
            'name'  => esc_html__( 'Blanco', 'letrasflch' ),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => esc_html__( 'Gris claro', 'letrasflch' ),
            'slug'  => 'gray-light',
            'color' => '#F5F7FA',
        ),
    ) );
}
add_action('after_setup_theme', 'letras_flch_setup');

/**
 * Registrar áreas de widgets (sidebars)
 */
function letras_flch_widgets_init() {
    $sidebar_defaults = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    );

    register_sidebar(array_merge($sidebar_defaults, array(
        'name'        => esc_html__('Sidebar del Blog', 'letrasflch'),
        'id'          => 'blog-sidebar',
        'description' => esc_html__('Widgets para la página de listado de noticias.', 'letrasflch'),
    )));

    register_sidebar(array_merge($sidebar_defaults, array(
        'name'        => esc_html__('Sidebar de Artículo', 'letrasflch'),
        'id'          => 'post-sidebar',
        'description' => esc_html__('Widgets para la vista de artículo individual.', 'letrasflch'),
    )));

    register_sidebar(array_merge($sidebar_defaults, array(
        'name'        => esc_html__('Sidebar de Archivo', 'letrasflch'),
        'id'          => 'archive-sidebar',
        'description' => esc_html__('Widgets para las páginas de archivo (categoría, etiqueta, fecha).', 'letrasflch'),
    )));
}
add_action('widgets_init', 'letras_flch_widgets_init');

/**
 * Encolar estilos y scripts del tema
 */
function letras_flch_enqueue_scripts() {
    $theme_uri     = get_template_directory_uri();
    $theme_version = wp_get_theme()->get('Version') ?: '1.0';

    // Google Fonts — Poppins
    wp_enqueue_style(
        'letras-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap',
        array(),
        null  // null = no version in URL (managed by Google)
    );

    // Font Awesome 6 via CDN
    wp_enqueue_style(
        'letras-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // Tailwind CSS (generado localmente con build)
    wp_enqueue_style(
        'letras-tailwind',
        $theme_uri . '/css/tailwind.css',
        array(),
        $theme_version
    );

    // CSS de variables del sistema de diseño
    wp_enqueue_style(
        'letras-variables',
        $theme_uri . '/css/variables.css',
        array('letras-tailwind'),
        $theme_version
    );

    // CSS principal de componentes
    wp_enqueue_style(
        'letras-main',
        $theme_uri . '/css/main.css',
        array('letras-variables'),
        $theme_version
    );

    // Hoja de estilos raíz del tema (style.css)
    wp_enqueue_style(
        'letras-theme',
        get_stylesheet_uri(),
        array('letras-tailwind', 'letras-main'),
        $theme_version
    );
}
add_action('wp_enqueue_scripts', 'letras_flch_enqueue_scripts');

/**
 * Devuelve la etiqueta legible de un tipo de contenido (post type).
 *
 * @param string $post_type  Slug del post type (default: post actual).
 * @return string
 */
function letras_flch_get_post_type_label( $post_type = '' ) {
    if ( empty( $post_type ) ) {
        $post_type = get_post_type();
    }
    $obj = get_post_type_object( $post_type );
    if ( $obj ) {
        return $obj->labels->singular_name;
    }
    return ucfirst( $post_type );
}

/**
 * Hace que los nombres de tamaño de imagen personalizados sean seleccionables en el editor.
 *
 * @param array $sizes
 * @return array
 */
function letras_flch_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'card-thumbnail'   => esc_html__( 'Tarjeta de noticia (16:9)', 'letrasflch' ),
        'card-square'      => esc_html__( 'Tarjeta cuadrada', 'letrasflch' ),
        'archive-featured' => esc_html__( 'Destacada de archivo (16:9)', 'letrasflch' ),
    ) );
}
add_filter( 'image_size_names_choose', 'letras_flch_custom_image_sizes' );

/**
 * Emite el Schema.org WebSite (SearchAction) en <head>.
 * Habilita el Sitelinks Search Box en Google Search.
 */
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
         . '</script>' . "\n";
}
add_action( 'wp_head', 'letras_flch_schema_website' );

/**
 * Emite el Schema.org BreadcrumbList.
 * Llamar desde template-parts/breadcrumbs.php con do_action('letras_flch_breadcrumb_schema').
 * Actualmente es un placeholder; la implementación real depende de la estructura
 * de la función de breadcrumbs existente.
 */
function letras_flch_breadcrumb_schema_output() {
    // Se implementa en breadcrumbs.php una vez integrado.
}

/**
 * Número de posts relacionados a mostrar en single.php.
 * Modificar con: define( 'LETRAS_RELATED_COUNT', 4 ) en wp-config.php.
 */
if ( ! defined( 'LETRAS_RELATED_COUNT' ) ) {
    define( 'LETRAS_RELATED_COUNT', 3 );
}