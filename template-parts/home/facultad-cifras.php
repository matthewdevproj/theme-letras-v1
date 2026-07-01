<?php
/**
 * Template part: Indicadores / Facultad en cifras — spec "Portada FLCH Kingster".
 *
 * Sección editorial plana (sin tarjeta ni degradado): 4 contadores con
 * separador vertical entre columnas. Los números se animan vía el contador
 * GSAP genérico [data-count] ya existente en js/home-animations.js.
 *
 * @package LetrasFLCH
 */
?>
<section id="cifras" class="kg-sec" aria-label="La Facultad en cifras" x-data="kgHome()" x-init="init()">
	<div class="kg-cifras kg-reveal">
		<template x-for="s in stats" :key="s.label">
			<div class="kg-cifras__item">
				<div class="kg-cifras__value" :data-count="s.value" :data-suffix="s.suffix" x-text="s.value + s.suffix">0</div>
				<div class="kg-cifras__label" x-text="s.label"></div>
			</div>
		</template>
	</div>
</section>

<style>
.kg-cifras {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 24px;
	text-align: center;
}
.kg-cifras__item {
	padding: 20px;
	border-right: 1px solid var(--kg-line, rgba(26,34,48,.12));
}
.kg-cifras__item:last-child { border-right: none; }
.kg-cifras__value {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	font-size: clamp(38px, 4.6vw, 56px);
	line-height: 1;
	color: var(--kg-azul, #143B63);
}
.kg-cifras__label {
	font-size: 12.5px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase;
	color: var(--kg-muted, #5E6675); margin-top: 10px;
}

@media (max-width: 1024px) {
	.kg-cifras { grid-template-columns: repeat(2, 1fr); gap: 30px 24px; }
}
@media (max-width: 480px) {
	.kg-cifras { grid-template-columns: repeat(2, 1fr); }
}
</style>
