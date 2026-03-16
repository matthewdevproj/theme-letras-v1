<?php
/**
<<<<<<< Updated upstream
 * Header template con barra superior separada para FLCH - Versión Final
=======
 * Header template con barra superior separada para FLCH - Versión Final Optimizada
>>>>>>> Stashed changes
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tailwind.css">
    
    <?php wp_head(); ?>
    
    <!-- Theme color -->
    <meta name="theme-color" content="#0A1E3C">
    
    <style>
<<<<<<< HEAD
        /* Estilos personalizados para Alpine.js y mejoras */
        [x-cloak] { display: none !important; }
        
        /* Animaciones personalizadas */
=======
<<<<<<< Updated upstream
        /* ===================================
           ESTILOS INDEPENDIENTES - BARRA SUPERIOR
           =================================== */
        
        /* Contenedor principal de la barra superior */
        .flch-topbar {
            background: linear-gradient(135deg, #1A1A1A 0%, #2A2A2A 100%);
            color: white;
            border-bottom: 1px solid rgba(168, 143, 29, 0.3);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            position: relative;
            font-size: 0.875rem;
        }
        
        /* Efecto de brillo superior */
        .flch-topbar__shine {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 143, 29, 0.5), transparent);
        }
        
        /* Efecto de brillo inferior */
        .flch-topbar__shine-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 143, 29, 0.3), transparent);
        }
        
        /* Contenedor interno */
        .flch-topbar__container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        @media (min-width: 768px) {
            .flch-topbar__container {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
        
        /* Flex container */
        .flch-topbar__inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        
        /* Información de contacto */
        .flch-topbar__contact {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .flch-topbar__divider {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .flch-topbar__divider > *:not(:last-child) {
            border-right: 1px solid rgba(168, 143, 29, 0.2);
            padding-right: 1rem;
        }
        
        .flch-topbar__item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }
        
        .flch-topbar__item:hover {
            color: #A88F1D;
        }
        
        .flch-topbar__icon-wrapper {
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 9999px;
            background-color: rgba(168, 143, 29, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .flch-topbar__item:hover .flch-topbar__icon-wrapper {
            background-color: #A88F1D;
        }
        
        .flch-topbar__icon {
            color: #A88F1D;
            font-size: 0.75rem;
            transition: color 0.3s ease;
        }
        
        .flch-topbar__item:hover .flch-topbar__icon {
            color: white;
        }
        
        .flch-topbar__label {
            display: block;
            color: rgba(168, 143, 29, 0.7);
            font-size: 0.5625rem;
            font-weight: 500;
            line-height: 1.2;
            text-transform: uppercase;
        }
        
        .flch-topbar__value {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.75rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .flch-topbar__item:hover .flch-topbar__value {
            color: white;
        }
        
        /* Email específico */
        .flch-topbar__email {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.75rem;
        }
        
        .flch-topbar__item:hover .flch-topbar__email {
            color: white;
        }
        
        /* Redes sociales */
        .flch-topbar__social {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .flch-topbar__social-text {
            color: rgba(168, 143, 29, 0.5);
            font-size: 0.625rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .flch-topbar__social-grid {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .flch-topbar__social-link {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background-color: rgba(168, 143, 29, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #A88F1D;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .flch-topbar__social-link:hover {
            color: white;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
        }
        
        .flch-topbar__social-link.facebook:hover {
            background-color: #1877F2;
        }
        
        .flch-topbar__social-link.instagram:hover {
            background-color: #E4405F;
        }
        
        .flch-topbar__social-link.youtube:hover {
            background-color: #FF0000;
        }
        
        .flch-topbar__social-link.linkedin:hover {
            background-color: #0077B5;
        }
        
        .flch-topbar__social-icon {
            font-size: 1rem;
        }
        
        /* ===================================
           RESPONSIVE
           =================================== */
        @media (max-width: 1150px) {
            .flch-topbar__value {
                display: none;
            }
            
            .flch-topbar__email {
                font-size: 0.7rem;
            }
            
            .flch-topbar__icon-wrapper {
                width: 1.5rem;
                height: 1.5rem;
            }
        }
        
        @media (max-width: 1024px) {
            .flch-topbar {
                display: none;
            }
        }
        
        /* ===================================
           ESTILOS ADICIONALES QUE YA TENÍAS
           =================================== */
        [x-cloak] { display: none !important; }
        
=======
        /* Estilos personalizados para Alpine.js y mejoras */
        [x-cloak] { display: none !important; }
        
        /* Animaciones personalizadas */
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
<<<<<<< HEAD
        /* Mejora para los íconos sociales */
        .social-icon {
            transition: all 0.3s ease;
        }
        
=======
<<<<<<< Updated upstream
=======
        /* Mejora para los íconos sociales */
        .social-icon {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .social-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }
        
        .social-icon:hover::after {
            width: 100%;
            height: 100%;
        }
        
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .social-icon.facebook:hover { background-color: #1877F2 !important; }
        .social-icon.instagram:hover { background-color: #E4405F !important; }
        .social-icon.youtube:hover { background-color: #FF0000 !important; }
        .social-icon.linkedin:hover { background-color: #0077B5 !important; }
        
<<<<<<< HEAD
        /* Scrollbar personalizada para menú móvil */
=======
        /* Mejora de accesibilidad - foco visible */
        a:focus-visible {
            outline: 2px solid #A88F1D;
            outline-offset: 2px;
            border-radius: 4px;
        }
        
        /* Scrollbar personalizada para menú móvil */
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .mobile-menu::-webkit-scrollbar {
            width: 6px;
        }
        
        .mobile-menu::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }
        
        .mobile-menu::-webkit-scrollbar-thumb {
            background: #A88F1D;
            border-radius: 3px;
        }
        
        .mobile-menu::-webkit-scrollbar-thumb:hover {
            background: #8B7718;
        }
        
<<<<<<< HEAD
        /* Estilos para el menú desktop */
=======
<<<<<<< Updated upstream
=======
        /* Estilos para el menú desktop */
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .main-menu {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .main-menu > li {
            position: relative;
        }
        
        .main-menu > li > a {
            display: block;
            padding: 0.5rem 1rem;
            color: white;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .main-menu > li > a:hover {
            color: #A88F1D;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
<<<<<<< HEAD
        /* Submenús */
=======
<<<<<<< Updated upstream
=======
        /* Submenús */
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .main-menu .sub-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: #0A1E3C;
            border: 1px solid rgba(168, 143, 29, 0.3);
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.3);
            padding: 0.5rem 0;
            min-width: 240px;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }
        
        .main-menu li:hover > .sub-menu {
            opacity: 1;
            visibility: visible;
        }
        
        .main-menu .sub-menu .sub-menu {
            left: 100%;
            top: 0;
            margin-left: 2px;
        }
        
        .main-menu .sub-menu a {
            display: block;
            padding: 0.5rem 1.5rem;
            color: white;
            white-space: nowrap;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .main-menu .sub-menu a:hover {
            background-color: #1E4A7A;
            color: #A88F1D;
            padding-left: 2rem;
        }
        
        .main-menu .sub-menu li:last-child a {
            border-bottom: none;
        }
        
<<<<<<< HEAD
        /* Flechas animadas */
=======
<<<<<<< Updated upstream
=======
        /* Flechas animadas */
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .fa-chevron-down, .fa-chevron-right {
            transition: transform 0.2s ease;
        }
        
        li:hover > a .fa-chevron-down {
            transform: rotate(180deg);
        }
        
        li:hover > a .fa-chevron-right {
            transform: translateX(4px);
        }
        
<<<<<<< HEAD
        /* Rotación para móvil */
=======
<<<<<<< Updated upstream
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
        .rotate-180 {
            transform: rotate(180deg);
        }
=======
        /* Rotación para móvil */
        .rotate-180 {
            transform: rotate(180deg);
        }
        
        /* Animación para tooltips */
        .group:hover .absolute {
            animation: fadeInUp 0.2s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate(-50%, 5px);
            }
            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }
        
        /* Contraste garantizado */
        .text-white\/95 {
            color: rgba(255, 255, 255, 0.95);
        }
>>>>>>> Stashed changes
    </style>
</head>

<body <?php body_class('antialiased bg-white'); ?> 
      x-data="{ searchOpen: false, mobileMenuOpen: false }"
      @keydown.escape="searchOpen = false; mobileMenuOpen = false">
<?php wp_body_open(); ?>

<!-- Skip to content link -->
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-8 focus:left-8 focus:z-50 focus:px-4 focus:py-4 focus:bg-[#A88F1D] focus:text-white focus:rounded-lg">
    Saltar al contenido principal
</a>

<<<<<<< HEAD
<!-- BARRA SUPERIOR - Diseño moderno -->
<div class="hidden lg:block relative bg-gradient-to-r from-[#1A1A1A] to-[#2A2A2A] text-white text-sm border-b border-[#A88F1D]/30 shadow-lg">
=======
<<<<<<< Updated upstream
<!-- BARRA SUPERIOR - Con estilos independientes -->
<div class="flch-topbar hidden lg:block">
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
    
    <!-- Efecto de brillo superior -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/50 to-transparent"></div>
    
    <div class="container-custom">
        <div class="flex justify-between items-center py-2">
            
            <!-- Información de contacto -->
            <div class="flex items-center divide-x divide-[#A88F1D]/20">
                
                <!-- Directorio -->
                <a href="https://letras.unmsm.edu.pe/directorio/" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pr-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-address-book text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">DIRECTORIO</span>
                        <span class="text-white/90 group-hover:text-white text-xs font-medium">FLCH UNMSM</span>
                    </div>
                </a>
                
                <!-- Email -->
                <a href="mailto:informatica.letras@unmsm.edu.pe" 
                   class="flex items-center gap-2 px-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-envelope text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">EMAIL</span>
                        <span class="text-white/80 group-hover:text-white text-xs">informatica.letras@unmsm.edu.pe</span>
                    </div>
                </a>
                
                <!-- Ubicación -->
                <a href="https://maps.app.goo.gl/..." 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pl-5 group">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300">
                        <i class="fas fa-map-marker-alt text-[#A88F1D] group-hover:text-white text-xs"></i>
                    </div>
                    <div>
<<<<<<< HEAD
                        <span class="text-[#A88F1D]/70 text-[9px] font-medium block leading-tight">CAMPUS</span>
                        <span class="text-white/80 group-hover:text-white text-xs">Calle Germán Amézaga N° 375 - Lima</span>
=======
                        <span class="flch-topbar__label">CAMPUS</span>
                        <span class="flch-topbar__value">Calle Germán Amézaga N° 375 - Lima</span>
=======
<!-- BARRA SUPERIOR - Versión optimizada con alto contraste y mejor UX -->
<div class="hidden lg:block relative bg-gradient-to-r from-[#0A1E3C] to-[#143B63] text-white text-sm border-b border-[#A88F1D]/40 shadow-lg">
    
    <!-- Efecto de brillo superior -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/60 to-transparent"></div>
    
    <div class="container-custom">
        <div class="flex justify-between items-center py-2">
            
            <!-- Información de contacto - Mejorada semánticamente -->
            <div class="flex items-center divide-x divide-[#A88F1D]/30">
                
                <!-- Directorio - Con micro-interacción mejorada -->
                <a href="https://letras.unmsm.edu.pe/directorio/" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pr-5 group relative overflow-hidden"
                   aria-label="Directorio FLCH UNMSM">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300 group-hover:scale-110">
                        <i class="fas fa-address-book text-[#A88F1D] group-hover:text-white text-xs transition-colors"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D] text-[9px] font-semibold block leading-tight uppercase tracking-wider">DIRECTORIO</span>
                        <span class="text-white/95 group-hover:text-white text-xs font-medium">Facultad de Letras</span>
                    </div>
                </a>
                
                <!-- Email - Con microtip y mejor contraste -->
                <a href="mailto:informatica.letras@unmsm.edu.pe" 
                   class="flex items-center gap-2 px-5 group relative"
                   aria-label="Enviar correo a informatica.letras@unmsm.edu.pe">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300 group-hover:scale-110">
                        <i class="fas fa-envelope text-[#A88F1D] group-hover:text-white text-xs transition-colors"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D] text-[9px] font-semibold block leading-tight uppercase tracking-wider">EMAIL</span>
                        <span class="text-white/95 group-hover:text-white text-xs font-medium">informatica.letras@...</span>
                    </div>
                    
                    <!-- Tooltip moderno en hover -->
                    <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-[#1E4A7A] text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-lg pointer-events-none z-50">
                        Copiar dirección completa
                    </span>
                </a>
                
                <!-- Ubicación - Con microinteracción de mapa -->
                <a href="https://maps.app.goo.gl/..." 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center gap-2 pl-5 group relative">
                    <div class="w-7 h-7 rounded-full bg-[#A88F1D]/20 flex items-center justify-center group-hover:bg-[#A88F1D] transition-all duration-300 group-hover:scale-110">
                        <i class="fas fa-map-marker-alt text-[#A88F1D] group-hover:text-white text-xs transition-colors"></i>
                    </div>
                    <div>
                        <span class="text-[#A88F1D] text-[9px] font-semibold block leading-tight uppercase tracking-wider">CAMPUS</span>
                        <span class="text-white/95 group-hover:text-white text-xs font-medium">Ciudad Universitaria</span>
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    </div>
                </a>
            </div>
            
<<<<<<< HEAD
            <!-- Redes sociales con hover colors específicos -->
            <div class="flex items-center gap-2">
                <span class="text-[#A88F1D]/50 text-[10px] font-medium uppercase tracking-wider">SÍGUENOS</span>
                <div class="flex items-center gap-2">
=======
<<<<<<< Updated upstream
            <!-- Redes sociales -->
            <div class="flch-topbar__social">
                <span class="flch-topbar__social-text">SÍGUENOS</span>
                <div class="flch-topbar__social-grid">
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/letrassanmarcos" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 facebook"
                       aria-label="Facebook">
<<<<<<< HEAD
                        <i class="fab fa-facebook-f text-base"></i>
=======
                        <i class="fab fa-facebook-f flch-topbar__social-icon"></i>
=======
            <!-- Redes sociales - Con animaciones y estados mejorados -->
            <div class="flex items-center gap-2">
                <span class="text-[#A88F1D] text-[10px] font-semibold uppercase tracking-wider border-r border-[#A88F1D]/30 pr-3">SÍGUENOS</span>
                <div class="flex items-center gap-2">
                    
                    <!-- Facebook - Con efecto ripple simplificado -->
                    <a href="https://www.facebook.com/letrassanmarcos" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-icon w-9 h-9 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-white hover:bg-[#1877F2] transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="Facebook Facultad de Letras">
                        <i class="fab fa-facebook-f text-sm"></i>
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/letrasunmsm/" 
                       target="_blank" 
                       rel="noopener noreferrer"
<<<<<<< HEAD
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 instagram"
                       aria-label="Instagram">
                        <i class="fab fa-instagram text-base"></i>
=======
<<<<<<< Updated upstream
                       class="flch-topbar__social-link instagram"
                       aria-label="Instagram">
                        <i class="fab fa-instagram flch-topbar__social-icon"></i>
=======
                       class="social-icon w-9 h-9 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-white hover:bg-[#E4405F] transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="Instagram Facultad de Letras">
                        <i class="fab fa-instagram text-sm"></i>
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    </a>

                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@LetrasTV-p9j" 
                       target="_blank" 
                       rel="noopener noreferrer"
<<<<<<< HEAD
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 youtube"
                       aria-label="YouTube">
                        <i class="fab fa-youtube text-base"></i>
=======
<<<<<<< Updated upstream
                       class="flch-topbar__social-link youtube"
                       aria-label="YouTube">
                        <i class="fab fa-youtube flch-topbar__social-icon"></i>
=======
                       class="social-icon w-9 h-9 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-white hover:bg-[#FF0000] transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="YouTube Facultad de Letras">
                        <i class="fab fa-youtube text-sm"></i>
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://pe.linkedin.com/school/letrasunmsm/" 
                       target="_blank" 
                       rel="noopener noreferrer"
<<<<<<< HEAD
                       class="social-icon w-10 h-10 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-[#A88F1D] hover:text-white transition-all duration-300 linkedin"
                       aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in text-base"></i>
=======
<<<<<<< Updated upstream
                       class="flch-topbar__social-link linkedin"
                       aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in flch-topbar__social-icon"></i>
=======
                       class="social-icon w-9 h-9 rounded-lg bg-[#A88F1D]/20 flex items-center justify-center text-white hover:bg-[#0077B5] transition-all duration-300 hover:scale-110 hover:shadow-lg"
                       aria-label="LinkedIn Facultad de Letras">
                        <i class="fab fa-linkedin-in text-sm"></i>
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Efecto de brillo inferior -->
<<<<<<< HEAD
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/30 to-transparent"></div>
</div>

<!-- HEADER PRINCIPAL -->
=======
<<<<<<< Updated upstream
    <div class="flch-topbar__shine-bottom"></div>
</div>

<!-- HEADER PRINCIPAL (el resto igual) -->
=======
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#A88F1D]/40 to-transparent"></div>
</div>

<!-- HEADER PRINCIPAL -->
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
<header class="sticky top-0 z-50 bg-gradient-to-r from-[#0A1E3C] to-[#143B63] shadow-lg transition-all duration-300" id="header">
    
    <div class="container-custom">
        <div class="flex items-center justify-between py-3 lg:py-4">
            
            <!-- Logo -->
            <div class="header-logo group bg-[#0A1E3C] p-2 rounded-lg shadow-inner">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block relative">
                    <img src="https://letras.unmsm.edu.pe/wp-content/uploads/2022/09/LOGO-BLANCO-LETRAS-WEB_2.png" 
                         alt="<?php bloginfo('name'); ?>"
                         class="h-12 lg:h-16 w-auto brightness-0 invert transition-all duration-300 group-hover:scale-105"
                         style="filter: brightness(0) invert(1);">
                </a>
            </div>
            
            <!-- Navegación desktop -->
            <nav class="hidden lg:block" aria-label="Menú principal">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-menu flex items-center gap-1',
                    'container'      => false,
                    'depth'          => 3,
                    'fallback_cb'    => false,
                    'walker'         => new Letras_FLCH_Walker_Nav()
                ));
                ?>
            </nav>
            
            <!-- Acciones derecha -->
            <div class="flex items-center space-x-3">
                
                <!-- Botón de búsqueda -->
                <button @click="searchOpen = !searchOpen; if(searchOpen) setTimeout(() => $refs.searchInput.focus(), 300)" 
                        class="relative w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center group"
                        :class="{ 'bg-[#A88F1D]': searchOpen }"
                        aria-label="Abrir buscador">
                    <i class="fas fa-search text-sm transition-all duration-300 group-hover:scale-110"
                       :class="{ 'rotate-90': searchOpen }"></i>
                </button>
                
                <!-- Botón móvil -->
                <button class="block lg:hidden relative w-10 h-10 rounded-full bg-white/10 hover:bg-[#A88F1D] text-white transition-all duration-300 flex items-center justify-center" 
                        @click="mobileMenuOpen = !mobileMenuOpen; if(mobileMenuOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
                        :class="{ 'bg-[#A88F1D]': mobileMenuOpen }"
                        aria-label="Abrir menú móvil">
                    <i class="fas fa-bars text-sm transition-transform duration-300"
                       :class="{ 'rotate-90': mobileMenuOpen }"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Barra de búsqueda -->
    <div class="search-bar overflow-hidden transition-all duration-300 bg-[#0A1E3C] border-t border-[#A88F1D]/30 shadow-inner" 
         x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="searchOpen = false"
         role="search"
         x-cloak>
        <div class="container-custom py-4">
            <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="search-input" class="sr-only">Buscar en el sitio</label>
                <input type="search" 
                       id="search-input"
                       x-ref="searchInput"
                       class="w-full px-5 py-3 pr-12 text-white bg-[#1E3A5F] border border-[#A88F1D]/30 rounded-full focus:outline-none focus:border-[#A88F1D] focus:ring-2 focus:ring-[#A88F1D]/20 transition-all duration-300 placeholder-white/50" 
                       placeholder="Buscar facultades, cursos, noticias..." 
                       value="<?php echo get_search_query(); ?>" 
                       name="s"
                       autocomplete="off">
                
<<<<<<< HEAD
                <!-- Botón limpiar (opcional) -->
=======
<<<<<<< Updated upstream
                <!-- Botón limpiar -->
=======
                <!-- Botón limpiar (opcional) -->
>>>>>>> Stashed changes
>>>>>>> 7ef426153e1f500cb330966d4cdb56bca23abb38
                <button type="button" 
                        class="absolute right-14 top-1/2 -translate-y-1/2 text-white/50 hover:text-white transition-colors"
                        @click="$refs.searchInput.value = ''; $refs.searchInput.focus()"
                        x-show="$refs.searchInput?.value.length > 0"
                        x-cloak>
                    <i class="fas fa-times-circle"></i>
                </button>
            </form>
            
            <!-- Sugerencias -->
            <div class="flex flex-wrap gap-2 mt-3 text-xs text-white/60">
                <span class="text-white/40">Sugerencias:</span>
                <a href="<?php echo esc_url(home_url('/?s=Pregrado')); ?>" class="hover:text-[#A88F1D] transition-colors">Pregrado</a>
                <a href="<?php echo esc_url(home_url('/?s=Posgrado')); ?>" class="hover:text-[#A88F1D] transition-colors">Posgrado</a>
                <a href="<?php echo esc_url(home_url('/?s=Idiomas')); ?>" class="hover:text-[#A88F1D] transition-colors">Centro de Idiomas</a>
                <a href="<?php echo esc_url(home_url('/?s=Biblioteca')); ?>" class="hover:text-[#A88F1D] transition-colors">Biblioteca</a>
                <a href="<?php echo esc_url(home_url('/?s=Investigación')); ?>" class="hover:text-[#A88F1D] transition-colors">Investigación</a>
            </div>
        </div>
    </div>
    
    <!-- Menú móvil -->
    <div class="mobile-menu fixed inset-x-0 top-[72px] lg:hidden bg-[#0A1E3C] shadow-xl border-t border-[#A88F1D]/30 max-h-[calc(100vh-72px)] overflow-y-auto" 
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="mobileMenuOpen = false"
         x-cloak>
        <nav class="px-4 py-6">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'space-y-2',
                'container'      => false,
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Letras_FLCH_Mobile_Walker_Nav()
            ));
            ?>
            
            <!-- Información de contacto en móvil -->
            <div class="mt-8 pt-6 border-t border-white/10">
                <h3 class="text-sm font-semibold text-white mb-4">Contacto</h3>
                <div class="space-y-3 text-sm text-white/80">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone-alt text-[#A88F1D] w-5"></i>
                        <a href="tel:+5101967000" class="hover:text-[#A88F1D]">(01) 619-7000 anexo 2801</a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-address-book text-[#A88F1D] w-5"></i>
                        <a href="https://letras.unmsm.edu.pe/directorio/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="hover:text-[#A88F1D] border-b border-transparent hover:border-[#A88F1D]">
                            Directorio FLCH
                        </a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-[#A88F1D] w-5"></i>
                        <a href="mailto:informatica.letras@unmsm.edu.pe" class="hover:text-[#A88F1D] break-all">informatica.letras@unmsm.edu.pe</a>
                    </div>
                    <div class="flex items-center space-x-3">
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
    // Guardar búsquedas recientes
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
    
    // Prevenir scroll cuando el menú móvil está abierto
    const checkMobileMenu = () => {
        if (window.innerWidth >= 1024) {
            document.body.style.overflow = '';
        }
    };
    
    window.addEventListener('resize', checkMobileMenu);
    
    // Debug
    console.log('Header cargado correctamente');
    console.log('Menú desktop items:', document.querySelectorAll('.main-menu > li').length);
});
</script>

<main id="main" class="site-main">