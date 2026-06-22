<?php
/**
 * Plugin Name: Activar Header Moderno FLCH
 * Description: Activa el header moderno con Tailwind + GSAP
 * Version: 1.0
 * Author: FLCH UNMSM
 */

// Activar el header moderno
add_filter('letras_use_modern_header', '__return_true');

// Cambiar el template de header
add_action('get_header', function() {
    remove_action('wp_head', 'wp_enqueue_scripts', 1);

    // Remover header.php y usar header-modern.php
    add_filter('template_include', function($template) {
        if (basename($template) === 'header.php') {
            return get_template_directory() . '/header-modern.php';
        }
        return $template;
    }, 99);
});

// Agregar clase al body para identificar header moderno
add_filter('body_class', function($classes) {
    $classes[] = 'header-modern-active';
    return $classes;
});
