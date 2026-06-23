<?php
/**
 * Template part: Hero editorial FLCH — Versión mejorada
 *
 * Hero de portada rediseñado: tipografía expresiva, stats jerarquizados,
 * panel de centros integrado con transición suave.
 *
 * @package LetrasFLCH
 */
?>
<section class="flch-hero" id="flchHero"
         aria-label="Hero principal — Facultad de Letras y Ciencias Humanas"
         x-data="flchHome()"
         x-init="init()">

	<div class="flch-hero__bg"
		 style="background-image:url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/DJI_0007-Trim-frame-at-0m5s.jpg')"
		 role="img"
		 aria-label="Vista aérea del campus universitario"></div>
	<div class="flch-hero__overlay" aria-hidden="true"></div>
	<div class="flch-hero__noise" aria-hidden="true"></div>

	<div class="flch-hero__ampersand" aria-hidden="true">&amp;</div>
	<div class="flch-hero__vert-label" aria-hidden="true">Decana de América · 1551</div>

	<div class="flch-hero__content">
		<div class="flch-hero__container">

			<div class="flch-hero__eyebrow reveal">
				<span class="flch-hero__eyebrow-line"></span>
				Investigación · Humanidades · Cultura
			</div>

			<div class="flch-hero__subtitle reveal">Facultad de</div>

			<h1 class="flch-hero__title reveal">
				Letras <span class="flch-hero__title-amp">&amp;</span> Ciencias Humanas
			</h1>

			<p class="flch-hero__tagline reveal">
				Formación crítica · Investigación de frontera · Compromiso social
			</p>

			<div class="flch-hero__stats reveal">
				<template x-for="(s, i) in heroStats" :key="s.label">
					<template x-if="i > 0">
						<div class="flch-hero__stat-divider" aria-hidden="true"></div>
					</template>
					<div class="flch-hero__stat">
						<div class="flch-hero__stat-icon-wrap">
							<i class="fa-solid" :class="s.icon" aria-hidden="true"></i>
						</div>
						<div class="flch-hero__stat-body">
							<span class="flch-hero__stat-value" x-text="s.value"></span>
							<span class="flch-hero__stat-label" x-text="s.label"></span>
						</div>
					</div>
				</template>
			</div>

		</div>
	</div>

	<div class="flch-hero__centros">
		<div class="flch-hero__centros-panel reveal">
			<div class="flch-hero__centros-header">
				<i class="fa-solid fa-compass" aria-hidden="true"></i>
				Centros de Producción
				<span class="flch-hero__centros-header-note">Accesos estratégicos de la Facultad</span>
			</div>
			<div class="flch-hero__centros-grid">
				<template x-for="c in centros" :key="c.title">
					<a :href="c.href" class="flch-hero__centro-card"
					   target="_blank" rel="noopener noreferrer">
						<span class="flch-hero__centro-icon"><i class="fa-solid" :class="c.icon"></i></span>
						<h3 class="flch-hero__centro-title" x-text="c.title"></h3>
						<p class="flch-hero__centro-desc" x-text="c.desc"></p>
						<span class="flch-hero__centro-cta">
							<span x-text="c.cta"></span>
							<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</span>
					</a>
				</template>
			</div>
		</div>
	</div>
</section>

<style>
.flch-hero {
	position:      relative;
	overflow:      hidden;
	background:    #0a1726;
	color:         #fff;
	font-family:   var(--font-body, 'Hanken Grotesk', sans-serif);
	isolation:     isolate;
}

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
	background: radial-gradient(ellipse at 50% 30%, transparent 20%, rgba(0,0,0,.45) 100%);
	z-index: 2; pointer-events: none;
}

.flch-hero__noise {
	position: absolute; inset: 0;
	z-index: 2;
	pointer-events: none;
	opacity: 0.035;
	background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
	background-repeat: repeat;
	background-size: 256px 256px;
	mix-blend-mode: overlay;
}

.flch-hero__ampersand {
	position:         absolute;
	right:            -2vw;
	top:              50%;
	transform:        translateY(-50%);
	z-index:          3;
	font-family:      var(--font-display, 'Newsreader', serif);
	font-style:       italic;
	font-size:        44vh;
	line-height:      1;
	color:            rgba(214,182,85,.04);
	pointer-events:   none;
	user-select:      none;
}

.flch-hero__vert-label {
	position:         absolute;
	left:             16px;
	top:              50%;
	transform:        translateY(-50%) rotate(180deg);
	z-index:          4;
	font-size:        10px;
	letter-spacing:   .4em;
	text-transform:   uppercase;
	color:            rgba(255,255,255,.35);
	font-weight:      600;
	writing-mode:     vertical-rl;
	pointer-events:   none;
	user-select:      none;
}

.flch-hero__content {
	position:    relative;
	z-index:     5;
	max-width:   var(--container-max, 1300px);
	margin:      0 auto;
	padding:     100px 2.5rem 3.5rem;
	min-height:  auto;
	display:     flex;
	flex-direction: column;
	justify-content: flex-start;
}

.flch-hero__container {
	max-width: 900px;
}

.flch-hero__eyebrow {
	display:         inline-flex;
	align-items:     center;
	gap:             10px;
	font-size:       12px;
	font-weight:     700;
	letter-spacing:  .22em;
	text-transform:  uppercase;
	color:           var(--gold, #A8861C);
	margin-bottom:   28px;
}
.flch-hero__eyebrow-line {
	display: inline-block;
	width:   36px;
	height:  2px;
	background: var(--gold, #A8861C);
	border-radius: 1px;
}

.flch-hero__subtitle {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-style:     italic;
	font-size:      clamp(20px, 2.2vw, 28px);
	color:          rgba(255,255,255,.7);
	margin-bottom:  2px;
	font-weight:    400;
}

.flch-hero__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-weight:    600;
	font-size:      clamp(48px, 7.5vw, 110px);
	line-height:    0.92;
	letter-spacing: -.03em;
	color:          #fff;
	text-shadow:    0 2px 40px rgba(0,0,0,.4);
	margin-bottom:  22px;
	max-width:      15ch;
}
.flch-hero__title-amp {
	font-style: italic;
}

.flch-hero__tagline {
	font-size:     clamp(15px, 1.3vw, 18px);
	line-height:   1.6;
	color:         rgba(255,255,255,.6);
	font-weight:   500;
	letter-spacing: .01em;
	margin:        0 0 40px 0;
	max-width:     34em;
}

.flch-hero__stats {
	display:         flex;
	flex-wrap:       wrap;
	align-items:     center;
	gap:             0;
	padding:        28px 32px;
	border-radius:  16px;
	background:     rgba(255,255,255,.04);
	border:         1px solid rgba(255,255,255,.08);
	backdrop-filter: blur(6px);
}

.flch-hero__stat {
	display:     flex;
	align-items: center;
	gap:         16px;
	padding:     4px 16px;
	flex:        1 1 auto;
	min-width:   140px;
}

.flch-hero__stat-divider {
	width: 1px;
	height: 36px;
	background: rgba(255,255,255,.1);
	flex-shrink: 0;
}

.flch-hero__stat-icon-wrap {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           44px;
	height:          44px;
	border-radius:   12px;
	background:      rgba(214,182,85,.12);
	color:           var(--gold, #A8861C);
	font-size:       17px;
	flex-shrink:     0;
}

.flch-hero__stat-body {
	display: flex;
	flex-direction: column;
	gap: 2px;
}

.flch-hero__stat-value {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.6rem;
	font-weight:    600;
	line-height:    1.1;
	color:          #fff;
}

.flch-hero__stat-label {
	font-size:     10.5px;
	font-weight:   600;
	letter-spacing: .04em;
	text-transform: uppercase;
	color:         rgba(255,255,255,.5);
	line-height:   1.2;
}

.flch-hero__centros {
	position: relative;
	z-index: 6;
	max-width: var(--container-max, 1300px);
	margin: -40px auto 0;
	padding: 0 2.5rem 4rem;
}

.flch-hero__centros-panel {
	position:       relative;
	overflow:       hidden;
	border-radius:  20px;
	border:         1px solid rgba(214,182,85,.15);
	box-shadow:     0 20px 60px rgba(0,0,0,.5);
	background:     linear-gradient(180deg, #0F2A4A 0%, #091B2E 100%);
}

.flch-hero__centros-panel::before {
	content:       '¶';
	position:      absolute;
	right:         12px;
	top:           -24px;
	font-family:   var(--font-display, 'Newsreader', serif);
	font-style:    italic;
	font-size:     140px;
	line-height:   1;
	color:         rgba(214,182,85,.05);
	pointer-events: none;
}

.flch-hero__centros-panel::after {
	content: '';
	position: absolute;
	top: 0; left: 0; right: 0;
	height: 1px;
	background: linear-gradient(90deg, transparent, rgba(214,182,85,.25), transparent);
}

.flch-hero__centros-header {
	display:         flex;
	align-items:     center;
	gap:             10px;
	padding:         14px 24px;
	border-bottom:   1px solid rgba(255,255,255,.06);
	font-size:       11px;
	font-weight:     700;
	letter-spacing:  .18em;
	text-transform:  uppercase;
	color:           var(--gold, #A8861C);
	position: relative;
	z-index: 1;
}
.flch-hero__centros-header i { font-size: 14px; }
.flch-hero__centros-header-note {
	margin-left: auto;
	font-size:   11px;
	font-weight: 500;
	text-transform: none;
	letter-spacing: normal;
	color:       rgba(255,255,255,.4);
	display:     none;
}
@media (min-width: 640px) {
	.flch-hero__centros-header-note { display: inline; }
}

.flch-hero__centros-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
	gap: 1px;
	background: rgba(255,255,255,.06);
	position: relative;
	z-index: 1;
}

.flch-hero__centro-card {
	position:       relative;
	display:        flex;
	flex-direction: column;
	padding:        26px 24px;
	min-height:     196px;
	color:          #fff;
	text-decoration: none;
	background:     linear-gradient(180deg, #0F2A4A 0%, #091B2E 100%);
	transition:     all .35s cubic-bezier(.4,0,.2,1);
	overflow: hidden;
}

.flch-hero__centro-card::after {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(180deg, transparent 50%, rgba(214,182,85,.03) 100%);
	opacity: 0;
	transition: opacity .35s ease;
}

.flch-hero__centro-card:hover::after {
	opacity: 1;
}

.flch-hero__centro-card:hover {
	background: rgba(255,255,255,.02);
	transform:  translateY(-3px);
}

.flch-hero__centro-icon {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           48px;
	height:          48px;
	border-radius:   12px;
	background:      rgba(214,182,85,.1);
	color:           var(--gold, #A8861C);
	font-size:       19px;
	margin-bottom:   16px;
	transition:      all .3s ease;
	position: relative;
	z-index: 1;
}

.flch-hero__centro-card:hover .flch-hero__centro-icon {
	background: rgba(214,182,85,.18);
	transform:  scale(1.06);
}

.flch-hero__centro-title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.15rem;
	font-weight:    600;
	line-height:    1.3;
	margin-bottom:  6px;
	color:          #fff;
	position: relative;
	z-index: 1;
}

.flch-hero__centro-desc {
	font-size:      13px;
	line-height:    1.5;
	color:          rgba(255,255,255,.6);
	margin-bottom:  auto;
	padding-bottom: 14px;
	flex: 1;
	position: relative;
	z-index: 1;
}

.flch-hero__centro-cta {
	font-size:      12px;
	font-weight:    700;
	color:          var(--gold, #A8861C);
	display:        inline-flex;
	align-items:    center;
	gap:            8px;
	transition:     gap .3s ease;
	position: relative;
	z-index: 1;
}

.flch-hero__centro-card:hover .flch-hero__centro-cta {
	gap: 12px;
}

.flch-hero__centro-cta i {
	font-size: 10px;
	transition: transform .3s ease;
}

.flch-hero__centro-card:hover .flch-hero__centro-cta i {
	transform: translateX(3px);
}

.reveal {
	opacity: 0;
	transform: translateY(28px);
	transition: opacity .85s ease, transform .85s cubic-bezier(.22,1,.36,1);
}
.reveal.is-in {
	opacity: 1;
	transform: none;
}

@media (max-width: 1024px) {
	.flch-hero__vert-label { display: none; }
	.flch-hero__ampersand  { font-size: 30vh; opacity: .8; }
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__stats {
		padding: 24px;
	}
	.flch-hero__stat {
		min-width: 120px;
		padding: 4px 10px;
	}
}

@media (max-width: 768px) {
	.flch-hero__content {
		padding: 64px 1.5rem 2.5rem;
	}
	.flch-hero__tagline {
		margin-bottom: 32px;
	}
	.flch-hero__stats {
		flex-direction: column;
		gap: 12px;
		padding: 20px;
		backdrop-filter: none;
	}
	.flch-hero__stat {
		width: 100%;
		min-width: unset;
		padding: 6px 0;
	}
	.flch-hero__stat-divider {
		width: 100%;
		height: 1px;
	}
	.flch-hero__centros {
		margin-top: -28px;
		padding: 0 1.25rem 3rem;
	}
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__centro-card {
		min-height: 172px;
		padding: 22px 20px;
	}
}

@media (max-width: 480px) {
	.flch-hero__content {
		padding: 48px 1.25rem 2rem;
	}
	.flch-hero__ampersand { font-size: 20vh; }
	.flch-hero__stats {
		gap: 10px;
		padding: 16px;
	}
	.flch-hero__centros {
		padding: 0 1rem 2.5rem;
		margin-top: -20px;
	}
	.flch-hero__centros-grid {
		grid-template-columns: 1fr;
	}
	.flch-hero__centro-card {
		min-height: unset;
		padding: 22px 20px;
	}
	.flch-hero__centro-title {
		font-size: 1.1rem;
	}
	.flch-hero__centro-desc {
		font-size: 12.5px;
	}
}

@media (max-width: 360px) {
	.flch-hero__title { font-size: 38px; }
}

@media (prefers-reduced-motion: reduce) {
	.reveal {
		opacity: 1 !important;
		transform: none !important;
		transition: none !important;
	}
	.flch-hero__centro-card,
	.flch-hero__centro-icon,
	.flch-hero__centro-cta,
	.flch-hero__centro-cta i {
		transition: none;
	}
}
</style>
