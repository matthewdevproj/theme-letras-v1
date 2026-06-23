<?php
/**
 * Sección N.º 05 — Agenda académica y cultural
 * Handoff: timeline con cards, badges y CTA
 *
 * @package LetrasFLCH
 */
?>
<section id="agenda" class="flch-agenda"
         aria-labelledby="agenda-title"
         x-data="flchHome()"
         x-init="init()">

	<div class="flch-agenda__inner">
		<div class="flch-agenda__side reveal">
			<div class="flch-agenda__eyebrow">
				<span class="flch-agenda__num">N.&#186; 05 —</span>
				Vida acad&eacute;mica y cultural
			</div>
			<h2 class="flch-agenda__title" id="agenda-title">Agenda de la Facultad</h2>
			<p class="flch-agenda__side-desc">Congresos, seminarios, sustentaciones, presentaciones de libros y actividades culturales a lo largo del ciclo.</p>
			<a href="#" class="flch-agenda__cta">Ver agenda completa <i class="fa-solid fa-arrow-right"></i></a>
		</div>
		<div class="flch-agenda__list">
			<span class="flch-agenda__line" aria-hidden="true"></span>
			<template x-for="e in agenda" :key="e.title">
				<div class="flch-agenda__item reveal">
					<span class="flch-agenda__dot"></span>
					<div class="flch-agenda__card">
						<div class="flch-agenda__card-header">
							<span class="flch-agenda__badge" x-text="e.type"></span>
							<span class="flch-agenda__meta"><i class="fa-regular fa-calendar"></i><span x-text="e.date + ' · ' + e.time"></span></span>
						</div>
						<h3 class="flch-agenda__item-title" x-text="e.title"></h3>
						<span class="flch-agenda__place"><i class="fa-solid fa-location-dot"></i><span x-text="e.place"></span></span>
					</div>
				</div>
			</template>
		</div>
	</div>
</section>

<style>
.flch-agenda {
	max-width: 1280px;
	margin: 0 auto;
	padding: 90px 2.5rem 2rem;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.flch-agenda__inner {
	display: grid;
	grid-template-columns: 0.85fr 1.15fr;
	gap: 3.5rem;
	align-items: start;
}
@media (max-width: 1024px) {
	.flch-agenda__inner { grid-template-columns: 1fr; gap: 2.5rem; }
}
.flch-agenda__side {
	position: sticky;
	top: 7rem;
}
@media (max-width: 1024px) {
	.flch-agenda__side { position: static; }
}
.flch-agenda__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.16em;
	text-transform: uppercase;
	color: var(--flch-gold, #A8861C);
	margin-bottom: 14px;
}
:root.dark .flch-agenda__eyebrow {
	color: var(--gold, #D6B655);
}
.flch-agenda__num {
	opacity: 0.6;
}
.flch-agenda__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1;
	letter-spacing: -0.02em;
	font-size: clamp(32px, 4vw, 52px);
	color: var(--ink, #1A2230);
	margin: 0 0 1.25rem;
}
:root.dark .flch-agenda__title {
	color: #F1F0EC;
}
.flch-agenda__side-desc {
	font-size: 1rem;
	line-height: 1.7;
	color: var(--gray-dark, #6E6B64);
	margin-bottom: 1.75rem;
	max-width: 30em;
}
:root.dark .flch-agenda__side-desc {
	color: rgba(255,255,255,.55);
}
.flch-agenda__cta {
	display: inline-flex;
	align-items: center;
	gap: 0.625rem;
	background: var(--azul, #2457A6);
	color: #fff;
	font-weight: 700;
	padding: 14px 26px;
	border-radius: 9999px;
	text-decoration: none;
	font-size: 14px;
	transition: filter .25s ease;
}
.flch-agenda__cta:hover {
	filter: brightness(1.1);
}
.flch-agenda__cta i {
	font-size: 12px;
}
.flch-agenda__list {
	position: relative;
	padding-left: 34px;
}
.flch-agenda__line {
	position: absolute;
	left: 8px;
	top: 6px;
	bottom: 6px;
	width: 2px;
	background: var(--flch-border, rgba(0,0,0,.1));
}
:root.dark .flch-agenda__line {
	background: rgba(255,255,255,.1);
}
.flch-agenda__item {
	position: relative;
	padding-bottom: 1.75rem;
}
.flch-agenda__item:last-child {
	padding-bottom: 0;
}
.flch-agenda__dot {
	position: absolute;
	left: -34px;
	top: 4px;
	width: 18px;
	height: 18px;
	border-radius: 50%;
	border: 3px solid var(--flch-gold, #A8861C);
	background: var(--bg, #F7F5EF);
}
:root.dark .flch-agenda__dot {
	border-color: var(--gold, #D6B655);
	background: var(--bg-dark, #0C1521);
}
.flch-agenda__card {
	background: var(--flch-surface, #FFFFFF);
	border: 1px solid var(--flch-border, rgba(0,0,0,.1));
	border-radius: 14px;
	padding: 1.375rem;
	transition: border-color .25s ease;
}
:root.dark .flch-agenda__card {
	background: var(--flch-navy-800, #0D2747);
	border-color: rgba(255,255,255,.08);
}
.flch-agenda__card:hover {
	border-color: var(--flch-gold, #A8861C);
}
:root.dark .flch-agenda__card:hover {
	border-color: var(--gold, #D6B655);
}
.flch-agenda__card-header {
	display: flex;
	align-items: center;
	gap: 0.75rem;
	flex-wrap: wrap;
	margin-bottom: 0.625rem;
}
.flch-agenda__badge {
	font-size: 11px;
	font-weight: 700;
	letter-spacing: 0.04em;
	text-transform: uppercase;
	color: #fff;
	background: var(--azul, #2457A6);
	padding: 4px 10px;
	border-radius: 4px;
}
.flch-agenda__meta {
	font-size: 13px;
	color: var(--gray-dark, #6E6B64);
	display: inline-flex;
	align-items: center;
	gap: 6px;
}
:root.dark .flch-agenda__meta {
	color: rgba(255,255,255,.55);
}
.flch-agenda__meta i {
	color: var(--flch-gold, #A8861C);
	font-size: 11px;
}
:root.dark .flch-agenda__meta i {
	color: var(--gold, #D6B655);
}
.flch-agenda__item-title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: 1.25rem;
	font-weight: 600;
	line-height: 1.3;
	color: var(--ink, #1A2230);
	margin: 0 0 0.5rem;
}
:root.dark .flch-agenda__item-title {
	color: #F1F0EC;
}
.flch-agenda__place {
	font-size: 13.5px;
	color: var(--gray-dark, #6E6B64);
	display: inline-flex;
	align-items: center;
	gap: 6px;
}
:root.dark .flch-agenda__place {
	color: rgba(255,255,255,.55);
}
.flch-agenda__place i {
	color: var(--flch-gold, #A8861C);
	font-size: 12px;
}
:root.dark .flch-agenda__place i {
	color: var(--gold, #D6B655);
}
@media (max-width: 768px) {
	.flch-agenda { padding: 60px 1.5rem 2rem; }
	.flch-agenda__list { padding-left: 24px; }
	.flch-agenda__dot { left: -24px; width: 14px; height: 14px; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
	.flch-agenda__card { transition: none !important; }
}
</style>
