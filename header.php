<?php
/**
 * Header template con barra superior separada para FLCH - Versión Final SIN CONFLICTOS
 *
 * @package LetrasFLCH
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">
    
    <?php wp_head(); ?>
    
    <!-- Theme color -->
    <meta name="theme-color" content="#0A1E3C">
    
    <!-- Preload del logo -->
    <link rel="preload" as="image" href="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png">
</head>

<body <?php body_class('antialiased bg-white min-h-screen flex flex-col'); ?> 
      x-data="{ searchOpen: false, mobileMenuOpen: false }"
      @keydown.escape="searchOpen = false; mobileMenuOpen = false">
<?php wp_body_open(); ?>

<!-- Skip to content link -->
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-6 focus:py-4 focus:bg-[#A88F1D] focus:text-white focus:rounded-xl focus:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#A88F1D]/50 transition-all duration-300">
    <i class="fas fa-arrow-down mr-2"></i>
    Saltar al contenido principal
</a>

<!-- BARRA SUPERIOR - Usando clases existentes -->
<div class="hidden lg:block relative bg-gradient-to-r from-[#1A1A1A] to-[#2A2A2A] text-white text-sm border-b border-[#A88F1D]/30 shadow-lg top-bar-custom">
    
    <!-- Efecto de brillo superior -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/50 to-transparent"></div>
    
    <div class="container-custom">
        <div class="flex justify-between items-center py-2">
            
            <!-- Información de contacto -->
            <div class="flex items-center divide-x divide-[#A88F1D]/20">
                
                <!-- Directorio -->
                <a href="https://letras.unmsm.edu.pe/directorio/" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pr-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-address-book text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">DIRECTORIO</span>
                        <span class="text-white/90 group-hover:text-white text-xs font-medium">FLCH UNMSM</span>
                    </div>
                </a>
                
                <!-- Email -->
                <a href="mailto:informatica.letras@unmsm.edu.pe" 
                   class="flex items-center gap-2 px-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-envelope text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">EMAIL</span>
                        <span class="text-white/80 group-hover:text-white text-xs">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </a>
                
                <!-- Ubicación -->
                <a href="https://maps.app.goo.gl/..." 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pl-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-map-marker-alt text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">CAMPUS</span>
                        <span class="text-white/80 group-hover:text-white text-xs">Calle Germán Amézaga N° 375 - Lima</span>
                    </div>
                </a>
            </div>
            
            <!-- Redes sociales con colores específicos en hover -->
            <div class="flex items-center gap-2">
                <span class="text-[#A88F1D]/50 text-[10px] font-medium uppercase tracking-wider">SÍGUENOS</span>
                <div class="flex items-center gap-2">
                    
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/letrassanmarcos" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 facebook"
                       aria-label="Facebook"
                       style="--hover-color: #1877F2;">
                        <i class="fab fa-facebook-f text-base"></i>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/letrasunmsm/" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 instagram"
                       aria-label="Instagram"
                       style="--hover-color: #E4405F;">
                        <i class="fab fa-instagram text-base"></i>
                    </a>

                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@LetrasTV-p9j" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 youtube"
                       aria-label="YouTube"
                       style="--hover-color: #FF0000;">
                        <i class="fab fa-youtube text-base"></i>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://pe.linkedin.com/school/letrasunmsm/" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 linkedin"
                       aria-label="LinkedIn"
                       style="--hover-color: #0077B5;">
                        <i class="fab fa-linkedin-in text-base"></i>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Efecto de brillo inferior -->
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/30 to-transparent"></div>
</div>

<!-- HEADER PRINCIPAL - Usando clases existentes -->
<header class="sticky top-0 z-50 bg-gradient-to-r from-[#0A1E3C] to-[#143B63] shadow-lg transition-all duration-300" 
        id="header"
        @keydown.escape="searchOpen = false; mobileMenuOpen = false">
    
    <div class="container-custom">
        <div class="flex items-center justify-between py-3 lg:py-4">
            
            <!-- Logo -->
            <div class="header-logo group bg-[#0A1E3C] p-2 rounded-lg shadow-inner">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block relative">
                    <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png" 
                         alt="<?php bloginfo('name'); ?>"
                         class="h-12 lg:h-16 w-auto brightness-0 invert transition-all duration-300 group-hover:scale-105"
                         style="filter: brightness(0) invert(1);"
                         width="200"
                         height="64"
                         loading="eager">
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
            <div class="flex items-center space-x-2 md:space-x-3">
                
                <!-- Botón de búsqueda -->
                <button @click="searchOpen = !searchOpen; if(searchOpen) setTimeout(() => $refs.searchInput.focus(), 300)" 
                        class="relative w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        :class="{ 'bg-[#A88F1D]': searchOpen }"
                        aria-label="Abrir buscador"
                        :aria-expanded="searchOpen.toString()">
                    
                    <i class="fas fa-search text-sm md:text-base transition-all duration-300 group-hover:scale-110"
                       :class="{ 'rotate-90': searchOpen }"></i>
                </button>
                
                <!-- Botón móvil -->
                <button class="block lg:hidden relative w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center" 
                        @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
                        :class="{ 'bg-[#A88F1D]': mobileMenuOpen }"
                        aria-label="Abrir menú móvil"
                        :aria-expanded="mobileMenuOpen.toString()">
                    
                    <i class="fas fa-bars text-sm md:text-base transition-transform duration-300"
                       :class="{ 'rotate-90': mobileMenuOpen }"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Barra de búsqueda MEJORADA -->
    <div class="search-bar overflow-hidden transition-all duration-500 bg-[#0A1E3C] border-t border-[#A88F1D]/30 shadow-inner" 
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
        
        <div class="container-custom py-6 md:py-8">
            <div class="max-w-4xl mx-auto">
                
                <!-- Título de la búsqueda -->
                <h2 class="text-white text-sm md:text-base font-medium mb-4 flex items-center gap-2">
                    <i class="fas fa-search text-[#A88F1D]"></i>
                    <span>¿Qué estás buscando?</span>
                </h2>
                
                <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    
                    <div class="relative group">
                        <input type="search" 
                               id="search-input"
                               x-ref="searchInput"
                               class="w-full px-6 py-4 pr-24 text-white bg-[#1E3A5F] border-2 border-[#A88F1D]/30 rounded-2xl focus:outline-none focus:border-[#A88F1D] focus:ring-4 focus:ring-[#A88F1D]/20 transition-all duration-300 placeholder-white/50 text-base md:text-lg"
                               placeholder="Facultades, carreras, eventos, investigaciones..."
                               value="<?php echo get_search_query(); ?>" 
                               name="s"
                               autocomplete="off">
                        
                        <!-- Botones dentro del input -->
                        <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1">
                            
                            <!-- Limpiar -->
                            <button type="button" 
                                    class="search-clear p-2 text-white/50 hover:text-white transition-colors"
                                    @click="$refs.searchInput.value = ''; $refs.searchInput.focus()"
                                    x-show="$refs.searchInput?.value.length > 0"
                                    x-cloak
                                    aria-label="Limpiar búsqueda">
                                <i class="fas fa-times-circle text-lg"></i>
                            </button>
                            
                            <!-- Botón buscar -->
                            <button type="submit" 
                                    class="px-6 py-2 bg-[#A88F1D] hover:bg-[#8B7718] text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-[#A88F1D]/30 flex items-center gap-2 group">
                                <i class="fas fa-search"></i>
                                <span class="hidden sm:inline">Buscar</span>
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Sugerencias -->
                <div class="flex flex-wrap items-center gap-3 mt-4 text-sm">
                    <span class="text-white/40 flex items-center gap-1">
                        <i class="fas fa-lightbulb text-[#A88F1D] text-xs"></i>
                        Sugerencias:
                    </span>
                    
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo esc_url(home_url('/?s=Pregrado')); ?>" 
                           class="px-4 py-2 bg-white/10 hover:bg-[#A88F1D] text-white/80 hover:text-white rounded-full transition-all duration-300 text-xs border border-white/10 hover:border-[#A88F1D]">
                            Pregrado
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Posgrado')); ?>" 
                           class="px-4 py-2 bg-white/10 hover:bg-[#A88F1D] text-white/80 hover:text-white rounded-full transition-all duration-300 text-xs border border-white/10 hover:border-[#A88F1D]">
                            Posgrado
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Idiomas')); ?>" 
                           class="px-4 py-2 bg-white/10 hover:bg-[#A88F1D] text-white/80 hover:text-white rounded-full transition-all duration-300 text-xs border border-white/10 hover:border-[#A88F1D]">
                            Centro de Idiomas
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Biblioteca')); ?>" 
                           class="px-4 py-2 bg-white/10 hover:bg-[#A88F1D] text-white/80 hover:text-white rounded-full transition-all duration-300 text-xs border border-white/10 hover:border-[#A88F1D]">
                            Biblioteca
                        </a>
                        <a href="<?php echo esc_url(home_url('/?s=Investigación')); ?>" 
                           class="px-4 py-2 bg-white/10 hover:bg-[#A88F1D] text-white/80 hover:text-white rounded-full transition-all duration-300 text-xs border border-white/10 hover:border-[#A88F1D]">
                            Investigación
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Menú móvil -->
    <div class="mobile-menu fixed inset-x-0 top-[72px] lg:hidden bg-[#0A1E3C] shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-72px)] overflow-y-auto hidden" 
         id="mobile-menu"
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         @click.away="mobileMenuOpen = false"
         x-cloak>
        
        <nav class="px-4 py-6" aria-label="Menú móvil">
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

<!-- Script para el menú móvil -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar Alpine store si es necesario
    if (typeof Alpine !== 'undefined') {
        Alpine.store('header', {
            searchOpen: false,
            mobileMenuOpen: false
        });
    }
    
    // Guardar búsquedas recientes
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const input = document.getElementById('search-input');
            const searchTerm = input.value.trim();
            
            if (searchTerm && searchTerm.length > 2) {
                let recentSearches = JSON.parse(localStorage.getItem('recentSearches') || '[]');
                recentSearches = [searchTerm, ...recentSearches.filter(s => s !== searchTerm)].slice(0, 5);
                localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
            }
        });
    }
});
</script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Estilos mínimos adicionales (solo para Alpine) -->
<style>
[x-cloak] { display: none !important; }

/* Animaciones personalizadas (sin conflictos) */
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

/* Solo para elementos específicos que no existan en tu CSS */
.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Hover colors específicos para redes sociales (usando !important para asegurar) */
.social-icon.facebook:hover {
    background-color: #1877F2 !important;
}

.social-icon.instagram:hover {
    background-color: #E4405F !important;
}

.social-icon.youtube:hover {
    background-color: #FF0000 !important;
}

.social-icon.linkedin:hover {
    background-color: #0077B5 !important;
}
</style>

<main id="main" class="site-main flex-1">