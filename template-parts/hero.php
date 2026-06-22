<?php
/**
 * Template part: Hero editorial FLCH — alineado con Dossier CODICE + Handoff
 *
 * Hero de portada con enfoque editorial: fondo cinematográfico,
 * tipografía humanista, indicadores institucionales y panel de
 * Centros de Producción que monta sobre el borde inferior.
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

			<!-- Tagline -->
			<div class="flch-hero__tagline">
				<span class="flch-hero__tagline-line" aria-hidden="true"></span>
				Investigación · Humanidades · Cultura
			</div>

			<!-- Subtitle -->
			<div class="flch-hero__subtitle">Facultad de</div>

			<!-- Title -->
			<h1 class="flch-hero__title">
				Letras <span class="flch-hero__title-amp">&amp;</span> Ciencias Humanas
			</h1>

			<!-- Description -->
			<p class="flch-hero__description">
				Formación, investigación y producción intelectual en humanidades.
				Casa de estudios de nuestro Premio Nobel
				<span class="flch-hero__desc-highlight">Mario Vargas Llosa</span>
				— hoy una facultad que moderniza su enseñanza sin renunciar a
				su tradición crítica.
			</p>

			<!-- CTAs -->
			<div class="flch-hero__actions">
				<a href="https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/"
				   class="flch-btn flch-btn--pill flch-btn--primary"
				   target="_blank" rel="noopener noreferrer">
					Examen de Suficiencia · Idiomas
					<svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14m-7-7 7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<a href="#escuelas" class="flch-btn flch-btn--pill flch-btn--outline">
					Conoce las Escuelas
				</a>
			</div>

			<!-- Stats -->
			<div class="flch-hero__stats" x-data="{}">
				<template x-for="s in [{i:'fa-graduation-cap',v:'10',l:'Escuelas profesionales'},{i:'fa-compass',v:'4',l:'Centros de producción'},{i:'fa-flask',v:'I+D',l:'Investigación'},{i:'fa-landmark',v:'1551',l:'Decana de América'}]" :key="s.l">
					<div class="flch-hero__stat">
						<i class="fa-solid" :class="s.i" aria-hidden="true"></i>
						<span class="flch-hero__stat-value" x-text="s.v"></span>
						<span class="flch-hero__stat-label" x-text="s.l"></span>
					</div>
				</template>
			</div>

		</div>
	</div>

	<!-- ── Centros de Producción · panel-pedestal ─────────────── -->
	<div class="flch-hero__centros">
		<div class="flch-hero__centros-panel" x-data="{}">
			<div class="flch-hero__centros-header">
				<i class="fa-solid fa-compass" aria-hidden="true"></i>
				Centros de Producción
				<span class="flch-hero__centros-sub">Accesos estratégicos de la Facultad</span>
			</div>
			<div class="flch-hero__centros-grid">
				<template x-for="c in [{i:'fa-user-graduate',t:'Posgrado',d:'Maestrías y doctorados en humanidades, lingüística y comunicación.',ct:'Ver programas',h:'#'},{i:'fa-language',t:'Centro de Idiomas',d:'Cursos y certificación en lenguas modernas y originarias.',ct:'Inscríbete',h:'#'},{i:'fa-certificate',t:'Examen de Suficiencia',d:'Acredita tu dominio de idiomas con la OESI de la Facultad.',ct:'Programa tu examen',h:'https://letras.unmsm.edu.pe/horarios-flch.php'},{i:'fa-hands-holding-circle',t:'CERSEU',d:'Extensión, responsabilidad social y educación continua.',ct:'Conoce más',h:'#'}]" :key="c.t">
					<a :href="c.h" class="flch-hero__centro-card">
						<span class="flch-hero__centro-icon"><i class="fa-solid" :class="c.i"></i></span>
						<h3 class="flch-hero__centro-title" x-text="c.t"></h3>
						<p class="flch-hero__centro-desc" x-text="c.d"></p>
						<span class="flch-hero__centro-cta">
							<span x-text="c.ct"></span>
							<i class="fa-solid fa-arrow-right"></i>
						</span>
					</a>
				</template>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     CSS — v4 (editorial)
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

/* ── Ampersand decorativo ─────────────────────────────────── */
.flch-hero__ampersand {
	position:         absolute;
	right:            -2vw;
	top:              50%;
	transform:        translateY(-50%);
	z-index:          3;
	font-family:      var(--flch-font-disp, 'Newsreader', serif);
	font-style:       italic;
	font-size:        54vh;
	line-height:      1;
	color:            rgba(214,182,85,.06);
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
	padding:     5.5rem 2.5rem 8rem;
	min-height:  80vh;
	display:     flex;
	flex-direction: column;
	justify-content: center;
}

.flch-hero__container {
	max-width: 900px;
}

/* ── Tagline ──────────────────────────────────────────────── */
.flch-hero__tagline {
	display:         flex;
	align-items:     center;
	gap:             12px;
	font-size:       clamp(11px, 1vw, 12.5px);
	font-weight:     700;
	letter-spacing:  .2em;
	text-transform:  uppercase;
	color:           var(--flch-gold, #A8861C);
	margin-bottom:   1.5rem;
}
.flch-hero__tagline-line {
	display:       block;
	width:         32px;
	height:        1px;
	background:    var(--flch-gold, #A8861C);
	flex-shrink:   0;
}

/* ── Subtitle ──────────────────────────────────────────────── */
.flch-hero__subtitle {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-style:     italic;
	font-size:      clamp(22px, 2.4vw, 30px);
	color:          rgba(255,255,255,.85);
	margin-bottom:  4px;
}

/* ── Title ────────────────────────────────────────────────── */
.flch-hero__title {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-weight:    600;
	font-size:      clamp(46px, 7vw, 100px);
	line-height:    .94;
	letter-spacing: -.02em;
	color:          #fff;
	text-shadow:    0 2px 36px rgba(0,0,0,.35);
	margin-bottom:  1.75rem;
	max-width:      15ch;
}
.flch-hero__title-amp {
	font-style: italic;
}

/* ── Description ──────────────────────────────────────────── */
.flch-hero__description {
	font-size:      clamp(16px, 1.5vw, 20px);
	line-height:    1.7;
	color:          rgba(255,255,255,.85);
	max-width:      42em;
	margin-bottom:  2.25rem;
}
.flch-hero__desc-highlight {
	color:       var(--flch-gold, #A8861C);
	font-weight: 600;
}

/* ── Actions ──────────────────────────────────────────────── */
.flch-hero__actions {
	display: flex;
	flex-wrap: wrap;
	gap: 14px;
	margin-bottom: 3rem;
}

/* ── Stats ────────────────────────────────────────────────── */
.flch-hero__stats {
	display:         flex;
	flex-wrap:       wrap;
	gap:             2.5rem;
	align-items:     center;
	border-top:      1px solid rgba(255,255,255,.15);
	padding-top:     26px;
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
	color:     var(--flch-gold, #A8861C);
}

.flch-hero__stat-value {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
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
	color:         rgba(255,255,255,.50);
	display:       block;
	line-height:   1.2;
}

/* ── Centros de Producción ──────────────────────────────────── */
.flch-hero__centros {
	position: relative;
	z-index: 10;
	max-width: var(--container-max, 1300px);
	margin: -72px auto 0;
	padding: 0 2.5rem;
}

.flch-hero__centros-panel {
	position:       relative;
	overflow:       hidden;
	border-radius:  22px;
	border:         1px solid rgba(214,182,85,.20);
	box-shadow:     0 34px 80px rgba(8,18,32,.45);
	background:     linear-gradient(180deg, #103155 0%, #0B2036 100%);
}

.flch-hero__centros-panel::before {
	content:       '¶';
	position:      absolute;
	right:         16px;
	top:           -20px;
	font-family:   var(--flch-font-disp, 'Newsreader', serif);
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
	border-bottom:   1px solid rgba(255,255,255,.10);
	font-size:       12px;
	font-weight:     700;
	letter-spacing:  .16em;
	text-transform:  uppercase;
	color:           var(--flch-gold, #A8861C);
}
.flch-hero__centros-header i { font-size: 14px; }
.flch-hero__centros-sub {
	margin-left: auto;
	font-size:   12.5px;
	font-weight: 500;
	letter-spacing: 0;
	text-transform: none;
	color:       rgba(255,255,255,.50);
	display:     none;
}
@media (min-width: 640px) { .flch-hero__centros-sub { display: inline; } }

.flch-hero__centros-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

.flch-hero__centro-card {
	position:       relative;
	display:        flex;
	flex-direction: column;
	padding:        28px 26px;
	min-height:     206px;
	color:          #fff;
	text-decoration: none;
	border-right:   1px solid rgba(255,255,255,.07);
	border-top:     1px solid rgba(255,255,255,.07);
	transition:     background .25s ease;
}
.flch-hero__centro-card:hover {
	background: rgba(255,255,255,.05);
}
.flch-hero__centro-card:last-child {
	border-right: none;
}

.flch-hero__centro-icon {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           52px;
	height:          52px;
	border-radius:   13px;
	background:      rgba(214,182,85,.15);
	color:           var(--flch-gold, #A8861C);
	font-size:       21px;
	margin-bottom:   18px;
}

.flch-hero__centro-title {
	font-family:    var(--flch-font-disp, 'Newsreader', serif);
	font-size:      1.25rem;
	font-weight:    600;
	line-height:    1.25;
	margin-bottom:  8px;
	color:          #fff;
}

.flch-hero__centro-desc {
	font-size:      13.5px;
	line-height:    1.4;
	color:          rgba(255,255,255,.60);
	margin-bottom:  16px;
	flex:           1;
}

.flch-hero__centro-cta {
	font-size:      13px;
	font-weight:    700;
	color:          var(--flch-gold, #A8861C);
	display:        inline-flex;
	align-items:    center;
	gap:            8px;
}
.flch-hero__centro-cta i { font-size: 11px; }

/* ── Animaciones ──────────────────────────────────────────── */
.flch-hero__tagline,
.flch-hero__subtitle,
.flch-hero__title,
.flch-hero__description,
.flch-hero__actions,
.flch-hero__stats,
.flch-hero .flch-hero__centros-panel {
	opacity:     0;
	transform:   translateY(28px);
	animation:   flchFadeUp .85s cubic-bezier(.22,1,.36,1) forwards;
}
.flch-hero__tagline           { animation-delay: .10s; }
.flch-hero__subtitle          { animation-delay: .18s; }
.flch-hero__title             { animation-delay: .26s; }
.flch-hero__description       { animation-delay: .34s; }
.flch-hero__actions           { animation-delay: .42s; }
.flch-hero__stats             { animation-delay: .50s; }
.flch-hero .flch-hero__centros-panel { animation-delay: .60s; }

@keyframes flchFadeUp {
	to { opacity: 1; transform: none; }
}

/* ── Responsive ───────────────────────────────────────────── */
@media (max-width: 1024px) {
	.flch-hero__vert-label { display: none; }
	.flch-hero__ampersand  { font-size: 30vh; }
}

@media (max-width: 768px) {
	.flch-hero__content {
		padding-left:  1.5rem;
		padding-right: 1.5rem;
		padding-bottom: 8rem;
		min-height: 70vh;
	}
	.flch-hero__centros {
		padding-left:  1.25rem;
		padding-right: 1.25rem;
		margin-top: -60px;
	}
	.flch-hero__centros-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.flch-hero__centro-card {
		min-height: 180px;
		padding: 20px 18px;
	}
	.flch-hero__centro-card:nth-child(2n) {
		border-right: none;
	}
}

@media (max-width: 480px) {
	.flch-hero__content {
		padding-left:  1.25rem;
		padding-right: 1.25rem;
		min-height: 65vh;
		padding-top: 4rem;
		padding-bottom: 7rem;
	}
	.flch-hero__ampersand { font-size: 20vh; }
	.flch-hero__stats     { gap: 1.25rem; padding-top: 20px; }
	.flch-hero__stat      { gap: 10px; }
	.flch-hero__stat i    { font-size: 16px; width: 20px; }
	.flch-hero__centros   { margin-top: -48px; }
	.flch-hero__centros-grid {
		grid-template-columns: 1fr;
	}
	.flch-hero__centro-card {
		border-right: none;
		min-height: unset;
	}
	.flch-hero__actions { flex-direction: column; }
}

@media (max-width: 360px) {
	.flch-hero__title { font-size: 36px; }
	.flch-hero__description { font-size: 15px; }
}

/* ── Reduced motion ────────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
	.flch-hero__tagline,
	.flch-hero__subtitle,
	.flch-hero__title,
	.flch-hero__description,
	.flch-hero__actions,
	.flch-hero__stats,
	.flch-hero .flch-hero__centros-panel {
		opacity: 1;
		transform: none;
		animation: none;
	}
}
</style>
