<?php
/**
 * Footer template premium para FLCH - Versión Mejorada
 *
 * @package LetrasFLCH
 */
?>

</main><!-- #main -->

<!-- FOOTER PREMIUM - Diseño profesional con Tailwind -->
<footer class="footer relative bg-gradient-to-br from-[#0A1E3C] via-[#143B63] to-[#1E4A7A] text-white pt-16 pb-6 overflow-hidden">
    
    <!-- Elementos decorativos con animación -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#A88F1D] rounded-full filter blur-[128px] opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#A88F1D] rounded-full filter blur-[128px] opacity-20 animate-pulse-slower"></div>
        
        <!-- Patrón de puntos sutil -->
        <div class="absolute inset-0 opacity-5" 
             style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 1px); background-size: 40px 40px;">
        </div>
    </div>
    
    <!-- Línea decorativa superior animada -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-[#A88F1D] to-transparent"></div>
    
    <div class="container-custom relative z-10">
        
        <!-- Grid principal - 4 columnas en desktop -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
            
            <!-- COLUMNA 1: Info institucional -->
            <div class="space-y-4 animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="flex items-center gap-3 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#A88F1D] to-[#8B7718] rounded-xl flex items-center justify-center shadow-xl shadow-[#A88F1D]/20 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-university text-2xl text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">Facultad de</h4>
                        <span class="text-2xl font-black text-[#A88F1D] block leading-tight">Letras</span>
                    </div>
                </div>
                
                <p class="text-white/70 text-sm leading-relaxed">
                    Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551. Decana de América.
                </p>
                
                <!-- Badge de acreditación con hover -->
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 border border-[#A88F1D]/30 hover:bg-[#A88F1D]/20 transition-all duration-300 group cursor-default">
                    <i class="fas fa-check-circle text-[#A88F1D] text-sm group-hover:scale-110 transition-transform"></i>
                    <span class="text-xs font-medium text-white/90">Acreditación Internacional</span>
                </div>
                
                <!-- Widget dinámico -->
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="mt-4">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- COLUMNA 2: Revistas Académicas -->
            <div class="space-y-4 animate-fadeInUp" style="animation-delay: 0.2s">
                <h4 class="text-lg font-bold text-white flex items-center gap-2 pb-3 border-b border-[#A88F1D]/30">
                    <i class="fas fa-book-open text-[#A88F1D] text-sm"></i>
                    <span>Revistas Académicas</span>
                </h4>
                
                <ul class="space-y-2">
                    <?php
                    $journals = [
                        ['url' => 'https://revistaletras.unmsm.edu.pe/index.php/le', 'title' => 'Letras (Lima)'],
                        ['url' => 'https://rcllletras.unmsm.edu.pe/index.php/content', 'title' => 'Crítica Literaria'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/lenguaysociedad', 'title' => 'Lengua y Sociedad'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis', 'title' => 'Tesis (Lima)'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/letras', 'title' => 'Escritura y Pensamiento'],
                        ['url' => 'https://revistaazulletras.unmsm.edu.pe/index.php/azul/index', 'title' => 'Azul']
                    ];
                    
                    foreach ($journals as $journal) :
                    ?>
                        <li>
                            <a href="<?php echo esc_url($journal['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="footer-link group flex items-center gap-2 text-white/70 hover:text-[#A88F1D] transition-all duration-300">
                                <span class="w-1.5 h-1.5 bg-[#A88F1D] rounded-full group-hover:scale-125 transition-transform"></span>
                                <span class="text-sm"><?php echo esc_html($journal['title']); ?></span>
                                <i class="fas fa-external-link-alt text-xs opacity-0 group-hover:opacity-100 transition-opacity ml-auto"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- COLUMNA 3: Programas -->
            <div class="space-y-4 animate-fadeInUp" style="animation-delay: 0.3s">
                <h4 class="text-lg font-bold text-white flex items-center gap-2 pb-3 border-b border-[#A88F1D]/30">
                    <i class="fas fa-graduation-cap text-[#A88F1D] text-sm"></i>
                    <span>Programas</span>
                </h4>
                
                <ul class="space-y-2">
                    <?php
                    $programs = [
                        ['url' => '/pregrado', 'title' => 'Pregrado'],
                        ['url' => '/posgrado', 'title' => 'Posgrado'],
                        ['url' => '/idiomas', 'title' => 'Centro de Idiomas'],
                        ['url' => '/investigacion', 'title' => 'Investigación'],
                        ['url' => '/biblioteca', 'title' => 'Biblioteca'],
                        ['url' => '/internacional', 'title' => 'Internacional']
                    ];
                    
                    foreach ($programs as $program) :
                    ?>
                        <li>
                            <a href="<?php echo esc_url(home_url($program['url'])); ?>" 
                               class="footer-link group flex items-center gap-2 text-white/70 hover:text-[#A88F1D] transition-all duration-300">
                                <span class="w-1.5 h-1.5 bg-[#A88F1D] rounded-full group-hover:scale-125 transition-transform"></span>
                                <span class="text-sm"><?php echo esc_html($program['title']); ?></span>
                                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-all group-hover:translate-x-1 ml-auto"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- Horario de atención con diseño mejorado -->
                <div class="pt-4 mt-4 border-t border-white/10">
                    <div class="flex items-start gap-3 text-sm">
                        <div class="w-8 h-8 rounded-lg bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-[#A88F1D] text-sm"></i>
                        </div>
                        <div>
                            <span class="text-xs text-white/40 block">Atención</span>
                            <span class="text-white/80 font-medium">Lun - Vie: 8:00 - 17:00</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- COLUMNA 4: Contacto -->
            <div class="space-y-4 animate-fadeInUp" style="animation-delay: 0.4s">
                <h4 class="text-lg font-bold text-white flex items-center gap-2 pb-3 border-b border-[#A88F1D]/30">
                    <i class="fas fa-envelope text-[#A88F1D] text-sm"></i>
                    <span>Contacto</span>
                </h4>
                
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 group">
                        <div class="w-8 h-8 rounded-lg bg-white/10 group-hover:bg-[#A88F1D] transition-all duration-300 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-[#A88F1D] group-hover:text-white text-sm transition-colors"></i>
                        </div>
                        <span class="text-white/70 group-hover:text-white transition-colors text-sm">Calle Germán Amézaga N° 375 - Lima</span>
                    </li>
                    
                    <li class="flex items-start gap-3 group">
                        <div class="w-8 h-8 rounded-lg bg-white/10 group-hover:bg-[#A88F1D] transition-all duration-300 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-[#A88F1D] group-hover:text-white text-sm transition-colors"></i>
                        </div>
                        <div>
                            <span class="text-white/70 group-hover:text-white transition-colors text-sm block">(01) 619-7000</span>
                            <span class="text-white/50 text-xs">anexo 2801</span>
                        </div>
                    </li>
                    
                    <li class="flex items-start gap-3 group">
                        <div class="w-8 h-8 rounded-lg bg-white/10 group-hover:bg-[#A88F1D] transition-all duration-300 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-[#A88F1D] group-hover:text-white text-sm transition-colors"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe" 
                           class="text-white/70 hover:text-[#A88F1D] transition-colors text-sm break-all">
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </li>
                </ul>
                
                <!-- Redes Sociales con diseño premium -->
                <div class="pt-4">
                    <h5 class="text-xs font-medium text-white/40 uppercase tracking-wider mb-3">Síguenos en redes</h5>
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/letrassanmarcos" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="social-icon w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/80 hover:text-white transition-all duration-300 facebook"
                           aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="social-icon w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/80 hover:text-white transition-all duration-300 instagram"
                           aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="social-icon w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/80 hover:text-white transition-all duration-300 youtube"
                           aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="social-icon w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/80 hover:text-white transition-all duration-300 linkedin"
                           aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Barra inferior con copyright y enlaces legales -->
        <div class="pt-8 mt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                
                <!-- Copyright -->
                <div class="text-white/50 text-xs text-center md:text-left">
                    &copy; <?php echo date('Y'); ?> Facultad de Letras y Ciencias Humanas - UNMSM. 
                    <span class="block md:inline">Todos los derechos reservados.</span>
                </div>
                
                <!-- Enlaces legales -->
                <div class="flex flex-wrap justify-center gap-4 text-xs">
                    <a href="<?php echo esc_url(home_url('/terminos-condiciones')); ?>" 
                       class="text-white/50 hover:text-[#A88F1D] transition-colors">
                        Términos y condiciones
                    </a>
                    <span class="text-white/20 hidden sm:inline">|</span>
                    <a href="<?php echo esc_url(home_url('/politica-privacidad')); ?>" 
                       class="text-white/50 hover:text-[#A88F1D] transition-colors">
                        Política de privacidad
                    </a>
                    <span class="text-white/20 hidden sm:inline">|</span>
                    <a href="<?php echo esc_url(home_url('/mapa-sitio')); ?>" 
                       class="text-white/50 hover:text-[#A88F1D] transition-colors">
                        Mapa del sitio
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- BOTONES FLOTANTES MEJORADOS -->

<!-- WhatsApp Button con efecto mejorado -->
<a href="https://wa.me/51982086285?text=Hola,%20deseo%20información%20sobre%20la%20facultad" 
   class="fixed bottom-6 right-6 z-50 group"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Contactar por WhatsApp">
    
    <!-- Efecto de ondas -->
    <div class="absolute inset-0 bg-[#25D366] rounded-full animate-ping opacity-25 group-hover:opacity-50"></div>
    <div class="absolute inset-0 bg-[#25D366] rounded-full animate-pulse opacity-25"></div>
    
    <!-- Botón principal -->
    <div class="relative w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center text-white shadow-xl transition-all duration-300 group-hover:scale-110 group-hover:shadow-2xl group-hover:shadow-[#25D366]/30">
        <i class="fab fa-whatsapp text-2xl"></i>
    </div>
    
    <!-- Tooltip -->
    <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-[#0A1E3C] text-white text-xs py-2 px-3 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-xl border border-[#A88F1D]/30">
        ¿Necesitas ayuda?
    </span>
</a>

<!-- Back to Top Button mejorado -->
<button id="back-to-top" 
        class="fixed bottom-6 left-6 z-50 w-12 h-12 bg-[#0A1E3C] rounded-xl flex items-center justify-center text-white shadow-xl transition-all duration-300 hover:bg-[#A88F1D] hover:scale-110 border border-[#A88F1D]/30 opacity-0 invisible"
        aria-label="Volver al inicio"
        title="Volver arriba">
    
    <i class="fas fa-arrow-up text-lg transition-transform duration-300 group-hover:-translate-y-1"></i>
    
    <!-- Indicador de progreso (opcional) -->
    <svg class="absolute inset-0 w-full h-full -rotate-90">
        <circle class="text-white/10" stroke="currentColor" stroke-width="2" fill="transparent" r="22" cx="24" cy="24"/>
        <circle id="progress-circle" class="text-[#A88F1D]" stroke="currentColor" stroke-width="2" fill="transparent" r="22" cx="24" cy="24" stroke-dasharray="138.2" stroke-dashoffset="138.2"/>
    </svg>
</button>

<?php wp_footer(); ?>

<!-- Scripts mejorados -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // === BACK TO TOP CON PROGRESO ===
    const backToTop = document.getElementById('back-to-top');
    const progressCircle = document.getElementById('progress-circle');
    
    if (backToTop && progressCircle) {
        const circumference = 2 * Math.PI * 22; // 138.2 aprox
        
        window.addEventListener('scroll', function() {
            const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
            const scrollProgress = window.pageYOffset / scrollTotal;
            const scrollOffset = circumference - (scrollProgress * circumference);
            
            // Mostrar/ocultar botón
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
                backToTop.style.transform = 'scale(1)';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
                backToTop.style.transform = 'scale(0.8)';
            }
            
            // Actualizar círculo de progreso
            progressCircle.style.strokeDashoffset = scrollOffset;
        });
        
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // === ANIMACIÓN DE ENLACES DEL FOOTER ===
    const footerLinks = document.querySelectorAll('.footer-link');
    footerLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(4px)';
        });
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // === SOPORTE PARA REDUCED MOTION ===
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('.animate-ping, .animate-pulse, .animate-pulse-slow').forEach(el => {
            el.style.animation = 'none';
        });
    }
});

// === FUNCIÓN PARA GUARDAR ÚLTIMA BÚSQUEDA (OPCIONAL) ===
function saveSearchTerm(term) {
    if (term && term.length > 2) {
        let recentSearches = JSON.parse(localStorage.getItem('recentSearches') || '[]');
        recentSearches = [term, ...recentSearches.filter(t => t !== term)].slice(0, 5);
        localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
    }
}
</script>

<!-- Estilos adicionales para animaciones -->
<style>
/* Animaciones personalizadas */
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

@keyframes pulse-slow {
    0%, 100% { opacity: 0.2; }
    50% { opacity: 0.3; }
}

@keyframes pulse-slower {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.2; }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.animate-pulse-slow {
    animation: pulse-slow 4s ease-in-out infinite;
}

.animate-pulse-slower {
    animation: pulse-slower 6s ease-in-out infinite;
}

/* Mejoras para íconos sociales */
.social-icon {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.social-icon.facebook:hover { background-color: #1877F2 !important; transform: translateY(-3px); }
.social-icon.instagram:hover { background-color: #E4405F !important; transform: translateY(-3px); }
.social-icon.youtube:hover { background-color: #FF0000 !important; transform: translateY(-3px); }
.social-icon.linkedin:hover { background-color: #0077B5 !important; transform: translateY(-3px); }

/* Enlaces del footer */
.footer-link {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.footer-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 1px;
    background: #A88F1D;
    transition: width 0.3s ease;
}

.footer-link:hover::after {
    width: 100%;
}

/* Responsive para móvil */
@media (max-width: 768px) {
    .footer .grid {
        gap: 2rem;
    }
    
    #back-to-top,
    a[href*="wa.me"] {
        bottom: 1rem;
    }
    
    a[href*="wa.me"] .w-14 {
        width: 3rem;
        height: 3rem;
    }
    
    a[href*="wa.me"] .text-2xl {
        font-size: 1.25rem;
    }
}

/* Soporte para prefers-reduced-motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
}
</style>

</body>
</html>