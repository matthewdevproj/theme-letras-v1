<?php
/**
 * Header Moderno V3 - FLCH UNMSM
 * Stack: Tailwind CSS + GSAP + Alpine.js + FontAwesome 6
 * 
 * Mejoras:
 * - Microinteracciones con GSAP
 * - Estados reactivos con Alpine.js
 * - Diseño premium con efectos visuales
 * - Performance optimizada
 * - Accesibilidad mejorada
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
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <meta name="theme-color" content="#143B63">
    
    <!-- Preconnect para performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="headerApp()"
    x-init="initHeader()"
    @keydown.escape="searchOpen = false; mobileMenuOpen = false; activeSubmenu = null"
    @resize.window="handleResize()">

    <?php wp_body_open(); ?>

    <!-- Skip to content -->
    <a href="#main" 
       class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[200] focus:px-6 focus:py-3 focus:bg-gold-400 focus:text-navy-900 focus:rounded-xl focus:shadow-2xl focus:ring-4 focus:ring-gold-400/50 focus:font-semibold">
        Saltar al contenido principal
    </a>

    <!-- ============================================================
         TOPBAR MEJORADO CON EFECTOS
         ============================================================ -->
    <div 
        x-show="topbarVisible"
        x-transition:enter="transition-all ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-full scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-full scale-95"
        class="flch-topbar hidden lg:block relative overflow-hidden"
        role="complementary"
        aria-label="Información de contacto y redes sociales"
        x-data="topbarAnimations()"
        x-init="initTopbar()">
        
        <!-- Fondo con efecto shimmer -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy-900 via-navy-800 to-navy-900">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-gold-400/5 to-transparent shimmer-effect"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="flex items-center justify-between h-12 text-xs">

                <!-- Contacto con hover effects -->
                <div class="flex items-center gap-6 text-white/70">
                    <a href="mailto:informatica.letras@unmsm.edu.pe"
                       class="topbar-link flex items-center gap-2 transition-all duration-300 relative group"
                       aria-label="Correo electrónico">
                        <span class="w-7 h-7 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-gold-400/20 transition-all duration-300">
                            <i class="fas fa-envelope text-gold-400/70 group-hover:text-gold-400 transition-colors"></i>
                        </span>
                        <span class="hidden xl:inline group-hover:text-gold-400 transition-colors">
                            informatica.letras@unmsm.edu.pe
                        </span>
                        <!-- Tooltip -->
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 px-3 py-1 rounded-lg bg-navy-900 text-gold-400 text-xs opacity-0 group-hover:opacity-100 transition-all duration-300 whitespace-nowrap border border-gold-400/20">
                            Copiar email
                        </span>
                    </a>
                    
                    <a href="https://letras.unmsm.edu.pe/directorio/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="topbar-link flex items-center gap-2 hover:text-gold-400 transition-all duration-300 group">
                        <span class="w-7 h-7 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-gold-400/20 transition-all duration-300">
                            <i class="fas fa-address-book text-gold-400/70 group-hover:text-gold-400 transition-colors"></i>
                        </span>
                        <span class="hidden xl:inline">Directorio</span>
                    </a>
                    
                    <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="topbar-link flex items-center gap-2 hover:text-gold-400 transition-all duration-300 group">
                        <span class="w-7 h-7 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-gold-400/20 transition-all duration-300">
                            <i class="fas fa-clock text-gold-400/70 group-hover:text-gold-400 transition-colors"></i>
                        </span>
                        <span class="hidden xl:inline">Horarios 2026-I</span>
                        <span class="px-2 py-0.5 bg-gold-400/20 text-gold-400 rounded-full text-[10px] font-bold animate-pulse">
                            Nuevo
                        </span>
                    </a>
                </div>

                <!-- Badge de estado -->
                <div class="flex items-center gap-4">
                    <div class="hidden lg:flex items-center gap-2 px-4 py-1 rounded-full bg-gold-400/10 border border-gold-400/20">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gold-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-gold-400"></span>
                        </span>
                        <span class="text-gold-400 text-xs font-medium">
                            <?php echo apply_filters('flch_topbar_notice', '📚 Ciclo 2026-I · Matrículas abiertas'); ?>
                        </span>
                    </div>

                    <!-- Redes Sociales con efectos -->
                    <div class="flex items-center gap-1">
                        <span class="text-white/40 mr-1 hidden xl:inline text-[10px] uppercase tracking-wider">Síguenos</span>
                        
                        <a href="https://www.facebook.com/letrassanmarcos"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon w-8 h-8 rounded-full flex items-center justify-center bg-white/5 hover:bg-[#1877F2] text-white/60 hover:text-white transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#1877F2]/30"
                           aria-label="Facebook FLCH"
                           x-data="socialIcon()"
                           @mouseenter="animateIcon($event)">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                        
                        <a href="https://www.instagram.com/letrasunmsm/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon w-8 h-8 rounded-full flex items-center justify-center bg-white/5 hover:bg-gradient-to-br hover:from-[#833AB4] hover:via-[#E1306C] hover:to-[#F77737] text-white/60 hover:text-white transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#E1306C]/30"
                           aria-label="Instagram FLCH">
                            <i class="fab fa-instagram text-xs"></i>
                        </a>
                        
                        <a href="https://www.youtube.com/@LetrasSanMarcos"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon w-8 h-8 rounded-full flex items-center justify-center bg-white/5 hover:bg-[#FF0000] text-white/60 hover:text-white transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#FF0000]/30"
                           aria-label="YouTube FLCH">
                            <i class="fab fa-youtube text-xs"></i>
                        </a>
                        
                        <a href="https://pe.linkedin.com/school/letrasunmsm/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon w-8 h-8 rounded-full flex items-center justify-center bg-white/5 hover:bg-[#0A66C2] text-white/60 hover:text-white transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#0A66C2]/30"
                           aria-label="LinkedIn FLCH">
                            <i class="fab fa-linkedin-in text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================
         HEADER PRINCIPAL CON EFECTOS PREMIUM
         ============================================================ -->
    <header
        class="main-header sticky top-0 z-50 transition-all duration-500"
        role="banner"
        :class="{
            'scrolled': scrolled,
            'shadow-2xl': scrolled,
            'bg-navy-900/98 backdrop-blur-xl': scrolled,
            'bg-navy-900': !scrolled
        }"
        x-data="headerScroll()"
        x-init="initScroll()">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between transition-all duration-500"
                 :style="{ height: scrolled ? '70px' : '85px' }">

                <!-- Logo con animación avanzada -->
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="header-logo flex-shrink-0 group relative"
                   aria-label="<?php bloginfo('name'); ?> - Inicio"
                   x-data="logoAnimation()"
                   x-init="initLogo()">
                    
                    <!-- Glow effect detrás del logo -->
                    <div class="absolute inset-[-20px] bg-gold-400/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                         alt="<?php bloginfo('name'); ?>"
                         class="relative z-10 transition-all duration-500"
                         :style="{ height: scrolled ? '50px' : '65px', width: 'auto' }">
                    
                    <!-- Label flotante -->
                    <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-gold-400 text-[10px] font-medium opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 whitespace-nowrap">
                        Inicio
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center" 
                     aria-label="Menú principal"
                     x-data="navAnimation()"
                     x-init="initNav()">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'flex items-center gap-0.5 nav-modern',
                            'walker'         => new Modern_Nav_Walker(),
                            'fallback_cb'    => false,
                        ));
                    }
                    ?>
                </nav>

                <!-- Actions con microinteracciones -->
                <div class="flex items-center gap-3">
                    <!-- Search Button con efecto ripple -->
                    <button
                        @click="toggleSearch()"
                        :aria-expanded="searchOpen"
                        class="search-btn relative group"
                        aria-label="Buscar"
                        x-data="buttonAnimation()"
                        x-init="initButton()">
                        <span class="absolute inset-0 rounded-lg bg-gold-400/20 scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                        <i class="fas fa-search text-sm relative z-10 transition-all duration-300"
                           :class="{ 'text-gold-400': searchOpen, 'text-white/80': !searchOpen }"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-gold-400 rounded-full animate-pulse"
                              x-show="!searchOpen"></span>
                    </button>

                    <!-- Mobile Menu Toggle con animación premium -->
                    <button
                        @click="toggleMobileMenu()"
                        :aria-expanded="mobileMenuOpen"
                        :class="mobileMenuOpen ? 'is-open' : ''"
                        class="lg:hidden mobile-hamburger relative w-11 h-11 rounded-xl transition-all duration-300"
                        aria-label="Menú"
                        x-data="hamburgerAnimation()"
                        x-init="initHamburger()">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Search Bar Mejorada -->
        <div
            x-show="searchOpen"
            x-transition:enter="transition-all ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition-all ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
            class="search-bar-container"
            role="search">
            <div class="max-w-4xl mx-auto px-4 py-8">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative group">
                    <div class="relative">
                        <input
                            type="search"
                            name="s"
                            placeholder="🔍 Buscar noticias, eventos, escuelas, docentes..."
                            class="search-input-modern w-full px-8 py-5 pr-16 rounded-2xl transition-all duration-300"
                            x-ref="searchInput"
                            x-init="$watch('searchOpen', value => { if(value) setTimeout(() => $refs.searchInput.focus(), 200) })">
                        
                        <button
                            type="submit"
                            class="search-submit-btn absolute right-3 top-1/2 -translate-y-1/2 w-12 h-12 rounded-xl transition-all duration-300 flex items-center justify-center"
                            aria-label="Buscar">
                            <i class="fas fa-arrow-right text-lg"></i>
                        </button>
                    </div>
                    
                    <!-- Búsquedas rápidas con Alpine -->
                    <div class="mt-4 flex flex-wrap items-center gap-2">
                        <span class="text-white/30 text-xs font-medium uppercase tracking-wider">Búsquedas rápidas:</span>
                        <template x-for="suggestion in searchSuggestions" :key="suggestion">
                            <button 
                                type="button" 
                                @click="quickSearch(suggestion)"
                                class="px-3 py-1.5 rounded-full bg-white/5 hover:bg-gold-400/20 text-white/60 hover:text-gold-400 text-xs transition-all duration-300 border border-white/5 hover:border-gold-400/30">
                                <i class="fas fa-hashtag text-[10px] mr-1"></i>
                                <span x-text="suggestion"></span>
                            </button>
                        </template>
                    </div>
                </form>
            </div>
        </div>

        <!-- Mobile Menu con animación avanzada -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition-all ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition-all ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full"
            class="mobile-menu-overlay lg:hidden"
            @click.outside="mobileMenuOpen = false">
            
            <div class="mobile-menu-inner">
                <!-- Cabecera del menú móvil -->
                <div class="mobile-menu-header">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gold-400/20 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-gold-400"></i>
                        </div>
                        <div>
                            <h2 class="text-white font-bold text-lg">Menú FLCH</h2>
                            <p class="text-white/40 text-xs">Facultad de Letras UNMSM</p>
                        </div>
                    </div>
                    <button
                        @click="mobileMenuOpen = false"
                        class="mobile-menu-close"
                        aria-label="Cerrar menú">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Navegación móvil -->
                <nav class="mobile-nav-wrapper" aria-label="Menú móvil">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'mobile-nav-modern',
                            'walker'         => new Letras_FLCH_Mobile_Walker_Nav(),
                            'fallback_cb'    => false,
                        ));
                    }
                    ?>
                </nav>
                
                <!-- Footer del menú móvil -->
                <div class="mobile-menu-footer">
                    <div class="flex items-center justify-center gap-4">
                        <a href="#" class="text-white/40 hover:text-gold-400 transition-colors text-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white/40 hover:text-gold-400 transition-colors text-sm">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white/40 hover:text-gold-400 transition-colors text-sm">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="text-white/40 hover:text-gold-400 transition-colors text-sm">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="text-center text-white/20 text-[10px] mt-3">
                        © <?php echo date('Y'); ?> Facultad de Letras y Ciencias Humanas - UNMSM
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="min-h-screen" role="main">