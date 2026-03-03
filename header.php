<?php
/**
 * Header template con barra superior separada para FLCH - Versión Final
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
</head>

<body <?php body_class('antialiased bg-white'); ?>>
<?php wp_body_open(); ?>

<!-- Skip to content link -->
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-8 focus:left-8 focus:z-50 focus:px-4 focus:py-4 focus:bg-[#A88F1D] focus:text-white focus:rounded-lg">
    Saltar al contenido principal
</a>

<!-- BARRA SUPERIOR - Diseño moderno -->
<div class="hidden lg:block relative bg-gradient-to-r from-[#1A1A1A] to-[#2A2A2A] text-white text-sm border-b border-[#A88F1D]/30 shadow-lg">
    
    <!-- Efecto de brillo superior -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/50 to-transparent"></div>
    
    <div class="container-custom">
        <div class="flex justify-between items-center py-2">
            
            <!-- Información de contacto -->
            <div class="flex items-center divide-x divide-[#A88F1D]/20">
                
                <!-- Directorio -->
                <a href="https://letras.unmsm.edu.pe/directorio/" 
                   target="_blank" 
                   class="flex items-center gap-2 pr-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all">
                        <i class="fas fa-address-book text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">DIRECTORIO</span>
                        <span class="text-white/90 group-hover:text-white text-xs font-medium">FLCH UNMSM</span>
                    </div>
                </a>
                
                <!-- Email -->
                <div class="flex items-center gap-2 px-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all">
                        <i class="fas fa-envelope text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">EMAIL</span>
                        <span class="text-white/80 group-hover:text-white text-xs">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </div>
                
                <!-- Ubicación -->
                <div class="flex items-center gap-2 pl-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all">
                        <i class="fas fa-map-marker-alt text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">CAMPUS</span>
                        <span class="text-white/80 group-hover:text-white text-xs">Calle Germán Amézaga N° 375 - Lima</span>
                    </div>
                </div>
            </div>
            
            <!-- Redes sociales -->
            <div class="flex items-center gap-2">
                <span class="text-[#A88F1D]/50 text-[10px] font-medium uppercase tracking-wider">SÍGUENOS</span>
                <div class="flex items-center gap-2">
                    
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/letrassanmarcos" target="_blank" 
                       class="w-10 h-10 rounded-lg bg-[#A88F1D]/20 hover:bg-[#1877F2] flex items-center justify-center text-[#A88F1D] hover:text-white transition-all social-icon facebook"
                       aria-label="Facebook">
                        <i class="fab fa-facebook-f text-base"></i>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/letrasunmsm/" target="_blank" 
                       class="w-10 h-10 rounded-lg bg-[#A88F1D]/20 hover:bg-[#E4405F] flex items-center justify-center text-[#A88F1D] hover:text-white transition-all social-icon instagram"
                       aria-label="Instagram">
                        <i class="fab fa-instagram text-base"></i>
                    </a>

                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" 
                       class="w-10 h-10 rounded-lg bg-[#A88F1D]/20 hover:bg-[#FF0000] flex items-center justify-center text-[#A88F1D] hover:text-white transition-all social-icon youtube"
                       aria-label="YouTube">
                        <i class="fab fa-youtube text-base"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" 
                       class="w-10 h-10 rounded-lg bg-[#A88F1D]/20 hover:bg-[#0077B5] flex items-center justify-center text-[#A88F1D] hover:text-white transition-all social-icon linkedin"
                       aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in text-base"></i>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Efecto de brillo inferior -->
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/30 to-transparent"></div>
</div>

<!-- HEADER PRINCIPAL -->
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
                
                <!-- Botón de búsqueda (Alpine) -->
                <button @click="searchOpen = !searchOpen" 
                        x-data="{ searchOpen: false }"
                        class="relative w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        aria-label="Abrir buscador">
                    <i class="fas fa-search text-sm transition-transform duration-300 group-hover:scale-110"></i>
                </button>
                
                <!-- Botón móvil (JavaScript vanilla) -->
                <button class="block lg:hidden w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center mobile-menu-toggle" 
                        id="menu-toggle" 
                        aria-label="Abrir menú móvil"
                        aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Barra de búsqueda (Alpine) -->
    <div class="search-bar overflow-hidden transition-all duration-300 bg-[#0A1E3C] border-t border-[#A88F1D]/30 shadow-inner" 
         x-data="{ searchOpen: false }"
         x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         role="search"
         style="display: none;">
        <div class="container-custom py-4">
            <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="search-input" class="sr-only">Buscar en el sitio</label>
                <input type="search" 
                       id="search-input"
                       class="w-full px-5 py-3 pr-12 text-white bg-[#1E3A5F] border border-[#A88F1D]/30 rounded-full focus:outline-none focus:border-[#A88F1D] focus:ring-2 focus:ring-[#A88F1D]/20 transition-all duration-300 placeholder-white/50" 
                       placeholder="Buscar facultades, cursos, noticias..." 
                       value="<?php echo get_search_query(); ?>" 
                       name="s"
                       autocomplete="off">
            </form>
            
            <!-- Sugerencias -->
            <div class="flex flex-wrap gap-2 mt-3 text-xs text-white/60">
                <span class="text-white/40">Sugerencias:</span>
                <a href="<?php echo esc_url(home_url('/pregrado')); ?>" class="hover:text-[#A88F1D] transition-colors">Pregrado</a>
                <a href="<?php echo esc_url(home_url('/posgrado')); ?>" class="hover:text-[#A88F1D] transition-colors">Posgrado</a>
                <a href="<?php echo esc_url(home_url('/idiomas')); ?>" class="hover:text-[#A88F1D] transition-colors">Centro de Idiomas</a>
                <a href="<?php echo esc_url(home_url('/biblioteca')); ?>" class="hover:text-[#A88F1D] transition-colors">Biblioteca</a>
                <a href="<?php echo esc_url(home_url('/investigacion')); ?>" class="hover:text-[#A88F1D] transition-colors">Investigación</a>
            </div>
        </div>
    </div>
    
    <!-- Menú móvil -->
    <div class="mobile-menu fixed inset-x-0 top-[72px] lg:hidden bg-[#0A1E3C] shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-72px)] overflow-y-auto hidden" 
         id="mobile-menu">
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

<!-- Script para el menú móvil y búsqueda -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menú móvil
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Toggle menú
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                this.setAttribute('aria-expanded', 'true');
                this.querySelector('i').classList.remove('fa-bars');
                this.querySelector('i').classList.add('fa-times');
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu.classList.add('hidden');
                this.setAttribute('aria-expanded', 'false');
                this.querySelector('i').classList.remove('fa-times');
                this.querySelector('i').classList.add('fa-bars');
                document.body.style.overflow = '';
            }
        });
        
        // Cerrar al hacer click fuera
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.querySelector('i').classList.remove('fa-times');
                    menuToggle.querySelector('i').classList.add('fa-bars');
                    document.body.style.overflow = '';
                }
            }
        });
        
        // Cerrar al hacer click en un enlace
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.querySelector('i').classList.remove('fa-times');
                menuToggle.querySelector('i').classList.add('fa-bars');
                document.body.style.overflow = '';
            });
        });
        
        // Cerrar al redimensionar a desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) { // lg breakpoint
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.querySelector('i').classList.remove('fa-times');
                    menuToggle.querySelector('i').classList.add('fa-bars');
                    document.body.style.overflow = '';
                }
            }
        });
    }
    
    // Búsqueda con Alpine
    if (typeof Alpine !== 'undefined') {
        Alpine.store('search', {
            open: false
        });
    }
    
    // Submenús móvil
    const mobileSubmenuToggles = document.querySelectorAll('.mobile-submenu-toggle');
    mobileSubmenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const submenu = this.closest('.menu-item-has-children').querySelector('ul');
            const icon = this.querySelector('i');
            
            if (submenu) {
                submenu.classList.toggle('hidden');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            }
        });
    });
});

// Prevenir que Alpine interfiera con el menú
document.addEventListener('alpine:init', () => {
    Alpine.data('searchDropdown', () => ({
        searchOpen: false
    }));
});
</script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<main id="main" class="site-main">