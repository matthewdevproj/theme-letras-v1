<?php

/**
 * Header template con barra superior separada para FLCH - VERSIÓN PREMIUM
 *
 * @package LetrasFLCH
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">

    <?php wp_head(); ?>

    <!-- Theme color -->
    <meta name="theme-color" content="#0A1E3C">

    <style>
        /* ===================================
           ESTILOS GLOBALES DE CONTRASTE
           =================================== */
        :root {
            --color-primary: #0A1E3C;
            --color-primary-light: #143B63;
            --color-accent: #A88F1D;
            --color-accent-dark: #8B7718;
            --color-text-light: #FFFFFF;
            --color-text-muted: #E0E0E0;
            --color-text-dim: #B0B0B0;
            --color-bg-dark: #1A1A1A;
            --color-bg-darker: #0F0F0F;
        }

        /* Mejora de contraste para textos */
        body {
            color: #333333;
            line-height: 1.6;
        }

        /* ===================================
           BARRA SUPERIOR - VERSIÓN PREMIUM
           =================================== */
        .top-bar-custom {
            background: linear-gradient(135deg, #0F0F0F 0%, #1E1E1E 100%) !important;
            color: var(--color-text-light) !important;
            box-shadow: 0 4px 10px -2px rgba(0, 0, 0, 0.3) !important;
            position: relative !important;
            font-size: 0.875rem !important;
            display: block !important;
            border-bottom: 1px solid rgba(168, 143, 29, 0.25) !important;
            letter-spacing: 0.3px;
        }

        /* Efectos de brillo */
        .top-bar-custom .top-bar-shine {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 143, 29, 0.4), transparent);
            z-index: 1;
        }

        .top-bar-custom .top-bar-shine-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 143, 29, 0.2), transparent);
            z-index: 1;
        }

        /* Contenedor interno */
        .top-bar-custom .top-bar-container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            position: relative;
            z-index: 2;
        }

        /* Flex principal */
        .top-bar-custom .top-bar-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.6rem;
            padding-bottom: 0.6rem;
        }

        /* Información de contacto */
        .top-bar-custom .top-bar-divider {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .top-bar-custom .top-bar-divider>* {
            padding-right: 1.5rem;
            margin-right: 1.5rem;
            position: relative;
        }

        .top-bar-custom .top-bar-divider>*:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 20px;
            background: rgba(168, 143, 29, 0.3);
        }

        .top-bar-custom .top-bar-divider>*:last-child {
            padding-right: 0;
            margin-right: 0;
        }

        /* Items de contacto */
        .top-bar-custom .top-bar-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .top-bar-custom .top-bar-item:hover {
            color: var(--color-accent);
        }

        /* Iconos circulares */
        .top-bar-custom .top-bar-icon-wrapper {
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            background-color: var(--color-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .top-bar-custom .top-bar-icon {
            color: white;
            font-size: 0.85rem;
            transition: transform 0.3s ease;
        }

        .top-bar-custom .top-bar-item:hover .top-bar-icon {
            transform: scale(1.15);
        }

        /* Textos - CONTRASTE ÓPTIMO */
        .top-bar-custom .top-bar-label {
            display: block;
            color: var(--color-accent);
            font-size: 0.6rem;
            font-weight: 700;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .top-bar-custom .top-bar-value {
            color: var(--color-text-light);
            font-size: 0.8rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .top-bar-custom .top-bar-item:hover .top-bar-value {
            color: var(--color-accent);
        }

        .top-bar-custom .top-bar-email {
            color: var(--color-text-light);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .top-bar-custom .top-bar-item:hover .top-bar-email {
            color: var(--color-accent);
        }

        /* Redes sociales */
        .top-bar-custom .top-bar-social {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .top-bar-custom .top-bar-social-text {
            color: var(--color-text-dim);
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .top-bar-custom .top-bar-social-grid {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .top-bar-custom .top-bar-social-link {
            width: 2.2rem;
            height: 2.2rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
            font-size: 0.95rem;
        }

        /* Colores PERMANENTES de redes sociales */
        .top-bar-custom .top-bar-social-link.facebook {
            background-color: #1877F2 !important;
        }

        .top-bar-custom .top-bar-social-link.instagram {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF, #515BD4) !important;
        }

        .top-bar-custom .top-bar-social-link.youtube {
            background-color: #FF0000 !important;
        }

        .top-bar-custom .top-bar-social-link.linkedin {
            background-color: #0077B5 !important;
        }

        /* Hover effects */
        .top-bar-custom .top-bar-social-link:hover {
            transform: translateY(-3px) scale(1.08);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            filter: brightness(1.15);
        }

        /* Responsive */
        @media (max-width: 1150px) {
            .top-bar-custom .top-bar-value {
                display: none;
            }

            .top-bar-custom .top-bar-email {
                font-size: 0.75rem;
            }

            .top-bar-custom .top-bar-icon-wrapper {
                width: 1.8rem;
                height: 1.8rem;
            }
            
            .top-bar-custom .top-bar-divider>* {
                padding-right: 1rem;
                margin-right: 1rem;
            }
        }

        @media (max-width: 1024px) {
            .top-bar-custom {
                display: none !important;
            }
        }

        /* ===================================
           HEADER PRINCIPAL - CONTRASTE MEJORADO
           =================================== */
        .main-header {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(168, 143, 29, 0.2);
        }

        /* Navegación desktop */
        .main-menu {
            display: flex;
            align-items: center;
            gap: 0.2rem;
        }

        .main-menu > li {
            position: relative;
        }

        .main-menu > li > a {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.6rem 1.1rem;
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            white-space: nowrap;
            letter-spacing: 0.3px;
        }

        .main-menu > li > a:hover {
            color: var(--color-accent);
            background-color: rgba(255, 255, 255, 0.08);
        }

        /* Submenús */
        .main-menu .sub-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: var(--color-primary);
            border: 1px solid rgba(168, 143, 29, 0.3);
            border-radius: 0.5rem;
            box-shadow: 0 15px 30px -8px rgba(0, 0, 0, 0.4);
            padding: 0.6rem 0;
            min-width: 250px;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
            margin-top: 0.2rem;
        }

        .main-menu li:hover > .sub-menu {
            opacity: 1;
            visibility: visible;
        }

        .main-menu .sub-menu .sub-menu {
            left: 100%;
            top: -0.6rem;
            margin-left: 2px;
        }

        .main-menu .sub-menu a {
            display: block;
            padding: 0.7rem 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            white-space: nowrap;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .main-menu .sub-menu a:hover {
            background-color: #1E4A7A;
            color: var(--color-accent);
            padding-left: 2rem;
        }

        .main-menu .sub-menu li:last-child a {
            border-bottom: none;
        }

        /* Flechas animadas */
        .fa-chevron-down {
            font-size: 0.7rem;
            transition: transform 0.2s ease;
            opacity: 0.8;
        }

        li:hover > a .fa-chevron-down {
            transform: rotate(180deg);
            opacity: 1;
        }

        /* ===================================
           BARRA DE BÚSQUEDA - CONTRASTE ÓPTIMO
           =================================== */
        .search-bar {
            background-color: var(--color-primary) !important;
            border-top: 1px solid rgba(168, 143, 29, 0.25) !important;
            border-bottom: 1px solid rgba(168, 143, 29, 0.1) !important;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.4) !important;
            position: relative;
            z-index: 45;
        }

        .search-bar .search-title {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: 0.3px;
        }

        .search-bar .search-title i {
            color: var(--color-accent);
            font-size: 0.9rem;
        }

        .search-bar .search-input-wrapper {
            position: relative;
            width: 100%;
        }

        .search-bar .search-input {
            background-color: #132A45 !important;
            border: 2px solid rgba(168, 143, 29, 0.3) !important;
            color: white !important;
            border-radius: 0.75rem !important;
            padding: 1rem 8rem 1rem 1.5rem !important;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .search-bar .search-input:focus {
            border-color: var(--color-accent) !important;
            outline: none !important;
            box-shadow: 0 0 0 4px rgba(168, 143, 29, 0.2) !important;
            background-color: #153250 !important;
        }

        .search-bar .search-input::placeholder {
            color: rgba(255, 255, 255, 0.55) !important;
            font-weight: 300;
        }

        .search-bar .search-clear-btn {
            position: absolute;
            right: 5.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }

        .search-bar .search-clear-btn:hover {
            color: white;
        }

        .search-bar .search-submit-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--color-accent);
            color: white;
            font-weight: 600;
            padding: 0.6rem 1.3rem;
            border-radius: 0.6rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 0.9rem;
        }

        .search-bar .search-submit-btn:hover {
            background-color: var(--color-accent-dark);
            transform: translateY(-50%) scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .search-bar .suggestions-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .search-bar .suggestions-label {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .search-bar .suggestions-label i {
            color: var(--color-accent);
            font-size: 0.75rem;
        }

        .search-bar .suggestion-link {
            display: inline-block;
            padding: 0.4rem 1.1rem;
            background-color: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            border-radius: 9999px;
            font-size: 0.8rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.25s ease;
            text-decoration: none;
            font-weight: 400;
        }

        .search-bar .suggestion-link:hover {
            background-color: var(--color-accent);
            color: white;
            border-color: var(--color-accent);
            transform: translateY(-2px);
        }

        .search-bar .popular-searches {
            margin-top: 1.2rem;
            padding-top: 0.8rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.8rem;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.45);
        }

        .search-bar .popular-searches i {
            color: var(--color-accent);
            font-size: 0.75rem;
        }

        .search-bar .popular-tag {
            background-color: rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.7);
            padding: 0.25rem 0.8rem;
            border-radius: 9999px;
            transition: all 0.2s ease;
        }

        .search-bar .popular-tag:hover {
            background-color: rgba(168, 143, 29, 0.2);
            color: white;
        }

        /* ===================================
           MENÚ MÓVIL - CONTRASTE MEJORADO
           =================================== */
        .mobile-menu {
            background-color: var(--color-primary) !important;
            border-top: 1px solid rgba(168, 143, 29, 0.25) !important;
            box-shadow: 0 15px 25px -8px rgba(0, 0, 0, 0.4) !important;
        }

        .mobile-menu a {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 0.8rem 1rem !important;
            display: block !important;
            transition: all 0.2s ease !important;
            border-radius: 0.5rem !important;
            font-weight: 400;
        }

        .mobile-menu a:hover {
            background-color: #1E4A7A !important;
            color: var(--color-accent) !important;
            padding-left: 1.5rem !important;
        }

        .mobile-menu .menu-item-has-children > div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .mobile-submenu-toggle {
            color: rgba(255, 255, 255, 0.7) !important;
            padding: 0.75rem 1rem !important;
            border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
            background: transparent !important;
            transition: all 0.2s ease !important;
        }

        .mobile-submenu-toggle:hover {
            background-color: #1E4A7A !important;
            color: var(--color-accent) !important;
        }

        .mobile-menu ul ul {
            margin-left: 1rem !important;
            padding-left: 1rem !important;
            border-left: 2px solid var(--color-accent) !important;
            background-color: rgba(0, 0, 0, 0.2) !important;
        }

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        /* Scrollbar personalizada */
        .mobile-menu::-webkit-scrollbar {
            width: 6px;
        }

        .mobile-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .mobile-menu::-webkit-scrollbar-thumb {
            background: var(--color-accent);
            border-radius: 3px;
        }

        .mobile-menu::-webkit-scrollbar-thumb:hover {
            background: var(--color-accent-dark);
        }

        /* Utilidades */
        [x-cloak] {
            display: none !important;
        }

        .rotate-90 {
            transform: rotate(90deg);
        }

        /* Ajustes de espaciado general */
        .container-custom {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Garantizar contraste en todo */
        .text-white\/90 {
            color: rgba(255, 255, 255, 0.95) !important;
        }
        
        .text-white\/80 {
            color: rgba(255, 255, 255, 0.9) !important;
        }
    </style>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{ searchOpen: false, mobileMenuOpen: false }"
    @keydown.escape="searchOpen = false; mobileMenuOpen = false">
    <?php wp_body_open(); ?>

    <!-- Skip to content link -->
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-5 focus:py-3 focus:bg-[#A88F1D] focus:text-white focus:rounded-lg focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-white">
        Saltar al contenido principal
    </a>

    <!-- BARRA SUPERIOR - VERSIÓN PREMIUM -->
    <div class="top-bar-custom hidden lg:block">

        <!-- Efectos de brillo sutiles -->
        <div class="top-bar-shine"></div>

        <div class="top-bar-container">
            <div class="top-bar-flex">

                <!-- Información de contacto -->
                <div class="top-bar-divider">

                    <!-- Directorio -->
                    <a href="https://letras.unmsm.edu.pe/directorio/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="top-bar-item">
                        <div class="top-bar-icon-wrapper">
                            <i class="fas fa-address-book top-bar-icon"></i>
                        </div>
                        <div>
                            <span class="top-bar-label">DIRECTORIO</span>
                            <span class="top-bar-value">FLCH UNMSM</span>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:informatica.letras@unmsm.edu.pe"
                        class="top-bar-item">
                        <div class="top-bar-icon-wrapper">
                            <i class="fas fa-envelope top-bar-icon"></i>
                        </div>
                        <div>
                            <span class="top-bar-label">EMAIL</span>
                            <span class="top-bar-email">informatica.letras@unmsm.edu.pe</span>
                        </div>
                    </a>

                    <!-- Ubicación -->
                    <a href="https://maps.app.goo.gl/..."
                        target="_blank"
                        rel="noopener noreferrer"
                        class="top-bar-item">
                        <div class="top-bar-icon-wrapper">
                            <i class="fas fa-clock top-bar-icon"></i>
                        </div>
                        <div>
                            <span class="top-bar-label">HORARIOS ACADÉMICOS</span>
                            <span class="top-bar-value">Conoce tu horario - 2026-1</span>
                        </div>
                    </a>
                </div>

                <!-- Redes sociales -->
                <div class="top-bar-social">
                    <span class="top-bar-social-text">SÍGUENOS</span>
                    <div class="top-bar-social-grid">

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/letrassanmarcos"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link facebook"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/letrasunmsm/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link instagram"
                            aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@LetrasTV-p9j"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link youtube"
                            aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://pe.linkedin.com/school/letrasunmsm/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link linkedin"
                            aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Efecto de brillo inferior -->
        <div class="top-bar-shine-bottom"></div>
    </div>

    <!-- HEADER PRINCIPAL -->
    <header class="sticky top-0 z-50 main-header" id="header">

        <div class="container-custom">
            <div class="flex items-center justify-between py-3 lg:py-4">

                <!-- Logo -->
                <div class="header-logo group">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block relative">
                        <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                            alt="<?php bloginfo('name'); ?>"
                            class="h-10 md:h-12 lg:h-16 w-auto brightness-0 invert transition-all duration-300 group-hover:scale-105"
                            style="filter: brightness(0) invert(1);">
                    </a>
                </div>

                <!-- Navegación desktop -->
                <nav class="hidden lg:block" aria-label="Menú principal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'main-menu',
                        'container'      => false,
                        'depth'          => 3,
                        'fallback_cb'    => false,
                        'walker'         => new Letras_FLCH_Walker_Nav()
                    ));
                    ?>
                </nav>

                <!-- Acciones derecha -->
                <div class="flex items-center space-x-2 md:space-x-3">

                    <!-- Botón de búsqueda -->
                    <button @click="searchOpen = !searchOpen; if(searchOpen) setTimeout(() => $refs.searchInput.focus(), 300)"
                        class="relative w-9 h-9 md:w-10 md:h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        :class="{ 'bg-[#A88F1D]': searchOpen }"
                        aria-label="Abrir buscador">
                        <i class="fas fa-search text-sm md:text-base transition-all duration-300 group-hover:scale-110"
                            :class="{ 'rotate-90': searchOpen }"></i>
                    </button>

                    <!-- Botón móvil -->
                    <button class="block lg:hidden relative w-9 h-9 md:w-10 md:h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center"
                        @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
                        :class="{ 'bg-[#A88F1D]': mobileMenuOpen }"
                        aria-label="Abrir menú móvil">
                        <i class="fas fa-bars text-sm md:text-base transition-transform duration-300"
                            :class="{ 'rotate-90': mobileMenuOpen }"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Barra de búsqueda - VERSIÓN PREMIUM -->
        <div class="search-bar overflow-hidden transition-all duration-500" 
             x-show="searchOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-4"
             @click.away="searchOpen = false"
             role="search"
             x-cloak>
            <div class="container-custom py-6">
                
                <!-- Título de búsqueda -->
                <div class="search-title">
                    <i class="fas fa-search"></i>
                    <span>¿Qué estás buscando en la Facultad de Letras?</span>
                </div>
                
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    
                    <div class="search-input-wrapper">
                        <input type="search" 
                               id="search-input"
                               x-ref="searchInput"
                               class="search-input"
                               placeholder="Ej: Pregrado, Posgrado, Idiomas, Biblioteca, Admisión..." 
                               value="<?php echo get_search_query(); ?>" 
                               name="s"
                               autocomplete="off">
                        
                        <!-- Botón limpiar (solo aparece cuando hay texto) -->
                        <button type="button" 
                                class="search-clear-btn"
                                @click="$refs.searchInput.value = ''; $refs.searchInput.focus()"
                                x-show="$refs.searchInput?.value.length > 0"
                                x-cloak>
                            <i class="fas fa-times-circle"></i>
                        </button>
                        
                        <!-- Botón buscar -->
                        <button type="submit" 
                                class="search-submit-btn">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </form>
                
                <!-- Sugerencias de búsqueda -->
                <div class="suggestions-container">
                    <span class="suggestions-label">
                        <i class="fas fa-lightbulb"></i>
                        <span>Sugerencias:</span>
                    </span>
                    
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo esc_url(home_url('/?s=Pregrado')); ?>" class="suggestion-link">Pregrado</a>
                        <a href="<?php echo esc_url(home_url('/?s=Posgrado')); ?>" class="suggestion-link">Posgrado</a>
                        <a href="<?php echo esc_url(home_url('/?s=Idiomas')); ?>" class="suggestion-link">Idiomas</a>
                        <a href="<?php echo esc_url(home_url('/?s=Biblioteca')); ?>" class="suggestion-link">Biblioteca</a>
                        <a href="<?php echo esc_url(home_url('/?s=Investigación')); ?>" class="suggestion-link">Investigación</a>
                        <a href="<?php echo esc_url(home_url('/?s=Admisión')); ?>" class="suggestion-link">Admisión</a>
                        <a href="<?php echo esc_url(home_url('/?s=Malla curricular')); ?>" class="suggestion-link">Malla curricular</a>
                    </div>
                </div>
                
                <!-- Búsquedas populares -->
                <div class="popular-searches">
                    <i class="fas fa-chart-line"></i>
                    <span>Búsquedas populares:</span>
                    <div class="flex flex-wrap gap-2">
                        <span class="popular-tag">Docentes</span>
                        <span class="popular-tag">Calendario académico</span>
                        <span class="popular-tag">Trámites</span>
                        <span class="popular-tag">CEID</span>
                        <span class="popular-tag">Posgrado</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="mobile-menu fixed inset-x-0 top-[65px] md:top-[72px] lg:hidden shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-65px)] md:max-h-[calc(100vh-72px)] overflow-y-auto"
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            @click.away="mobileMenuOpen = false"
            x-cloak>
            <nav class="px-4 py-5">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'space-y-1',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
                ));
                ?>

                <!-- Información de contacto en móvil -->
                <div class="mt-8 pt-6 border-t border-white/10">
                    <h3 class="text-sm font-semibold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-[#A88F1D]"></i>
                        Contacto
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-phone-alt text-[#A88F1D] w-5"></i>
                            <a href="tel:+5101967000" class="hover:text-[#A88F1D] transition-colors">(01) 619-7000 anexo 2801</a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-address-book text-[#A88F1D] w-5"></i>
                            <a href="https://letras.unmsm.edu.pe/directorio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-[#A88F1D] transition-colors">
                                Directorio FLCH
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-envelope text-[#A88F1D] w-5"></i>
                            <a href="mailto:informatica.letras@unmsm.edu.pe" class="hover:text-[#A88F1D] transition-colors break-all">informatica.letras@unmsm.edu.pe</a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-map-marker-alt text-[#A88F1D] w-5"></i>
                            <span>Calle Germán Amézaga N° 375 - Lima</span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Script para toggle de submenús móvil -->
    <script>
        function toggleMobileSubmenu(button) {
            const submenu = button.closest('li').querySelector('ul.sub-menu');
            const icon = button.querySelector('i');

            if (submenu) {
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            }
            return false;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Guardar búsquedas recientes en localStorage
            const searchForm = document.querySelector('.search-form');
            if (searchForm) {
                searchForm.addEventListener('submit', function() {
                    const input = document.getElementById('search-input');
                    const searchTerm = input.value.trim();

                    if (searchTerm && searchTerm.length > 2) {
                        let recentSearches = JSON.parse(localStorage.getItem('recentSearches') || '[]');
                        recentSearches = [searchTerm, ...recentSearches.filter(s => s !== searchTerm)].slice(0, 5);
                        localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
                    }
                });
            }

            // Prevenir scroll cuando el menú móvil está abierto
            const checkMobileMenu = () => {
                if (window.innerWidth >= 1024) {
                    document.body.style.overflow = '';
                }
            };

            window.addEventListener('resize', checkMobileMenu);
            
            // Debug
            console.log('Header FLCH cargado correctamente');
        });
    </script>

    <main id="main" class="site-main">