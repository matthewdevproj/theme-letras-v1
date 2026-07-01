<?php
/**
 * Sección N.º 04 — Revistas académicas indexadas
 * Handoff: horizontal scrollable shelf with journal covers
 *
 * @package LetrasFLCH
 */
?>
<section id="revistas" class="kg-journals"
         aria-labelledby="revistas-title"
         x-data="kgHome()"
         x-init="init()">

	<div class="kg-journals__inner">
		<div class="kg-journals__header reveal">
			<div>
				<div class="kg-journals__eyebrow">
					<span class="kg-journals__num">N.&#186; 04 —</span>
					Producci&oacute;n intelectual
				</div>
				<h2 class="kg-journals__title" id="revistas-title">Revistas acad&eacute;micas indexadas</h2>
			</div>
			<div class="kg-journals__nav">
				<button @click="$refs.shelf.scrollBy({left:-272,behavior:'smooth'})"
				        aria-label="Anterior"
				        class="kg-journals__nav-btn">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button @click="$refs.shelf.scrollBy({left:272,behavior:'smooth'})"
				        aria-label="Siguiente"
				        class="kg-journals__nav-btn">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
			</div>
		</div>

		<div x-ref="shelf" class="kg-journals__shelf">
			<template x-for="r in revistas" :key="r.name">
				<a :href="r.href" target="_blank" rel="noopener noreferrer" class="kg-journals__card">
					<div class="kg-journals__card-cover"
					     :style="'background-image:url('+r.cover+')'">
						<div class="kg-journals__card-overlay"></div>
						<span class="kg-journals__card-logo" x-text="r.short"></span>
					</div>
					<div class="kg-journals__card-info">
						<h4 class="kg-journals__card-name" x-text="r.name"></h4>
						<span class="kg-journals__card-field" x-text="r.field"></span>
					</div>
				</a>
			</template>
		</div>
	</div>
</section>

<style>
.kg-journals {
	max-width: 1280px;
	margin: 0 auto;
	padding: 90px 2.5rem 2rem;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.kg-journals__header {
	display: flex;
	align-items: flex-end;
	justify-content: space-between;
	gap: 1.25rem;
	flex-wrap: wrap;
	margin-bottom: 2.25rem;
}
.kg-journals__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.16em;
	text-transform: uppercase;
	color: var(--kg-gold, #A8861C);
	margin-bottom: 12px;
}
:root.dark .kg-journals__eyebrow {
	color: var(--gold, #D6B655);
}
.kg-journals__num {
	opacity: 0.6;
}
.kg-journals__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1.1;
	letter-spacing: -0.02em;
	font-size: clamp(32px, 4vw, 50px);
	color: var(--ink, #1A2230);
	margin: 0;
}
:root.dark .kg-journals__title {
	color: #F1F0EC;
}
.kg-journals__nav {
	display: flex;
	gap: 0.625rem;
}
.kg-journals__nav-btn {
	width: 46px;
	height: 46px;
	border-radius: 50%;
	border: 1px solid var(--kg-border, rgba(0,0,0,.1));
	background: var(--kg-surface, #FFFFFF);
	display: grid;
	place-items: center;
	cursor: pointer;
	color: var(--ink, #1A2230);
	font-size: 14px;
	transition: all .25s ease;
}
:root.dark .kg-journals__nav-btn {
	border-color: rgba(255,255,255,.1);
	background: var(--kg-navy-800, #0D2747);
	color: #F1F0EC;
}
.kg-journals__nav-btn:hover {
	border-color: var(--kg-gold, #A8861C);
	color: var(--kg-gold, #A8861C);
}
:root.dark .kg-journals__nav-btn:hover {
	border-color: var(--gold, #D6B655);
	color: var(--gold, #D6B655);
}
.kg-journals__shelf {
	display: flex;
	gap: 22px;
	overflow-x: auto;
	scroll-snap-type: x mandatory;
	padding-bottom: 8px;
	scrollbar-width: none;
}
.kg-journals__shelf::-webkit-scrollbar {
	display: none;
}
.kg-journals__card {
	flex: 0 0 248px;
	scroll-snap-align: start;
	border-radius: 14px;
	overflow: hidden;
	display: flex;
	flex-direction: column;
	text-decoration: none;
	color: #fff;
	border: 1px solid var(--kg-border, rgba(0,0,0,.1));
	transition: all .3s ease;
}
:root.dark .kg-journals__card {
	border-color: rgba(255,255,255,.08);
}
.kg-journals__card:hover {
	border-color: var(--kg-gold, #A8861C);
	transform: translateY(-6px);
	box-shadow: 0 16px 40px rgba(0,0,0,.15);
}
:root.dark .kg-journals__card:hover {
	border-color: var(--gold, #D6B655);
	box-shadow: 0 16px 40px rgba(0,0,0,.35);
}
.kg-journals__card-cover {
	aspect-ratio: 3/4;
	position: relative;
	background-size: cover;
	background-position: center;
	display: flex;
	align-items: flex-end;
	padding: 1.25rem;
}
.kg-journals__card-overlay {
	position: absolute;
	inset: 0;
	background: linear-gradient(0deg, rgba(0,0,0,.6) 0%, rgba(0,0,0,.2) 50%, transparent 100%);
}
.kg-journals__card-logo {
	position: relative;
	z-index: 1;
	font-family: var(--font-display, 'Newsreader', serif);
	font-style: italic;
	font-size: 34px;
	line-height: 1;
	color: #fff;
	text-shadow: 0 2px 16px rgba(0,0,0,.35);
}
.kg-journals__card-info {
	padding: 1.125rem;
	background: var(--kg-surface, #FFFFFF);
}
:root.dark .kg-journals__card-info {
	background: var(--kg-navy-800, #0D2747);
}
.kg-journals__card-name {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: 17px;
	font-weight: 600;
	line-height: 1.3;
	color: var(--ink, #1A2230);
	margin: 0 0 6px;
}
:root.dark .kg-journals__card-name {
	color: #F1F0EC;
}
.kg-journals__card-field {
	font-size: 12.5px;
	color: var(--gray-dark, #6E6B64);
}
:root.dark .kg-journals__card-field {
	color: rgba(255,255,255,.55);
}
@media (max-width: 768px) {
	.kg-journals { padding: 60px 1.5rem 2rem; }
	.kg-journals__card { flex: 0 0 200px; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
	.kg-journals__card,
	.kg-journals__nav-btn { transition: none !important; }
}
</style>
