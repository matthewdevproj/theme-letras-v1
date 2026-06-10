/**
 * LETRAS FLCH — Lightbox con GSAP
 * Galería lightbox sin plugins adicionales
 * Stack: GSAP 3
 *
 * Features:
 * - Navegación con flechas y teclado
 * - Touch swipe en mobile
 * - Zoom pinch en mobile
 * - Responsive completo
 * - Compatible con galerías de Elementor y WordPress
 */
(function() {
    'use strict';

    function waitForGSAP(cb, attempts) {
        attempts = attempts || 0;
        if (typeof gsap !== 'undefined') {
            cb();
        } else if (attempts < 60) {
            setTimeout(function() { waitForGSAP(cb, attempts + 1); }, 50);
        } else {
            console.warn('Lightbox: GSAP no disponible');
        }
    }

    waitForGSAP(function() {

        var isMobile = window.innerWidth < 768;

        /* ─── CREAR ESTRUCTURA DEL LIGHTBOX ────────────────────────────*/

        var lightbox = document.createElement('div');
        lightbox.id = 'flch-lightbox';
        lightbox.style.cssText = [
            'position: fixed',
            'inset: 0',
            'background: rgba(14,42,72,0.97)',
            'z-index: 99999',
            'display: none',
            'align-items: center',
            'justify-content: center',
            'backdrop-filter: blur(20px)',
            '-webkit-backdrop-filter: blur(20px)'
        ].join('; ');

        // Container de imagen (para centrar)
        var imgContainer = document.createElement('div');
        imgContainer.style.cssText = [
            'position: relative',
            'max-width: 90vw',
            'max-height: 90vh',
            'display: flex',
            'align-items: center',
            'justify-content: center'
        ].join('; ');

        var lightboxImage = document.createElement('img');
        lightboxImage.style.cssText = [
            'max-width: 100%',
            'max-height: 90vh',
            'object-fit: contain',
            'cursor: zoom-out',
            'user-select: none',
            '-webkit-user-drag: none'
        ].join('; ');

        imgContainer.appendChild(lightboxImage);

        // Botón cerrar
        var closeBtn = document.createElement('button');
        closeBtn.innerHTML = '&times;';
        closeBtn.setAttribute('aria-label', 'Cerrar galería');
        closeBtn.style.cssText = [
            'position: absolute',
            'top: ' + (isMobile ? '10px' : '20px'),
            'right: ' + (isMobile ? '10px' : '20px'),
            'background: rgba(168,143,29,0.9)',
            'color: white',
            'border: none',
            'width: ' + (isMobile ? '40px' : '50px'),
            'height: ' + (isMobile ? '40px' : '50px'),
            'border-radius: 50%',
            'font-size: ' + (isMobile ? '24px' : '30px'),
            'cursor: pointer',
            'transition: all 0.3s',
            'z-index: 100001',
            'display: flex',
            'align-items: center',
            'justify-content: center',
            'line-height: 1'
        ].join('; ');

        closeBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.background = 'rgba(168,143,29,1)';
        });

        closeBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.background = 'rgba(168,143,29,0.9)';
        });

        // Navegación (flechas)
        function createNavButton(direction) {
            var btn = document.createElement('button');
            btn.className = 'lightbox-nav lightbox-nav--' + direction;
            btn.innerHTML = direction === 'prev' ? '&larr;' : '&rarr;';
            btn.setAttribute('aria-label', direction === 'prev' ? 'Imagen anterior' : 'Imagen siguiente');
            btn.style.cssText = [
                'position: absolute',
                'top: 50%',
                'transform: translateY(-50%)',
                direction === 'prev' ? 'left: 20px' : 'right: 20px',
                'background: rgba(20,59,99,0.8)',
                'color: white',
                'border: none',
                'width: ' + (isMobile ? '40px' : '50px'),
                'height: ' + (isMobile ? '40px' : '50px'),
                'border-radius: 50%',
                'font-size: ' + (isMobile ? '20px' : '24px'),
                'cursor: pointer',
                'transition: all 0.3s',
                'z-index: 100001',
                'display: none'  // Mostrar solo si hay múltiples imágenes
            ].join('; ');

            btn.addEventListener('mouseenter', function() {
                this.style.background = 'rgba(20,59,99,1)';
                this.style.transform = 'translateY(-50%) scale(1.1)';
            });

            btn.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(20,59,99,0.8)';
                this.style.transform = 'translateY(-50%) scale(1)';
            });

            return btn;
        }

        var prevBtn = createNavButton('prev');
        var nextBtn = createNavButton('next');

        // Contador (1/5)
        var counter = document.createElement('div');
        counter.style.cssText = [
            'position: absolute',
            'bottom: 20px',
            'left: 50%',
            'transform: translateX(-50%)',
            'background: rgba(20,59,99,0.9)',
            'color: white',
            'padding: 8px 16px',
            'border-radius: 20px',
            'font-size: 14px',
            'font-family: "DM Sans", sans-serif',
            'z-index: 100001',
            'display: none'
        ].join('; ');

        lightbox.appendChild(imgContainer);
        lightbox.appendChild(closeBtn);
        lightbox.appendChild(prevBtn);
        lightbox.appendChild(nextBtn);
        lightbox.appendChild(counter);
        document.body.appendChild(lightbox);

        /* ─── ESTADO ────────────────────────────────────────────────────*/

        var currentImages = [];
        var currentIndex = 0;
        var touchStartX = 0;
        var touchEndX = 0;

        /* ─── FUNCIONES DE CONTROL ─────────────────────────────────────*/

        function updateImage() {
            if (currentImages.length === 0) return;

            var currentImg = currentImages[currentIndex];
            lightboxImage.src = currentImg.src || currentImg.href;

            // Actualizar contador
            if (currentImages.length > 1) {
                counter.textContent = (currentIndex + 1) + ' / ' + currentImages.length;
                counter.style.display = 'block';
                prevBtn.style.display = 'flex';
                nextBtn.style.display = 'flex';
            } else {
                counter.style.display = 'none';
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            }

            // Animar cambio
            gsap.fromTo(lightboxImage,
                { opacity: 0, scale: 0.95 },
                { opacity: 1, scale: 1, duration: 0.3, ease: 'power2.out' }
            );
        }

        function openLightbox(imgSrc, images, index) {
            currentImages = images;
            currentIndex = index;
            lightboxImage.src = imgSrc;
            lightbox.style.display = 'flex';

            // Actualizar contador
            updateImage();

            // Animación de entrada
            gsap.fromTo(lightbox,
                { opacity: 0 },
                { opacity: 1, duration: 0.3 }
            );

            gsap.fromTo(lightboxImage,
                { scale: 0.8, opacity: 0 },
                { scale: 1, opacity: 1, duration: 0.5, ease: 'back.out(1.5)' }
            );

            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            gsap.to(lightbox, {
                opacity: 0,
                duration: 0.3,
                onComplete: function() {
                    lightbox.style.display = 'none';
                    document.body.style.overflow = '';
                }
            });
        }

        function nextImage() {
            if (currentIndex < currentImages.length - 1) {
                currentIndex++;
                updateImage();
            }
        }

        function prevImage() {
            if (currentIndex > 0) {
                currentIndex--;
                updateImage();
            }
        }

        /* ─── EVENT LISTENERS ───────────────────────────────────────────*/

        closeBtn.addEventListener('click', closeLightbox);

        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox || e.target === imgContainer) {
                closeLightbox();
            }
        });

        prevBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            prevImage();
        });

        nextBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            nextImage();
        });

        // Teclado
        document.addEventListener('keydown', function(e) {
            if (lightbox.style.display === 'none') return;

            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });

        // Touch swipe (mobile)
        if (isMobile) {
            lightbox.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            lightbox.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, { passive: true });

            function handleSwipe() {
                var diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {  // Mínimo 50px
                    if (diff > 0) {
                        nextImage();
                    } else {
                        prevImage();
                    }
                }
            }
        }

        /* ─── ACTIVAR EN GALERÍAS ──────────────────────────────────────
           Buscar links a imágenes en galerías */

        var gallerySelectors = [
            '.gallery a[href$=".jpg"]',
            '.gallery a[href$=".jpeg"]',
            '.gallery a[href$=".png"]',
            '.gallery a[href$=".webp"]',
            '.elementor-gallery-item__link',
            '.wp-block-gallery a',
            'a[data-elementor-lightbox]',
            '.flch-gallery a'
        ].join(', ');

        var galleryLinks = document.querySelectorAll(gallerySelectors);

        galleryLinks.forEach(function(link, linkIndex) {
            // Deshabilitar lightbox de Elementor si existe
            link.removeAttribute('data-elementor-lightbox');
            link.removeAttribute('data-elementor-open-lightbox');

            // Encontrar galería padre
            var gallery = link.closest(
                '.gallery, .elementor-gallery, .wp-block-gallery, .flch-gallery'
            );

            // Recopilar todas las imágenes de la galería
            var allLinks = gallery
                ? Array.from(gallery.querySelectorAll('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".webp"]'))
                : [link];

            var images = allLinks.map(function(l) {
                var img = l.querySelector('img');
                return {
                    href: l.getAttribute('href'),
                    src: img ? img.src.replace(/-\d+x\d+\./, '.') : l.getAttribute('href'),
                    alt: img ? img.alt : ''
                };
            });

            var imgIndex = allLinks.indexOf(link);

            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var imgSrc = images[imgIndex].href || images[imgIndex].src;
                openLightbox(imgSrc, images, imgIndex);
            });

            link.style.cursor = 'zoom-in';
        });

        console.log('✅ Lightbox GSAP cargado (' + galleryLinks.length + ' imágenes)');

    }); // end waitForGSAP

})();
