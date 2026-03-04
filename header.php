<?php
/**
 * Template part: Hero section premium con diseño cinematográfico
 * Versión mejorada con namespace exclusivo para evitar conflictos
 * 
 * @package LetrasFLCH
 */
?>

<!-- Hero Section Premium - Namespace exclusivo: flch-hero-v2 -->
<section class="flch-hero-v2" aria-label="Hero principal con experiencia cinematográfica">
    
    <!-- Slideshow container -->
    <div class="flch-hero-v2__media" id="heroMediaV2">
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
        ?>
            <div class="flch-hero-v2__slide <?php echo $is_active ? 'is-active' : ''; ?>" 
                 data-slide-index="<?php echo $index; ?>"
                 role="img" 
                 aria-label="<?php echo esc_attr($slide[1]); ?>"
                 style="background-image: url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/<?php echo $slide[0]; ?>');">
            </div>
        <?php endforeach; ?>
        
        <!-- Overlays -->
        <div class="flch-hero-v2__overlay-base"></div>
        <div class="flch-hero-v2__overlay-gradient"></div>
        <div class="flch-hero-v2__overlay-vignette"></div>
        <div class="flch-hero-v2__texture" aria-hidden="true"></div>
        <div class="flch-hero-v2__light-sweep" aria-hidden="true"></div>
    </div>
    
    <!-- Divisor inferior -->
    <div class="flch-hero-v2__divider" aria-hidden="true">
        <div class="flch-hero-v2__divider-inner"></div>
    </div>
    
    <!-- Contenido principal -->
    <div class="flch-hero-v2__content">
        <div class="flch-hero-v2__container">
            
            <!-- Badge -->
            <div class="flch-hero-v2__seal">
                <div class="flch-hero-v2__seal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="flch-hero-v2__seal-text">UNMSM · EST. 1551</span>
            </div>
            
            <!-- Título -->
            <h1 class="flch-hero-v2__title">
                <span class="flch-hero-v2__title-line">
                    <span class="flch-hero-v2__title-prefix">Facultad de</span>
                </span>
                <span class="flch-hero-v2__title-line flch-hero-v2__title-line--main">
                    <span class="flch-hero-v2__title-word">Letras</span>
                    <span class="flch-hero-v2__title-word">&</span>
                    <span class="flch-hero-v2__title-word">Ciencias</span>
                </span>
                <span class="flch-hero-v2__title-line flch-hero-v2__title-line--main">
                    <span class="flch-hero-v2__title-word">Humanas</span>
                </span>
            </h1>
            
            <!-- Línea decorativa -->
            <div class="flch-hero-v2__accent-line">
                <div class="flch-hero-v2__accent-line-inner"></div>
            </div>
            
            <!-- Descripción -->
            <div class="flch-hero-v2__description-wrapper">
                <p class="flch-hero-v2__description">
                    <span class="flch-hero-v2__description-text">
                        Bienvenidos al portal oficial de la Facultad de Letras y Ciencias Humanas 
                        de la Universidad Nacional Mayor de San Marcos, 
                    </span>
                    <span class="flch-hero-v2__description-highlight">
                        casa de estudios de nuestro premio nobel Mario Vargas Llosa
                    </span>
                    <span class="flch-hero-v2__description-text">
                        y de reconocidas eminencias en el ámbito académico y cultural del Perú.
                    </span>
                </p>
            </div>
            
            <!-- Acciones -->
            <div class="flch-hero-v2__actions-group">
                <div class="flch-hero-v2__actions">
                    <a href="https://ceidletras.unmsm.edu.pe/" 
                       class="flch-hero-v2__btn flch-hero-v2__btn--primary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-hero-v2__btn-text">CEID · Investigación</span>
                        <span class="flch-hero-v2__btn-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none"/>
                            </svg>
                        </span>
                        <span class="flch-hero-v2__btn-glow"></span>
                    </a>
                    
                    <a href="https://posgradoletras.unmsm.edu.pe/" 
                       class="flch-hero-v2__btn flch-hero-v2__btn--secondary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-hero-v2__btn-text">Posgrado</span>
                        <span class="flch-hero-v2__btn-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </span>
                        <span class="flch-hero-v2__btn-glow"></span>
                    </a>
                </div>
                
                <!-- Scroll indicator -->
                <div class="flch-hero-v2__scroll-indicator" aria-hidden="true">
                    <span class="flch-hero-v2__scroll-text">Explorar</span>
                    <div class="flch-hero-v2__scroll-line">
                        <div class="flch-hero-v2__scroll-progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Elementos decorativos -->
    <div class="flch-hero-v2__floating-elements" aria-hidden="true">
        <div class="flch-hero-v2__floating-circle flch-hero-v2__floating-circle--1"></div>
        <div class="flch-hero-v2__floating-circle flch-hero-v2__floating-circle--2"></div>
        <div class="flch-hero-v2__floating-circle flch-hero-v2__floating-circle--3"></div>
    </div>
</section>

<!-- JavaScript -->
<script>
(function() {
    'use strict';
    
    // Configuración
    const CONFIG = {
        slideDuration: 5800,
        transitionDuration: 2800,
        parallaxIntensity: 0.08,
        autoplay: true
    };
    
    class HeroSliderV2 {
        constructor() {
            this.slides = document.querySelectorAll('.flch-hero-v2__slide');
            this.hero = document.querySelector('.flch-hero-v2');
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
        }
        
        setInitialState() {
            this.slides.forEach((slide, index) => {
                slide.style.opacity = '0';
                slide.style.zIndex = '1';
                slide.style.transition = `opacity ${CONFIG.transitionDuration}ms cubic-bezier(0.645, 0.045, 0.355, 1)`;
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
        }
        
        transitionToNext() {
            if (this.isTransitioning) return;
            
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
    }
    
    // Inicializar
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => new HeroSliderV2());
    } else {
        new HeroSliderV2();
    }
})();
</script>

<!-- CSS - Namespace completo y selectores específicos -->
<style>
/* ===== HERO V2 - ESTILOS INDEPENDIENTES ===== */
/* 
 * Todos los selectores usan el prefijo .flch-hero-v2
 * Sin !important para no forzar conflictos
 * Variables locales con namespace
 */

.flch-hero-v2 {
    --flch-v2-primary: #0A1A35;
    --flch-v2-primary-light: #1A2A45;
    --flch-v2-primary-dark: #051020;
    --flch-v2-gold: #C6A43F;
    --flch-v2-gold-light: #DAB95C;
    --flch-v2-gold-dark: #9A7E2F;
    --flch-v2-gold-dim: rgba(198, 164, 63, 0.15);
    --flch-v2-white: #FFFFFF;
    --flch-v2-offwhite: #F8F6F2;
    --flch-v2-overlay-deep: rgba(5, 16, 32, 0.85);
    --flch-v2-overlay-medium: rgba(10, 26, 53, 0.65);
    
    position: relative;
    width: 100%;
    height: min(90vh, 900px);
    min-height: 650px;
    overflow: hidden;
    background-color: var(--flch-v2-primary);
    color: var(--flch-v2-white);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    isolation: isolate; /* Aísla el contexto de stacking */
}

/* Media container */
.flch-hero-v2__media {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 110%;
}

.flch-hero-v2__slide {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: brightness(0.65) saturate(1.2);
    will-change: opacity;
    opacity: 0;
    z-index: 1;
}

.flch-hero-v2__slide.is-active {
    opacity: 1;
    z-index: 5;
}

/* Overlays */
.flch-hero-v2__overlay-base {
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg, 
        var(--flch-v2-overlay-deep) 0%,
        var(--flch-v2-overlay-medium) 40%,
        transparent 80%);
    z-index: 10;
    pointer-events: none;
}

.flch-hero-v2__overlay-gradient {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 50%, 
        transparent 0%,
        var(--flch-v2-overlay-deep) 100%);
    opacity: 0.6;
    z-index: 11;
    pointer-events: none;
}

.flch-hero-v2__overlay-vignette {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, 
        transparent 30%,
        rgba(0, 0, 0, 0.4) 100%);
    z-index: 12;
    pointer-events: none;
}

.flch-hero-v2__texture {
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

.flch-hero-v2__light-sweep {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg,
        transparent 0%,
        rgba(255, 255, 255, 0.03) 50%,
        transparent 100%);
    transform: translateX(-100%);
    animation: flch-v2-lightSweep 12s infinite;
    z-index: 14;
    pointer-events: none;
}

/* Divisor */
.flch-hero-v2__divider {
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 70px;
    z-index: 30;
    pointer-events: none;
    overflow: hidden;
}

.flch-hero-v2__divider-inner {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(175deg, 
        transparent 0%,
        rgba(255, 255, 255, 0.9) 30%,
        var(--flch-v2-white) 80%);
    transform: skewY(-1.8deg) translateY(30px);
    transform-origin: left;
    box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.15);
    border-bottom: 2px solid var(--flch-v2-gold);
}

/* Contenido */
.flch-hero-v2__content {
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

.flch-hero-v2__container {
    max-width: 750px;
    animation: flch-v2-containerFadeIn 1.2s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Seal */
.flch-hero-v2__seal {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 2.5rem;
    padding: 0.5rem 2rem 0.5rem 1.5rem;
    background: linear-gradient(90deg, 
        var(--flch-v2-gold-dim) 0%,
        transparent 100%);
    border-left: 3px solid var(--flch-v2-gold);
    border-radius: 0 30px 30px 0;
    transform-origin: left;
    animation: flch-v2-sealAppear 1s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.flch-hero-v2__seal-icon {
    color: var(--flch-v2-gold);
    animation: flch-v2-rotateSlow 20s infinite linear;
}

.flch-hero-v2__seal-text {
    font-size: clamp(0.7rem, 1.5vw, 0.85rem);
    font-weight: 500;
    letter-spacing: 0.2em;
    color: var(--flch-v2-gold-light);
    text-transform: uppercase;
}

/* Título */
.flch-hero-v2__title {
    margin-bottom: 1.5rem;
}

.flch-hero-v2__title-line {
    display: block;
    overflow: hidden;
}

.flch-hero-v2__title-line--main {
    margin-top: -0.2em;
}

.flch-hero-v2__title-prefix {
    display: block;
    font-family: 'Cormorant Garamond', 'Times New Roman', serif;
    font-size: clamp(1.2rem, 3vw, 1.8rem);
    font-weight: 400;
    letter-spacing: 0.15em;
    color: var(--flch-v2-gold-light);
    text-transform: uppercase;
    transform: translateY(100%);
    animation: flch-v2-slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
}

.flch-hero-v2__title-word {
    display: inline-block;
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    color: var(--flch-v2-white);
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(100%);
    opacity: 0;
    animation: flch-v2-slideUpWord 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

.flch-hero-v2__title-word:nth-child(1) { animation-delay: 0.3s; }
.flch-hero-v2__title-word:nth-child(2) { animation-delay: 0.4s; }
.flch-hero-v2__title-word:nth-child(3) { animation-delay: 0.5s; }
.flch-hero-v2__title-word:nth-child(4) { animation-delay: 0.6s; }

/* Línea decorativa */
.flch-hero-v2__accent-line {
    width: 120px;
    height: 3px;
    margin: 2rem 0 2rem 0;
    background: linear-gradient(90deg, 
        var(--flch-v2-gold) 0%,
        var(--flch-v2-gold-light) 50%,
        transparent 100%);
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: left;
    animation: flch-v2-lineExpand 1s cubic-bezier(0.16, 1, 0.3, 1) 0.8s forwards;
}

.flch-hero-v2__accent-line-inner {
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%,
        rgba(255, 255, 255, 0.5) 50%,
        transparent 100%);
    animation: flch-v2-shimmer 3s infinite;
}

/* Descripción */
.flch-hero-v2__description-wrapper {
    margin-bottom: 2.5rem;
    max-width: 600px;
    opacity: 0;
    animation: flch-v2-fadeIn 1s cubic-bezier(0.4, 0, 0.2, 1) 1s forwards;
}

.flch-hero-v2__description {
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.9);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.flch-hero-v2__description-highlight {
    display: inline-block;
    color: var(--flch-v2-gold);
    font-weight: 500;
    position: relative;
    padding: 0 0.2rem;
    background: linear-gradient(120deg, 
        transparent 0%,
        var(--flch-v2-gold-dim) 30%,
        var(--flch-v2-gold-dim) 70%,
        transparent 100%);
}

/* Botones */
.flch-hero-v2__actions-group {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
}

.flch-hero-v2__actions {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.flch-hero-v2__btn {
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
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
    opacity: 0;
    animation: flch-v2-buttonAppear 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 1.2s forwards;
}

.flch-hero-v2__btn:nth-child(2) {
    animation-delay: 1.3s;
}

.flch-hero-v2__btn::before {
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

.flch-hero-v2__btn:hover::before {
    width: 400px;
    height: 400px;
}

.flch-hero-v2__btn-text {
    position: relative;
    z-index: 2;
}

.flch-hero-v2__btn-icon {
    position: relative;
    z-index: 2;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.flch-hero-v2__btn:hover .flch-hero-v2__btn-icon {
    transform: translateX(5px);
}

.flch-hero-v2__btn-glow {
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
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.flch-hero-v2__btn:hover .flch-hero-v2__btn-glow {
    transform: translateX(100%);
}

.flch-hero-v2__btn--primary {
    background: linear-gradient(135deg, 
        var(--flch-v2-gold) 0%,
        var(--flch-v2-gold-light) 100%);
    color: var(--flch-v2-primary);
    box-shadow: 0 10px 30px rgba(198, 164, 63, 0.25);
}

.flch-hero-v2__btn--primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(198, 164, 63, 0.4);
}

.flch-hero-v2__btn--secondary {
    background: transparent;
    color: var(--flch-v2-white);
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(5px);
}

.flch-hero-v2__btn--secondary:hover {
    background: var(--flch-v2-white);
    color: var(--flch-v2-primary);
    border-color: var(--flch-v2-white);
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

/* Scroll indicator */
.flch-hero-v2__scroll-indicator {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    opacity: 0;
    animation: flch-v2-fadeIn 1s cubic-bezier(0.4, 0, 0.2, 1) 1.5s forwards;
}

.flch-hero-v2__scroll-text {
    font-size: 0.8rem;
    font-weight: 400;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
}

.flch-hero-v2__scroll-line {
    width: 100px;
    height: 1px;
    background: rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
}

.flch-hero-v2__scroll-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--flch-v2-gold);
    transform: translateX(-100%);
    animation: flch-v2-scrollProgress 2.5s infinite;
}

/* Elementos flotantes */
.flch-hero-v2__floating-elements {
    position: absolute;
    inset: 0;
    z-index: 15;
    pointer-events: none;
    overflow: hidden;
}

.flch-hero-v2__floating-circle {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, 
        rgba(198, 164, 63, 0.1) 0%,
        transparent 70%);
    animation: flch-v2-float 20s infinite linear;
}

.flch-hero-v2__floating-circle--1 {
    width: 300px;
    height: 300px;
    top: 10%;
    right: -100px;
    animation-duration: 25s;
}

.flch-hero-v2__floating-circle--2 {
    width: 500px;
    height: 500px;
    bottom: -200px;
    left: -200px;
    animation-duration: 35s;
    animation-direction: reverse;
}

.flch-hero-v2__floating-circle--3 {
    width: 200px;
    height: 200px;
    top: 40%;
    right: 20%;
    animation-duration: 15s;
    opacity: 0.3;
}

/* ===== ANIMACIONES CON NAMESPACE ===== */
@keyframes flch-v2-containerFadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes flch-v2-sealAppear {
    from {
        opacity: 0;
        transform: translateX(-50px) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

@keyframes flch-v2-slideUp {
    to {
        transform: translateY(0);
    }
}

@keyframes flch-v2-slideUpWord {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes flch-v2-lineExpand {
    to {
        transform: scaleX(1);
    }
}

@keyframes flch-v2-fadeIn {
    to {
        opacity: 1;
    }
}

@keyframes flch-v2-buttonAppear {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes flch-v2-scrollProgress {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(0); }
    100% { transform: translateX(100%); }
}

@keyframes flch-v2-lightSweep {
    0% { transform: translateX(-100%); }
    20% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

@keyframes flch-v2-float {
    from { transform: rotate(0deg) translate(0, 0); }
    to { transform: rotate(360deg) translate(50px, 50px); }
}

@keyframes flch-v2-rotateSlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes flch-v2-shimmer {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .flch-hero-v2__floating-elements {
        opacity: 0.3;
    }
}

@media (max-width: 768px) {
    .flch-hero-v2 {
        min-height: 600px;
    }
    
    .flch-hero-v2__seal {
        margin-bottom: 1.5rem;
        padding: 0.4rem 1.5rem 0.4rem 1rem;
    }
    
    .flch-hero-v2__title-word {
        font-size: clamp(2rem, 7vw, 3.5rem);
    }
    
    .flch-hero-v2__accent-line {
        margin: 1.5rem 0;
    }
    
    .flch-hero-v2__actions-group {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
    }
    
    .flch-hero-v2__actions {
        gap: 1rem;
    }
    
    .flch-hero-v2__btn {
        padding: 0.7rem 2rem;
        font-size: 0.8rem;
    }
    
    .flch-hero-v2__scroll-indicator {
        display: none;
    }
    
    .flch-hero-v2__divider-inner {
        transform: skewY(-2.5deg) translateY(25px);
    }
}

/* Respetar preferencias de movimiento */
@media (prefers-reduced-motion: reduce) {
    .flch-hero-v2 *,
    .flch-hero-v2 *::before,
    .flch-hero-v2 *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>