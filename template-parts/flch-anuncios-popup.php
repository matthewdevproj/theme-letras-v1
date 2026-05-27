<?php
/**
 * Template part: Popup dinámico de anuncios — FLCH
 *
 * Uso:
 *  - Se carga automáticamente desde functions.php via wp_footer (priority 20).
 *  - Para agregar anuncios editar el array $anuncios.
 *  - El popup se muestra 1 vez por sesión (sessionStorage).
 *    Para mostrarlo siempre, poner showOncePerSession: false en $cfg.
 *
 * @package LetrasFLCH
 */

// Nunca renderizar en el admin
if ( is_admin() ) {
    return;
}

// ── Configuración ──────────────────────────────────────────
$cfg = array(
    'open_delay'           => 1200,                   // ms antes de abrir
    'cookie_name'          => 'flch_anuncio_dismiss', // nombre de la cookie "No mostrar hoy"
    'cookie_hours'         => 24,                     // duración de la cookie (h)
    'session_key'          => 'flch_anuncio_seen',    // clave de sessionStorage
    'show_once_per_session'=> true,                   // false = siempre mostrar
    'auto_advance'         => false,                  // avance automático entre slides
    'auto_advance_ms'      => 4000,                   // intervalo de avance (ms)
    'analytics'            => true,                   // emitir CustomEvents para GTM/GA4
);

// ── Anuncios ───────────────────────────────────────────────
$anuncios = array(
    array(
        'imagen'      => 'https://letras.unmsm.edu.pe/wp-content/uploads/2026/05/WhatsApp-Image-2026-05-27-at-08.42.21.jpeg',
        'alt'         => 'Ampliación de plazo para rectificación de matrícula',
        'link'        => '',
        'link_texto'  => 'Ver más',
    ),
    // Agregar más anuncios aquí:
    // array(
    //     'imagen'     => 'https://letras.unmsm.edu.pe/wp-content/uploads/2026/04/otro.jpg',
    //     'alt'        => 'Descripción del anuncio',
    //     'link'       => 'https://letras.unmsm.edu.pe/alguna-pagina/',
    //     'link_texto' => 'Más información',
    // ),
);

if ( empty( $anuncios ) ) {
    return;
}

$total = count( $anuncios );
$cfg_json = wp_json_encode( array_merge( $cfg, array( 'total' => $total ) ), JSON_UNESCAPED_UNICODE );
?>

<!-- ══════════════════════════════════════════════════════════
     POPUP DE ANUNCIOS FLCH
     Trigger : automático al cargar (delay configurable)
     Cierre  : botón ✕ · ESC · backdrop · "No mostrar hoy"
════════════════════════════════════════════════════════════ -->

<!-- Backdrop -->
<div class="flch-popup-backdrop"
     id="flchPopupBackdrop"
     role="presentation"
     aria-hidden="true"></div>

<!-- Modal -->
<div class="flch-popup"
     id="flchPopup"
     role="dialog"
     aria-modal="true"
     aria-label="<?php esc_attr_e( 'Anuncios de la Facultad de Letras y Ciencias Humanas', 'letrasflch' ); ?>"
     aria-hidden="true">

    <!-- Live region para lectores de pantalla -->
    <div id="flchPopupLive" class="flch-visually-hidden" aria-live="polite" aria-atomic="true"></div>

    <!-- Header -->
    <div class="flch-popup__header">
        <div class="flch-popup__header-left">
            <span class="flch-popup__pulse" aria-hidden="true"></span>
            <span class="flch-popup__tag">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                    <path d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?php esc_html_e( 'Anuncio oficial', 'letrasflch' ); ?>
            </span>
        </div>

        <?php if ( $total > 1 ) : ?>
        <span class="flch-popup__counter" aria-hidden="true">
            <span id="flchPopupCurrent">1</span> / <?php echo esc_html( $total ); ?>
        </span>
        <?php endif; ?>

        <button class="flch-popup__close"
                id="flchPopupClose"
                type="button"
                aria-label="<?php esc_attr_e( 'Cerrar anuncio', 'letrasflch' ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
        </button>
    </div><!-- /.flch-popup__header -->

    <!-- Body (slides) -->
    <div class="flch-popup__body">
        <div class="flch-popup__slider"
             id="flchPopupSlider"
             role="region"
             aria-label="<?php esc_attr_e( 'Anuncios', 'letrasflch' ); ?>">

            <?php foreach ( $anuncios as $i => $a ) : ?>
            <div class="flch-popup__slide <?php echo $i === 0 ? 'is-active' : ''; ?>"
                 data-index="<?php echo esc_attr( $i ); ?>"
                 data-alt="<?php echo esc_attr( $a['alt'] ); ?>"
                 aria-hidden="<?php echo $i === 0 ? 'false' : 'true'; ?>"
                 role="tabpanel"
                 id="flchSlide<?php echo esc_attr( $i ); ?>"
                 aria-labelledby="flchDot<?php echo esc_attr( $i ); ?>">

                <?php if ( ! empty( $a['link'] ) ) : ?>
                <a href="<?php echo esc_url( $a['link'] ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flch-popup__img-link"
                   data-flch-popup-cta="<?php echo esc_attr( $i ); ?>"
                   aria-label="<?php echo esc_attr( $a['alt'] ); ?> — <?php echo esc_attr( $a['link_texto'] ); ?>">
                    <img src="<?php echo esc_url( $a['imagen'] ); ?>"
                         alt="<?php echo esc_attr( $a['alt'] ); ?>"
                         class="flch-popup__img"
                         loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                         decoding="async"
                         width="1080" height="1350">
                </a>
                <?php else : ?>
                <img src="<?php echo esc_url( $a['imagen'] ); ?>"
                     alt="<?php echo esc_attr( $a['alt'] ); ?>"
                     class="flch-popup__img"
                     loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                     decoding="async"
                     width="1080" height="1350">
                <?php endif; ?>

                <?php if ( ! empty( $a['link'] ) ) : ?>
                <div class="flch-popup__img-overlay" aria-hidden="true">
                    <a href="<?php echo esc_url( $a['link'] ); ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flch-popup__img-btn"
                       tabindex="-1">
                        <?php echo esc_html( $a['link_texto'] ); ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                            <path d="M5 12h14m-7-7l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div><!-- /.flch-popup__slider -->

        <?php if ( $total > 1 ) : ?>
        <div class="flch-popup__dots" role="tablist" aria-label="<?php esc_attr_e( 'Seleccionar anuncio', 'letrasflch' ); ?>">
            <?php foreach ( $anuncios as $i => $a ) : ?>
            <button class="flch-popup__dot <?php echo $i === 0 ? 'is-active' : ''; ?>"
                    id="flchDot<?php echo esc_attr( $i ); ?>"
                    role="tab"
                    data-index="<?php echo esc_attr( $i ); ?>"
                    aria-label="<?php printf( esc_attr__( 'Anuncio %d', 'letrasflch' ), $i + 1 ); ?>"
                    aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    aria-controls="flchSlide<?php echo esc_attr( $i ); ?>"
                    type="button">
            </button>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div><!-- /.flch-popup__body -->

    <!-- Footer -->
    <div class="flch-popup__footer">
        <button class="flch-popup__dismiss"
                id="flchPopupDismiss"
                type="button">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
            <?php esc_html_e( 'No mostrar hoy', 'letrasflch' ); ?>
        </button>
        <div class="flch-popup__brand" aria-hidden="true">
            <span>FLCH</span>
            <span class="flch-popup__brand-sep">·</span>
            <span>UNMSM</span>
        </div>
    </div><!-- /.flch-popup__footer -->
</div><!-- /.flch-popup -->

<script>
(function () {
    'use strict';

    // Config injected from PHP
    var CFG = <?php echo $cfg_json; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already wp_json_encode'd ?>;

    var popup      = document.getElementById('flchPopup');
    var backdrop   = document.getElementById('flchPopupBackdrop');
    var btnClose   = document.getElementById('flchPopupClose');
    var btnDismiss = document.getElementById('flchPopupDismiss');
    var slider     = document.getElementById('flchPopupSlider');
    var liveRegion = document.getElementById('flchPopupLive');
    var slides     = Array.from(document.querySelectorAll('.flch-popup__slide'));
    var dots       = Array.from(document.querySelectorAll('.flch-popup__dot'));
    var counter    = document.getElementById('flchPopupCurrent');

    if (!popup) return;

    var current     = 0;
    var isOpen      = false;
    var autoTimer   = null;
    var swipeStartX = 0;
    var swipeStartY = 0;
    var swipeStartT = 0;

    // ── Analytics helper ──────────────────────────────────
    function emit(name, detail) {
        if (!CFG.analytics) return;
        try {
            document.dispatchEvent(new CustomEvent(name, {
                bubbles: true,
                detail: Object.assign({ timestamp: Date.now() }, detail)
            }));
            // GTM dataLayer push (passive — no dataLayer dependency required)
            if (window.dataLayer) {
                window.dataLayer.push({ event: name.replace('flch:', 'flch_'), flch: detail });
            }
        } catch (e) {}
    }

    // ── Cookie helpers ────────────────────────────────────
    function setCookie(name, value, hours) {
        var d = new Date();
        d.setTime(d.getTime() + hours * 3600000);
        document.cookie = name + '=' + value + ';expires=' + d.toUTCString() + ';path=/;SameSite=Lax';
    }
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(?:^|; )' + name + '=([^;]*)'));
        return match ? match[1] : null;
    }

    // ── Visibility gate ───────────────────────────────────
    function shouldShow() {
        if (getCookie(CFG.cookie_name)) return false;
        if (CFG.show_once_per_session && sessionStorage.getItem(CFG.session_key)) return false;
        return true;
    }

    // ── Focus trap ────────────────────────────────────────
    function getFocusable() {
        return Array.from(popup.querySelectorAll(
            'button:not([disabled]), a[href], input, [tabindex]:not([tabindex="-1"])'
        )).filter(function (el) { return el.offsetParent !== null; });
    }

    // ── Open / Close ─────────────────────────────────────
    function open() {
        if (isOpen) return;
        isOpen = true;
        popup.classList.add('is-open');
        backdrop.classList.add('is-open');
        popup.setAttribute('aria-hidden', 'false');
        backdrop.setAttribute('aria-hidden', 'false');
        document.body.classList.add('flch-popup-active');
        setTimeout(function () { btnClose && btnClose.focus(); }, 380);
        if (CFG.show_once_per_session) sessionStorage.setItem(CFG.session_key, '1');
        if (CFG.auto_advance && slides.length > 1) startAutoAdvance();
        emit('flch:popup:open', { total: CFG.total });
    }

    function close(reason) {
        if (!isOpen) return;
        isOpen = false;
        stopAutoAdvance();
        popup.classList.remove('is-open');
        backdrop.classList.remove('is-open');
        popup.setAttribute('aria-hidden', 'true');
        backdrop.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('flch-popup-active');
        emit('flch:popup:close', { reason: reason || 'unknown', slide: current });
    }

    // ── Slide navigation ─────────────────────────────────
    function goTo(idx) {
        if (idx === current) return;
        var prevIdx = current;
        slides.forEach(function (s, i) {
            s.classList.toggle('is-active', i === idx);
            s.setAttribute('aria-hidden', i === idx ? 'false' : 'true');
        });
        dots.forEach(function (d, i) {
            d.classList.toggle('is-active', i === idx);
            d.setAttribute('aria-selected', i === idx ? 'true' : 'false');
        });
        if (counter) counter.textContent = idx + 1;
        if (liveRegion) liveRegion.textContent = 'Anuncio ' + (idx + 1) + ' de ' + CFG.total;
        emit('flch:popup:slide_change', { from: prevIdx, to: idx });
        current = idx;
    }

    function next() { goTo((current + 1) % slides.length); }
    function prev() { goTo((current - 1 + slides.length) % slides.length); }

    // ── Auto-advance ─────────────────────────────────────
    function startAutoAdvance() {
        stopAutoAdvance();
        autoTimer = setInterval(next, CFG.auto_advance_ms);
    }
    function stopAutoAdvance() {
        if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
    }

    // ── Touch / swipe (velocity-aware) ───────────────────
    if (slides.length > 1 && slider) {
        slider.addEventListener('touchstart', function (e) {
            swipeStartX = e.touches[0].clientX;
            swipeStartY = e.touches[0].clientY;
            swipeStartT = Date.now();
            stopAutoAdvance();
        }, { passive: true });

        slider.addEventListener('touchend', function (e) {
            var dx = e.changedTouches[0].clientX - swipeStartX;
            var dy = e.changedTouches[0].clientY - swipeStartY;
            var dt = Math.max(Date.now() - swipeStartT, 1);
            var vx = Math.abs(dx) / dt; // px/ms

            // Require horizontal dominance + either enough distance or enough velocity
            if (Math.abs(dx) < 30 || Math.abs(dy) > Math.abs(dx)) return;
            if (Math.abs(dx) < 60 && vx < 0.3) return;

            dx < 0 ? next() : prev();
            if (CFG.auto_advance) startAutoAdvance();
        }, { passive: true });

        // Pause auto-advance on hover
        slider.addEventListener('mouseenter', stopAutoAdvance);
        slider.addEventListener('mouseleave', function () {
            if (isOpen && CFG.auto_advance) startAutoAdvance();
        });
    }

    // ── Keyboard events ───────────────────────────────────
    popup.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { close('escape'); return; }

        if (slides.length > 1) {
            if (e.key === 'ArrowRight') { e.preventDefault(); next(); return; }
            if (e.key === 'ArrowLeft')  { e.preventDefault(); prev(); return; }
        }

        if (e.key !== 'Tab') return;
        var focusable = getFocusable();
        if (!focusable.length) return;
        var first = focusable[0], last = focusable[focusable.length - 1];
        if (e.shiftKey) {
            if (document.activeElement === first) { e.preventDefault(); last.focus(); }
        } else {
            if (document.activeElement === last)  { e.preventDefault(); first.focus(); }
        }
    });

    // Global ESC (handles when focus is outside popup)
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) close('escape');
    });

    // ── CTA analytics ─────────────────────────────────────
    popup.addEventListener('click', function (e) {
        var cta = e.target.closest('[data-flch-popup-cta]');
        if (cta) {
            emit('flch:popup:cta_click', {
                slide: parseInt(cta.dataset.flchPopupCta, 10),
                href: cta.href || ''
            });
        }
    });

    // ── Button bindings ───────────────────────────────────
    btnClose   && btnClose.addEventListener('click',   function () { close('button'); });
    backdrop   && backdrop.addEventListener('click',   function () { close('backdrop'); });
    btnDismiss && btnDismiss.addEventListener('click', function () {
        setCookie(CFG.cookie_name, '1', CFG.cookie_hours);
        close('dismiss');
    });
    dots.forEach(function (d) {
        d.addEventListener('click', function () { goTo(+d.dataset.index); });
    });

    // ── Init ─────────────────────────────────────────────
    if (shouldShow()) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(open, CFG.open_delay);
            });
        } else {
            setTimeout(open, CFG.open_delay);
        }
    }

})();
</script>

<style id="flch-popup-styles">
/* ── Design tokens ────────────────────────────────────── */
:root {
    --fp-primary:      #0A1E3C;
    --fp-gold:         #C6A43F;
    --fp-gold-light:   #DAB95C;
    --fp-white:        #ffffff;
    --fp-gray-50:      #F8F7F5;
    --fp-gray-100:     #EEECEA;
    --fp-gray-400:     #9B9892;
    --fp-gray-600:     #636059;
    --fp-text:         #1A1410;
    --fp-radius:       16px;
    --fp-ease:         cubic-bezier(0.4, 0, 0.2, 1);
    --fp-ease-spring:  cubic-bezier(0.34, 1.56, 0.64, 1);
    --fp-shadow:       0 32px 80px rgba(0,0,0,.22), 0 8px 24px rgba(0,0,0,.12);
}

/* ── Utility ────────────────────────────────────────────── */
.flch-visually-hidden {
    position: absolute;
    width: 1px; height: 1px;
    padding: 0; margin: -1px;
    overflow: hidden;
    clip: rect(0,0,0,0);
    white-space: nowrap;
    border: 0;
}
body.flch-popup-active { overflow: hidden; }

/* ── Backdrop ───────────────────────────────────────────── */
.flch-popup-backdrop {
    position: fixed; inset: 0; z-index: 99998;
    background: rgba(5, 14, 28, 0.72);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    opacity: 0; visibility: hidden;
    transition: opacity .35s var(--fp-ease), visibility .35s;
    cursor: pointer;
}
.flch-popup-backdrop.is-open { opacity: 1; visibility: visible; }

/* ── Modal (desktop & tablet: centrado) ─────────────────── */
.flch-popup {
    position: fixed; z-index: 99999;
    top: 50%; left: 50%;
    transform: translate(-50%, -42%) scale(0.94);
    opacity: 0; visibility: hidden;
    transition:
        transform .45s var(--fp-ease-spring),
        opacity   .35s var(--fp-ease),
        visibility .35s;
    width: min(420px, 92vw);
    max-height: 92dvh;          /* dynamic viewport height for mobile browsers */
    display: flex; flex-direction: column;
    background: var(--fp-white);
    border-radius: var(--fp-radius);
    box-shadow: var(--fp-shadow);
    overflow: hidden;
    outline: 1.5px solid rgba(198, 164, 63, .20);
    will-change: transform, opacity;
    contain: layout style;
}
.flch-popup.is-open {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1; visibility: visible;
}

/* ── Header ──────────────────────────────────────────────── */
.flch-popup__header {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 14px 12px 16px;
    background: var(--fp-primary);
    flex-shrink: 0;
}
.flch-popup__header-left {
    display: flex; align-items: center; gap: 8px;
    flex: 1; min-width: 0;
}
.flch-popup__pulse {
    display: block; width: 8px; height: 8px; flex-shrink: 0;
    border-radius: 50%;
    background: var(--fp-gold);
    animation: fpPulse 2.4s ease-in-out infinite;
}
.flch-popup__tag {
    display: flex; align-items: center; gap: 5px;
    font-size: .72rem; font-weight: 600;
    letter-spacing: .1em; text-transform: uppercase;
    color: var(--fp-gold-light);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.flch-popup__counter {
    font-size: .75rem;
    color: rgba(255,255,255,.45);
    flex-shrink: 0;
}
.flch-popup__close {
    display: flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; flex-shrink: 0;
    border-radius: 50%;
    border: 1.5px solid rgba(255,255,255,.20);
    background: transparent;
    color: rgba(255,255,255,.70);
    cursor: pointer; padding: 0;
    transition: background .2s, color .2s;
    touch-action: manipulation;
}
.flch-popup__close:hover,
.flch-popup__close:focus-visible {
    background: rgba(255,255,255,.12);
    color: var(--fp-white);
    outline: 2px solid var(--fp-gold);
    outline-offset: 2px;
}

/* ── Body & slider ───────────────────────────────────────── */
.flch-popup__body {
    flex: 1; overflow-y: auto; min-height: 0;
    -webkit-overflow-scrolling: touch;
    overscroll-behavior: contain;
}
.flch-popup__slider {
    position: relative; width: 100%;
    touch-action: pan-y; /* allow vertical scroll, intercept horizontal for swipe */
}
.flch-popup__slide          { display: none; position: relative; width: 100%; }
.flch-popup__slide.is-active {
    display: block;
    animation: fpSlideIn .32s var(--fp-ease) both;
}
.flch-popup__img {
    display: block; width: 100%; height: auto;
    object-fit: contain;
    background: var(--fp-gray-50);
    aspect-ratio: 1080 / 1350; /* prevents layout shift while loading */
}
.flch-popup__img-link { display: block; }

/* CTA overlay */
.flch-popup__img-overlay {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 16px;
    background: linear-gradient(to top, rgba(5,14,28,.75) 0%, transparent 100%);
    display: flex; justify-content: flex-end;
    opacity: 0;
    transition: opacity .25s;
    pointer-events: none;
}
.flch-popup__slide:hover .flch-popup__img-overlay,
.flch-popup__slide:focus-within .flch-popup__img-overlay { opacity: 1; pointer-events: auto; }
.flch-popup__img-btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 7px 14px;
    background: var(--fp-gold); color: var(--fp-primary);
    font-size: .8rem; font-weight: 700;
    text-decoration: none; border-radius: 6px;
    transition: background .2s;
}
.flch-popup__img-btn:hover { background: var(--fp-gold-light); }

/* ── Dots ─────────────────────────────────────────────────── */
.flch-popup__dots {
    display: flex; justify-content: center; gap: 8px;
    padding: 10px 0 8px;
    background: var(--fp-gray-50);
    border-top: 1px solid var(--fp-gray-100);
}
.flch-popup__dot {
    width: 8px; height: 8px; border-radius: 50%;
    border: 1.5px solid rgba(10,30,60,.30);
    background: transparent; cursor: pointer; padding: 0;
    transition: background .2s, border-color .2s, transform .2s;
    touch-action: manipulation;
}
.flch-popup__dot.is-active {
    background: var(--fp-primary);
    border-color: var(--fp-primary);
    transform: scale(1.25);
}
.flch-popup__dot:focus-visible {
    outline: 2px solid var(--fp-gold);
    outline-offset: 2px;
}

/* ── Footer ────────────────────────────────────────────────── */
.flch-popup__footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 10px 16px;
    background: var(--fp-gray-50);
    border-top: 1px solid var(--fp-gray-100);
    flex-shrink: 0;
}
.flch-popup__dismiss {
    display: flex; align-items: center; gap: 5px;
    font-size: .75rem; color: var(--fp-gray-600);
    background: transparent; border: none; cursor: pointer;
    padding: 6px 8px;
    border-radius: 4px;
    transition: background .2s, color .2s;
    touch-action: manipulation;
}
.flch-popup__dismiss:hover,
.flch-popup__dismiss:focus-visible {
    background: var(--fp-gray-100);
    color: var(--fp-text);
}
.flch-popup__dismiss:focus-visible { outline: 2px solid var(--fp-gold); outline-offset: 1px; }
.flch-popup__brand {
    display: flex; align-items: center; gap: 5px;
    font-size: .7rem; font-weight: 700;
    color: var(--fp-primary); opacity: .45;
}

/* ── Keyframes ──────────────────────────────────────────────── */
@keyframes fpPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50%       { opacity: .35; transform: scale(1.55); }
}
@keyframes fpSlideIn {
    from { opacity: 0; transform: translateX(10px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* ── Mobile: bottom sheet ─────────────────────────────────── */
@media (max-width: 480px) {
    .flch-popup {
        width: 100%;
        max-height: 96dvh;
        top: auto; bottom: 0; left: 0; right: 0;
        transform: translateY(100%);
        border-radius: 20px 20px 0 0;
        /* cancel centering transforms */
        margin: 0;
    }
    .flch-popup.is-open { transform: translateY(0); }

    /* Always show CTA overlay on touch (no hover) */
    .flch-popup__img-overlay { opacity: 1; pointer-events: auto; }

    .flch-popup__close { width: 40px; height: 40px; } /* larger touch target */
    .flch-popup__dot   { width: 10px; height: 10px; } /* larger touch target */
}

/* ── Reduced motion ──────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
    .flch-popup,
    .flch-popup-backdrop {
        transition: opacity .15s, visibility .15s !important;
    }
    .flch-popup { transform: translate(-50%, -50%) scale(1) !important; }
    .flch-popup.is-open { opacity: 1; visibility: visible; }

    @media (max-width: 480px) {
        .flch-popup        { transform: translateY(0) !important; }
    }

    .flch-popup__pulse { animation: none !important; }

    @keyframes fpSlideIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
}
</style>
