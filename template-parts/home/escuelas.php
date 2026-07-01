<?php
/**
 * Sección Carreras de Pregrado — Portada FLCH
 *
 * Índice editorial interactivo con Alpine.js:
 * columna izquierda = índice numerado con hover state
 * columna derecha  = preview sticky con imagen, descripción y CTA
 *
 * @package LetrasFLCH
 */
?>
<section id="escuelas" class="kg-schools"
		 aria-labelledby="escuelas-title"
		 x-data="kgHome()"
		 x-init="init()">

	<div class="kg-schools__container">

		<!-- Header -->
		<div class="kg-schools__header reveal">
			<div>
				<div class="kg-schools__eyebrow">
					<span class="kg-schools__eyebrow-num">N.º 02 —</span>
					Oferta académica
				</div>
				<h2 class="kg-schools__title" id="escuelas-title">
					Carreras de <span class="kg-schools__title-accent">Pregrado</span>
				</h2>
			</div>
			<p class="kg-schools__subtitle">
				Diez escuelas en humanidades, lenguaje, comunicación y arte.
				Recorre el índice y descubre cada una.
			</p>
		</div>

		<!-- Grid: índice + preview -->
		<div class="kg-schools__grid">

			<!-- Columna izquierda: índice -->
			<div class="kg-schools__index reveal">
				<template x-for="(s, i) in schools" :key="s.name">
					<a :href="s.href"
					   @mouseenter="school = i"
					   class="kg-schools__index-row"
					   :class="school === i ? 'is-active' : ''"
					   target="_blank" rel="noopener noreferrer">
						<span class="kg-schools__index-num"
							  :class="school === i ? 'is-active' : ''"
							  x-text="s.n"></span>
						<span class="kg-schools__index-name" x-text="s.name"></span>
						<i class="fa-solid fa-arrow-right kg-schools__index-arrow"
						   :class="school === i ? 'is-visible' : ''"></i>
					</a>
				</template>
			</div>

			<!-- Columna derecha: preview sticky -->
			<div class="kg-schools__preview reveal">
				<div class="kg-schools__preview-card">
					<template x-for="(s, i) in schools" :key="'p' + s.name">
						<div class="kg-schools__preview-image"
							 :class="school === i ? 'is-visible' : ''">
							<img :src="s.img" :alt="s.name" loading="lazy">
						</div>
					</template>
					<div class="kg-schools__preview-overlay"></div>
					<div class="kg-schools__preview-body">
						<div class="kg-schools__preview-meta">
							<span class="kg-schools__preview-num"
								  x-text="schools[school].n"></span>
							<span class="kg-schools__preview-line"></span>
						</div>
						<h3 class="kg-schools__preview-title"
							x-text="schools[school].name"></h3>
						<p class="kg-schools__preview-desc"
						   x-text="schools[school].desc"></p>
						<a :href="schools[school].href"
						   class="kg-schools__preview-cta"
						   target="_blank" rel="noopener noreferrer">
							Ver escuela
							<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>

<style>
/* ── Escuelas ───────────────────────────────────────────── */
.kg-schools {
	padding: 90px 0 32px;
	background: var(--kg-surface, #FFFFFF);
}
:root.dark .kg-schools {
	background: var(--kg-surface, #0D2747);
}

.kg-schools__container {
	max-width: var(--container-max, 1300px);
	margin: 0 auto;
	padding: 0 2.5rem;
}

/* ── Header ─────────────────────────────────────────────── */
.kg-schools__header {
	display:         flex;
	align-items:     flex-end;
	justify-content: space-between;
	gap:             28px;
	flex-wrap:       wrap;
	margin-bottom:   40px;
}

.kg-schools__eyebrow {
	font-size:      12px;
	font-weight:    700;
	letter-spacing: .16em;
	text-transform: uppercase;
	color:          var(--kg-gold, #A8861C);
	margin-bottom:  12px;
}

.kg-schools__eyebrow-num {
	opacity: 0.6;
}

.kg-schools__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(32px, 4vw, 50px);
	font-weight:    600;
	line-height:    1.1;
	letter-spacing: -.02em;
	color:          var(--ink, #1A2230);
	margin:         0;
}

:root.dark .kg-schools__title {
	color: #F1F0EC;
}

.kg-schools__title-accent {
	color: var(--kg-gold, #A8861C);
}

.kg-schools__subtitle {
	font-size:    16px;
	line-height:  1.6;
	color:        var(--gray-dark, #6E6B64);
	max-width:    24em;
	margin:       0;
}

:root.dark .kg-schools__subtitle {
	color: rgba(255,255,255,.65);
}

/* ── Grid ───────────────────────────────────────────────── */
.kg-schools__grid {
	display: grid;
	grid-template-columns: 1.15fr 0.85fr;
	gap: 48px;
	align-items: start;
}

@media (max-width: 1024px) {
	.kg-schools__grid {
		grid-template-columns: 1fr;
		gap: 32px;
	}
}

/* ── Index (columna izquierda) ──────────────────────────── */
.kg-schools__index {
	display:        flex;
	flex-direction: column;
	border-top:     1px solid var(--kg-border, rgba(0,0,0,.1));
}

:root.dark .kg-schools__index {
	border-top-color: rgba(255,255,255,.1);
}

.kg-schools__index-row {
	display:         flex;
	align-items:     center;
	gap:             18px;
	padding:         18px 0 18px 16px;
	border-bottom:   1px solid var(--kg-border, rgba(0,0,0,.1));
	border-left:     3px solid transparent;
	text-decoration: none;
	transition:      all .3s ease;
}

:root.dark .kg-schools__index-row {
	border-bottom-color: rgba(255,255,255,.1);
}

.kg-schools__index-row.is-active {
	border-left-color: var(--kg-gold, #A8861C);
	padding-left: 20px;
	background: linear-gradient(90deg, rgba(168,134,28,.07) 0%, transparent 100%);
}

.kg-schools__index-num {
	font-family:  var(--font-display, 'Newsreader', serif);
	font-style:   italic;
	font-size:    15px;
	width:        30px;
	flex-shrink:  0;
	color:        var(--gray-dark, #94A3B8);
	transition:   color .3s ease;
}

.kg-schools__index-num.is-active {
	color: var(--kg-gold, #A8861C);
}

.kg-schools__index-name {
	font-family:  var(--font-display, 'Newsreader', serif);
	font-size:    clamp(20px, 2vw, 27px);
	font-weight:  600;
	line-height:  1.2;
	letter-spacing: -.01em;
	flex:         1;
	color:        var(--ink, #1A2230);
	transition:   color .3s ease;
}

:root.dark .kg-schools__index-name {
	color: #F1F0EC;
}

.kg-schools__index-row.is-active .kg-schools__index-name {
	color: var(--kg-gold, #A8861C);
}

.kg-schools__index-arrow {
	font-size:   14px;
	color:       var(--kg-gold, #A8861C);
	opacity:     0;
	transform:   translateX(-8px);
	transition:  all .3s ease;
}

.kg-schools__index-arrow.is-visible {
	opacity:   1;
	transform: translateX(0);
}

/* ── Preview (columna derecha) ─────────────────────────── */
.kg-schools__preview {
	position: sticky;
	top: 112px;
}

@media (max-width: 1024px) {
	.kg-schools__preview {
		position: relative;
		top: 0;
	}
}

.kg-schools__preview-card {
	position:       relative;
	border-radius:  18px;
	overflow:       hidden;
	border:         1px solid var(--kg-border, rgba(0,0,0,.1));
	box-shadow:     0 24px 60px rgba(8,18,32,.2);
	background:     var(--kg-surface-soft, #F7F5EF);
	aspect-ratio:   4 / 4.4;
}

:root.dark .kg-schools__preview-card {
	border-color: rgba(255,255,255,.1);
	background:   rgba(13,39,71,.5);
}

.kg-schools__preview-image {
	position:      absolute;
	inset:         0;
	z-index:       1;
	opacity:       0;
	transition:    opacity .5s ease;
}

.kg-schools__preview-image.is-visible {
	opacity: 1;
}

.kg-schools__preview-image img {
	width:  100%;
	height: 100%;
	object-fit: cover;
}

.kg-schools__preview-overlay {
	position:   absolute;
	inset:      0;
	z-index:    2;
	pointer-events: none;
	background: linear-gradient(180deg, rgba(8,18,32,0) 40%, rgba(8,18,32,.92) 100%);
}

.kg-schools__preview-body {
	position: absolute;
	left:     0;
	right:    0;
	bottom:   0;
	z-index:  3;
	padding:  26px;
}

.kg-schools__preview-meta {
	display:     flex;
	align-items: center;
	gap:         10px;
	margin-bottom: 10px;
}

.kg-schools__preview-num {
	font-family: var(--font-display, 'Newsreader', serif);
	font-style:  italic;
	font-size:   16px;
	color:       var(--kg-gold, #A8861C);
}

.kg-schools__preview-line {
	display: inline-block;
	width:   26px;
	height:  1px;
	background: var(--kg-gold, #A8861C);
}

.kg-schools__preview-title {
	font-family:   var(--font-display, 'Newsreader', serif);
	font-size:     26px;
	font-weight:   600;
	line-height:   1.2;
	color:         #fff;
	margin:        0 0 8px;
}

.kg-schools__preview-desc {
	font-size:   14px;
	line-height: 1.5;
	color:       rgba(255,255,255,.75);
	margin:      0 0 16px;
}

.kg-schools__preview-cta {
	font-size:      13.5px;
	font-weight:    700;
	color:          var(--kg-gold, #A8861C);
	text-decoration: none;
	display:        inline-flex;
	align-items:    center;
	gap:            8px;
	transition:     gap .3s ease;
}

.kg-schools__preview-cta:hover {
	gap: 12px;
}

.kg-schools__preview-cta i {
	font-size: 12px;
}

/* ── Mobile ─────────────────────────────────────────────── */
@media (max-width: 768px) {
	.kg-schools {
		padding: 60px 0 24px;
	}
	.kg-schools__container {
		padding: 0 1.25rem;
	}
	.kg-schools__header {
		margin-bottom: 28px;
	}
	.kg-schools__index-row {
		padding: 14px 0 14px 12px;
		gap: 12px;
	}
	.kg-schools__index-row.is-active {
		padding-left: 16px;
	}
	.kg-schools__index-name {
		font-size: 18px;
	}
	.kg-schools__preview-card {
		aspect-ratio: 16 / 10;
	}
	.kg-schools__preview-title {
		font-size: 22px;
	}
}

@media (max-width: 480px) {
	.kg-schools__preview-card {
		aspect-ratio: 4 / 3;
	}
}

/* ── Reduced motion ─────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
	.kg-schools__preview-image {
		transition: none;
	}
	.kg-schools__index-row,
	.kg-schools__index-arrow,
	.kg-schools__preview-cta {
		transition: none;
	}
}
</style>
