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
    <script>(function(){var t;try{t=localStorage.getItem('kg-theme')}catch(e){}if(t==='dark')document.documentElement.classList.add('dark')})()</script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <meta name="theme-color" content="#143B63">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
    x-data="{
        scrolled: false,
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
    @keydown.escape="mobile = false">

    <?php wp_body_open(); ?>

    <a href="#main" class="skip-link">Saltar al contenido</a>

    <div id="kg-progress-bar" class="kg-progress" aria-hidden="true"></div>

    <!-- TOPBAR -->
    <div class="kg-topbar hidden lg:block">
        <div class="kg-topbar__desktop">
            <div class="kg-topbar__contact-group">
                <a href="https://letras.unmsm.edu.pe/directorio/" target="_blank" class="kg-topbar__item">
                    <div class="kg-topbar__icon"><i class="fas fa-address-book"></i></div>
                    <div class="kg-topbar__text">
                        <span class="kg-topbar__label">Directorio</span>
                        <span class="kg-topbar__value">FLCH</span>
                    </div>
                </a>
                <a href="mailto:informatica.letras@unmsm.edu.pe" class="kg-topbar__item">
                    <div class="kg-topbar__icon"><i class="fas fa-envelope"></i></div>
                    <div class="kg-topbar__text">
                        <span class="kg-topbar__label">Email</span>
                        <span class="kg-topbar__value">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </a>
                <a href="https://letras.unmsm.edu.pe/horarios-flch.php" target="_blank" class="kg-topbar__item">
                    <div class="kg-topbar__icon"><i class="fas fa-clock"></i></div>
                    <div class="kg-topbar__text">
                        <span class="kg-topbar__label">Horarios</span>
                        <span class="kg-topbar__value"><?php echo esc_html( date('Y') . '-I' ); ?></span>
                    </div>
                </a>
            </div>
            <div class="kg-topbar__badge">
                <span class="kg-topbar__badge-dot"></span>
                <span>Ciclo <?php echo esc_html( date('Y') ); ?>-I</span>
            </div>
            <div class="kg-topbar__social-group">
                <span class="kg-topbar__social-label">Síguenos</span>
                <a href="https://www.facebook.com/letrassanmarcos" target="_blank" class="kg-topbar__soc fb"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/letrasunmsm/" target="_blank" class="kg-topbar__soc ig"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" class="kg-topbar__soc yt"><i class="fab fa-youtube"></i></a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" class="kg-topbar__soc li"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="main-header header-modern sticky top-0 z-50">
        <div class="header-container max-w-7xl mx-auto px-4 flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="header-logo flex-shrink-0">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-blanco-letras.png' ); ?>"
                     alt="FLCH"
                     class="header-logo-img"
                     width="200"
                     height="62"
                     loading="eager">
            </a>

            <!-- Nav Desktop -->
            <nav class="hidden lg:flex main-nav">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'main-menu',
                    'walker' => new Modern_Nav_Walker()
                ]); ?>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3" style="flex-shrink: 0;">
                <button data-kg-search-trigger
                        class="header-btn hidden sm:flex"
                        aria-label="Buscar (Ctrl/Cmd + K)"
                        aria-haspopup="dialog">
                    <i class="fas fa-search"></i>
                </button>
                <button x-data="kgTheme"
                        @click="toggle()"
                        class="header-btn"
                        :class="{'active': isDark}"
                        :aria-label="isDark ? 'Activar modo claro' : 'Activar modo oscuro'"
                        :aria-pressed="isDark"
                        :title="isDark ? 'Modo claro' : 'Modo oscuro'">
                    <i :class="isDark ? 'fas fa-sun' : 'fas fa-moon'"></i>
                </button>
                <button @click="mobile = !mobile"
                        class="header-btn lg:hidden"
                        :class="{'is-open': mobile}"
                        :aria-expanded="mobile"
                        aria-controls="mobile-menu-panel"
                        aria-label="Abrir menú de navegación">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Search: reemplazado por el command palette ⌘K (ver template-parts/command-palette.php) -->
    </header>

    <?php get_template_part( 'template-parts/command-palette' ); ?>

    <!-- MOBILE MENU -->
    <div x-show="mobile" @click="mobile=false" class="mobile-backdrop" style="display:none" aria-hidden="true"></div>
    <div id="mobile-menu-panel" x-show="mobile" x-transition class="mobile-menu" style="display:none">
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

    <?php /* NOTA (fix de accesibilidad): no se abre <main> aquí — cada
       plantilla (front-page.php, page.php, single.php, archive.php, etc.)
       ya abre su propio <main id="main">. Abrirlo también en header.php
       generaba un <main id="main"> anidado y duplicado en TODAS las
       páginas del sitio (HTML inválido + landmark ambiguo para lectores
       de pantalla). El cierre correspondiente en footer.php también se
       quitó. */ ?>