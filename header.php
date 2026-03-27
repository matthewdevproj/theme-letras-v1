<?php
/**
 * Header template - FLCH UNMSM
 * Versión: Responsive Premium v3 — Mobile-First
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

    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">

    <?php wp_head(); ?>

    <meta name="theme-color" content="#0A1E3C">

<style>
/* ================================================================
   FLCH HEADER — RESPONSIVE PREMIUM v3
   Mobile-First approach
   Paleta: Azul marino #0A1E3C · Dorado #A88F1D
   ================================================================ */

:root {
    --color-primary:      #0A1E3C;
    --color-primary-mid:  #0D2545;
    --color-primary-light:#143B63;
    --color-accent:       #A88F1D;
    --color-accent-dark:  #8B7718;
    --color-accent-glow:  rgba(168,143,29,0.35);
    --color-divider:      rgba(168,143,29,0.20);
    --tb-bg:              #111111;
    --tb-bg-row2:         #0D0D0D;
}

*, *::before, *::after { box-sizing: border-box; }

body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    color: #333;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
}

[x-cloak] { display: none !important; }

/* ================================================================
   UTILIDADES
   ================================================================ */
.rotate-90  { transform: rotate(90deg); }
.rotate-180 { transform: rotate(180deg); transition: transform 0.3s ease; }

.container-custom {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1.5rem;
}
@media (max-width: 640px) {
    .container-custom { padding: 0 1rem; }
}

/* ================================================================
   TOP BAR — ESTRUCTURA GENERAL
   ================================================================ */
.flch-topbar {
    background: var(--tb-bg);
    position: relative;
    z-index: 60;
    border-top: 2px solid transparent;
    border-image: linear-gradient(90deg, transparent, #A88F1D 30%, #D4AF37 50%, #A88F1D 70%, transparent) 1;
    animation: tb-in 0.5s cubic-bezier(0.22,1,0.36,1) both;
}

@keyframes tb-in {
    from { opacity:0; transform:translateY(-100%); }
    to   { opacity:1; transform:translateY(0); }
}

.flch-topbar::after {
    content:'';
    position:absolute; bottom:0; left:0; right:0;
    height:1px;
    background:linear-gradient(90deg,transparent,var(--color-divider),transparent);
}

/* ── ROW DESKTOP ─────────────────────────────────── */
.tb-desktop {
    display: none;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1.5rem;
    height: 52px;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
}

/* ── ROW MÓVIL: REDES (fila superior) ────────────── */
.tb-mobile-social {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    height: 44px;
    background: var(--tb-bg);
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

/* ── ROW MÓVIL: CONTACTO (fila inferior) ─────────── */
.tb-mobile-contact {
    display: flex;
    align-items: stretch;
    background: #0D0D0D;
    border-top: 1px solid rgba(168,143,29,0.12);
    overflow: hidden;
}

/* En desktop, ocultar filas móvil */
@media (min-width: 1024px) {
    .tb-desktop         { display: flex; }
    .tb-mobile-social   { display: none; }
    .tb-mobile-contact  { display: none; }
}

/* ================================================================
   TOP BAR DESKTOP — ITEMS DE CONTACTO
   ================================================================ */
.tb-contact-group {
    display: flex;
    align-items: center;
}

.tb-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    text-decoration: none;
    color: inherit;
    padding: 0.3rem 1rem;
    border-radius: 6px;
    transition: color 0.2s ease, background 0.2s ease, transform 0.15s ease;
    position: relative;
    white-space: nowrap;
}

.tb-item:not(:last-child)::after {
    content:'';
    position:absolute; right:0; top:50%;
    transform:translateY(-50%);
    width:1px; height:16px;
    background:var(--color-divider);
}

.tb-item:hover {
    color: var(--color-accent);
    background: rgba(168,143,29,0.06);
    transform: translateY(-1px);
}
.tb-item:active { transform: scale(0.97); }

.tb-icon {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--color-accent);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(168,143,29,0.3);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.tb-item:hover .tb-icon {
    transform: scale(1.12) rotate(-5deg);
    box-shadow: 0 4px 10px rgba(168,143,29,0.45);
}
.tb-icon i { color:#fff; font-size:0.72rem; }

.tb-text { display:flex; flex-direction:column; line-height:1.2; }
.tb-label {
    font-size: 0.54rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: var(--color-accent);
}
.tb-value {
    font-size: 0.77rem;
    font-weight: 500;
    color: rgba(255,255,255,0.9);
    transition: color 0.2s;
}
.tb-item:hover .tb-value { color: var(--color-accent); }

.tb-email-val {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
}

/* BADGE AVISO (desktop) */
.tb-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(168,143,29,0.10);
    border: 1px solid rgba(168,143,29,0.28);
    border-radius: 20px;
    padding: 0.25rem 0.9rem;
    font-size: 0.69rem;
    font-weight: 500;
    color: rgba(255,255,255,0.82);
    white-space: nowrap;
    flex-shrink: 0;
}
.tb-badge-dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #4ADE80;
    box-shadow: 0 0 6px rgba(74,222,128,0.6);
    animation: pulse-dot 2s infinite;
    flex-shrink: 0;
}
@keyframes pulse-dot {
    0%,100% { opacity:1; transform:scale(1); }
    50%      { opacity:0.5; transform:scale(0.75); }
}

/* REDES SOCIALES */
.tb-social-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-shrink: 0;
}
.tb-social-label {
    font-size: 0.58rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.9px;
    color: rgba(255,255,255,0.38);
    margin-right: 0.15rem;
}

.tb-soc {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    text-decoration: none;
    font-size: 0.88rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    position: relative;
}
.tb-soc:hover {
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 8px 16px rgba(0,0,0,0.4);
    filter: brightness(1.15);
}
.tb-soc:active { transform: scale(0.94); }
.tb-soc.fb { background: #1877F2; }
.tb-soc.ig { background: linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4); }
.tb-soc.yt { background: #FF0000; }
.tb-soc.li { background: #0077B5; }

/* TOOLTIP */
.tb-tooltip {
    position: absolute;
    bottom: calc(100% + 9px);
    left: 50%;
    transform: translateX(-50%) translateY(3px);
    background: #1c1c1c;
    color: rgba(255,255,255,0.95);
    font-size: 0.7rem;
    font-weight: 500;
    padding: 0.4rem 0.8rem;
    border-radius: 7px;
    white-space: nowrap;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.15s ease, transform 0.15s ease;
    border: 1px solid var(--color-divider);
    box-shadow: 0 8px 20px rgba(0,0,0,0.5);
    z-index: 999;
}
.tb-tooltip::after {
    content:'';
    position:absolute; top:100%; left:50%;
    transform:translateX(-50%);
    border:5px solid transparent;
    border-top-color:#1c1c1c;
}
.tb-item:hover .tb-tooltip,
.tb-soc:hover .tb-tooltip {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}

/* MÓVIL — FILA SUPERIOR: REDES SOCIALES */
.tb-mob-social-inner {
    display: flex;
    align-items: center;
    gap: 0.45rem;
}

.tb-mob-follow {
    font-size: 0.6rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: rgba(255,255,255,0.38);
}

.tb-mob-soc {
    width: 34px; height: 34px;
    min-width: 44px; min-height: 44px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    text-decoration: none;
    font-size: 0.92rem;
    transition: transform 0.18s ease, filter 0.18s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.35);
    position: relative;
    padding: 5px;
}
.tb-mob-soc:active { transform: scale(0.9); }
.tb-mob-soc.fb { background: #1877F2; }
.tb-mob-soc.ig { background: linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4); }
.tb-mob-soc.yt { background: #FF0000; }
.tb-mob-soc.li { background: #0077B5; }

/* MÓVIL — FILA INFERIOR: CONTACTO */
.tb-mob-contact-btn {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    text-decoration: none;
    color: rgba(255,255,255,0.85);
    padding: 10px 4px;
    min-height: 56px;
    font-size: 0.6rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    text-align: center;
    transition: background 0.18s ease, color 0.18s ease;
    position: relative;
    border-right: 1px solid rgba(255,255,255,0.05);
    line-height: 1.2;
}
.tb-mob-contact-btn:last-child { border-right: none; }

.tb-mob-contact-btn:hover,
.tb-mob-contact-btn:focus {
    background: rgba(168,143,29,0.10);
    color: var(--color-accent);
}
.tb-mob-contact-btn:active {
    background: rgba(168,143,29,0.18);
    transform: scale(0.97);
}

.tb-mob-icon {
    width: 30px; height: 30px;
    border-radius: 50%;
    background: var(--color-accent);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(168,143,29,0.35);
    transition: transform 0.18s ease;
    margin-bottom: 2px;
}
.tb-mob-contact-btn:hover .tb-mob-icon,
.tb-mob-contact-btn:active .tb-mob-icon {
    transform: scale(1.1);
}
.tb-mob-icon i { color:#fff; font-size:0.72rem; }

.tb-mob-label {
    font-size: 0.58rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    color: inherit;
    line-height: 1;
}

/* TABLET (768–1023px) */
@media (min-width: 768px) and (max-width: 1023px) {
    .tb-mobile-social,
    .tb-mobile-contact { display: none !important; }
    .tb-tablet { display: flex !important; }
}

.tb-tablet {
    display: none;
    align-items: center;
    justify-content: space-between;
    gap: 0;
    height: 46px;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    padding: 0 1rem;
    position: relative;
}
.tb-tablet::-webkit-scrollbar { display: none; }

.tb-tablet-inner {
    display: flex;
    align-items: center;
    gap: 0;
    width: max-content;
    min-width: 100%;
}

.tb-tab-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    color: rgba(255,255,255,0.88);
    padding: 0.3rem 0.85rem;
    white-space: nowrap;
    font-size: 0.73rem;
    font-weight: 500;
    transition: color 0.2s ease, background 0.2s ease;
    border-radius: 6px;
    position: relative;
    min-height: 44px;
}
.tb-tab-item:not(:last-child)::after {
    content:'';
    position:absolute; right:0; top:50%;
    transform:translateY(-50%);
    width:1px; height:14px;
    background:var(--color-divider);
}
.tb-tab-item:hover {
    color: var(--color-accent);
    background: rgba(168,143,29,0.07);
}
.tb-tab-icon {
    width:26px; height:26px;
    border-radius:50%; background:var(--color-accent);
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
}
.tb-tab-icon i { color:#fff; font-size:0.65rem; }

.tb-tab-divider {
    width:1px; height:16px;
    background:var(--color-divider);
    margin:0 0.5rem;
    flex-shrink:0;
}

.tb-tab-soc {
    width:30px; height:30px;
    border-radius:7px;
    display:flex; align-items:center; justify-content:center;
    color:#fff; text-decoration:none;
    font-size:0.82rem;
    min-width:44px; min-height:44px;
    transition:transform 0.18s ease, filter 0.18s ease;
}
.tb-tab-soc:hover  { transform:scale(1.1); filter:brightness(1.15); }
.tb-tab-soc:active { transform:scale(0.92); }
.tb-tab-soc.fb { background:#1877F2; }
.tb-tab-soc.ig { background:linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4); }
.tb-tab-soc.yt { background:#FF0000; }
.tb-tab-soc.li { background:#0077B5; }

.tb-fade-r {
    position:absolute; right:0; top:0; bottom:0;
    width:28px;
    background:linear-gradient(to left,#111,transparent);
    pointer-events:none; z-index:3;
}

/* ================================================================
   HEADER PRINCIPAL
   ================================================================ */
.main-header {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
    box-shadow: 0 4px 15px -3px rgba(0,0,0,0.3);
    border-bottom: 1px solid rgba(168,143,29,0.2);
    position: sticky;
    top: 0;
    z-index: 50;
}

.header-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 64px;
}

@media (min-width: 1024px) {
    .header-inner { height: 72px; }
}

@media (max-width: 640px) {
    .header-inner { padding: 0 1rem; height: 60px; }
}

.header-logo img {
    height: 44px;
    width: auto;
    filter: brightness(0) invert(1);
    transition: transform 0.3s ease, opacity 0.3s ease;
}
.header-logo:hover img {
    transform: scale(1.04);
    opacity: 0.9;
}
@media (min-width: 768px) { .header-logo img { height: 52px; } }
@media (min-width: 1024px) { .header-logo img { height: 62px; } }

nav.main-nav { display: none; }
@media (min-width: 1024px) { nav.main-nav { display: block; } }

.main-menu {
    display: flex;
    align-items: center;
    gap: 0.2rem;
    list-style: none;
    margin: 0; padding: 0;
}
.main-menu > li { position: relative; }
.main-menu > li > a {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.55rem 1rem;
    color: rgba(255,255,255,0.92);
    font-weight: 500;
    font-size: 0.9rem;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}
.main-menu > li > a:hover {
    color: var(--color-accent);
    background: rgba(255,255,255,0.08);
}
.main-menu .sub-menu {
    position: absolute;
    left: 0; top: 100%;
    background: var(--color-primary);
    border: 1px solid rgba(168,143,29,0.3);
    border-radius: 8px;
    box-shadow: 0 15px 30px -8px rgba(0,0,0,0.4);
    padding: 0.5rem 0;
    min-width: 240px;
    z-index: 100;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
    margin-top: 4px;
    list-style: none;
}
.main-menu li:hover > .sub-menu { opacity:1; visibility:visible; }
.main-menu .sub-menu .sub-menu { left:100%; top:-0.5rem; }
.main-menu .sub-menu a {
    display: block;
    padding: 0.65rem 1.25rem;
    color: rgba(255,255,255,0.88);
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.18s ease;
    border-bottom: 1px solid rgba(255,255,255,0.04);
}
.main-menu .sub-menu li:last-child a { border-bottom: none; }
.main-menu .sub-menu a:hover {
    background: #1E4A7A;
    color: var(--color-accent);
    padding-left: 1.75rem;
}

.header-actions { display:flex; align-items:center; gap:0.5rem; }

.header-btn {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: none;
    cursor: pointer;
    display: flex; align-items:center; justify-content:center;
    color: #fff;
    font-size: 1rem;
    transition: background 0.2s ease, transform 0.15s ease;
}
.header-btn:hover  { background: var(--color-accent); }
.header-btn:active { transform: scale(0.92); }
.header-btn.active { background: var(--color-accent); }

@media (max-width: 640px) {
    .header-btn { width: 36px; height: 36px; font-size: 0.9rem; }
}

.fa-chevron-down { font-size:0.65rem; transition:transform 0.2s ease; opacity:0.7; }
li:hover > a .fa-chevron-down { transform:rotate(180deg); opacity:1; }

/* BARRA DE BÚSQUEDA */
.search-bar {
    background: var(--color-primary);
    border-top: 1px solid rgba(168,143,29,0.25);
    border-bottom: 1px solid rgba(168,143,29,0.1);
    box-shadow: 0 10px 20px -5px rgba(0,0,0,0.4);
    position: relative;
    z-index: 45;
}

.search-bar .search-title {
    color: rgba(255,255,255,0.9);
    font-size: 0.88rem;
    font-weight: 500;
    margin-bottom: 0.7rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.search-bar .search-title i { color: var(--color-accent); }

.search-input-wrapper { position:relative; width:100%; }

.search-input {
    background: #132A45 !important;
    border: 2px solid rgba(168,143,29,0.3) !important;
    color: #fff !important;
    border-radius: 10px !important;
    padding: 0.9rem 8rem 0.9rem 1.25rem !important;
    width: 100%;
    font-size: 0.95rem;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
}
.search-input:focus {
    border-color: var(--color-accent) !important;
    outline: none !important;
    box-shadow: 0 0 0 4px rgba(168,143,29,0.18) !important;
    background: #153250 !important;
}
.search-input::placeholder { color:rgba(255,255,255,0.45) !important; }

.search-submit-btn {
    position:absolute; right:0.4rem; top:50%;
    transform:translateY(-50%);
    background: var(--color-accent);
    color: #fff;
    font-weight: 600;
    padding: 0.55rem 1.1rem;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    display: flex; align-items:center; gap:0.4rem;
    font-size: 0.875rem;
    font-family: 'Poppins', sans-serif;
    transition: all 0.25s ease;
}
.search-submit-btn:hover {
    background: var(--color-accent-dark);
    transform: translateY(-50%) scale(1.02);
}

.search-clear-btn {
    position:absolute; right:5.2rem; top:50%;
    transform:translateY(-50%);
    background:transparent; border:none;
    color:rgba(255,255,255,0.55);
    cursor:pointer; font-size:1rem;
    transition:color 0.2s;
}
.search-clear-btn:hover { color:#fff; }

.suggestion-link {
    display:inline-block;
    padding:0.35rem 0.9rem;
    background:rgba(255,255,255,0.07);
    color:rgba(255,255,255,0.88);
    border-radius:999px;
    font-size:0.78rem;
    border:1px solid rgba(255,255,255,0.1);
    text-decoration:none;
    transition:all 0.22s ease;
}
.suggestion-link:hover {
    background:var(--color-accent);
    color:#fff;
    border-color:var(--color-accent);
    transform:translateY(-2px);
}

/* ================================================================
   ACCESIBILIDAD
   ================================================================ */
@media (prefers-reduced-motion: reduce) {
    .flch-topbar,
    .tb-badge-dot { animation: none !important; }
    * { transition-duration: 0.01ms !important; }
}

.skip-link {
    position:absolute;
    top:-100%; left:1rem;
    z-index:200;
    padding:0.75rem 1.25rem;
    background:var(--color-accent);
    color:#fff;
    border-radius:8px;
    text-decoration:none;
    font-weight:600;
    transition:top 0.2s;
}
.skip-link:focus { top:1rem; }

/* ================================================================
   MENÚ MÓVIL - ESTILOS CORREGIDOS
   ================================================================ */

@media (min-width: 1024px) {
    .menu-toggle {
        display: none !important;
    }
}

.menu-toggle {
    display: flex;
}

.mobile-menu-panel {
    position: fixed;
    top: calc(60px + 88px);
    left: 0;
    right: 0;
    background: var(--color-primary);
    border-top: 1px solid rgba(168, 143, 29, 0.25);
    box-shadow: 0 15px 25px -8px rgba(0, 0, 0, 0.4);
    max-height: calc(100vh - 148px);
    overflow-y: auto;
    z-index: 49;
}

@media (min-width: 768px) and (max-width: 1023px) {
    .mobile-menu-panel {
        top: calc(64px + 46px);
        max-height: calc(100vh - 110px);
    }
}

@media (min-width: 1024px) {
    .mobile-menu-panel {
        display: none !important;
    }
}

.mobile-menu-panel::-webkit-scrollbar {
    width: 5px;
}
.mobile-menu-panel::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.04);
}
.mobile-menu-panel::-webkit-scrollbar-thumb {
    background: var(--color-accent);
    border-radius: 3px;
}

.mobile-nav {
    padding: 1rem;
}

.mobile-menu {
    margin: 0;
    padding: 0;
    list-style: none;
}

.mobile-menu > li {
    margin: 0;
    padding: 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    position: relative;
}

.mobile-menu a {
    color: rgba(255, 255, 255, 0.92);
    padding: 0.9rem 1rem;
    display: block;
    transition: all 0.2s ease;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
}

.mobile-menu a:hover,
.mobile-menu a:focus {
    background: #1E4A7A;
    color: var(--color-accent);
    padding-left: 1.5rem;
}

.mobile-menu .menu-item-has-children {
    position: relative;
}

.mobile-menu .menu-item-has-children > a {
    padding-right: 2.5rem;
}

.mobile-submenu-toggle {
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.08);
    border: none;
    color: rgba(255, 255, 255, 0.7);
    padding: 0.5rem 0.8rem;
    cursor: pointer;
    font-size: 0.75rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
}

.mobile-submenu-toggle:hover {
    background: var(--color-accent);
    color: white;
}

.mobile-submenu-toggle i {
    transition: transform 0.25s ease;
}

.mobile-submenu-toggle i.rotate-180 {
    transform: rotate(180deg);
}

.mobile-menu ul.sub-menu {
    margin: 0;
    padding: 0 0 0 1rem;
    list-style: none;
    background: rgba(0, 0, 0, 0.25);
    border-left: 2px solid var(--color-accent);
    display: none;
}

.mobile-menu ul.sub-menu.open {
    display: block;
}

.mobile-menu ul.sub-menu li {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.mobile-menu ul.sub-menu li:last-child {
    border-bottom: none;
}

.mobile-menu ul.sub-menu a {
    padding: 0.7rem 1rem;
    font-size: 0.85rem;
    font-weight: 400;
}

.mobile-menu ul.sub-menu a:hover {
    padding-left: 1.5rem;
}

.mobile-menu ul.sub-menu ul.sub-menu {
    margin-left: 0.5rem;
    border-left: 1px solid rgba(168, 143, 29, 0.4);
}

.mobile-contact-info {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.mobile-contact-title {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--color-accent);
    margin: 0 0 0.75rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.mobile-contact-title i {
    font-size: 0.8rem;
}

.mobile-contact-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.mobile-contact-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    transition: all 0.2s ease;
    padding: 0.5rem 0.5rem;
    border-radius: 6px;
    font-size: 0.85rem;
}

.mobile-contact-link i {
    color: var(--color-accent);
    width: 1.2rem;
    font-size: 0.9rem;
}

.mobile-contact-link:hover {
    color: var(--color-accent);
    background: rgba(168, 143, 29, 0.1);
    padding-left: 0.8rem;
}

.site-main {
    position: relative;
    z-index: 1;
}
</style>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{
        searchOpen:     false,
        mobileMenuOpen: false,
        tip: {},
        startPress(k) { this.tip[k]=false; clearTimeout(this._t); this._t=setTimeout(()=>{ this.tip[k]=true; },500); },
        endPress(k)   { clearTimeout(this._t); setTimeout(()=>{ this.tip[k]=false; },1800); }
    }"
    @keydown.escape="searchOpen=false; mobileMenuOpen=false">

    <?php wp_body_open(); ?>

    <a href="#main" class="skip-link">Saltar al contenido principal</a>

    <!-- ============================================================
         TOP BAR RESPONSIVE
         ============================================================ -->
    <div class="flch-topbar" role="complementary" aria-label="Contacto y redes sociales FLCH UNMSM">

        <!-- DESKTOP (≥1024px) -->
        <div class="tb-desktop">

            <div class="tb-contact-group" role="list" aria-label="Información de contacto">
                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-item" role="listitem"
                   aria-label="Directorio FLCH UNMSM">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-address-book"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Directorio</span>
                        <span class="tb-value">FLCH UNMSM</span>
                    </div>
                </a>

                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="tb-item" role="listitem"
                   aria-label="Correo electrónico informatica.letras@unmsm.edu.pe">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Email</span>
                        <span class="tb-value tb-email-val">informatica.letras@unmsm.edu.pe</span>
                    </div>
                    <div class="tb-tooltip" role="tooltip">informatica.letras@unmsm.edu.pe</div>
                </a>

                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-item" role="listitem"
                   aria-label="Horarios académicos Ciclo 2026-I">
                    <div class="tb-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
                    <div class="tb-text">
                        <span class="tb-label">Horarios Académicos</span>
                        <span class="tb-value">Ciclo 2026 - I</span>
                    </div>
                </a>
            </div>

            <div class="tb-badge" role="status" aria-live="polite">
                <span class="tb-badge-dot" aria-hidden="true"></span>
                <span><?php echo apply_filters('flch_topbar_notice', 'Ciclo 2026-I &nbsp;·&nbsp; Consulta tu horario'); ?></span>
            </div>

            <div class="tb-social-group" role="list" aria-label="Redes sociales FLCH">
                <span class="tb-social-label" aria-hidden="true">Síguenos</span>
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc fb" role="listitem"
                   aria-label="Facebook @letrassanmarcos">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <div class="tb-tooltip">@letrassanmarcos</div>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc ig" role="listitem"
                   aria-label="Instagram @letrasunmsm">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <div class="tb-tooltip">@letrasunmsm</div>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc yt" role="listitem"
                   aria-label="YouTube LetrasTV">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <div class="tb-tooltip">LetrasTV</div>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-soc li" role="listitem"
                   aria-label="LinkedIn Letras UNMSM">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <div class="tb-tooltip">Letras UNMSM</div>
                </a>
            </div>
        </div>

        <!-- TABLET (768–1023px) -->
        <div class="tb-tablet" role="complementary" aria-label="Información FLCH">
            <div class="tb-tablet-inner">
                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-item" aria-label="Directorio FLCH UNMSM">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-address-book"></i></div>
                    Directorio
                </a>
                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="tb-tab-item" aria-label="Correo FLCH">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                    <span style="max-width:120px;overflow:hidden;text-overflow:ellipsis;display:block;">informatica.letras…</span>
                </a>
                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-item" aria-label="Horarios 2026-I">
                    <div class="tb-tab-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
                    Horarios 2026-I
                </a>
                <div class="tb-tab-divider" aria-hidden="true"></div>
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc fb" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc ig" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc yt" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-tab-soc li" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <div class="tb-fade-r" aria-hidden="true"></div>
        </div>

        <!-- MÓVIL (<768px): DOS FILAS -->
        <div class="tb-mobile-social" role="list" aria-label="Redes sociales FLCH">
            <span class="tb-mob-follow" aria-hidden="true">Síguenos en</span>
            <div class="tb-mob-social-inner" role="list">
                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc fb"
                   role="listitem"
                   aria-label="Facebook @letrassanmarcos"
                   @touchstart="startPress('fb')"
                   @touchend="endPress('fb')"
                   @touchcancel="endPress('fb')">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.fb" role="tooltip" style="display:none">@letrassanmarcos</div>
                </a>
                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc ig"
                   role="listitem"
                   aria-label="Instagram @letrasunmsm"
                   @touchstart="startPress('ig')"
                   @touchend="endPress('ig')"
                   @touchcancel="endPress('ig')">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.ig" role="tooltip" style="display:none">@letrasunmsm</div>
                </a>
                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc yt"
                   role="listitem"
                   aria-label="YouTube LetrasTV"
                   @touchstart="startPress('yt')"
                   @touchend="endPress('yt')"
                   @touchcancel="endPress('yt')">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.yt" role="tooltip" style="display:none">LetrasTV</div>
                </a>
                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="tb-mob-soc li"
                   role="listitem"
                   aria-label="LinkedIn Letras UNMSM"
                   @touchstart="startPress('li')"
                   @touchend="endPress('li')"
                   @touchcancel="endPress('li')">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <div class="tb-tooltip" x-show="tip.li" role="tooltip" style="display:none">Letras UNMSM</div>
                </a>
            </div>
        </div>

        <div class="tb-mobile-contact" role="list" aria-label="Contacto FLCH">
            <a href="https://letras.unmsm.edu.pe/directorio/"
               target="_blank" rel="noopener noreferrer"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Directorio de la facultad">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-address-book"></i>
                </div>
                <span class="tb-mob-label">Directorio</span>
            </a>
            <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
               target="_blank" rel="noopener noreferrer"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Horarios académicos Ciclo 2026-I">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-clock"></i>
                </div>
                <span class="tb-mob-label">Horarios</span>
            </a>
            <a href="mailto:informatica.letras@unmsm.edu.pe"
               class="tb-mob-contact-btn"
               role="listitem"
               aria-label="Enviar correo a informatica.letras@unmsm.edu.pe">
                <div class="tb-mob-icon" aria-hidden="true">
                    <i class="fas fa-envelope"></i>
                </div>
                <span class="tb-mob-label">Email</span>
            </a>
        </div>

    </div>

    <!-- HEADER PRINCIPAL -->
    <header class="main-header" id="header">
        <div class="header-inner">

            <a href="<?php echo esc_url(home_url('/')); ?>"
               rel="home"
               class="header-logo"
               aria-label="<?php bloginfo('name'); ?> — Inicio">
                <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                     alt="<?php bloginfo('name'); ?>"
                     width="200" height="62">
            </a>

            <nav class="main-nav" aria-label="Menú principal">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-menu',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Walker_Nav()
                ));
                ?>
            </nav>

            <div class="header-actions">

                <button class="header-btn"
                        :class="{ 'active': searchOpen }"
                        @click="searchOpen = !searchOpen; if(searchOpen) $nextTick(() => $refs.searchInput.focus())"
                        aria-label="Abrir buscador"
                        :aria-expanded="searchOpen">
                    <i class="fas fa-search"
                       :style="searchOpen ? 'transform:rotate(90deg)' : ''"
                       style="transition:transform 0.25s ease"></i>
                </button>

                <button class="header-btn menu-toggle"
                        :class="{ 'active': mobileMenuOpen }"
                        @click="mobileMenuOpen = !mobileMenuOpen;
                                document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''"
                        aria-label="Abrir menú de navegación"
                        :aria-expanded="mobileMenuOpen">
                    <i class="fas fa-bars"
                       :style="mobileMenuOpen ? 'transform:rotate(90deg)' : ''"
                       style="transition:transform 0.25s ease"></i>
                </button>
            </div>

        </div>

        <!-- Barra de búsqueda -->
        <div class="search-bar"
             x-show="searchOpen"
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             @click.away="searchOpen = false"
             role="search"
             x-cloak>
            <div class="container-custom" style="padding-top:1.25rem;padding-bottom:1.25rem;">
                <div class="search-title">
                    <i class="fas fa-search"></i>
                    <span>¿Qué estás buscando en la Facultad de Letras?</span>
                </div>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    <div class="search-input-wrapper">
                        <input type="search"
                               id="search-input"
                               x-ref="searchInput"
                               class="search-input"
                               placeholder="Ej: Pregrado, Idiomas, Biblioteca, Admisión…"
                               value="<?php echo get_search_query(); ?>"
                               name="s"
                               autocomplete="off">
                        <button type="button"
                                class="search-clear-btn"
                                @click="$refs.searchInput.value=''; $refs.searchInput.focus()"
                                x-show="$refs.searchInput?.value?.length > 0"
                                x-cloak>
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button type="submit" class="search-submit-btn">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </form>
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:0.7rem;margin-top:0.9rem;">
                    <span style="color:rgba(255,255,255,0.55);font-size:0.78rem;">Sugerencias:</span>
                    <?php
                    $suggestions = ['Pregrado','Posgrado','Idiomas','Biblioteca','Investigación','Admisión','Malla curricular'];
                    foreach ($suggestions as $s):
                    ?>
                    <a href="<?php echo esc_url(home_url('/?s='.urlencode($s))); ?>"
                       class="suggestion-link"><?php echo esc_html($s); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="mobile-menu-panel"
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.away="mobileMenuOpen=false"
             x-cloak>
            <nav class="mobile-nav" aria-label="Menú de navegación móvil">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'mobile-menu',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
                ));
                ?>

                <div class="mobile-contact-info">
                    <h3 class="mobile-contact-title">
                        <i class="fas fa-info-circle"></i> Contacto
                    </h3>
                    <div class="mobile-contact-links">
                        <a href="https://letras.unmsm.edu.pe/directorio/"
                           target="_blank" rel="noopener noreferrer"
                           class="mobile-contact-link">
                            <i class="fas fa-address-book"></i>
                            Directorio FLCH
                        </a>
                        <a href="mailto:informatica.letras@unmsm.edu.pe"
                           class="mobile-contact-link">
                            <i class="fas fa-envelope"></i>
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar toggles de submenús móvil
        const toggleButtons = document.querySelectorAll('.mobile-submenu-toggle');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const parentLi = this.closest('.menu-item-has-children');
                const submenu = parentLi.querySelector('.sub-menu');
                const icon = this.querySelector('i');
                
                if (submenu) {
                    submenu.classList.toggle('open');
                    if (icon) {
                        icon.classList.toggle('rotate-180');
                    }
                }
            });
        });
        
        // Prevenir que los enlaces con submenú cierren el panel al hacer click
        const menuItemsWithChildren = document.querySelectorAll('.mobile-menu .menu-item-has-children > a');
        menuItemsWithChildren.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const toggle = this.nextElementSibling;
                if (toggle && toggle.classList.contains('mobile-submenu-toggle')) {
                    toggle.click();
                }
            });
        });
        
        // Guardar búsquedas recientes
        const form = document.querySelector('form[role="search"]');
        if (form) {
            form.addEventListener('submit', function () {
                const val = document.getElementById('search-input')?.value.trim();
                if (val && val.length > 2) {
                    let recent = JSON.parse(localStorage.getItem('recentSearches') || '[]');
                    recent = [val, ...recent.filter(s => s !== val)].slice(0, 5);
                    localStorage.setItem('recentSearches', JSON.stringify(recent));
                }
            });
        }

        // Restaurar overflow en resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) document.body.style.overflow = '';
        });

        console.log('%cFLCH Header v3 — Responsive Premium', 'color:#A88F1D;font-weight:bold;');
    });
    </script>

    <main id="main" class="site-main">