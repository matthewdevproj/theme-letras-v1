/**
 * Header Moderno - GSAP Animations
 * FLCH UNMSM
 */

document.addEventListener('DOMContentLoaded', () => {
    // Verificar que GSAP esté disponible
    if (typeof gsap === 'undefined') {
        console.warn('GSAP no está cargado. Las animaciones no funcionarán.');
        return;
    }

    // ═══════════════════════════════════════════════════════════
    // ANIMACIÓN DE ENTRADA DEL HEADER
    // ═══════════════════════════════════════════════════════════
    gsap.from('.header-modern', {
        y: -100,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out',
        clearProps: 'all'
    });

    // ═══════════════════════════════════════════════════════════
    // ANIMACIÓN DE LOS ITEMS DEL MENÚ
    // ═══════════════════════════════════════════════════════════
    gsap.from('.nav-modern > li', {
        y: -20,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: 'power2.out',
        delay: 0.3,
        clearProps: 'all'
    });

    // ═══════════════════════════════════════════════════════════
    // EFECTO PARALLAX SUAVE EN SCROLL (si ScrollTrigger disponible)
    // ═══════════════════════════════════════════════════════════
    if (typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        const headerLogo = document.querySelector('.header-modern img');
        if (headerLogo) {
            gsap.to(headerLogo, {
                scrollTrigger: {
                    trigger: 'body',
                    start: 'top top',
                    end: '200 top',
                    scrub: true
                },
                scale: 0.9,
                ease: 'none'
            });
        }
    }

    // ═══════════════════════════════════════════════════════════
    // HOVER EFFECT CON GSAP (más suave que CSS)
    // ═══════════════════════════════════════════════════════════
    const navLinks = document.querySelectorAll('.nav-modern a');

    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            gsap.to(this, {
                x: 3,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        link.addEventListener('mouseleave', function() {
            gsap.to(this, {
                x: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // ═══════════════════════════════════════════════════════════
    // ANIMACIÓN DE APERTURA DE SEARCH BAR
    // ═══════════════════════════════════════════════════════════
    const searchInput = document.querySelector('input[type="search"]');
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            gsap.to(this, {
                scale: 1.02,
                duration: 0.2,
                ease: 'power1.out'
            });
        });

        searchInput.addEventListener('blur', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.2,
                ease: 'power1.out'
            });
        });
    }

    // ═══════════════════════════════════════════════════════════
    // ANIMACIÓN DE MOBILE MENU
    // ═══════════════════════════════════════════════════════════
    const mobileMenuItems = document.querySelectorAll('.mobile-nav-modern > li');

    // Observer para detectar cuando se abre el menú móvil
    const mobileMenuContainer = document.querySelector('.mobile-nav-modern');
    if (mobileMenuContainer) {
        const observer = new MutationObserver(() => {
            const isVisible = window.getComputedStyle(mobileMenuContainer.parentElement).display !== 'none';

            if (isVisible) {
                gsap.from(mobileMenuItems, {
                    x: -20,
                    opacity: 0,
                    duration: 0.4,
                    stagger: 0.05,
                    ease: 'power2.out',
                    clearProps: 'all'
                });
            }
        });

        observer.observe(mobileMenuContainer.parentElement, {
            attributes: true,
            attributeFilter: ['style', 'class']
        });
    }

    // ═══════════════════════════════════════════════════════════
    // SMOOTH SCROLL PARA ANCHOR LINKS
    // ═══════════════════════════════════════════════════════════
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));

            if (target && this.getAttribute('href') !== '#') {
                e.preventDefault();

                gsap.to(window, {
                    duration: 0.8,
                    scrollTo: {
                        y: target,
                        offsetY: 80 // Altura del header sticky
                    },
                    ease: 'power2.inOut'
                });
            }
        });
    });
});

// ═══════════════════════════════════════════════════════════
// FUNCIÓN PARA TOGGLE DE SUBMENU MÓVIL
// ═══════════════════════════════════════════════════════════
function toggleMobileSubmenu(button) {
    const isExpanded = button.getAttribute('aria-expanded') === 'true';
    const li = button.closest('li');
    const submenu = li.querySelector('.sub-menu');

    if (!submenu) return;

    button.setAttribute('aria-expanded', !isExpanded);

    if (!isExpanded) {
        // Abrir
        submenu.classList.add('is-open');
        submenu.style.display = 'block';

        if (typeof gsap !== 'undefined') {
            gsap.from(submenu.children, {
                y: -10,
                opacity: 0,
                duration: 0.3,
                stagger: 0.05,
                ease: 'power2.out',
                clearProps: 'all'
            });
        }
    } else {
        // Cerrar
        submenu.classList.remove('is-open');

        if (typeof gsap !== 'undefined') {
            gsap.to(submenu, {
                opacity: 0,
                duration: 0.2,
                ease: 'power2.in',
                onComplete: () => {
                    submenu.style.display = 'none';
                    submenu.style.opacity = '';
                }
            });
        } else {
            submenu.style.display = 'none';
        }
    }
}

// ═══════════════════════════════════════════════════════════
// PREVENIR SCROLL DEL BODY CUANDO MENU MÓVIL ESTÁ ABIERTO
// ═══════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // Observer para detectar cambios en el menú móvil
    const observer = new MutationObserver(() => {
        const mobileMenuOpen = document.querySelector('.mobile-menu-container[style*="display: block"]');

        if (mobileMenuOpen) {
            body.style.overflow = 'hidden';
        } else {
            body.style.overflow = '';
        }
    });

    const mobileMenu = document.querySelector('.mobile-menu-container');
    if (mobileMenu) {
        observer.observe(mobileMenu, {
            attributes: true,
            attributeFilter: ['style']
        });
    }
});

// ═══════════════════════════════════════════════════════════
// PERFORMANCE: Reducir animaciones si usuario prefiere
// ═══════════════════════════════════════════════════════════
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    gsap.globalTimeline.timeScale(0);
    console.log('Animaciones reducidas por preferencia del usuario');
}
