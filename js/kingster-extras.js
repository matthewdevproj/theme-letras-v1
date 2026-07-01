/**
 * Kingster extras — Command palette + GSAP reveals
 * Design system: "Portada FLCH Kingster"
 *
 * GSAP skills applied:
 *   - matchMedia() for responsive / reduced-motion
 *   - ScrollTrigger.batch() for kg-reveal elements
 *   - gsap.utils.toArray() for selector queries
 *   - will-change on animated elements (set via CSS)
 *   - No raw window.addEventListener("scroll")
 *
 * @package LetrasFLCH
 */
(function () {
    'use strict';

    /* ──────────────────────────────────────────────
       Helpers
       ────────────────────────────────────────────── */
    function ready(fn) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fn);
        } else {
            fn();
        }
    }

    function loadGSAP(callback) {
        if (typeof gsap !== 'undefined') {
            callback();
            return;
        }
        var check = setInterval(function () {
            if (typeof gsap !== 'undefined') {
                clearInterval(check);
                callback();
            }
        }, 50);
        setTimeout(function () { clearInterval(check); }, 5000);
    }

    /* ──────────────────────────────────────────────
       1. Command palette (⌘K)
       ────────────────────────────────────────────── */
    function initCommandPalette() {
        var trigger = document.querySelector('[data-kg-search-trigger]');
        var overlay = document.querySelector('[data-kg-cmdk]');
        if (!trigger || !overlay) return;

        var input = overlay.querySelector('[data-kg-cmdk-input]');
        var resultsWrap = overlay.querySelector('[data-kg-cmdk-results]');
        var index = window.kgSearchIndex || [];
        var selIdx = 0;
        var matches = index.slice(0, 8);

        function escapeHtml(s) {
            return String(s).replace(/[&<>"']/g, function (c) {
                return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
            });
        }

        function render() {
            resultsWrap.innerHTML = '';
            if (!matches.length) {
                var empty = document.createElement('div');
                empty.className = 'kg-cmdk__empty';
                empty.textContent = 'Sin resultados.';
                resultsWrap.appendChild(empty);
                return;
            }
            matches.forEach(function (item, i) {
                var a = document.createElement('a');
                a.href = item.href;
                a.className = 'kg-cmdk__row' + (i === selIdx ? ' is-active' : '');
                a.innerHTML =
                    '<span class="kg-cmdk__row-icon"><i class="' + escapeHtml(item.icon) + '" aria-hidden="true"></i></span>' +
                    '<span style="flex:1;display:flex;flex-direction:column;line-height:1.25;min-width:0;">' +
                    '<span class="kg-cmdk__row-title">' + escapeHtml(item.title) + '</span>' +
                    '<span class="kg-cmdk__row-sub">' + escapeHtml(item.sub || '') + '</span></span>' +
                    '<span class="kg-cmdk__row-group">' + escapeHtml(item.group) + '</span>';
                a.addEventListener('mouseenter', function () { selIdx = i; render(); });
                resultsWrap.appendChild(a);
            });
        }

        function filter(q) {
            q = (q || '').toLowerCase().trim();
            matches = !q ? index.slice(0, 8) : index.filter(function (item) {
                return ((item.title || '') + ' ' + (item.sub || '')).toLowerCase().indexOf(q) !== -1;
            }).slice(0, 10);
            selIdx = 0;
            render();
        }

        function openPalette() {
            overlay.hidden = false;
            document.body.style.overflow = 'hidden';
            filter('');
            if (input) { input.value = ''; setTimeout(function () { input.focus(); }, 30); }
        }

        function closePalette() {
            overlay.hidden = true;
            document.body.style.overflow = '';
            trigger.focus();
        }

        trigger.addEventListener('click', openPalette);
        overlay.addEventListener('click', function (e) { if (e.target === overlay) closePalette(); });
        if (input) input.addEventListener('input', function () { filter(input.value); });

        document.addEventListener('keydown', function (e) {
            var isK = e.key === 'k' || e.key === 'K';
            if ((e.metaKey || e.ctrlKey) && isK) {
                e.preventDefault();
                overlay.hidden ? openPalette() : closePalette();
            }
            if (!overlay.hidden) {
                if (e.key === 'Escape') { closePalette(); }
                else if (e.key === 'ArrowDown') { e.preventDefault(); selIdx = Math.min(matches.length - 1, selIdx + 1); render(); }
                else if (e.key === 'ArrowUp') { e.preventDefault(); selIdx = Math.max(0, selIdx - 1); render(); }
                else if (e.key === 'Enter' && matches[selIdx]) { window.location.href = matches[selIdx].href; }
            }
        });
    }

    /* ──────────────────────────────────────────────
       2. GSAP reveals — ScrollTrigger.batch
       ────────────────────────────────────────────── */
    function initGSAPReveals() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        var revealEls = gsap.utils.toArray('.kg-reveal, .kg-rL, .kg-rR');
        if (!revealEls.length) return;

        // matchMedia: responsive + reduced-motion
        var mm = gsap.matchMedia();
        mm.add('(prefers-reduced-motion: no-preference)', function () {
            ScrollTrigger.batch(revealEls, {
                interval: 0.12,
                batchMax: 8,
                onEnter: function (batch) {
                    gsap.to(batch, {
                        opacity: 1,
                        y: 0,
                        x: 0,
                        duration: 0.6,
                        ease: 'power2.out',
                        stagger: 0.08,
                        overwrite: 'auto',
                    });
                },
                onLeave: function (batch) {
                    gsap.set(batch, { clearProps: 'all' });
                },
                onEnterBack: function (batch) {
                    gsap.to(batch, {
                        opacity: 1,
                        y: 0,
                        x: 0,
                        duration: 0.6,
                        ease: 'power2.out',
                        stagger: 0.08,
                        overwrite: 'auto',
                    });
                },
                onLeaveBack: function (batch) {
                    gsap.set(batch, { clearProps: 'all' });
                },
            });
        });

        mm.add('(prefers-reduced-motion: reduce)', function () {
            revealEls.forEach(function (el) {
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
        });

        ScrollTrigger.refresh();
    }

    /* ──────────────────────────────────────────────
       3. TOC generation for single posts
       ────────────────────────────────────────────── */
    function initTOC() {
        var toc = document.getElementById('kg-toc');
        if (!toc) return;

        var article = toc.closest('.kg-single__grid');
        if (!article) return;

        var content = article.querySelector('.kg-single__content');
        if (!content) return;

        var headings = content.querySelectorAll('h2, h3');
        if (headings.length < 2) {
            toc.parentElement.querySelector('.kg-single__toc-title')?.remove();
            return;
        }

        headings.forEach(function (h, i) {
            if (!h.id) {
                h.id = 'kg-toc-' + i;
            }
            var link = document.createElement('a');
            link.href = '#' + h.id;
            link.textContent = h.textContent;
            if (h.tagName === 'H3') {
                link.style.paddingLeft = '14px';
                link.style.fontWeight = '400';
            }
            toc.appendChild(link);
        });
    }

    /* ──────────────────────────────────────────────
       Init
       ────────────────────────────────────────────── */
    ready(function () {
        initCommandPalette();
        initTOC();
        loadGSAP(initGSAPReveals);
    });

})();
