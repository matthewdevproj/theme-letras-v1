<?php
/**
 * Header template - FLCH UNMSM
 * Versión: Responsive Premium v3 — Mobile-First
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

<!-- Estilos del header ahora en css/header.css -->

</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{
        searchOpen:     false,
        mobileMenuOpen: false,
        tip: {},
        startPress(k) { this.tip[k]=false; clearTimeout(this._t); this._t=setTimeout(()=>{ this.tip[k]=true; },500); },
        endPress(k)   { clearTimeout(this._t); setTimeout(()=>{ this.tip[k]=false; },1800); }
    }"
    @keydown.escape="searchOpen=false; mobileMenuOpen=false">

    <?php wp_body_open(); ?>

    <a href="#main" class="skip-link">Saltar al contenido principal</a>

    <!-- ============================================================
         TOP BAR RESPONSIVE
         ============================================================ -->
    <div class="flch-topbar" role="complementary" aria-label="Contacto y redes sociales FLCH UNMSM">

        <!-- DESKTOP (≥1024px) -->
        <div class="tb-desktop">

            <div class="tb-contact-group" role="list" aria-label="Información de contacto">
                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-item" role="listitem"
                   aria-label="Directorio FLCH UNMSM">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-address-book"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Directorio</span>
                        <span class="tb-value">FLCH UNMSM</span>
                    </div>
                </a>

                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="tb-item" role="listitem"
                   aria-label="Correo electrónico informatica.letras@unmsm.edu.pe">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Email</span>
                        <span class="tb-value tb-email-val">informatica.letras@unmsm.edu.pe</span>
                    </div>
                    <div class="tb-tooltip" role="tooltip">informatica.letras@unmsm.edu.pe</div>
                </a>

                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-item" role="listitem"
                   aria-label="Horarios académicos Ciclo 2026-I">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Horarios Académicos</span>
                        <span class="tb-value">Ciclo 2026 - I</span>
                    </div>
                </a>
            </div>

            <div class="tb-badge" role="status" aria-live="polite">
                <span class="tb-badge-dot" aria-hidden="true"></span>
                <span><?php echo apply_filters('flch_topbar_notice', 'Ciclo 2026-I &nbsp;·&nbsp; Consulta tu horario'); ?></span>
            </div>

            <div class="tb-social-group" role="list" aria-label="Redes sociales FLCH">
                <span class="tb-social-label" aria-hidden="true">Síguenos</span>
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc fb" role="listitem"
                   aria-label="Facebook @letrassanmarcos">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <div class="tb-tooltip">@letrassanmarcos</div>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc ig" role="listitem"
                   aria-label="Instagram @letrasunmsm">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <div class="tb-tooltip">@letrasunmsm</div>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc yt" role="listitem"
                   aria-label="YouTube LetrasTV">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <div class="tb-tooltip">LetrasTV</div>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc li" role="listitem"
                   aria-label="LinkedIn Letras UNMSM">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <div class="tb-tooltip">Letras UNMSM</div>
                </a>
            </div>
        </div>

        <!-- TABLET (768–1023px) -->
        <div class="tb-tablet" role="complementary" aria-label="Información FLCH">
            <div class="tb-tablet-inner">
                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-item" aria-label="Directorio FLCH UNMSM">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-address-book"></i></div>
                    Directorio
                </a>
                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="tb-tab-item" aria-label="Correo FLCH">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                    <span style="max-width:120px;overflow:hidden;text-overflow:ellipsis;display:block;">informatica.letras…</span>
                </a>
                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-item" aria-label="Horarios 2026-I">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
                    Horarios 2026-I
                </a>
                <div class="tb-tab-divider" aria-hidden="true"></div>
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc fb" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc ig" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc yt" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc li" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <div class="tb-fade-r" aria-hidden="true"></div>
        </div>

        <!-- MÓVIL (<768px): DOS FILAS -->
        <div class="tb-mobile-social" role="list" aria-label="Redes sociales FLCH">
            <span class="tb-mob-follow" aria-hidden="true">Síguenos en</span>
            <div class="tb-mob-social-inner" role="list">
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc fb"
                   role="listitem"
                   aria-label="Facebook @letrassanmarcos"
                   @touchstart="startPress('fb')"
                   @touchend="endPress('fb')"
                   @touchcancel="endPress('fb')">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.fb" role="tooltip" style="display:none">@letrassanmarcos</div>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc ig"
                   role="listitem"
                   aria-label="Instagram @letrasunmsm"
                   @touchstart="startPress('ig')"
                   @touchend="endPress('ig')"
                   @touchcancel="endPress('ig')">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.ig" role="tooltip" style="display:none">@letrasunmsm</div>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc yt"
                   role="listitem"
                   aria-label="YouTube LetrasTV"
                   @touchstart="startPress('yt')"
                   @touchend="endPress('yt')"
                   @touchcancel="endPress('yt')">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.yt" role="tooltip" style="display:none">LetrasTV</div>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc li"
                   role="listitem"
                   aria-label="LinkedIn Letras UNMSM"
                   @touchstart="startPress('li')"
                   @touchend="endPress('li')"
                   @touchcancel="endPress('li')">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.li" role="tooltip" style="display:none">Letras UNMSM</div>
                </a>
            </div>
        </div>

        <div class="tb-mobile-contact" role="list" aria-label="Contacto FLCH">
            <a href="https://letras.unmsm.edu.pe/directorio/"
               target="_blank" rel="noopener noreferrer"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Directorio de la facultad">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-address-book"></i>
                </div>
                <span class="tb-mob-label">Directorio</span>
            </a>
            <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
               target="_blank" rel="noopener noreferrer"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Horarios académicos Ciclo 2026-I">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-clock"></i>
                </div>
                <span class="tb-mob-label">Horarios</span>
            </a>
            <a href="mailto:informatica.letras@unmsm.edu.pe"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Enviar correo a informatica.letras@unmsm.edu.pe">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-envelope"></i>
                </div>
                <span class="tb-mob-label">Email</span>
            </a>
        </div>

    </div>

    <!-- HEADER PRINCIPAL -->
    <header class="main-header" id="header">
        <div class="header-inner">

            <a href="<?php echo esc_url(home_url('/')); ?>"
               rel="home"
               class="header-logo"
               aria-label="<?php bloginfo('name'); ?> — Inicio">
                <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                     alt="<?php bloginfo('name'); ?>"
                     width="200" height="62">
            </a>

            <nav class="main-nav" aria-label="Menú principal">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-menu',
                    'container'      => false,
                    'depth'          => 4,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Walker_Nav()
                ));
                ?>
            </nav>

            <div class="header-actions">

                <button class="header-btn"
                        :class="{ 'active': searchOpen }"
                        @click="searchOpen = !searchOpen; if(searchOpen) $nextTick(() => $refs.searchInput.focus())"
                        aria-label="Abrir buscador"
                        :aria-expanded="searchOpen">
                    <i class="fas fa-search"
                       :style="searchOpen ? 'transform:rotate(90deg)' : ''"
                       style="transition:transform 0.25s ease"></i>
                </button>

                <button class="header-btn menu-toggle"
                        :class="{ 'active': mobileMenuOpen }"
                        @click="mobileMenuOpen = !mobileMenuOpen;
                                document.documentElement.style.overflowY = mobileMenuOpen ? 'hidden' : '';"
                        aria-label="Abrir menú de navegación"
                        :aria-expanded="mobileMenuOpen">
                    <i class="fas"
                       :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"
                       style="transition:transform 0.25s ease, opacity 0.2s ease"></i>
                </button>
            </div>

        </div>

        <!-- Barra de búsqueda -->
        <div class="search-bar"
             x-show="searchOpen"
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             @click.away="searchOpen = false"
             role="search"
             x-cloak>
            <div class="container-custom" style="padding-top:1.25rem;padding-bottom:1.25rem;">
                <div class="search-title">
                    <i class="fas fa-search"></i>
                    <span>¿Qué estás buscando en la Facultad de Letras?</span>
                </div>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    <div class="search-input-wrapper">
                        <input type="search"
                               id="search-input"
                               x-ref="searchInput"
                               class="search-input"
                               placeholder="Ej: Pregrado, Idiomas, Biblioteca, Admisión…"
                               value="<?php echo get_search_query(); ?>"
                               name="s"
                               autocomplete="off">
                        <button type="button"
                                class="search-clear-btn"
                                @click="$refs.searchInput.value=''; $refs.searchInput.focus()"
                                x-show="$refs.searchInput?.value?.length > 0"
                                x-cloak>
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button type="submit" class="search-submit-btn">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </form>
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:0.7rem;margin-top:0.9rem;">
                    <span style="color:rgba(255,255,255,0.55);font-size:0.78rem;">Sugerencias:</span>
                    <?php
                    $suggestions = ['Pregrado','Posgrado','Idiomas','Biblioteca','Investigación','Admisión','Malla curricular'];
                    foreach ($suggestions as $s):
                    ?>
                    <a href="<?php echo esc_url(home_url('/?s='.urlencode($s))); ?>"
                       class="suggestion-link"><?php echo esc_html($s); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="mobile-menu-panel"
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             role="dialog"
             aria-label="Menú de navegación"
             x-cloak>
            <nav class="mobile-nav" aria-label="Menú de navegación móvil">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'mobile-menu',
                    'container'      => false,
                    'depth'          => 4,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
                ));
                ?>

                <div class="mobile-contact-info">
                    <h3 class="mobile-contact-title">
                        <i class="fas fa-info-circle"></i> Contacto
                    </h3>
                    <div class="mobile-contact-links">
                        <a href="https://letras.unmsm.edu.pe/directorio/"
                           target="_blank" rel="noopener noreferrer"
                           class="mobile-contact-link">
                            <i class="fas fa-address-book"></i>
                            Directorio FLCH
                        </a>
                        <a href="mailto:informatica.letras@unmsm.edu.pe"
                           class="mobile-contact-link">
                            <i class="fas fa-envelope"></i>
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <!-- Mobile menu backdrop — controlled by same Alpine state on <body> -->
    <div class="mobile-backdrop"
         x-show="mobileMenuOpen"
         @click="mobileMenuOpen = false; document.documentElement.style.overflowY = '';"
         x-transition:enter="transition-opacity ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         aria-hidden="true"
         x-cloak>
    </div>

    <!-- Alpine.js is now enqueued via functions.php -->

    <script>
    /* ── toggleMobileSubmenu: global, llamado por el walker del menú móvil ── */
    function toggleMobileSubmenu(btn) {
        const parentLi = btn.closest('.menu-item-has-children');
        if (!parentLi) return;
        const submenu = parentLi.querySelector('.sub-menu');
        const icon    = btn.querySelector('i');
        if (submenu) {
            const isOpen = submenu.classList.toggle('open');
            if (icon) icon.classList.toggle('rotate-180', isOpen);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {

        /* ── Submenús móvil: event delegation (también cubre el onclick del walker) ── */
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.mobile-submenu-toggle');
            if (!btn) return;
            e.preventDefault();
            e.stopPropagation();
            toggleMobileSubmenu(btn);
        });

        /* ── Prevenir navegación en ítems padre del menú móvil ── */
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.mobile-menu .menu-item-has-children > a');
            if (!link) return;
            e.preventDefault();
            const toggle = link.parentElement.querySelector('.mobile-submenu-toggle');
            if (toggle) toggleMobileSubmenu(toggle);
        });

        /* ── Cerrar submenús al navegar (click en ítem hoja) ── */
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.mobile-menu a');
            if (!link || link.closest('.menu-item-has-children')) return;
            // Cierra el panel Alpine
            const bodyEl = document.querySelector('[x-data]');
            if (bodyEl && bodyEl._x_dataStack) {
                try { bodyEl._x_dataStack[0].mobileMenuOpen = false; } catch(err) {}
            }
            document.documentElement.style.overflowY = '';
        });

        /* ── Guardar búsquedas recientes ── */
        const form = document.querySelector('form[role="search"]');
        if (form) {
            form.addEventListener('submit', function () {
                const val = document.getElementById('search-input')?.value.trim();
                if (val && val.length > 2) {
                    let recent = JSON.parse(localStorage.getItem('recentSearches') || '[]');
                    recent = [val, ...recent.filter(s => s !== val)].slice(0, 5);
                    localStorage.setItem('recentSearches', JSON.stringify(recent));
                }
            });
        }

        /* ── Restaurar overflow en resize a desktop ── */
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                document.documentElement.style.overflowY = '';
            }
        }, { passive: true });

        /* ── Escape key cierra menú y buscador ── */
        document.addEventListener('keydown', function(e) {
            if (e.key !== 'Escape') return;
            document.documentElement.style.overflowY = '';
        });

        console.log('%cFLCH Header v3 — Responsive Premium', 'color:#A88F1D;font-weight:bold;font-size:12px');
    });
    </script>

    <!-- Cada template abre su propio <main id="main"> para evitar nesting inválido -->
<!-- ══════════════════════════════════════════════════════════════
     TOP BAR HIDE-ON-SCROLL — Mobile UX Improvement
     Solo activo en mobile (≤1024px)
     ══════════════════════════════════════════════════════════ -->
<script>
(function() {
    'use strict';
    
    // Solo ejecutar en mobile
    if (window.innerWidth > 1024) return;
    
    let lastScroll = 0;
    let ticking = false;
    const topbar = document.querySelector('.flch-topbar');
    
    if (!topbar) return;
    
    // Hacer top bar sticky en mobile
    topbar.style.position = 'sticky';
    topbar.style.top = '0';
    topbar.style.zIndex = '100';
    topbar.style.transition = 'transform 0.3s ease';
    
    function updateTopBar() {
        const currentScroll = window.pageYOffset;
        
        // Scroll down: ocultar (después de 100px)
        if (currentScroll > lastScroll && currentScroll > 100) {
            topbar.style.transform = 'translateY(-100%)';
        } 
        // Scroll up: mostrar
        else if (currentScroll < lastScroll) {
            topbar.style.transform = 'translateY(0)';
        }
        
        // Si estamos arriba del todo, siempre mostrar
        if (currentScroll < 50) {
            topbar.style.transform = 'translateY(0)';
        }
        
        lastScroll = currentScroll;
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(updateTopBar);
            ticking = true;
        }
    }, { passive: true });
    
    // Re-mostrar al resize si volvemos a desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1024 && topbar) {
            topbar.style.transform = 'translateY(0)';
            topbar.style.position = '';
        }
    }, { passive: true });
})();
</script>

