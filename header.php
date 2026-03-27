<?php

/**
 * Header template con barra superior separada para FLCH - VERSIÓN PREMIUM RESPONSIVE
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

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">

    <?php wp_head(); ?>

    <!-- Theme color -->
    <meta name="theme-color" content="#0A1E3C">

    <style>
        /* ===================================
           ESTILOS GLOBALES DE CONTRASTE
           =================================== */
        :root {
            --color-primary: #0A1E3C;
            --color-primary-light: #143B63;
            --color-accent: #A88F1D;
            --color-accent-dark: #8B7718;
            --color-accent-glow: rgba(168, 143, 29, 0.35);
            --color-text-light: #FFFFFF;
            --color-text-muted: #E0E0E0;
            --color-text-dim: #B0B0B0;
            --color-bg-dark: #1A1A1A;
            --color-bg-darker: #0F0F0F;
            --color-divider: rgba(168, 143, 29, 0.22);
            --tb-height-sm: 42px;
            --tb-height-md: 46px;
            --tb-height-lg: 52px;
        }

        /* Mejora de contraste para textos */
        body {
            color: #333333;
            line-height: 1.6;
        }

        /* ===================================
           BARRA SUPERIOR - FLCH PREMIUM RESPONSIVE
           =================================== */
        .flch-topbar {
            background: linear-gradient(135deg, #0C0C0C 0%, #1A1A1A 60%, #141414 100%);
            border-bottom: 1px solid var(--color-divider);
            position: relative;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            animation: tb-slide-down 0.55s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes tb-slide-down {
            from { opacity: 0; transform: translateY(-100%); }
            to { opacity: 1; transform: translateY(0); }
        }

        .flch-topbar::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--color-accent) 30%, #D4AF37 50%, var(--color-accent) 70%, transparent 100%);
            opacity: 0.6;
            animation: shimmer-line 4s ease-in-out infinite;
        }

        @keyframes shimmer-line {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.9; }
        }

        .flch-topbar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-divider), transparent);
        }

        .flch-tb-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: var(--tb-height-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            position: relative;
            z-index: 2;
        }

        .flch-tb-contact {
            display: flex;
            align-items: center;
            gap: 0;
            flex-shrink: 0;
        }

        .flch-tb-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            padding: 0.35rem 1.1rem;
            border-radius: 6px;
            transition: all 0.22s ease;
            position: relative;
            white-space: nowrap;
            cursor: pointer;
            color: inherit;
        }

        .flch-tb-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 18px;
            background: var(--color-divider);
        }

        .flch-tb-item:hover {
            color: var(--color-accent);
            background: rgba(168, 143, 29, 0.07);
            transform: translateY(-1px);
        }

        .flch-tb-item:active {
            transform: scale(0.97);
        }

        .flch-tb-icon-ring {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--color-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.22s ease;
            box-shadow: 0 2px 6px rgba(168, 143, 29, 0.3);
        }

        .flch-tb-item:hover .flch-tb-icon-ring {
            transform: scale(1.12) rotate(-5deg);
            box-shadow: 0 4px 10px rgba(168, 143, 29, 0.45);
        }

        .flch-tb-icon-ring i {
            color: #fff;
            font-size: 0.72rem;
        }

        .flch-tb-text {
            display: flex;
            flex-direction: column;
        }

        .flch-tb-label {
            font-size: 0.56rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            color: var(--color-accent);
            line-height: 1.2;
        }

        .flch-tb-value {
            font-size: 0.78rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            transition: color 0.22s ease;
        }

        .flch-tb-item:hover .flch-tb-value {
            color: var(--color-accent);
        }

        .flch-tb-email-val {
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .flch-tb-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(168, 143, 29, 0.12);
            border: 1px solid rgba(168, 143, 29, 0.3);
            border-radius: 20px;
            padding: 0.25rem 0.85rem;
            font-size: 0.7rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.85);
            white-space: nowrap;
            flex-shrink: 0;
        }

        .flch-tb-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4ADE80;
            box-shadow: 0 0 6px rgba(74, 222, 128, 0.6);
            animation: pulse-green 2s infinite;
        }

        @keyframes pulse-green {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.8); }
        }

        .flch-tb-social {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-shrink: 0;
        }

        .flch-tb-social-label {
            font-size: 0.6rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.9px;
            color: rgba(255, 255, 255, 0.4);
        }

        .flch-tb-social-links {
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .flch-tb-soc {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.22s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .flch-tb-soc:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            filter: brightness(1.15);
        }

        .flch-tb-soc:active { transform: scale(0.95); }
        .flch-tb-soc.fb { background: #1877F2; }
        .flch-tb-soc.ig { background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF, #515BD4); }
        .flch-tb-soc.yt { background: #FF0000; }
        .flch-tb-soc.li { background: #0077B5; }

        /* Tooltip */
        .flch-tooltip {
            position: absolute;
            bottom: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%);
            background: #1a1a1a;
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.72rem;
            padding: 0.45rem 0.85rem;
            border-radius: 8px;
            white-space: nowrap;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.18s ease;
            border: 1px solid var(--color-divider);
            z-index: 999;
        }

        .flch-tb-item:hover .flch-tooltip,
        .flch-tb-soc:hover .flch-tooltip,
        .flch-scroll-item:hover .flch-tooltip,
        .flch-scroll-soc:hover .flch-tooltip {
            opacity: 1;
        }

        /* Versión móvil/tablet - Scroll horizontal */
        .flch-tb-scroll-track {
            display: none;
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            scroll-snap-type: x proximity;
            scrollbar-width: none;
            position: relative;
        }

        .flch-tb-scroll-track::-webkit-scrollbar { display: none; }

        .flch-tb-scroll-inner {
            display: flex;
            align-items: center;
            gap: 0;
            padding: 0 0.75rem;
            width: max-content;
            min-width: 100%;
            height: var(--tb-height-sm);
        }

        .flch-tb-fade-left,
        .flch-tb-fade-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 32px;
            pointer-events: none;
            z-index: 5;
            transition: opacity 0.3s ease;
        }

        .flch-tb-fade-left { left: 0; background: linear-gradient(to right, #111 0%, transparent 100%); }
        .flch-tb-fade-right { right: 0; background: linear-gradient(to left, #111 0%, transparent 100%); }

        .flch-scroll-item {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
            padding: 0.3rem 0.85rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            white-space: nowrap;
            scroll-snap-align: start;
            min-width: 44px;
            min-height: 44px;
            position: relative;
        }

        .flch-scroll-item:hover {
            color: var(--color-accent);
            background: rgba(168, 143, 29, 0.08);
        }

        .flch-scroll-item:active { transform: scale(0.96); }

        .flch-scroll-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 14px;
            background: var(--color-divider);
        }

        .flch-scroll-icon {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--color-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 1px 4px rgba(168, 143, 29, 0.3);
        }

        .flch-scroll-icon i { color: #fff; font-size: 0.65rem; }

        .flch-scroll-label {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: rgba(255, 255, 255, 0.88);
        }

        .flch-scroll-divider {
            width: 1px;
            height: 18px;
            background: var(--color-divider);
            margin: 0 0.5rem;
            flex-shrink: 0;
        }

        .flch-scroll-soc {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            font-size: 0.82rem;
            transition: all 0.2s ease;
            min-width: 44px;
            min-height: 44px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        .flch-scroll-soc:hover { transform: scale(1.12); filter: brightness(1.15); }
        .flch-scroll-soc:active { transform: scale(0.93); }
        .flch-scroll-soc.fb { background: #1877F2; }
        .flch-scroll-soc.ig { background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF, #515BD4); }
        .flch-scroll-soc.yt { background: #FF0000; }
        .flch-scroll-soc.li { background: #0077B5; }

        /* Focus visible - Accesibilidad */
        .flch-tb-item:focus-visible,
        .flch-tb-soc:focus-visible,
        .flch-scroll-item:focus-visible,
        .flch-scroll-soc:focus-visible {
            outline: 2px solid var(--color-accent);
            outline-offset: 2px;
            border-radius: 6px;
        }

        /* Responsive breakpoints */
        @media (max-width: 1023px) and (min-width: 768px) {
            .flch-tb-inner { display: none; }
            .flch-tb-scroll-track { display: flex; align-items: center; }
            .flch-tb-scroll-inner { height: var(--tb-height-md); }
            .flch-scroll-email-val { max-width: 110px; overflow: hidden; text-overflow: ellipsis; display: block; }
            .flch-scroll-label { font-size: 0.68rem; }
        }

        @media (max-width: 767px) {
            .flch-tb-inner { display: none; }
            .flch-tb-scroll-track { display: flex; align-items: center; }
            .flch-tb-scroll-inner { height: var(--tb-height-sm); padding: 0 0.5rem; }
            .flch-scroll-label-mobile-hide { display: none; }
            .flch-scroll-item { padding: 0.25rem 0.65rem; }
            .flch-scroll-soc { width: 28px; height: 28px; font-size: 0.78rem; }
        }

        @media (min-width: 1024px) {
            .flch-tb-scroll-track { display: none; }
        }

        @media (max-width: 400px) {
            .flch-scroll-icon { width: 22px; height: 22px; }
            .flch-scroll-icon i { font-size: 0.55rem; }
            .flch-scroll-item { padding: 0.2rem 0.55rem; }
        }

        @media (prefers-reduced-motion: reduce) {
            .flch-topbar, .flch-topbar::before, .flch-tb-badge-dot {
                animation: none;
            }
            * { transition-duration: 0.01ms !important; }
        }

        /* ===================================
           HEADER PRINCIPAL - CONTRASTE MEJORADO
           =================================== */
        .main-header {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(168, 143, 29, 0.2);
        }

        /* Navegación desktop */
        .main-menu {
            display: flex;
            align-items: center;
            gap: 0.2rem;
        }

        .main-menu > li {
            position: relative;
        }

        .main-menu > li > a {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.6rem 1.1rem;
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            white-space: nowrap;
            letter-spacing: 0.3px;
        }

        .main-menu > li > a:hover {
            color: var(--color-accent);
            background-color: rgba(255, 255, 255, 0.08);
        }

        /* Submenús */
        .main-menu .sub-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: var(--color-primary);
            border: 1px solid rgba(168, 143, 29, 0.3);
            border-radius: 0.5rem;
            box-shadow: 0 15px 30px -8px rgba(0, 0, 0, 0.4);
            padding: 0.6rem 0;
            min-width: 250px;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
            margin-top: 0.2rem;
        }

        .main-menu li:hover > .sub-menu {
            opacity: 1;
            visibility: visible;
        }

        .main-menu .sub-menu .sub-menu {
            left: 100%;
            top: -0.6rem;
            margin-left: 2px;
        }

        .main-menu .sub-menu a {
            display: block;
            padding: 0.7rem 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            white-space: nowrap;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .main-menu .sub-menu a:hover {
            background-color: #1E4A7A;
            color: var(--color-accent);
            padding-left: 2rem;
        }

        .main-menu .sub-menu li:last-child a {
            border-bottom: none;
        }

        /* Flechas animadas */
        .fa-chevron-down {
            font-size: 0.7rem;
            transition: transform 0.2s ease;
            opacity: 0.8;
        }

        li:hover > a .fa-chevron-down {
            transform: rotate(180deg);
            opacity: 1;
        }

        /* ===================================
           BARRA DE BÚSQUEDA - CONTRASTE ÓPTIMO
           =================================== */
        .search-bar {
            background-color: var(--color-primary) !important;
            border-top: 1px solid rgba(168, 143, 29, 0.25) !important;
            border-bottom: 1px solid rgba(168, 143, 29, 0.1) !important;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.4) !important;
            position: relative;
            z-index: 45;
        }

        .search-bar .search-title {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: 0.3px;
        }

        .search-bar .search-title i {
            color: var(--color-accent);
            font-size: 0.9rem;
        }

        .search-bar .search-input-wrapper {
            position: relative;
            width: 100%;
        }

        .search-bar .search-input {
            background-color: #132A45 !important;
            border: 2px solid rgba(168, 143, 29, 0.3) !important;
            color: white !important;
            border-radius: 0.75rem !important;
            padding: 1rem 8rem 1rem 1.5rem !important;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .search-bar .search-input:focus {
            border-color: var(--color-accent) !important;
            outline: none !important;
            box-shadow: 0 0 0 4px rgba(168, 143, 29, 0.2) !important;
            background-color: #153250 !important;
        }

        .search-bar .search-input::placeholder {
            color: rgba(255, 255, 255, 0.55) !important;
            font-weight: 300;
        }

        .search-bar .search-clear-btn {
            position: absolute;
            right: 5.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }

        .search-bar .search-clear-btn:hover {
            color: white;
        }

        .search-bar .search-submit-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--color-accent);
            color: white;
            font-weight: 600;
            padding: 0.6rem 1.3rem;
            border-radius: 0.6rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 0.9rem;
        }

        .search-bar .search-submit-btn:hover {
            background-color: var(--color-accent-dark);
            transform: translateY(-50%) scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .search-bar .suggestions-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .search-bar .suggestions-label {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .search-bar .suggestions-label i {
            color: var(--color-accent);
            font-size: 0.75rem;
        }

        .search-bar .suggestion-link {
            display: inline-block;
            padding: 0.4rem 1.1rem;
            background-color: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            border-radius: 9999px;
            font-size: 0.8rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.25s ease;
            text-decoration: none;
            font-weight: 400;
        }

        .search-bar .suggestion-link:hover {
            background-color: var(--color-accent);
            color: white;
            border-color: var(--color-accent);
            transform: translateY(-2px);
        }

        .search-bar .popular-searches {
            margin-top: 1.2rem;
            padding-top: 0.8rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.8rem;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.45);
        }

        .search-bar .popular-searches i {
            color: var(--color-accent);
            font-size: 0.75rem;
        }

        .search-bar .popular-tag {
            background-color: rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.7);
            padding: 0.25rem 0.8rem;
            border-radius: 9999px;
            transition: all 0.2s ease;
        }

        .search-bar .popular-tag:hover {
            background-color: rgba(168, 143, 29, 0.2);
            color: white;
        }

        /* ===================================
           MENÚ MÓVIL - CONTRASTE MEJORADO
           =================================== */
        .mobile-menu {
            background-color: var(--color-primary) !important;
            border-top: 1px solid rgba(168, 143, 29, 0.25) !important;
            box-shadow: 0 15px 25px -8px rgba(0, 0, 0, 0.4) !important;
        }

        .mobile-menu a {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 0.8rem 1rem !important;
            display: block !important;
            transition: all 0.2s ease !important;
            border-radius: 0.5rem !important;
            font-weight: 400;
        }

        .mobile-menu a:hover {
            background-color: #1E4A7A !important;
            color: var(--color-accent) !important;
            padding-left: 1.5rem !important;
        }

        .mobile-menu .menu-item-has-children > div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .mobile-submenu-toggle {
            color: rgba(255, 255, 255, 0.7) !important;
            padding: 0.75rem 1rem !important;
            border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
            background: transparent !important;
            transition: all 0.2s ease !important;
        }

        .mobile-submenu-toggle:hover {
            background-color: #1E4A7A !important;
            color: var(--color-accent) !important;
        }

        .mobile-menu ul ul {
            margin-left: 1rem !important;
            padding-left: 1rem !important;
            border-left: 2px solid var(--color-accent) !important;
            background-color: rgba(0, 0, 0, 0.2) !important;
        }

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        /* Scrollbar personalizada */
        .mobile-menu::-webkit-scrollbar {
            width: 6px;
        }

        .mobile-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .mobile-menu::-webkit-scrollbar-thumb {
            background: var(--color-accent);
            border-radius: 3px;
        }

        .mobile-menu::-webkit-scrollbar-thumb:hover {
            background: var(--color-accent-dark);
        }

        /* Utilidades */
        [x-cloak] {
            display: none !important;
        }

        .rotate-90 {
            transform: rotate(90deg);
        }

        /* Ajustes de espaciado general */
        .container-custom {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Garantizar contraste en todo */
        .text-white\/90 {
            color: rgba(255, 255, 255, 0.95) !important;
        }
        
        .text-white\/80 {
            color: rgba(255, 255, 255, 0.9) !important;
        }
    </style>
</head>

<body <?php body_class('antialiased bg-white'); ?>
    x-data="{ 
        searchOpen: false, 
        mobileMenuOpen: false,
        tbAtStart: true,
        tbAtEnd: false,
        tbPressTimer: null,
        tbStartPress(key) {
            this.tbPressTimer = setTimeout(() => { this[key] = true; }, 500);
        },
        tbEndPress(key) {
            clearTimeout(this.tbPressTimer);
            setTimeout(() => { this[key] = false; }, 1800);
        },
        tbUpdateFades(el) {
            this.tbAtStart = el.scrollLeft <= 4;
            this.tbAtEnd = el.scrollLeft + el.clientWidth >= el.scrollWidth - 4;
        }
    }"
    @keydown.escape="searchOpen = false; mobileMenuOpen = false">
    <?php wp_body_open(); ?>

    <!-- Skip to content link -->
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-5 focus:py-3 focus:bg-[#A88F1D] focus:text-white focus:rounded-lg focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-white">
        Saltar al contenido principal
    </a>

    <!-- BARRA SUPERIOR - FLCH PREMIUM RESPONSIVE -->
    <div class="flch-topbar" role="complementary" aria-label="Información de contacto y redes sociales FLCH UNMSM">

        <!-- VERSIÓN DESKTOP (≥1024px) -->
        <div class="flch-tb-inner">

            <div class="flch-tb-contact" role="list" aria-label="Información de contacto">
                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flch-tb-item"
                   role="listitem"
                   aria-label="Directorio de la Facultad de Letras y Ciencias Humanas UNMSM">
                    <div class="flch-tb-icon-ring" aria-hidden="true">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <div class="flch-tb-text">
                        <span class="flch-tb-label">Directorio</span>
                        <span class="flch-tb-value">FLCH UNMSM</span>
                    </div>
                </a>

                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="flch-tb-item"
                   role="listitem"
                   aria-label="Correo electrónico: informatica.letras@unmsm.edu.pe">
                    <div class="flch-tb-icon-ring" aria-hidden="true">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="flch-tb-text">
                        <span class="flch-tb-label">Email</span>
                        <span class="flch-tb-value flch-tb-email-val">informatica.letras@unmsm.edu.pe</span>
                    </div>
                    <div class="flch-tooltip" role="tooltip">informatica.letras@unmsm.edu.pe</div>
                </a>

                <a href="tel:+5101619700028001"
                   class="flch-tb-item"
                   role="listitem"
                   aria-label="Teléfono: (01) 619-7000 anexo 2801">
                    <div class="flch-tb-icon-ring" aria-hidden="true">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="flch-tb-text">
                        <span class="flch-tb-label">Teléfono</span>
                        <span class="flch-tb-value">(01) 619-7000 ext. 2801</span>
                    </div>
                </a>

                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flch-tb-item"
                   role="listitem"
                   aria-label="Horarios académicos Ciclo 2026-I">
                    <div class="flch-tb-icon-ring" aria-hidden="true">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flch-tb-text">
                        <span class="flch-tb-label">Horarios Académicos</span>
                        <span class="flch-tb-value">Ciclo 2026 - I</span>
                    </div>
                </a>
            </div>

            <div class="flch-tb-badge" role="status" aria-live="polite">
                <span class="flch-tb-badge-dot" aria-hidden="true"></span>
                <span><?php echo apply_filters('flch_topbar_notice', 'Ciclo 2026-I &nbsp;·&nbsp; Matrículas abiertas'); ?></span>
            </div>

            <div class="flch-tb-social" role="list" aria-label="Redes sociales FLCH">
                <span class="flch-tb-social-label" aria-hidden="true">Síguenos</span>
                <div class="flch-tb-social-links">
                    <a href="https://www.facebook.com/letrassanmarcos"
                       target="_blank" rel="noopener noreferrer"
                       class="flch-tb-soc fb"
                       role="listitem"
                       aria-label="Facebook de Letras San Marcos">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <div class="flch-tooltip" role="tooltip">@letrassanmarcos</div>
                    </a>
                    <a href="https://www.instagram.com/letrasunmsm/"
                       target="_blank" rel="noopener noreferrer"
                       class="flch-tb-soc ig"
                       role="listitem"
                       aria-label="Instagram de Letras UNMSM">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <div class="flch-tooltip" role="tooltip">@letrasunmsm</div>
                    </a>
                    <a href="https://www.youtube.com/@LetrasTV-p9j"
                       target="_blank" rel="noopener noreferrer"
                       class="flch-tb-soc yt"
                       role="listitem"
                       aria-label="YouTube de Letras TV">
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <div class="flch-tooltip" role="tooltip">LetrasTV</div>
                    </a>
                    <a href="https://pe.linkedin.com/school/letrasunmsm/"
                       target="_blank" rel="noopener noreferrer"
                       class="flch-tb-soc li"
                       role="listitem"
                       aria-label="LinkedIn de Letras UNMSM">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        <div class="flch-tooltip" role="tooltip">Letras UNMSM</div>
                    </a>
                </div>
            </div>
        </div>

        <!-- VERSIÓN MÓVIL + TABLET (<1024px) - Scroll horizontal -->
        <div class="flch-tb-scroll-track"
             role="complementary"
             aria-label="Información FLCH — desplaza horizontalmente"
             x-ref="tbScrollTrack"
             @scroll="tbUpdateFades($refs.tbScrollTrack)"
             x-init="$nextTick(() => tbUpdateFades($refs.tbScrollTrack))">

            <div class="flch-tb-fade-left" :style="tbAtStart ? 'opacity:0' : 'opacity:1'" aria-hidden="true"></div>

            <div class="flch-tb-scroll-inner" role="list">

                <a href="https://letras.unmsm.edu.pe/directorio/"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-item"
                   role="listitem"
                   aria-label="Directorio FLCH UNMSM"
                   @touchstart="tbStartPress('tipDir')"
                   @touchend="tbEndPress('tipDir')"
                   @touchcancel="tbEndPress('tipDir')">
                    <div class="flch-scroll-icon" aria-hidden="true"><i class="fas fa-address-book"></i></div>
                    <span class="flch-scroll-label flch-scroll-label-mobile-hide">Directorio</span>
                    <div class="flch-tooltip" x-show="tipDir" role="tooltip" style="display:none">Directorio FLCH</div>
                </a>

                <a href="https://letras.unmsm.edu.pe/horarios-flch.php"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-item"
                   role="listitem"
                   aria-label="Horarios académicos Ciclo 2026-I"
                   @touchstart="tbStartPress('tipHor')"
                   @touchend="tbEndPress('tipHor')"
                   @touchcancel="tbEndPress('tipHor')">
                    <div class="flch-scroll-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
                    <span class="flch-scroll-label flch-scroll-label-mobile-hide">Horarios 2026-I</span>
                    <div class="flch-tooltip" x-show="tipHor" role="tooltip" style="display:none">Horarios Ciclo 2026-I</div>
                </a>

                <a href="tel:+5101619700028001"
                   class="flch-scroll-item"
                   role="listitem"
                   aria-label="Teléfono (01) 619-7000 anexo 2801"
                   @touchstart="tbStartPress('tipTel')"
                   @touchend="tbEndPress('tipTel')"
                   @touchcancel="tbEndPress('tipTel')">
                    <div class="flch-scroll-icon" aria-hidden="true"><i class="fas fa-phone-alt"></i></div>
                    <span class="flch-scroll-label flch-scroll-label-mobile-hide">(01) 619-7000</span>
                    <div class="flch-tooltip" x-show="tipTel" role="tooltip" style="display:none">(01) 619-7000 ext. 2801</div>
                </a>

                <a href="mailto:informatica.letras@unmsm.edu.pe"
                   class="flch-scroll-item"
                   role="listitem"
                   aria-label="Correo: informatica.letras@unmsm.edu.pe"
                   @touchstart="tbStartPress('tipEmail')"
                   @touchend="tbEndPress('tipEmail')"
                   @touchcancel="tbEndPress('tipEmail')">
                    <div class="flch-scroll-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                    <span class="flch-scroll-label flch-scroll-label-mobile-hide flch-scroll-email-val">informatica.letras…</span>
                    <div class="flch-tooltip" x-show="tipEmail" role="tooltip" style="display:none">informatica.letras@unmsm.edu.pe</div>
                </a>

                <div class="flch-scroll-divider" aria-hidden="true"></div>

                <a href="https://www.facebook.com/letrassanmarcos"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-soc fb"
                   role="listitem"
                   aria-label="Facebook @letrassanmarcos"
                   @touchstart="tbStartPress('tipFb')"
                   @touchend="tbEndPress('tipFb')"
                   @touchcancel="tbEndPress('tipFb')">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <div class="flch-tooltip" x-show="tipFb" role="tooltip" style="display:none">@letrassanmarcos</div>
                </a>

                <a href="https://www.instagram.com/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-soc ig"
                   role="listitem"
                   aria-label="Instagram @letrasunmsm"
                   @touchstart="tbStartPress('tipIg')"
                   @touchend="tbEndPress('tipIg')"
                   @touchcancel="tbEndPress('tipIg')">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <div class="flch-tooltip" x-show="tipIg" role="tooltip" style="display:none">@letrasunmsm</div>
                </a>

                <a href="https://www.youtube.com/@LetrasTV-p9j"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-soc yt"
                   role="listitem"
                   aria-label="YouTube LetrasTV"
                   @touchstart="tbStartPress('tipYt')"
                   @touchend="tbEndPress('tipYt')"
                   @touchcancel="tbEndPress('tipYt')">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <div class="flch-tooltip" x-show="tipYt" role="tooltip" style="display:none">LetrasTV</div>
                </a>

                <a href="https://pe.linkedin.com/school/letrasunmsm/"
                   target="_blank" rel="noopener noreferrer"
                   class="flch-scroll-soc li"
                   role="listitem"
                   aria-label="LinkedIn Letras UNMSM"
                   @touchstart="tbStartPress('tipLi')"
                   @touchend="tbEndPress('tipLi')"
                   @touchcancel="tbEndPress('tipLi')">
                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    <div class="flch-tooltip" x-show="tipLi" role="tooltip" style="display:none">Letras UNMSM</div>
                </a>

            </div>

            <div class="flch-tb-fade-right" :style="tbAtEnd ? 'opacity:0' : 'opacity:1'" aria-hidden="true"></div>
        </div>
    </div>

    <!-- HEADER PRINCIPAL -->
    <header class="sticky top-0 z-50 main-header" id="header">

        <div class="container-custom">
            <div class="flex items-center justify-between py-3 lg:py-4">

                <!-- Logo -->
                <div class="header-logo group">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block relative">
                        <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png"
                            alt="<?php bloginfo('name'); ?>"
                            class="h-10 md:h-12 lg:h-16 w-auto brightness-0 invert transition-all duration-300 group-hover:scale-105"
                            style="filter: brightness(0) invert(1);">
                    </a>
                </div>

                <!-- Navegación desktop -->
                <nav class="hidden lg:block" aria-label="Menú principal">
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

                <!-- Acciones derecha -->
                <div class="flex items-center space-x-2 md:space-x-3">

                    <!-- Botón de búsqueda -->
                    <button @click="searchOpen = !searchOpen; if(searchOpen) setTimeout(() => $refs.searchInput.focus(), 300)"
                        class="relative w-9 h-9 md:w-10 md:h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        :class="{ 'bg-[#A88F1D]': searchOpen }"
                        aria-label="Abrir buscador">
                        <i class="fas fa-search text-sm md:text-base transition-all duration-300 group-hover:scale-110"
                            :class="{ 'rotate-90': searchOpen }"></i>
                    </button>

                    <!-- Botón móvil -->
                    <button class="block lg:hidden relative w-9 h-9 md:w-10 md:h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center"
                        @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
                        :class="{ 'bg-[#A88F1D]': mobileMenuOpen }"
                        aria-label="Abrir menú móvil">
                        <i class="fas fa-bars text-sm md:text-base transition-transform duration-300"
                            :class="{ 'rotate-90': mobileMenuOpen }"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="search-bar overflow-hidden transition-all duration-500" 
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
            <div class="container-custom py-6">
                
                <div class="search-title">
                    <i class="fas fa-search"></i>
                    <span>¿Qué estás buscando en la Facultad de Letras?</span>
                </div>
                
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <label for="search-input" class="sr-only">Buscar en el sitio</label>
                    
                    <div class="search-input-wrapper">
                        <input type="search" 
                               id="search-input"
                               x-ref="searchInput"
                               class="search-input"
                               placeholder="Ej: Pregrado, Posgrado, Idiomas, Biblioteca, Admisión..." 
                               value="<?php echo get_search_query(); ?>" 
                               name="s"
                               autocomplete="off">
                        
                        <button type="button" 
                                class="search-clear-btn"
                                @click="$refs.searchInput.value = ''; $refs.searchInput.focus()"
                                x-show="$refs.searchInput?.value.length > 0"
                                x-cloak>
                            <i class="fas fa-times-circle"></i>
                        </button>
                        
                        <button type="submit" 
                                class="search-submit-btn">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </form>
                
                <div class="suggestions-container">
                    <span class="suggestions-label">
                        <i class="fas fa-lightbulb"></i>
                        <span>Sugerencias:</span>
                    </span>
                    
                    <div class="flex flex-wrap gap-2">
                        <a href="<?php echo esc_url(home_url('/?s=Pregrado')); ?>" class="suggestion-link">Pregrado</a>
                        <a href="<?php echo esc_url(home_url('/?s=Posgrado')); ?>" class="suggestion-link">Posgrado</a>
                        <a href="<?php echo esc_url(home_url('/?s=Idiomas')); ?>" class="suggestion-link">Idiomas</a>
                        <a href="<?php echo esc_url(home_url('/?s=Biblioteca')); ?>" class="suggestion-link">Biblioteca</a>
                        <a href="<?php echo esc_url(home_url('/?s=Investigación')); ?>" class="suggestion-link">Investigación</a>
                        <a href="<?php echo esc_url(home_url('/?s=Admisión')); ?>" class="suggestion-link">Admisión</a>
                        <a href="<?php echo esc_url(home_url('/?s=Malla curricular')); ?>" class="suggestion-link">Malla curricular</a>
                    </div>
                </div>
                
                <div class="popular-searches">
                    <i class="fas fa-chart-line"></i>
                    <span>Búsquedas populares:</span>
                    <div class="flex flex-wrap gap-2">
                        <span class="popular-tag">Docentes</span>
                        <span class="popular-tag">Calendario académico</span>
                        <span class="popular-tag">Trámites</span>
                        <span class="popular-tag">CEID</span>
                        <span class="popular-tag">Posgrado</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div class="mobile-menu fixed inset-x-0 top-[65px] md:top-[72px] lg:hidden shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-65px)] md:max-h-[calc(100vh-72px)] overflow-y-auto"
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            @click.away="mobileMenuOpen = false"
            x-cloak>
            <nav class="px-4 py-5">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'space-y-1',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
                ));
                ?>

                <div class="mt-8 pt-6 border-t border-white/10">
                    <h3 class="text-sm font-semibold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-[#A88F1D]"></i>
                        Contacto
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-phone-alt text-[#A88F1D] w-5"></i>
                            <a href="tel:+5101967000" class="hover:text-[#A88F1D] transition-colors">(01) 619-7000 anexo 2801</a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-address-book text-[#A88F1D] w-5"></i>
                            <a href="https://letras.unmsm.edu.pe/directorio/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-[#A88F1D] transition-colors">
                                Directorio FLCH
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-envelope text-[#A88F1D] w-5"></i>
                            <a href="mailto:informatica.letras@unmsm.edu.pe" class="hover:text-[#A88F1D] transition-colors break-all">informatica.letras@unmsm.edu.pe</a>
                        </div>
                        <div class="flex items-center space-x-3 text-white/80">
                            <i class="fas fa-map-marker-alt text-[#A88F1D] w-5"></i>
                            <span>Calle Germán Amézaga N° 375 - Lima</span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Script para toggle de submenús móvil -->
    <script>
        function toggleMobileSubmenu(button) {
            const submenu = button.closest('li').querySelector('ul.sub-menu');
            const icon = button.querySelector('i');

            if (submenu) {
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            }
            return false;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.querySelector('.search-form');
            if (searchForm) {
                searchForm.addEventListener('submit', function() {
                    const input = document.getElementById('search-input');
                    const searchTerm = input.value.trim();

                    if (searchTerm && searchTerm.length > 2) {
                        let recentSearches = JSON.parse(localStorage.getItem('recentSearches') || '[]');
                        recentSearches = [searchTerm, ...recentSearches.filter(s => s !== searchTerm)].slice(0, 5);
                        localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
                    }
                });
            }

            const checkMobileMenu = () => {
                if (window.innerWidth >= 1024) {
                    document.body.style.overflow = '';
                }
            };

            window.addEventListener('resize', checkMobileMenu);
            
            console.log('Header FLCH cargado correctamente - Versión Responsive Premium');
        });
    </script>

    <main id="main" class="site-main">