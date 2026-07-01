/**
 * Carruseles Splide de la portada — spec "Portada FLCH Kingster".
 * Banner de noticias destacadas (fade, autoplay 6s, pausa hover/focus) y
 * carrusel de revistas académicas (perPage responsivo 5/3/2).
 *
 * Los botones prev/next se resuelven vía delegación de eventos en
 * document (en vez de listeners directos en el botón) para que
 * funcionen sin importar el orden/timing en que otros scripts del
 * sitio terminan de inicializar.
 *
 * @package LetrasFLCH
 */
(function () {
    'use strict';

    function ready(fn) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fn);
        } else {
            fn();
        }
    }

    var instances = {};

    function initBannerDestacadas() {
        var el = document.querySelector('.kg-banner__splide');
        if (!el || typeof Splide === 'undefined') return;

        var splide = new Splide(el, {
            type: 'fade',
            rewind: true,
            arrows: false,
            pagination: true,
            autoplay: true,
            interval: 6000,
            pauseOnHover: true,
            pauseOnFocus: true,
            speed: 600,
            keyboard: 'global',
        });
        splide.mount();
        instances.banner = splide;
    }

    function initRevistas() {
        var el = document.querySelector('.kg-rev-splide');
        if (!el || typeof Splide === 'undefined') return;

        var splide = new Splide(el, {
            type: 'slide',
            rewind: true,
            arrows: false,
            pagination: false,
            gap: '22px',
            perPage: 5,
            perMove: 5,
            breakpoints: {
                1024: { perPage: 3, perMove: 3 },
                760:  { perPage: 2, perMove: 2 },
            },
        });
        splide.mount();
        instances.revistas = splide;
    }

    // Delegación: un solo listener en document cubre ambos pares de
    // botones, sin importar cuándo se creó/reemplazó el DOM de cada
    // carrusel ni el orden de ejecución de otros scripts del tema.
    document.addEventListener('click', function (e) {
        var target = e.target.closest && e.target.closest(
            '.kg-banner__prev, .kg-banner__next, .kg-rev-prev, .kg-rev-next'
        );
        if (!target) return;

        if (target.classList.contains('kg-banner__prev') && instances.banner) {
            instances.banner.go('<');
        } else if (target.classList.contains('kg-banner__next') && instances.banner) {
            instances.banner.go('>');
        } else if (target.classList.contains('kg-rev-prev') && instances.revistas) {
            instances.revistas.go('<');
        } else if (target.classList.contains('kg-rev-next') && instances.revistas) {
            instances.revistas.go('>');
        }
    });

    ready(function () {
        initBannerDestacadas();
        initRevistas();
    });
})();
