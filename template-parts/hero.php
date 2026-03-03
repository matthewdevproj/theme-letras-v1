<?php
/**
 * Template part: Hero section premium con diseño cinematográfico
 * 
 * Diseño avanzado con micro-interacciones, tipografía expresiva y animaciones fluidas
 * @package LetrasFLCH
 */
?>

<!-- Hero Section - Diseño Premium -->
<section class="flch-hero-premium" aria-label="Hero principal con experiencia cinematográfica">
    
    <!-- Slideshow container con efecto parallax suave -->
    <div class="flch-hero__media" id="heroMedia">
        <?php
        $slides = [
            ['DJI_0007-Trim-frame-at-0m5s.jpg', 'Vista aérea del campus universitario'],
            ['DJI_0018-Trim-frame-at-0m2s.jpg', 'Arquitectura histórica de San Marcos'],
            ['IMG_1565-scaled.jpg', 'Estudiantes en la biblioteca central'],
            ['IMG_1561-scaled.jpg', 'Actividades académicas'],
            ['IMG_1556-scaled.jpg', 'Ceremonia institucional']
        ];
        
        foreach ($slides as $index => $slide) :
            $is_active = $index === 0;
            $loading = $is_active ? 'eager' : 'lazy';
        ?>
            <div class="flch-hero__slide <?php echo $is_active ? 'is-active' : ''; ?>" 
                 data-slide-index="<?php echo $index; ?>"
                 role="img" 
                 aria-label="<?php echo esc_attr($slide[1]); ?>"
                 style="background-image: url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/<?php echo $slide[0]; ?>');">
            </div>
        <?php endforeach; ?>
        
        <!-- Capas de overlay con gradientes dinámicos -->
        <div class="flch-hero__overlay-base"></div>
        <div class="flch-hero__overlay-gradient"></div>
        <div class="flch-hero__overlay-vignette"></div>
        
        <!-- Patrón texturizado sutil -->
        <div class="flch-hero__texture" aria-hidden="true"></div>
        
        <!-- Efecto de luz móvil -->
        <div class="flch-hero__light-sweep" aria-hidden="true"></div>
    </div>
    
    <!-- Divisor inferior con efecto 3D -->
    <div class="flch-hero__divider" aria-hidden="true">
        <div class="flch-hero__divider-inner"></div>
    </div>
    
    <!-- Contenido principal con animación secuencial -->
    <div class="flch-hero__content">
        <div class="flch-hero__container">
            
            <!-- Badge con diseño de sello académico -->
            <div class="flch-hero__seal">
                <div class="flch-hero__seal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="flch-hero__seal-text">UNMSM · EST. 1551</span>
            </div>
            
            <!-- Título con cinética tipográfica -->
            <h1 class="flch-hero__title">
                <span class="flch-hero__title-line">
                    <span class="flch-hero__title-prefix">Facultad de</span>
                </span>
                <span class="flch-hero__title-line flch-hero__title-line--main">
                    <span class="flch-hero__title-word">Letras</span>
                    <span class="flch-hero__title-word">&</span>
                    <span class="flch-hero__title-word">Ciencias</span>
                </span>
                <span class="flch-hero__title-line flch-hero__title-line--main">
                    <span class="flch-hero__title-word">Humanas</span>
                </span>
            </h1>
            
            <!-- Línea decorativa animada -->
            <div class="flch-hero__accent-line">
                <div class="flch-hero__accent-line-inner"></div>
            </div>
            
            <!-- Descripción con tipografía elegante -->
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
            
            <!-- Grupo de acciones con micro-interacciones -->
            <div class="flch-hero__actions-group">
                <div class="flch-hero__actions">
                    <a href="https://ceidletras.unmsm.edu.pe/" 
                       class="flch-btn flch-btn--primary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">CEID · Investigación</span>
                        <span class="flch-btn__icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none"/>
                            </svg>
                        </span>
                        <span class="flch-btn__glow"></span>
                    </a>
                    
                    <a href="https://posgradoletras.unmsm.edu.pe/" 
                       class="flch-btn flch-btn--secondary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">Posgrado</span>
                        <span class="flch-btn__icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </span>
                        <span class="flch-btn__glow"></span>
                    </a>
                </div>
                
                <!-- Indicador de scroll con diseño minimalista -->
                <div class="flch-hero__scroll-indicator" aria-hidden="true">
                    <span class="flch-hero__scroll-text">Explorar</span>
                    <div class="flch-hero__scroll-line">
                        <div class="flch-hero__scroll-progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Elementos decorativos flotantes -->
    <div class="flch-hero__floating-elements" aria-hidden="true">
        <div class="flch-hero__floating-circle flch-hero__floating-circle--1"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--2"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--3"></div>
    </div>
</section>

<!-- JavaScript avanzado con timeline -->
<script>
(function() {
    'use strict';
    
    // Configuración premium
    const CONFIG = {
        slideDuration: 5800,
        transitionDuration: 2800,
        parallaxIntensity: 0.08,
        autoplay: true,
        easing: [0.645, 0.045, 0.355, 1] // Curva personalizada
    };
    
    class HeroSlider {
        constructor() {
            this.slides = document.querySelectorAll('.flch-hero__slide');
            this.hero = document.querySelector('.flch-hero-premium');
            this.currentIndex = 0;
            this.intervalId = null;
            this.isTransitioning = false;
            this.parallaxOffset = 0;
            
            if (!this.slides.length) return;
            
            this.init();
        }
        
        init() {
            this.setInitialState();
            this.bindEvents();
            this.startAutoplay();
            this.preloadImages();
            this.initParallax();
        }
        
        setInitialState() {
            this.slides.forEach((slide, index) => {
                slide.style.opacity = '0';
                slide.style.zIndex = '1';
                slide.style.transition = `opacity ${CONFIG.transitionDuration}ms cubic-bezier(${CONFIG.easing.join(',')})`;
                slide.style.transform = 'scale(1)';
            });
            
            if (this.slides[0]) {
                this.slides[0].style.opacity = '1';
                this.slides[0].style.zIndex = '5';
                this.slides[0].classList.add('is-active');
            }
        }
        
        bindEvents() {
            if (this.hero) {
                this.hero.addEventListener('mouseenter', () => this.stopAutoplay());
                this.hero.addEventListener('mouseleave', () => this.startAutoplay());
            }
            
            document.addEventListener('visibilitychange', () => {
                document.hidden ? this.stopAutoplay() : this.startAutoplay();
            });
            
            window.addEventListener('scroll', () => this.handleParallax());
            window.addEventListener('resize', () => this.handleResize());
        }
        
        transitionToNext() {
            if (this.isTransitioning) return;
            
            this.isTransitioning = true;
            
            // Efecto de zoom out suave en slide saliente
            this.slides[this.currentIndex].style.transform = 'scale(1.05)';
            
            setTimeout(() => {
                this.slides[this.currentIndex].style.opacity = '0';
                this.slides[this.currentIndex].style.zIndex = '1';
                this.slides[this.currentIndex].classList.remove('is-active');
                
                this.currentIndex = (this.currentIndex + 1) % this.slides.length;
                
                // Efecto de zoom in en slide entrante
                this.slides[this.currentIndex].style.transform = 'scale(1)';
                this.slides[this.currentIndex].style.opacity = '1';
                this.slides[this.currentIndex].style.zIndex = '5';
                this.slides[this.currentIndex].classList.add('is-active');
                
                setTimeout(() => {
                    this.isTransitioning = false;
                }, CONFIG.transitionDuration);
            }, 50);
        }
        
        handleParallax() {
            if (!this.hero) return;
            
            const scrollY = window.scrollY;
            const heroHeight = this.hero.offsetHeight;
            
            if (scrollY < heroHeight) {
                this.parallaxOffset = scrollY * CONFIG.parallaxIntensity;
                this.hero.style.transform = `translateY(${this.parallaxOffset}px)`;
            }
        }
        
        handleResize() {
            // Debounce para evitar múltiples cálculos
            clearTimeout(this.resizeTimeout);
            this.resizeTimeout = setTimeout(() => {
                // Reajustar si es necesario
            }, 150);
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
                        const bg = slide.style.backgroundImage;
                        if (bg) {
                            const url = bg.replace(/url\((['"])?(.*?)\1\)/gi, '$2');
                            if (url) {
                                const img = new Image();
                                img.src = url;
                            }
                        }
                    });
                });
            }
        }
        
        initParallax() {
            if (this.hero && 'IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.hero.style.willChange = 'transform';
                        } else {
                            this.hero.style.willChange = 'auto';
                        }
                    });
                }, { threshold: 0.1 });
                
                observer.observe(this.hero);
            }
        }
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => new HeroSlider());
    } else {
        new HeroSlider();
    }
})();
</script>

<!-- CSS premium con diseño avanzado -->
<style>
/* ===== TOKENS DE DISEÑO ===== */
:root {
    /* Paleta principal - refinada */
    --flch-color-primary: #0A1A35;
    --flch-color-primary-light: #1A2A45;
    --flch-color-primary-dark: #051020;
    
    /* Acentos - metálicos */
    --flch-color-gold: #C6A43F;
    --flch-color-gold-light: #DAB95C;
    --flch-color-gold-dark: #9A7E2F;
    --flch-color-gold-dim: rgba(198, 164, 63, 0.15);
    
    /* Neutros sofisticados */
    --flch-color-white: #FFFFFF;
    --flch-color-offwhite: #F8F6F2;
    --flch-color-cream: #F0ECE3;
    --flch-color-charcoal: #1E1E1E;
    
    /* Overlays */
    --flch-overlay-deep: rgba(5, 16, 32, 0.85);
    --flch-overlay-medium: rgba(10, 26, 53, 0.65);
    --flch-overlay-light: rgba(198, 164, 63, 0.08);
    
    /* Sombras */
    --flch-shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.15);
    --flch-shadow-md: 0 8px 30px rgba(0, 0, 0, 0.2);
    --flch-shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.25);
    --flch-shadow-gold: 0 10px 30px rgba(198, 164, 63, 0.25);
    
    /* Tipografía */
    --flch-font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    --flch-font-display: 'Cormorant Garamond', 'Times New Roman', serif;
    
    /* Animaciones */
    --flch-ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
    --flch-ease-out-back: cubic-bezier(0.34, 1.56, 0.64, 1);
    --flch-ease-smooth: cubic-bezier(0.4, 0, 0.2, 1);
    --flch-ease-dramatic: cubic-bezier(0.645, 0.045, 0.355, 1);
    
    /* Duraciones */
    --flch-duration-instant: 150ms;
    --flch-duration-fast: 300ms;
    --flch-duration-normal: 500ms;
    --flch-duration-slow: 800ms;
    --flch-duration-cinematic: 1200ms;
}

/* ===== HERO PREMIUM ===== */
.flch-hero-premium {
    position: relative;
    width: 100%;
    height: min(90vh, 900px);
    min-height: 650px;
    overflow: hidden;
    background-color: var(--flch-color-primary);
    color: var(--flch-color-white);
    font-family: var(--flch-font-primary);
}

/* ===== MEDIA LAYER ===== */
.flch-hero__media {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 110%; /* Espacio para parallax */
    transform: translateY(0);
    will-change: transform;
}

.flch-hero__slide {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: brightness(0.65) saturate(1.2);
    will-change: opacity, transform;
    transition: opacity var(--flch-duration-cinematic) var(--flch-ease-dramatic),
                transform var(--flch-duration-cinematic) var(--flch-ease-dramatic);
}

/* ===== OVERLAYS AVANZADOS ===== */
.flch-hero__overlay-base {
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg, 
        var(--flch-overlay-deep) 0%,
        var(--flch-overlay-medium) 40%,
        transparent 80%);
    z-index: 10;
    pointer-events: none;
}

.flch-hero__overlay-gradient {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 50%, 
        transparent 0%,
        var(--flch-overlay-deep) 100%);
    opacity: 0.6;
    z-index: 11;
    pointer-events: none;
}

.flch-hero__overlay-vignette {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, 
        transparent 30%,
        rgba(0, 0, 0, 0.4) 100%);
    z-index: 12;
    pointer-events: none;
}

.flch-hero__texture {
    position: absolute;
    inset: 0;
    background-image: 
        repeating-linear-gradient(45deg, 
            rgba(255, 255, 255, 0.01) 0px,
            rgba(255, 255, 255, 0.01) 2px,
            transparent 2px,
            transparent 8px);
    background-size: 20px 20px;
    z-index: 13;
    opacity: 0.3;
    pointer-events: none;
}

.flch-hero__light-sweep {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg,
        transparent 0%,
        rgba(255, 255, 255, 0.03) 50%,
        transparent 100%);
    transform: translateX(-100%);
    animation: lightSweep 12s infinite;
    z-index: 14;
    pointer-events: none;
}

/* ===== DIVISOR 3D ===== */
.flch-hero__divider {
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 70px;
    z-index: 30;
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
        rgba(255, 255, 255, 0.9) 30%,
        var(--flch-color-white) 80%);
    transform: skewY(-1.8deg) translateY(30px);
    transform-origin: left;
    box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.15);
    border-bottom: 2px solid var(--flch-color-gold);
}

/* ===== CONTENIDO PRINCIPAL ===== */
.flch-hero__content {
    position: relative;
    z-index: 40;
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 clamp(2rem, 6vw, 4rem);
}

.flch-hero__container {
    max-width: 750px;
    animation: containerFadeIn 1.2s var(--flch-ease-out-expo);
}

/* ===== SEAL / BADGE ===== */
.flch-hero__seal {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 2.5rem;
    padding: 0.5rem 2rem 0.5rem 1.5rem;
    background: linear-gradient(90deg, 
        var(--flch-color-gold-dim) 0%,
        transparent 100%);
    border-left: 3px solid var(--flch-color-gold);
    border-radius: 0 30px 30px 0;
    transform-origin: left;
    animation: sealAppear 1s var(--flch-ease-out-back);
}

.flch-hero__seal-icon {
    color: var(--flch-color-gold);
    animation: rotateSlow 20s infinite linear;
}

.flch-hero__seal-text {
    font-size: clamp(0.7rem, 1.5vw, 0.85rem);
    font-weight: 500;
    letter-spacing: 0.2em;
    color: var(--flch-color-gold-light);
    text-transform: uppercase;
}

/* ===== TÍTULO CINÉTICO ===== */
.flch-hero__title {
    margin-bottom: 1.5rem;
}

.flch-hero__title-line {
    display: block;
    overflow: hidden;
}

.flch-hero__title-line--main {
    margin-top: -0.2em;
}

.flch-hero__title-prefix {
    display: block;
    font-family: var(--flch-font-display);
    font-size: clamp(1.2rem, 3vw, 1.8rem);
    font-weight: 400;
    letter-spacing: 0.15em;
    color: var(--flch-color-gold-light);
    text-transform: uppercase;
    transform: translateY(100%);
    animation: slideUp 0.8s var(--flch-ease-out-expo) 0.2s forwards;
}

.flch-hero__title-word {
    display: inline-block;
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    color: var(--flch-color-white);
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(100%);
    opacity: 0;
    animation: slideUpWord 0.8s var(--flch-ease-out-back) forwards;
}

.flch-hero__title-word:nth-child(1) { animation-delay: 0.3s; }
.flch-hero__title-word:nth-child(2) { animation-delay: 0.4s; }
.flch-hero__title-word:nth-child(3) { animation-delay: 0.5s; }
.flch-hero__title-word:nth-child(4) { animation-delay: 0.6s; }

/* Línea decorativa */
.flch-hero__accent-line {
    width: 120px;
    height: 3px;
    margin: 2rem 0 2rem 0;
    background: linear-gradient(90deg, 
        var(--flch-color-gold) 0%,
        var(--flch-color-gold-light) 50%,
        transparent 100%);
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: left;
    animation: lineExpand 1s var(--flch-ease-out-expo) 0.8s forwards;
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

/* ===== DESCRIPCIÓN ===== */
.flch-hero__description-wrapper {
    margin-bottom: 2.5rem;
    max-width: 600px;
    opacity: 0;
    animation: fadeIn 1s var(--flch-ease-smooth) 1s forwards;
}

.flch-hero__description {
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.9);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.flch-hero__description-highlight {
    display: inline-block;
    color: var(--flch-color-gold);
    font-weight: 500;
    position: relative;
    padding: 0 0.2rem;
    background: linear-gradient(120deg, 
        transparent 0%,
        var(--flch-color-gold-dim) 30%,
        var(--flch-color-gold-dim) 70%,
        transparent 100%);
    animation: highlightGlow 3s infinite;
}

/* ===== BOTONES PREMIUM ===== */
.flch-hero__actions-group {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
}

.flch-hero__actions {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.flch-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.9rem 2.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    text-decoration: none;
    border: none;
    border-radius: 0;
    cursor: pointer;
    transition: all 0.4s var(--flch-ease-out-expo);
    overflow: hidden;
    opacity: 0;
    animation: buttonAppear 0.8s var(--flch-ease-out-back) 1.2s forwards;
}

.flch-btn:nth-child(2) {
    animation-delay: 1.3s;
}

.flch-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.8s, height 0.8s;
}

.flch-btn:hover::before {
    width: 400px;
    height: 400px;
}

.flch-btn__text {
    position: relative;
    z-index: 2;
}

.flch-btn__icon {
    position: relative;
    z-index: 2;
    transition: transform 0.3s var(--flch-ease-out-expo);
}

.flch-btn:hover .flch-btn__icon {
    transform: translateX(5px);
}

.flch-btn__glow {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, 
        transparent,
        rgba(255, 255, 255, 0.8),
        transparent);
    transform: translateX(-100%);
    transition: transform 0.6s var(--flch-ease-out-expo);
}

.flch-btn:hover .flch-btn__glow {
    transform: translateX(100%);
}

/* Botón primario */
.flch-btn--primary {
    background: linear-gradient(135deg, 
        var(--flch-color-gold) 0%,
        var(--flch-color-gold-light) 100%);
    color: var(--flch-color-primary);
    box-shadow: var(--flch-shadow-gold);
}

.flch-btn--primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(198, 164, 63, 0.4);
}

/* Botón secundario */
.flch-btn--secondary {
    background: transparent;
    color: var(--flch-color-white);
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(5px);
}

.flch-btn--secondary:hover {
    background: var(--flch-color-white);
    color: var(--flch-color-primary);
    border-color: var(--flch-color-white);
    transform: translateY(-3px);
    box-shadow: var(--flch-shadow-md);
}

/* ===== SCROLL INDICATOR ===== */
.flch-hero__scroll-indicator {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    opacity: 0;
    animation: fadeIn 1s var(--flch-ease-smooth) 1.5s forwards;
}

.flch-hero__scroll-text {
    font-size: 0.8rem;
    font-weight: 400;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
}

.flch-hero__scroll-line {
    width: 100px;
    height: 1px;
    background: rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
}

.flch-hero__scroll-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--flch-color-gold);
    transform: translateX(-100%);
    animation: scrollProgress 2.5s infinite;
}

/* ===== ELEMENTOS FLOTANTES ===== */
.flch-hero__floating-elements {
    position: absolute;
    inset: 0;
    z-index: 15;
    pointer-events: none;
    overflow: hidden;
}

.flch-hero__floating-circle {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, 
        rgba(198, 164, 63, 0.1) 0%,
        transparent 70%);
    animation: float 20s infinite linear;
}

.flch-hero__floating-circle--1 {
    width: 300px;
    height: 300px;
    top: 10%;
    right: -100px;
    animation-duration: 25s;
}

.flch-hero__floating-circle--2 {
    width: 500px;
    height: 500px;
    bottom: -200px;
    left: -200px;
    animation-duration: 35s;
    animation-direction: reverse;
}

.flch-hero__floating-circle--3 {
    width: 200px;
    height: 200px;
    top: 40%;
    right: 20%;
    animation-duration: 15s;
    opacity: 0.3;
}

/* ===== ANIMACIONES ===== */
@keyframes containerFadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes sealAppear {
    from {
        opacity: 0;
        transform: translateX(-50px) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

@keyframes slideUp {
    to {
        transform: translateY(0);
    }
}

@keyframes slideUpWord {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes lineExpand {
    to {
        transform: scaleX(1);
    }
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

@keyframes buttonAppear {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scrollProgress {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(0); }
    100% { transform: translateX(100%); }
}

@keyframes lightSweep {
    0% { transform: translateX(-100%); }
    20% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

@keyframes float {
    from { transform: rotate(0deg) translate(0, 0); }
    to { transform: rotate(360deg) translate(50px, 50px); }
}

@keyframes rotateSlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

@keyframes highlightGlow {
    0% { filter: brightness(1); }
    50% { filter: brightness(1.2); }
    100% { filter: brightness(1); }
}

/* ===== RESPONSIVE AVANZADO ===== */
@media (max-width: 1024px) {
    .flch-hero__floating-elements {
        opacity: 0.3;
    }
}

@media (max-width: 768px) {
    .flch-hero-premium {
        min-height: 600px;
    }
    
    .flch-hero__seal {
        margin-bottom: 1.5rem;
        padding: 0.4rem 1.5rem 0.4rem 1rem;
    }
    
    .flch-hero__title-word {
        font-size: clamp(2rem, 7vw, 3.5rem);
    }
    
    .flch-hero__accent-line {
        margin: 1.5rem 0;
    }
    
    .flch-hero__actions-group {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
    }
    
    .flch-hero__actions {
        gap: 1rem;
    }
    
    .flch-btn {
        padding: 0.7rem 2rem;
        font-size: 0.8rem;
    }
    
    .flch-hero__scroll-indicator {
        display: none;
    }
    
    .flch-hero__divider-inner {
        transform: skewY(-2.5deg) translateY(25px);
    }
}

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