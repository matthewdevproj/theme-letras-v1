<?php

/**
 * Header template con barra superior separada para FLCH - VERSIÓN CORREGIDA
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">

    <?php wp_head(); ?>

    <!-- Theme color -->
    <meta name="theme-color" content="#0A1E3C">

    <style>
        /* ===================================
   BARRA SUPERIOR - VERSIÓN MEJORADA
   =================================== */

        /* Contenedor principal */
        .top-bar-custom {
            background: linear-gradient(135deg, #1A1A1A 0%, #2A2A2A 100%) !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            position: relative !important;
            font-size: 0.875rem !important;
            display: block !important;
        }

        /* Efectos de brillo sutiles */
        .top-bar-custom .top-bar-shine {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            z-index: 1;
        }

        .top-bar-custom .top-bar-shine-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            z-index: 1;
        }

        /* Contenedor interno */
        .top-bar-custom .top-bar-container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            position: relative;
            z-index: 2;
        }

        /* Flex principal */
        .top-bar-custom .top-bar-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        /* Información de contacto */
        .top-bar-custom .top-bar-divider {
            display: flex;
            align-items: center;
        }

        .top-bar-custom .top-bar-divider>* {
            padding-right: 1.25rem;
            margin-right: 1.25rem;
            position: relative;
        }

        .top-bar-custom .top-bar-divider>*:last-child {
            padding-right: 0;
            margin-right: 0;
        }

        /* Items de contacto */
        .top-bar-custom .top-bar-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .top-bar-custom .top-bar-item:hover {
            color: #A88F1D;
        }

        /* Iconos circulares */
        .top-bar-custom .top-bar-icon-wrapper {
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        /* Colores específicos para cada icono de contacto */
        .top-bar-custom .top-bar-icon-wrapper.directorio {
            background-color: #A88F1D;
        }

        .top-bar-custom .top-bar-icon-wrapper.email {
            background-color: #A88F1D;
        }

        .top-bar-custom .top-bar-icon-wrapper.ubicacion {
            background-color: #A88F1D;
        }

        .top-bar-custom .top-bar-icon {
            color: white;
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .top-bar-custom .top-bar-item:hover .top-bar-icon {
            transform: scale(1.2);
        }

        /* Textos - CONTRASTE MEJORADO */
        .top-bar-custom .top-bar-label {
            display: block;
            color: #B0B0B0;
            font-size: 0.5625rem;
            font-weight: 600;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .top-bar-custom .top-bar-value {
            color: #FFFFFF;
            font-size: 0.75rem;
            font-weight: 600;
            transition: color 0.3s ease;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .top-bar-custom .top-bar-item:hover .top-bar-value {
            color: #A88F1D;
        }

        .top-bar-custom .top-bar-email {
            color: #FFFFFF;
            font-size: 0.75rem;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .top-bar-custom .top-bar-item:hover .top-bar-email {
            color: #A88F1D;
        }

        /* Redes sociales */
        .top-bar-custom .top-bar-social {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .top-bar-custom .top-bar-social-text {
            color: #B0B0B0;
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .top-bar-custom .top-bar-social-grid {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .top-bar-custom .top-bar-social-link {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .top-bar-custom .top-bar-social-link i {
            font-size: 1rem;
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
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            filter: brightness(1.1);
        }

        /* Responsive */
        @media (max-width: 1150px) {
            .top-bar-custom .top-bar-value {
                display: none;
            }

            .top-bar-custom .top-bar-email {
                font-size: 0.7rem;
            }

            .top-bar-custom .top-bar-icon-wrapper {
                width: 1.5rem;
                height: 1.5rem;
            }
        }

        @media (max-width: 1024px) {
            .top-bar-custom {
                display: none !important;
            }
        }

        /* ===================================
           BARRA DE BÚSQUEDA - VERSIÓN CORREGIDA
           =================================== */
        .search-bar {
            background-color: #0A1E3C !important;
            border-top: 1px solid rgba(168, 143, 29, 0.3) !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3) !important;
            position: relative;
            z-index: 45;
        }

        .search-bar .search-input {
            background-color: #1E3A5F !important;
            border: 2px solid rgba(168, 143, 29, 0.3) !important;
            color: white !important;
            border-radius: 0.75rem !important;
            padding: 1rem 1.5rem !important;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
        }

        .search-bar .search-input:focus {
            border-color: #A88F1D !important;
            outline: none !important;
            box-shadow: 0 0 0 4px rgba(168, 143, 29, 0.2) !important;
        }

        .search-bar .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .search-bar .search-clear-btn {
            position: absolute;
            right: 5rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.3s ease;
        }

        .search-bar .search-clear-btn:hover {
            color: white;
        }

        .search-bar .search-submit-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background-color: #A88F1D;
            color: white;
            font-weight: 600;
            padding: 0.6rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .search-bar .search-submit-btn:hover {
            background-color: #8B7718;
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 8px 12px -2px rgba(0, 0, 0, 0.4);
        }

        .search-bar .suggestion-link {
            display: inline-block;
            padding: 0.4rem 1rem;
            background-color: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border-radius: 9999px;
            font-size: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .search-bar .suggestion-link:hover {
            background-color: #A88F1D;
            color: white;
            border-color: #A88F1D;
            transform: translateY(-2px);
        }

        /* ===================================
           ESTILOS ADICIONALES
           =================================== */

        [x-cloak] {
            display: none !important;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .mobile-menu::-webkit-scrollbar {
            width: 6px;
        }

        .mobile-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .mobile-menu::-webkit-scrollbar-thumb {
            background: #A88F1D;
            border-radius: 3px;
        }

        .mobile-menu::-webkit-scrollbar-thumb:hover {
            background: #8B7718;
        }

        .main-menu {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .main-menu>li {
            position: relative;
        }

        .main-menu>li>a {
            display: block;
            padding: 0.5rem 1rem;
            color: white;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .main-menu>li>a:hover {
            color: #A88F1D;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .main-menu .sub-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: #0A1E3C;
            border: 1px solid rgba(168, 143, 29, 0.3);
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            padding: 0.5rem 0;
            min-width: 240px;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        .main-menu li:hover>.sub-menu {
            opacity: 1;
            visibility: visible;
        }

        .main-menu .sub-menu .sub-menu {
            left: 100%;
            top: 0;
            margin-left: 2px;
        }

        .main-menu .sub-menu a {
            display: block;
            padding: 0.5rem 1.5rem;
            color: white;
            white-space: nowrap;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .main-menu .sub-menu a:hover {
            background-color: #1E4A7A;
            color: #A88F1D;
            padding-left: 2rem;
        }

        .main-menu .sub-menu li:last-child a {
            border-bottom: none;
        }

        .fa-chevron-down,
        .fa-chevron-right {
            transition: transform 0.2s ease;
        }

        li:hover>a .fa-chevron-down {
            transform: rotate(180deg);
        }

        li:hover>a .fa-chevron-right {
            transform: translateX(4px);
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        /* Asegurar que el main content tenga el z-index correcto */
        .site-main {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{ searchOpen: false, mobileMenuOpen: false }"
    @keydown.escape="searchOpen = false; mobileMenuOpen = false">
    <?php wp_body_open(); ?>

    <!-- Skip to content link -->
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-8 focus:left-8 focus:z-50 focus:px-4 focus:py-4 focus:bg-[#A88F1D] focus:text-white focus:rounded-lg">
        Saltar al contenido principal
    </a>

    <!-- BARRA SUPERIOR - CON ESTILOS DIRECTOS Y MEJORADA -->
    <div class="top-bar-custom hidden lg:block">

        <!-- Efectos de brillo sutiles -->
        <div class="top-bar-shine"></div>

        <div class="top-bar-container">
            <div class="top-bar-flex">

                <!-- Información de contacto - MEJORADA -->
                <div class="top-bar-divider">

                    <!-- Directorio -->
                    <a href="https://letras.unmsm.edu.pe/directorio/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="top-bar-item">
                        <div class="top-bar-icon-wrapper directorio">
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
                        <div class="top-bar-icon-wrapper email">
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
                        <div class="top-bar-icon-wrapper ubicacion">
                            <i class="fas fa-map-marker-alt top-bar-icon"></i>
                        </div>
                        <div>
                            <span class="top-bar-label">CAMPUS</span>
                            <span class="top-bar-value">Calle Germán Amézaga N° 375 - Lima</span>
                        </div>
                    </a>
                </div>

                <!-- Redes sociales - AHORA CON COLORES PERMANENTES -->
                <div class="top-bar-social">
                    <span class="top-bar-social-text">SÍGUENOS</span>
                    <div class="top-bar-social-grid">

                        <!-- Facebook - Azul permanente -->
                        <a href="https://www.facebook.com/letrassanmarcos"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link facebook"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <!-- Instagram - Rosa/Morado permanente -->
                        <a href="https://www.instagram.com/letrasunmsm/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link instagram"
                            aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <!-- YouTube - Rojo permanente -->
                        <a href="https://www.youtube.com/@LetrasTV-p9j"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="top-bar-social-link youtube"
                            aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>

                        <!-- LinkedIn - Azul permanente -->
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

        <!-- Efecto de brillo inferior sutil -->
        <div class="top-bar-shine-bottom"></div>
    </div>

    <!-- HEADER PRINCIPAL - Se mantiene igual -->
    <header class="sticky top-0 z-50 bg-gradient-to-r from-[#0A1E3C] to-[#143B63] shadow-lg transition-all duration-300" id="header">

        <div class="container-custom">
            <div class="flex items-center justify-between py-3 lg:py-4">

                <!-- Logo -->
                <div class="header-logo group bg-[#0A1E3C] p-2 rounded-lg shadow-inner">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block relative">
                        <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                            alt="<?php bloginfo('name'); ?>"
                            class="h-12 lg:h-16 w-auto brightness-0 invert transition-all duration-300 group-hover:scale-105"
                            style="filter: brightness(0) invert(1);">
                    </a>
                </div>

                <!-- Navegación desktop -->
                <nav class="hidden lg:block" aria-label="Menú principal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'main-menu flex items-center gap-1',
                        'container'      => false,
                        'depth'          => 3,
                        'fallback_cb'    => false,
                        'walker'         => new Letras_FLCH_Walker_Nav()
                    ));
                    ?>
                </nav>

                <!-- Acciones derecha -->
                <div class="flex items-center space-x-3">

                    <!-- Botón de búsqueda -->
                    <button @click="searchOpen = !searchOpen; if(searchOpen) setTimeout(() => $refs.searchInput.focus(), 300)"
                        class="relative w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        :class="{ 'bg-[#A88F1D]': searchOpen }"
                        aria-label="Abrir buscador">
                        <i class="fas fa-search text-sm transition-all duration-300 group-hover:scale-110"
                            :class="{ 'rotate-90': searchOpen }"></i>
                    </button>

                    <!-- Botón móvil -->
                    <button class="block lg:hidden relative w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center"
                        @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
                        :class="{ 'bg-[#A88F1D]': mobileMenuOpen }"
                        aria-label="Abrir menú móvil">
                        <i class="fas fa-bars text-sm transition-transform duration-300"
                            :class="{ 'rotate-90': mobileMenuOpen }"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Barra de búsqueda - VERSIÓN CORREGIDA -->
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
                <div class="text-white/80 text-sm mb-3 flex items-center gap-2 font-medium">
                    <i class="fas fa-search text-[#A88F1D]"></i>
                    <span>¿Qué estás buscando en la Facultad de Letras?</span>
                </div>
                
                <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    
                    <div class="relative">
                        <input type="search" 
                               id="search-input"
                               x-ref="searchInput"
                               class="search-input w-full"
                               placeholder="Buscar facultades, carreras, cursos, noticias, eventos..." 
                               value="<?php echo get_search_query(); ?>" 
                               name="s"
                               autocomplete="off">
                        
                        <!-- Botón limpiar -->
                        <button type="button" 
                                class="search-clear-btn"
                                @click="$refs.searchInput.value = ''; $refs.searchInput.focus()"
                                x-show="$refs.searchInput?.value.length > 0"
                                x-cloak>
                            <i class="fas fa-times-circle text-lg"></i>
                        </button>
                        
                        <!-- Botón buscar -->
                        <button type="submit" 
                                class="search-submit-btn"
                                aria-label="Buscar">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </form>
                
                <!-- Sugerencias mejoradas -->
                <div class="flex flex-wrap items-center gap-3 mt-4">
                    <span class="text-white/60 flex items-center gap-1 text-sm">
                        <i class="fas fa-lightbulb text-[#A88F1D] text-xs"></i>
                        <span>Sugerencias:</span>
                    </span>
                    
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo esc_url(home_url('/?s=Pregrado')); ?>" 
                           class="suggestion-link">
                            Pregrado
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Posgrado')); ?>" 
                           class="suggestion-link">
                            Posgrado
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Idiomas')); ?>" 
                           class="suggestion-link">
                            Centro de Idiomas
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Biblioteca')); ?>" 
                           class="suggestion-link">
                            Biblioteca
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Investigación')); ?>" 
                           class="suggestion-link">
                            Investigación
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Admisión')); ?>" 
                           class="suggestion-link">
                            Admisión
                        </a>
                    </div>
                </div>
                
                <!-- Búsquedas populares -->
                <div class="mt-4 pt-3 border-t border-white/10 text-xs text-white/40 flex flex-wrap items-center gap-2">
                    <i class="fas fa-chart-line text-[#A88F1D]"></i>
                    <span>Búsquedas populares hoy:</span>
                    <div class="flex flex-wrap gap-2">
                        <span class="text-white/50 bg-white/5 px-2 py-1 rounded-full">Malla curricular</span>
                        <span class="text-white/50 bg-white/5 px-2 py-1 rounded-full">Docentes</span>
                        <span class="text-white/50 bg-white/5 px-2 py-1 rounded-full">Calendario académico</span>
                        <span class="text-white/50 bg-white/5 px-2 py-1 rounded-full">Trámites</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="mobile-menu fixed inset-x-0 top-[72px] lg:hidden bg-[#0A1E3C] shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-72px)] overflow-y-auto"
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            @click.away="mobileMenuOpen = false"
            x-cloak>
            <nav class="px-4 py-6">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'space-y-2',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
                ));
                ?>

                <!-- Información de contacto en móvil -->
                <div class="mt-8 pt-6 border-t border-white/10">
                    <h3 class="text-sm font-semibold text-white mb-4">Contacto</h3>
                    <div class="space-y-3 text-sm text-white/80">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone-alt text-[#A88F1D] w-5"></i>
                            <a href="tel:+5101967000" class="hover:text-[#A88F1D]">(01) 619-7000 anexo 2801</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-address-book text-[#A88F1D] w-5"></i>
                            <a href="https://letras.unmsm.edu.pe/directorio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-[#A88F1D] border-b border-transparent hover:border-[#A88F1D]">
                                Directorio FLCH
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-[#A88F1D] w-5"></i>
                            <a href="mailto:informatica.letras@unmsm.edu.pe" class="hover:text-[#A88F1D] break-all">informatica.letras@unmsm.edu.pe</a>
                        </div>
                        <div class="flex items-center space-x-3">
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
            // Guardar búsquedas recientes
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
        });
    </script>

    <main id="main" class="site-main">