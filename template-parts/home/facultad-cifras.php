<?php
/**
 * Sección N.º 06 — Facultad en cifras
 * Handoff: blue gradient card, combined eyebrow centered, circle decorations
 *
 * @package LetrasFLCH
 */
?>
<section id="cifras" class="flch-cifras"
         aria-labelledby="cifras-title"
         x-data="flchHome()"
         x-init="init()">

	<div class="flch-cifras__card reveal">
		<div class="flch-cifras__eyebrow">N.&#186; 06 — Facultad en cifras</div>
		<div class="flch-cifras__grid">
			<template x-for="s in stats" :key="s.label">
				<div class="flch-cifras__stat">
					<div class="flch-cifras__stat-value count"
					     :data-count="s.value"
					     :data-suffix="s.suffix"
					     x-text="s.value + s.suffix">0</div>
					<div class="flch-cifras__stat-label" x-text="s.label"></div>
				</div>
			</template>
		</div>
		<span class="flch-cifras__circle flch-cifras__circle--tl" aria-hidden="true"></span>
		<span class="flch-cifras__circle flch-cifras__circle--br" aria-hidden="true"></span>
	</div>
</section>

<style>
.flch-cifras {
	max-width: 1280px;
	margin: 60px auto 0;
	padding: 0 2.5rem;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.flch-cifras__card {
	position: relative;
	overflow: hidden;
	border-radius: 20px;
	padding: 3rem;
	background: linear-gradient(120deg, #2457A6, #143B63);
	color: #fff;
}
@media (max-width: 768px) {
	.flch-cifras__card { padding: 2rem 1.5rem; }
}
.flch-cifras__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.18em;
	text-transform: uppercase;
	color: var(--gold, #D6B655);
	text-align: center;
	margin-bottom: 2.25rem;
	position: relative;
	z-index: 1;
}
.flch-cifras__grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 1.875rem;
	position: relative;
	z-index: 1;
}
@media (max-width: 1024px) {
	.flch-cifras__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 480px) {
	.flch-cifras__grid { grid-template-columns: 1fr; }
}
.flch-cifras__stat {
	text-align: center;
}
.flch-cifras__stat-value {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1;
	letter-spacing: -0.02em;
	font-size: clamp(44px, 5.5vw, 68px);
	color: #fff;
}
.flch-cifras__stat-label {
	font-size: 13.5px;
	font-weight: 600;
	letter-spacing: 0.04em;
	text-transform: uppercase;
	color: rgba(255,255,255,.75);
	margin-top: 0.75rem;
}
.flch-cifras__circle {
	position: absolute;
	border-radius: 50%;
	border: 1px solid rgba(255,255,255,.1);
	pointer-events: none;
}
.flch-cifras__circle--tl {
	left: -48px;
	top: -48px;
	width: 240px;
	height: 240px;
}
.flch-cifras__circle--br {
	right: 40px;
	bottom: -88px;
	width: 220px;
	height: 220px;
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
}
</style>
