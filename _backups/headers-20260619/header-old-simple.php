<?php
/**
 * Header Moderno - FLCH UNMSM
 * Stack: Tailwind CSS + GSAP + Alpine.js + FontAwesome 6
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
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{
        scrolled: false,
        topbarVisible: true,
        mobileMenuOpen: false,
        searchOpen: false,
        activeSubmenu: null
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.pageYOffset > 50;
            topbarVisible = window.pageYOffset < 100;
        });
    "
    @keydown.escape="searchOpen = false; mobileMenuOpen = false; activeSubmenu = null">

    <?php wp_body_open(); ?>

    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[200] focus:px-4 focus:py-2 focus:bg-gold-400 focus:text-navy-900 focus:rounded">
        Saltar al contenido principal
    </a>

    <!-- ============================================================
         TOPBAR COMPACTO (se oculta al scroll)
         ============================================================ -->
    <div
        x-show="topbarVisible"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-full"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-full"
        class="bg-navy-800 border-b border-gold-400/20 hidden lg:block"
        role="complementary"
        aria-label="Información de contacto">

        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-10 text-xs">

                <!-- Contacto -->
                <div class="flex items-center gap-6 text-white/70">
                    <a href="mailto:informatica.letras@unmsm.edu.pe"
                       class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                        <i class="fas fa-envelope"></i>
                        <span>informatica.letras@unmsm.edu.pe</span>
                    </a>
                    <a href="https://letras.unmsm.edu.pe/directorio/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                        <i class="fas fa-address-book"></i>
                        <span>Directorio</span>
                    </a>
                    <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                        <i class="fas fa-clock"></i>
                        <span>Horarios 2026-I</span>
                    </a>
                </div>

                <!-- Redes Sociales -->
                <div class="flex items-center gap-3">
                    <span class="text-white/50 mr-2">Síguenos</span>
                    <a href="https://www.facebook.com/letrassanmarcos"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-7 h-7 flex items-center justify-center rounded-full bg-white/5 hover:bg-[#1877F2] text-white/70 hover:text-white transition-all"
                       aria-label="Facebook FLCH">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="https://www.instagram.com/letrasunmsm/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-7 h-7 flex items-center justify-center rounded-full bg-white/5 hover:bg-gradient-to-br hover:from-[#833AB4] hover:via-[#E1306C] hover:to-[#F77737] text-white/70 hover:text-white transition-all"
                       aria-label="Instagram FLCH">
                        <i class="fab fa-instagram text-xs"></i>
                    </a>
                    <a href="https://www.youtube.com/@LetrasSanMarcos"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-7 h-7 flex items-center justify-center rounded-full bg-white/5 hover:bg-[#FF0000] text-white/70 hover:text-white transition-all"
                       aria-label="YouTube FLCH">
                        <i class="fab fa-youtube text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================
         HEADER PRINCIPAL STICKY
         ============================================================ -->
    <header
        :class="scrolled ? 'bg-navy-900/95 backdrop-blur-md shadow-2xl' : 'bg-navy-900'"
        class="sticky top-0 z-50 transition-all duration-300 header-modern"
        role="banner">

        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="flex-shrink-0 group"
                   aria-label="<?php bloginfo('name'); ?> - Inicio">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-letras-header.png"
                         alt="<?php bloginfo('name'); ?>"
                         class="h-14 w-auto transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center" aria-label="Menú principal">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'flex items-center gap-1 nav-modern',
                            'walker'         => new Modern_Nav_Walker(),
                            'fallback_cb'    => false,
                        ));
                    }
                    ?>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <!-- Search Button -->
                    <button
                        @click="searchOpen = !searchOpen"
                        :aria-expanded="searchOpen"
                        class="p-2.5 rounded-lg text-white/80 hover:text-gold-400 hover:bg-white/5 transition-all"
                        aria-label="Buscar">
                        <i class="fas fa-search text-sm"></i>
                    </button>

                    <!-- Mobile Menu Toggle -->
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        :aria-expanded="mobileMenuOpen"
                        class="lg:hidden p-2.5 rounded-lg text-white/80 hover:text-gold-400 hover:bg-white/5 transition-all"
                        aria-label="Menú">
                        <i class="fas text-sm" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div
            x-show="searchOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="border-t border-gold-400/20 bg-navy-800/95 backdrop-blur-sm"
            role="search">
            <div class="max-w-3xl mx-auto px-4 py-6">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
                    <input
                        type="search"
                        name="s"
                        placeholder="Buscar noticias, eventos, escuelas..."
                        class="w-full px-6 py-4 pr-12 bg-white/10 text-white placeholder-white/50 rounded-full border border-white/20 focus:border-gold-400 focus:ring-2 focus:ring-gold-400/50 outline-none transition-all"
                        x-ref="searchInput"
                        x-init="$watch('searchOpen', value => { if(value) setTimeout(() => $refs.searchInput.focus(), 100) })">
                    <button
                        type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-gold-400 text-navy-900 hover:bg-gold-500 transition-colors"
                        aria-label="Buscar">
                        <i class="fas fa-search text-sm"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="lg:hidden border-t border-gold-400/20 bg-navy-800"
            @click.outside="mobileMenuOpen = false">
            <nav class="px-4 py-6 space-y-2" aria-label="Menú móvil">
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
        </div>
    </header>

    <main id="main" class="min-h-screen" role="main">
