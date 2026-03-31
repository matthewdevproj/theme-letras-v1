<?php
/**
 * Template part: Hero section cinematográfico para FLCH — v2
 *
 * Mejoras v2:
 *  - Ken Burns effect por slide (zoom sutil)
 *  - Dots de navegación clicables
 *  - Navegación por teclado (← →) y swipe táctil
 *  - IntersectionObserver: pausa fuera del viewport
 *  - will-change solo activo durante transición
 *  - prefers-reduced-motion completo
 *  - Breakpoints mobile refinados
 *  - Badge con pulse accesible
 *
 * @package LetrasFLCH
 */
?>

<section class="flch-hero" id="flchHero" aria-label="Hero principal — Facultad de Letras y Ciencias Humanas">

    <!-- ── SLIDESHOW ──────────────────────────────────────────── -->
    <div class="flch-hero__slideshow" id="heroSlideshow" aria-live="off">
        <?php
        $slides = [
            ['image' => 'DJI_0007-Trim-frame-at-0m5s.jpg',  'alt' => 'Vista aérea del campus universitario',   'title' => 'Campus Universitario'],
            ['image' => 'DJI_0018-Trim-frame-at-0m2s.jpg',  'alt' => 'Arquitectura histórica de San Marcos',   'title' => 'Arquitectura Histórica'],
            ['image' => 'IMG_1565-scaled.jpg',               'alt' => 'Estudiantes en la biblioteca central',   'title' => 'Biblioteca Central'],
            ['image' => 'IMG_1561-scaled.jpg',               'alt' => 'Actividades académicas',                 'title' => 'Vida Académica'],
            ['image' => 'IMG_1556-scaled.jpg',               'alt' => 'Ceremonia institucional',                'title' => 'Ceremonias'],
        ];
        $base = 'https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/';

        foreach ($slides as $i => $s) :
            $active   = $i === 0 ? ' is-active' : '';
            $loading  = $i === 0 ? 'eager' : 'lazy';
            $priority = $i === 0 ? 'high'  : 'low';
        ?>
        <div class="flch-hero__slide<?php echo $active; ?>"
             data-slide-index="<?php echo $i; ?>"
             role="img"
             aria-label="<?php echo esc_attr($s['alt']); ?>"
             style="background-image:url('<?php echo $base . $s['image']; ?>')">
            <img src="<?php echo $base . $s['image']; ?>"
                 alt="<?php echo esc_attr($s['alt']); ?>"
                 class="flch-hero__slide-img"
                 loading="<?php echo $loading; ?>"
                 fetchpriority="<?php echo $priority; ?>">
        </div>
        <?php endforeach; ?>

        <!-- Overlays -->
        <div class="flch-hero__overlay flch-hero__overlay--base"     aria-hidden="true"></div>
        <div class="flch-hero__overlay flch-hero__overlay--gradient" aria-hidden="true"></div>
        <div class="flch-hero__overlay flch-hero__overlay--vignette" aria-hidden="true"></div>
        <div class="flch-hero__texture"                              aria-hidden="true"></div>
        <div class="flch-hero__light-sweep"                          aria-hidden="true"></div>
    </div>

    <!-- ── DOTS DE NAVEGACIÓN ────────────────────────────────── -->
    <nav class="flch-hero__dots" aria-label="Navegación de diapositivas">
        <?php foreach ($slides as $i => $s) : ?>
        <button class="flch-hero__dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
                data-index="<?php echo $i; ?>"
                aria-label="Ir a diapositiva <?php echo $i + 1; ?>: <?php echo esc_attr($s['title']); ?>"
                aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                type="button"></button>
        <?php endforeach; ?>
    </nav>

    <!-- ── DIVISOR ───────────────────────────────────────────── -->
    <div class="flch-hero__divider" aria-hidden="true">
        <div class="flch-hero__divider-inner"></div>
    </div>

    <!-- ── CONTENIDO ─────────────────────────────────────────── -->
    <div class="flch-hero__content">
        <div class="flch-hero__container">

            <!-- Badge -->
            <div class="flch-hero__badge" aria-label="Universidad Nacional Mayor de San Marcos, fundada en 1551, Decana de América">
                <span class="flch-hero__badge-pulse" aria-hidden="true"></span>
                <svg class="flch-hero__badge-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <span class="flch-hero__badge-text">UNMSM · 1551 · DECANA DE AMÉRICA</span>
            </div>

            <!-- Título -->
            <h1 class="flch-hero__title">
                <span class="flch-hero__title-prefix">Facultad de</span>
                <span class="flch-hero__title-main">
                    <span class="flch-hero__title-line">
                        <span class="flch-hero__title-word">Letras</span>
                        <span class="flch-hero__title-word">&amp;</span>
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

            <!-- Descripción -->
            <div class="flch-hero__description-wrapper">
                <p class="flch-hero__description">
                    <span class="flch-hero__description-text">
                        Bienvenidos al portal oficial de la Facultad de Letras y Ciencias Humanas
                        de la Universidad Nacional Mayor de San Marcos,&nbsp;
                    </span><span class="flch-hero__description-highlight">casa de estudios de nuestro premio nobel Mario Vargas Llosa</span><span class="flch-hero__description-text">
                        &nbsp;y de reconocidas eminencias en el ámbito académico y cultural del Perú.
                    </span>
                </p>
            </div>

            <!-- Acciones -->
            <div class="flch-hero__actions">
                <div class="flch-hero__buttons">
                    <a href="https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/"
                       class="flch-btn flch-btn--primary"
                       target="_blank"
                       rel="noopener noreferrer">
                        <span class="flch-btn__text">Examen de Suficiencia</span>
                        <span class="flch-btn__badge">Idiomas</span>
                        <span class="flch-btn__icon" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>

                <!-- Scroll indicator -->
                <div class="flch-hero__scroll" aria-hidden="true">
                    <span class="flch-hero__scroll-text">Descubrir</span>
                    <div class="flch-hero__scroll-line">
                        <div class="flch-hero__scroll-progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elementos flotantes decorativos -->
    <div class="flch-hero__floating" aria-hidden="true">
        <div class="flch-hero__floating-circle flch-hero__floating-circle--1"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--2"></div>
        <div class="flch-hero__floating-circle flch-hero__floating-circle--3"></div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════
     JAVASCRIPT MODULAR — v2
     Mejoras: dots, teclado, swipe, IntersectionObserver,
               will-change controlado, reducedMotion
════════════════════════════════════════════════════════════════ -->
<script>
(function () {
    'use strict';

    const CFG = {
        slideDuration:      6000,
        transitionDuration: 2000,
        autoplay:           true,
        pauseOnHover:       true,
        kenBurnsScale:      1.06,   // zoom sutil Ken Burns
    };

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    class HeroSlider {
        constructor() {
            this.hero       = document.getElementById('flchHero');
            this.slides     = Array.from(document.querySelectorAll('.flch-hero__slide'));
            this.dots       = Array.from(document.querySelectorAll('.flch-hero__dot'));
            this.current    = 0;
            this.timer      = null;
            this.busy       = false;
            this.startX     = 0;

            if (!this.slides.length) return;
            this.init();
        }

        init() {
            this.applyState(0, true);
            this.bindDots();
            this.bindKeyboard();
            this.bindSwipe();
            this.bindHover();
            this.bindVisibility();
            this.bindIntersection();
            if (CFG.autoplay && !reduced) this.play();
            this.preload();
        }

        /* ── Estado visual ───────────────────────────────────── */
        applyState(idx, instant = false) {
            const dur = reduced || instant ? 0 : CFG.transitionDuration;

            this.slides.forEach((sl, i) => {
                const active = i === idx;
                sl.style.transition  = `opacity ${dur}ms cubic-bezier(0.4,0,0.2,1)`;
                sl.style.opacity     = active ? '1' : '0';
                sl.style.zIndex      = active ? '5' : '1';
                sl.classList.toggle('is-active', active);

                /* Ken Burns: activa will-change + animación solo en slide activo */
                if (!reduced) {
                    if (active) {
                        sl.style.willChange = 'opacity, transform';
                        sl.style.animation  = `kenBurns ${CFG.slideDuration + CFG.transitionDuration}ms ease-out forwards`;
                    } else {
                        /* limpiar tras fade-out */
                        setTimeout(() => {
                            sl.style.willChange = 'auto';
                            sl.style.animation  = 'none';
                            sl.style.transform  = 'scale(1)';
                        }, dur);
                    }
                }
            });

            this.dots.forEach((d, i) => {
                const active = i === idx;
                d.classList.toggle('is-active', active);
                d.setAttribute('aria-current', active ? 'true' : 'false');
            });
        }

        /* ── Transición ──────────────────────────────────────── */
        go(idx) {
            if (this.busy || idx === this.current) return;
            this.busy    = true;
            this.current = (idx + this.slides.length) % this.slides.length;
            this.applyState(this.current);
            setTimeout(() => { this.busy = false; }, CFG.transitionDuration);
        }

        next() { this.go(this.current + 1); }
        prev() { this.go(this.current - 1); }

        /* ── Autoplay ────────────────────────────────────────── */
        play() {
            this.stop();
            this.timer = setInterval(() => this.next(), CFG.slideDuration);
        }
        stop() { clearInterval(this.timer); this.timer = null; }

        /* ── Dots ────────────────────────────────────────────── */
        bindDots() {
            this.dots.forEach(d => {
                d.addEventListener('click', () => {
                    this.go(+d.dataset.index);
                    if (CFG.autoplay && !reduced) { this.stop(); this.play(); }
                });
            });
        }

        /* ── Teclado ─────────────────────────────────────────── */
        bindKeyboard() {
            document.addEventListener('keydown', e => {
                if (!this.hero.matches(':hover') && document.activeElement?.closest('.flch-hero__dots') === null) return;
                if (e.key === 'ArrowRight') { this.next(); this.stop(); if (CFG.autoplay && !reduced) this.play(); }
                if (e.key === 'ArrowLeft')  { this.prev(); this.stop(); if (CFG.autoplay && !reduced) this.play(); }
            });
        }

        /* ── Swipe táctil ────────────────────────────────────── */
        bindSwipe() {
            if (!this.hero) return;
            this.hero.addEventListener('touchstart', e => { this.startX = e.touches[0].clientX; }, { passive: true });
            this.hero.addEventListener('touchend', e => {
                const dx = e.changedTouches[0].clientX - this.startX;
                if (Math.abs(dx) < 40) return;
                dx < 0 ? this.next() : this.prev();
                this.stop();
                if (CFG.autoplay && !reduced) this.play();
            }, { passive: true });
        }

        /* ── Hover ───────────────────────────────────────────── */
        bindHover() {
            if (!CFG.pauseOnHover || !this.hero) return;
            this.hero.addEventListener('mouseenter', () => this.stop());
            this.hero.addEventListener('mouseleave', () => { if (CFG.autoplay && !reduced) this.play(); });
        }

        /* ── Visibilidad de pestaña ──────────────────────────── */
        bindVisibility() {
            document.addEventListener('visibilitychange', () => {
                document.hidden ? this.stop() : (CFG.autoplay && !reduced && this.play());
            });
        }

        /* ── IntersectionObserver: pausa fuera de pantalla ───── */
        bindIntersection() {
            if (!('IntersectionObserver' in window) || !this.hero) return;
            new IntersectionObserver(entries => {
                entries[0].isIntersecting
                    ? (CFG.autoplay && !reduced && this.play())
                    : this.stop();
            }, { threshold: 0.25 }).observe(this.hero);
        }

        /* ── Preload idle ────────────────────────────────────── */
        preload() {
            const run = () => {
                this.slides.forEach(sl => {
                    const img = sl.querySelector('.flch-hero__slide-img');
                    if (img?.src && !img.complete) {
                        const lnk = document.createElement('link');
                        lnk.rel = 'preload'; lnk.as = 'image'; lnk.href = img.src;
                        document.head.appendChild(lnk);
                    }
                });
            };
            'requestIdleCallback' in window ? requestIdleCallback(run) : setTimeout(run, 2000);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => new HeroSlider());
    } else {
        new HeroSlider();
    }
})();
</script>


<!-- ══════════════════════════════════════════════════════════════
     CSS — v2
════════════════════════════════════════════════════════════════ -->
<style>
/* ── Variables ────────────────────────────────────────────── */
:root {
    --flch-primary:        #0A1E3C;
    --flch-primary-light:  #143B63;
    --flch-primary-dark:   #051020;

    --flch-gold:           #C6A43F;
    --flch-gold-light:     #DAB95C;
    --flch-gold-dark:      #9A7E2F;
    --flch-gold-dim:       rgba(198,164,63,.15);
    --flch-gold-dim-hover: rgba(198,164,63,.25);

    --flch-white:          #fff;
    --flch-w90:            rgba(255,255,255,.9);
    --flch-w80:            rgba(255,255,255,.8);
    --flch-w60:            rgba(255,255,255,.6);
    --flch-w40:            rgba(255,255,255,.4);
    --flch-w20:            rgba(255,255,255,.2);
    --flch-w10:            rgba(255,255,255,.1);

    --flch-over-deep:   rgba(5,16,32,.85);
    --flch-over-mid:    rgba(10,26,53,.70);
    --flch-over-light:  rgba(10,26,53,.40);

    --flch-shadow-gold: 0 10px 30px rgba(198,164,63,.30);
    --flch-shadow-md:   0  8px 30px rgba(0,0,0,.20);

    --flch-font-ui:   'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    --flch-font-disp: 'Cormorant Garamond', 'Times New Roman', serif;

    --flch-ease:     cubic-bezier(0.4,0,0.2,1);
    --flch-ease-out: cubic-bezier(0,0,0.2,1);
}

/* ── Hero container ───────────────────────────────────────── */
.flch-hero {
    position:        relative;
    width:           100%;
    height:          min(90vh, 900px);
    min-height:      650px;
    overflow:        hidden;
    background:      var(--flch-primary);
    color:           var(--flch-white);
    font-family:     var(--flch-font-ui);
    isolation:       isolate;
}

/* ── Slideshow ────────────────────────────────────────────── */
.flch-hero__slideshow {
    position: absolute;
    inset:    0;
    z-index:  1;
}

.flch-hero__slide {
    position:            absolute;
    inset:               0;
    background-size:     cover;
    background-position: center;
    background-repeat:   no-repeat;
    opacity:             0;
    z-index:             1;
    transform:           scale(1); /* reset entre slides */
}
.flch-hero__slide::after {
    content:  '';
    position: absolute;
    inset:    0;
    background: rgba(0,0,0,.25);
    z-index:  2;
}

/* imagen oculta — solo para SEO/preload */
.flch-hero__slide-img {
    position: absolute;
    width: 1px; height: 1px;
    overflow: hidden; clip: rect(0,0,0,0);
    white-space: nowrap; border: 0;
}

/* Ken Burns: zoom sutil en slide activo */
@keyframes kenBurns {
    from { transform: scale(1); }
    to   { transform: scale(1.06); }
}

/* ── Overlays ─────────────────────────────────────────────── */
.flch-hero__overlay {
    position:       absolute;
    inset:          0;
    pointer-events: none;
    z-index:        5;
}
.flch-hero__overlay--base {
    background: linear-gradient(105deg,
        var(--flch-over-deep)  0%,
        var(--flch-over-mid)  40%,
        transparent           80%);
}
.flch-hero__overlay--gradient {
    background: radial-gradient(circle at 30% 50%,
        transparent 0%, var(--flch-over-deep) 100%);
    opacity: .55;
}
.flch-hero__overlay--vignette {
    background: radial-gradient(circle at 50% 50%,
        transparent 30%, rgba(0,0,0,.40) 100%);
}

/* ── Textura + luz ────────────────────────────────────────── */
.flch-hero__texture {
    position:        absolute;
    inset:           0;
    background-image: repeating-linear-gradient(45deg,
        rgba(255,255,255,.018) 0, rgba(255,255,255,.018) 2px,
        transparent 2px, transparent 8px);
    background-size: 30px 30px;
    pointer-events:  none;
    z-index:         6;
    opacity:         .3;
}
.flch-hero__light-sweep {
    position:   absolute;
    inset:      0;
    background: linear-gradient(90deg,
        transparent 0%, rgba(255,255,255,.03) 50%, transparent 100%);
    transform:      translateX(-100%);
    animation:      lightSweep 14s infinite;
    pointer-events: none;
    z-index:        7;
}

/* ── Divisor ──────────────────────────────────────────────── */
.flch-hero__divider {
    position: absolute;
    bottom: -2px; left: 0; right: 0;
    height: 70px;
    z-index: 20;
    pointer-events: none;
    overflow: hidden;
}
.flch-hero__divider-inner {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height:  100%;
    background: linear-gradient(175deg,
        transparent 0%,
        rgba(255,255,255,.95) 30%,
        #fff 80%);
    transform:        skewY(-1.8deg) translateY(30px);
    transform-origin: left;
    box-shadow:       0 -10px 30px rgba(0,0,0,.12);
    border-bottom:    2px solid var(--flch-gold);
}

/* ── Dots ─────────────────────────────────────────────────── */
.flch-hero__dots {
    position:        absolute;
    bottom:          90px;       /* encima del divisor */
    left:            50%;
    transform:       translateX(-50%);
    z-index:         35;
    display:         flex;
    gap:             10px;
    align-items:     center;
    padding:         6px 12px;
    background:      rgba(0,0,0,.25);
    backdrop-filter: blur(6px);
    border-radius:   20px;
}
.flch-hero__dot {
    width:            10px;
    height:           10px;
    border-radius:    50%;
    border:           2px solid rgba(255,255,255,.55);
    background:       transparent;
    cursor:           pointer;
    padding:          0;
    transition:       background .3s var(--flch-ease),
                      border-color .3s var(--flch-ease),
                      transform .3s var(--flch-ease);
}
.flch-hero__dot:hover {
    background:    rgba(255,255,255,.4);
    border-color:  rgba(255,255,255,.9);
    transform:     scale(1.2);
}
.flch-hero__dot.is-active {
    background:   var(--flch-gold);
    border-color: var(--flch-gold);
    transform:    scale(1.25);
}
.flch-hero__dot:focus-visible {
    outline:        2px solid var(--flch-gold-light);
    outline-offset: 3px;
}

/* ── Contenido ────────────────────────────────────────────── */
.flch-hero__content {
    position:   relative;
    z-index:    30;
    display:    flex;
    align-items: center;
    width:       100%;
    height:      100%;
    max-width:   1440px;
    margin:      0 auto;
    padding:     0 clamp(1.5rem, 5vw, 4rem);
}
.flch-hero__container {
    max-width: 750px;
    animation: fadeInUp .9s var(--flch-ease-out) both;
}

/* ── Badge ────────────────────────────────────────────────── */
.flch-hero__badge {
    position:      relative;
    display:       inline-flex;
    align-items:   center;
    gap:           8px;
    margin-bottom: 2rem;
    padding:       6px 20px 6px 14px;
    background:    linear-gradient(90deg, var(--flch-gold-dim) 0%, transparent 100%);
    border-left:   3px solid var(--flch-gold);
    border-radius: 0 30px 30px 0;
    animation:     slideInLeft .9s var(--flch-ease-out) both;
}
.flch-hero__badge-pulse {
    position:      absolute;
    left:          -3px;          /* sobre el borde izquierdo */
    top:           50%;
    transform:     translateY(-50%);
    width:         10px;
    height:        10px;
    border-radius: 50%;
    background:    var(--flch-gold);
    animation:     pulse 2.5s infinite;
}
.flch-hero__badge-icon {
    color: var(--flch-gold);
    flex-shrink: 0;
}
.flch-hero__badge-text {
    font-size:      clamp(.68rem, 1.4vw, .82rem);
    font-weight:    600;
    letter-spacing: .15em;
    color:          var(--flch-gold-light);
    text-transform: uppercase;
}

/* ── Título ───────────────────────────────────────────────── */
.flch-hero__title { margin-bottom: 1rem; }

.flch-hero__title-prefix {
    display:        block;
    font-family:    var(--flch-font-disp);
    font-size:      clamp(1.1rem, 2.8vw, 1.7rem);
    font-weight:    400;
    letter-spacing: .15em;
    color:          var(--flch-gold-light);
    text-transform: uppercase;
    margin-bottom:  .4rem;
}
.flch-hero__title-main  { display: block; }
.flch-hero__title-line  { display: block; overflow: hidden; }
.flch-hero__title-word {
    display:        inline-block;
    font-size:      clamp(2.4rem, 7.5vw, 5rem);
    font-weight:    800;
    line-height:    1.1;
    letter-spacing: -.02em;
    text-transform: uppercase;
    color:          var(--flch-white);
    text-shadow:    0 4px 20px rgba(0,0,0,.3);
    margin-right:   .1em;
}
.flch-hero__title-word:last-child { margin-right: 0; }

/* ── Línea decorativa ─────────────────────────────────────── */
.flch-hero__accent-line {
    width:         120px;
    height:        3px;
    margin:        1.5rem 0 2rem;
    background:    linear-gradient(90deg, var(--flch-gold) 0%, var(--flch-gold-light) 50%, transparent 100%);
    border-radius: 2px;
    overflow:      hidden;
}
.flch-hero__accent-line-inner {
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,.5) 50%, transparent 100%);
    animation:  shimmer 3s infinite;
}

/* ── Descripción ──────────────────────────────────────────── */
.flch-hero__description-wrapper {
    margin-bottom: 2rem;
    max-width:     640px;
}
.flch-hero__description {
    font-size:   clamp(.95rem, 2.3vw, 1.15rem);
    line-height: 1.75;
    color:       var(--flch-w90);
    text-shadow: 0 2px 4px rgba(0,0,0,.2);
    margin:      0;
}
.flch-hero__description-text      { display: inline; color: var(--flch-w90); }
.flch-hero__description-highlight {
    display:         inline;
    color:           var(--flch-gold);
    font-weight:     600;
    background:      linear-gradient(120deg,
        transparent 0%, var(--flch-gold-dim) 25%, var(--flch-gold-dim) 75%, transparent 100%);
    padding:         .1rem .25rem;
    border-radius:   3px;
    vertical-align:  baseline;
    line-height:     inherit;
}

/* ── Acciones ─────────────────────────────────────────────── */
.flch-hero__actions {
    display:         flex;
    align-items:     flex-end;
    justify-content: space-between;
    flex-wrap:       wrap;
    gap:             1.5rem;
}
.flch-hero__buttons {
    display:     flex;
    flex-wrap:   wrap;
    gap:         1rem;
    align-items: center;
    margin-top:  1rem;
}

/* ── Botón base ───────────────────────────────────────────── */
.flch-btn {
    position:        relative;
    display:         inline-flex;
    align-items:     center;
    justify-content: center;
    gap:             .5rem;
    padding:         0 1.5rem;
    height:          48px;
    font-size:       .875rem;
    font-weight:     600;
    text-transform:  uppercase;
    letter-spacing:  .05em;
    text-decoration: none;
    cursor:          pointer;
    transition:      transform .3s var(--flch-ease),
                     box-shadow .3s var(--flch-ease),
                     background .3s var(--flch-ease);
    border-radius:   6px;
    min-width:       160px;
    white-space:     nowrap;
    overflow:        hidden;
    box-sizing:      border-box;
}
.flch-btn--primary {
    background:  linear-gradient(135deg, var(--flch-gold) 0%, var(--flch-gold-light) 100%);
    color:       var(--flch-primary);
    border:      2px solid transparent;
    box-shadow:  var(--flch-shadow-gold);
}
.flch-btn--primary:hover {
    transform:   translateY(-2px);
    box-shadow:  0 14px 28px rgba(198,164,63,.45);
}
.flch-btn--primary:active { transform: translateY(0); }
.flch-btn__text   { font-weight: 600; line-height: 1.2; }
.flch-btn__badge  {
    display:      inline-block;
    font-size:    .7rem;
    font-weight:  400;
    background:   rgba(0,0,0,.15);
    padding:      .15rem .4rem;
    border-radius: 3px;
}
.flch-btn__icon {
    display:    flex;
    align-items: center;
    transition: transform .3s ease;
}
.flch-btn:hover .flch-btn__icon { transform: translateX(4px); }
.flch-btn:focus-visible {
    outline:        2px solid var(--flch-gold-light);
    outline-offset: 3px;
}

/* ── Scroll indicator ─────────────────────────────────────── */
.flch-hero__scroll {
    display:     flex;
    align-items: center;
    gap:         1rem;
    opacity:     .75;
    transition:  opacity .3s ease;
}
.flch-hero__scroll:hover { opacity: 1; }
.flch-hero__scroll-text {
    font-size:      .75rem;
    font-weight:    400;
    letter-spacing: .3em;
    text-transform: uppercase;
    color:          var(--flch-w60);
}
.flch-hero__scroll-line {
    width:     80px;
    height:    1px;
    background: var(--flch-w20);
    position:   relative;
    overflow:   hidden;
}
.flch-hero__scroll-progress {
    position:   absolute;
    inset:      0;
    background: var(--flch-gold);
    animation:  scrollProg 2.5s infinite;
}

/* ── Flotantes decorativos ────────────────────────────────── */
.flch-hero__floating {
    position:       absolute;
    inset:          0;
    pointer-events: none;
    z-index:        10;
    overflow:       hidden;
}
.flch-hero__floating-circle {
    position:   absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%,
        rgba(198,164,63,.08) 0%, transparent 70%);
}
.flch-hero__floating-circle--1 {
    width: 300px; height: 300px;
    top: 10%; right: -100px;
    animation: float 28s infinite linear;
}
.flch-hero__floating-circle--2 {
    width: 500px; height: 500px;
    bottom: -200px; left: -200px;
    animation: float 38s infinite linear reverse;
}
.flch-hero__floating-circle--3 {
    width: 200px; height: 200px;
    top: 40%; right: 20%;
    opacity: .25;
    animation: float 18s infinite linear;
}

/* ── Keyframes ────────────────────────────────────────────── */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-40px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes lightSweep {
    0%   { transform: translateX(-100%); }
    18%  { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}
@keyframes shimmer {
    0%   { transform: translateX(-100%); }
    50%  { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}
@keyframes scrollProg {
    0%   { transform: translateX(-100%); }
    50%  { transform: translateX(0); }
    100% { transform: translateX(100%); }
}
@keyframes float {
    from { transform: rotate(0deg) translate(0,0) rotate(0deg); }
    to   { transform: rotate(360deg) translate(50px,50px) rotate(-360deg); }
}
@keyframes pulse {
    0%, 100% { opacity: 1;   transform: translateY(-50%) scale(1); }
    50%       { opacity: .4;  transform: translateY(-50%) scale(1.5); }
}

/* ── Responsive ───────────────────────────────────────────── */
@media (max-width: 1024px) {
    .flch-hero__floating   { opacity: .25; }
    .flch-hero__light-sweep { display: none; }
}

@media (max-width: 768px) {
    .flch-hero { min-height: 580px; height: 82vh; }

    .flch-hero__badge      { margin-bottom: 1.4rem; }
    .flch-hero__title-word { font-size: clamp(2rem, 6.5vw, 3.2rem); }
    .flch-hero__accent-line { margin: 1rem 0 1.5rem; }

    .flch-hero__dots {
        bottom: 80px;
        gap:    8px;
    }

    .flch-hero__actions {
        flex-direction:  column;
        align-items:     flex-start;
        gap:             1rem;
    }
    .flch-hero__scroll { display: none; }

    .flch-btn {
        padding:   0 1.2rem;
        height:    44px;
        font-size: .82rem;
        min-width: 140px;
    }

    .flch-hero__divider-inner { transform: skewY(-2.5deg) translateY(25px); }
}

@media (max-width: 480px) {
    .flch-hero { height: 85vh; min-height: 560px; }

    .flch-hero__buttons { flex-direction: column; width: 100%; }
    .flch-btn {
        width:           100%;
        min-width:       unset;
        justify-content: space-between;
    }

    .flch-hero__dots { gap: 7px; }
    .flch-hero__dot  { width: 8px; height: 8px; }
}

/* ── Accesibilidad: sin animaciones ──────────────────────── */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration:       0.01ms !important;
        animation-iteration-count: 1     !important;
        transition-duration:      0.01ms !important;
    }
    .flch-hero__light-sweep,
    .flch-hero__floating-circle,
    .flch-hero__scroll-progress,
    .flch-hero__badge-pulse,
    .flch-hero__accent-line-inner { animation: none !important; }
}
</style>