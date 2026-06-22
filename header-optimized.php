<?php
/**
 * Header Optimizado - FLCH UNMSM v2.0
 *
 * Stack: Tailwind + GSAP + Alpine.js
 * Mobile-First | Performance-Optimized | WCAG AA
 *
 * @package LetrasFLCH
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <meta name="theme-color" content="#143B63">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
    x-data="{
        scrolled: false,
        search: false,
        mobile: false,
        init() {
            let tick = false;
            window.addEventListener('scroll', () => {
                if (!tick) {
                    requestAnimationFrame(() => {
                        this.scrolled = window.scrollY > 50;
                        tick = false;
                    });
                    tick = true;
                }
            }, { passive: true });
        }
    }"
    @keydown.escape="search = false; mobile = false">

    <?php wp_body_open(); ?>

    <a href="#main" class="skip-link">Saltar al contenido</a>

    <!-- TOPBAR -->
    <div class="flch-topbar hidden lg:block">
        <div class="tb-desktop">
            <div class="tb-contact-group">
                <a href="https://letras.unmsm.edu.pe/directorio/" target="_blank" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-address-book"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Directorio</span>
                        <span class="tb-value">FLCH</span>
                    </div>
                </a>
                <a href="mailto:informatica.letras@unmsm.edu.pe" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-envelope"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Email</span>
                        <span class="tb-value">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </a>
                <a href="https://letras.unmsm.edu.pe/horarios-flch.php" target="_blank" class="tb-item">
                    <div class="tb-icon"><i class="fas fa-clock"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Horarios</span>
                        <span class="tb-value">2026-I</span>
                    </div>
                </a>
            </div>
            <div class="tb-badge">
                <span class="tb-badge-dot"></span>
                <span>Ciclo 2026-I</span>
            </div>
            <div class="tb-social-group">
                <span class="tb-social-label">Síguenos</span>
                <a href="https://www.facebook.com/letrassanmarcos" target="_blank" class="tb-soc fb"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/letrasunmsm/" target="_blank" class="tb-soc ig"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" class="tb-soc yt"><i class="fab fa-youtube"></i></a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" class="tb-soc li"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="main-header header-modern sticky top-0 z-50">
        <div class="header-container max-w-7xl mx-auto px-4 flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="<?php echo home_url('/'); ?>" class="header-logo flex-shrink-0">
                <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                     alt="FLCH"
                     width="200"
                     height="62"
                     loading="eager">
            </a>

            <!-- Nav Desktop -->
            <nav class="hidden lg:flex">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nav-modern',
                    'walker' => new Modern_Nav_Walker()
                ]); ?>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <button @click="search = !search" class="header-btn hidden sm:flex">
                    <i class="fas fa-search"></i>
                </button>
                <button @click="mobile = !mobile" class="header-btn lg:hidden" :class="{'is-open': mobile}">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Search -->
        <div x-show="search" x-transition class="search-bar" style="display:none">
            <div class="max-w-3xl mx-auto px-4 py-6">
                <form method="get" action="<?php echo home_url('/'); ?>">
                    <input type="search" name="s" placeholder="Buscar..." class="search-input">
                    <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </header>

    <!-- MOBILE MENU -->
    <div x-show="mobile" @click="mobile=false" class="mobile-backdrop" style="display:none"></div>
    <div x-show="mobile" x-transition class="mobile-menu" style="display:none">
        <div class="mobile-header">
            <h2>Menú</h2>
            <button @click="mobile=false"><i class="fas fa-times"></i></button>
        </div>
        <nav>
            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'mobile-nav-modern',
                'walker' => new Letras_FLCH_Mobile_Walker_Nav()
            ]); ?>
        </nav>
    </div>

    <main id="main" class="min-h-screen">
