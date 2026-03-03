<?php
/**
 * Footer template premium para FLCH - Versión con estilos independientes
 *
 * @package LetrasFLCH
 */
?>

</main><!-- #main -->

<!-- FOOTER PREMIUM - Estilos independientes (sin conflictos) -->
<footer class="flch-footer">
    
    <!-- Elementos decorativos -->
    <div class="flch-footer__decor">
        <div class="flch-footer__blob flch-footer__blob--top-left"></div>
        <div class="flch-footer__blob flch-footer__blob--bottom-right"></div>
        <div class="flch-footer__pattern"></div>
    </div>
    
    <!-- Línea decorativa superior -->
    <div class="flch-footer__top-line"></div>
    
    <div class="flch-footer__container">
        
        <!-- Grid principal -->
        <div class="flch-footer__grid">
            
            <!-- COLUMNA 1: Info institucional -->
            <div class="flch-footer__column flch-footer__column--1">
                <div class="flch-footer__brand">
                    <div class="flch-footer__icon-wrapper">
                        <i class="fas fa-university flch-footer__icon"></i>
                    </div>
                    <div>
                        <h4 class="flch-footer__brand-title">Facultad de</h4>
                        <span class="flch-footer__brand-subtitle">Letras</span>
                    </div>
                </div>
                
                <p class="flch-footer__description">
                    Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551. Decana de América.
                </p>
                
                <!-- Badge de acreditación -->
                <div class="flch-footer__badge">
                    <i class="fas fa-check-circle flch-footer__badge-icon"></i>
                    <span class="flch-footer__badge-text">Acreditación Internacional</span>
                </div>
                
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="flch-footer__widget">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- COLUMNA 2: Revistas Académicas -->
            <div class="flch-footer__column flch-footer__column--2">
                <h4 class="flch-footer__title">
                    <i class="fas fa-book-open flch-footer__title-icon"></i>
                    <span>Revistas Académicas</span>
                </h4>
                
                <ul class="flch-footer__list">
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
                        <li class="flch-footer__list-item">
                            <a href="<?php echo esc_url($journal['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="flch-footer__link">
                                <span class="flch-footer__link-dot"></span>
                                <span class="flch-footer__link-text"><?php echo esc_html($journal['title']); ?></span>
                                <i class="fas fa-external-link-alt flch-footer__link-icon"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- COLUMNA 3: Programas -->
            <div class="flch-footer__column flch-footer__column--3">
                <h4 class="flch-footer__title">
                    <i class="fas fa-graduation-cap flch-footer__title-icon"></i>
                    <span>Programas</span>
                </h4>
                
                <ul class="flch-footer__list">
                    <?php
                    $programs = [
                        ['url' => 'https://posgradoletras.unmsm.edu.pe/', 'title' => 'Pregrado'],
                        ['url' => 'https://ceidletras.unmsm.edu.pe/', 'title' => 'Centro de Idiomas'],
                        ['url' => 'https://letras.unmsm.edu.pe/cerseu/', 'title' => 'CERSEU'],
                        ['url' => 'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/', 'title' => 'OESI']
                    ];
                    
                    foreach ($programs as $program) :
                    ?>
                        <li class="flch-footer__list-item">
                            <a href="<?php echo esc_url(home_url($program['url'])); ?>" 
                               class="flch-footer__link">
                                <span class="flch-footer__link-dot"></span>
                                <span class="flch-footer__link-text"><?php echo esc_html($program['title']); ?></span>
                                <i class="fas fa-arrow-right flch-footer__link-arrow"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- Horario de atención -->
                <div class="flch-footer__schedule">
                    <div class="flch-footer__schedule-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flch-footer__schedule-info">
                        <span class="flch-footer__schedule-label">Atención</span>
                        <span class="flch-footer__schedule-time">Lun - Vie: 8:00 - 17:00</span>
                    </div>
                </div>
            </div>
            
            <!-- COLUMNA 4: Contacto -->
            <div class="flch-footer__column flch-footer__column--4">
                <h4 class="flch-footer__title">
                    <i class="fas fa-envelope flch-footer__title-icon"></i>
                    <span>Contacto</span>
                </h4>
                
                <ul class="flch-footer__contact-list">
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon-wrapper">
                            <i class="fas fa-map-marker-alt flch-footer__contact-icon"></i>
                        </div>
                        <span class="flch-footer__contact-text">Calle Germán Amézaga N° 375 - Lima</span>
                    </li>
                    
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon-wrapper">
                            <i class="fas fa-envelope flch-footer__contact-icon"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe" 
                           class="flch-footer__contact-email">
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </li>
                </ul>
                
                <!-- Redes Sociales -->
                <div class="flch-footer__social">
                    <h5 class="flch-footer__social-title">Síguenos en redes</h5>
                    <div class="flch-footer__social-grid">
                        <a href="https://www.facebook.com/letrassanmarcos" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--facebook"
                           aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--instagram"
                           aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--youtube"
                           aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--linkedin"
                           aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Barra inferior MEJORADA - AHORA MÁS VISIBLE Y CENTRADA -->
        <div class="flch-footer__bottom">
            <div class="flch-footer__copyright-wrapper">
                <!-- Escudo de San Marcos como elemento distintivo -->
                <div class="flch-footer__copyright-shield">
                    <i class="fas fa-regular fa-crown"></i>
                </div>
                
                <div class="flch-footer__copyright-content">
                    <p class="flch-footer__copyright-main">
                        &copy; <?php echo date('Y'); ?> <strong>Facultad de Letras y Ciencias Humanas</strong> - UNMSM
                    </p>
                    <p class="flch-footer__copyright-sub">
                        Decana de América • Universidad Nacional Mayor de San Marcos
                    </p>
                    <p class="flch-footer__copyright-rights">
                        Todos los derechos reservados.
                    </p>
                </div>
                
                <!-- Año de fundación destacado -->
                <div class="flch-footer__copyright-year">
                    <span class="flch-footer__year-badge">1551</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- BOTONES FLOTANTES con estilos independientes -->

<!-- WhatsApp Button -->
<a href="https://wa.me/51982086285?text=Hola,%20deseo%20información%20sobre%20la%20facultad" 
   class="flch-whatsapp"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Contactar por WhatsApp">
    
    <div class="flch-whatsapp__ripple"></div>
    <div class="flch-whatsapp__ripple-2"></div>
    
    <div class="flch-whatsapp__button">
        <i class="fab fa-whatsapp flch-whatsapp__icon"></i>
    </div>
    
    <span class="flch-whatsapp__tooltip">¿Necesitas ayuda?</span>
</a>

<!-- Back to Top Button -->
<button id="flch-back-to-top" 
        class="flch-backtotop"
        aria-label="Volver al inicio"
        title="Volver arriba">
    
    <i class="fas fa-arrow-up flch-backtotop__icon"></i>
    
    <svg class="flch-backtotop__progress" viewBox="0 0 48 48">
        <circle class="flch-backtotop__progress-bg" cx="24" cy="24" r="22"></circle>
        <circle id="flch-progress-circle" class="flch-backtotop__progress-fill" cx="24" cy="24" r="22"></circle>
    </svg>
</button>

<?php wp_footer(); ?>

<!-- Scripts independientes -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // === BACK TO TOP CON PROGRESO ===
    const backToTop = document.getElementById('flch-back-to-top');
    const progressCircle = document.getElementById('flch-progress-circle');
    
    if (backToTop && progressCircle) {
        const circumference = 2 * Math.PI * 22; // 138.2 aprox
        progressCircle.style.strokeDasharray = circumference;
        
        window.addEventListener('scroll', function() {
            const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
            const scrollProgress = window.pageYOffset / scrollTotal;
            const scrollOffset = circumference - (scrollProgress * circumference);
            
            // Mostrar/ocultar botón
            if (window.pageYOffset > 300) {
                backToTop.classList.add('flch-backtotop--visible');
            } else {
                backToTop.classList.remove('flch-backtotop--visible');
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
    
    // === ANIMACIÓN DE ENLACES ===
    const footerLinks = document.querySelectorAll('.flch-footer__link');
    footerLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const dot = this.querySelector('.flch-footer__link-dot');
            if (dot) dot.style.transform = 'scale(1.5)';
        });
        link.addEventListener('mouseleave', function() {
            const dot = this.querySelector('.flch-footer__link-dot');
            if (dot) dot.style.transform = 'scale(1)';
        });
    });
    
    // === SOPORTE PARA REDUCED MOTION ===
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('.flch-whatsapp__ripple, .flch-whatsapp__ripple-2').forEach(el => {
            el.style.animation = 'none';
        });
    }
});
</script>

<!-- Estilos independientes - SIN CONFLICTOS con Tailwind -->
<style>
/* ===================================
   FLCH FOOTER - ESTILOS INDEPENDIENTES
   =================================== */

/* Contenedor principal */
.flch-footer {
    background: linear-gradient(135deg, #0A1E3C 0%, #143B63 50%, #1E4A7A 100%);
    color: white;
    width: 100%;
    position: relative;
    overflow: hidden;
    padding-top: 4rem;
    padding-bottom: 1.5rem;
    font-family: 'Poppins', sans-serif;
}

/* Elementos decorativos */
.flch-footer__decor {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.flch-footer__blob {
    position: absolute;
    border-radius: 9999px;
    filter: blur(128px);
    opacity: 0.2;
}

.flch-footer__blob--top-left {
    top: 0;
    left: 0;
    width: 24rem;
    height: 24rem;
    background: #A88F1D;
    transform: translate(-50%, -50%);
    animation: flch-pulse-slow 4s ease-in-out infinite;
}

.flch-footer__blob--bottom-right {
    bottom: 0;
    right: 0;
    width: 31.25rem;
    height: 31.25rem;
    background: #A88F1D;
    transform: translate(33%, 33%);
    animation: flch-pulse-slower 6s ease-in-out infinite;
}

.flch-footer__pattern {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 40px 40px;
}

.flch-footer__top-line {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, #A88F1D, transparent);
}

/* Contenedor */
.flch-footer__container {
    max-width: 1280px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1rem;
    padding-right: 1rem;
    position: relative;
    z-index: 10;
}

/* Grid */
.flch-footer__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin-bottom: 3rem;
}

@media (min-width: 768px) {
    .flch-footer__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .flch-footer__grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 3rem;
    }
}

/* Columnas */
.flch-footer__column {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.flch-footer__column--1 { animation: flch-fadeInUp 0.6s ease-out forwards; animation-delay: 0.1s; opacity: 0; }
.flch-footer__column--2 { animation: flch-fadeInUp 0.6s ease-out forwards; animation-delay: 0.2s; opacity: 0; }
.flch-footer__column--3 { animation: flch-fadeInUp 0.6s ease-out forwards; animation-delay: 0.3s; opacity: 0; }
.flch-footer__column--4 { animation: flch-fadeInUp 0.6s ease-out forwards; animation-delay: 0.4s; opacity: 0; }

/* Brand */
.flch-footer__brand {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.5rem;
}

.flch-footer__icon-wrapper {
    width: 3.5rem;
    height: 3.5rem;
    background: linear-gradient(135deg, #A88F1D, #8B7718);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);
    transition: transform 0.3s ease;
}

.flch-footer__icon-wrapper:hover {
    transform: scale(1.1);
}

.flch-footer__icon {
    font-size: 1.5rem;
    color: white;
}

.flch-footer__brand-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: white;
    margin: 0;
}

.flch-footer__brand-subtitle {
    font-size: 1.5rem;
    font-weight: 900;
    color: #A88F1D;
    display: block;
    line-height: 1.2;
}

.flch-footer__description {
    color: rgba(255,255,255,0.7);
    font-size: 0.875rem;
    line-height: 1.6;
    margin: 0;
}

/* Badge */
.flch-footer__badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(4px);
    border-radius: 9999px;
    padding: 0.375rem 1rem;
    border: 1px solid rgba(168,143,29,0.3);
    width: fit-content;
    cursor: default;
    transition: all 0.3s ease;
}

.flch-footer__badge:hover {
    background: rgba(168,143,29,0.2);
    transform: translateY(-2px);
}

.flch-footer__badge-icon {
    color: #A88F1D;
    font-size: 0.75rem;
    transition: transform 0.3s ease;
}

.flch-footer__badge:hover .flch-footer__badge-icon {
    transform: scale(1.2);
}

.flch-footer__badge-text {
    font-size: 0.75rem;
    font-weight: 500;
    color: rgba(255,255,255,0.9);
}

/* Títulos */
.flch-footer__title {
    font-size: 1.125rem;
    font-weight: 600;
    color: white;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(168,143,29,0.3);
    margin: 0 0 0.5rem 0;
}

.flch-footer__title-icon {
    color: #A88F1D;
    font-size: 0.875rem;
}

/* Listas */
.flch-footer__list,
.flch-footer__contact-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.flch-footer__list-item {
    margin: 0;
}

.flch-footer__link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.8);
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    padding: 0.25rem 0;
}

.flch-footer__link:hover {
    color: #A88F1D;
    transform: translateX(4px);
}

.flch-footer__link-dot {
    width: 0.375rem;
    height: 0.375rem;
    background: #A88F1D;
    border-radius: 9999px;
    display: inline-block;
    transition: transform 0.3s ease;
}

.flch-footer__link-icon,
.flch-footer__link-arrow {
    font-size: 0.75rem;
    opacity: 0;
    transition: all 0.3s ease;
    margin-left: auto;
}

.flch-footer__link:hover .flch-footer__link-icon,
.flch-footer__link:hover .flch-footer__link-arrow {
    opacity: 1;
    transform: translateX(4px);
}

.flch-footer__link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 1px;
    background: #A88F1D;
    transition: width 0.3s ease;
}

.flch-footer__link:hover::after {
    width: 100%;
}

/* Schedule */
.flch-footer__schedule {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.flch-footer__schedule-icon {
    width: 2rem;
    height: 2rem;
    background: rgba(168,143,29,0.1);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #A88F1D;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.flch-footer__schedule:hover .flch-footer__schedule-icon {
    background: #A88F1D;
    color: white;
    transform: scale(1.1);
}

.flch-footer__schedule-info {
    display: flex;
    flex-direction: column;
}

.flch-footer__schedule-label {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.4);
}

.flch-footer__schedule-time {
    font-size: 0.875rem;
    color: rgba(255,255,255,0.8);
    font-weight: 500;
}

/* Contacto */
.flch-footer__contact-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.flch-footer__contact-icon-wrapper {
    width: 2rem;
    height: 2rem;
    background: rgba(255,255,255,0.1);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.flch-footer__contact-item:hover .flch-footer__contact-icon-wrapper {
    background: #A88F1D;
    transform: scale(1.1);
}

.flch-footer__contact-icon {
    color: #A88F1D;
    font-size: 0.75rem;
    transition: color 0.3s ease;
}

.flch-footer__contact-item:hover .flch-footer__contact-icon {
    color: white;
}

.flch-footer__contact-text {
    color: rgba(255,255,255,0.8);
    font-size: 0.875rem;
    line-height: 1.4;
}

.flch-footer__contact-phone {
    display: flex;
    flex-direction: column;
}

.flch-footer__contact-extension {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.5);
}

.flch-footer__contact-email {
    color: rgba(255,255,255,0.8);
    font-size: 0.875rem;
    text-decoration: none;
    transition: color 0.3s ease;
    word-break: break-all;
}

.flch-footer__contact-email:hover {
    color: #A88F1D;
}

/* Social */
.flch-footer__social {
    margin-top: 1rem;
}

.flch-footer__social-title {
    font-size: 0.75rem;
    font-weight: 500;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0 0 0.75rem 0;
}

.flch-footer__social-grid {
    display: flex;
    gap: 0.5rem;
}

.flch-footer__social-link {
    width: 2.5rem;
    height: 2.5rem;
    background: rgba(255,255,255,0.1);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.flch-footer__social-link:hover {
    transform: translateY(-3px);
    color: white;
}

.flch-footer__social-link--facebook:hover { background: #1877F2; }
.flch-footer__social-link--instagram:hover { background: #E4405F; }
.flch-footer__social-link--youtube:hover { background: #FF0000; }
.flch-footer__social-link--linkedin:hover { background: #0077B5; }

/* ===================================
   BOTTOM BAR MEJORADA - MÁS VISIBLE
   =================================== */
.flch-footer__bottom {
    padding-top: 2.5rem;
    margin-top: 2rem;
    border-top: 1px solid rgba(168,143,29,0.3);
    position: relative;
}

/* Línea decorativa adicional */
.flch-footer__bottom::before {
    content: '';
    position: absolute;
    top: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: #A88F1D;
    border-radius: 3px;
    box-shadow: 0 0 15px rgba(168,143,29,0.5);
}

.flch-footer__copyright-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1.5rem;
    background: rgba(10,30,60,0.6);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 2rem 1.5rem;
    border: 1px solid rgba(168,143,29,0.2);
    box-shadow: 0 20px 40px -15px rgba(0,0,0,0.5);
    text-align: center;
}

@media (min-width: 768px) {
    .flch-footer__copyright-wrapper {
        flex-direction: row;
        padding: 1.5rem 2rem;
    }
}

.flch-footer__copyright-shield {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #A88F1D, #8B7718);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    border: 2px solid rgba(255,255,255,0.2);
    flex-shrink: 0;
}

@media (max-width: 767px) {
    .flch-footer__copyright-shield {
        width: 3.5rem;
        height: 3.5rem;
        font-size: 1.75rem;
    }
}

.flch-footer__copyright-content {
    flex: 1;
}

.flch-footer__copyright-main {
    font-size: 1rem;
    font-weight: 600;
    color: white;
    margin: 0 0 0.25rem 0;
    letter-spacing: 0.5px;
}

@media (min-width: 768px) {
    .flch-footer__copyright-main {
        font-size: 1.125rem;
    }
}

.flch-footer__copyright-main strong {
    color: #A88F1D;
    font-weight: 700;
}

.flch-footer__copyright-sub {
    font-size: 0.875rem;
    color: rgba(255,255,255,0.6);
    margin: 0 0 0.25rem 0;
    font-style: italic;
    letter-spacing: 0.5px;
}

.flch-footer__copyright-rights {
    font-size: 0.875rem;
    color: white;
    margin: 0;
    font-weight: 500;
    display: inline-block;
    background: rgba(168,143,29,0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 2rem;
    border: 1px solid rgba(168,143,29,0.3);
}

.flch-footer__copyright-year {
    display: flex;
    align-items: center;
    justify-content: center;
}

.flch-footer__year-badge {
    background: linear-gradient(135deg, #A88F1D, #8B7718);
    color: white;
    font-size: 1.25rem;
    font-weight: 800;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    box-shadow: 0 5px 15px rgba(168,143,29,0.3);
    border: 2px solid rgba(255,255,255,0.2);
    letter-spacing: 1px;
}

@media (min-width: 768px) {
    .flch-footer__year-badge {
        font-size: 1.5rem;
    }
}

/* ===================================
   WHATSAPP BUTTON - ESTILOS INDEPENDIENTES
   =================================== */
.flch-whatsapp {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
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
    border-radius: 9999px;
    opacity: 0.25;
}

.flch-whatsapp__ripple {
    animation: flch-ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
}

.flch-whatsapp__ripple-2 {
    animation: flch-pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.flch-whatsapp__button {
    position: relative;
    width: 3.5rem;
    height: 3.5rem;
    background: #25D366;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .flch-whatsapp__button {
        width: 3rem;
        height: 3rem;
    }
}

.flch-whatsapp__button:hover {
    background: #128C7E;
    transform: scale(1.1);
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
    margin-right: 0.75rem;
    background: #0A1E3C;
    color: white;
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s ease;
    border: 1px solid rgba(168,143,29,0.3);
    pointer-events: none;
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);
}

.flch-whatsapp:hover .flch-whatsapp__tooltip {
    opacity: 1;
}

/* ===================================
   BACK TO TOP - ESTILOS INDEPENDIENTES
   =================================== */
.flch-backtotop {
    position: fixed;
    bottom: 1.5rem;
    left: 1.5rem;
    z-index: 9999;
    width: 3rem;
    height: 3rem;
    background: #143B63;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border: 1px solid rgba(168,143,29,0.3);
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    transform: scale(0.8);
    padding: 0;
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);
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
    background: #A88F1D;
    transform: scale(1.1) translateY(-2px);
}

.flch-backtotop__icon {
    font-size: 0.875rem;
    position: relative;
    z-index: 2;
    transition: transform 0.3s ease;
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
    stroke: rgba(255,255,255,0.1);
    stroke-width: 2;
    fill: transparent;
}

.flch-backtotop__progress-fill {
    stroke: #A88F1D;
    stroke-width: 2;
    fill: transparent;
    stroke-dasharray: 138.2;
    stroke-dashoffset: 138.2;
    transition: stroke-dashoffset 0.3s ease;
}

/* ===================================
   ANIMACIONES
   =================================== */
@keyframes flch-fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes flch-pulse-slow {
    0%, 100% { opacity: 0.2; }
    50% { opacity: 0.3; }
}

@keyframes flch-pulse-slower {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.2; }
}

@keyframes flch-ping {
    75%, 100% {
        transform: scale(2);
        opacity: 0;
    }
}

@keyframes flch-pulse {
    0%, 100% { opacity: 0.25; }
    50% { opacity: 0.4; }
}

/* ===================================
   RESPONSIVE FINAL
   =================================== */
@media (prefers-reduced-motion: reduce) {
    .flch-footer__column,
    .flch-footer__blob,
    .flch-whatsapp__ripple,
    .flch-whatsapp__ripple-2,
    .flch-backtotop,
    .flch-footer__link,
    .flch-footer__social-link {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
}
</style>

</body>
</html>