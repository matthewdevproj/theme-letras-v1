<?php
/**
 * Command palette (⌘K) — overlay de búsqueda federada.
 *
 * El JS (js/kingster-extras.js:initCommandPalette) y el CSS (css/kingster.css)
 * ya implementan el comportamiento completo; esta plantilla solo aporta el
 * markup que ambos esperan encontrar en el DOM.
 *
 * @package LetrasFLCH
 */
?>
<div data-kg-cmdk hidden role="dialog" aria-modal="true" aria-label="Búsqueda" class="kg-cmdk-overlay">
    <div class="kg-cmdk">
        <div class="kg-cmdk__field">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input type="text"
                   data-kg-cmdk-input
                   placeholder="Buscar escuelas, revistas, trámites…"
                   autocomplete="off"
                   aria-label="Buscar en el sitio">
            <span class="kg-cmdk__esc">ESC</span>
        </div>
        <div data-kg-cmdk-results class="kg-cmdk__results" role="listbox" aria-label="Resultados de búsqueda"></div>
        <div class="kg-cmdk__footer">
            <span><kbd>&uarr;</kbd><kbd>&darr;</kbd> navegar</span>
            <span><kbd>&crarr;</kbd> abrir</span>
            <span style="margin-left:auto;">Búsqueda federada · FLCH</span>
        </div>
    </div>
</div>
