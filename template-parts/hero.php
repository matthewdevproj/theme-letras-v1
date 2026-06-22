<?php
/**
 * Template part: Hero editorial FLCH — Modernizado
 *
 * Hero de portada con enfoque editorial moderno: jerarquía visual clara,
 * espaciado optimizado, y panel de centros integrado naturalmente.
 *
 * @package LetrasFLCH
 */
?>
<section class="flch-hero" id="flchHero" aria-label="Hero principal — Facultad de Letras y Ciencias Humanas">

	<!-- ── Fondo ─────────────────────────────────────────────── -->
	<div class="flch-hero__bg"
		 style="background-image:url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/DJI_0007-Trim-frame-at-0m5s.jpg')"
		 role="img"
		 aria-label="Vista aérea del campus universitario"></div>
	<div class="flch-hero__overlay" aria-hidden="true"></div>

	<!-- ── Decorativos ───────────────────────────────────────── -->
	<div class="flch-hero__ampersand" aria-hidden="true">&amp;</div>
	<div class="flch-hero__vert-label" aria-hidden="true">Decana de América · 1551</div>

	<!-- ── Contenido ─────────────────────────────────────────── -->
	<div class="flch-hero__content">
		<div class="flch-hero__container">

			<!-- Subtitle -->
			<div class="flch-hero__subtitle">Facultad de</div>

			<!-- Title -->
			<h1 class="flch-hero__title">
				Letras <span class="flch-hero__title-amp">&amp;</span> Ciencias Humanas
			</h1>

			<!-- Stats -->
			<div class="flch-hero__stats" x-data="{}">
				<template x-for="s in [{i:'fa-graduation-cap',v:'10',l:'Escuelas profesionales'},{i:'fa-flask',v:'I+D',l:'Investigación'}]" :key="s.l">
					<div class="flch-hero__stat">
						<i class="fa-solid" :class="s.i" aria-hidden="true"></i>
						<span class="flch-hero__stat-value" x-text="s.v"></span>
						<span class="flch-hero__stat-label" x-text="s.l"></span>
					</div>
				</template>
			</div>

		</div>
	</div>

	<!-- ── Centros de Producción ─────────────── -->
	<div class="flch-hero__centros">
		<div class="flch-hero__centros-panel" x-data="{}">
			<div class="flch-hero__centros-header">
				<i class="fa-solid fa-grid-2" aria-hidden="true"></i>
				Nuestros Centros
			</div>
			<div class="flch-hero__centros-grid">
				<template x-for="c in [{i:'fa-language',t:'Centro de Idiomas',d:'Cursos certificados en lenguas modernas y originarias',h:'https://ceidletras.unmsm.edu.pe/'},{i:'fa-certificate',t:'OESI',d:'Acredita tu dominio de idiomas extranjeros',h:'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/'},{i:'fa-user-graduate',t:'Posgrado',d:'Maestrías y doctorados acreditados internacionalmente',h:'https://posgradoletras.unmsm.edu.pe/'},{i:'fa-hands-holding-circle',t:'CERSEU',d:'Responsabilidad social y educación continua',h:'https://letras.unmsm.edu.pe/cerseu/'}]" :key="c.t">
					<a :href="c.h" class="flch-hero__centro-card">
						<span class="flch-hero__centro-icon"><i class="fa-solid" :class="c.i"></i></span>
						<h3 class="flch-hero__centro-title" x-text="c.t"></h3>
						<p class="flch-hero__centro-desc" x-text="c.d"></p>
						<span class="flch-hero__centro-cta">
							<span>Explorar</span>
							<i class="fa-solid fa-arrow-right"></i>
						</span>
					</a>
				</template>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     CSS — v5 (modernizado)
═════════════════════════════════════════════════════════════════ -->
<style>
/* ── Hero ─────────────────────────────────────────────────── */
.flch-hero {
	position:      relative;
	overflow:      hidden;
	background:    #0a1726;
	color:         #fff;
	font-family:   var(--flch-font-ui, 'Hanken Grotesk', sans-serif);
	isolation:     isolate;
}

/* ── Fondo ────────────────────────────────────────────────── */
.flch-hero__bg {
	position:            absolute;
	inset:               0;
	background-size:     cover;
	background-position: center 30%;
	z-index:             1;
}
.flch-hero__bg::after {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(
		100deg,
		rgba(8,18,32,.94) 0%,
		rgba(10,24,42,.80) 44%,
		rgba(12,30,52,.46) 100%
	);
	z-index: 1;
}

.flch-hero__overlay {
	position: absolute; inset: 0;
	background: radial-gradient(circle at 50% 50%, transparent 30%, rgba(0,0,0,.35) 100%);
	z-index: 2; pointer-events: none;
}

/* ── Ampersand decorativo (reducido para menos distracción) ─── */
.flch-hero__ampersand {
	position:         absolute;
	right:            -2vw;
	top:              50%;
	transform:        translateY(-50%);
	z-index:          3;
	font-family:      var(--flch-font-disp, 'Newsreader', serif);
	font-style:       italic;
	font-size:        40vh;
	line-height:      1;
	color:            rgba(214,182,85,.04);
	pointer-events:   none;
	user-select:      none;
}

/* ── Etiqueta vertical ────────────────────────────────────── */
.flch-hero__vert-label {
	position:         absolute;
	left:             14px;
	top:              50%;
	transform:        translateY(-50%) rotate(180deg);
	z-index:          4;
	font-size:        11px;
	letter-spacing:   .32em;
	text-transform:   uppercase;
	color:            rgba(255,255,255,.40);
	font-weight:      600;
	writing-mode:     vertical-rl;
	pointer-events:   none;
	user-select:      none;
}

/* ── Contenedor de contenido ───────────────────────────────── */
.flch-hero__content {
	position:    relative;
	z-index:     5;
	max-width:   var(--container-max, 1300px);
	margin:      0 auto;
	padding:     3rem 2.5rem 3rem;
	min-height:  auto;
	display:     flex;
	flex-direction: column;
	justify-content: flex-start;
}

.flch-hero__container {
	max-width: 900px;
}

/* ── Subtitle ──────────────────────────────────────────────── */
.flch-hero__subtitle {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-style:     italic;
	font-size:      clamp(20px, 2.2vw, 28px);
	color:          rgba(255,255,255,.75);
	margin-bottom:  8px;
}

/* ── Title ────────────────────────────────────────────────── */
.flch-hero__title {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-weight:    600;
	font-size:      clamp(42px, 6.5vw, 92px);
	line-height:    1;
	letter-spacing: -.02em;
	color:          #fff;
	text-shadow:    0 2px 36px rgba(0,0,0,.35);
	margin-bottom:  2rem;
	max-width:      15ch;
}
.flch-hero__title-amp {
	font-style: italic;
}

/* ── Stats (ahora después del título) ─────────────────────── */
.flch-hero__stats {
	display:         flex;
	flex-wrap:       wrap;
	gap:             2rem;
	align-items:     center;
	padding-top:     1.5rem;
	border-top:      1px solid rgba(255,255,255,.12);
}

.flch-hero__stat {
	display:     flex;
	align-items: center;
	gap:         12px;
}

.flch-hero__stat i {
	font-size: 18px;
	width:     22px;
	text-align: center;
	color:     var(--flch-gold, #A8861C);
}

.flch-hero__stat-value {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-size:      1.4rem;
	font-weight:    600;
	line-height:    1.2;
	color:          #fff;
	display:        block;
}

.flch-hero__stat-label {
	font-size:     11px;
	font-weight:   600;
	letter-spacing: .02em;
	text-transform: uppercase;
	color:         rgba(255,255,255,.50);
	display:       block;
	line-height:   1.2;
}

/* ── Centros de Producción (flujo natural, sin margin negativo) ─ */
.flch-hero__centros {
	position: relative;
	z-index: 6;
	max-width: var(--container-max, 1300px);
	margin: 0 auto;
	padding: 0 2.5rem 4rem;
}

.flch-hero__centros-panel {
	position:       relative;
	overflow:       hidden;
	border-radius:  18px;
	border:         1px solid rgba(214,182,85,.18);
	box-shadow:     0 24px 60px rgba(8,18,32,.4),
	                0 4px 12px rgba(0,0,0,.1);
	background:     linear-gradient(180deg, rgba(16,49,85,.95) 0%, rgba(11,32,54,.98) 100%);
	backdrop-filter: blur(20px);
}

.flch-hero__centros-panel::before {
	content:       '';
	position:      absolute;
	right:         0;
	bottom:        0;
	width:         200px;
	height:        200px;
	background:    radial-gradient(circle, rgba(214,182,85,.08) 0%, transparent 70%);
	pointer-events: none;
}

.flch-hero__centros-header {
	display:         flex;
	align-items:     center;
	gap:             10px;
	padding:         20px 28px;
	border-bottom:   1px solid rgba(255,255,255,.08);
	font-size:       13px;
	font-weight:     700;
	letter-spacing:  .12em;
	text-transform:  uppercase;
	color:           var(--flch-gold, #A8861C);
}
.flch-hero__centros-header i { font-size: 15px; }

.flch-hero__centros-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 0;
}

/* Desktop: 4 columnas */
@media (min-width: 1200px) {
	.flch-hero__centros-grid {
		grid-template-columns: repeat(4, 1fr);
	}
}

/* Tablet landscape: 2 columnas */
@media (max-width: 1199px) and (min-width: 769px) {
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__centro-card:nth-child(2n) {
		border-right: none;
	}
}

/* Tablet portrait: 2 columnas */
@media (max-width: 768px) and (min-width: 481px) {
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

/* Móvil: 1 columna */
@media (max-width: 480px) {
	.flch-hero__centros-grid {
		grid-template-columns: 1fr;
	}
}

.flch-hero__centro-card {
	position:       relative;
	display:        flex;
	flex-direction: column;
	padding:        32px 28px;
	min-height:     200px;
	color:          #fff;
	text-decoration: none;
	border-right:   1px solid rgba(255,255,255,.06);
	transition:     all .3s cubic-bezier(.4,0,.2,1);
}

.flch-hero__centro-card::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(135deg, rgba(214,182,85,.08) 0%, transparent 50%);
	opacity: 0;
	transition: opacity .3s ease;
}

.flch-hero__centro-card:hover::before {
	opacity: 1;
}

.flch-hero__centro-card:hover {
	background: rgba(255,255,255,.03);
	transform:  translateY(-4px);
}

.flch-hero__centro-card:last-child {
	border-right: none;
}

.flch-hero__centro-card:nth-child(4) {
	border-right: none;
}

.flch-hero__centro-icon {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           48px;
	height:          48px;
	border-radius:   12px;
	background:      rgba(214,182,85,.12);
	color:           var(--flch-gold, #A8861C);
	font-size:       20px;
	margin-bottom:   16px;
	transition:      all .3s ease;
}

.flch-hero__centro-card:hover .flch-hero__centro-icon {
	background:      rgba(214,182,85,.18);
	transform:       scale(1.05);
}

.flch-hero__centro-title {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-size:      1.25rem;
	font-weight:    600;
	line-height:    1.3;
	margin-bottom:  8px;
	color:          #fff;
}

.flch-hero__centro-desc {
	font-size:      14px;
	line-height:    1.6;
	color:          rgba(255,255,255,.7);
	margin-bottom:  auto;
	padding-bottom: 16px;
}

.flch-hero__centro-cta {
	font-size:      13px;
	font-weight:    700;
	color:          var(--flch-gold, #A8861C);
	display:        inline-flex;
	align-items:    center;
	gap:            8px;
	transition:     gap .3s ease;
}

.flch-hero__centro-card:hover .flch-hero__centro-cta {
	gap: 12px;
}

.flch-hero__centro-cta i {
	font-size: 11px;
	transition: transform .3s ease;
}

.flch-hero__centro-card:hover .flch-hero__centro-cta i {
	transform: translateX(2px);
}

/* ── Animaciones (optimizadas) ────────────────────────────── */
.flch-hero__subtitle,
.flch-hero__title,
.flch-hero__stats,
.flch-hero .flch-hero__centros-panel {
	opacity:     0;
	transform:   translateY(20px);
	animation:   flchFadeUp .7s cubic-bezier(.22,1,.36,1) forwards;
}

.flch-hero__subtitle          { animation-delay: .1s; }
.flch-hero__title             { animation-delay: .2s; }
.flch-hero__stats             { animation-delay: .3s; }
.flch-hero .flch-hero__centros-panel { animation-delay: .4s; }

@keyframes flchFadeUp {
	to { opacity: 1; transform: none; }
}

/* ── Responsive ───────────────────────────────────────────── */
@media (max-width: 1024px) {
	.flch-hero__vert-label { display: none; }
	.flch-hero__ampersand  { font-size: 28vh; opacity: .8; }
}

@media (max-width: 768px) {
	.flch-hero__content {
		padding: 2.5rem 1.5rem 2.5rem;
	}
	.flch-hero__centros {
		padding: 0 1.25rem 3rem;
	}
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__centro-card {
		min-height: 180px;
		padding: 26px 22px;
	}
	.flch-hero__centro-card:nth-child(2n) {
		border-right: none;
	}
	.flch-hero__centro-card:nth-child(n+3) {
		border-top: 1px solid rgba(255,255,255,.06);
	}
}

@media (max-width: 480px) {
	.flch-hero__content {
		padding: 2rem 1.25rem 2rem;
	}
	.flch-hero__ampersand { font-size: 18vh; }
	.flch-hero__stats     { gap: 1.5rem; padding-top: 1.25rem; }
	.flch-hero__stat      { gap: 10px; }
	.flch-hero__stat i    { font-size: 16px; width: 20px; }
	.flch-hero__centros   {
		padding: 0 1rem 2.5rem;
	}
	.flch-hero__centros-grid {
		grid-template-columns: 1fr;
	}
	.flch-hero__centro-card {
		border-right: none;
		min-height: unset;
		padding: 26px 22px;
	}
	.flch-hero__centro-card:not(:first-child) {
		border-top: 1px solid rgba(255,255,255,.06);
	}
	.flch-hero__centro-title {
		font-size: 1.15rem;
	}
	.flch-hero__centro-desc {
		font-size: 13px;
	}
}

@media (max-width: 360px) {
	.flch-hero__title { font-size: 36px; }
}

/* ── Reduced motion ────────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
	.flch-hero__subtitle,
	.flch-hero__title,
	.flch-hero__stats,
	.flch-hero .flch-hero__centros-panel {
		opacity: 1;
		transform: none;
		animation: none;
	}

	.flch-hero__centro-card,
	.flch-hero__centro-icon,
	.flch-hero__centro-cta,
	.flch-hero__centro-cta i {
		transition: none;
	}
}

/* ── Performance: simplificar backdrop-filter en móvil ──────── */
@media (max-width: 768px) {
	.flch-hero__centros-panel {
		backdrop-filter: none;
		background: rgba(11,32,54,.98);
	}
}
</style>
