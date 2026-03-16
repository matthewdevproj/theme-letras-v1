<?php
/**
 * Footer template premium para FLCH - Versión Profesional Optimizada
 *
 * @package LetrasFLCH
 */
?>

</main><!-- #main -->

<!-- FOOTER PREMIUM - Diseño institucional de alto nivel -->
<footer class="flch-footer" role="contentinfo">
    
    <!-- Elementos decorativos de fondo con animación suave -->
    <div class="flch-footer__background" aria-hidden="true">
        <div class="flch-footer__blob flch-footer__blob--top-left"></div>
        <div class="flch-footer__blob flch-footer__blob--bottom-right"></div>
        <div class="flch-footer__pattern"></div>
    </div>
    
    <!-- Línea decorativa superior con efecto de brillo -->
    <div class="flch-footer__accent-line" aria-hidden="true"></div>
    
    <div class="flch-footer__container">
        
        <!-- Grid principal - 4 columnas en desktop -->
        <div class="flch-footer__grid">
            
            <!-- COLUMNA 1: Identidad institucional -->
            <div class="flch-footer__column flch-footer__column--identity">
                <div class="flch-footer__brand">
                    <div class="flch-footer__logo" aria-hidden="true">
                        <i class="fas fa-university flch-footer__logo-icon"></i>
                    </div>
                    <div class="flch-footer__title-group">
                        <span class="flch-footer__pretitle">Facultad de</span>
                        <span class="flch-footer__maintitle">Letras</span>
                    </div>
                </div>
                
                <p class="flch-footer__description">
                    Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551. Decana de América.
                </p>
                
                <!-- Badge de acreditación con micro-interacción -->
                <div class="flch-footer__accreditation">
                    <i class="fas fa-check-circle flch-footer__accreditation-icon"></i>
                    <span class="flch-footer__accreditation-text">Acreditación Internacional</span>
                </div>
                
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="flch-footer__widget-area">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- COLUMNA 2: Publicaciones académicas -->
            <div class="flch-footer__column flch-footer__column--journals">
                <h3 class="flch-footer__heading">
                    <i class="fas fa-book-open flch-footer__heading-icon"></i>
                    <span>Revistas Académicas</span>
                </h3>
                
                <ul class="flch-footer__list">
                    <?php
                    $journals = [
                        ['url' => 'https://revistaletras.unmsm.edu.pe/index.php/le', 'title' => 'Letras (Lima)', 'description' => 'Investigación literaria'],
                        ['url' => 'https://rcllletras.unmsm.edu.pe/index.php/content', 'title' => 'Crítica Literaria', 'description' => 'Estudios críticos'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/lenguaysociedad', 'title' => 'Lengua y Sociedad', 'description' => 'Lingüística aplicada'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis', 'title' => 'Tesis (Lima)', 'description' => 'Investigación académica'],
                        ['url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/letras', 'title' => 'Escritura y Pensamiento', 'description' => 'Filosofía y letras'],
                        ['url' => 'https://revistaazulletras.unmsm.edu.pe/index.php/azul/index', 'title' => 'Azul', 'description' => 'Creación literaria']
                    ];
                    
                    foreach ($journals as $journal) :
                    ?>
                        <li class="flch-footer__list-item">
                            <a href="<?php echo esc_url($journal['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="flch-footer__link">
                                <span class="flch-footer__link-bullet"></span>
                                <span class="flch-footer__link-content">
                                    <span class="flch-footer__link-title"><?php echo esc_html($journal['title']); ?></span>
                                    <span class="flch-footer__link-description"><?php echo esc_html($journal['description']); ?></span>
                                </span>
                                <i class="fas fa-external-link-alt flch-footer__link-icon" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- COLUMNA 3: Programas y servicios -->
            <div class="flch-footer__column flch-footer__column--programs">
                <h3 class="flch-footer__heading">
                    <i class="fas fa-graduation-cap flch-footer__heading-icon"></i>
                    <span>Programas</span>
                </h3>
                
                <ul class="flch-footer__list flch-footer__list--compact">
                    <?php
                    $programs = [
                        ['url' => 'https://posgradoletras.unmsm.edu.pe/', 'title' => 'Pregrado', 'icon' => 'fa-solid fa-graduation-cap'],
                        ['url' => 'https://ceidletras.unmsm.edu.pe/', 'title' => 'Centro de Idiomas', 'icon' => 'fa-solid fa-language'],
                        ['url' => 'https://letras.unmsm.edu.pe/cerseu/', 'title' => 'CERSEU', 'icon' => 'fa-solid fa-hand-holding-heart'],
                        ['url' => 'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/', 'title' => 'OESI', 'icon' => 'fa-solid fa-certificate']
                    ];
                    
                    foreach ($programs as $program) :
                    ?>
                        <li class="flch-footer__list-item">
                            <a href="<?php echo esc_url($program['url']); ?>" 
                               class="flch-footer__link flch-footer__link--with-icon">
                                <i class="<?php echo esc_attr($program['icon']); ?> flch-footer__link-icon-left" aria-hidden="true"></i>
                                <span class="flch-footer__link-title"><?php echo esc_html($program['title']); ?></span>
                                <i class="fas fa-chevron-right flch-footer__link-arrow" aria-hidden="true"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- Horario de atención con diseño mejorado -->
                <div class="flch-footer__schedule">
                    <div class="flch-footer__schedule-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flch-footer__schedule-info">
                        <span class="flch-footer__schedule-label">Horario de atención</span>
                        <span class="flch-footer__schedule-time">Lunes a Viernes · 8:00 – 17:00</span>
                    </div>
                </div>
            </div>
            
            <!-- COLUMNA 4: Contacto y redes -->
            <div class="flch-footer__column flch-footer__column--contact">
                <h3 class="flch-footer__heading">
                    <i class="fas fa-envelope flch-footer__heading-icon"></i>
                    <span>Contacto</span>
                </h3>
                
                <ul class="flch-footer__contact-list">
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <address class="flch-footer__contact-address">
                            Calle Germán Amézaga N° 375<br>
                            Lima, Perú
                        </address>
                    </li>
                    
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe" 
                           class="flch-footer__contact-email">
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </li>
                </ul>
                
                <!-- Redes Sociales con efectos hover mejorados -->
                <div class="flch-footer__social">
                    <h4 class="flch-footer__social-heading">Síguenos en redes</h4>
                    <div class="flch-footer__social-grid">
                        <a href="https://www.facebook.com/letrassanmarcos" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--facebook"
                           aria-label="Facebook Facultad de Letras">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--instagram"
                           aria-label="Instagram Facultad de Letras">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--youtube"
                           aria-label="YouTube Facultad de Letras">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--linkedin"
                           aria-label="LinkedIn Facultad de Letras">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- BARRA INFERIOR - Copyright y créditos -->
        <div class="flch-footer__bottom">
            <div class="flch-footer__bottom-container">
                <p class="flch-footer__copyright">
                    &copy; <?php echo date('Y'); ?> 
                    <strong class="flch-footer__copyright-highlight">Facultad de Letras y Ciencias Humanas</strong>
                </p>
                
                <span class="flch-footer__separator" aria-hidden="true"></span>
                
                <p class="flch-footer__rights">
                    Universidad Nacional Mayor de San Marcos
                </p>
                
                <span class="flch-footer__separator flch-footer__separator--mobile-hidden" aria-hidden="true"></span>
                
                <p class="flch-footer__unmsm">
                    Decana de América
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- BOTONES FLOTANTES - Optimizados para UX -->

<!-- WhatsApp Button con tooltip mejorado -->
<a href="https://wa.me/51982086285?text=Hola,%20deseo%20información%20sobre%20la%20facultad" 
   class="flch-whatsapp"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Contactar por WhatsApp">
    
    <div class="flch-whatsapp__ripple" aria-hidden="true"></div>
    <div class="flch-whatsapp__ripple-2" aria-hidden="true"></div>
    
    <div class="flch-whatsapp__button">
        <i class="fab fa-whatsapp flch-whatsapp__icon"></i>
    </div>
    
    <span class="flch-whatsapp__tooltip" role="tooltip">¿Necesitas ayuda?</span>
</a>

<!-- Back to Top Button con indicador de progreso -->
<button id="flch-back-to-top" 
        class="flch-backtotop"
        aria-label="Volver al inicio de la página"
        title="Volver arriba">
    
    <i class="fas fa-arrow-up flch-backtotop__icon" aria-hidden="true"></i>
    
    <svg class="flch-backtotop__progress" viewBox="0 0 48 48" aria-hidden="true">
        <circle class="flch-backtotop__progress-bg" cx="24" cy="24" r="22"></circle>
        <circle id="flch-progress-circle" class="flch-backtotop__progress-fill" cx="24" cy="24" r="22"></circle>
    </svg>
</button>

<?php wp_footer(); ?>

<!-- JavaScript optimizado -->
<script>
(function() {
    'use strict';
    
    /**
     * Inicialización cuando el DOM está listo
     */
    function initFooter() {
        initBackToTop();
        initFooterLinks();
        initReducedMotion();
    }
    
    /**
     * Back to Top con indicador de progreso
     */
    function initBackToTop() {
        const backToTop = document.getElementById('flch-back-to-top');
        if (!backToTop) return;
        
        const progressCircle = document.getElementById('flch-progress-circle');
        if (!progressCircle) return;
        
        // Configurar círculo de progreso
        const radius = 22;
        const circumference = 2 * Math.PI * radius;
        progressCircle.style.strokeDasharray = circumference;
        progressCircle.style.strokeDashoffset = circumference;
        
        let ticking = false;
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateBackToTop(backToTop, progressCircle, circumference);
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    /**
     * Actualizar estado del botón back to top
     */
    function updateBackToTop(button, circle, circumference) {
        const scrollY = window.pageYOffset;
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = scrollY / windowHeight;
        const offset = circumference - (progress * circumference);
        
        // Mostrar/ocultar botón
        if (scrollY > 300) {
            button.classList.add('flch-backtotop--visible');
        } else {
            button.classList.remove('flch-backtotop--visible');
        }
        
        // Actualizar círculo de progreso
        circle.style.strokeDashoffset = Math.max(0, offset);
    }
    
    /**
     * Animaciones para enlaces del footer
     */
    function initFooterLinks() {
        const links = document.querySelectorAll('.flch-footer__link');
        
        links.forEach(link => {
            link.addEventListener('mouseenter', function() {
                const bullet = this.querySelector('.flch-footer__link-bullet');
                if (bullet) {
                    bullet.style.transform = 'scale(1.5)';
                }
            });
            
            link.addEventListener('mouseleave', function() {
                const bullet = this.querySelector('.flch-footer__link-bullet');
                if (bullet) {
                    bullet.style.transform = 'scale(1)';
                }
            });
        });
    }
    
    /**
     * Soporte para prefers-reduced-motion
     */
    function initReducedMotion() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            const animatedElements = document.querySelectorAll(
                '.flch-footer__blob, .flch-whatsapp__ripple, .flch-whatsapp__ripple-2'
            );
            
            animatedElements.forEach(el => {
                el.style.animation = 'none';
            });
        }
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooter);
    } else {
        initFooter();
    }
})();
</script>

<!-- Estilos CSS refinados -->
<style>
/* ===================================
   VARIABLES Y TOKENS DE DISEÑO
   =================================== */
:root {
    --flch-primary: #0A1E3C;
    --flch-primary-light: #143B63;
    --flch-primary-dark: #051020;
    --flch-accent: #A88F1D;
    --flch-accent-light: #C6A43F;
    --flch-accent-dark: #8B7718;
    --flch-white: #FFFFFF;
    --flch-white-90: rgba(255, 255, 255, 0.9);
    --flch-white-80: rgba(255, 255, 255, 0.8);
    --flch-white-70: rgba(255, 255, 255, 0.7);
    --flch-white-60: rgba(255, 255, 255, 0.6);
    --flch-white-50: rgba(255, 255, 255, 0.5);
    --flch-white-40: rgba(255, 255, 255, 0.4);
    --flch-white-30: rgba(255, 255, 255, 0.3);
    --flch-white-20: rgba(255, 255, 255, 0.2);
    --flch-white-10: rgba(255, 255, 255, 0.1);
    --flch-white-05: rgba(255, 255, 255, 0.05);
    
    --flch-shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.1);
    --flch-shadow-md: 0 8px 24px rgba(0, 0, 0, 0.15);
    --flch-shadow-lg: 0 16px 32px rgba(0, 0, 0, 0.2);
    
    --flch-transition-fast: 0.2s ease;
    --flch-transition-base: 0.3s ease;
    --flch-transition-slow: 0.5s ease;
    
    --flch-font-primary: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* ===================================
   FOOTER PRINCIPAL
   =================================== */
.flch-footer {
    position: relative;
    background: linear-gradient(135deg, var(--flch-primary) 0%, var(--flch-primary-light) 50%, var(--flch-primary-dark) 100%);
    color: var(--flch-white);
    width: 100%;
    overflow: hidden;
    padding: 4rem 0 2rem;
    font-family: var(--flch-font-primary);
    line-height: 1.5;
}

/* Elementos decorativos */
.flch-footer__background {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.flch-footer__blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.2;
    background: var(--flch-accent);
}

.flch-footer__blob--top-left {
    top: -10%;
    left: -10%;
    width: 50vw;
    height: 50vw;
    max-width: 600px;
    max-height: 600px;
    animation: flch-float-slow 20s infinite alternate;
}

.flch-footer__blob--bottom-right {
    bottom: -10%;
    right: -10%;
    width: 50vw;
    height: 50vw;
    max-width: 600px;
    max-height: 600px;
    animation: flch-float-slower 25s infinite alternate;
}

.flch-footer__pattern {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(45deg, var(--flch-white-05) 1px, transparent 1px),
        linear-gradient(-45deg, var(--flch-white-05) 1px, transparent 1px);
    background-size: 30px 30px;
    opacity: 0.3;
}

.flch-footer__accent-line {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, 
        transparent 0%, 
        var(--flch-accent) 20%, 
        var(--flch-accent) 80%, 
        transparent 100%);
}

/* Contenedor principal */
.flch-footer__container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1.5rem;
    position: relative;
    z-index: 10;
}

/* Grid responsivo */
.flch-footer__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    margin-bottom: 3rem;
}

@media (min-width: 640px) {
    .flch-footer__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .flch-footer__grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }
}

/* Columnas */
.flch-footer__column {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    opacity: 0;
    animation: flch-fade-up 0.5s ease forwards;
}

.flch-footer__column--identity { animation-delay: 0.1s; }
.flch-footer__column--journals { animation-delay: 0.2s; }
.flch-footer__column--programs { animation-delay: 0.3s; }
.flch-footer__column--contact { animation-delay: 0.4s; }

/* Brand y logo */
.flch-footer__brand {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.flch-footer__logo {
    width: 3.5rem;
    height: 3.5rem;
    background: linear-gradient(135deg, var(--flch-accent), var(--flch-accent-dark));
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--flch-shadow-md);
    transition: transform var(--flch-transition-base);
}

.flch-footer__logo:hover {
    transform: scale(1.05) rotate(5deg);
}

.flch-footer__logo-icon {
    font-size: 1.5rem;
    color: var(--flch-white);
}

.flch-footer__title-group {
    display: flex;
    flex-direction: column;
}

.flch-footer__pretitle {
    font-size: 0.875rem;
    font-weight: 400;
    color: var(--flch-white-80);
    line-height: 1.2;
}

.flch-footer__maintitle {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--flch-accent);
    line-height: 1.2;
}

/* Descripción */
.flch-footer__description {
    color: var(--flch-white-80);
    font-size: 0.875rem;
    line-height: 1.6;
    margin: 0;
}

/* Acreditación */
.flch-footer__accreditation {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--flch-white-10);
    backdrop-filter: blur(4px);
    border-radius: 100px;
    padding: 0.375rem 1rem;
    border: 1px solid var(--flch-white-20);
    width: fit-content;
    transition: all var(--flch-transition-base);
}

.flch-footer__accreditation:hover {
    background: var(--flch-accent);
    border-color: var(--flch-accent);
    transform: translateY(-2px);
}

.flch-footer__accreditation-icon {
    color: var(--flch-accent);
    font-size: 0.75rem;
    transition: color var(--flch-transition-base);
}

.flch-footer__accreditation:hover .flch-footer__accreditation-icon {
    color: var(--flch-white);
}

.flch-footer__accreditation-text {
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--flch-white-90);
}

/* Headings */
.flch-footer__heading,
.flch-footer__social-heading {
    font-size: 1rem;
    font-weight: 600;
    color: var(--flch-white);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0 0 0.75rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--flch-white-20);
    letter-spacing: 0.3px;
}

.flch-footer__heading-icon {
    color: var(--flch-accent);
    font-size: 0.875rem;
}

/* Listas */
.flch-footer__list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.flch-footer__list--compact {
    gap: 0.25rem;
}

.flch-footer__list-item {
    margin: 0;
}

/* Enlaces */
.flch-footer__link {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    color: var(--flch-white-80);
    font-size: 0.875rem;
    text-decoration: none;
    transition: all var(--flch-transition-fast);
    padding: 0.375rem 0;
    border-radius: 0.375rem;
}

.flch-footer__link:hover {
    color: var(--flch-white);
    transform: translateX(4px);
}

.flch-footer__link--with-icon {
    align-items: center;
    gap: 0.75rem;
}

.flch-footer__link-bullet {
    width: 0.375rem;
    height: 0.375rem;
    background: var(--flch-accent);
    border-radius: 50%;
    margin-top: 0.5rem;
    transition: transform var(--flch-transition-fast);
    flex-shrink: 0;
}

.flch-footer__link-content {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.flch-footer__link-title {
    font-weight: 500;
    line-height: 1.4;
}

.flch-footer__link-description {
    font-size: 0.75rem;
    color: var(--flch-white-60);
    margin-top: 0.125rem;
}

.flch-footer__link-icon-left {
    color: var(--flch-accent);
    font-size: 0.875rem;
    width: 1.25rem;
    text-align: center;
}

.flch-footer__link-icon,
.flch-footer__link-arrow {
    font-size: 0.7rem;
    color: var(--flch-white-50);
    transition: all var(--flch-transition-fast);
    margin-left: auto;
    flex-shrink: 0;
}

.flch-footer__link:hover .flch-footer__link-icon,
.flch-footer__link:hover .flch-footer__link-arrow {
    color: var(--flch-accent);
    transform: translateX(2px);
}

/* Horario */
.flch-footer__schedule {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--flch-white-20);
}

.flch-footer__schedule-icon {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--flch-accent);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--flch-white);
    font-size: 1rem;
    flex-shrink: 0;
}

.flch-footer__schedule-info {
    display: flex;
    flex-direction: column;
}

.flch-footer__schedule-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--flch-white-50);
}

.flch-footer__schedule-time {
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--flch-white-90);
}

/* Contacto */
.flch-footer__contact-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.flch-footer__contact-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.flch-footer__contact-icon {
    width: 2rem;
    height: 2rem;
    background: var(--flch-white-10);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--flch-accent);
    font-size: 0.875rem;
    flex-shrink: 0;
    transition: all var(--flch-transition-base);
}

.flch-footer__contact-item:hover .flch-footer__contact-icon {
    background: var(--flch-accent);
    color: var(--flch-white);
    transform: scale(1.1);
}

.flch-footer__contact-address {
    color: var(--flch-white-80);
    font-size: 0.875rem;
    font-style: normal;
    line-height: 1.5;
}

.flch-footer__contact-email {
    color: var(--flch-white-80);
    font-size: 0.875rem;
    text-decoration: none;
    transition: color var(--flch-transition-fast);
    word-break: break-all;
}

.flch-footer__contact-email:hover {
    color: var(--flch-accent);
}

/* Redes Sociales */
.flch-footer__social {
    margin-top: 1rem;
}

.flch-footer__social-heading {
    margin-bottom: 1rem;
}

.flch-footer__social-grid {
    display: flex;
    gap: 0.5rem;
}

.flch-footer__social-link {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--flch-white-10);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--flch-white-80);
    text-decoration: none;
    transition: all var(--flch-transition-base);
    font-size: 1rem;
}

.flch-footer__social-link:hover {
    transform: translateY(-3px);
    color: var(--flch-white);
}

.flch-footer__social-link--facebook:hover { background: #1877F2; }
.flch-footer__social-link--instagram:hover { background: #E4405F; }
.flch-footer__social-link--youtube:hover { background: #FF0000; }
.flch-footer__social-link--linkedin:hover { background: #0077B5; }

/* ===================================
   BOTTOM BAR
   =================================== */
.flch-footer__bottom {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid var(--flch-white-20);
}

.flch-footer__bottom-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 0.75rem 1.5rem;
    max-width: 1000px;
    margin: 0 auto;
    text-align: center;
    font-size: 0.875rem;
}

.flch-footer__copyright,
.flch-footer__rights,
.flch-footer__unmsm {
    color: var(--flch-white-70);
    margin: 0;
    line-height: 1.5;
}

.flch-footer__copyright-highlight {
    color: var(--flch-accent-light);
    font-weight: 600;
}

.flch-footer__separator {
    width: 4px;
    height: 4px;
    background: var(--flch-white-40);
    border-radius: 50%;
    display: inline-block;
}

@media (max-width: 640px) {
    .flch-footer__bottom-container {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .flch-footer__separator {
        display: none;
    }
    
    .flch-footer__separator--mobile-hidden {
        display: none;
    }
}

/* ===================================
   WHATSAPP BUTTON
   =================================== */
.flch-whatsapp {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 9999;
    text-decoration: none;
    display: block;
}

@media (max-width: 768px) {
    .flch-whatsapp {
        bottom: 1rem;
        right: 1rem;
    }
}

.flch-whatsapp__ripple,
.flch-whatsapp__ripple-2 {
    position: absolute;
    inset: 0;
    background: #25D366;
    border-radius: 50%;
    opacity: 0.3;
}

.flch-whatsapp__ripple {
    animation: flch-ping 2s ease-out infinite;
}

.flch-whatsapp__ripple-2 {
    animation: flch-pulse 2s ease-out infinite;
}

.flch-whatsapp__button {
    position: relative;
    width: 3.5rem;
    height: 3.5rem;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--flch-white);
    box-shadow: var(--flch-shadow-lg);
    transition: all var(--flch-transition-base);
}

@media (max-width: 768px) {
    .flch-whatsapp__button {
        width: 3rem;
        height: 3rem;
    }
}

.flch-whatsapp__button:hover {
    transform: scale(1.1) translateY(-5px);
    box-shadow: 0 20px 30px rgba(37, 211, 102, 0.3);
}

.flch-whatsapp__icon {
    font-size: 1.5rem;
}

@media (max-width: 768px) {
    .flch-whatsapp__icon {
        font-size: 1.25rem;
    }
}

.flch-whatsapp__tooltip {
    position: absolute;
    right: 100%;
    top: 50%;
    transform: translateY(-50%);
    margin-right: 1rem;
    background: var(--flch-primary);
    color: var(--flch-white);
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    white-space: nowrap;
    opacity: 0;
    transition: opacity var(--flch-transition-base);
    border: 1px solid var(--flch-accent);
    pointer-events: none;
    box-shadow: var(--flch-shadow-md);
}

.flch-whatsapp:hover .flch-whatsapp__tooltip {
    opacity: 1;
}

@media (max-width: 768px) {
    .flch-whatsapp__tooltip {
        display: none;
    }
}

/* ===================================
   BACK TO TOP
   =================================== */
.flch-backtotop {
    position: fixed;
    bottom: 2rem;
    left: 2rem;
    z-index: 9999;
    width: 3rem;
    height: 3rem;
    background: var(--flch-primary-light);
    backdrop-filter: blur(8px);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--flch-white);
    border: 1px solid var(--flch-accent);
    cursor: pointer;
    transition: all var(--flch-transition-base);
    opacity: 0;
    visibility: hidden;
    transform: scale(0.8);
    padding: 0;
    box-shadow: var(--flch-shadow-lg);
}

@media (max-width: 768px) {
    .flch-backtotop {
        bottom: 1rem;
        left: 1rem;
        width: 2.5rem;
        height: 2.5rem;
    }
}

.flch-backtotop--visible {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
}

.flch-backtotop:hover {
    background: var(--flch-accent);
    transform: scale(1.1) translateY(-3px);
    border-color: var(--flch-white);
}

.flch-backtotop__icon {
    font-size: 1rem;
    position: relative;
    z-index: 2;
    transition: transform var(--flch-transition-base);
}

.flch-backtotop:hover .flch-backtotop__icon {
    transform: translateY(-2px);
}

.flch-backtotop__progress {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.flch-backtotop__progress-bg {
    stroke: var(--flch-white-20);
    stroke-width: 2;
    fill: transparent;
}

.flch-backtotop__progress-fill {
    stroke: var(--flch-accent);
    stroke-width: 2;
    fill: transparent;
    transition: stroke-dashoffset 0.1s linear;
}

/* ===================================
   ANIMACIONES
   =================================== */
@keyframes flch-fade-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes flch-float-slow {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(5%, 5%) scale(1.1); }
}

@keyframes flch-float-slower {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(-5%, -5%) scale(1.1); }
}

@keyframes flch-ping {
    0% { transform: scale(1); opacity: 0.3; }
    75% { transform: scale(1.5); opacity: 0; }
    100% { transform: scale(1.5); opacity: 0; }
}

@keyframes flch-pulse {
    0% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.2); opacity: 0.2; }
    100% { transform: scale(1); opacity: 0.3; }
}

/* ===================================
   ACCESIBILIDAD
   =================================== */
@media (prefers-reduced-motion: reduce) {
    .flch-footer__blob,
    .flch-footer__column,
    .flch-whatsapp__ripple,
    .flch-whatsapp__ripple-2,
    .flch-backtotop {
        animation: none !important;
        transition: none !important;
    }
    
    .flch-footer__link:hover {
        transform: none;
    }
}

/* ===================================
   UTILIDADES
   =================================== */
.visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
</style>

</body>
</html>