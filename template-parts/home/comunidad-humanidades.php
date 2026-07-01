<?php
/**
 * Sección N.º 07 — Comunidad FLCH
 * Handoff: tall-left image grid, handoff headings, border-style tags, CTA
 *
 * @package LetrasFLCH
 */
?>
<section id="comunidad" class="kg-community"
         aria-labelledby="comunidad-title"
         x-data="kgHome()"
         x-init="init()">

	<div class="kg-community__inner">
		<div class="kg-community__images reveal">
			<div class="kg-community__img-wrap kg-community__img-wrap--tall">
				<img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800" alt="" loading="lazy">
			</div>
			<div class="kg-community__img-wrap">
				<img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600" alt="" loading="lazy">
			</div>
			<div class="kg-community__img-wrap">
				<img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=600" alt="" loading="lazy">
			</div>
		</div>
		<div class="kg-community__content reveal">
			<div class="kg-community__eyebrow">
				<span class="kg-community__num">N.&#186; 07 —</span>
				Comunidad sanmarquina
			</div>
			<h2 class="kg-community__title" id="comunidad-title">Una comunidad que crea, piensa y transforma</h2>
			<p class="kg-community__desc">De las aulas a los escenarios, de la biblioteca a la investigaci&oacute;n de campo: la vida estudiantil de la FLCH es cultura viva durante todo el a&ntilde;o.</p>
			<div class="kg-community__tags">
				<template x-for="l in logros" :key="l.label">
					<span class="kg-community__tag"><i :class="l.icon"></i><span x-text="l.label"></span></span>
				</template>
			</div>
			<a href="#" class="kg-community__cta">Conoce la vida FLCH <i class="fa-solid fa-arrow-right"></i></a>
		</div>
	</div>
</section>

<style>
.kg-community {
	max-width: 1280px;
	margin: 0 auto;
	padding: 90px 2.5rem 2rem;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.kg-community__inner {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 3.5rem;
	align-items: center;
}
@media (max-width: 1024px) {
	.kg-community__inner { grid-template-columns: 1fr; gap: 2rem; }
}
.kg-community__images {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-template-rows: 200px 150px;
	gap: 14px;
}
.kg-community__img-wrap {
	border-radius: 14px;
	overflow: hidden;
	background: var(--kg-border, rgba(0,0,0,.08));
}
:root.dark .kg-community__img-wrap {
	background: rgba(13,39,71,.5);
}
.kg-community__img-wrap img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}
.kg-community__img-wrap--tall {
	grid-row: 1 / 3;
}
@media (max-width: 768px) {
	.kg-community__images { grid-template-rows: 160px 120px; }
}
.kg-community__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.16em;
	text-transform: uppercase;
	color: var(--kg-gold, #A8861C);
	margin-bottom: 14px;
}
:root.dark .kg-community__eyebrow {
	color: var(--gold, #D6B655);
}
.kg-community__num {
	opacity: 0.6;
}
.kg-community__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1.1;
	letter-spacing: -0.02em;
	font-size: clamp(32px, 4vw, 50px);
	color: var(--ink, #1A2230);
	margin: 0 0 1.25rem;
}
:root.dark .kg-community__title {
	color: #F1F0EC;
}
.kg-community__desc {
	font-size: 16.5px;
	line-height: 1.7;
	color: var(--gray-dark, #6E6B64);
	margin-bottom: 1.75rem;
	max-width: 32em;
}
:root.dark .kg-community__desc {
	color: rgba(255,255,255,.55);
}
.kg-community__tags {
	display: flex;
	flex-wrap: wrap;
	gap: 0.625rem;
	margin-bottom: 1.875rem;
}
.kg-community__tag {
	display: inline-flex;
	align-items: center;
	gap: 0.625rem;
	border: 1px solid var(--kg-border, rgba(0,0,0,.1));
	border-radius: 999px;
	padding: 10px 16px;
	font-size: 13.5px;
	font-weight: 600;
	background: var(--kg-surface, #FFFFFF);
	color: var(--gray-dark, #6E6B64);
}
:root.dark .kg-community__tag {
	border-color: rgba(255,255,255,.1);
	background: var(--kg-navy-800, #0D2747);
	color: rgba(255,255,255,.7);
}
.kg-community__tag i {
	color: var(--kg-gold, #A8861C);
	font-size: 12px;
}
:root.dark .kg-community__tag i {
	color: var(--gold, #D6B655);
}
.kg-community__cta {
	display: inline-flex;
	align-items: center;
	gap: 0.625rem;
	background: var(--kg-gold, #A8861C);
	color: #231d05;
	font-weight: 700;
	padding: 14px 26px;
	border-radius: 9999px;
	text-decoration: none;
	font-size: 14px;
	transition: filter .25s ease;
}
:root.dark .kg-community__cta {
	background: var(--gold, #D6B655);
}
.kg-community__cta:hover {
	filter: brightness(1.08);
}
.kg-community__cta i {
	font-size: 12px;
}
@media (max-width: 768px) {
	.kg-community { padding: 60px 1.5rem 2rem; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
	.kg-community__cta { transition: none !important; }
}
</style>
