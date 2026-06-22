<?php
/**
 * Header Limpio y Funcional - FLCH UNMSM
 * Version simplificada con todos los elementos funcionando
 *
 * @package LetrasFLCH
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <meta name="theme-color" content="#143B63">
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{
        scrolled: false,
        topbarVisible: true,
        mobileMenuOpen: false,
        searchOpen: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.pageYOffset > 50;
            topbarVisible = window.pageYOffset < 120;
        });
    "
    @keydown.escape="searchOpen = false; mobileMenuOpen = false">

    <?php wp_body_open(); ?>

    <!-- Skip Link -->
    <a href="#main" class="sr-only focus:not-sr-only">Saltar al contenido</a>

    <!-- ============================================================
         TOPBAR - Original FLCH
         ============================================================ -->
    <div class="flch-topbar hidden lg:block">
        <div class="tb-desktop">
            <div class="tb-contact-group">
                <a href="https://letras.unmsm.edu.pe/directorio/" target="_blank" rel="noopener" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-address-book"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Directorio</span>
                        <span class="tb-value">FLCH UNMSM</span>
                    </div>
                </a>

                <a href="mailto:informatica.letras@unmsm.edu.pe" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-envelope"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Email</span>
                        <span class="tb-value tb-email-val">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </a>

                <a href="https://letras.unmsm.edu.pe/horarios-flch.php" target="_blank" rel="noopener" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-clock"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Horarios Académicos</span>
                        <span class="tb-value">Ciclo 2026 - I</span>
                    </div>
                </a>
            </div>

            <div class="tb-badge">
                <span class="tb-badge-dot"></span>
                <span>Ciclo 2026-I · Consulta tu horario</span>
            </div>

            <div class="tb-social-group">
                <span class="tb-social-label">Síguenos</span>
                <a href="https://www.facebook.com/letrassanmarcos" target="_blank" rel="noopener" class="tb-soc fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/" target="_blank" rel="noopener" class="tb-soc ig">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" rel="noopener" class="tb-soc yt">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" rel="noopener" class="tb-soc li">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- ============================================================
         HEADER PRINCIPAL
         ============================================================ -->
    <header class="main-header header-modern sticky top-0 z-50">
        <div class="header-inner max-w-7xl mx-auto px-4">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="header-logo">
                <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                     alt="FLCH UNMSM"
                     width="200" height="62">
            </a>

            <!-- Desktop Navigation -->
            <nav class="main-nav hidden lg:flex" aria-label="Menú principal">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'nav-modern',
                        'walker'         => new Modern_Nav_Walker(),
                        'fallback_cb'    => false,
                    ));
                }
                ?>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions flex items-center gap-3">
                <!-- Search Button -->
                <button
                    @click="searchOpen = !searchOpen"
                    class="header-btn"
                    aria-label="Buscar">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Mobile Menu Button -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="header-btn lg:hidden mobile-menu-button"
                    :class="mobileMenuOpen ? 'is-open' : ''"
                    aria-label="Menú">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <!-- Search Bar -->
        <div
            x-show="searchOpen"
            x-transition
            class="search-bar">
            <div class="max-w-3xl mx-auto px-4 py-6">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
                    <input
                        type="search"
                        name="s"
                        placeholder="Buscar..."
                        class="search-input"
                        x-ref="searchInput">
                    <button type="submit" class="search-submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- ============================================================
         MOBILE MENU
         ============================================================ -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition-opacity duration-300"
        x-transition:leave="transition-opacity duration-200"
        @click="mobileMenuOpen = false"
        class="mobile-menu-backdrop fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] lg:hidden"
        style="display: none;">
    </div>

    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition-transform duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:leave="transition-transform duration-200"
        x-transition:leave-end="translate-x-full"
        class="mobile-menu-container fixed top-0 right-0 bottom-0 w-full max-w-sm bg-gradient-to-b from-[#143B63] to-[#0A1E3C] shadow-2xl z-[101] overflow-y-auto lg:hidden"
        style="display: none;">

        <!-- Mobile Menu Header -->
        <div class="mobile-menu-header flex items-center justify-between p-6 border-b border-gold-400/20">
            <h2 class="text-white text-lg font-semibold">Menú</h2>
            <button
                @click="mobileMenuOpen = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="p-4">
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

    <main id="main" class="min-h-screen">
