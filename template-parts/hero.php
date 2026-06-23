<?php
/**
 * Template part: Hero editorial FLCH — Handoff v2
 *
 * Hero de portada con enfoque editorial moderno: jerarquía visual clara,
 * badge institucional, CTA dual, estadísticas y panel de centros integrado.
 *
 * @package LetrasFLCH
 */
?>
<section class="flch-hero" id="flchHero"
         aria-label="Hero principal — Facultad de Letras y Ciencias Humanas"
         x-data="flchHome()"
         x-init="init()">

	<!-- ── Fondo ─────────────────────────────────────────────── -->
	<div class="flch-hero__bg"
		 style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/images/hero-fallback.jpg' ); ?>')"
		 role="img"
		 aria-label="Vista aérea del campus universitario"></div>
	<div class="flch-hero__overlay" aria-hidden="true"></div>

	<!-- ── Decorativos ───────────────────────────────────────── -->
	<div class="flch-hero__ampersand" aria-hidden="true">&amp;</div>
	<div class="flch-hero__vert-label" aria-hidden="true">Decana de América · 1551</div>

	<!-- ── Contenido ─────────────────────────────────────────── -->
	<div class="flch-hero__content">
		<div class="flch-hero__container">

			<!-- Eyebrow badge -->
			<div class="flch-hero__eyebrow reveal">
				<span class="flch-hero__eyebrow-line"></span>
				Investigación · Humanidades · Cultura
			</div>

			<!-- Subtitle -->
			<div class="flch-hero__subtitle reveal">Facultad de</div>

			<!-- Title -->
			<h1 class="flch-hero__title reveal">
				Letras <span class="flch-hero__title-amp">&amp;</span> Ciencias Humanas
			</h1>

			<!-- Description -->
			<p class="flch-hero__desc reveal">
				Formación, investigación y producción intelectual en humanidades.
				Casa de estudios de nuestro Premio Nobel <span class="flch-hero__desc-highlight">Mario Vargas Llosa</span>
				— hoy una facultad que moderniza su enseñanza sin renunciar a su tradición crítica.
			</p>

			<!-- CTAs -->
			<div class="flch-hero__ctas reveal">
				<a href="https://letras.unmsm.edu.pe/horarios-flch.php"
				   class="flch-hero__cta flch-hero__cta--primary"
				   target="_blank" rel="noopener noreferrer">
					Examen de Suficiencia · Idiomas
					<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</a>
				<a href="#escuelas"
				   class="flch-hero__cta flch-hero__cta--secondary">
					Conoce las Escuelas
				</a>
			</div>

			<!-- Stats -->
			<div class="flch-hero__stats reveal">
				<template x-for="s in heroStats" :key="s.label">
					<div class="flch-hero__stat">
						<i class="fa-solid" :class="s.icon" aria-hidden="true"></i>
						<span class="flch-hero__stat-value" x-text="s.value"></span>
						<span class="flch-hero__stat-label" x-text="s.label"></span>
					</div>
				</template>
			</div>

		</div>
	</div>

	<!-- ── Centros de Producción ─────────────── -->
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

<!-- ══════════════════════════════════════════════════════════════
     CSS — v6 (handoff-aligned)
═════════════════════════════════════════════════════════════════ -->
<style>
/* ── Hero ─────────────────────────────────────────────────── */
.flch-hero {
	position:      relative;
	overflow:      hidden;
	background:    #0a1726;
	color:         #fff;
	font-family:   var(--font-body, 'Hanken Grotesk', sans-serif);
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

/* ── Ampersand decorativo ────────────────────────────────── */
.flch-hero__ampersand {
	position:         absolute;
	right:            -2vw;
	top:              50%;
	transform:        translateY(-50%);
	z-index:          3;
	font-family:      var(--font-display, 'Newsreader', serif);
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
	padding:     88px 2.5rem 3rem;
	min-height:  auto;
	display:     flex;
	flex-direction: column;
	justify-content: flex-start;
}

.flch-hero__container {
	max-width: 900px;
}

/* ── Eyebrow ──────────────────────────────────────────────── */
.flch-hero__eyebrow {
	display:         inline-flex;
	align-items:     center;
	gap:             10px;
	font-size:       12.5px;
	font-weight:     700;
	letter-spacing:  .2em;
	text-transform:  uppercase;
	color:           var(--gold, #A8861C);
	margin-bottom:   24px;
}
.flch-hero__eyebrow-line {
	display: inline-block;
	width:   32px;
	height:  1px;
	background: var(--gold, #A8861C);
}

/* ── Subtitle ──────────────────────────────────────────────── */
.flch-hero__subtitle {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-style:     italic;
	font-size:      clamp(22px, 2.4vw, 30px);
	color:          rgba(255,255,255,.75);
	margin-bottom:  4px;
}

/* ── Title ────────────────────────────────────────────────── */
.flch-hero__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-weight:    600;
	font-size:      clamp(46px, 7vw, 100px);
	line-height:    0.94;
	letter-spacing: -.02em;
	color:          #fff;
	text-shadow:    0 2px 36px rgba(0,0,0,.35);
	margin-bottom:  28px;
	max-width:      15ch;
}
.flch-hero__title-amp {
	font-style: italic;
}

/* ── Description ──────────────────────────────────────────── */
.flch-hero__desc {
	font-size:     clamp(16px, 1.5vw, 20px);
	line-height:   1.7;
	color:         rgba(255,255,255,.85);
	max-width:     42em;
	margin-bottom: 36px;
}
.flch-hero__desc-highlight {
	color:       var(--gold, #A8861C);
	font-weight: 600;
}

/* ── CTAs ────────────────────────────────────────────────── */
.flch-hero__ctas {
	display:         flex;
	flex-wrap:       wrap;
	gap:             14px;
	margin-bottom:   48px;
}
.flch-hero__cta {
	display:         inline-flex;
	align-items:     center;
	gap:             10px;
	font-weight:     700;
	padding:         16px 28px;
	border-radius:   9999px;
	transition:      all .25s ease;
	text-decoration: none;
}
.flch-hero__cta i {
	font-size: 13px;
}
.flch-hero__cta--primary {
	background:    var(--gold, #A8861C);
	color:         #231d05;
	box-shadow:    0 12px 30px rgba(214,182,85,.32);
}
.flch-hero__cta--primary:hover {
	filter:        brightness(1.1);
	transform:     translateY(-2px);
}
.flch-hero__cta--secondary {
	background:    rgba(255,255,255,.1);
	color:         #fff;
	border:        1px solid rgba(255,255,255,.4);
	backdrop-filter: blur(4px);
}
.flch-hero__cta--secondary:hover {
	background:    rgba(255,255,255,.2);
}

/* ── Stats ────────────────────────────────────────────────── */
.flch-hero__stats {
	display:         flex;
	flex-wrap:       wrap;
	gap:             2.5rem;
	align-items:     center;
	padding-top:     26px;
	border-top:      1px solid rgba(255,255,255,.12);
}

.flch-hero__stat {
	display:     flex;
	align-items: center;
	gap:         14px;
}

.flch-hero__stat i {
	font-size: 20px;
	width:     24px;
	text-align: center;
	color:     var(--gold, #A8861C);
}

.flch-hero__stat-value {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.5rem;
	font-weight:    600;
	line-height:    1.2;
	color:          #fff;
	display:        block;
}

.flch-hero__stat-label {
	font-size:     11.5px;
	font-weight:   600;
	letter-spacing: .02em;
	text-transform: uppercase;
	color:         rgba(255,255,255,.55);
	display:       block;
	line-height:   1.2;
}

/* ── Centros de Producción ────────────────────────────────── */
.flch-hero__centros {
	position: relative;
	z-index: 6;
	max-width: var(--container-max, 1300px);
	margin: -72px auto 0;
	padding: 0 2.5rem 4rem;
}

.flch-hero__centros-panel {
	position:       relative;
	overflow:       hidden;
	border-radius:  22px;
	border:         1px solid rgba(214,182,85,.18);
	box-shadow:     0 34px 80px rgba(8,18,32,.45);
	background:     linear-gradient(180deg, #103155 0%, #0B2036 100%);
}

.flch-hero__centros-panel::before {
	content:       '¶';
	position:      absolute;
	right:         16px;
	top:           -20px;
	font-family:   var(--font-display, 'Newsreader', serif);
	font-style:    italic;
	font-size:     160px;
	line-height:   1;
	color:         rgba(214,182,85,.06);
	pointer-events: none;
}

.flch-hero__centros-header {
	display:         flex;
	align-items:     center;
	gap:             10px;
	padding:         16px 28px;
	border-bottom:   1px solid rgba(255,255,255,.08);
	font-size:       12px;
	font-weight:     700;
	letter-spacing:  .16em;
	text-transform:  uppercase;
	color:           var(--gold, #A8861C);
}
.flch-hero__centros-header i { font-size: 15px; }
.flch-hero__centros-header-note {
	margin-left: auto;
	font-size:   12.5px;
	font-weight: 500;
	text-transform: none;
	letter-spacing: normal;
	color:       rgba(255,255,255,.5);
	display:     none;
}
@media (min-width: 640px) {
	.flch-hero__centros-header-note { display: inline; }
}

.flch-hero__centros-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 0;
}

.flch-hero__centro-card {
	position:       relative;
	display:        flex;
	flex-direction: column;
	padding:        28px 26px;
	min-height:     206px;
	color:          #fff;
	text-decoration: none;
	border-right:   1px solid rgba(255,255,255,.06);
	border-top:     1px solid rgba(255,255,255,.06);
	transition:     all .3s cubic-bezier(.4,0,.2,1);
}

.flch-hero__centro-card:last-child,
.flch-hero__centro-card:nth-child(4) {
	border-right: none;
}

.flch-hero__centro-card:hover {
	background: rgba(255,255,255,.03);
	transform:  translateY(-4px);
}

.flch-hero__centro-icon {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           52px;
	height:          52px;
	border-radius:   13px;
	background:      rgba(214,182,85,.12);
	color:           var(--gold, #A8861C);
	font-size:       21px;
	margin-bottom:   18px;
	transition:      all .3s ease;
}

.flch-hero__centro-card:hover .flch-hero__centro-icon {
	background: rgba(214,182,85,.18);
	transform:  scale(1.05);
}

.flch-hero__centro-title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.25rem;
	font-weight:    600;
	line-height:    1.3;
	margin-bottom:  8px;
	color:          #fff;
}

.flch-hero__centro-desc {
	font-size:      13.5px;
	line-height:    1.5;
	color:          rgba(255,255,255,.7);
	margin-bottom:  auto;
	padding-bottom: 16px;
	flex: 1;
}

.flch-hero__centro-cta {
	font-size:      13px;
	font-weight:    700;
	color:          var(--gold, #A8861C);
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

/* ── Animaciones (reveal) ────────────────────────────────── */
.reveal {
	opacity: 0;
	transform: translateY(28px);
	transition: opacity .85s ease, transform .85s cubic-bezier(.22,1,.36,1);
}
.reveal.is-in {
	opacity: 1;
	transform: none;
}

/* ── Responsive ───────────────────────────────────────────── */
@media (max-width: 1024px) {
	.flch-hero__vert-label { display: none; }
	.flch-hero__ampersand  { font-size: 28vh; opacity: .8; }
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__centro-card:nth-child(2n) {
		border-right: none;
	}
}

@media (max-width: 768px) {
	.flch-hero__content {
		padding: 60px 1.5rem 2.5rem;
	}
	.flch-hero__centros {
		margin-top: -48px;
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
	.flch-hero__stats {
		gap: 1.5rem;
		padding-top: 1.25rem;
	}
	.flch-hero__ctas {
		margin-bottom: 36px;
	}
}

@media (max-width: 480px) {
	.flch-hero__content {
		padding: 48px 1.25rem 2rem;
	}
	.flch-hero__ampersand { font-size: 18vh; }
	.flch-hero__stats     { gap: 1.5rem; }
	.flch-hero__stat      { gap: 10px; }
	.flch-hero__stat i    { font-size: 16px; width: 20px; }
	.flch-hero__centros   {
		padding: 0 1rem 2.5rem;
		margin-top: -36px;
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

/* ── Performance: backdrop-filter en móvil ────────────────── */
@media (max-width: 768px) {
	.flch-hero__cta--secondary {
		backdrop-filter: none;
	}
}
</style>
