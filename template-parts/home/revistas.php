<?php
/**
 * Sección N.º 04 — Revistas académicas indexadas
 * Handoff: horizontal scrollable shelf with journal covers
 *
 * @package LetrasFLCH
 */
?>
<section id="revistas" class="flch-revistas"
         aria-labelledby="revistas-title"
         x-data="flchHome()"
         x-init="init()">

	<div class="flch-revistas__inner">
		<div class="flch-revistas__header reveal">
			<div>
				<div class="flch-revistas__eyebrow">
					<span class="flch-revistas__num">N.&#186; 04 —</span>
					Producci&oacute;n intelectual
				</div>
				<h2 class="flch-revistas__title" id="revistas-title">Revistas acad&eacute;micas indexadas</h2>
			</div>
			<div class="flch-revistas__nav">
				<button @click="$refs.shelf.scrollBy({left:-272,behavior:'smooth'})"
				        aria-label="Anterior"
				        class="flch-revistas__nav-btn">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button @click="$refs.shelf.scrollBy({left:272,behavior:'smooth'})"
				        aria-label="Siguiente"
				        class="flch-revistas__nav-btn">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
			</div>
		</div>

		<div x-ref="shelf" class="flch-revistas__shelf">
			<template x-for="r in revistas" :key="r.name">
				<a :href="r.href" target="_blank" rel="noopener noreferrer" class="flch-revistas__card">
					<div class="flch-revistas__card-cover"
					     :style="'background-image:url('+r.cover+')'">
						<div class="flch-revistas__card-overlay"></div>
						<span class="flch-revistas__card-logo" x-text="r.short"></span>
					</div>
					<div class="flch-revistas__card-info">
						<h4 class="flch-revistas__card-name" x-text="r.name"></h4>
						<span class="flch-revistas__card-field" x-text="r.field"></span>
					</div>
				</a>
			</template>
		</div>
	</div>
</section>

<style>
.flch-revistas {
	max-width: 1280px;
	margin: 0 auto;
	padding: 90px 2.5rem 2rem;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.flch-revistas__header {
	display: flex;
	align-items: flex-end;
	justify-content: space-between;
	gap: 1.25rem;
	flex-wrap: wrap;
	margin-bottom: 2.25rem;
}
.flch-revistas__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.16em;
	text-transform: uppercase;
	color: var(--flch-gold, #A8861C);
	margin-bottom: 12px;
}
:root.dark .flch-revistas__eyebrow {
	color: var(--gold, #D6B655);
}
.flch-revistas__num {
	opacity: 0.6;
}
.flch-revistas__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1.1;
	letter-spacing: -0.02em;
	font-size: clamp(32px, 4vw, 50px);
	color: var(--ink, #1A2230);
	margin: 0;
}
:root.dark .flch-revistas__title {
	color: #F1F0EC;
}
.flch-revistas__nav {
	display: flex;
	gap: 0.625rem;
}
.flch-revistas__nav-btn {
	width: 46px;
	height: 46px;
	border-radius: 50%;
	border: 1px solid var(--flch-border, rgba(0,0,0,.1));
	background: var(--flch-surface, #FFFFFF);
	display: grid;
	place-items: center;
	cursor: pointer;
	color: var(--ink, #1A2230);
	font-size: 14px;
	transition: all .25s ease;
}
:root.dark .flch-revistas__nav-btn {
	border-color: rgba(255,255,255,.1);
	background: var(--flch-navy-800, #0D2747);
	color: #F1F0EC;
}
.flch-revistas__nav-btn:hover {
	border-color: var(--flch-gold, #A8861C);
	color: var(--flch-gold, #A8861C);
}
:root.dark .flch-revistas__nav-btn:hover {
	border-color: var(--gold, #D6B655);
	color: var(--gold, #D6B655);
}
.flch-revistas__shelf {
	display: flex;
	gap: 22px;
	overflow-x: auto;
	scroll-snap-type: x mandatory;
	padding-bottom: 8px;
	scrollbar-width: none;
}
.flch-revistas__shelf::-webkit-scrollbar {
	display: none;
}
.flch-revistas__card {
	flex: 0 0 248px;
	scroll-snap-align: start;
	border-radius: 14px;
	overflow: hidden;
	display: flex;
	flex-direction: column;
	text-decoration: none;
	color: #fff;
	border: 1px solid var(--flch-border, rgba(0,0,0,.1));
	transition: all .3s ease;
}
:root.dark .flch-revistas__card {
	border-color: rgba(255,255,255,.08);
}
.flch-revistas__card:hover {
	border-color: var(--flch-gold, #A8861C);
	transform: translateY(-6px);
	box-shadow: 0 16px 40px rgba(0,0,0,.15);
}
:root.dark .flch-revistas__card:hover {
	border-color: var(--gold, #D6B655);
	box-shadow: 0 16px 40px rgba(0,0,0,.35);
}
.flch-revistas__card-cover {
	aspect-ratio: 3/4;
	position: relative;
	background-size: cover;
	background-position: center;
	display: flex;
	align-items: flex-end;
	padding: 1.25rem;
}
.flch-revistas__card-overlay {
	position: absolute;
	inset: 0;
	background: linear-gradient(0deg, rgba(0,0,0,.6) 0%, rgba(0,0,0,.2) 50%, transparent 100%);
}
.flch-revistas__card-logo {
	position: relative;
	z-index: 1;
	font-family: var(--font-display, 'Newsreader', serif);
	font-style: italic;
	font-size: 34px;
	line-height: 1;
	color: #fff;
	text-shadow: 0 2px 16px rgba(0,0,0,.35);
}
.flch-revistas__card-info {
	padding: 1.125rem;
	background: var(--flch-surface, #FFFFFF);
}
:root.dark .flch-revistas__card-info {
	background: var(--flch-navy-800, #0D2747);
}
.flch-revistas__card-name {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: 17px;
	font-weight: 600;
	line-height: 1.3;
	color: var(--ink, #1A2230);
	margin: 0 0 6px;
}
:root.dark .flch-revistas__card-name {
	color: #F1F0EC;
}
.flch-revistas__card-field {
	font-size: 12.5px;
	color: var(--gray-dark, #6E6B64);
}
:root.dark .flch-revistas__card-field {
	color: rgba(255,255,255,.55);
}
@media (max-width: 768px) {
	.flch-revistas { padding: 60px 1.5rem 2rem; }
	.flch-revistas__card { flex: 0 0 200px; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
	.flch-revistas__card,
	.flch-revistas__nav-btn { transition: none !important; }
}
</style>
