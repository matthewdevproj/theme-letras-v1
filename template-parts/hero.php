<?php
/**
 * Template part: Hero section cinematográfico para FLCH
 * 
 * Diseño premium con arquitectura limpia, performance optimizada y UX excepcional
 * @package LetrasFLCH
 */
?>

<!-- HERO SECTION - DISEÑO INSTITUCIONAL PREMIUM -->
<section class="flch-hero" aria-label="Hero principal con experiencia cinematográfica">
    
    <!-- Capa de slideshow con rendimiento optimizado -->
    <div class="flch-hero__slideshow" id="heroSlideshow">
        <?php
        $slides = [
            [
                'image' => 'DJI_0007-Trim-frame-at-0m5s.jpg',
                'alt' => 'Vista aérea del campus universitario',
                'title' => 'Campus Universitario'
            ],
            [
                'image' => 'DJI_0018-Trim-frame-at-0m2s.jpg',
                'alt' => 'Arquitectura histórica de San Marcos',
                'title' => 'Arquitectura Histórica'
            ],
            [
                'image' => 'IMG_1565-scaled.jpg',
                'alt' => 'Estudiantes en la biblioteca central',
                'title' => 'Biblioteca Central'
            ],
            [
                'image' => 'IMG_1561-scaled.jpg',
                'alt' => 'Actividades académicas',
                'title' => 'Vida Académica'
            ],
            [
                'image' => 'IMG_1556-scaled.jpg',
                'alt' => 'Ceremonia institucional',
                'title' => 'Ceremonias'
            ]
        ];
        
        foreach ($slides as $index => $slide) :
            $loading = $index === 0 ? 'eager' : 'lazy';
            $priority = $index === 0 ? 'high' : 'low';
        ?>
            <div class="flch-hero__slide <?php echo $index === 0 ? 'is-active' : ''; ?>" 
                 data-slide-index="<?php echo $index; ?>"
                 role="img" 
                 aria-label="<?php echo esc_attr($slide['alt']); ?>"
                 data-title="<?php echo esc_attr($slide['title']); ?>"
                 style="background-image: url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/<?php echo $slide['image']; ?>');">
                <!-- Imagen oculta para SEO -->
                <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/<?php echo $slide['image']; ?>" 
                     alt="<?php echo esc_attr($slide['alt']); ?>" 
                     class="flch-hero__slide-img" 
                     loading="<?php echo $loading; ?>"
                     fetchpriority="<?php echo $priority; ?>">
            </div>
        <?php endforeach; ?>
        
        <!-- Overlays con gradientes optimizados -->
        <div class="flch-hero__overlay flch-hero__overlay--base" aria-hidden="true"></div>
        <div class="flch-hero__overlay flch-hero__overlay--gradient" aria-hidden="true"></div>
        <div class="flch-hero__overlay flch-hero__overlay--vignette" aria-hidden="true"></div>
        
        <!-- Textura académica sutil -->
        <div class="flch-hero__texture" aria-hidden="true"></div>
        
        <!-- Efecto de luz dinámico (solo desktop) -->
        <div class="flch-hero__light-sweep hidden md:block" aria-hidden="true"></div>
    </div>
    
    <!-- Divisor inferior con efecto de pergamino -->
    <div class="flch-hero__divider" aria-hidden="true">
        <div class="flch-hero__divider-inner"></div>
    </div>
    
    <!-- Contenido principal -->
    <div class="flch-hero__content">
        <div class="flch-hero__container">
            
            <!-- Badge institucional con animación -->
            <div class="flch-hero__badge">
                <div class="flch-hero__badge-icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="flch-hero__badge-text">UNMSM · 1551 · DECANA DE AMÉRICA</span>
            </div>
            
            <!-- Título con jerarquía tipográfica -->
            <h1 class="flch-hero__title">
                <span class="flch-hero__title-prefix">Facultad de</span>
                <span class="flch-hero__title-main">
                    <span class="flch-hero__title-line">
                        <span class="flch-hero__title-word">Letras</span>
                        <span class="flch-hero__title-word">&</span>
                    </span>
                    <span class="flch-hero__title-line">
                        <span class="flch-hero__title-word">Ciencias</span>
                        <span class="flch-hero__title-word">Humanas</span>
                    </span>
                </span>
            </h1>
            
            <!-- Línea decorativa -->
            <div class="flch-hero__accent-line" aria-hidden="true">
                <div class="flch-hero__accent-line-inner"></div>
            </div>
            
            <!-- Descripción institucional - VERSIÓN CORREGIDA -->
            <div class="flch-hero__description-wrapper">
                <p class="flch-hero__description">
                    <span class="flch-hero__description-text">
                        Bienvenidos al portal oficial de la Facultad de Letras y Ciencias Humanas 
                        de la Universidad Nacional Mayor de San Marcos, 
                    </span>
                    <span class="flch-hero__description-highlight">
                        casa de estudios de nuestro premio nobel Mario Vargas Llosa
                    </span>
                    <span class="flch-hero__description-text">
                        y de reconocidas eminencias en el ámbito académico y cultural del Perú.
                    </span>
                </p>
            </div>
            
            <!-- Grupo de acciones -->
            <div class="flch-hero__actions">
                
                <!-- Botones principales - VERSIÓN CORREGIDA CON ALINEACIÓN -->
                <div class="flch-hero__buttons">
                    
                    <!-- CEID - Primario -->
                    <a href="https://ceidletras.unmsm.edu.pe/" 
                       class="flch-btn flch-btn--primary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">CEID</span>
                        <span class="flch-btn__badge">Investigación</span>
                        <span class="flch-btn__icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    
                    <!-- Posgrado - Secundario con borde claro -->
                    <a href="https://posgradoletras.unmsm.edu.pe/" 
                       class="flch-btn flch-btn--secondary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">Posgrado</span>
                        <span class="flch-btn__icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    
                    <!-- Suficiencia Idiomas - Secundario con borde claro -->
                    <a href="https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/" 
                       class="flch-btn flch-btn--secondary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">Suficiencia</span>
                        <span class="flch-btn__subtext">Idiomas</span>
                        <span class="flch-btn__icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
                
                <!-- Indicador de scroll -->
                <div class="flch-hero__scroll">
                    <span class="flch-hero__scroll-text">Descubrir</span>
                    <div class="flch-hero__scroll-line" aria-hidden="true">
                        <div class="flch-hero__scroll-progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Elementos decorativos flotantes -->
    <div class="flch-hero__floating" aria-hidden="true">
        <div class="flch-hero__floating-circle flch-hero__floating-circle--1"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--2"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--3"></div>
    </div>
</section>

<!-- JavaScript modular y optimizado -->
<script>
(function() {
    'use strict';
    
    // Configuración optimizada
    const CONFIG = {
        slideDuration: 6000,
        transitionDuration: 2400,
        autoplay: true,
        pauseOnHover: true,
        easing: [0.25, 0.1, 0.25, 1]
    };
    
    class HeroSlider {
        constructor() {
            this.slides = document.querySelectorAll('.flch-hero__slide');
            this.hero = document.querySelector('.flch-hero');
            this.currentIndex = 0;
            this.intervalId = null;
            this.isTransitioning = false;
            
            if (!this.slides.length) return;
            
            this.init();
        }
        
        init() {
            this.setInitialState();
            this.bindEvents();
            this.startAutoplay();
            this.preloadImages();
        }
        
        setInitialState() {
            this.slides.forEach((slide, index) => {
                slide.style.opacity = '0';
                slide.style.zIndex = '1';
                slide.style.transition = `opacity ${CONFIG.transitionDuration}ms cubic-bezier(${CONFIG.easing.join(',')})`;
                
                if (index === 0) {
                    slide.style.opacity = '1';
                    slide.style.zIndex = '5';
                    slide.classList.add('is-active');
                }
            });
        }
        
        bindEvents() {
            if (!this.hero || !CONFIG.pauseOnHover) return;
            
            this.hero.addEventListener('mouseenter', () => this.stopAutoplay());
            this.hero.addEventListener('mouseleave', () => this.startAutoplay());
            
            document.addEventListener('visibilitychange', () => {
                document.hidden ? this.stopAutoplay() : this.startAutoplay();
            });
        }
        
        transitionToNext() {
            if (this.isTransitioning || !this.slides.length) return;
            
            this.isTransitioning = true;
            
            this.slides[this.currentIndex].style.opacity = '0';
            this.slides[this.currentIndex].style.zIndex = '1';
            this.slides[this.currentIndex].classList.remove('is-active');
            
            this.currentIndex = (this.currentIndex + 1) % this.slides.length;
            
            this.slides[this.currentIndex].style.opacity = '1';
            this.slides[this.currentIndex].style.zIndex = '5';
            this.slides[this.currentIndex].classList.add('is-active');
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, CONFIG.transitionDuration);
        }
        
        startAutoplay() {
            if (!CONFIG.autoplay || this.intervalId) return;
            this.intervalId = setInterval(() => this.transitionToNext(), CONFIG.slideDuration);
        }
        
        stopAutoplay() {
            if (this.intervalId) {
                clearInterval(this.intervalId);
                this.intervalId = null;
            }
        }
        
        preloadImages() {
            if ('requestIdleCallback' in window) {
                requestIdleCallback(() => {
                    this.slides.forEach(slide => {
                        const img = slide.querySelector('.flch-hero__slide-img');
                        if (img && img.src && !img.complete) {
                            const preloadLink = document.createElement('link');
                            preloadLink.rel = 'preload';
                            preloadLink.as = 'image';
                            preloadLink.href = img.src;
                            document.head.appendChild(preloadLink);
                        }
                    });
                });
            }
        }
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => new HeroSlider());
    } else {
        new HeroSlider();
    }
})();
</script>

<style>
/* ===== VARIABLES CSS ===== */
:root {
    /* Colores principales */
    --flch-primary: #0A1E3C;
    --flch-primary-light: #143B63;
    --flch-primary-dark: #051020;
    
    /* Acentos */
    --flch-gold: #C6A43F;
    --flch-gold-light: #DAB95C;
    --flch-gold-dark: #9A7E2F;
    --flch-gold-dim: rgba(198, 164, 63, 0.15);
    
    /* Neutros */
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
    
    /* Overlays */
    --flch-overlay-deep: rgba(5, 16, 32, 0.85);
    --flch-overlay-medium: rgba(10, 26, 53, 0.7);
    --flch-overlay-light: rgba(10, 26, 53, 0.4);
    
    /* Sombras */
    --flch-shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.15);
    --flch-shadow-md: 0 8px 30px rgba(0, 0, 0, 0.2);
    --flch-shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.25);
    --flch-shadow-gold: 0 10px 30px rgba(198, 164, 63, 0.3);
    
    /* Tipografía */
    --flch-font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    --flch-font-display: 'Cormorant Garamond', 'Times New Roman', serif;
    
    /* Transiciones */
    --flch-ease: cubic-bezier(0.4, 0, 0.2, 1);
    --flch-ease-out: cubic-bezier(0, 0, 0.2, 1);
    --flch-ease-in: cubic-bezier(0.4, 0, 1, 1);
    --flch-ease-sharp: cubic-bezier(0.4, 0, 0.6, 1);
    
    /* Espaciado */
    --flch-space-1: 0.25rem;
    --flch-space-2: 0.5rem;
    --flch-space-3: 0.75rem;
    --flch-space-4: 1rem;
    --flch-space-5: 1.25rem;
    --flch-space-6: 1.5rem;
    --flch-space-8: 2rem;
    --flch-space-10: 2.5rem;
    --flch-space-12: 3rem;
    --flch-space-16: 4rem;
}

/* ===== HERO PRINCIPAL ===== */
.flch-hero {
    position: relative;
    width: 100%;
    height: min(90vh, 900px);
    min-height: 650px;
    overflow: hidden;
    background-color: var(--flch-primary);
    color: var(--flch-white);
    font-family: var(--flch-font-primary);
    isolation: isolate;
}

/* ===== SLIDESHOW ===== */
.flch-hero__slideshow {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.flch-hero__slide {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    will-change: opacity;
    z-index: 1;
}

.flch-hero__slide::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 2;
}

.flch-hero__slide-img {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}

/* ===== OVERLAYS ===== */
.flch-hero__overlay {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 5;
}

.flch-hero__overlay--base {
    background: linear-gradient(105deg, 
        var(--flch-overlay-deep) 0%,
        var(--flch-overlay-medium) 40%,
        transparent 80%);
}

.flch-hero__overlay--gradient {
    background: radial-gradient(circle at 30% 50%, 
        transparent 0%,
        var(--flch-overlay-deep) 100%);
    opacity: 0.6;
}

.flch-hero__overlay--vignette {
    background: radial-gradient(circle at 50% 50%, 
        transparent 30%,
        rgba(0, 0, 0, 0.4) 100%);
}

/* ===== TEXTURA ===== */
.flch-hero__texture {
    position: absolute;
    inset: 0;
    background-image: repeating-linear-gradient(45deg, 
        rgba(255, 255, 255, 0.02) 0px,
        rgba(255, 255, 255, 0.02) 2px,
        transparent 2px,
        transparent 8px);
    background-size: 30px 30px;
    pointer-events: none;
    z-index: 6;
    opacity: 0.3;
}

/* ===== LIGHT SWEEP ===== */
.flch-hero__light-sweep {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg,
        transparent 0%,
        rgba(255, 255, 255, 0.03) 50%,
        transparent 100%);
    transform: translateX(-100%);
    animation: lightSweep 12s infinite;
    pointer-events: none;
    z-index: 7;
}

/* ===== DIVISOR ===== */
.flch-hero__divider {
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 70px;
    z-index: 20;
    pointer-events: none;
    overflow: hidden;
}

.flch-hero__divider-inner {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(175deg, 
        transparent 0%,
        rgba(255, 255, 255, 0.95) 30%,
        var(--flch-white) 80%);
    transform: skewY(-1.8deg) translateY(30px);
    transform-origin: left;
    box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.15);
    border-bottom: 2px solid var(--flch-gold);
}

/* ===== CONTENIDO ===== */
.flch-hero__content {
    position: relative;
    z-index: 30;
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 clamp(1.5rem, 5vw, 4rem);
}

.flch-hero__container {
    max-width: 750px;
    animation: fadeInUp 1s var(--flch-ease-out);
}

/* ===== BADGE ===== */
.flch-hero__badge {
    display: inline-flex;
    align-items: center;
    gap: var(--flch-space-3);
    margin-bottom: var(--flch-space-8);
    padding: var(--flch-space-2) var(--flch-space-6) var(--flch-space-2) var(--flch-space-4);
    background: linear-gradient(90deg, 
        var(--flch-gold-dim) 0%,
        transparent 100%);
    border-left: 3px solid var(--flch-gold);
    border-radius: 0 30px 30px 0;
    animation: slideInLeft 1s var(--flch-ease-out);
}

.flch-hero__badge-icon {
    color: var(--flch-gold);
    display: flex;
    align-items: center;
    justify-content: center;
}

.flch-hero__badge-text {
    font-size: clamp(0.7rem, 1.5vw, 0.85rem);
    font-weight: 600;
    letter-spacing: 0.15em;
    color: var(--flch-gold-light);
    text-transform: uppercase;
}

/* ===== TÍTULO ===== */
.flch-hero__title {
    margin-bottom: var(--flch-space-4);
}

.flch-hero__title-prefix {
    display: block;
    font-family: var(--flch-font-display);
    font-size: clamp(1.2rem, 3vw, 1.8rem);
    font-weight: 400;
    letter-spacing: 0.15em;
    color: var(--flch-gold-light);
    text-transform: uppercase;
    margin-bottom: var(--flch-space-2);
}

.flch-hero__title-main {
    display: block;
}

.flch-hero__title-line {
    display: block;
    overflow: hidden;
}

.flch-hero__title-word {
    display: inline-block;
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    color: var(--flch-white);
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    margin-right: 0.1em;
}

.flch-hero__title-word:last-child {
    margin-right: 0;
}

/* ===== LÍNEA DECORATIVA ===== */
.flch-hero__accent-line {
    width: 120px;
    height: 3px;
    margin: var(--flch-space-6) 0 var(--flch-space-8) 0;
    background: linear-gradient(90deg, 
        var(--flch-gold) 0%,
        var(--flch-gold-light) 50%,
        transparent 100%);
    border-radius: 2px;
    overflow: hidden;
}

.flch-hero__accent-line-inner {
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%,
        rgba(255, 255, 255, 0.5) 50%,
        transparent 100%);
    animation: shimmer 3s infinite;
}

/* ===== DESCRIPCIÓN CORREGIDA ===== */
.flch-hero__description-wrapper {
    margin-bottom: var(--flch-space-8);
    max-width: 650px;
}

.flch-hero__description {
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    line-height: 1.7;
    color: var(--flch-white-90);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    margin: 0;
}

.flch-hero__description-text {
    display: inline;
    color: var(--flch-white-90);
}

.flch-hero__description-highlight {
    display: inline;
    color: var(--flch-gold);
    font-weight: 600;
    background: linear-gradient(120deg, 
        transparent 0%,
        var(--flch-gold-dim) 30%,
        var(--flch-gold-dim) 70%,
        transparent 100%);
    padding: 0.1rem 0.3rem;
    border-radius: 4px;
    white-space: normal;
    position: relative;
}

/* ===== ACCIONES ===== */
.flch-hero__actions {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: var(--flch-space-6);
}

/* ===== BOTONES - VERSIÓN CORREGIDA CON ALINEACIÓN ===== */
.flch-hero__buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
    margin-top: 1rem;
}

/* Base de botones - TODOS CON EL MISMO TAMAÑO */
.flch-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    border-radius: 6px;
    min-width: 140px;
    height: 48px;
    box-sizing: border-box;
    white-space: nowrap;
}

/* Botón primario */
.flch-btn--primary {
    background: linear-gradient(135deg, var(--flch-gold) 0%, var(--flch-gold-light) 100%);
    color: var(--flch-primary);
    border: 2px solid transparent;
    box-shadow: var(--flch-shadow-gold);
}

.flch-btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(198, 164, 63, 0.4);
}

/* Botón secundario - CON BORDE CLARO (como en la imagen) */
.flch-btn--secondary {
    background: transparent;
    color: var(--flch-white);
    border: 2px solid var(--flch-white-80);
    backdrop-filter: blur(4px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.flch-btn--secondary:hover {
    background: var(--flch-white);
    color: var(--flch-primary);
    border-color: var(--flch-white);
    transform: translateY(-2px);
    box-shadow: var(--flch-shadow-md);
}

/* Texto principal del botón */
.flch-btn__text {
    display: inline-block;
    font-weight: 600;
    line-height: 1.2;
}

/* Badge para "Investigación" (más pequeño) */
.flch-btn__badge {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 400;
    opacity: 0.9;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.15rem 0.4rem;
    border-radius: 3px;
    margin-left: 0.25rem;
}

/* Subtexto para "Idiomas" */
.flch-btn__subtext {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 400;
    opacity: 0.9;
    margin-left: 0.15rem;
}

/* Icono */
.flch-btn__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
}

.flch-btn:hover .flch-btn__icon {
    transform: translateX(4px);
}

/* ===== SCROLL INDICATOR ===== */
.flch-hero__scroll {
    display: flex;
    align-items: center;
    gap: var(--flch-space-4);
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.flch-hero__scroll:hover {
    opacity: 1;
}

.flch-hero__scroll-text {
    font-size: 0.8rem;
    font-weight: 400;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--flch-white-60);
}

.flch-hero__scroll-line {
    width: 80px;
    height: 1px;
    background: var(--flch-white-20);
    position: relative;
    overflow: hidden;
}

.flch-hero__scroll-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--flch-gold);
    animation: scrollProgress 2.5s infinite;
}

/* ===== ELEMENTOS FLOTANTES ===== */
.flch-hero__floating {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 10;
    overflow: hidden;
}

.flch-hero__floating-circle {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, 
        rgba(198, 164, 63, 0.1) 0%,
        transparent 70%);
}

.flch-hero__floating-circle--1 {
    width: 300px;
    height: 300px;
    top: 10%;
    right: -100px;
    animation: float 25s infinite linear;
}

.flch-hero__floating-circle--2 {
    width: 500px;
    height: 500px;
    bottom: -200px;
    left: -200px;
    animation: float 35s infinite linear reverse;
}

.flch-hero__floating-circle--3 {
    width: 200px;
    height: 200px;
    top: 40%;
    right: 20%;
    animation: float 15s infinite linear;
    opacity: 0.3;
}

/* ===== ANIMACIONES ===== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes lightSweep {
    0% { transform: translateX(-100%); }
    20% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

@keyframes float {
    from { transform: rotate(0deg) translate(0, 0) rotate(0deg); }
    to { transform: rotate(360deg) translate(50px, 50px) rotate(-360deg); }
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

@keyframes scrollProgress {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(0); }
    100% { transform: translateX(100%); }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .flch-hero__floating {
        opacity: 0.3;
    }
    
    .flch-hero__light-sweep {
        display: none;
    }
}

@media (max-width: 768px) {
    .flch-hero {
        min-height: 600px;
        height: 80vh;
    }
    
    .flch-hero__badge {
        margin-bottom: var(--flch-space-6);
    }
    
    .flch-hero__title-word {
        font-size: clamp(2rem, 7vw, 3.5rem);
    }
    
    .flch-hero__accent-line {
        margin: var(--flch-space-4) 0 var(--flch-space-6) 0;
    }
    
    .flch-hero__actions {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--flch-space-4);
    }
    
    .flch-hero__buttons {
        gap: 0.75rem;
    }
    
    .flch-btn {
        padding: 0.7rem 1.2rem;
        min-width: 130px;
        font-size: 0.8rem;
        height: 44px;
    }
    
    .flch-hero__scroll {
        display: none;
    }
    
    .flch-hero__divider-inner {
        transform: skewY(-2.5deg) translateY(25px);
    }
}

@media (max-width: 480px) {
    .flch-hero__buttons {
        flex-direction: column;
        width: 100%;
        gap: 0.75rem;
    }
    
    .flch-btn {
        width: 100%;
        justify-content: space-between;
        min-width: 100%;
    }
    
    .flch-btn__badge,
    .flch-btn__subtext {
        display: inline-block; /* Se mantienen visibles */
    }
}

/* ===== ACCESIBILIDAD ===== */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
    
    .flch-hero__light-sweep,
    .flch-hero__floating-circle,
    .flch-hero__scroll-progress {
        animation: none !important;
    }
}
</style>