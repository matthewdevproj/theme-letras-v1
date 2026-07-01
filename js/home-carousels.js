/**
 * Carruseles Splide de la portada — spec "Portada FLCH Kingster".
 * Banner de noticias destacadas (fade, autoplay 6s, pausa hover/focus) y
 * carrusel de revistas académicas (perPage responsivo 5/3/2).
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

        var prev = document.querySelector('.kg-banner__prev');
        var next = document.querySelector('.kg-banner__next');
        if (prev) prev.addEventListener('click', function () { splide.go('<'); });
        if (next) next.addEventListener('click', function () { splide.go('>'); });
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

        var prev = document.querySelector('.kg-rev-prev');
        var next = document.querySelector('.kg-rev-next');
        if (prev) prev.addEventListener('click', function () { splide.go('<'); });
        if (next) next.addEventListener('click', function () { splide.go('>'); });
    }

    ready(function () {
        initBannerDestacadas();
        initRevistas();
    });
})();
